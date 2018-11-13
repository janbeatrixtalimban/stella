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

//REDIRECT TO LOGIN
//Route::post('loginUser', [ 'as' => 'login', 'uses' => 'loginController@Login']);

//registerModel
Route::get('/', 'UserController@home');
Route::get('/register', 'UserController@userRegistration');
Route::post('register', 'UserController@create');
Route::get('/verify/{code}', 'UserController@activated');

//registerEmployer
Route::get('/registerEmployer', 'UserController@employerRegistration');
Route::post('registerEmployer', 'UserController@addEmployer');

//SEARCH
route::get('/search','UserController@search'); //for the model's page
route::get('/find','UserController@find'); //for the employer's page

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::group(['middleware' => ['XSS']], function ()
    {
        Route::group(['middleware' => 'web'], function () 
        {
            Route::group(['middleware' => 'auth'], function () 
            {
                Route::get('/admin/dashboard', 'adminController@getDashboard');
                Route::get('/admin/addAdmin', 'adminController@getAddAdmin');
                Route::post('/admin/addAdmin', 'adminController@createAdmin');
                Route::get('/admin/ViewModel', 'adminController@viewModel');
                Route::get('/admin/ViewEmployer', 'adminController@viewEmployer');
                Route::get('/admin/ViewAuditLog', 'adminController@viewAuditLog');
                Route::get('/admin/viewAdmin', 'adminController@viewAdmin');
                Route::get('/admin/reportedJobs', 'adminController@viewJobPost');
                Route::get('/admin/reportedImg', 'adminController@viewImage');
                Route::post('/admin/archiveJobPost', 'adminController@archiveJobPost');
                Route::post('/admin/archiveImage', 'adminController@archiveImage');
                Route::get('/admin/countpremium', 'adminController@countPremium');
	            Route::get('/admin/income', 'adminController@viewincome'); 
            });
        });
    });

});

Route::group(['middleware' => 'App\Http\Middleware\ModelMiddleware'], function()
{
    Route::group(['middleware' => ['XSS']], function ()
    {
        Route::group(['middleware' => 'web'], function () 
        {
            Route::group(['middleware' => 'auth'], function () 
            {
                Route::get('/addPortfolio', 'portfolioController@create');
                Route::post('/createPortfolio', 'portfolioController@store');
                Route::get('/modelprofile', 'ModelController@modelProfile');
                Route::get('/modelfeed', 'ModelController@modelHomepage');
                Route::get('/modeleditprofile', 'ModelController@modelEditProfile');
                Route::post('/SaveEdit/{id}', 'ModelController@editNaModel');
                Route::get('/modelattribute', 'ModelController@viewDetails');
                Route::post('/updateAttribute/{id}', 'ModelController@updateAttributes');
               
                Route::get('/model/viewPortfolio', 'ModelController@viewPortfolio');
                Route::get('/model/viewJobOffers', 'ModelController@viewOffer');
                Route::get('/model/viewacceptedoffers', 'ModelController@viewAccepted');
                Route::get('/model/viewAcceptedApplication', 'ModelController@acceptedApplications');
                Route::post('/model/reportJobPost', 'ModelController@reportJobPost');
                Route::post('/model/accept', 'ModelController@acceptOffer');
                Route::get('/model/forgotPassword', 'ModelController@forgotPassword');
                Route::post('/model/changePassword', 'ModelController@changepassword');
                Route::post('/model/archive', 'portfolioController@archivePortfolio');
                Route::post('/model/haggle', 'ModelController@haggleFee');
                Route::post('/model/reject', 'ModelController@rejectOffer');
                Route::post('/avatarupload', 'ModelController@storeAvatar');
                Route::post('/model/apply', 'ModelController@applyJobPost');

                // Route::get('/gopremium', 'UserController@paypal');
                // Route::post('/status/{id}', 'UserController@editStatus');

                // //gallery --- not sure where
                // Route::get('imagegalleryview2/{id}', 'portfolioController@viewindex2');
                // Route::post('imagegalleryview/{id}', 'portfolioController@refresh');
                // Route::get('imagegalleryview/{id}', 'portfolioController@viewindex');
                // Route::get('viewviewimage/{id}', 'portfolioController@viewimage');
                // Route::resource('feedbacks','FeedbackController');
                // Route::get('/leavefeedback', 'FeedbackController@leavefeedback');
		        // Route::post('freetrial', 'UserController@freetrial');
                                
                //single --- not sure where
                Route::get('singleimageview/{id}', 'portfolioController@singleview');
                //viewing the employer profile as a model
            Route::get('/employerp/view/{userID}','UserController@employerView');
    
            });
        });
    });

});

