<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Validator;

class registerModelController extends Controller
{
    //
    public function modelRegistration(){
    	
        
         return view('user/register');
    }
    

    public function store()
    {
        
        $this->validate(request(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'middleName' => 'required',
            'birthDate' => 'required',
            'location' => 'required',
            'aboutDescription' => 'required',
            'emailAddress' => 'required|email',
            'userName' => 'required',
            'password' => 'required',
            'created_at',
            'updated_at'
        ]);
        
        $person = User::create(request(['firstName','lastName','middleName','birthDate', 'location', 'aboutDescription', 'emailAddress', 'userName', 'password']));
        
       
        
        return redirect()->to('/register');
        
    }
}
