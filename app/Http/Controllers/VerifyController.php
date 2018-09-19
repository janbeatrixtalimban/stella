<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VerifyController extends Controller
{
    public function verify($token)
    {
            // verify user using token!!!! 
            //404 errir ung firstOrFail

        User::where('token', $token)->firstOrFail()->update(['token' => null]);

        return redirect()
        ->route('home')
        ->with('success', 'account verified');
    }
}
