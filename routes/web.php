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

 //ADMIN LOGIN
 Route::get('/admin/login', 'adminController@Login');
 Route::post('/admin/adminlogin', 'adminController@AdminLogin');
 Route::get('/admin/logout', 'adminController@adminlogout');

//login and logout
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
        Route::get('/model/viewPortfolio', 'ModelController@viewPortfolio');

        Route::get('/gopremium', 'UserController@paypal');
        Route::post('/status/{id}', 'UserController@editStatus');

        //avatar
        Route::post('/avatarupload', 'ModelController@storeAvatar');
       // Route::post('/eavatarupload', 'EmployerController@EstoreAvatar');

        //application (model to employer)
        Route::post('/model/apply', 'ModelController@applyJobPost');
        Route::post('/employer/hire', 'EmployerController@hireModel');
        
        //jusss
        //gallery
        Route::get('imagegalleryview/{id}', 'portfolioController@viewindex');
        Route::get('viewviewimage/{id}', 'portfolioController@viewimage');

        //Employer
        Route::resource('projects', 'EmployerController');
        Route::get('/addJob', 'EmployerController@createPost');
        Route::post('/addPost', 'EmployerController@storePost');
        //Route::get('/projects/{project}/edit', 'EmployerController@edit');
        Route::get('/employerprofile', 'EmployerController@employerProfile');
        Route::get('/employerHome', 'EmployerController@Ehomepage');
        Route::get('/employercreatejob', 'EmployerController@employerCreateJob');
        Route::post('/employer/archive', 'EmployerController@archiveJobPost');
        Route::get('/subscriptionEmployer', 'UserController@subscriptionEmp');
        Route::get('/editPost/{id}', 'EmployerController@showProj');
        Route::post('/SaveProj', 'EmployerController@updateProj');
        //profile
        Route::get('/editProfileEmp', 'EmployerController@getProfile');
        Route::post('/SaveEditEmp/{id}', 'EmployerController@editEmployer');
        Route::get('/editCompany', 'EmployerController@viewDetails');
        Route::post('/updateCompany/{id}', 'EmployerController@auqNa');


        //ADMIN SIDE!!!!
        Route::get('/admin/dashboard', 'adminController@getDashboard');
        Route::get('/admin/addAdmin', 'adminController@getAddAdmin');
        Route::post('/admin/addAdmin', 'adminController@createAdmin');
        Route::get('/admin/ViewModel', 'adminController@viewModel');
        Route::get('/admin/ViewEmployer', 'adminController@viewEmployer');
        Route::get('/admin/ViewAuditLog', 'adminController@viewAuditLog');
    });

    Route::get('/imagegalleryview', function(){
        return view('/StellaModel/imagegalleryview');
    });
});

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/loginUser', 'loginController@Login')->name('loginUser');
