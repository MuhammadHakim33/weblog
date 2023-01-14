<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class OperatorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @param  Illuminate\Support\Facades\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function index(Auth $auth)
    {
        return view('operator.profile.index', [
            'title' => "Profile",
            'user' => $auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operator  $Operator
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Auth $auth)
    {
        // validate input
        $request->validate([
            'thumbnail' => 'image|max:2048',
            'name' => 'required',
            'email' => 'required|email:dns',
        ]);

        // Data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        
        // Update photo
        if($request->hasFile('thumbnail')) {
            $data['image'] = $request->file('thumbnail')->store('images/profiles');
        }

        // Check if name change, then the slug will change too
        if($request->name != $auth::user()->name) {
            $data['slug'] = $this->slug($request->name);
        }

        // update data
        Operator::where('id', $auth::user()->id)->update($data);

        return redirect('/profile')->with('alert', 'Profile updated!');
    }

    /**
     * Update Slug
     */
    public function slug($name)
    {
        return SlugService::createSlug(Operator::class, 'slug', $name);
    }
}