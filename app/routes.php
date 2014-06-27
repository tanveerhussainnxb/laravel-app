<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Setup route for home page
Route::get('/', 'HomeController@showWelcome');

// Setup route for all customer request
Route::resource('customers', 'CustomerController');

// Setup user login page for get request
Route::get('/user/login', 'UserController@login');

// Setup user login page for post request
Route::post('/user/login', 'UserController@validateUser');

// Setup user sign up page for get request
Route::get('/user/sign_up', 'UserController@sign_up');

// Setup user sign up page for post request
Route::post('/user/sign_up', 'UserController@validateUserSignUp');

// Setup user login page for get request
Route::get('/user/logout', 'UserController@logout');
