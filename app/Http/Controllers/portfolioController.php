<?php

namespace App\Http\Controllers;

use App\bridge;
use App\imgportfolio;
use App\portfolio;
use App\User;
use App\auditlogs;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Lcobucci\JWT\Parser;
use Validator;


class portfolioController extends Controller
{
    public function create()
    {
        return view('StellaModel.createPortfolio');
    }

    public function index()
     {
        
        $images = imgportfolio::get();
        
        return view('createPortfolio',compact('images'));
        
    }

    public function viewindex(Request $request, $id)
    {
        $user = user::find($id);
        
        if (Auth::check()) {
                  
            //$images = imgportfolio::get();
            $images = DB::table('imgportfolios')->select('image')->where('userID', $id)->get();
            //$user = $images;
            return view('imagegalleryview',compact('images'));
          
              }
              else {
                  return('fail');
              }
        
        
    }

    public function viewimage(Request $request, $id)
    {
        $user = user::find($id);
        
        if (Auth::check()) {
                  
            //$images = imgportfolio::get();
            $images = DB::table('imgportfolios')->select('image')->where('userID', $id)->get();
            //$user = $images;
            return view('viewviewimage',compact('images'));
          
              }
              else {
                  return('fail');
              }
        
        
    }

    public function store(Request $request)
    {
        
        	if (Auth::check()) {
       
                        $image_array = $request->file('image');
                        $array_len = count($image_array);
    
                            for (
                                $i=0; $i<$array_len; $i++
                            )
                            {
                                $image_ext = $image_array[$i]->GetClientOriginalExtension();
                                $new_image_name = rand(123456,999999999).".".$image_ext;
        
                                $destination_path = public_path('uploads');
                                $image_array[$i]->move($destination_path,$new_image_name);
        
                                $input['image'] = $new_image_name;
                                $input['hidden'] = '1';
                                $input['userID'] = Auth::user()->userID;
                                $imgportfolio = Imgportfolio::create($input);
                            }
                       
                        $auditlogs = new auditlogs;
                        $auditlogs->userID =  Auth::user()->userID;
                        $auditlogs->logType = 'Add photo to portfolio';
                        
                
                        if ($auditlogs->save() && $imgportfolio) 
                        {
                            return redirect()->to('/modelprofile');
                        } else 
                        {
                            return ('fail');
                        }

                }
      else
      {                       
           return "FAILED Authentication";        
      }
            }
            
}
