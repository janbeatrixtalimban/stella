<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hire extends Model
{
    protected $fillable = ['hirestatus', 'modelID','userID','projectID', 'rejectReason', 'emailAddress',
     'created_at', 'updated_at', 'haggleAmount', 'haggleStatus'];
}
