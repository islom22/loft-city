<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'video',
        'img1',
        'img2',
        'img3',
        'address1',
        'address2',
        'address3',
        'telegram_user',
        'telegram_link',
        'instagram',
        'phone'
];
}
