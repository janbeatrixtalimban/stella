<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{
    protected $fillable = [
        'p_title', 'p_date','p_company','p_description',
        'userID', 'created_at', 'updated_at', 
    ];
}
