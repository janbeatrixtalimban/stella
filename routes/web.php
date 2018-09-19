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



Route::get('/', function () {
    return view('welcome');
});

*/

//login and logoout
Route::get('/login', 'loginController@Login');
Route::post('login', 'loginController@userLogin');
Route::get('/logout', 'loginController@logout');



//registerModel
Route::get('/', 'UserController@userRegistration');
Route::post('register', 'UserController@create');
Route::get('/verify/{token}', 'VerifyController@verify')->name('verify');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//idk
// Route::get('sendbasicemail','MailController@basic_email');
// Route::get('sendhtmlemail','MailController@html_email');
// Route::get('sendattachmentemail','MailController@attachment_email');