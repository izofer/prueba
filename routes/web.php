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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::get('/', 'HomeController@index')->name('inicio');

	Route::get('/register', 'HomeController@register')->name('register');
	Route::post('/register-post', 'HomeController@register_post')->name('register_post');

	Route::get('/hobbies', 'HomeController@hobbies')->name('hobbies');
	Route::post('/hobbies-post', 'HomeController@hobbies_post')->name('hobbies_post');

	
	Route::get('/edit-user/{id}', 'HomeController@edit_user')->name('edit_user');
	Route::post('/edit-user-post', 'HomeController@edit_user_post')->name('edit_user_post');

	Route::get('/show-user/{nick}','HomeController@show_user')->name('show_user');
});