<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributer extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}