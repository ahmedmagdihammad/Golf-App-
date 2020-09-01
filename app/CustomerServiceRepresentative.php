<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerServiceRepresentative extends Model
{
    
    protected $fillable = [
        'name',
        'picture',
        'phone',
        'customer_service_manager_id',
        'national_id',
        'address',
        'created_by'
    ];

    public function manager()
    {
        return $this->belongsTo('App\CustomerServiceManager','customer_service_manager_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
