<?php

namespace App\Http\Controllers;

use App\Exceptions\ImageException;
use App\Models\User;
use App\Services\imageService;
use App\Services\customSlugService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        Gate::authorize('admin');
        
        $authors = User::with(['userRole', 'post'])
                    ->whereRelation('userRole', 'level', 'author')
                    ->withCount('post')
                    ->get();

        $count = $authors->count();

        return view('authors.index', [
            'title' => 'Authors',
            'authors' => $authors,
            'count' => $count,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        Gate::authorize('admin');

        return view('authors.create', [
            'title' => 'Author'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request, imageService $imageService, customSlugService $slugService)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:7',
            'avatar' => 'required|image|max:2048',
        ]);

        // Upload avatar
        $avatar = $imageService->upload($request->avatar);
        // Error handling for upload image
        if(!empty($avatar['status_code']) && $avatar['status_code'] == 400) {
            throw ImageException::invalidAPI();
        }
        
        $user = User::create([
            'name' => $request->name,
            'slug' => $slugService->slug($request->name, User::class),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar['data']['url'],
        ]);

        $user->UserRole()->create([
            'user_id' => $user->id,
            'level' => 'author',
            'status' => 1,
        ]);

        return redirect('authors')->with('status-success', 'Add New Author Success!');
    }

    /**
     * Remove author
     *
     */
    public function destroy($id)
    {
        $author = User::find($id);
        $author->delete();

        return back()->with('status-danger', 'Author Has Been Deleted!');
    }

    /**
     * Disabled author
     */
    public function disabled(Request $request)
    {
        $author = User::find($request->id);
        $author->userRole->status = '0';
        $author->userRole->save();

        return back()->with('status-danger', 'Author disabled!');
    }

    /**
     * Activated author
     */
    public function activated(Request $request)
    {
        $author = User::find($request->id);
        $author->userRole->status = '1';
        $author->userRole->save();

        return back()->with('status-success', 'Author activated!');
    }
}
