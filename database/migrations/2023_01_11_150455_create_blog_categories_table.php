<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Mã danh mục bài viết');
            $table->string('blog_cate_name')->comment('Tên danh mục bài viết');
            $table->tinyInteger('blog_cate_status')->default('0')->comment('Trạng thái danh mục bài viết');
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
        Schema::dropIfExists('blog_categories');
    }
}
