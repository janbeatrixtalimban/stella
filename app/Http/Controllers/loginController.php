<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\auditlogs;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                    //check status if subscribed or not
                    $substatus = DB::table('users')->where('userID', Auth::user()->userID)->select('status')->first();
                    //(status = 1 is subscribed..... status = 0 not subscribed)

		//check if activated
                    if(Auth::user()->status== 404)
                    {
                        $errormsg = "*Please Check your Email to activate your account.";
                    	return redirect()->back()->with('activate', $errormsg);  
                    }

                    //ADMIN LOG IN
                    if(Auth::user()->typeID== 1)
                    {
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
                        } 
                        else 
                        {
                            return ('fail');
                        }

                   
                    }
                    
                    if ($substatus->status == 1){
                        //dd("subscribed");
                        //search for the latest record
                        $transact = DB::table('transactiondetails')->where('userID', Auth::user()->userID)->select('transactiondetails')
                        ->latest()->first();
                        //dd($transact->transactiondetails); //--either 1(free trial), 0(paid), null(no subscirption)

                        if ($transact->transactiondetails == 1){
                            //FREE TRIAL
                            $trialdate = DB::table('transactiondetails')->where('userID', Auth::user()->userID)->latest()->first()->created_at;
                            Carbon::parse($trialdate);
                            $current = Carbon::now('Asia/Manila');
                            $dt      = Carbon::parse($trialdate); 
                            if ($dt->diffInDays($current) > 6) //How many days have passed --if expired
                            {
                                $expired = 0;
                                $currentUser = Auth::user()->userID;
                                DB::table('users')->where('userID', $currentUser)
                                 ->update(['status' => $expired]);
                            }
                        }

                        else if ($transact->transactiondetails == 0){
                            //PAID SUBSCRIPTION
                            $paydate = DB::table('transactiondetails')->where('userID', Auth::user()->userID)->latest()->first()->created_at;
                            Carbon::parse($paydate);
                            $current = Carbon::now('Asia/Manila');
                            $dt      = Carbon::parse($paydate); 
                            if ($dt->diffInDays($current) > 30) //How many days have passed --if expired
                            {
                                $expired = 0;
                                $currentUser = Auth::user()->userID;
                                DB::table('users')->where('userID', $currentUser)
                                 ->update(['status' => $expired]);
                            }
                        }
                    }

                   /* $registerdate = Auth::user()->created_at;
                    $freeday = $registerdate->addDays(7);
                    $current = Carbon::now();
                
                             
                             if(($freeday < $current) & (Auth::user()->status == 1)){
                                
                                
                                $expired = 0;
                                $currentUser = Auth::user()->userID;
                                DB::table('users')->where('userID', $currentUser)
                                 ->update(['status' => $expired]);
                                echo "expired and database has been updated";
                             } */
                    
                    

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
                            return redirect()->to('modelfeed');
                            /*return view('StellaModel.homepage',compact('projects'))
                            ->with('i', (request()->input('page', 1) - 1) * 5)->with('details', $details);*/
                        } else 
                        {
                            return ('fail');
                        }

                   }
                   
                   else{
                    $num = 3;
                    $user = User::where('typeID', $num)->get();
                    $model = User::where('typeID', $num)->get();
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
                            return redirect()->to('employerHome');
                            /*return view('StellaEmployer.homepage', compact('user','projects','model'))
                            ->with('i', (request()->input('page', 1) - 1) * 5)->with('details', $details)->with('projects', $projects);*/
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
