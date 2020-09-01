<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function products()
    {
    	return $this->hasMany('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
