<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class UserController extends Controller
{
    /**
     * Display a form for update general data.
     *
     * @param  Illuminate\Support\Facades\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function formGeneral(Auth $auth)
    {
        return view('operator.profile.form_general', [
            'title' => "Profile - General",
            'user' => $auth::user()
        ]);
    }

    /**
     * Display a form for update password in profile page.
     *
     * @param  Illuminate\Support\Facades\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function formPassword(Auth $auth)
    {
        return view('operator.profile.form_password', [
            'title' => "Profile - Password",
            'user' => $auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Illuminate\Support\Facades\Auth  $auth
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Auth $auth)
    {
        // validate input
        $request->validate([
            'image' => 'image|max:2048',
            'name' => 'required',
            'email' => 'required|email:dns',
        ]);

        // Data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        
        // Update photo
        if($request->hasFile('image')) {
            $data['avatar'] = $request->file('image')->store('images/profiles');
        }

        // Check if name change, then the slug will change too
        if($request->name != $auth::user()->name) {
            $data['slug'] = $this->slug($request->name);
        }

        // update data
        User::where('id', $auth::user()->id)->update($data);

        return redirect('/profile')->with('status-success', 'Profile updated!');
    }

    /**
     * Update Slug
     */
    public function slug($name)
    {
        return SlugService::createSlug(User::class, 'slug', $name);
    }
}
