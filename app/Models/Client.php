<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'name',
        'car_number',
        'client_number',
        'status',
        'user_id',
        'published_by'
    ];
    use HasFactory;
}