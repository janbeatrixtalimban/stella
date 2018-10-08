<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hire extends Model
{
    protected $fillable = ['status', 'modelID','userID', 'emailAddress',
     'created_at', 'updated_at'];
}
