<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/', 'WelcomeController');

Route::resource("about", 'AboutController');

Route::resource('groups', 'GroupController');

Route::get('auth/register','Auth\AuthController@getRegister');

Route::post('auth/register','Auth\AuthController@postRegister');

Route::get('auth/login','Auth\AuthController@getLogin');

Route::post('auth/login','Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('groups/join/{id}','JoinGroupController@getJoin');

Route::resource('profile', 'ProfileController');

//routes to handle images
Route::get('upload', 'ImageController@getUpload');
Route::post('upload', 'ImageController@postUpload');

Route::resource('post', 'PostController');


Route::resource('comment','CommentController');

Route::resource('article','ArticleController');

Route::resource('category','CategoryController');