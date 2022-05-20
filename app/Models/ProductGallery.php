<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'products_id',
    ];

    public function getUrlAttribute($url)
    {
        return config('app_url') . Storage::url($url);
    }
}
