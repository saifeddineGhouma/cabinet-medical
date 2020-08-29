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
Route::get('/', 'HomeController@index')->name('home');
//Routes Benevoles
Route::middleware([ 'BenevolePermission'])->group(function () {
    Route::get('login/benevole', 'BenevoleController@showDashboard')->name('BenevoleshowDashboard');
    Route::get('/confirme/{id}', 'DemandeCourseController@confirme')->name('confirme');




});


//Routes Quarantaines
Route::middleware(['QuarantainePermission'])->group( function () {

    Route::get('/DashboardQuarantaine', 'QuarantaineController@QuarantaineShowDashboard')->name('QuarantaineShowDashboard');
route::post('/saveautorisation','DemandeCourseController@saveAutorisation')->name('saveAutorisation');

    Route::post('/storecourse', 'DemandeCourseController@store')->name('storecourse');

    Route::post('/storemessagequarantaine/{idq}/{idb}', 'MessageController@storemessagequarantaine')->name('storemessagequarantaine');

});
Route::get('/showmessagequarantaine/{idq}/{idb}', 'MessageController@showmessagequarantaine')->name('showmessagequarantaine');

//message

Route::get('/showmessagebenevole/{idq}/{idb}', 'MessageController@showmessagebenevole')->name('showmessagebenevole');
Route::post('/storemessagebenevole/{idq}/{idb}', 'MessageController@storemessagebenevole')->name('storemessagebenevole');


//
//Route::get('/quarantaine', 'QuarantaineController@index');
//Route::get('/q/{id}', 'QuarantaineController@edit')->name('quarantaine.edit');
//Route::delete('/q1/{id}', 'QuarantaineController@destroy')->name('quarantaine.destroy');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('register');
Route::post('/registerQuarantaine', 'Auth\RegisterController@createQuarantaine')->name('createQuarantaine');
Route::post('/registerBenevole', 'Auth\RegisterController@createBenevole')->name('createBenevole');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('Login');

Route::post('/login/','Auth\LoginController@LoginVerification')->name('LoginVerification');
/*
Route::group(['middleware' => ['auth']], function () {*/
    Route::get('login/benevole', 'BenevoleController@showDashboard')->name('BenevoleshowDashboard');

/*});*/
Route::get('/afficheBenevole', 'BenevoleController@index')->name('afficheBenevole');



Route::post('/login/','Auth\LoginController@LoginVerification')->name('LoginVerification');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');





Route::get('get/municipalite/list/{name}', 'Auth\RegisterController@getMunicipalityApi')->name('dynamicdependent.fetch');



//Email

Route::post('/sendemail/send', 'SendEmailController@send')->name('sendEmail');
//Autorites


//autorite
Route::middleware(['AutoritePermission'])->group(function (){


Route::get('login/autorite', 'AutoriteController@showDashboardAutorite')->name('AutoriteshowDashboard');
Route::get('/confirmeauto/{id}', 'DemandeAutorisationController@confirmeauto')->name('confirmeauto');
Route::get('/annuleauto/{id}', 'DemandeAutorisationController@annuleauto')->name('annuleauto');
});




Route::post('/reset/password', 'Auth\ResetPasswordController@validatePasswordRequest')->name('validatePasswordRequest');
Route::post('reset_password_with_token', 'Auth\ResetPasswordController@resetPassword')->name('resetPassword');
Route::get('/reset/password/{msg?}','Auth\ResetPasswordController@showResetForm')->name('ResetPasswordController');
route::get('/password/reset/{token}/{role}/{email}','Auth\ResetPasswordController@showPasswordForm')->name('showPasswordForm');