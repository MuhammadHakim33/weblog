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
            'old_password' => 'required',
            'new_password' => 'required|min:7',
            'retype_password' => 'required|min:7',
        ]);

        // match old password input with current password
        if(!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect('/profile/change-password')->with('status-danger', 'Old password wrong !');
        }

        // match ne password input with retype password input
        if($request->new_password != $request->retype_password) {
            return redirect('/profile/change-password')->with('status-danger', 'Retype Password doesn\'t match to new password');
        }

        // update data
        Operator::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->retype_password)
        ]);

        return redirect('/profile/change-password')->with('status-success', 'Password changed!');
    }
}
