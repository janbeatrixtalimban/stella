<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;



class UserController extends Controller
{
    //

    public function userRegistration(){
        return view('user.register');
    }
    
   
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastName' => 'required|string',
            'firstName' => 'required|string',
            'middleName' => 'required|string',
            'birthDate' => 'required',
            'emailAddress' => 'required|string|email|unique:users',
            'location' => 'required|string',
            'aboutDescription' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'confirmpassword' => 'required|same:password',
        ]);
    }

     

    public function create(request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['typeID'] = '1';
        $input['skillID'] = '1';
        return User::create($input);
    }
}
