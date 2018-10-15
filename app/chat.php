<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $fillable = [
        'chatMessage', 'senderID', 'receiverID', 'created_at', 'updated_at'
    ];
}
