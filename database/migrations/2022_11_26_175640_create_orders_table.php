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
            $table->integer('id')->autoIncrement();
            $table->integer('user_id');
            $table->string('po_number');
            $table->string('order_name');
            $table->string('order_email');
            $table->string('order_phone');
            $table->string('order_address');
            $table->string('order_ward'); 
            $table->string('order_district'); 
            $table->string('order_city'); 
            $table->string('order_message')->nullable();
            $table->integer('order_total');
            $table->dateTime('order_date');
            $table->tinyInteger('shipping_cost')->default('0');
            $table->tinyInteger('order_status')->default('0');
            $table->string('order_cancel', 10)->nullable();
            $table->tinyInteger('payment_method')->default('0');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('orders');
    }
}
