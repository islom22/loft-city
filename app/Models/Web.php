<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'city',
        'address',
        'role',
        'how_to_buy'
 ];
}
