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

    #Auth Routes
Route::post('/user/register', 'UserController@register');
Route::get('/activation/{api_token}',['as'=>'activation','uses'=>'UserController@activation']);
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
 Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('auth/logout', 'Auth\LoginController@logout');
    #End Auth Route




Route::group(['middleware'=>['auth','activate']],function(){


        #Diseases Route
    Route::get('/diseases', 'PageController@diseases');
    Route::post('/check/diseases','CheckController@check_diseases');
Route::get('/result','CheckController@check_diseases');
        #End Diseases Route



Route::post('/contactus','ContactusController@SendMessage');
Route::post('/feedback','ContactusController@feedback');

        
        #Doctors Route
Route::get('/doctors','PageController@chat_with_doctors');
Route::resource('/doctor/symptoms','symptomByDoctor');
Route::resource('/doctor/diseases','diseaseByDoctor');
Route::get('/show/doctors','PageController@showAllDoctors');
Route::get('/show/single/doctor/{id}','PageController@showSingleDoctor');
//Route::get('/filter/doctor','PageController@filterDoctor');
        #End Doctors Route


Route::get('/show/patients','PageController@showAllPatients');



    #Profile Route
Route::resource('/user/profile','ProfileController');
Route::get('/user/profile/image','ProfileController@edit_profile');
Route::post('/user/profile/image','ProfileController@update_profile');
    #End Profile Route



    #Chat Route
Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');
    #End Chat Route


});
    #Pages Route
Route::get('/', 'PageController@home');
Route::get('/contactus', 'PageController@contactUs');
Route::get('/services', 'PageController@services');
Route::get('/popup','PageController@popup');
   #End Pages Route



Route::group(['middleware'=>['auth', 'role', 'activate']],function(){

        #Admin Route
    Route::get('/adminpanel','AdminController@index');
    Route::resource('/adminpanel/users','UserController');
    Route::resource('/adminpanel/diseases','DiseaseController');
    Route::resource('/adminpanel/symptoms','SymptomController');
    Route::post('/adminpanel/sendmail','UserController@sendEmail');
    Route::get('/adminpanel/activites','ActivityController@index');
    Route::get('/adminpanel/feedbacks','FeedbackController@index');
        #End Admin Route

});
   

Auth::routes();



