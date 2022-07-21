<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'comment'
    ];

    protected $casts = [
        'title' => 'array',
        'comment' => 'array'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
