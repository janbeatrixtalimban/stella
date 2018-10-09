<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\auditlogs;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
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
}
