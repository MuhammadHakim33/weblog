<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('creator')
                    ->where('status', '!=', 'draf')
                    ->latest()
                    ->get();

        if(!Gate::allows('admin')) {
            $posts = Post::with('creator')
                    ->where('status', '!=', 'draf')
                    ->where('creator_id', Auth::user()->id)
                    ->latest()
                    ->get();
        }

        return view('operator.posts.index', [
            'title' => 'All Posts',
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('tbl_categories')
                        ->select(['id', 'name'])
                        ->get();

        return view('operator.posts.create', [
            'title' => 'Create Post',
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate input
        $request->validate([
            'thumbnail' => 'required|image|max:2048',
            'title' => 'required',
            'category' => 'required',
            'body' => 'required'
        ]);

        // Upload thumbnail
        $thumbnail = $request->file('thumbnail')->store('images/thumbnails');

        // Set status for post base on role creator
        if(auth()->user()->role == 'administrator') {
            $status = "published";
        } else {
            $status = "reviewed";
        }

        // Set status for post base on which button clicked
        if($request->input('action') == 'draf') {
            $status = 'draf';
        }

        // Insert data
        Post::create([
            'creator_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => $this->slug($request->title),
            'thumbnail' => $thumbnail,
            'body' => $request->body,
            'category_id' => $request->category,
            'status' => $status,
        ]);

        return redirect('posts')->with('alert', 'Create New Post Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = DB::table('tbl_categories')
                        ->select(['id', 'name'])
                        ->get();

        return view('operator.posts.edit', [
            'title' => 'Edit Post',
            'categories' => $categories,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // validate input
        $request->validate([
            'thumbnail' => 'image|max:2048',
            'title' => 'required',
            'category' => 'required',
            'body' => 'required'
        ]);

        // Set status for post base on role creator
        if(auth()->user()->role == 'administrator') {
            $status = "published";
        } else {
            $status = "reviewed";
        }

        // Set status for post base on which button clicked
        // or if initial status is draft, when update is still draft
        if($request->input('action') == 'draf' || $post->status == 'draf') {
            $status = 'draf';
        }

        // Data 
        $data = [
            'creator_id' => auth()->user()->id,
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
            'status' => $status,
        ];

        // Update photo
        if($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('images/thumbnails');
        }

        // Check if title change, then the slug will change too
        if($request->title != $post->title) {
            $data['slug'] = $this->slug($request->title);
        }

        // update data
        Post::where('id', $post->id)->update($data);

        return redirect('posts')->with('alert', 'Update Post Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('posts')->with('alert', 'Post Has Been Deleted!');
    }

    /**
     * Publish Post
     * 
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request)
    {
        // Data 
        $data = [
            'status' => 'published',
        ];

        // update data
        Post::where('id', $request->id)->update($data);

        return redirect('posts')->with('alert', 'Post Has Been Published!');
    }

    /**
     * Reject Post
     * 
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request)
    {
        // Data 
        $data = [
            'status' => 'rejected',
        ];

        // update data
        Post::where('id', $request->id)->update($data);

        return redirect('posts')->with('alert', 'Post Has Been Rejected!');
    }

    /**
     * Display a listing of the draft post.
     *
     * @return \Illuminate\Http\Response
     */
    public function draft(Post $post)
    {
        $posts = Post::with('creator')
                    ->where('status', 'draf')
                    ->latest()
                    ->get();

        if(!Gate::allows('admin')) {
            $posts = Post::with('creator')
                    ->where('status', 'draf')
                    ->where('creator_id', Auth::user()->id)
                    ->latest()
                    ->get();
        }

        return view('operator.drafts.index', [
            'title' => 'Drafts',
            'posts' => $posts
        ]);
    }

    /**
     * Create Slug
     */
    public function slug($title)
    {
        return SlugService::createSlug(Post::class, 'slug', $title);
    }
    
}
