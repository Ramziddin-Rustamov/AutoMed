<?php

namespace App\Http\Controllers;

use Spatie\Browsershot\Browsershot;

use App\Models\Service;
use App\Models\ShopSeller;

class ClientController extends Controller
{

    public function update($id)
    {
        // dd($id);
        $singleClient = Service::find($id);
        if ($singleClient) {
            $singleClient->status = 'Naxt';
            $singleClient->update();
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function updateSell($id)
    {
        $sellStatus = ShopSeller::find($id);
        if ($sellStatus) {
            $sellStatus->status = 'Naxt';
            $sellStatus->update();
            return redirect()->back();
        }
        return redirect()->back();
    }
}