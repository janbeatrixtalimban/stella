<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Project;
use App\auditlogs;
use App\company;
use Validator;

class EmployerController extends Controller
{
    
    public function index()
    {
        
        // $projects = Project::latest()->paginate(10);
        // return view('StellaEmployer.employerProfile',compact('projects'))
        // ->with('i', (request()->input('page', 1) - 1) * 5);

        if (Auth::check()) {
                  
            $projects = Project::where('userID', Auth::user()->userID)->get();
            //dd($projects);
            //$projects = Project::where('userID', Auth::user()->userID)->latest()->paginate(10);
            return view('StellaEmployer.employerProfile')->with('projects', $projects);
          
              }
              else {
                  return('fail');
              }
       
    }

    
    public function employerProfile()
    {
        //$user = user::find($id);
        
        if (Auth::check()) {
            
            
               
            $projects = Project::where('userID', Auth::user()->userID)->get();
            $details = company::where('userID', auth::user()->userID)->first();
          
           
            
            return view('StellaEmployer.employerProfile')->with('details', $details)->with('projects', $projects);
          
              }
              else {
                  return('fail');
              }
        

    }
    public function employerCreateJob()
    {
        return view('StellaEmployer.createJobPost');
    }

    public function store(Request $request)
    {
        $request->validate([

            'prjTitle' => 'required',
            'jobDescription' => 'required',
            'location' => 'required',
            'role' => 'required',
            'talentFee' => 'required',
            'hidden' => '',
            'userID' => 'required',
        ]);
  
        Project::create($request->all());
   
        return redirect()->route('projects.index')
                        ->with('success','Project posted successfully.');
       
    }


    public function show($id)
    {
        //
    }


    public function edit(Project $project)
    {
        return view('StellaEmployer.editJobPost',compact('project'));
    }
    public function update(Request $request, Project $project)
    {
        $request->validate([

            'prjTitle' => 'required',
            'jobDescription' => 'required',
            'location' => 'required',
            'role' => 'required',
            'talentFee' => 'required',
            'hidden' => '',
            'userID' => 'required',
        ]);
  
        $project->update($request->all());
        
  
        return redirect()->route('projects.index')
        ->with('success','Project updated successfully.');
    }

    public function Ehomepage()
    {
        $num = 3;
        //$projects = Project::where('userID', Auth::user()->userID)->get();
        $user = User::where('typeID', $num)->get();
        //dd($user);
        return view('StellaEmployer.homepage',compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        

        
    }


    
    public function viewModels()
    {
        $user = User::where('typeID'==3)->get();
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

    public function editEmployer(Request $request, $id){

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
                            return redirect()->to('/employerprofile')->with('alert', 'Updated!');
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
                  $auditlogs->userID =  Auth::user()->userID;
                  $auditlogs->logType = 'Edit company details';
                  
          
                  if ($auditlogs->save() && $company) 
                  {
                      return redirect()->to('/employerprofile')->with('alert', 'Updated!');
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
