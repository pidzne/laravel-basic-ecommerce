<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('cate_id'); 
            $table->integer('brand_id');
            $table->string('prod_name', 30); 
            $table->string('prod_small_description', 100); 
            $table->string('prod_detail_description', 2000); 
            $table->integer('prod_original_price');  
            $table->integer('prod_selling_price'); 
            $table->string('prod_image'); 
            $table->integer('prod_quantity'); 
            $table->tinyInteger('prod_top_selling')->default('0');
            $table->tinyInteger('prod_status')->default('0'); 
            $table->integer('prod_views')->default('0');
            $table->timestamps();
            $table->foreign('cate_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
