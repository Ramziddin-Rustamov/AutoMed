<?php

namespace App\Http\Livewire;

use App\Models\SoldQrCodeProducts;
use Livewire\Component;

class HomeQrcodeLivewire extends Component
{


    public $qrcodeProducts;


    public function mount()
    {
        $this->qrcodeProducts = SoldQrCodeProducts::orderBy('id', 'DESC')->get();
    }


    public function render()
    {
        return view('livewire.home-qrcode-livewire');
    }
}
