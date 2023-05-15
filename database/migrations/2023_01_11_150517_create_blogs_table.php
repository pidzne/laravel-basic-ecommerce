<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Mã bài viết');
            $table->integer('blog_cate_id')->comment('Danh mục bài viết');
            $table->string('slug')->comment('Slug bài viết');
            $table->string('title')->comment('Tiêu đề bài viết');
            $table->string('content')->comment('Nội dung bài viết');
            $table->string('hashtag')->comment('Hashtag bài viết');
            $table->string('author')->comment('Tác giả');
            $table->string('link')->comment('Nguồn bài viết (nếu có)');
            $table->string('blog_image')->comment('Hình ảnh bài viết');
            $table->tinyInteger('blog_status')->default('0')->comment('Trạng thái bài viết');
            $table->timestamps();
            $table->foreign('blog_cate_id')->references('id')->on('blog_categories')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('blogs'); 
    }
}
