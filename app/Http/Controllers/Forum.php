<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Forum extends Controller {

    public function index() {
	    $content = array('title' => 'The Forum');
	    return view('layout.forum', $content);
    }

    public function login() {
        $content = array('title' => 'The Forum: Log In',
                         'heading' => 'Log In Here');
        return view('pages.login', $content);
    }
}
