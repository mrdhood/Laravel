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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get', 'post'], '/user/settings', 'UserController@settings')->name('settings');


Route::get('/profile/{id}', function ($id) {
    $user = \App\User::findOrFail($id);
    return view('profile', ['user' => $user]);
});