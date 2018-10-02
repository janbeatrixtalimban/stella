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
Route::get('/loginUser', 'loginController@Login');
Route::post('loginUser', 'loginController@userLogin');
Route::get('/logout', 'loginController@logout');


//registerModel
Route::get('/', 'UserController@home');
Route::get('/register', 'UserController@userRegistration');
Route::post('register', 'UserController@create');
Route::get('/verify/{token}', 'VerifyController@verify')->name('verify');


//registerEmployer
Route::get('/registerEmployer', 'UserController@employerRegistration');
Route::post('registerEmployer', 'UserController@addEmployer');

Route::group(['middleware' => 'web'], function () {
    //Route::group(['middleware' => 'scope:CommandCenter'], function () {

    Route::group(['middleware' => 'auth'], function () {
      
            //Model side 
            Route::get('/addPortfolio', 'portfolioController@create');
            Route::post('/createPortfolio', 'portfolioController@store');
            Route::get('/modelprofile', 'ModelController@modelProfile');
            Route::get('/modelfeed', 'ModelController@modelHomepage');
            Route::get('/modeleditprofile', 'ModelController@modelEditProfile');
            Route::get('/editProfile/{id}', 'ModelController@edit');
            Route::post('/SaveEdit/{id}', 'ModelController@editNaModel'); 
            Route::get('/modelattribute', 'ModelController@attribute');
            

            Route::get('/subscription', 'UserController@subscription');
            Route::get('/subscriptionEmployer', 'UserController@subscriptionEmp');
            Route::get('/gopremium', 'UserController@paypal');
            Route::post('/status/{id}', 'UserController@editStatus');

            //jusss                     
            //gallery
            Route::get('imagegalleryview/{id}', 'portfolioController@viewindex');


            //prj
            Route::resource('projects','EmployerController');
            Route::get('/employerprofile', 'EmployerController@employerProfile');
            Route::get('/employercreatejob', 'EmployerController@employerCreateJob');
            
    });
});


// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/loginUser', 'loginController@Login')->name('loginUser');