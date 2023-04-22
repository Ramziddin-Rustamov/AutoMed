<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ShopSeller;
use App\Models\SoldQrCodeProducts;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $services = Service::with('user')->paginate(4);
        $totalSumFromShop = ShopSeller::sum('totalPrice');
        $SumOfQr = SoldQrCodeProducts::sum('overalCost');
        $totalSumFromService = Service::sum('totalPrice');
        return view('home', [
            'services' => $services,
            'shopTotalPrice' => $totalSumFromShop,
            'SumOfQr' => $SumOfQr,
            'serviceTotalPrice' => $totalSumFromService
        ]);
    }
    public function redirect()
    {
        return view('redirected');
    }
}
