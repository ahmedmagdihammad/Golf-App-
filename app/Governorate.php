<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    //

    protected $fillable = [
        'name',
        'created_by'
    ];

    public function states()
    {
    	return $this->hasMany('App\State');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
