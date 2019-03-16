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
Route::post('/user/register', 'UserController@register');
Route::get('/activation/{api_token}',['as'=>'activation','uses'=>'UserController@activation']);
Route::resource('/user/profile','ProfileController');
Route::get('/user/profile/image','ProfileController@edit_profile');
Route::post('/user/profile/image','ProfileController@update_profile');
Route::group(['middleware'=>['auth','activate']],function(){
    Route::get('/diseases', 'PageController@diseases');
    Route::get('/doctors','PageController@chat_with_doctors');
Route::post('/check/diseases','CheckController@check_diseases');
Route::get('/result','CheckController@check_diseases');
Route::post('/contactus','ContactusController@SendMessage');
Route::post('/feedback','ContactusController@feedback');
Route::resource('/doctor/symptoms','symptomByDoctor');
Route::resource('/doctor/diseases','diseaseByDoctor');
Route::get('/show/doctors','PageController@showAllDoctors');
Route::get('/show/patients','PageController@showAllPatients');

// Route::get('/add/symptom','DoctorController@addSymptom');
// Route::post('/add/symptom','DoctorController@storeSymptom');



Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');


});
Route::get('/', 'PageController@home');
Route::get('/contactus', 'PageController@contactUs');
Route::get('/services', 'PageController@services');

Route::get('/popup','PageController@popup');


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
   Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
   Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('auth/logout', 'Auth\LoginController@logout');
Route::group(['middleware'=>['auth', 'role', 'activate']],function(){
    Route::get('/adminpanel','AdminController@index');
    Route::resource('/adminpanel/users','UserController');
    Route::resource('/adminpanel/diseases','DiseaseController');
    Route::resource('/adminpanel/symptoms','SymptomController');
    Route::post('/adminpanel/sendmail','UserController@sendEmail');
    Route::get('/adminpanel/activites','ActivityController@index');
    Route::get('/adminpanel/feedbacks','FeedbackController@index');

});
   
//     Route::get('/adminpanel/chat', 'ChatsController@index');
// Route::get('/adminpanel/messages', 'ChatsController@fetchMessages');
// Route::post('/adminpanel/messages', 'ChatsController@sendMessage');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


