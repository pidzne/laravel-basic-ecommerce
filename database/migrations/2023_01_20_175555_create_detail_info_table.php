<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_info', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Mã chi tiết sp');
            $table->integer('prod_id')->comment('Mã sản phẩm');
            $table->string('clo_style')->comment('Phong cách');
            $table->string('clo_material')->comment('Chất liệu');
            $table->string('clo_origin')->comment('Xuất xứ');
            $table->string('clo_type')->comment('Kiểu quần, áo');
            $table->string('clo_cate')->comment('Loại quần, áo');
            $table->string('clo_model')->comment('Mẫu quần, áo');
            $table->timestamps();
            $table->foreign('prod_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('detail_info');
    }
}
