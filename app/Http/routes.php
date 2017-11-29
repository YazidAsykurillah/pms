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

Route::get('/', function () {
    return view('welcome');
});

//Route::auth();

Route::get('login', 'PmsAuthController@getLogin');
Route::post('login', 'PmsAuthController@postLogin');
Route::get('logout', 'PmsAuthController@getLogout');

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/dashboard', function(){
		return view('dashboard');
	});

	//User route
	Route::resource('user', 'UserController');
	
	//Client route
	Route::post('client/delete', 'ClientController@delete');
	Route::resource('client', 'ClientController');

	//Project route
	Route::post('project/delete', 'ProjectController@delete');
	Route::resource('project', 'ProjectController');

	//Datatables route controller
	Route::controller('datatables', 'DatatablesController', [
	    'getUsers'  => 'datatables.getUsers',
	    'getClients'  => 'datatables.getClients',
	    'getProjects'  => 'datatables.getProjects',
	]);
	

	//Select2 route Controller 
		//client
		Route::get('select2Client', 'Select2Controller@select2Client');
		//project manager
		Route::get('select2ProjectManager', 'Select2Controller@select2ProjectManager');
});


