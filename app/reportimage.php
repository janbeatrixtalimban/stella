<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportimage extends Model
{
    protected $fillable = [
        'userID', 'imageID', 'status', 'reason', 'modelID', 'created_at', 'updated_at'
    ];
}
