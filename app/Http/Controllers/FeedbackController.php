<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use App\User;


class FeedbackController extends Controller
{

    public function index()
    {
        //HMMMMMMMM for emergency na index pag may magreredirect na shizz

        
    }

    public function leavefeedback()
    {
        return view('StellaHome.leavefeedback');
    }

    public function create()
    {
        return view('feedbacks.create');
    }

    public function store(Request $request)
    {
               $request->validate([

            'userID' => 'required',
            'reciever' => 'required',
            'projectID' => '',
            'rate' => '',
            'comment' => '',
        ]);
  
        Feedback::create($request->all());
   
       //return redirect()->route('feedbacks.index')
       return redirect()->back()
                      ->with('success','Feedback posted successfully.');
                
    }
    public function show($id)
    {
        return view('products.show',compact('product'));
    }
}