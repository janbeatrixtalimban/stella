<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    //

    public function Login(){
        
      
            return view('StellaHome.login');
        
        

     }

     public function userLogin(Request $request)
    {

        
           $Credentials = ['emailAddress' => ($request->emailAddress), 'password' => ($request->password)];
            {
                $authenticate = auth::attempt($Credentials);
                if ($authenticate) {
                    
                    $user = auth::user();
                   if(Auth::user()->typeID== 3){

                    $projects = Project::latest()->paginate(50);

                    return view('StellaModel.homepage',compact('projects'))
                        ->with('i', (request()->input('page', 1) - 1) * 5);
                   }
                   
                   else{

                    $projects = Project::latest()->paginate(10);
                    return view('StellaEmployer.employerProfile',compact('projects'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);

                   }
                                 
                } else {
                 
                    $errmsg = "Email or Password is Invalid";
                    return redirect()->back()->with('failure', $errmsg);
                    
                }    
            }
        
    }


    public function logout()
    {
        Auth::logout();
        return view('StellaHome.login');
    }
    
}
