<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login', ['title' => 'Login']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'admin_email' => 'required|email:dns',
            'admin_password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'message' => 'Berhasil Login',
                'code' => 200
            ]);
        }

        return response()->json([
            'message' => 'Gagal Login',
            'code' => 400
        ]);
    }
}