<?php

namespace App;

use\App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $primaryKey = "userID";

    protected $fillable = [
        'lastName', 'firstName','birthDate','emailAddress',
        'contactNo', 'location', 'company', 'password', 'typeID', 'skillID',
        'created_at', 'updated_at', 'token',  
        'filePath',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verified()
    {
        return $this->token ===  null;
    }

    public function sendVerifyAccount()
    {
        $this->notify(new VerifyEmail($this));
    }
}
