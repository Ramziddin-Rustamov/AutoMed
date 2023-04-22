<?php

namespace App\Models;

use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'serviceType',
        'product1',
        'product2',
        'product3',
        'product4',
        'clientName',
        'clientPhone',
        'clientCarNumber',
        'user_id',
        'publishedBy',

        'numproduct1',
        'numproduct2',
        'numproduct3',
        'numproduct4',

        'total1price',
        'total2price',
        'total3price',
        'total4price',

        'status',
        'totalPrice'
    ];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}