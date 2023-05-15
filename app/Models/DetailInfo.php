<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailInfo extends Model
{
    use HasFactory;
    protected $table = 'detail_info';
    protected $fillable = [
       'prod_id',
       'clo_style',
       'clo_material',
       'clo_origin',
       'clo_type',
       'clo_cate',
       'clo_model',
    ];
}