Route::group(['middleware' => 'App\Http\Middleware\EmployerMiddleware'], function()
{
    Route::group(['middleware' => ['XSS']], function ()
    {
        Route::group(['middleware' => 'web'], function () 
        {
            Route::group(['middleware' => 'auth'], function () 
            {
            //Employer
            Route::resource('projects', 'EmployerController');
            Route::get('/addJob', 'EmployerController@createPost');
            Route::post('/addPost', 'EmployerController@storePost');
            //Route::get('/projects/{project}/edit', 'EmployerController@edit');
            Route::get('/employerprofile', 'EmployerController@employerProfile');
            Route::get('/employerHome', 'EmployerController@Ehomepage');
            Route::get('/employercreatejob', 'EmployerController@employerCreateJob');
            Route::post('/employer/archive', 'EmployerController@archiveJobPost');
            //viewing the model's profile as an employer
            Route::get('/profile/view/{userID}','UserController@singleView');
            Route::get('/subscriptionEmployer', 'UserController@subscriptionEmp');
            Route::get('/editPost/{id}', 'EmployerController@showProj');
            Route::post('/SaveProj', 'EmployerController@updateProj');
		    
            //profile
            Route::get('/editProfileEmp', 'EmployerController@getProfile');
            Route::post('/SaveEditEmp/{id}', 'EmployerController@editEmployer');
            Route::get('/editCompany', 'EmployerController@viewDetails');
            Route::post('/updateCompany/{id}', 'EmployerController@auqNa');
            Route::get('/employer/viewapplicants', 'EmployerController@viewApplicants');
	        Route::get('/employer/viewhired', 'EmployerController@viewHired');
	        Route::get('/employer/viewaccepted', 'EmployerController@viewacceptedmodels');
            Route::post('/employer/accept', 'EmployerController@acceptApplicant');
            Route::get('/employer/forgotPassword', 'EmployerController@forgotPassword');
            Route::post('/employer/changePassword', 'EmployerController@changepassword');
            Route::get('/employer/haggleFee', 'EmployerController@viewhagglefee');
            Route::post('/employer/accepthaggle', 'EmployerController@accepthaggle');
            Route::post('/employer/reportphoto', 'EmployerController@report');
            Route::post('/employer/reject', 'EmployerController@rejectApplicant');
            Route::post('/employer/rejecthaggle', 'EmployerController@rejecthaggle');
            Route::post('/eavatarupload', 'EmployerController@EstoreAvatar');
            Route::post('/employer/hire', 'EmployerController@hireModel');
    

            // Route::get('/gopremium', 'UserController@paypal');
            // Route::post('/status/{id}', 'UserController@editStatus');

            // //gallery --- not sure where
            // Route::get('imagegalleryview2/{id}', 'portfolioController@viewindex2');
            // Route::post('imagegalleryview/{id}', 'portfolioController@refresh');
            // Route::get('imagegalleryview/{id}', 'portfolioController@viewindex');
            // Route::get('viewviewimage/{id}', 'portfolioController@viewimage');
            // Route::resource('feedbacks','FeedbackController');
            // Route::get('/leavefeedback', 'FeedbackController@leavefeedback');
		    // Route::post('freetrial', 'UserController@freetrial');
    
            //single --- not sure where
            Route::get('singleimageview/{id}', 'portfolioController@singleview');

            });
        });
    });

});

Route::group(['middleware' => ['XSS']], function ()
{
    Route::group(['middleware' => 'web'], function () {
        
    
        Route::group(['middleware' => 'auth'], function () {
    

            Route::get('/gopremium', 'UserController@paypal');
            Route::post('/status/{id}', 'UserController@editStatus');
    
            //gallery --- not sure where
            Route::get('imagegalleryview2/{id}', 'portfolioController@viewindex2');
            Route::post('imagegalleryview/{id}', 'portfolioController@refresh');
            Route::get('imagegalleryview/{id}', 'portfolioController@viewindex');
            Route::get('viewviewimage/{id}', 'portfolioController@viewimage');
            Route::resource('feedbacks','FeedbackController');
            Route::get('/leavefeedback', 'FeedbackController@leavefeedback');
		    Route::post('freetrial', 'UserController@freetrial');
    
            // single --- not sure where
            // Route::get('singleimageview/{id}', 'portfolioController@singleview');

            Route::get('/subscription', 'UserController@subscription');
        });
    
        //need for cancel button at register
        Route::get('/home', function(){
            return view('StellaHome/home');
        });

        });
          
        });
    
      



