<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'prjTitle', 'jobDescription', 'location', 'role', 'talentFee', 'hidden', 'userID'
    ];
}
