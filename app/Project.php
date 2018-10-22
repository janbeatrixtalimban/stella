<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'prjTitle', 'jobDescription', 'address', 'location', 'zipCode', 'role',
        'talentFee', 'hidden', 'userID', 'modelNo', 'jobEnd',
        'created_at', 'updated_at', 'jobDate',
    ];
}
