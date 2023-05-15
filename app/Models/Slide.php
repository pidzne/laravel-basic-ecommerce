<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $fillable = [
        'slider_title',
        'slider_subtitle1',
        'slider_subtitle2',
        'slider_subtitle3',
        'slider_subtitle4',
        'slider_image',
        'slider_status'
    ];
}
