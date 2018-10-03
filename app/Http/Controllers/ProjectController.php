<?php

namespace App\Http\Controllers;
use App\Project;
use Illuminate\Http\Request;

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
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('StellEmployer.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'userID' => 'required',
        ]);
  
        Project::create($request->all());
   
        return redirect()->route('StellEmployer.index')
                        ->with('success','Project posted successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {  
        return view('StellaModel.show',compact('project'));
    }

    

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('StellEmployer.edit',compact('project'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
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
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
  
        return redirect()->route('StellEmployer.index')
                        ->with('success','Project deleted successfully');
    }

    
}