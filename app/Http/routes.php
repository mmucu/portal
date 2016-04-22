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

Route::resource('ministries', 'GroupController');

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


Route::get('inspire','AboutController@inspire'); // added for the inspiration
Route::get('randomverse', 'AboutController@getVerse'); //this searches a random verse

Route::resource('profile', 'ProfileController');

Route::resource('image', 'ImageController');

Route::resource('post', 'PostController');

Route::resource('comment','CommentController');

Route::resource('article','ArticleController');

Route::resource('category','CategoryController');

Route::resource('events','EventController');

//routes that take you to the about pages of mmucu

Route::get('about', 'AboutController@index');
Route::get('about/executive', 'AboutController@executive');
Route::get('about/praiseAndWorship', 'AboutController@praiseAndWorship');
Route::get('about/media', 'AboutController@media');
Route::get('about/intercession', 'AboutController@intercession');
Route::get('about/sundaySchool', 'AboutController@sundaySchool');
Route::get('about/ushers', 'AboutController@ushers');

Route::get('members', 'JoinGroupController@showMembers');

Route::group(['middleware' =>
'App\Http\Middleware\AdminMiddleware'],
    function()
    {
        Route::get('maintain/{command)','AdminController@artisan');

        //finally
        Route::resource('admin', 'AdminController');

        //maybe add superadmin with cpanelish code and live shell later


    });

Route::get('test', 'WelcomeController@test');
Route::get('test2', 'WelcomeController@test2');

Route::get('uploads', 'ImageController@getMultiple');
Route::post('uploads', 'ImageController@postMultiple');

