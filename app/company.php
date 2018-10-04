<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $fillable = [
        'userID', 'name','position','description',
        'created_at', 'updated_at',
    ];
}
