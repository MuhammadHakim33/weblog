<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Change password
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change (Request $request)
    {
        // validate input
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:7',
            'retypePassword' => 'required|min:7',
        ]);

        // match old password input with current password
        if(!Hash::check($request->oldPassword, Auth::user()->password)) {
            return redirect('/profile')->with('danger', 'Old password doesn\'t match');
        }

        // match ne password input with retype password input
        if($request->newPassword != $request->retypePassword) {
            return redirect('/profile')->with('danger', 'Password doesn\'t match');
        }

        // update data
        Operator::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->retypePassword)
        ]);

        return redirect('/profile')->with('alert', 'Password changed!');
    }
}
