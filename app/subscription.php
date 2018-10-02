<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscription extends Model
{
    
    protected $fillable = ['subID', 'typeID', 'price', 'created_at', 'updated_at'];

}
