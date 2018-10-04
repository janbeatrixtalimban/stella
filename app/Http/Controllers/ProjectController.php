<?php

namespace App\Http\Controllers;
use App\Project;
use Illuminate\Http\Request;
use App\User;
use App\company;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate(3);
  
        return view('StellaModel.homepage',compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    
    public function create()
    {
        return view('StellaEmployer.createJobPost');
    }
  
   
    public function store(Request $request)
    {
        $request->validate([
            //'name' => 'required',
            //'detail' => 'required',
            'prjTitle' => 'required',
            'jobDescription' => 'required',
            'location' => 'required',
            'role' => 'required',
            'talentFee' => 'required',
            'skillID' => 'required',
            'hidden' => '1',
            'userID' => 'required',
        ]);
  
        Project::create($request->all());
        $company = company::where('userID', auth::user()->userID)->first();
        return view('StellaEmployer.employerProfile')->with('company', $company);
    }
   
    
    public function show(Project $project)
    {  
        return view('StellaModel.show',compact('project'));
    }

    
    public function edit(Project $project)
    {
        return view('StellaEmployer.editJobPost',compact('project'));
    }
  

    public function update(Request $request, Project $project)
    {
        $request->validate([
            //'name' => 'required',
            //'detail' => 'required',
            'prjTitle' => 'required',
            'jobDescription' => 'required',
            'location' => 'required',
            'role' => 'required',
            'talentFee' => 'required',
            'skillID' => 'required',
            'userID' => 'required',
        ]);
  
        $project->update($request->all());
  
        return redirect()->route('StellEmployer.index')
                        ->with('success','Project details updated successfully');
    }
  

    public function destroy(Project $project)
    {
        $project->delete();
  
        return redirect()->route('StellEmployer.index')
                        ->with('success','Project deleted successfully');
    }

    
}
