<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    /**
     * Show the form for request reset link.
     */
    public function request() 
    {
        return view('auth.form-request-link', ['title' => 'Forget Password']);
    }

    /**
     * Send reset link to email user.
     */
    public function send(Request $request)
    {
        $request->validate(['email' => 'required|email:dns']);

        // validate if the user is 'subscriber'
        $user = User::firstWhere('email', $request->email);
        if($user && $user->userRole->level == 'subscriber') {
            return back()->with('status-danger', 'This page just for operator!');
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT ?
                    back()->with(['status-success' => __($status)]) :
                    back()->withErrors(['email' => __($status)]);
    }

    /**
     * Show the form for reset password.
     */
    public function edit($token)
    {
        return view('auth.form-new-password', ['token' => $token, 'title' => "Reset"]);
    }

    /**
     * Reset password.
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:7|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET ? 
                redirect('/login')->with('status-success', __($status)) : 
                back()->withErrors(['email' => [__($status)]]);
    }

    /**
     * Change password
     */
    public function change(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'password' => 'required|min:7|confirmed',
        ]);

        // check if new password different from old password
        if(Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors(['password' => 'New password can\'t be same as old password !']);
        }

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('status-success', 'Password changed!');
    }
}
