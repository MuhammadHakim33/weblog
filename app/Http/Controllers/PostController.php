<?php

namespace App\Http\Controllers;

use App\Exceptions\ImageException;
use App\Services\imageService;
use App\Services\customSlugService;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', ['title' => 'Posts']);
    }

    /**
     * Display a listing of the draft post.
     */
    public function draft()
    {
        return view('drafts.index', ['title' => 'Drafts']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', [
            'title' => 'Create Post',
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|image|max:2048',
            'title' => 'required',
            'category' => 'required',
            'body' => 'required'
        ]);

        // Upload thumbnail
        $thumbnail = imageService::store($request->thumbnail);
        // Error handling for upload image
        if(!empty($thumbnail['status_code']) && $thumbnail['status_code'] == 400) {
            throw ImageException::invalidAPI();
        }

        // Set status for post base on role creator
        if(auth()->user()->userRole->level == 'administrator') {
            $status = "published";
        } else {
            $status = "reviewed";
        }

        // Set status for post base on which button clicked
        if($request->input('action') == 'draf') {
            $status = 'draf';
        }

        Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => customSlugService::slug($request->title, Post::class),
            'thumbnail' => $thumbnail['data']['url'],
            'body' => $request->body,
            'category_id' => $request->category,
            'status' => $status,
        ]);

        return redirect('posts')->with('status-success', 'Create New Post Success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.preview', [
            'title' => 'Preview Post',
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = $categories = Category::all();

        return view('posts.edit', [
            'title' => 'Edit Post',
            'categories' => $categories,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'thumbnail' => 'image|max:2048',
            'title' => 'required',
            'category' => 'required',
            'body' => 'required'
        ]);

        // Set status for post base on role creator
        if(auth()->user()->userRole->level == 'administrator') {
            $status = "published";
        } else {
            $status = "reviewed";
        }

        // Set status for post base on which button clicked
        // or if initial status is draft, when update is still draft
        if($request->input('action') == 'draf') {
            $status = 'draf';
        }

        $data = [
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
            'status' => $status,
        ];

        // Update thumbnail
        if($request->hasFile('thumbnail')) {
            // Upload thumbnail
            $thumbnail = imageService::store($request->thumbnail);
            // Error handling for upload image
            if(!empty($thumbnail['status_code']) && $thumbnail['status_code'] == 400) {
                throw ImageException::invalidAPI();
            }
            $data['thumbnail'] = $thumbnail['data']['url'];
        }

        // Check if title change, then the slug will change too
        if($request->title != $post->title) {
            $data['slug'] = customSlugService::slug($request->title, Post::class);
        }

        Post::where('id', $post->id)->update($data);

        return redirect('posts')->with('status-success', 'Update Post Success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return back()->with('status-danger', 'Post Has Been Deleted!');
    }

    /**
     * Publish Post
     */
    public function publish(Request $request)
    {
        Gate::authorize('admin');

        $post = Post::find($request->id);
        $post->status = 'published';
        $post->save();
        
        return back()->with('status-success', 'Post Has Been Published!');
    }

    /**
     * Reject Post
     */
    public function reject(Request $request)
    {
        Gate::authorize('admin');

        $post = Post::find($request->id);
        $post->status = 'rejected';
        $post->save();

        return back()->with('status-danger', 'Post Has Been Rejected!');
    }

    /**
     * Submit For Reviewed Post
     */
    public function review(Request $request)
    {
        $post = Post::find($request->id);
        $post->status = 'reviewed';
        $post->save();

        return redirect('posts')->with('status-success', 'Post Submit For Reviewed!');
    }
}
