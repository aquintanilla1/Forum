<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorld extends Controller
{
    public function index() {
	$content = array('title' => 'The Forum');
	return view('helloworld', $content);
    }
}
