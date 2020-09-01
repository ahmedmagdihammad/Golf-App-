<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesRepresentative extends Model
{
    

    protected $fillable = [
        'name',
        'picture',
        'phone',
        'sales_manager_id',
        'national_id',
        'address',
        'created_by'
    ];

    public function manager()
    {
        return $this->belongsTo('App\SalesManager','sales_manager_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
