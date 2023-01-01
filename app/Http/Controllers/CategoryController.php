<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('operator.categories.index', [
            'title' => 'Categories',
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operator.categories.create', [
            'title' => 'Categories'
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
        // Validation Input
        $request->validate([
            'name' => 'required'
        ]);

        // Insert Data
        Category::create([
            'name' => $request->name,
            'slug' => $this->slug($request->name),
            'description' => $request->description,
        ]);

        return redirect('categories')->with('alert-success', 'Create New Category Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('operator.categories.edit', [
            'title' => 'Categories',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // Validate input
        $request->validate([
            'name' => 'required'
        ]);

        // Data
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        // Check if name change, then the slug will change too
        if($request->name != $category->name) {
            $data['slug'] = $this->slug($request->name);
        }

        // Update data
        Category::where('id', $category->id)->update($data);

        return redirect('categories')->with('alert-success', 'Update Category Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check if the category is connected with several posts 
        try {
            Category::destroy($id);
        } catch (\Throwable $th) {
            return redirect('categories')->with('alert-danger', 'Category Cannot Be Deleted! : This Category is Connected with Several Posts');
        }

        return redirect('categories')->with('alert-success', ' Category Has Been Deleted!');
    }

    /**
     * Create Slug
     */
    public function slug($name)
    {
        return SlugService::createSlug(Category::class, 'slug', $name);
    }
}
