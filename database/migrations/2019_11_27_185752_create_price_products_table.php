<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pricelist_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('base_price')->nullable();
            $table->string('coupon_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_products');
    }
}
