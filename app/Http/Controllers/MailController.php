<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
    public function basic_email()
    {
        $data = array('name' => "Virat Gandhi");
        Mail::send('mail', $data, function ($message) {
            $message->to('beatrixtalimban@gmail.com','beatrixtalimban@gmail.com')->subject
                ("Email Verification");
            $message->from('stella.model.ph@gmail.com', 'Stella');
        });
        echo "HTML Email Sent. Check your inbox.";
    }
   public function html_email(){
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('beatrixtalimban@yahoo.com', 'beatrixtalimban@yahoo.com')->subject
            ('Laravel HTML Testing Mail');
         $message->from('beatrixtalimban@gmail.com','Virat Gandhi');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email(){
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('beatrixtalimban@yahoo.com', 'beatrixtalimban@yahoo.com')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('beatrixtalimban@gmail.com','Stella');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}
