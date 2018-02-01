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

Route::get('/', function () {
    return view('welcome');
});

Route::get('User', 'UserController@index');

Route::get('users', function () {
	return App\User::all();
});

Route::get('users/{id}', function ($id) {
	return App\User::findOrFail($id);
});

Route::post('users', function () {
	return App\User::create(Request::all());
});

Route::patch('users/{id}', function ($id) {
	App\User::findOrFail($id)->update(Request::all());
	return Response::json(Request::all());
});

Route::delete('users/{id}', function ($id) {
	return App\User::destroy($id);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

