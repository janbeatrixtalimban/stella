<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $fillable = [
        'userID', 'projectID', 'status', 'created_at', 'updated_at'
    ];
}
