<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicant extends Model
{
    protected $fillable = ['applicantStatus', 'projectID', 'emailAddress',
     'userID', 'created_at','rejectReason', 'updated_at', 'candidateID'];
}
