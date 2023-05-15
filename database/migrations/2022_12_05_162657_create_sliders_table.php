<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('slider_title', 100);
            $table->string('slider_subtitle1', 100)->nullable();
            $table->string('slider_subtitle2', 100)->nullable();
            $table->string('slider_subtitle3', 100)->nullable();
            $table->string('slider_subtitle4', 100)->nullable();
            $table->string('slider_image');
            $table->tinyInteger('slider_status')->default('0')->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
