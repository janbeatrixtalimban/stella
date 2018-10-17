<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\auditlogs;
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

                    $projectID =  $request->get('projectID'); 
                    $projects = project::join('users', 'users.userID', '=', 'projects.userID')
                    ->join('companies', 'companies.userID', '=', 'projects.userID')
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
                   
                   else{
                    $num = 3;
                    $user = User::where('typeID', $num)->get();
                    $userID =  $request->get('userID'); 
                    $details = User::where('typeID', $num)->join('attributes', 'attributes.userID', '=', 'users.userID')
                    ->get();
                    $projects = Project::where('userID', Auth::user()->userID)->get();
                    
                   // $user = User::where('typeID', $num)->get();
                   
                    $auditlogs = new auditlogs;
                        $auditlogs->userID =  Auth::user()->userID;;
                        $auditlogs->logType = 'login:employer';
                        
                
                        if ($auditlogs->save() && $user) 
                        {
                            return view('StellaEmployer.homepage', compact('user'))
           ->with('i', (request()->input('page', 1) - 1) * 5)->with('details', $details)->with('projects', $projects);
                        } else 
                        {
                            return ('fail');
                        }
                    

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
        return redirect()->to('/loginUser');  
    }
    
}
