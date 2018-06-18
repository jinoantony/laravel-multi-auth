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
    return view('welcome');
});

Auth::routes();

// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');

Route::get('subadmin/login', 'Auth\SubadminLoginController@showLoginForm');
Route::post('subadmin/login', 'Auth\SubadminLoginController@login')->name('subadmin.login');

/* Routes for admin */
Route::group(['prefix' => 'subadmin','middleware' => 'assign.guard:subadmin,subadmin/login'],function(){
	
	Route::get('home',function ()
	{
		return view('subadminhome');
	});
});

Route::group(['prefix' => 'admin','middleware' => 'assign.guard:admin,admin/login'],function(){
	
	Route::get('home',function ()
	{
		return view('adminhome');
	});
});

Route::get('/home', 'HomeController@index')->name('home');
