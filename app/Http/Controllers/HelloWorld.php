<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorld extends Controller
{
    public function index() {
	$content = array('title' => 'Okay hopefully renaming went well');
	return view('helloworld', $content);
    }
}
