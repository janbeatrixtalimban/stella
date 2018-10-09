<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'prjTitle', 'jobDescription', 'address', 'location', 'zipCode', 'role',
        'talentFee', 'hidden', 'userID', 'modelNo', 'bodyBuilt', 'height',
        'created_at', 'updated_at',
    ];
}
