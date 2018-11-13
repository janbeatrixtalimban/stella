<?php

namespace App\Http\Controllers;

use Twilio;
use Carbon\Carbon;
use Mail;
use App\Notifications\VerifyEmail;
use App\User;
use DB;
use Image;
use App\feedback;
use App\company;
use App\Project;
use App\auditlogs;
use App\transactiondetail;
use App\attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //

    public function home()
    {
        return view('StellaHome.home');
    }

    public function userRegistration()
    {
        return view('StellaHome.register');
    }

    public function employerRegistration()
    {
        return view('StellaHome.registerEmployer');
    }

    public function paypal()
    {
        return view('StellaHome.paypal');
    }


    public function subscription()
    {
        $count = DB::table('transactiondetails')->where('userID', Auth::user()->userID)->count();
        if($count == 0){
            $currentUser = Auth::user()->userID;
            $amount = "0.00";
            $trial = DB::table('transactiondetails')->where('userID', $currentUser)
                ->where('amount', $amount)->count();
            if ($trial > 0)
            {
                $hidetrial = "none";
            }
            else{
                $hidetrial = "";
            }
            return view('StellaHome.subscription')->with('hidetrial', $hidetrial);
        }
        else{
            $transact = DB::table('transactiondetails')->where('userID', Auth::user()->userID)->latest()->first();
            $subtype = $transact->transactiondetails;
            $current = Carbon::now('Asia/Manila');
            
          If ($subtype == 1)
          {
              $dt = Carbon::parse($transact->created_at)->addDays(7); 
            $diff = $current->diffInDays($dt);
              
          }
          else {
              $dt = Carbon::parse($transact->created_at)->addDays(30); 
            $diff = $current->diffInDays($dt);
          }
          $currentUser = Auth::user()->userID;
          $amount = "0.00";
          $trial = DB::table('transactiondetails')->where('userID', $currentUser)
              ->where('amount', $amount)->count();
          if ($trial > 0)
          {
              $hidetrial = "none";
          }
          else{
              $hidetrial = "";
          }
          return view('StellaHome.subscription')->with('hidetrial', $hidetrial)->with('diff', $diff);
        }
         
    }

    public function subscriptionEmp()
    {
        $count = DB::table('transactiondetails')->where('userID', Auth::user()->userID)->count();
        if($count == 0){
            $currentUser = Auth::user()->userID;
        $amount = "0.00";
        $trial = DB::table('transactiondetails')->where('userID', $currentUser)
            ->where('amount', $amount)->count();
        if ($trial > 0)
        {
            $hidetrial = "none";
        }
        else{
            $hidetrial = "";
        }
        return view('StellaHome.subscriptionEmployer')->with('hidetrial', $hidetrial);
        }
        else{
            $transact = DB::table('transactiondetails')->where('userID', Auth::user()->userID)->latest()->first();
        //dd($transact);
        $subtype = $transact->transactiondetails;
          $current = Carbon::now('Asia/Manila');
          
        If ($subtype == 1)
        {
            $dt = Carbon::parse($transact->created_at)->addDays(7); 
          $diff = $current->diffInDays($dt);
            
        }
        else {
            $dt = Carbon::parse($transact->created_at)->addDays(30); 
          $diff = $current->diffInDays($dt);
        }
        $currentUser = Auth::user()->userID;
        $amount = "0.00";
        $trial = DB::table('transactiondetails')->where('userID', $currentUser)
            ->where('amount', $amount)->count();
        if ($trial > 0)
        {
            $hidetrial = "none";
        }
        else{
            $hidetrial = "";
        }
        return view('StellaHome.subscriptionEmployer')->with('hidetrial', $hidetrial)->with('diff', $diff);
        }
        
    }

    public function freetrial(Request $request)
    {
                                $active = 1;
                                $currentUser = Auth::user()->userID;
                                DB::table('users')->where('userID', $currentUser)
                                 ->update(['status' => $active]);

                                 
                                echo "expired and database has been updated";

        $id =  Auth::user()->userID;
        $user = user::find($id);

        if (Auth::check()) 
        {

                                

            //$user = user::where('userID', $id)->update(['status' => '1']);

            $transac['userID'] = Auth::user()->userID;
            $transac['amount'] = $request->get('amount');
            $transac['first_name'] = encrypt($request->get('first_name'));
            $transac['last_name'] = encrypt($request->get('last_name'));
            $transac['email'] = $request->get('email');
            $transac['payer_id'] = $request->get('payer_id');
            $transac['phone'] = $request->get('phone');
            $transac['transactiondetails'] = $request->get('transactiondetails');


            $transacdetail = transactiondetail::create($transac);

            $auditlogs = new auditlogs;
            $auditlogs->userID =  Auth::user()->userID;
            $auditlogs->logType = 'Claimed Free Trial';
    
            if ($auditlogs->save() && $transac) 
            {
                if (Auth::user()->typeID== 3)
                {
                    return redirect()->to('modelfeed');
                }
                else
                {
                    return redirect()->to('employerHome');
                }

            } else 
            {
                return ('fail');
            }
            
        }
         
      }


    // subscription of models/employer

    public function editStatus(Request $request, $id)
    {
        $user = user::find($id);
        if (Auth::check()) {

            $user = user::where('userID', $id)->update(['status' => '1']);

            $transac['userID'] = Auth::user()->userID;
            $transac['amount'] = $request->get('amount');
            $transac['first_name'] = encrypt($request->get('first_name'));
            $transac['last_name'] = encrypt($request->get('last_name'));
            $transac['email'] = $request->get('email');
            $transac['payer_id'] = $request->get('payer_id');
            $transac['phone'] = $request->get('phone');
            $transac['transactiondetails'] = 0;


            $transacdetail = transactiondetail::create($transac);

            $auditlogs = new auditlogs;
            $auditlogs->userID =  Auth::user()->userID;
            $auditlogs->logType = 'Paid subcription';
    
            if ($auditlogs->save() && $transac) 
            {
                if (Auth::user()->typeID== 3)
                {
			
$currentUser = Auth::user()->userID;
        $amount = "0.00";
        $trial = DB::table('transactiondetails')->where('userID', $currentUser)
            ->where('amount', $amount)->count();
        if ($trial > 0)
        {
            $hidetrial = "none";
        }
        else{
            $hidetrial = "";
        }
        return view('StellaHome.subscription')->with('hidetrial', $hidetrial);
                    //return redirect()->to('modelfeed');
                }
                else
                {
        $currentUser = Auth::user()->userID;
        $amount = "0.00";
        $trial = DB::table('transactiondetails')->where('userID', $currentUser)
            ->where('amount', $amount)->count();
        if ($trial > 0)
        {
            $hidetrial = "none";
        }
        else{
            $hidetrial = "";
        }
        return view('StellaHome.subscriptionEmployer')->with('hidetrial', $hidetrial);
                    //return redirect()->to('employerHome');
                }

            } else 
            {
                return ('fail');
            }
            
        }
         
      }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastName' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'firstName' => 'string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'contactNo' => 'required|max:11|regex:/^[0-9]+$/',
            'birthDate' => 'required|before:18 years ago',
            'emailAddress' => 'required|email|unique:users,emailAddress',
            'location' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            
            'password' => 'required|string|min:6',
            'confirmpassword' => 'required|same:password',
            'created_at',
            'updated_at',
            'token',
            'filePath',
        ]);
    }

    public function create(request $request)
    {
        
        $skipper = "6LcGAHAUAAAAAK8eMIoIq8oHOUNcgi19wwhIZPgx";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => $skipper,
            'response' => request('g-recaptcha-response'),
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        ]);
        $resp = json_decode(curl_exec($ch));
        curl_close($ch);

        //Validators
        $otherValidator = Validator::make($request->all(), [

            'skill' => 'required|string|max:50',
            'created_at',
            'updated_at',
            'token',

        ]);

	$contactValidator = Validator::make($request->all(), [

            'contactNo' => 'required|max:11|regex:/^[0-9]+$/',

        ]);


	$addressValidator = Validator::make($request->all(), [

	   'address', // => 'required|max:150',  //|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
           'location', // => 'required|string|max:50',
	   'zipcode', // => 'required|size:4',

        ]);


        $birthdateValidator = Validator::make($request->all(), [
             
            'birthDate' => 'required|before:18 years ago',     

        ]);

	$imageValidator = Validator::make($request->all(), [

            'filePath' => 'required|image|mimes:jpeg,png,jpg|max:100000',

        ]);

        $nameValidator = Validator::make($request->all(), [
              
            'lastName' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'firstName'  => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',     

        ]);


        $emailValidator = Validator::make($request->all(), [
                      
            'emailAddress' => 'required|email|unique:users,emailAddress',

        ]);

        $passwordValidator = Validator::make($request->all(), [
                      
            'password' => 'required|string|min:6',
            'confirmpassword' => 'required|same:password',

        ]);

 	$attributeValidator = Validator::make($request->all(), [
                'eyeColor' => 'string|max:50', 
                'hairColor' => 'string|max:50', 
                'hairLength' => 'string|max:50', 
                'weight' => 'integer|between:20,200', 
                'height' => 'integer|between:120,300',
                'complexion' => 'string|max:50', 
                'gender' => 'string|max:50', 
                'chest' => 'integer|between:15,120', 
                'waist' => 'integer|between:10,100', 
                'hips' => 'integer|between:20,120', 
                'shoeSize' => 'integer|between:3,15',
                'tatoo' => 'string|max:50', 
                'updated_at',
            ]);
        
                //error messages if validation fails
                if ($birthdateValidator->fails()) {
                    $errormsg = "*You have to be 18 years old or older to register with Stella.";
                    return redirect()->back()->with('birthday', $errormsg);

                } 

 	       else if ($contactValidator->fails()) {
                    $errormsg = "*Your contact number format is incorrect.";
                    return redirect()->back()->with('contact', $errormsg);
                }

                
                else if ($otherValidator->fails()) {
                    $errormsg = "Oops. Something went wrong with your registration.";
                    return redirect()->back()->with('other', $errormsg);
                }

	       else if ($addressValidator->fails()) {
                    $errormsg = "*Please check your address format.";
                    return redirect()->back()->with('address', $errormsg);
                }

                else if ($nameValidator->fails()) {
                    $errormsg = "*Numbers and symbols are not allowed on your name.";
                    return redirect()->back()->with('name', $errormsg);
                } 

                else if ($emailValidator->fails()) {
                    $errormsg = "*That email is already registered with Stella.";
                    return redirect()->back()->with('email', $errormsg);
                } 

                elseif ($imageValidator->fails()) {
			$errormsg = "*The image you uploaded is too large.";
                    	return redirect()->back()->with('image', $errormsg);    	
		}

                else if ($passwordValidator->fails()) {
                    $errormsg = "*Your passwords do not match.";
                    return redirect()->back()->with('password', $errormsg);
                }

		else if ($attributeValidator->fails()) {
     		    $errormsg = "Please make sure you have entered your real measurements correctly.";
                    return redirect()->back()->with('attribute', $errormsg);
            	}   
                
        if ($resp->success) 
        {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $input['typeID'] = '3';
            $input['status'] = '404';
            $input['token'] = str_random(25);
            $input['address'] = $request->input('unitNo') . ' ' . $request->input('street') . ' ' . $request->input('brgy') . ' ' . $request->input('city') ;
          // $path=$request->file('filePath')->store('upload');
          $path = $request->file('filePath');
          $image_ext = $path->GetClientOriginalExtension();
          $new_path_name = time() . '.' .$image_ext;
          Image::make($path)->resize(200,200)->save( public_path('/uploads/path'.$image_ext) );
          $destination_path = public_path('/uploads/path');
              $path->move($destination_path,$new_path_name);
              $input['filePath'] = $new_path_name;      

            
              $user = User::create($input);
            $input2 = $request->only(['eyeColor', 'hairColor','hairLength', 'weight', 'height', 'complexion', 'gender', 'chest', 'waist', 'hips', 'shoeSize','tatoo']);
            $input2['userID'] = $user->userID;
            
            $attribute = attribute::create($input2);

            

            $auditlogs = new auditlogs;
            $auditlogs->userID =  $user->userID;
            $auditlogs->logType = 'Register:model';
            
            $this->basic_email($input['emailAddress'], $input['token']);
            if ($auditlogs->save() && $user) 
            {
                return redirect()->to('/loginUser');
            } else 
            {
                return redirect()->to('/');
            }

        //     return view('StellaHome.login');
         } else {
             return "FAILED";
         }
    }

    public function addEmployer(request $request)
    {
        $skipper = "6LcGAHAUAAAAAK8eMIoIq8oHOUNcgi19wwhIZPgx";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => $skipper,
            'response' => request('g-recaptcha-response'),
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        ]);
        $resp = json_decode(curl_exec($ch));
        curl_close($ch);

        //Validators
		$nameValidator = Validator::make($request->all(), [
              
            		'lastName' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            		'firstName'  => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',     

        		]);

		$birthdateValidator = Validator::make($request->all(), [
             
            		'birthDate' => 'required|before:18 years ago',     

        		]);
	

                  $contactValidator = Validator::make($request->all(), [

                      'contactNo' => 'required|max:11|regex:/^[0-9]+$/',

                  ]);

		$imageValidator = Validator::make($request->all(), [

                      'filePath' => 'required|image|mimes:jpeg,png,jpg|max:100000',

                  ]);

		$addressValidator = Validator::make($request->all(), [

	   		'address',  // => 'required|max:150|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
           		'location', // => 'required|string|max:50',
	   		'zipcode', // => 'required|size:4',

        		]);

		$companyValidator = Validator::make($request->all(), [

                      'name' => 'required|string|max:50',
            		'position' => 'required|string|max:50',

                  ]);

		$emailValidator = Validator::make($request->all(), [
                      
            		'emailAddress' => 'required|email|unique:users,emailAddress',

        		]);

        		$passwordValidator = Validator::make($request->all(), [
                      
            		'password' => 'required|string|min:6',
            		'confirmpassword' => 'required|same:password',

        		]);



                  if ($nameValidator->fails()) {
                        $errormsg = "*Numbers and symbols are not allowed on your name.";
                    	return redirect()->back()->with('name', $errormsg);          
                  }

		  elseif ($contactValidator->fails()) {
			$errormsg = "*Please follow the contact number format";
                    	return redirect()->back()->with('contact', $errormsg);    	
		  }

		  elseif ($birthdateValidator->fails()) {
                    $errormsg = "*You have to be 18 years old or older to register with Stella.";
                    return redirect()->back()->with('birthday', $errormsg);
                } 

		  elseif ($imageValidator->fails()) {
			$errormsg = "*The image you uploaded is too large.";
                    	return redirect()->back()->with('image', $errormsg);    	
		  }

		  elseif ($addressValidator->fails()) {
			$errormsg = "*Please check your address format.";
                    	return redirect()->back()->with('address', $errormsg);    	
		  }

		  elseif ($companyValidator->fails()) {
			$errormsg = "*Company name or position is too long.";
                    	return redirect()->back()->with('company', $errormsg);    	
		  }

		 else if ($emailValidator->fails()) {
                    $errormsg = "*That email is already registered with Stella.";
                    return redirect()->back()->with('email', $errormsg);
                } 
                
                else if ($passwordValidator->fails()) {
                    $errormsg = "*Your passwords do not match.";
                    return redirect()->back()->with('password', $errormsg);
                }



        
       
        
                
                
        if ($resp->success) {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $input['typeID'] = '2';
	     $input['status'] = '404';
            $input['address'] = $request->input('unitNo') . ' ' . $request->input('street') . ' ' . $request->input('brgy') . ' ' . $request->input('city') ;
            // $input['company'] = 'N/A';
            $input['token'] = str_random(25);
            

            $path = $request->file('filePath');
                $image_ext = $path->GetClientOriginalExtension();
                $new_path_name = time() . '.' .$image_ext;
                Image::make($path)->resize(200,200)->save( public_path('/uploads/path'.$image_ext) );
                $destination_path = public_path('/uploads/path');
                    $path->move($destination_path,$new_path_name);
                    $input['filePath'] = $new_path_name;
           
                    //$path=$request->file('filePath')->store('upload');
              
            $user = User::create($input);
            
            $input['userID'] =  $user->userID;
            $input['description'] = 'Add company description...';
            
            $company = company::create($input);

            $this->basic_email($input['emailAddress'], $input['token']);
            $auditlogs = new auditlogs;
            $auditlogs->userID =  $user->userID;
            $auditlogs->logType = 'Register:employer';
            
    
            if ($auditlogs->save() && $user) 
            {
		$successmsg = "Thank you for registering to Stella! 
				A confirmation email has been sent to your email!";

                return redirect()->to('/loginUser')->with('success', $successmsg);
            } else 
            {
                return redirect()->to('/');
            }
        
        } 
        else {
            return "FAILED";
        }
    }
    	    //SEARCH
   	    //searching for jobs
   	    public function search(Request $request) 
    	    {

   	        /*$search = $request->get('search');
   	        $searchtype = $request->get('searchtype');
            $projects = DB::table('projects')->where('role', 'like', '%'.$searchtype.'%')->where('jobDescription', 'like', '%'.$search.'%')->orWhere('prjTitle', 'like', '%'.$search.'%')->paginate(5);
   	        
                return view('StellaModel.homepage', ['projects' => $projects]);    */   
                
                


                $currentDate = date('Y-m-d');
                        /* $projects = Project::where('userID', Auth::user()->userID)
                         ->where('jobDate', '>', $currentDate)->get();
                        $company = company::where('userID', auth::user()->userID)->first();
                        $timestemp = "2016-4-5 05:06:01";
                        //$today = Carbon\Carbon::today();
                        
                        //$day = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $today)->day;

                        /*return view('StellaEmployer.employerProfile')
                        ->with('company', $company)->with('projects', $projects);*/

                




                
                $projectID =  $request->get('projectID'); 
                $search = $request->get('search');
   	            $searchtype = $request->get('searchtype');
                $projects = project::join('users', 'users.userID', '=', 'projects.userID')
                ->join('companies', 'companies.userID', '=', 'projects.userID')
                ->where('role', 'like', '%'.$searchtype.'%')
                ->where('jobDescription', 'like', '%'.$search.'%')
                ->where('jobDate', '>', $currentDate)
                ->orWhere('prjTitle', 'like', '%'.$search.'%')
                ->paginate(5);

                $details = Project::where('projectID', $projectID)
                    ->join('users', 'users.userID', '=', 'projects.userID')
                    ->get();

                    $auditlogs = new auditlogs;
                    $auditlogs->userID =  Auth::user()->userID;;
                    $auditlogs->logType = 'login:model';
                    
            
                    if ($auditlogs->save() && $projects) 
                    {
                        

                        return view('StellaModel.homepage',compact('projects'))
                        ->with('i', (request()->input('page', 1) - 1) * 5)->with('details', $details);
                    } else 

                    {
                        return ('fail');
                    }
           }
           
    	    //searching for models
    	    public function find(Request $request)
    	    {
                

                $num = 3;
                $user = User::where('typeID', $num)->get();
                $find = $request->get('find');
                $searchtype = $request->get('searchtype');
                $model = User::where('typeID', $num)->get();
                $userID =  $request->get('userID'); 
                $details = User::where('typeID', $num)->join('attributes', 'attributes.userID', '=', 'users.userID')
                ->get();
                $projects = Project::where('userID', Auth::user()->userID)->get();
                
            
                        if ($find=="" && $searchtype=="") {
                        return view('StellaEmployer.homepage', compact('user'))
                        ->with('i', (request()->input('page', 1) - 1) * 5)->with('details', $details)->with('projects', $projects)->with('model',$model); 
                         } 

                        else if ($find!="" && $searchtype=="") {
                        $user = DB::table('users')->where('firstName', 'like', '%'.$find.'%')
                        ->orWhere('lastName', 'like', '%'.$find.'%')->paginate(5);
    	        
                            
                        return view('StellaEmployer.homepage', compact('user'))
                       ->with('i', (request()->input('page', 1) - 1) * 5)->with('details', $details)->with('projects', $projects)->with('model',$model);      
                       } 

                        else if ($find=="" && $searchtype!="") {
            	        $user = DB::table('users')->where('skill', 'like', '%'.$searchtype.'%')->paginate(5);
    	        
                       
                       return view('StellaEmployer.homepage', compact('user'))
                       ->with('i', (request()->input('page', 1) - 1) * 5)->with('details', $details)->with('projects', $projects)->with('model',$model);      
                       }
                
                       else {
            	        $user = DB::table('users')->where('skill', 'like', '%'.$searchtype.'%')->where('firstName', 'like', '%'.$find.'%')->orWhere('lastName', 'like', '%'.$find.'%')->paginate(5);
    	        
                    
                      return view('StellaEmployer.homepage', compact('user'))
                       ->with('i', (request()->input('page', 1) - 1) * 5)->with('details', $details)->with('projects', $projects)->with('model',$model);      
                       }      
                          
                    
        }
    	    //VIEWING A MODEL'S PROFILE
    	    public function singleView($userID)
    	    {
    	        $user = User::where('userID', $userID)->first();
    	        $details = attribute::where('userID', $user->userID)->first();
    	        $feedback = feedback::where('reciever', $user->userID)->paginate(5);
                //dd($feedback);
                
                $rating = feedback::where('reciever', $user->userID)->avg('rate');
                $rating = round($rating);

                $finishedproj = DB::table('projects')
                ->join('hires', 'hires.projectID', '=', 'projects.projectID')
                ->leftjoin('feedback', 'feedback.projectID', '=', 'projects.projectID') //hmmmmmmmmmmmmm
                ->where('hires.modelID', $user->userID)
                //->get();
                //->where('feedback.projectID', '!=', 'projects.projectID')
                //->where('feedback.userID', '!=', Auth::user()->userID)
                //->where('feedback.reciever', '!=', $user->userID)
                
                ->where([
                    ['feedback.projectID', null],
                    ['feedback.userID', null],
                    ['feedback.reciever', null],
                ])
                
                //->whereNull('feedback.userID')
                //->whereNull('feedback.reciever')
                /*->where([
                    ['status', '=', '1'],
                    ['subscribed', '<>', '1'],
                ])*/
                ->get(['projects.projectID AS projectID', 'projects.*']);

                //$user = Auth::user()->userID;
                //'feedback.userID', '!=', 'projects.projectID'

                $projcount = DB::table('projects')
                ->join('hires', 'hires.projectID', '=', 'projects.projectID')
                ->leftjoin('feedback', 'feedback.projectID', '=', 'projects.projectID') //hmmmmmmmmmmmmm
                ->where('hires.modelID', $user->userID)
                ->where([
                    ['feedback.projectID', null],
                    ['feedback.userID', null],
                    ['feedback.reciever', null],
                ])
                ->count();
                //dd($projcount);

                return view('StellaModel.singleView', compact('user'), compact('finishedproj'))->with('details', $details)
                ->with('feedback', $feedback)->with('rating', $rating)->with('projcount', $projcount);
            }

            //VIEWING AN EMPLOYER'S PROFILE
    	    public function employerView($userID)
    	    {
                
                if (Auth::check()) {
                    $user = User::where('userID', $userID)->first();
                    //$user = Auth::user()->userID;
                    
                    
                    $currentDate = date('Y-m-d');
                    $employerr = User::where('userID', $userID)->first();
                    $projects = Project::where('userID', $userID)->where('jobDate', '>', $currentDate)->get();
                    $feedback = feedback::where('reciever', $user->userID)->paginate(5);
                    $company = company::where('userID', $userID)->first();
                    $timestemp = "2016-4-5 05:06:01";
                    $today = Carbon::today();
                    $day = Carbon::createFromFormat('Y-m-d H:i:s', $today)->day;

                    $finishedproj = DB::table('projects')
                    ->join('hires', 'hires.projectID', '=', 'projects.projectID')
                    ->leftjoin('feedback', 'feedback.projectID', '=', 'projects.projectID') //hmmmm
                    ->where('projects.userID', $user->userID)
                    ->where('hires.modelID', Auth::user()->userID)->whereNull('feedback.projectID')->get(['projects.projectID AS projectID', 'projects.*']);
                    //dd($finishedproj);

                    /*$projcount = DB::table('projects')
                    ->join('hires', 'hires.projectID', '=', 'projects.projectID')
                    ->where('projects.userID', $user->userID)
                    ->where('hires.modelID', Auth::user()->userID)
                    ->count();*/

                    $projcount = DB::table('projects')
                    ->join('hires', 'hires.projectID', '=', 'projects.projectID')
                    ->leftjoin('feedback', 'feedback.projectID', '=', 'projects.projectID') //hmmmm
                    ->where('projects.userID', $user->userID)
                    ->where('hires.modelID', Auth::user()->userID)->whereNull('feedback.projectID')
                    ->count();


                    $rating = feedback::where('reciever', $user->userID)->avg('rate');
                $rating = round($rating);
                    
                    //dd($projcount);


                   //dd(Auth::user()->status); 
                    return view('StellaEmployer.employerView', compact('finishedproj'), compact('user'), compact('employerr'), compact('projcount'))
                    ->with('company', $company)->with('projects', $projects)->with('projcount', $projcount)
                    ->with('employerr', $employerr)->with('rating', $rating)->with('feedback', $feedback);
        
                } else {
                    return ('fail');
                }
            
            
            }   
	public function basic_email($email, $random)
    {

        $data = array('name' => "hello world", 'code' => $random);
        Mail::send(['html' => 'mail'], $data, function ($message) use ($email) {
            $message->to($email, $email)->subject
                ('STELLA Account');
            $message->from('stella.model.ph@gmail.com', 'Stella PH');
        });
        echo "Registered! Email Sent. Check your inbox.";
    }

    public function activated($code)
    {
	  $success = "Verified!";
                    
      	$status = 0;
        $verify = user::where('token', $code)->update(['status' => $status]);
        return view('StellaHome.verify')->with('success', $success);
    }
   
}



	
