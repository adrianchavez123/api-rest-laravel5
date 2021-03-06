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

Route::get('/',function()
{
	/*$user = new \App\User;
	$user->name = 'adrian chavez';
	$user->email = 'adrianchavez0651@gmail.com';
	$user->password = Hash::make('1234');
	$user->save();

	return "usuario agregado";*/
});
/*
Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/

Route::resource('users','UserController',['except' => ['create', 'edit']]);
Route::resource('users.addresses','UserAddressController',['except' => ['create', 'edit']]);
Route::resource('users.sales','UserSaleController',['except' => ['create', 'edit','update','delete']]);
Route::resource('categories','CategoryController',['except' => ['create', 'edit']]);
Route::resource('categories.products','CategoryProductController',['except' => ['create', 'edit']]);
Route::resource('sales','SaleController',['except' => ['create', 'edit','store','update','delete']]);


