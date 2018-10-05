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
        //Route::get('/editProfile/{id}', 'ModelController@edit');
        Route::post('/SaveEdit/{id}', 'ModelController@editNaModel');
        Route::get('/modelattribute', 'ModelController@viewDetails');
        Route::post('/updateAttribute/{id}', 'ModelController@updateAttributes');
        Route::get('/subscription', 'UserController@subscription');

        Route::get('/gopremium', 'UserController@paypal');
        Route::post('/status/{id}', 'UserController@editStatus');

        //jusss
        //gallery
        Route::get('imagegalleryview/{id}', 'portfolioController@viewindex');

        //Employer
        Route::resource('projects', 'EmployerController');
        Route::get('/addJob', 'EmployerController@createPost');
        Route::post('/addPost', 'EmployerController@storePost');
        //Route::get('/projects/{project}/edit', 'EmployerController@edit');
        Route::get('/employerprofile', 'EmployerController@employerProfile');
        Route::get('/employerHome', 'EmployerController@Ehomepage');
        Route::get('/employercreatejob', 'EmployerController@employerCreateJob');
        Route::get('/subscriptionEmployer', 'UserController@subscriptionEmp');
        Route::get('/editPost/{id}', 'EmployerController@showProj');
        Route::post('/SaveProj', 'EmployerController@updateProj');
        //profile
        Route::get('/editProfileEmp', 'EmployerController@getProfile');
        Route::post('/SaveEditEmp/{id}', 'EmployerController@editEmployer');
        Route::get('/editCompany', 'EmployerController@viewDetails');
        Route::post('/updateCompany/{id}', 'EmployerController@auqNa');
    });
});

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/loginUser', 'loginController@Login')->name('loginUser');