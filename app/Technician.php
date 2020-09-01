<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function merchant()
    {
        return $this->belongsTo('App\Merchant','merchant_id');
    }
}
