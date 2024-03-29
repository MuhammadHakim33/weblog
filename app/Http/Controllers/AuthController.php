<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display form login.
     */
    public function index()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    /**
     * Authenticate user account.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        
        if(!Auth::attempt($credentials)) {
            return back()->with('status-danger', 'Incorrect email or password.');
        }
        
        if(Auth::user()->UserRole->level == 'subscriber') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return back()->with('status-danger', 'Your account can\'t login here.');
        }
    
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    /**
     * Logout user account.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
