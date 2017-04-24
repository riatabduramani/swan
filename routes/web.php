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

Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin|superadmin|employee']], function() {
	Route::resource('/users','Admin\\UserController');
	Route::resource('/roles','Admin\\RoleController');
	Route::resource('/permissions','Admin\\PermissionController');
	Route::resource('/packet', 'Admin\\PacketsController');
	Route::get('/dashboard', function () {
	    return view('admin.dashboard');
	});
	Route::resource('/customer-status', 'Admin\\CustomerStatusController');
	Route::resource('/service-items', 'Admin\\ServiceItemsController');
	Route::resource('/potential', 'Admin\\PotentialController');
	Route::resource('/invoice', 'Admin\\InvoiceController');

	//Potential Customers
	Route::resource('/potential', 'Admin\\PotentialController');
	Route::get('/potential/tocustomer/{id}', 'Admin\\PotentialController@toCustomer');
	Route::post('/potential/comment','Admin\\PotentialController@storecomment');
	Route::get('/potential/comment/{id}', 'Admin\\PotentialController@deleteComment');

	
	Route::get('/invoice/custominvoice/{id}', 'Admin\\InvoiceController@showcustominvoice');
	Route::get('/invoice/packetinvoice/{id}', 'Admin\\InvoiceController@showpacketinvoice');
	//Route::post('/invoice/custominvoice/update', 'Admin\\InvoiceController@updatecustompaymentinvoice');

	Route::post('/invoice/custominvoice/', [
	'as' => 'invoice_path',
	'uses' => 'Admin\\InvoiceController@displayForm'
	]);


	Route::post('/invoice/custominvoice/create', [
	'as' => 'invoice_update',
	'uses' => 'Admin\\InvoiceController@updatecustompaymentinvoice'
	]);

	Route::post('/invoice/packetinvoice/create', [
	'as' => 'invoice_packet_update',
	'uses' => 'Admin\\InvoiceController@updatepacketpaymentinvoice'
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

	Route::post('/invoice/packetinvoice/add','Admin\\InvoiceController@storePacketInvoice');

	Route::get('product_prices', 'Admin\\InvoiceController@product_prices');
	//END INVOICE PACKET	

	Route::resource('/customer', 'Admin\\CustomerController');
	Route::post('/customer/comment','Admin\\CustomerController@storecomment');
	Route::get('/customer/comment/{id}', 'Admin\\CustomerController@deleteComment');
	Route::get('/customer/invoice/{id}', 'Admin\\CustomerController@deleteInvoice');
	//Route::get('/customer/allowlogin/{id}', 'Admin\\CustomerController@allowlogin');
	Route::post('/customer/allowlogin', array('as' => 'allowLogin', 'uses' => 'Admin\\CustomerController@allowlogin'));
	Route::post('/customer/attachdoc', array('as' => 'attach', 'uses' => 'Admin\\CustomerController@attachdocument'));
	Route::delete('/customer/attachdoc/{id}', 'Admin\\CustomerController@deleteDocument');
	//Route::post('/customer/attachdoc','Admin\\CustomerController@attachdocument');

	//Todolist
	Route::post('/customer/todolist','Admin\\CustomerController@createtask');
	Route::get('/customer/todolist/{id}', 'Admin\\CustomerController@deleteTask');
	Route::get('/customer/todolist/done/{id}', 'Admin\\CustomerController@doneTask');

	//Profile
	Route::resource('/profile', 'Admin\\ProfileController');

	//Tasks
	Route::resource('/tasks', 'Admin\\TodolistController');
	Route::post('/tasks','Admin\\TodolistController@createtask');
	Route::get('/tasks/done/{id}', 'Admin\\TodolistController@doneTask');

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
