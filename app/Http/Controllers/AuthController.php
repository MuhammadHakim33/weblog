<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('operator.auth.login', ['title' => 'Login']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        
        if(!Auth::attempt($credentials)) {
            return redirect()->intended('/login')->with('status-danger', 'Incorrect email or password.');
        }
        
        if(Auth::user()->UserRole->level == 'subscriber') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->intended('/login')->with('status-danger', 'Your account can\'t login here.');
        }
    
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');

        // $user = User::firstWhere('email', $request->email);
        
        // if(!$user) {
        //     return redirect()->intended('/login');
        // }

        // if(!Hash::check($request->password, $user->password)) {
        //     return redirect()->intended('/login');
        // }

        // if($user->userRole->level == 'subscriber') {
        //     return redirect()->intended('/login');
        // }

        // Auth::loginUsingId($user->id);
        // $request->session()->regenerate();
        
        // return redirect()->intended('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
