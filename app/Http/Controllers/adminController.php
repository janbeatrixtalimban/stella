<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\auditlogs;
use App\Project;
use App\reportimage;
use App\report;

use App\imgportfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class adminController extends Controller
{
    public function getDashboard()
    {
        $num = 1;
        $zero = 0;
        $model = 3;
        $emp = 2;
        $models = DB::table('users')
        ->where('status' , $num)
        ->where('typeID', $model)
        ->count();
        $numModels = DB::table('users')
        ->where('typeID', $model)
        ->count();
        $employer = DB::table('users')
        ->where('status' , $num)
        ->where('typeID', $emp)
        ->count();
        $numEmps = DB::table('users')
        ->where('typeID', $emp)
        ->count();

        $admin = 1;
        $adminuser = User::where('typeID', $admin)->get();
        $details = User::where('typeID', $admin)
        ->get();

        $projActive = DB::table('projects')
        ->where('hidden', '1')
        ->count();

        $proj = DB::table('projects')
        ->count();

        $audit = auditlogs::join('users', 'users.userID', 'auditlogs.userID')
        ->where('users.typeID', $admin)
        ->paginate(15);

      
                           
        return view('StellaAdmin.dashboard', compact('adminuser'))
        ->with('models', $models)->with('numModels', $numModels)
        ->with('employer', $employer)->with('numEmps', $numEmps)
        ->with('details', $details)->with('audit', $audit)
        ->with('projActive', $projActive)->with('proj', $proj);
    }

    public function Login()
    {
        return view('StellaAdmin.adminlogin');
    }

    public function viewincome()
    {
        $trans = DB::table('transactiondetails')->get();
        $total = DB::table('transactiondetails')->sum('amount');
        //dd($total);
        $totalemp = DB::table('transactiondetails')->where('amount', '250.00')->sum('amount');
        $totalmod = DB::table('transactiondetails')->where('amount', '169.00')->sum('amount');
        
        //dd($dataPoints);
        //dd($totalemp);
        return view('StellaAdmin.viewincome', ['trans' => $trans], ['total' => $total])->with('totalmod', $totalmod)->with('totalemp', $totalemp);
        
    }
    public function AdminLogin(Request $request)
    {

        
           $Credentials = ['emailAddress' => ($request->emailAddress), 'password' => ($request->password), 'typeID' => '1'];
            {
                $authenticate = auth::attempt($Credentials);
                if ($authenticate) {
                    
                    $user = auth::user();

                        $auditlogs = new auditlogs;
                        $auditlogs->userID =  Auth::user()->userID;;
                        $auditlogs->logType = 'login:Admin';
                        
                
                        if ($auditlogs->save() && $user) 
                        {
                            $num = 1;
                            $zero = 0;
                            $model = 3;
                            $emp = 2;
                            $models = DB::table('users')
                            ->where('status' , $num)
                            ->where('typeID', $model)
                            ->count();
                            $numModels = DB::table('users')
                            ->where('typeID', $model)
                            ->count();
                            $employer = DB::table('users')
                            ->where('status' , $num)
                            ->where('typeID', $emp)
                            ->count();
                            $numEmps = DB::table('users')
                            ->where('typeID', $emp)
                            ->count();
                    
                            $admin = 1;
                            $adminuser = User::where('typeID', $admin)->get();
                            $details = User::where('typeID', $admin)
                            ->get();
                    
                    
                            $projActive = DB::table('projects')
                            ->where('hidden', '1')
                            ->count();
                    
                            $proj = DB::table('projects')
                            ->count();
                    
                            $audit = auditlogs::join('users', 'users.userID', 'auditlogs.userID')
                            ->where('users.typeID', $admin)
                            ->get();
                    
                          
                                               
                            return view('StellaAdmin.dashboard', compact('adminuser'))
                             ->with('models', $models)->with('numModels', $numModels)
                            ->with('employer', $employer)->with('numEmps', $numEmps)
                            ->with('details', $details)->with('audit', $audit)
                            ->with('projActive', $projActive)->with('proj', $proj);
                        } else 
                        {
                            return ('fail');
                        }

                   }
                                 
                 else {
                 
                    $errmsg = "Email or Password is Invalid";
                    return redirect()->back()->with('failure', $errmsg);
                    
                }    
            }
        
    }

    public function adminlogout()
    {
        
        Auth::logout();
        return redirect()->to('/loginUser');  
    }

    // ADD ADMIN
    public function getAddAdmin()
    {
        return view('StellaAdmin.addAdmin');
    }

    public function createAdmin(request $request)
    {

            if (Auth::check()) 
            {

	$otherValidator = Validator::make($request->all(), [

            'created_at',
            'updated_at',
            'token',

        ]);

	$contactValidator = Validator::make($request->all(), [

            'contactNo' => 'required|max:11|regex:/^[0-9]+$/',

        ]);


	$addressValidator = Validator::make($request->all(), [

	   'address', // => 'required|max:150',
          'location', // => 'required|string|max:50',
	   'zipcode', // => 'required|size:4',

        ]);


        $birthdateValidator = Validator::make($request->all(), [
             
            'birthDate' => 'required|before:18 years ago',     

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
        
                //error messages if validation fails
                if ($birthdateValidator->fails()) {
                    $errormsg = "*Admin has to be 18 years old or older.";
                    return redirect()->back()->with('birthday', $errormsg);

                } 

 	       else if ($contactValidator->fails()) {
                    $errormsg = "*Your contact number format is incorrect.";
                    return redirect()->back()->with('contact', $errormsg);
                }

                
                else if ($otherValidator->fails()) {
                    $errormsg = "Oops. Something went wrong.";
                    return redirect()->back()->with('other', $errormsg);
                }

	       else if ($addressValidator->fails()) {
                    $errormsg = "*Please check your address format.";
                    return redirect()->back()->with('address', $errormsg);
                }

                else if ($nameValidator->fails()) {
                    $errormsg = "*Numbers and symbols are not allowed on names.";
                    return redirect()->back()->with('name', $errormsg);
                } 

                else if ($emailValidator->fails()) {
                    $errormsg = "*That email is already registered.";
                    return redirect()->back()->with('email', $errormsg);
                } 
                
                else if ($passwordValidator->fails()) {
                    $errormsg = "*Your passwords do not match.";
                    return redirect()->back()->with('password', $errormsg);
                }


                    $input = $request->all();
                    $input['password'] = Hash::make($input['password']);
                    $input['typeID'] = '1';
                    $input['skillID'] = '1';
                    $input['status'] = '0';
                    $input['token'] = '';
                    $input['filePath'] = 'N/A';
                    $input['tnc'] = '1';
                    $input['avatar'] = 'N/A';
                    $input['address'] = $request->input('unitNo') . ' ' . $request->input('street') . ' ' . $request->input('brgy') . ' ' . $request->input('city') ;
                
                    $user = User::create($input);
                    
                    $auditlogs = new auditlogs;
                    $auditlogs->userID =   Auth::user()->userID;
                    $auditlogs->logType = "Added new admin";
                    
            
                    if ($auditlogs->save() && $user) 
                    {
			  $successmsg = "Admin Added!";
                        return redirect()->to('/admin/viewAdmin')->with('success', $successmsg);
                    }
                    else 
                    {
                        "FAIL :(((";
                    }

        }  else 
        {
            "FAIL :(((";
        }
         
    }
    

    //VIEW USERS (employers and models)
    public function viewModel(Request $request)
    {
        $num = 3;
        $user = User::where('typeID', $num)->get();
        $userID =  $request->get('userID'); 
        // $details = User::where('typeID', $num)->where('users.userID', $user->userID)->join('attributes', 'attributes.userID', '=', 'users.userID')
        // ->get();
        return view('StellaAdmin.viewModels', compact('user'))
           ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function viewEmployer(Request $request)
    {
        $num = 2;
        $user = User::where('typeID', $num)->get();
        $userID =  $request->get('userID'); 
        $details = User::where('typeID', $num)
        ->join('companies', 'companies.userID', '=', 'users.userID')
        ->get();
    //    dd($details);
        return view('StellaAdmin.viewEmployers', compact('user'))
           ->with('i', (request()->input('page', 1) - 1) * 5)->with('details', $details);
           
    }

    public function viewAuditLog()
    {

        $audit = DB::table('auditlogs')->get();

        return view('StellaAdmin.viewAuditLog', ['audit' => $audit]);
    }

    public function viewAdmin(Request $request)
    {
        $num = 1;
        $user = User::where('typeID', $num)->get();
        $userID =  $request->get('userID'); 
        $details = User::where('typeID', $num)
        ->get();
    //    dd($details);
        return view('StellaAdmin.viewAdmins', compact('user'))
           ->with('i', (request()->input('page', 1) - 1) * 5)->with('details', $details);
           
    }

    public function viewJobPost()
    {
        $num = 1;
        $details = report::join('projects', 'projects.projectID', 'reports.projectID')
        ->join('users', 'users.userID', '=', 'reports.ownerID')
        ->where('reportstatus', $num)
        ->orderBy('reports.created_at', 'desc')
        ->get();
        //dd($details);
        return view('StellaAdmin.viewJobPostReports')
           ->with('details', $details);
           
    }

    public function viewImage()
    {
        $num = 1;
        $details = reportimage::join('imgportfolios', 'imgportfolios.imageID', 'reportimages.imageID')
        ->join('users', 'users.userID', '=', 'reportimages.modelID')
        ->where('imgstatus', $num)
        ->orderBy('reportimages.created_at', 'desc')
        ->get();
        //dd($details);
        return view('StellaAdmin.viewPhotoReports')
           ->with('details', $details);
           
    }

    
    public function archiveJobPost(Request $request)
    {
        if (Auth::check())
        {
            $validator = Validator::make($request->all(), [

                'hidden',
                'updated_at',
            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());

            }
            $hidden = '0';
           
            $projectID = $request->get('projectID');
            
            $project = project::where('projectID', $projectID)->update(['hidden' => $hidden]);
            $hide = report::where('projectID', $projectID)->update(['reportstatus' => '0']);
         

            $auditlogs = new auditlogs;
            $auditlogs->userID = Auth::user()->userID;
            $auditlogs->logType = 'archived Job Post';

            if ($auditlogs->save() && $project) {
                $num = 1;
                $details = report::join('projects', 'projects.projectID', 'reports.projectID')
                ->join('users', 'users.userID', '=', 'reports.ownerID')
                ->where('reportstatus', $num)
                
                ->get();
                //dd($details);
                return view('StellaAdmin.viewJobPostReports')
                   ->with('details', $details);
            } else {
                return ('failed');
            }

        } else {
            return ('fail');
        }

        
    }

    public function archiveImage(Request $request)
    {
        if (Auth::check())
        {
            $validator = Validator::make($request->all(), [

                'display',
                'updated_at',
            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());

            }
            $display = 'none';
           
            $imageID = $request->get('imageID');
            
            $image = imgportfolio::where('imageID', $imageID)->update(['display' => $display]);
            $archive = reportimage::where('imageID', $imageID)->update(['imgstatus' => '0']);
         

            $auditlogs = new auditlogs;
            $auditlogs->userID = Auth::user()->userID;
            $auditlogs->logType = 'archived Image';

            if ($auditlogs->save() && $image) {
                $num = 1;
                $details = reportimage::join('imgportfolios', 'imgportfolios.imageID', 'reportimages.imageID')
                ->join('users', 'users.userID', '=', 'reportimages.modelID')
                ->where('imgstatus', $num)
                ->orderBy('reportimages.created_at', 'desc')
                ->get();
                //dd($details);
                return view('StellaAdmin.viewPhotoReports')
                   ->with('details', $details);
            } else {
                return ('failed');
            }

        } else {
            return ('fail');
        }

        
    }

    public function countPremium()
    {
        $num = 1;
        $model = 3;
        $users = DB::table('users')
        ->where('status' , $num)
        ->where('typeID', $model)
        ->count();
        dd($users);

        return view('StellaAdmin.dashboard')
        ->with('users', $users);
    }


}
