<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Forum extends Controller {

    public function index() {
	    $content = array('title' => 'The Forum');
	    return view('pages.homepage', $content);
    }

    public function login() {
        $content = array('title' => 'The Forum: Log In',
                         'heading' => 'Log In Here');
        return view('pages.login', $content);
    }

    public function signin() {
        $content = array('title' => 'The Forum: Sign In',
            'heading' => 'Sign In Here');
        return view('pages.signin', $content);
    }

    public function changePassword() {
        $content = array('title' => 'The Forum: Change Password',
            'heading' => 'Change Password');
        return view('pages.changePassword', $content);
    }
}
