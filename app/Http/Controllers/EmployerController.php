<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Project;
use Validator;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function employerProfile()
    {
        //$user = user::find($id);
        
        if (Auth::check()) {
                  
            $projects = Project::where('userID', Auth::user()->userID)->get();
            //dd($projects);
            return view('StellaEmployer.employerProfile')->with('projects', $projects);
          
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
        return view('StellaEmployer.homepage');
    }
   
}
