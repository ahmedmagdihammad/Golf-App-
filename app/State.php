<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //

    protected $fillable = [
        'name',
        'created_by',
        'governorate_id'
    ];

    public function governorate()
    {
    	return $this->belongsTo('App\Governorate');
    }

    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
