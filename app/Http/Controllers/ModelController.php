<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\attribute;
use App\auditlogs;
use App\Project;
use Validator;

class ModelController extends Controller
{
    public function modelProfile()
    {
        // $details = attribute::latest();
        // return view('StellaModel.modelProfile', compact('details'));
       
        if (Auth::check()) {
            
            $details = attribute::where('userID', auth::user()->userID)->first();
            
            return view('StellaModel.modelProfile')->with('details', $details);
        }
          
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
                        $auditlogs->userID =  Auth::user()->userID;
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
    
    public function viewDetails()
    {
       
        if (Auth::check()) {
            $details = attribute::where('userID', auth::user()->userID)->first();
            return view('StellaModel.modelattributes')->with('details', $details);
        }
   
    }

    public function updateAttributes(Request $request, $id)
    {
        $user = user::find($id);
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'hairColor', 
                'hairLength', 
                'weight', 
                'height',
                'complexion', 
                'gender', 
                'chest', 
                'waist', 
                'hips', 
                'shoeSize',
                'tatoo', 
                'updated_at',
            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());
    
            }
            $hairColor = $request->input('hairColor');
            $hairLength = $request->input('hairLength');
            $weight = $request->input('weight');
            $height = $request->input('height');
            $complexion = $request->input('complexion');
            $gender = $request->input('gender');
            $chest = $request->input('chest');
            $waist = $request->input('waist');
            $hips = $request->input('hips');
            $shoeSize = $request->input('shoeSize');
            $tatoo = $request->input('tatoo');
            
            $attribute = attribute::where('userID', auth::user()->userID)
            ->update(['hairColor' => $hairColor, 'hairLength' => $hairLength,
            'weight' => $weight, 'height' => $height,
            'complexion' => $complexion, 'gender' => $gender,
            'chest' => $chest, 'waist' => $waist,
            'hips' => $hips, 'shoeSize' => $shoeSize, 'tatoo' => $tatoo]);
    
                  $auditlogs = new auditlogs;
                  $auditlogs->userID =  Auth::user()->userID;
                  $auditlogs->logType = 'Edit attributes';
                  
          
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


    public function storeAvatar(Request $request)
    {
        
        	if (Auth::check()) {

                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
         
                $destination_path = public_path('uploads');
                    $avatar->move($destination_path,$new_avatar);
                    $input['avatar'] = $new_avatar;
                    $input['userID'] = Auth::user()->userID;
         
                return back()
                    ->with('success','You have successfully upload image.');
         
                }
            else
            {                       
                return "FAILED Authentication";        
            }
    }

    public function avatar()
    {
        return view('modelprofile',compact('avatar'));

    }

    public function viewAvatar(Request $request, $id)
    {
        $user = user::find($id);
        
        if (Auth::check()) {
                  
            $avatar = DB::table('users')->select('avatar')->where('userID', $id)->get();
            
            return view('modelprofile',compact('avatar'));
          
              }
              else {
                  return('fail');
              }
    }

    


}
