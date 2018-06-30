<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PagesController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function changePassword() {
        $content = array(
            'title' => $this->title,
            'heading' => 'Change Password'
        );
        return view('auth.passwords.changePassword', $content);
    }

    public function updatePassword(Request $request) {
        $currentPassword = $request->input('currentPassword');
        $newPassword = $request->input('newPassword');

        if (!Hash::check($currentPassword, auth()->user()->password)) {
            return redirect()->back()->with('error', 'The password you entered is not your actual, current password');
        }

        if (strcmp($currentPassword, $newPassword) == 0) {
            return redirect()->back()->with('error', 'Your new password cannot be the same as your old one');
        }

        $this->validate($request, [
            'currentPassword' => 'required',
            'newPassword' => 'required|string|min:6|confirmed',
        ]);

        $user = auth()->user();
        $user->password = bcrypt($newPassword);
        $user->save();

        return redirect('/')->with('success', 'Password changed successfully!');
    }
}
