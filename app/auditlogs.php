<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class auditlogs extends Model
{
    protected $fillable = ['userID', 'logType', 'datecreated', 
    'updated_at', 'created_at'];
}
