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
Route::get('/', 'PageController@home');
Route::get('/contactus', 'PageController@contactUs');
Route::get('/services', 'PageController@services');
Route::get('/diseases', 'PageController@diseases');
Route::get('/profile', 'PageController@profile');
Route::get('/popup','PageController@popup');

Route::get('/doctors','PageController@chat_with_doctors');
Route::post('/check/diseases','CheckController@check_diseases');
Route::get('/result','CheckController@check_diseases');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
   Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
   Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('auth/logout', 'Auth\LoginController@logout');

    Route::get('/adminpanel','AdminController@index');
    Route::resource('/adminpanel/users','UserController');
    Route::resource('/adminpanel/diseases','DiseaseController');
    Route::resource('/adminpanel/symptoms','SymptomController');
    Route::post('/adminpanel/sendmail','UserController@sendEmail');
    Route::get('/adminpanel/chat', 'ChatsController@index');
Route::get('/adminpanel/messages', 'ChatsController@fetchMessages');
Route::post('/adminpanel/messages', 'ChatsController@sendMessage');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');
