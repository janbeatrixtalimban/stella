<?php

namespace App\Http\Controllers;

use Twilio;
use Mail;
use App\Notifications\VerifyEmail;
use App\User;
use App\auditlogs;
use App\transactiondetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //

    public function home()
    {
        return view('StellaHome.home');
    }

    public function userRegistration()
    {
        return view('StellaHome.register');
    }

    public function employerRegistration()
    {
        return view('StellaHome.registerEmployer');
    }

    public function paypal()
    {
        return view('StellaHome.paypal');
    }

    public function subscription()
    {
        return view('StellaHome.subscription');
    }
    public function subscriptionEmp()
    {
        return view('StellaHome.subscriptionEmployer');
    }


    public function editStatus(Request $request, $id)
    {
        $user = user::find($id);
        if (Auth::check()) {

            $user = user::where('userID', $id)->update(['status' => '1']);

            $transac['userID'] = Auth::user()->userID;
            $transac['amount'] = $request->get('amount');
            $transac['first_name'] = $request->get('first_name');
            $transac['last_name'] = $request->get('last_name');
            $transac['email'] = $request->get('email');
            $transac['payer_id'] = $request->get('payer_id');
            $transac['phone'] = $request->get('phone');


            $transacdetail = transactiondetail::create($transac);
            return redirect()->to('/subscription');
            
        } else {
            return ('fail');
        }
         
      }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastName' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'firstName' => 'string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'contactNo' => 'required|max:11|regex:/^[0-9]+$/',
            'birthDate' => 'required|before:18 years ago',
            'emailAddress' => 'required|email|unique:users,emailAddress',
            'location' => 'required|string|max:50|regex:/^[a-zA-Z_\-]+$/',
            'company',
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
        if ($resp->success) 
        {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['typeID'] = '3';
            $input['skillID'] = '1';
            $input['company'] = 'N/A';
            $input['position'] = 'N/A';
            $input['status'] = '0';
            $input['token'] = str_random(25);
            $path=$request->file('filePath')->store('upload');
            $user = User::create($input);
            //$user->sendVerifyAccount();

            //Twilio::message($input['contactNo'], 'Welcome to Stella');
            //$this->basic_email($input['emailAddress']);
            //lahat ng created pinalitan ko ng user

            
            $auditlogs = new auditlogs;
            $auditlogs->userID =  $user->userID;
            $auditlogs->logType = 'Register:model';
            
    
            if ($auditlogs->save() && $user) 
            {
                return redirect()->to('/loginUser');
            } else 
            {
                return redirect()->to('/');
            }

        //     return view('StellaHome.login');
        // } else {
        //     return "FAILED";
         }
    }

    public function addEmployer(request $request)
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
            $input['typeID'] = '2';
            $input['skillID'] = '1';
            // $input['company'] = 'N/A';
            $input['token'] = str_random(25);
            $path=$request->file('filePath')->store('upload');
            $user = User::create($input);
            $user->sendVerifyAccount();

            //Twilio::message($input['contactNo'], 'Welcome to Stella');
            //$this->basic_email($input['emailAddress']);
            //lahat ng created pinalitan ko ng user

            $auditlogs = new auditlogs;
            $auditlogs->userID =  $user->userID;
            $auditlogs->logType = 'Register:employer';
            
    
            if ($auditlogs->save() && $user) 
            {
                return redirect()->to('/loginUser');
            } else 
            {
                return redirect()->to('/');
            }
        //     return view('StellaHome.login');
        // } else {
        //     return "FAILED";
        }
    }

    public function basic_email($email)
    {
        $data = array('name' => "Virat Gandhi");
        //'text' => 'mail' :: loob ng () mail
        Mail::send(['text' => 'mail'], $data, function ($message) use ($email) {
            $message->to($email, $email)->subject
                ('STELLA Account');
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
