<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    //

    public function Login(){
        
        if(Auth::check()){
            return view('welcome');
        }else{
            return view('phaseOne.login');
        }
        

     }

     public function userLogin(Request $request)
    {
         
        

        $Credentials = ['emailAddress' => ($request->emailAddress), 'password' => ($request->password)];
        
        $authenticate = auth::attempt($Credentials);
        if ($authenticate) {
            $accesstoken = request('accesstoken');
            $user = auth::user();
        //    $success['token'] = $user->createToken('user', ['CommandCenter'])->accessToken;
        return view('welcome');

        } else {
         
        	$errmsg = "Email or Password is Invalid";
            return redirect()->back()->with('failure', $errmsg);
        	
        }
    }


    public function logout()
    {
        Auth::logout();
        return view('phaseOne.login');
    }
    
}