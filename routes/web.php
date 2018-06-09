<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TopicsController@index');

Route::get('/login', 'PagesController@login');

Route::get('/signup', 'PagesController@signup');

Route::get('/changePassword', 'PagesController@changePassword');

Route::resource('topics', 'TopicsController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
