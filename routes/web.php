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

Route::resource('/', 'TodoController');
// Route::resource('todo', 'TodoController');
// Route::resource('/home', 'HomeController');
Route::resource('users', 'UserController');
Route::resource('register', 'Auth/RegisterController');

Route::get('/', 'TodoController@index');
Route::post('/{name}', 'TodoController@postTodo');
Route::delete('/todo/{todo}', 'TodoController@deleteTodo');


// Route::resource('/', 'TodoController');
// Route::resource('todo', 'TodoController');
// Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('users', 'UserController');
// Route::resource('register', 'Auth/RegisterController');
// Route::resource('login', 'Auth/LoginController');
