<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'categories_id',
        'size',
        'tags',
        'rating',
        'colors',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'categories_id','id');
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id','id');
    }
}
