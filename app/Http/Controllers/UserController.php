<?php

namespace App\Http\Controllers;

use Twilio;
use Mail;
use App\Notifications\VerifyEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    //

    public function userRegistration()
    {
        return view('StellaHome.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastName' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'firstName' => 'string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'middleName' => 'required|string|max:50||regex:/^[a-zA-Z_\-]+$/',
            'contactNo' => 'required|max:11|regex:/^[0-9]+$/',
            'birthDate' => 'required|before:18 years ago',
            'emailAddress' => 'required|email|unique:users,emailAddress',
            'location' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'company' => 'string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'aboutDescription',
            'password' => 'required|string|min:6',
            'confirmpassword' => 'required|same:password',
            'created_at',
            'updated_at',
            'token',
            'filePath',
        ]);
    }

    public function create(request $request)
    {

        $skipper = "6LcGAHAUAAAAAK8eMIoIq8oHOUNcgi19wwhIZPgx";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => $skipper,
            'response' => request('g-recaptcha-response'),
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        ]);

        $resp = json_decode(curl_exec($ch));
        curl_close($ch);

        if ($resp->success) {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['typeID'] = '1';
            $input['skillID'] = '1';
            $input['token'] = str_random(25);
            $path=$request->file('filePath')->store('upload');
            $user = User::create($input);
            $user->sendVerifyAccount();

            //$twilio->message('+639175501226', 'Pink Elephants and Happy Rainbows');
            $this->basic_email($input['emailAddress']);
            //lahat ng created pinalitan ko ng user
            return view('StellaHome.login');
        } else {
            return "FAILED";
        }

    }

    public function basic_email($email)
    {
        $data = array('name' => "Virat Gandhi");
        //'text' => 'mail' :: loob ng () mail
        Mail::send(['text' => 'mail'], $data, function ($message) use ($email) {
            $message->to($email, $email)->subject
                ('Laravel Basic Testing Mail');
            $message->from('stella.model.ph@gmail.com', 'Stella PH');
        });
        echo "Registered! Email Sent. Check your inbox.";
    }

   

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
