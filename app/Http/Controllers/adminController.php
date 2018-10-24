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
       
        return view('StellaAdmin.dashboard', compact('adminuser'))
        ->with('models', $models)->with('numModels', $numModels)
        ->with('employer', $employer)->with('numEmps', $numEmps)
        ->with('details', $details);
    }

    public function Login()
    {
        return view('StellaAdmin.adminlogin');
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
                           
                            return view('StellaAdmin.dashboard', compact('adminuser'))
                            ->with('models', $models)->with('numModels', $numModels)
                            ->with('employer', $employer)->with('numEmps', $numEmps)
                            ->with('details', $details);
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
        return redirect()->to('/admin/login');  
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
                $validator = Validator::make($request->all(), [
                    'lastName' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
                    'firstName' => 'string|max:50|regex:/^[a-zA-Z_\-]+$/',
                    'contactNo' => 'required|max:11|regex:/^[0-9]+$/',
                    'birthDate' => 'required|before:18 years ago',
                    'emailAddress' => 'required|email|unique:users,emailAddress',
                    'location' => 'required',
                    'password' => 'required|string|min:6',
                    'confirmpassword' => 'required|same:password',
                    'zipcode',
                    'created_at',
                    'updated_at',
                    'token',
                    'filePath',
                ]);
                if ($validator->fails()) {
                    return redirect()->to($validator->errors());
        
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
                        return redirect()->to('/admin/dashboard');
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
         

            $auditlogs = new auditlogs;
            $auditlogs->userID = Auth::user()->userID;
            $auditlogs->logType = 'archived Image';

            if ($auditlogs->save() && $image) {
                $num = 1;
                $details = reportimage::join('imgportfolios', 'imgportfolios.imageID', 'reportimages.imageID')
                ->join('users', 'users.userID', '=', 'reportimages.modelID')
                ->where('imgstatus', $num)
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
