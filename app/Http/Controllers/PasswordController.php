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
        return view('operator.auth.form-request-link', ['title' => 'Forget Password']);
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
     *
     */
    public function edit($token)
    {
        return view('operator.auth.form-new-password', ['token' => $token, 'title' => "Reset"]);
    }

    /**
     * Reset password.
     */
    public function update(Request $request)
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
            'old_password' => 'required',
            'new_password' => 'required|min:7',
            'retype_password' => 'required|min:7',
        ]);

        // match old password input with current password
        if(!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect('/profile/change-password')->with('status-danger', 'Old password wrong !');
        }

        // check if new password different from old password
        if(Hash::check($request->new_password, Auth::user()->password)) {
            return redirect('/profile/change-password')->with('status-danger', 'New password can\'t be same as old password !');
        }

        // match new password input with retype password input
        if($request->new_password != $request->retype_password) {
            return redirect('/profile/change-password')->with('status-danger', 'Retype Password doesn\'t match to new password');
        }

        // update data
        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->retype_password)
        ]);

        return redirect('/profile/change-password')->with('status-success', 'Password changed!');
    }
}
