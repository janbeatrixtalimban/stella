<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\auditlogs;
use App\Project;
use Validator;

class ModelController extends Controller
{
    public function modelProfile()
    {
        return view('StellaModel.modelProfile');
    }

    public function modelHomepage()
    {
        $projects = Project::latest()->paginate(10);
        return view('StellaModel.homepage',compact('projects'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    } 

    public function modelEditProfile()
    {
       
        return view('StellaModel.editProfile');
    }

    public function attribute()
    {
        return view('StellaModel.modelattributes');
    }



    public function editNaModel(Request $request, $id){

        // dd(Auth::user());
        $user = user::find($id);
        if (Auth::check()) {
                  $validator = Validator::make($request->all(), [
                      
                      'contactNo' => 'required|max:11|regex:/^[0-9]+$/',
                      'location' => 'required',
                      'updated_at',
                  ]);
                  if ($validator->fails()) {
                      return redirect()->to($validator->errors());
          
                  }
                  $contactNo = $request->input('contactNo');
                  $location = $request->input('location');


                  $user = user::where('userID', $id)->update(['contactNo' => $contactNo, 'location' => $location]);
          
                  //return view('StellaModel.homepage');
                  
                
            //return redirect()->back()->with('alert', 'Updated!');

                        $auditlogs = new auditlogs;
                        $auditlogs->userID =  Auth::user()->userID;;
                        $auditlogs->logType = 'Edit profile';
                        
                
                        if ($auditlogs->save() && $user) 
                        {
                            return redirect()->to('/modelprofile')->with('alert', 'Updated!');
                        } else 
                        {
                            return ('fail');
                        }

            
              }
              else {
                  return('fail');
              }
         
      }
}
