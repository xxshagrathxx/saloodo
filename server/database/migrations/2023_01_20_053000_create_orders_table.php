<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('parcel_name');
            $table->text('pickup_address')->nullable();
            $table->text('dropoff_address')->nullable();
            $table->timestamp('pickup_date')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->string('status')->nullable();
            $table->integer('sender_id')->nullable();
            $table->integer('biker_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
