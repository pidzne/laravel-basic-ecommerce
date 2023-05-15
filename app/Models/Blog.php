<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'blog_cate_id',
        'slug',
        'title',
        'content',
        'hashtag',
        'author',
        'link',
        'blog_image',
        'blog_status'
    ];
}
