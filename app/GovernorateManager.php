<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GovernorateManager extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
