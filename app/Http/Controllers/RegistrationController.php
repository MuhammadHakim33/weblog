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
        $admin_name = $request->input('admin_name');
        $admin_email = $request->input('admin_email');
        $admin_password = Hash::make($request->input('admin_password'));

        Admin::create([
            'admin_name' => $admin_name,
            'admin_email' => $admin_email,
            'admin_password' => $admin_password
        ]);

        return response()->json([
            'message' => "Register Sukses",
            'status' => 201
        ]);
    }
}
