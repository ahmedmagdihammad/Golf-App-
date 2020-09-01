<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\user', 'created_by');
    }

    public function distributer()
    {
        return $this->belongsTo('App\Distributer', 'distributer_id');
    }
}
