<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Forum extends Controller {

    public function index() {
	    $content = array('title' => 'The Forum');
	    return view('forum', $content);
    }
}
