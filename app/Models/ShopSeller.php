<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopSeller extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product1',
        'product2',
        'product3',
        'product4',
        'numproduct1',
        'numproduct2',
        'numproduct3',
        'numproduct4',
        'total1price',
        'total2price',
        'total3price',
        'total4price',
        'totalPrice',
        'clientPhone',
        'status',
    ];
}
