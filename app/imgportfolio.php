<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imgportfolio extends Model
{
    protected $fillable = [
        'image', 'hidden','userID', 'created_at', 'updated_at', 
    ];
}
