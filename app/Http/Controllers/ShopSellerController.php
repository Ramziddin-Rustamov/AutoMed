<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ShopSellerController extends Controller
{
    public function index()
    {
        return view('sell');
    }
}