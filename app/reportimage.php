<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportimage extends Model
{
    protected $fillable = [
        'userID', 'imageID', 'imgstatus', 'reason', 'modelID', 'created_at', 'updated_at'
    ];
}
