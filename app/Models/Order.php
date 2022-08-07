<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'city',
        'address',
        'role',
        'payment_method',
        'with_delivery'
    ];

    protected $casts = [
        'products' => 'array'
    ];

    public function order_products()
    {
        return $this->belongsToMany(Product::class,'order_products');
    }
}
