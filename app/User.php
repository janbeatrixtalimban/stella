<?php

namespace App;

use\App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


     protected $primaryKey = "userID";

    protected $fillable = [
        'lastName', 'firstName','birthDate','emailAddress',
        'contactNo', 'location',  'password', 'typeID', 'skillID',
        'created_at', 'updated_at', 'token',  
        'filePath', 'avatar', 'status', 'tnc',
    ];

}
