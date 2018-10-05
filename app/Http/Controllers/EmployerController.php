<?php

namespace App\Http\Controllers;

use App\auditlogs;
use App\company;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $details = company::where('userID', auth::user()->userID)->first();

            return view('StellaEmployer.employerProfile')->with('details', $details)->with('projects', $projects);
            // return view('StellaEmployer.employerProfile')->with('projects', $projects);

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
                'role' => 'required',
                'talentFee' => 'required',
                'updated_at',

            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());

            }
            $input = $request->all();
            $input['userID'] = Auth::user()->userID;
            $input['hidden'] = '1';
            Project::create($input);

            $projects = Project::where('userID', Auth::user()->userID)->get();
            $company = company::where('userID', auth::user()->userID)->first();
            return view('StellaEmployer.employerProfile')->with('company', $company)->with('projects', $projects);
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
                'role' => 'required',
                'talentFee' => 'required',

            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());

            }
            $prjTitle = $request->input('prjTitle');
            $jobDescription = $request->input('jobDescription');
            $location = $request->input('location');
            $role = $request->input('role');
            $talentFee = $request->input('talentFee');
           // $hidden = $request->input('hidden');

            $projectID = $request->get('projectID');
            // dd($projectID);

            $project = project::where('projectID', $projectID)
                ->update(['prjTitle' => $prjTitle, 'jobDescription' => $jobDescription,
                    'location' => $location, 'role' => $role,
                    'talentFee' => $talentFee]);

                    $projects = Project::where('projectID', $projectID)->first();
                    // dd($projects);
                    return view('StellaEmployer.editJobPost')->with('projects', $projects);

        } else {
            return ('fail');
        }
    }

    public function Ehomepage()
    {
        $num = 3;
        //$projects = Project::where('userID', Auth::user()->userID)->get();
        $user = User::where('typeID', $num)->get();
        //dd($user);
        return view('StellaEmployer.homepage', compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

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
            $contactNo = $request->input('contactNo');
            $location = $request->input('location');

            $user = user::where('userID', $id)->update(['contactNo' => $contactNo, 'location' => $location]);

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

}