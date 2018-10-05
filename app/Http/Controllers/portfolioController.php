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

    public function store(Request $request)
    {
        
        	if (Auth::check()) {
            // $validator = Validator::make($request->all(), [
            //             'p_title' => 'required|string|max:50',
            //             'p_date' => 'required',
            //             'p_company' => 'required|string|max:50',
            //             'p_description' => 'required|string|max:100',
            //             'userID',
            //             'updated_at',
            //             'created_at',
                        
            //         ]);

                   

            //         if ($validator->fails()) {
            //             return redirect()->to($validator->errors());

            //         }
            //             $input = $request->all();
            //             $input['userID'] = Auth::user()->userID;
            //             $portfolio = Portfolio::create($input);
                        
                        // $path=$request->file('image')->store('upload');
                        //dito dapat array? hmm

                       
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
                                $input['caption'] = 'new Image';
                                // $input["portfolioID"] = $portfolio->id;
                                $input['userID'] = Auth::user()->userID;
                                //$path = Storage::putFile('uploads', $request->file('image'));
                                $imgportfolio = Imgportfolio::create($input);
                            }
                       
                        
                        
                        // $input2["portfolioID"] = $portfolio->id;
                        // $input2["imageID"] = $imgportfolio->id;
                        // $bridge = Bridge::create($input2);

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

            		// 		if($portfolio)
                    // {    
                       
                    //     return view('StellaModel.modelprofile');
                        
                    // } else {
                    //     return "FAILED";
                    // }
                }
      else
      {                       
           return "FAILED Authentication";        
      }
            }
            
}
