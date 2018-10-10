<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\attribute;
use App\auditlogs;
use App\Project;
use App\applicant;
use Validator;
use Mail;
use Image;

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
        $projects = Project::latest()->paginate(5);
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
                    $firstName = $request->input('firstName');
                    $lastName = $request->input('lastName');
                    $contactNo = $request->input('contactNo');
                    $address = $request->input('unitNo') . ' ' . $request->input('street') . ' ' . $request->input('brgy') . ' ' . $request->input('city') ;
                    $location = $request->input('location');
                    $zipcode = $request->input('zipcode');

                    $user = user::where('userID', $id)->update(['contactNo' => $contactNo, 'location' => $location,
                    'firstName' => $firstName, 'lastName' => $lastName, 'address' => $address, 'zipcode' => $zipcode]);
          

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
                'eyeColor', 
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
            $eyeColor = $request->input('eyeColor');
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
            ->update(['eyeColor' => $eyeColor, 'hairColor' => $hairColor, 'hairLength' => $hairLength,
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
        
        	if ($request->hasFile('avatar')) {

                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
         
                $avatar = $request->file('avatar');
                $image_ext = $avatar->GetClientOriginalExtension();
                $new_avatar_name = time() . '.' .$image_ext;
               // Image::make($avatar)->resize(200,200)->save( public_path('/uploads/avatars'.$image_ext) );
                $destination_path = public_path('/uploads/avatars');
                    $avatar->move($destination_path,$new_avatar_name);
                    $input = $new_avatar_name;
                    //$input['userID'] = Auth::user()->userID;

            
                    $user = user::where('userID', Auth::user()->userID)->update(['avatar' => $input ]);
         

                    return back()
                    ->with('success','You have successfully upload image.');
         
                }
            else
            {                       
                return "Image too large, please upload a smaller image size";        
            }

    }

    
    public function applyJobPost(Request $request)
    {
       
        // $projects = Project::where('projectID', $projectID)->first();
        // $projectID = $request->get('projectID');
        if (Auth::check()) {

            $projectID = $request->get('projectID');            
            $projects = project::where('projectID', $projectID)->join('users', 'users.userID', '=', 'projects.userID')
            ->first();
            $input['status'] = '0';
            $input['userID'] = Auth::user()->userID;
            $input['projectID'] = $request->input('projectID');
            $input['emailAddress'] = $projects->emailAddress;
            $applicant = applicant::create($input);

            //$user = user::find(Auth::user()->userID)->join('projects', 'users.userID', '=', 'projects.userID')->first();

            $this->emailNotifApplyJob($input['emailAddress']);
           //dd($projects);
           
    
                  $auditlogs = new auditlogs;
                  $auditlogs->userID =  Auth::user()->userID;
                  $auditlogs->logType = 'Applied job';
                  
                  if ($auditlogs->save() && $applicant) 
                  {
                      return redirect()->to('/modelfeed')->with('alert', 'Updated!');
                  } else 
                  {
                      return ('fail');
                  }
        }
        else {
            return('fail');
        }
   
    }

    public function emailNotifApplyJob($email)
    {
          
        $data = array('name' => "ello");
        //'text' => 'mail' :: loob ng () mail
        Mail::send(['html' => 'application'], $data, function ($message) use ($email) {
            $message->to($email, $email)->subject
                ('STELLA Email Notification');
            $message->from('stella.model.ph@gmail.com', 'Stella PH');
        });
        //echo "Registered! Email Sent. Check your inbox.";
    }

    public function viewPortfolio()
    {
        
            return view('StellaModel.updatePortfolio');
    }
          

}
