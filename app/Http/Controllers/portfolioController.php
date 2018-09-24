<?php

namespace App\Http\Controllers;

use App\bridge;
use App\imgportfolio;
use App\portfolio;
use App\User;
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

    public function store(Request $request)
    {
        
        	if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                        'p_title' => 'required|string|max:50',
                        'p_date' => 'required',
                        'p_company' => 'required|string|max:50',
                        'p_description' => 'required|string|max:100',
                        'userID',
                        'updated_at',
                        'created_at',
                        
                    ]);
                    if ($validator->fails()) {
                        return redirect()->to($validator->errors());

                    }
                        $input = $request->all();
                        $input['userID'] = Auth::user()->userID;
                        $portfolio = Portfolio::create($input);
                        $input['caption'] = 'auqna';
                        // $path=$request->file('image')->store('upload');
                        $path = Storage::putFile('uploads', $request->file('image'));
                        $imgportfolio = Imgportfolio::create($input);
                        
                        
                        $input2["portfolioID"] = $portfolio->id;
                        $input2["imageID"] = $imgportfolio->id;
                        $bridge = Bridge::create($input2);

            				if($portfolio)
                    {    
                       
                        return $portfolio;
                        
                    } else {
                        return "FAILED";
                    }
                }
      else
      {                        return "FAILED Authentication";        
      }
            }
            
}
