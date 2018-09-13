<?php

namespace App\Http\Controllers;

use App\User;
use\App\Notifications\VerifyEmail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;






class UserController extends Controller
{
    //

    public function userRegistration()
    {
        return view('phaseOne.register');
    }
    
   
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastName' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'firstName' => 'string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'middleName' => 'required|string|max:50||regex:/^[a-zA-Z_\-]+$/',
            'contactNo' => 'required|max:11|regex:/^[0-9]+$/',
            'birthDate' => 'required|before:18 years ago',
            'emailAddress' => 'required|email|unique:users,emailAddress',
            'location' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'company' => 'string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'aboutDescription',
            'password' => 'required|string|min:6',
            'confirmpassword' => 'required|same:password',
            'created_at',
            'updated_at',
            'token',
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
	
        return  (string) $resp;
       
        
    }
}


