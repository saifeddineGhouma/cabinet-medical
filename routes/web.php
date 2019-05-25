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

  Route::prefix('medecin')->group(function() {

       Route::get('/register',
   'Medecin\MedecinRegisterController@showregisterFrom')->name('medecin.register');
         Route::post('/register',
   'Medecin\MedecinRegisterController@showregisterFrom')->name('medecin.register.submit');
   Route::get('/login',
   'Medecin\MedecinLoginController@showLoginForm')->name('medecin.login');
   Route::post('/login', 'Medecin\MedecinLoginController@login')->name('medecin.login.submit');
   Route::get('logout/', 'Medecin\MedecinLoginController@logout')->name('medecin.logout');
    Route::get('/', 'Medecin\MedecinController@index')->name('medecin.dashboard');
  }) ;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
