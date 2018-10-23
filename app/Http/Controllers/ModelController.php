<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\attribute;
use App\auditlogs;
use App\feedback;
use App\Project;
use App\applicant;
use App\report;
use App\hire;
use Validator;
use Mail;
use Image;
use Carbon\Carbon;

class ModelController extends Controller
{

    public function forgotPassword()
    {
        return view('StellaModel.forgotpassword');
    }

    public function changepassword(Request $request)
    {
        if (Auth::check()) {
            
            $Credentials = ['password' == Auth::user()->password];
            {
                
                if ($Credentials) {
           

                $userID = Auth::user()->userID;

                $passwordValidator = Validator::make($request->all(), [
                      
                    'vpassword' => 'required|string|min:6',
                    'npassword' => 'required|same:password',
        
                ]);

                // $input['npassword'] = bcrypt($input['npassword']);
                $input = $request->all();
                $npassword = bcrypt($input['npassword']);
                
                
                $user = user::where('userID',  $userID)->update(['password' => $npassword]);
                return view('StellaModel.forgotpassword')->with('message', 'IT WORKS!');
           
        }
        else{
            return view('bye');
        }
            }
    }
    
        
    }


    public function modelProfile()
    {
        // $details = attribute::latest();
        // return view('StellaModel.modelProfile', compact('details'));
       
        if (Auth::check()) {
            
           
            $details = attribute::where('userID', auth::user()->userID)->first();
            $feedback = feedback::where('reciever', auth::user()->userID)->paginate(5);
                //dd($feedback);
                
                $rating = feedback::where('reciever', auth::user()->userID)->avg('rate');
                $rating = round($rating);
            
            return view('StellaModel.modelProfile')->with('details', $details)->with('feedback',$feedback)->with('rating',$rating);
        }
          
    }
    
    public function modelHomepage(Request $request)
    {

        $projects = project::join('users', 'users.userID', '=', 'projects.userID')
        ->join('companies', 'companies.userID', '=', 'projects.userID')
        ->paginate(5);

    //    return view('StellaModel.homepage')->with('projects', $projects);
        //dd($projects);
        $projectID =  $request->get('projectID'); 
        $details = Project::where('projectID', $projectID)
        ->join('users', 'users.userID', '=', 'projects.userID')
        ->get();
        //$projects = Project::latest()->paginate(5);
        return view('StellaModel.homepage',compact('projects'))
        ->with('i', (request()->input('page', 1) - 1) * 5)->with('details', $details);
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

                      'skill' => 'required|string|max:50',
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
                    $skill = $request->input('skill');
                    $address = $request->input('unitNo') . ' ' . $request->input('street') . ' ' . $request->input('brgy') . ' ' . $request->input('city') ;
                    $location = $request->input('location');
                    $zipcode = $request->input('zipcode');

                    $user = user::where('userID', $id)->update(['contactNo' => $contactNo, 'location' => $location,'skill' => $skill, 'firstName' => $firstName, 'lastName' => $lastName, 'address' => $address, 'zipcode' => $zipcode]);
          

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
         
                    $auditlogs = new auditlogs;
                    $auditlogs->userID =  Auth::user()->userID;
                    $auditlogs->logType = 'Updated avatar';
                    
            
                    if ($auditlogs->save() && $user) 
                    {
                        return back()
                        ->with('success','You have successfully upload image.');
                    } else 
                    {
                        return ('fail');
                    }
                   
         
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
            $input['applicantStatus'] = '0';
            $input['candidateID'] = Auth::user()->userID;
            $input['projectID'] = $request->input('projectID');
            $input['userID'] = $projects->userID;
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

    public function viewOffer()
    {
        // $details = applicant::join('projects', 'projects.projectID', 'applicants.projectID')
        // ->join('users', 'applicants.candidateID', 'users.userID')
        // ->where('applicants.userID', Auth::user()->userID)->get();

        $details = hire::join('projects', 'projects.projectID', 'hires.projectID')
        ->join('users', 'hires.userID', 'users.userID')
        ->join('companies','hires.userID', 'companies.userID' )
        ->where('hires.modelID', Auth::user()->userID)->get();

            return view('StellaModel.viewJobOffers')->with('details', $details);
    }

    public function acceptOffer(Request $request)
    {

        if (Auth::check()) {
            $validator = Validator::make($request->all(), [

                'hirestatus',
                'updated_at',
            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());

            }
            $status = '1';
           
            $hireID = $request->get('hireID');
            $emailAddress = $request->get('emailAddress');
            $hire = hire::where('hireID', $hireID)->update(['hirestatus' => $status]);
            $this->acceptNotif($emailAddress);
            //return view('StellaModel.homepage');

            //return redirect()->back()->with('alert', 'Updated!');

            $auditlogs = new auditlogs;
            $auditlogs->userID = Auth::user()->userID;
            $auditlogs->logType = 'Accepted job offer';

            if ($auditlogs->save() && $hire) {

                $details = hire::join('projects', 'projects.projectID', 'hires.projectID')
                ->join('users', 'hires.userID', 'users.userID')
                ->join('companies','hires.userID', 'companies.userID' )
                ->where('hires.modelID', Auth::user()->userID)->get();

                 return view('StellaModel.viewJobOffers')->with('details', $details);
            } else {
                return ('failed');
            }

        } else {
            return ('fail');
        }

    }
    public function acceptNotif($email)
    {
        $data = array('name' => "ello");
        //'text' => 'mail' :: loob ng () mail
        Mail::send(['html' => 'accept'], $data, function ($message) use ($email) {
            $message->to($email, $email)->subject
                ('STELLA Email Accept Notification');
            $message->from('stella.model.ph@gmail.com', 'Stella PH');
        });
        
    }

    public function reportJobPost(Request $request)
    {
        if (Auth::check()) {

            $projectID = $request->get('projectID');            
            $projects = project::where('projectID', $projectID)->join('users', 'users.userID', '=', 'projects.userID')
            ->first();
            $input['reportstatus'] = '1';
            $input['userID'] = Auth::user()->userID;
            $input['ownerID'] = $request->input('ownerID');
            $input['projectID'] = $request->input('projectID');
            $report = report::create($input);
               
                  $auditlogs = new auditlogs;
                  $auditlogs->userID =  Auth::user()->userID;
                  $auditlogs->logType = 'reported job post';
                  
                  if ($auditlogs->save() && $report) 
                  {
                      return redirect()->to('/modelfeed')->with('alert', 'Reported!');
                  } else 
                  {
                      return ('fail');
                  }
        }
        else {
            return('fail');
        }
        
    }

    public function haggleFee(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'haggleAmount', 
                'updated_at',
            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());
    
            }
            $hireID = $request->get('hireID');
            $haggleStatus = '0';
            $haggleAmount = $request->input('haggleAmount');
            
            
            $hire = hire::where('hireID', $hireID)
            ->update(['haggleAmount' => $haggleAmount, 'haggleStatus' => $haggleStatus]);
    
