<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorld extends Controller
{
    public function index() {
	$content = array('title' => 'Ok now we are trying this shit from git!');
	return view('helloworld', $content);
    }
}
