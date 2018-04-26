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

Route::get('/', 'WelcomeController@index');

//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);

Route::get('/admin','AdminhomeController@index');
Route::post('/admin/login','AdminhomeController@dologin');
Route::get('/admin/logout','AdminhomeController@logout');

Route::get('/admin/dashboard', 'DashboardController@index');
Route::get('/admin/post', 'DashboardController@post');
Route::post('/admin/signup', 'UserRegistration@signup');


Route::get('/admin/userlist', 'UserRegistration@getdata');
Route::get('/admin/edituserlist/{id}', 'UserRegistration@edituserlist');
Route::post('/admin/updatedata', 'UserRegistration@updatedata');
Route::get('/admin/deluser/{id}', 'UserRegistration@userdelete');



Route::get('/admin/coursecategorylist', 'CourseController@index');
Route::get('/admin/addcoursecategory', 'CourseController@create');
Route::post('/admin/store', 'CourseController@store');
Route::get('/admin/delcourse/{id}', 'CourseController@destroy');




