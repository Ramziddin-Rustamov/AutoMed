<?php

namespace App\Http\Livewire;

use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\Component;

class ProductsLivewire extends Component
{
    // public $code;
    public $products;
    public $codeed;
    public $name;
    public $numbers;
    public $comingCost;
    public $sellingCost;
    public $profit;
    public $overalProfit;


    public function mount()
    {
        $initialProducrt = Product::orderBy('id', 'DESC')->get();
        $this->products = $initialProducrt;
    }

    public function updatedcodeed($codeed)
    {
        $this->codeed = $codeed;
        // dd($this->some);
    }

    public function updatedname($name)
    {
        $this->name = $name;
        // dd($this->name);
    }

    public function updatednumbers($number)
    {
        $this->numbers = $number;
        // dd($this->numbers);
    }

    public function updatedcomingCost($cost)
    {
        $this->comingCost = $cost;
        // dd($this->comingCost);
    }

    public function updatedsellingCost($sellingCost)
    {
        $this->sellingCost = $sellingCost;
        $this->profit = intval($this->sellingCost) - intval($this->comingCost);
        $this->overalProfit = (intval($this->sellingCost) - intval($this->comingCost)) * intval($this->numbers);
    }

    public function updated($date)
    {
        $this->validateOnly($date, [
            'name' => ['required'],
            'numbers' => ['required', 'integer'],
            'comingCost' => ['required', 'integer'],
            'sellingCost' => ['required', 'integer',],
            'codeed' => ['required', 'min:2', 'integer'],
        ]);
    }
    public function addProduct()
    {
        $this->validate([
            'name' => ['required'],
            'numbers' => ['required', 'integer'],
            'comingCost' => ['required', 'integer'],
            'sellingCost' => ['required', 'integer'],
            'codeed' => ['required', 'numeric'], //'exists:products,qr_code'
        ]);
        $createdProduct = Product::create([
            'name' => $this->name,
            'qr_code' => $this->codeed,
            'numbers' => $this->numbers,
            'coming_cost' => $this->comingCost,
            'selling_cost' => $this->sellingCost,
            'profit' => intval($this->sellingCost) - intval($this->comingCost)
        ]);
        $this->products->prepend($createdProduct);
        session()->flash('Muvaffaqiyatli !',  $this->name . ' - maxsulotdan ' . $this->numbers . ' ta  bazaga  qushildi ! Qoladigan foyda  xar bir maxsulotdan  ' . $this->profit . ' Umumiy sof foyda -  ' . $this->overalProfit . ' so`m');
        $this->name = "";
        $this->codeed = "";
        $this->numbers = "";    
        $this->comingCost = "";
        $this->sellingCost = "";
    }

    public function removeProduct($productId)
    {
        $product = Product::find($productId);
        if($product){
            $this->products = $this->products->where('id', '!=', $productId);
            $product->delete();
            Alert::success('Muvaffaqiyatli !', 'Ma`lumot o`chirildi !');
        }
    }



    public function render()
    {
        return view('livewire.products-livewire');
    }
}
