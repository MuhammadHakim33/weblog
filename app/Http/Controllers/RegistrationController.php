<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index() 
    {
        return view('admin.register', ['title' => 'Register']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:admins',
            'password' => 'required',
        ]);
        
        $validated['password'] = Hash::make($validated['password']);

        Admin::create($validated);

        return redirect('/admin/login')->with('registration-sucess', 'Registration Sucessfull!! Please Login');
    }
}
