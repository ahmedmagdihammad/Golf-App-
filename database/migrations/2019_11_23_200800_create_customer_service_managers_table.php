<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerServiceManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_service_managers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('national_id')->nullable();
            $table->text('picture')->nullable();
            $table->integer('governorate_manager_id')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('customer_service_managers');
    }
}
