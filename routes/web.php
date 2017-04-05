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

Route::get('contact', function () {
    return view('frontend.pages.contact');
});

Route::get('about', function () {
    return view('frontend.pages.about');
});

Route::get('services', function () {
    return view('frontend.pages.services');
});

Auth::routes();

///Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function() {
	Route::resource('/users','Admin\\UserController');
	Route::resource('/roles','Admin\\RoleController');
	Route::resource('/packet', 'Admin\\PacketsController');
	Route::get('/dashboard', function () {
	    return view('admin.home');
	});
	Route::resource('/customer-status', 'Admin\\CustomerStatusController');
	Route::resource('/customer', 'Admin\\CustomerController');
	Route::resource('/service-items', 'Admin\\ServiceItemsController');
	Route::resource('/potential', 'Admin\\PotentialController');
	Route::resource('/invoice', 'Admin\\InvoiceController');

	Route::get('/invoice/custominvoice/{id}', 'Admin\\InvoiceController@showcustominvoice');
	//Route::post('/invoice/custominvoice/update', 'Admin\\InvoiceController@updatecustompaymentinvoice');

	Route::post('/invoice/custominvoice/', [
	'as' => 'invoice_path',
	'uses' => 'Admin\\InvoiceController@displayForm'
	]);


	Route::post('/invoice/create', [
	'as' => 'invoice_update',
	'uses' => 'Admin\\InvoiceController@updatecustompaymentinvoice'
	]);

	Route::get('/invoice/{id}', [
	'as' => 'delete_invoice',
	'uses' => 'Admin\\InvoiceController@destroy'
	]);


	//PACKET INVOICE
	Route::post('/invoice/packetinvoice/', [
	'as' => 'invoice_packet_path',
	'uses' => 'Admin\\InvoiceController@displayFormPacket'
	]);

	Route::get('product_prices', 'Admin\\InvoiceController@product_prices');
	//END INVOICE PACKET	

});

Route::group(['prefix' => 'agent', 'middleware' => ['auth','role:agent']], function() {
	
	//Route::get('/dashboard', 'HomeController@index');
	Route::get('/dashboard', function () {
	    return view('admin.home');
	});
});

Route::group(['prefix' => 'client', 'middleware' => ['auth','role:client']], function() {
	
	
	Route::get('/dashboard', 'HomeController@index');
	
}); 



//Route::resource('/roles','Admin\\RoleController');
//Route::resource('admin/customer-status', 'Admin\\CustomerStatusController');
