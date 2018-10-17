<?php

namespace App\Http\Controllers;

use App\auditlogs;
use App\company;
use App\Project;
use App\User;
use App\attribute;
use App\hire;
use App\applicant;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Image;

class EmployerController extends Controller
{
    public function forgotPassword()
    {
        return view('StellaEmployer.forgotpassword');
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
                return view('StellaEmployer.forgotpassword');
           
        }
        else{
            return view('bye');
        }
            }
    }
    
        
    }

    public function index()
    {

        if (Auth::check()) {

            $projects = Project::where('userID', Auth::user()->userID)->get();
            //dd($projects);
            $details = company::where('userID', auth::user()->userID)->first();

            return view('StellaEmployer.employerProfile')->with('details', $details)->with('projects', $projects);

        } else {
            return ('fail');
        }
    }

    public function employerProfile()
    {
        //$user = user::find($id);

        if (Auth::check()) {

            $projects = Project::where('userID', Auth::user()->userID)->get();
            $company = company::where('userID', auth::user()->userID)->first();

            return view('StellaEmployer.employerProfile')->with('company', $company)->with('projects', $projects);

        } else {
            return ('fail');
        }

    }


    public function createPost()
    {
        return view('StellaEmployer.createJobPost');
    }

    

    public function storePost(Request $request)
    {

        if (Auth::check()) {
            $validator = Validator::make($request->all(), [

                'prjTitle' => 'required',
                'jobDescription' => 'required',
                'location' => 'required',
                'jobDate' => 'required',
                'role' => 'required',
                'talentFee' => 'required',
                'modelNo' => 'required',
                'bodyBuilt' => 'required',
                'height' => 'required',
                'updated_at',

            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());

            }
            $input = $request->all();
            $input['userID'] = Auth::user()->userID;
            $input['hidden'] = '1';
            $input['address'] = $request->input('unitNo') . ' ' . $request->input('street') . ' ' . $request->input('brgy') . ' ' . $request->input('city') ;
            $project = Project::create($input);

            $auditlogs = new auditlogs;
            $auditlogs->userID =   Auth::user()->userID;
            $auditlogs->logType = 'Register:employer';
            
    
            if ($auditlogs->save() && $project) 
            {
                $projects = Project::where('userID', Auth::user()->userID)->get();
                 $company = company::where('userID', auth::user()->userID)->first();
                return view('StellaEmployer.employerProfile')->with('company', $company)->with('projects', $projects);
            } else 
            {
                return redirect()->to('/');
            }

            
        } else {
            return ('fail');
        }
    }

    public function showProj($projectID)
    {
        $projects = Project::where('projectID', $projectID)->first();
        // dd($projects);
        return view('StellaEmployer.editJobPost')->with('projects', $projects);
    }

    public function updateProj(Request $request)
    {

        if (Auth::check()) {
            $validator = Validator::make($request->all(), [

                'prjTitle' => 'required',
                'jobDescription' => 'required',
                'location' => 'required',
                'modelNo' => 'required',
                'role' => 'required',
                'talentFee' => 'required',

            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());

            }
            $prjTitle = $request->input('prjTitle');
            $modelNo = $request->input('modelNo');
            $jobDescription = $request->input('jobDescription');
            $address = $request->input('unitNo') . ' ' . $request->input('street') . ' ' . $request->input('brgy') . ' ' . $request->input('city') ;
            $location = $request->input('location');
            $zipCode = $request->input('zipCode');
            $role = $request->input('role');
            $talentFee = $request->input('talentFee');
           // $hidden = $request->input('hidden');

            $projectID = $request->get('projectID');
            // dd($projectID);

            $project = project::where('projectID', $projectID)
                ->update(['prjTitle' => $prjTitle, 'jobDescription' => $jobDescription,
                    'location' => $location, 'modelNo' => $modelNo, 'role' => $role,
                    'talentFee' => $talentFee, 'address' => $address, 'zipCode' => $zipCode]);

                    $projects = Project::where('projectID', $projectID)->first();
                    // dd($projects);
                    return view('StellaEmployer.editJobPost')->with('projects', $projects);

        } else {
            return ('fail');
        }
    }

    public function archiveJobPost(Request $request)
    {
        if (Auth::check()) {
    
            $hidden = '0';

            $projectID = $request->get('projectID');
            // dd($projectID);

            $project = project::where('projectID', $projectID)
                ->update(['hidden' => $hidden]);

                $projects = Project::where('userID', Auth::user()->userID)->get();
                $company = company::where('userID', auth::user()->userID)->first();
    
                return view('StellaEmployer.employerProfile')->with('company', $company)->with('projects', $projects);
    

        } else {
            return ('fail');
        }
    }

    public function Ehomepage(Request $request)
    {

        $num = 3;
        $user = User::where('typeID', $num)->get();
        $model = User::where('typeID', $num)->get();
        $userID =  $request->get('userID'); 
        $details = User::where('typeID', $num)
        ->join('attributes', 'attributes.userID', '=', 'users.userID')
        ->get();

        $projects = Project::where('userID', Auth::user()->userID)->where('hidden', '1')->get();
        
        return view('StellaEmployer.homepage', compact('user', 'projects', 'model'))
           ->with('i', (request()->input('page', 1) - 1) * 5)->with('details', $details);


    }

    public function viewModels()
    {
        $user = User::where('typeID' == 3)->get();
        //dd($projects);
        //$projects = Project::where('userID', Auth::user()->userID)->latest()->paginate(10);
        return view('StellaEmployer.employerProfile')->with('user', $user);


    }

    public function getProfile()
    {

        return view('StellaEmployer.editProfile');
    }

    public function getCompany()
    {

        return view('StellaEmployer.editCompany');
    }

    public function editEmployer(Request $request, $id)
    {

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

            //return view('StellaModel.homepage');

            //return redirect()->back()->with('alert', 'Updated!');

            $auditlogs = new auditlogs;
            $auditlogs->userID = Auth::user()->userID;
            $auditlogs->logType = 'Edit profile';

            if ($auditlogs->save() && $user) {
                return redirect()->to('/employerprofile')->with('alert', 'Updated!');
            } else {
                return ('fail');
            }

        } else {
            return ('fail');
        }

    }

    public function viewDetails()
    {

        if (Auth::check()) {
            $details = company::where('userID', auth::user()->userID)->first();
            return view('StellaEmployer.editCompany')->with('details', $details);
        }

    }

    public function auqNa(Request $request, $id)
    {

        $user = user::find($id);
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'name',
                'position',
                'description',
                'updated_at',
            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());

            }
            $name = $request->input('name');
            $position = $request->input('position');
            $description = $request->input('description');

            $company = company::where('userID', auth::user()->userID)
                ->update(['name' => $name, 'position' => $position,
                    'description' => $description]);

            $auditlogs = new auditlogs;
            $auditlogs->userID = Auth::user()->userID;
            $auditlogs->logType = 'Edit company details';

            if ($auditlogs->save() && $company) {
                return redirect()->to('/employerprofile')->with('alert', 'Updated!');
            } else {
                return ('fail');
            }

        } else {
            return ('fail');
        }
    }

    public function EstoreAvatar(Request $request)
    {
        
        	if ($request->hasFile('avatar')) {

                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
         
                $avatar = $request->file('avatar');
                $image_ext = $avatar->GetClientOriginalExtension();
                $new_avatar_name = time() . '.' .$image_ext;
                Image::make($avatar)->resize(200,200)->save( public_path('/uploads/avatars'.$image_ext) );
                $destination_path = public_path('/uploads/avatars');
                    $avatar->move($destination_path,$new_avatar_name);
                    $input = $new_avatar_name;
                    //$input['userID'] = Auth::user()->userID;

            
                    $user = user::where('userID', Auth::user()->userID)->update(['avatar' => $input ]);
         

                    return back()
                    ->with('Success','You have successfully upload image.');
         
                }
            else
            {                       
                return "Image too large, please upload a smaller image size";        
            }
            
    }

     
    public function hireModel(Request $request)
    {
       
        if (Auth::check()) {

            $userID = $request->get('userID');            
            $user = user::where('userID', $userID)
            ->first();
            $input['status'] = '0';
            $input['userID'] = Auth::user()->userID;
            $input['modelID'] = $request->input('modelID');
            $input['emailAddress'] = $request->input('emailAddress');
            $input['projectID'] = $request->input('projectID');
            $hire = hire::create($input);

            $this->emailNotifHireModel($input['emailAddress']);
           //dd($projects);
           
    
                  $auditlogs = new auditlogs;
                  $auditlogs->userID =  Auth::user()->userID;
                  $auditlogs->logType = 'Offered a model';
                  
                  if ($auditlogs->save() && $hire) 
                  {
                      return redirect()->to('/employerHome')->with('alert', 'Updated!');
                  } else 
                  {
                      return ('fail');
                  }
        }
        else {
            return('fail');
        }
   
    }

    public function emailNotifHireModel($email)
    {
        $data = array('name' => "ello");
        //'text' => 'mail' :: loob ng () mail
        Mail::send(['html' => 'hire'], $data, function ($message) use ($email) {
            $message->to($email, $email)->subject
                ('STELLA Email Notification');
            $message->from('stella.model.ph@gmail.com', 'Stella PH');
        });
        
    }

    public function viewApplicants(Request $request)
    {

        $userID =  $request->get('userID'); 

        $details = applicant::join('projects', 'projects.projectID', 'applicants.projectID')
        ->join('users', 'applicants.candidateID', 'users.userID')
        ->where('applicants.userID', Auth::user()->userID)->get();
        
        $projects = Project::where('userID', Auth::user()->userID)->where('hidden', '1')->get();

        //dd($details);
       return view('StellaEmployer.viewApplicants')->with('details', $details)->with('projects', $projects);
    }

   
    public function acceptApplicant(Request $request)
    {

        // dd(Auth::user());
       // $app = applicant::find($id);
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [

                'applicantStatus',
                'updated_at',
            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());

            }
            $status = '1';
           
            $applicantID = $request->get('applicantID');
            $emailAddress = $request->get('emailAddress');
            $applicant = applicant::where('applicantID', $applicantID)->update(['applicantStatus' => $status]);
            $this->acceptNotif($emailAddress);
            //return view('StellaModel.homepage');

            //return redirect()->back()->with('alert', 'Updated!');

            $auditlogs = new auditlogs;
            $auditlogs->userID = Auth::user()->userID;
            $auditlogs->logType = 'Accepted applicant';

            if ($auditlogs->save() && $applicant) {
                $details = applicant::join('projects', 'projects.projectID', 'applicants.projectID')
                ->join('users', 'applicants.candidateID', 'users.userID')
                ->where('applicants.userID', Auth::user()->userID)->get();
        
                //dd($details);
               return view('StellaEmployer.viewApplicants')->with('details', $details);
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
}