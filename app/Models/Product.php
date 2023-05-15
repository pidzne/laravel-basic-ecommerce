<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cate_id',
        'brand_id',
        'prod_name',
        'prod_slug',
        'prod_small_description',
        'prod_detail_description',
        'prod_original_price',
        'prod_selling_price',
        'prod_image',
        'prod_quantity',
        'prod_size',
        'prod_brand',
        'prod_top_selling',
        'prod_status'
    ];

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    /**
     * Get the brand that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    /**
     * Get all of the prodColor for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prodColor(): HasMany
    {
        return $this->hasMany(Color::class, 'prod_id', 'id');
    }

    /**
     * Get all of the prodSize for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prodSize(): HasMany
    {
        return $this->hasMany(Size::class, 'prod_id', 'id');
    }

    /**
     * Get all of the prodImage for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prodImage(): HasMany
    {
        return $this->hasMany(Album::class, 'prod_id', 'id');
    }

}