                  $auditlogs = new auditlogs;
                  $auditlogs->userID =  Auth::user()->userID;
                  $auditlogs->logType = 'Added talent fee';
                  
          
                  if ($auditlogs->save() && $hire) 
                  {
                    $details = hire::join('projects', 'projects.projectID', 'hires.projectID')
                    ->join('users', 'hires.userID', 'users.userID')
                    ->join('companies','hires.userID', 'companies.userID' )
                    ->where('hires.modelID', Auth::user()->userID)->get();
            
                        return view('StellaModel.viewJobOffers')->with('details', $details);
                  } else 
                  {
                      return ('fail');
                  }
      
        }
        else {
            return('fail');
        }
    }

    public function rejectOffer(Request $request)
    {

        if (Auth::check()) {
            $validator = Validator::make($request->all(), [

                'hirestatus',
                'updated_at',
            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());

            }
            $status = '2';
           
            $hireID = $request->get('hireID');
            $emailAddress = $request->get('emailAddress');
            $hire = hire::where('hireID', $hireID)->update(['hirestatus' => $status]);
            //$this->acceptNotif($emailAddress);
            //return view('StellaModel.homepage');

            //return redirect()->back()->with('alert', 'Updated!');

            $auditlogs = new auditlogs;
            $auditlogs->userID = Auth::user()->userID;
            $auditlogs->logType = 'Rejected job offer';

            if ($auditlogs->save() && $hire) {

                $details = hire::join('projects', 'projects.projectID', 'hires.projectID')
                ->join('users', 'hires.userID', 'users.userID')
                ->join('companies','hires.userID', 'companies.userID' )
                ->where('hires.modelID', Auth::user()->userID)->get();

                 return view('StellaModel.viewJobOffers')->with('details', $details);
            } else {
                return ('failed');
            }

        } else {
            return ('fail');
        }

    }

}
