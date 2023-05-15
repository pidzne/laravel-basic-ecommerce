<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('code')->comment('Mã giảm giá');
            $table->string('discount')->comment('Mức giảm giá (%)');
            $table->string('start_date')->comment('Ngày bắt đầu');
            $table->string('end_date')->comment('Ngày kết thúc');
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
        Schema::dropIfExists('coupons');
    }
}
