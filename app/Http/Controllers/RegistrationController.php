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
            'admin_name' => 'required',
            'admin_email' => 'required|email:dns|unique:admins',
            'admin_password' => 'required',
        ]);
        
        $validated['admin_password'] = Hash::make($validated['admin_password']);

        Admin::create($validated);

        return response()->json([
            'message' => "Register Sukses",
            'status' => 201
        ]);
    }
}
