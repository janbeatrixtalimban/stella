<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicant extends Model
{
    protected $fillable = ['status', 'projectID', 'emailAddress',
     'userID', 'created_at', 'updated_at'];
}