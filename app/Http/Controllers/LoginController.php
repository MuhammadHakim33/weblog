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
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'message' => 'Berhasil Login',
                'code' => 200
            ]);
        }

        return redirect('/admin/login')->with('login-failed', 'Email or Password Wrong!!');
    }
}
