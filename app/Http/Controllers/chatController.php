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
    public function sendChat()
    {
        return view('chat');
    }

}
