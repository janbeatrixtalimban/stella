<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attribute extends Model
{
    protected $fillable = ['eyeColor', 'hairColor', 'hairLength', 'weight', 'height',
    'complexion', 'gender', 'chest', 'waist', 'hips', 'shoeSize',
    'tatoo', 'userID', 'created_at', 'updated_at'];
}
