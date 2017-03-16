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
    return view('frontend.index');
});

Auth::routes();

///Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function() {
	//Route::resource('/users','Admin\\UserController');
	Route::resource('/roles','Admin\\RoleController');
	//Route::get('/dashboard', 'HomeController@index');
	Route::get('/dashboard', function () {
	    return view('admin.home');
	});
});

Route::group(['prefix' => 'agent', 'middleware' => ['auth','role:agent']], function() {
	
	//Route::get('/dashboard', 'HomeController@index');
	Route::get('/dashboard', function () {
	    return view('admin.home');
	});
});

Route::group(['prefix' => 'client', 'middleware' => ['auth','role:client']], function() {
	//Route::resource('/users','Admin\\UserController');
	Route::resource('/roles','Admin\\RoleController');
	Route::get('/dashboard', 'HomeController@index');
}); 

//Route::resource('/roles','Admin\\RoleController');