<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceProduct extends Model
{

	protected $fillable = [
		'pricelist_id',
		'product_id',
		'base_price',
		'coupon_price',
		'created_by'
	];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Product', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function pricelist()
    {
        return $this->belongsTo('App\Pricelist', 'pricelist_id');
    }
}
