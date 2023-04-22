<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\SoldQrCodeProducts;
use Exception;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class SellBYQrCodeLiveware extends Component
{

    public $qrcode;
    public $fullInterfaceProduct = array();
    public $key;
    public $productNames = array();

    public $overalPrice = 0;    
    public $sellButton = false;
    public $productId = array();


    public function booted()
    {
       $product = Product::where('numbers','<=','0')->get();
       if(count($product)){
        $product->delete();
       }
    }

    public function backProduct($foreachindex, $name)
    {
        // dd($id);
        if(count($this->fullInterfaceProduct)){
            foreach($this->fullInterfaceProduct as  $keyfirst => $value){
                if(count($value)){
                    foreach($value as $key => $val){
                        $this->key = $key;
                        unset($this->fullInterfaceProduct[$foreachindex]);
                        return $this->fullInterfaceProduct;
                    }
                }
            }
        }
    }


    public function sellProduct()
    {
        if(count($this->fullInterfaceProduct)){
            foreach($this->fullInterfaceProduct as  $keyfirst => $value){
                if(count($value)){
                    foreach($value as $val){
                        $this->productId[]= $val['id'];
                        $this->overalPrice += $val['selling_cost'];
                        $this->productNames[] =$val['name'];
                    }
                }
            }
        }
        foreach($this->productId as $id){
            $product = Product::where('id',$id)->get();
            foreach($product as $pro){
                $pro->numbers = $pro->numbers-1;
                $pro->save();
            }
        }

        $sold = new SoldQrCodeProducts();
        $sold->products = json_encode($this->productNames);
        $sold->overalCost = $this->overalPrice;
        $sold->user_id = auth()->user()->id;
        $sold->save();
        $this->fullInterfaceProduct = [];
        $this->overalPrice = 0;
        return   Alert::error();

    }


    public function updatedqrcode($qrcode)
    {
         $this->qrcode = $qrcode;
         
            $findedProduct = Product::where('qr_code',$this->qrcode)->get();
            if(count($findedProduct)){
                $this->sellButton = true;
                $this->qrcode = null;
                array_push($this->fullInterfaceProduct,$findedProduct);
                return $this->fullInterfaceProduct;
            }else{
               $this->qrcode = null;
               return $this->fullInterfaceProduct;
            }   
          
    }



    public function render()
    {
        return view('livewire.sell-b-y-qr-code-liveware');
    }
}
