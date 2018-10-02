<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imgportfolio extends Model
{
    protected $fillable = [
        'image', 'caption','portfolioID','userID', 'created_at', 'updated_at', 
    ];
}
