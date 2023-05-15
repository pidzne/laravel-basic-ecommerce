<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Mã sổ địa chỉ');
            $table->integer('user_id')->comment('Mã người dùng');
            $table->string('name')->comment('Tên người dùng');
            $table->integer('phone')->comment('Số điện thoại');
            $table->string('street')->comment('Số nhà, đường');
            $table->string('city')->comment('Thành phố / Tỉnh');
            $table->string('district')->comment('Quận / Huyện');
            $table->string('ward')->comment('Phường / Xã');
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
        Schema::dropIfExists('address');
    }
}
