<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerServiceManager extends Model
{
    //

    public function manager()
    {
        return $this->belongsTo('App\GovernorateManager', 'governorate_manager_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }
}
