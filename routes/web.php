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

	Route::resource('/users','Admin\\UserController',['middleware'=>['role:superadmin,admin']]);
	Route::resource('/roles','Admin\\RoleController',['middleware'=>['role:superadmin']]);
	Route::resource('/permissions','Admin\\PermissionController',['middleware'=>['role:superadmin']]);
	Route::resource('/packet', 'Admin\\PacketsController',['middleware'=>['permission:manage-packet']]);

	Route::resource('/dashboard','Admin\\DashboardController');
	Route::resource('/customer-status', 'Admin\\CustomerStatusController',['middleware'=>['permission:manage-statuses']]);
	Route::resource('/service-items', 'Admin\\ServiceItemsController',['middleware'=>['permission:manage-packet']]);
	Route::resource('/potential', 'Admin\\PotentialController',['middleware'=>['permission:manage-potential-customer']]);
	Route::resource('/invoice', 'Admin\\InvoiceController',['middleware'=>['permission:view-listedinvoices']]);

	//Potential Customers
	Route::resource('/potential', 'Admin\\PotentialController',['middleware'=>['permission:manage-potential-customer']]);
	Route::get('/potential/tocustomer/{id}', 'Admin\\PotentialController@toCustomer',['middleware'=>['permission:manage-potential-customer']]);
	Route::post('/potential/comment','Admin\\PotentialController@storecomment',['middleware'=>['permission:manage-potential-customer']]);
	Route::get('/potential/comment/{id}', 'Admin\\PotentialController@deleteComment',['middleware'=>['permission:manage-potential-customer']]);

	
	Route::get('/invoice/custominvoice/{id}', 'Admin\\InvoiceController@showcustominvoice',['middleware'=>['permission:view-listedinvoices']]);
	Route::get('/invoice/packetinvoice/{id}', 'Admin\\InvoiceController@showpacketinvoice',['middleware'=>['permission:view-listedinvoices']]);
	//Route::post('/invoice/custominvoice/update', 'Admin\\InvoiceController@updatecustompaymentinvoice');

	Route::post('/invoice/custominvoice/', [
	'as' => 'invoice_path',
	'uses' => 'Admin\\InvoiceController@displayForm',
	'middleware'=>['permission:view-listedinvoices']
	]);


	Route::post('/invoice/custominvoice/create', [
	'as' => 'invoice_update',
	'uses' => 'Admin\\InvoiceController@updatecustompaymentinvoice',
	'middleware'=>['permission:view-listedinvoices']
	]);

	Route::post('/invoice/packetinvoice/create', [
	'as' => 'invoice_packet_update',
	'uses' => 'Admin\\InvoiceController@updatepacketpaymentinvoice',
	'middleware'=>['permission:view-listedinvoices']
	]);


	Route::get('/invoice/{id}', [
	'as' => 'delete_invoice',
	'uses' => 'Admin\\InvoiceController@destroy',
	'middleware'=>['permission:view-listedinvoices']
	]);

	//PACKET INVOICE
	Route::post('/invoice/packetinvoice/', [
	'as' => 'invoice_packet_path',
	'uses' => 'Admin\\InvoiceController@displayFormPacket',
	'middleware'=>['permission:view-listedinvoices']
	]);

	Route::post('/invoice/packetinvoice/add','Admin\\InvoiceController@storePacketInvoice',['middleware'=>['permission:view-listedinvoices']]);

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


Route::group(['prefix' => 'client', 'middleware' => ['auth','role:client']], function() {
	Route::get('/dashboard', 'HomeController@index');
	
}); 



//Route::resource('/roles','Admin\\RoleController');
//Route::resource('admin/customer-status', 'Admin\\CustomerStatusController');
