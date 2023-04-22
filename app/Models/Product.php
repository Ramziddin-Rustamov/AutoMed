<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'qr_code',
        'numbers',
        'coming_cost',
        'selling_cost',
        'profit',
    ];
}