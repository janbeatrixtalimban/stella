<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\auditlogs;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class adminController extends Controller
{
    public function getDashboard()
    {
        return view('StellaAdmin.dashboard');
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
                            return view('StellaAdmin.dashboard');
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

}
