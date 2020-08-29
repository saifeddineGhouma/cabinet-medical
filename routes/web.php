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

Route::get('/home', 'HomeController@index')->name('home');

 Route::prefix('admin')->group(function() {
     Route::get('/register',
   'Admin\AdminRegisterController@showregisterFrom')->name('admin.register');
       Route::post('/register',
   'Admin\AdminRegisterController@create')->name('admin.register.submit');
   Route::get('/login',
   'Admin\AdminLoginController@showLoginForm')->name('admin.login');
   Route::post('/login', 'Admin\AdminLoginController@login')->name('admin.login.submit');
   Route::get('logout/', 'Admin\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
  }) ;

  Route::prefix('architecte')->group(function() {

       Route::get('/register',
   'Architecte\ArchitecteRegisterController@showregisterFrom')->name('architecte.register');
         Route::post('/register',
   'Architecte\ArchitecteRegisterController@showregisterFrom')->name('architecte.register.submit');
   Route::get('/login',
   'Architecte\ArchitecteLoginController@showLoginForm')->name('architecte.login');
   Route::post('/login', 'Architecte\ArchitecteLoginController@login')->name('architecte.login.submit');
   Route::get('logout/', 'Architecte\ArchitecteLoginController@logout')->name('architecte.logout');
    Route::get('/', 'Architecte\ArchitecteController@index')->name('architecte.dashboard');
  }) ;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/******route front */

Route::get('/',function(){
 return view('front.index');
});
