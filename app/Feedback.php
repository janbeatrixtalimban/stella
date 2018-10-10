<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $primaryKey = 'feedbackID';
    protected $fillable = [
        'userID', 'reciever', 'projectID', 'rate', 'comment'
    ];
}