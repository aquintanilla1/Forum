<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller {
    protected $title = 'The PagesController';

    public function index() {
	    $content = array('title' => $this->title);
	    return view('pages.homepage', $content);
    }

    public function login() {
        $content = array('title' => $this->title,
                         'heading' => 'Log In Here');
        return view('pages.login', $content);
    }

    public function signup() {
        $content = array('title' => $this->title,
                         'heading' => 'Sign In Here');
        return view('pages.signup', $content);
    }

    public function changePassword() {
        $content = array('title' => $this->title,
                         'heading' => 'Change Password');
        return view('pages.changePassword', $content);
    }
}
