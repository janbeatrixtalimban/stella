<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bridge extends Model
{
    protected $fillable = [
        'imageID', 'portfolioID', 'updated_at', 'created_at',
    ];
}
