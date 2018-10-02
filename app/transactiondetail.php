<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transactiondetail extends Model
{
    protected $fillable = [
        'userID', 'amount','email', 'first_name', 'last_name',
        'payer_id', 'phone', 'updated_at', 'created_at',
    ];
}
