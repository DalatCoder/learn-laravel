<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'content',
        'user_id',
        'category_id',
        'feature_image_name',
        'feature_image_path'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
