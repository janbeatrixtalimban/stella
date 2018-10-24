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
        return view('StellaHome.subscription');
    }
    public function subscriptionEmp()
    {
        return view('StellaHome.subscriptionEmployer');
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


            $transacdetail = transactiondetail::create($transac);

            $auditlogs = new auditlogs;
            $auditlogs->userID =  Auth::user()->userID;
            $auditlogs->logType = 'Paid subcription';
    
            if ($auditlogs->save() && $transac) 
            {
                if (Auth::user()->typeID== 3)
                {
                    return redirect()->to('/subscription');
                }
                else
                {
                    return redirect()->to('/subscriptionEmployer');
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

            'lastName' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'firstName'  => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'contactNo' => 'required|max:11|regex:/^[0-9]+$/',
            'location' => 'required|string|max:50',
            'skill' => 'required|string|max:50',
            'created_at',
            'updated_at',
            'token',
            'filePath',
        ]);

        $birthdateValidator = Validator::make($request->all(), [
             
            'birthDate' => 'required|before:18 years ago',     

        ]);

        $emailValidator = Validator::make($request->all(), [
                      
            'emailAddress' => 'required|email|unique:users,emailAddress',

        ]);

        $passwordValidator = Validator::make($request->all(), [
                      
            'password' => 'required|string|min:6',
            'confirmpassword' => 'required|same:password',

        ]);
        
                //error messages if validation fails
                if ($birthdateValidator->fails()) {
                    $errormsg = "Oops. You have to be 18 years old or older to register with Stella.";
                    return redirect()->back()->with('failure', $errormsg);

                } 
                
                else if ($otherValidator->fails()) {
                    $errormsg = "Oops. Something went wrong with your registration.";
                    return redirect()->back()->with('failure', $errormsg);
                }

                else if ($emailValidator->fails()) {
                    $errormsg = "Oops. That email is already registered with Stella.";
                    return redirect()->back()->with('failure', $errormsg);
                } 
                
                else if ($passwordValidator->fails()) {
                    $errormsg = "Oops. Your passwords do not match.";
                    return redirect()->back()->with('failure', $errormsg);
                }
                
        if ($resp->success) 
        {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $input['typeID'] = '3';
            $input['status'] = '0';
            $input['token'] = str_random(25);
            $input['address'] = $request->input('unitNo') . ' ' . $request->input('street') . ' ' . $request->input('brgy') . ' ' . $request->input('city') ;
          // $path=$request->file('filePath')->store('upload');
          $path = $request->file('filePath');
          $image_ext = $path->GetClientOriginalExtension();
          $new_path_name = time() . '.' .$image_ext;
          Image::make($path)->resize(200,200)->save( public_path('/uploads/path'.$image_ext) );
          $destination_path = public_path('/uploads/avatars');
              $path->move($destination_path,$new_path_name);
              $input['filePath'] = $new_path_name;
         

            $user = User::create($input);
            
            $input2 = $request->only(['eyeColor', 'hairColor','hairLength', 'weight', 'height', 'complexion', 'gender', 'chest', 'waist', 'hips', 'shoeSize','tatoo']);
            $input2['userID'] = $user->userID;
            $attribute = attribute::create($input2);

            
            $auditlogs = new auditlogs;
            $auditlogs->userID =  $user->userID;
            $auditlogs->logType = 'Register:model';
            
            $this->basic_email($input['emailAddress']);
            if ($auditlogs->save() && $user) 
            {
                return redirect()->to('/loginUser');
            } else 
            {
                return redirect()->to('/');
            }

        //     return view('StellaHome.login');
        // } else {
        //     return "FAILED";
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
        $otherValidator = Validator::make($request->all(), [

            'lastName' => 'required|string|max:50',
            'firstName'  => 'required|string|max:50',
            'contactNo' => 'required|max:11|regex:/^[0-9]+$/',
            'location' => 'required|string|max:50',
            'name' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'position' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'created_at',
            'updated_at',
            'token',
            'filePath',
        ]);

        $birthdateValidator = Validator::make($request->all(), [
             
            'birthDate' => 'required|before:18 years ago',     

        ]);

        $emailValidator = Validator::make($request->all(), [
                      
            'emailAddress' => 'required|email|unique:users,emailAddress',

        ]);

        $passwordValidator = Validator::make($request->all(), [
                      
            'password' => 'required|string|min:6',
            'confirmpassword' => 'required|same:password',

        ]);
        
                //error messages if validation fails
                if ($birthdateValidator->fails()) {
                    $errormsg = "Oops. You have to be 18 years old or older to register with Stella.";
                    return redirect()->back()->with('failure', $errormsg);

                } 
                
                else if ($otherValidator->fails()) {
                    $errormsg = "Oops. Something went wrong with your registration.";
                    return redirect()->back()->with('failure', $errormsg);
                }

                else if ($emailValidator->fails()) {
                    $errormsg = "Oops. That email is already registered with Stella.";
                    return redirect()->back()->with('failure', $errormsg);
                } 
                
                else if ($passwordValidator->fails()) {
                    $errormsg = "Oops. Your passwords do not match.";
                    return redirect()->back()->with('failure', $errormsg);
                }

        if ($resp->success) {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['typeID'] = '2';
            // $input['skillID'] = '1';
            $input['address'] = $request->input('unitNo') . ' ' . $request->input('street') . ' ' . $request->input('brgy') . ' ' . $request->input('city') ;
            // $input['company'] = 'N/A';
            $input['token'] = str_random(25);
            

            $path = $request->file('filePath');
                $image_ext = $path->GetClientOriginalExtension();
                $new_path_name = time() . '.' .$image_ext;
                Image::make($path)->resize(200,200)->save( public_path('/uploads/path'.$image_ext) );
                $destination_path = public_path('/uploads/avatars');
                    $path->move($destination_path,$new_path_name);
                    $input['filePath'] = $new_path_name;
           
                    //$path=$request->file('filePath')->store('upload');
              
            $user = User::create($input);
            
            $input['userID'] =  $user->userID;
            $input['description'] = 'N/A';
            $company = company::create($input);

            //Twilio::message($input['contactNo'], 'Welcome to Stella');
            $this->basic_email($input['emailAddress']);
            //lahat ng created pinalitan ko ng user

            $auditlogs = new auditlogs;
            $auditlogs->userID =  $user->userID;
            $auditlogs->logType = 'Register:employer';
            
    
            if ($auditlogs->save() && $user) 
            {
                return redirect()->to('/loginUser');
            } else 
            {
                return redirect()->to('/');
            }
        //     return view('StellaHome.login');
        // } else {
        //     return "FAILED";
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
                
                $projectID =  $request->get('projectID'); 
                $search = $request->get('search');
   	            $searchtype = $request->get('searchtype');
                $projects = project::join('users', 'users.userID', '=', 'projects.userID')
                ->join('companies', 'companies.userID', '=', 'projects.userID')
                ->where('role', 'like', '%'.$searchtype.'%')
                ->where('jobDescription', 'like', '%'.$search.'%')
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
                
    	        return view('StellaModel.singleView', compact('user'))->with('details', $details)->with('feedback', $feedback)->with('rating', $rating);
            }

    public function basic_email($email)
    {
        //$user = $request->get('emailAddress');
       
        $data = array('name' => "hello world");
        Mail::send(['html' => 'mail'], $data, function ($message) use ($email) {
            $message->to($email, $email)->subject
                ('STELLA Account');
            $message->from('stella.model.ph@gmail.com', 'Stella PH');
        });
        echo "Registered! Email Sent. Check your inbox.";
    }

   
}

