<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'title',
        // 'img',
        'subtitle',
        'category_id',
        'price',
        'left',
        'brand',
        'desc',
        'info'
    ];

    protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
        'desc' => 'array',
        'info' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', "id");
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }
}
