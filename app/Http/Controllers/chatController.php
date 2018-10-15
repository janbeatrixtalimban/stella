<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use App\auditlogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;



class chatController extends Controller
{
    public function sendChat(Request $request)
    {

        if (Auth::check()) {
            $validator = Validator::make($request->all(), [

                'chatMessage' => 'required',
                'senderID',
                'receiverID',
                'created_at',
                'updated_at'
               

            ]);
            if ($validator->fails()) {
                return redirect()->to($validator->errors());

            }

            

            $input = $request->all();
            $input['senderID'] = Auth::user()->userID;
            $input['receiverID'] = 'jiji';
            $chat = chat::create($input);

            $auditlogs = new auditlogs;
            $auditlogs->userID =   Auth::user()->userID;
            $auditlogs->logType = 'Sent chat';
            
    
            if ($auditlogs->save() && $chat) 
            {
                return view('############');
            } else 
            {
                return redirect()->to('/');
            }

            
        } else {
            return ('fail');
        }
    }

}
