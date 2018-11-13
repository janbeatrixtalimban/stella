<?php

namespace App\Http\Controllers;

use App\bridge;
use App\imgportfolio;
use App\portfolio;
use App\User;
use App\auditlogs;
use Redirect;
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
            $images = DB::table('imgportfolios')/*->select('image')*/->where('userID', $id)->get();
            //$user = $images;
            return view('imagegalleryview',compact('images'));
          
              }
              else {
                  return('fail');
              }
        
        
    }

    public function viewindex2(Request $request, $id)
    {
        $user = user::find($id);
        
        if (Auth::check()) {
                  
            //$images = imgportfolio::get();
            $images = DB::table('imgportfolios')/*->select('image')*/->where('userID', $id)->get();
            //$user = $images;
            return view('imagegalleryview2',compact('images'));
          
              }
              else {
                  return('fail');
              }
    }

    public function refresh(Request $request, $id)
    {
        $user = user::find($id);
        
        if (Auth::check()) {
                  
            //$images = imgportfolio::get();
            $images = DB::table('imgportfolios')/*->select('image')*/->where('userID', $id)->get();
            //$user = $images;
            return view('imagegalleryview',compact('images'));
          
              }
              else {
                  return('fail');
              }
    }

    public function singleview(Request $request, $id)
    {
        $user = user::find($id);
        
        if (Auth::check()) {
                  
            //$images = imgportfolio::get();
            $images = DB::table('imgportfolios')
            ->join('users', 'users.userID','=', 'imgportfolios.userID')
            ->where('imgportfolios.userID', $id)->get();
            //$user = $images;
            return view('singleimageview',compact('images'));
          
              }
              else {
                  return('fail');
              }
        
        
    }

    public function archivePortfolio(Request $request)
    {
        if (Auth::check()) {
    
            $display = 'none';
            $imageID = $request->get('imageID');
 
            $image = DB::table('imgportfolios')->select('image')->where('imageID', $imageID)
            ->update(['display' => $display]);

                //return view('StellaModel.updatePortfolio');

                return Redirect::to('/imagegalleryview/'.Auth::user()->userID);

        } 
        else {
            return ('fail');
        }
    }

    public function viewimage(Request $request, $id)
    {
        $user = user::find($id);
        
        if (Auth::check()) {
                  
            //$images = imgportfolio::get();
            $images = DB::table('imgportfolios')->select('image')->where('userID', $id)->get();
                    
            //$images = DB::table('imgportfolios')->select('image')->where('userID', $id)->get();
            //$user = $images;
            return view('viewviewimage',compact('images'));
          
              }
              else {
                  return('fail');
              }
        
        
    }

    public function store(Request $request)
    {
        
        	if ($request->hasFile('image')) {
       
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
                                $input['display'] = '1';
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
            $imgValidator = Validator::make($request->all(), [
                    	'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);

                if ($imgValidator->fails()) {
                    $errormsg = "Maximum image size exceeded, please upload a smaller image file to your portfolio.";
                    return redirect()->back()->with('failure', $errormsg);

                }   
       
      }


            }
            
}

