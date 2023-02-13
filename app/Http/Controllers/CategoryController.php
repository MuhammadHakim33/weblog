<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('admin');
        
        $categories = Category::all();
        $count = $categories->count();

        return view('operator.categories.index', [
            'title' => 'Categories',
            'categories' => $categories,
            'count' => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('admin');

        return view('operator.categories.create', ['title' => 'Categories']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('admin');

        $request->validate(['name' => 'required']);

        Category::create([
            'name' => $request->name,
            'slug' => $this->slug($request->name),
            'description' => $request->description,
        ]);

        return redirect('categories')->with('status-success', 'Create New Category Success!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        Gate::authorize('admin');

        return view('operator.categories.edit', [
            'title' => 'Categories',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        Gate::authorize('admin');

        $request->validate(['name' => 'required']);

        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        // Check if name change, then the slug will change too
        if($request->name != $category->name) {
            $data['slug'] = $this->slug($request->name);
        }

        Category::where('id', $category->id)->update($data);

        return redirect('categories')->with('status-success', 'Update Category Success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gate::authorize('admin');
        
        // Check if the category is connected with several posts 
        try {
            Category::destroy($id);
        } catch (\Throwable $th) {
            return back()->with('status-danger', 'Category Cannot Be Deleted! : This Category is Connected with Several Posts');
        }

        return back()->with('status-success', ' Category Has Been Deleted!');
    }

    /**
     * Create Slug
     */
    public function slug($name)
    {
        return SlugService::createSlug(Category::class, 'slug', $name);
    }
}
