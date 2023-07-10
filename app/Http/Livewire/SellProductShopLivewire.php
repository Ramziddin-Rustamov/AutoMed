<?php

namespace App\Http\Livewire;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Product;
use App\Models\ShopSeller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;



class SellProductShopLivewire extends Component
{

    //searching information 

    public $searchPhone;
    //giving date to component by mount

    public $sell;
    public $sellers;
    public $products;

    public $totalPrice1;
    public $totalPrice2;
    public $totalPrice3;
    public $totalPrice4;
    //all total price 
    // for phone required 
    public $phoneRequired = false;

    public $allTotalPrice = null;
    // Form
    public $formStatus;
    // public  $formServiceType;
    public $formMaster;
    public $formClientName;
    public $formClientPhone;
    public $formClientCarNumber;
    public $formProduct1  = null;
    public $formProduct2 = null;
    public $formProduct3 = null;
    public $formProduct4 = null;

    public $formNumbers1  = null;
    public $formNumbers2 = null;
    public $formNumbers3 = null;
    public $formNumbers4 = null;
    // checking Total

    // products cost
    public $product1Cost;
    public $product2Cost;
    public $product3Cost;
    public $product4Cost;
    //check ready or not

    //get product numbers to limit how much stored to datebase numbers only
    public $product1NumberMax = null;
    public $product2NumberMax = null;
    public $product3NumberMax = null;
    public $product4NumberMax = null;


    // one two or three and four prices
    public $total1price;
    public $total2price;
    public $total3price;
    public $total4price;
    //gaving date to foreach from datebase which not equal to previuos one 
    public $baseproduct2;
    public $baseproduct3;
    public $baseproduct4;

    public function mount()
    {
        $seller = User::where('job', 'seller')->get();
        $this->sellers = $seller;
        $sell = ShopSeller::orderBy('id', 'DESC')->get();
        $this->sell = $sell;
        $this->products = Product::where('numbers', '>', 0)->get();
        $product = Product::where('numbers', '<=', '0')->get();
        if ($product) {
            foreach ($product as $value) {
                $value->delete();
            }
        }
    }

    public function updatedsearchPhone($searchPhone)
    {
        $this->sell = ShopSeller::where('clientPhone', 'like', '%' . $searchPhone . '%')->get();
    }

    
    public function updatedformClientPhone($formClientPhone)
    {
        $this->formClientPhone = $formClientPhone;
    }
    public function updatedformStatus($formStatus)
    {
        $this->formStatus = $formStatus;
        if ($this->formStatus == 'Qarz') {
            $this->phoneRequired = true;
        }
        if ($this->formStatus == 'Naxt') {
            $this->phoneRequired = false;
        }
    }


    public function updatedformProduct1($formProduct1)
    {
        $this->formProduct1 = $formProduct1;
        if ($this->formProduct1) {
            $this->baseproduct2 = Product::where('name', '!=', $this->formProduct1)->get();
        }
    }

    public function updatedformNumbers1($formNumbers1)
    {
        $this->formNumbers1 = $formNumbers1;
        if ($formNumbers1) {
            $product1 = Product::where('name', $this->formProduct1)->get();
            foreach ($product1 as $c) {
                $this->product1Cost =  $c->selling_cost;
                $this->product1NumberMax = $c->numbers;
                $this->totalPrice1 = intval($this->product1Cost) * floatval($this->formNumbers1);
                // $this->allTotalPrice = $this->allTotalPrice +   $this->totalPrice1;
            }
        }
    }



    public function updatedformProduct2($formProduct2)
    {
        $this->formProduct2 = $formProduct2;
        if ($this->formProduct2) {
            $this->baseproduct3 = Product::where('name', '!=', $this->formProduct2)
                ->where('name', '!=', $this->formProduct1)->get();
        }
    }

    public function updatedformNumbers2($formNumbers2)
    {
        $this->formNumbers2 = $formNumbers2;
        if ($formNumbers2) {
            $product2 = Product::where('name', $this->formProduct2)->get();
            foreach ($product2 as $b) {
                $this->product2Cost =  $b->selling_cost;
                $this->product2NumberMax = $b->numbers;
                $this->totalPrice2 = intval($this->product2Cost) * floatval($this->formNumbers2);
                //  $this->allTotalPrice = $this->allTotalPrice +   $this->totalPrice2;
            }
        }
    }

    public function updatedformProduct3($formProduct3)
    {

        $this->formProduct3 = $formProduct3;
        if ($this->formProduct3) {
            $this->baseproduct4 = Product::where('name', '!=', $this->formProduct3)
                ->where('name', '!=', $this->formProduct2)
                ->where('name', '!=', $this->formProduct1)->get();
        }
    }

    public function updatedformNumbers3($formNumbers3)
    {
        $this->formNumbers3 = $formNumbers3;
        if ($formNumbers3) {
            $product3 = Product::where('name', $this->formProduct3)->get();
            foreach ($product3 as $c) {
                $this->product3Cost =  $c->selling_cost;
                $this->product3NumberMax = $c->numbers;
                $this->totalPrice3 = intval($this->product3Cost) * floatval($this->formNumbers3);
                // $this->allTotalPrice = $this->allTotalPrice +  $this->totalPrice3;
            }
        }
    }

    public function updatedformProduct4($formProduct4)
    {
        $this->formProduct4 = $formProduct4;
    }
    public function updatedformNumbers4($formNumbers4)
    {
        $this->formNumbers4 = $formNumbers4;
        if ($formNumbers4) {
            $product4 = Product::where('name', $this->formProduct4)->get();
            foreach ($product4 as $c) {
                $this->product4Cost =  $c->selling_cost;
                $this->product4NumberMax = $c->numbers;
                $this->totalPrice4 = intval($this->product4Cost) * floatval($this->formNumbers4);
                // $this->allTotalPrice = $this->allTotalPrice +   $this->totalPrice4;
            }
        }
    }

    public function updated($var)
    {
        $this->validateOnly($var, [

            'formProduct1' => ['required', 'exists:products,name'],
            'formStatus' => ['required'],
            'formNumbers1' => ['required', 'digits_between:1,1000000'],
            'formNumbers2' => ['nullable', 'digits_between:1,1000000'],
            'formNumbers3' => ['nullable', 'digits_between:1,1000000'],
            'formNumbers4' => ['nullable', 'digits_between:1,1000000']
        ]);
    }
    public function sell()
    {


        $this->allTotalPrice = $this->totalPrice1 +  $this->totalPrice2 + $this->totalPrice3 + $this->totalPrice4;

        $this->validate([
            'formProduct1' => ['required', 'exists:products,name'],
            'formNumbers2' => ['nullable', 'digits_between:1,1000000'],
            'formNumbers3' => ['nullable', 'digits_between:1,1000000'],
            'formNumbers4' => ['nullable', 'digits_between:1,1000000'],
            'formStatus' => ['required'],
            'formNumbers1' => ['required']
        ]);

        $serviceCreated = ShopSeller::create([

            'user_id' => Auth::user()->id,

            'product1' => $this->formProduct1,
            'product2' => $this->formProduct2,
            'product3' => $this->formProduct3,
            'product4' => $this->formProduct4,
            'status' => $this->formStatus,

            'numproduct1' => $this->formNumbers1,
            'numproduct2' => $this->formNumbers2,
            'numproduct3' => $this->formNumbers3,
            'numproduct4' => $this->formNumbers4,

            'total1price' => $this->totalPrice1,
            'total2price' => $this->totalPrice2,
            'total3price' => $this->totalPrice3,
            'total4price' => $this->totalPrice4,

            'clientPhone' => $this->formClientPhone,
            'totalPrice' => $this->allTotalPrice,
        ]);

        
        // $myfile = fopen("C:\index.html", "w");
        // $txt = "AutoMed ni tanlaganingiz uchun RAHMAT ! " . "<br />" .
        //     "Mijozimiz Telefoni : " . $this->formClientPhone . "<br />" .
        //     "Holati : " . $this->formStatus . "<br />" .
        //     "Xarid qilindi:" . "<br />" .
        //     $this->formProduct1 . '' . '- ' . 'dan - ' . $this->formNumbers1 . '' . 'ta ' . '' . '' . $this->totalPrice1 ."<br />" .
        //     $this->formProduct2 . '' . '-' . $this->formNumbers2 . '' . '' . '' . $this->totalPrice2 . "<br />" .
        //     $this->formProduct3 . '' .  '' . $this->formNumbers3 . '' . '' . '' . '' . $this->totalPrice3 . "<br />" .
        //     $this->formProduct4 . '' . '' .  $this->formNumbers4 . '' . '' . '' . '' . $this->totalPrice4 . "<br />" .
        //     "Umumiy Qiymat : " .  $this->allTotalPrice . "<br />" .
        //     "Xizmat ko`rsatdi : " . Auth::user()->name . "<br />" .
        //     "Sana : " . now() . "<br />";
        //  fwrite($myfile, $txt);
        //  shell_exec("py C:\printer.py");

        //gaving users sucess message !

        Alert::success('success', ' Mahsulot Sotildi !');

        //for check and delete from date base the numbers column 

        $product1Updated = Product::where('name', $this->formProduct1)->first();
        $substraction = floatval($this->product1NumberMax) - floatval($this->formNumbers1);
        $product1Updated->numbers = $substraction;
        $product1Updated->save();
        // dd($this->formProduct2);


        if ($this->formNumbers2 && $this->formProduct2) {
            $product2Updated = Product::where('name', $this->formProduct2)->first();
            $substraction = floatval($this->product2NumberMax) - floatval($this->formNumbers2);
            $product2Updated->numbers = $substraction;
            $product2Updated->save();
        }

        if ($this->formNumbers3 && $this->formProduct3) {
            $product3Updated = Product::where('name', $this->formProduct3)->first();
            $substraction = floatval($this->product3NumberMax) - floatval($this->formNumbers3);
            $product3Updated->numbers = $substraction;
            $product3Updated->save();
        }
        if ($this->formNumbers4 && $this->formProduct4) {
            $product4Updated = Product::where('name', $this->formProduct4)->first();
            $substraction = floatval($this->product4NumberMax) - floatval($this->formNumbers4);
            $product4Updated->numbers = $substraction;
            $product4Updated->save();
        }


        $this->formClientPhone = "";
        $this->formProduct1 = "";
        $this->formProduct2 = "";
        $this->formProduct3 = "";
        $this->formProduct4 = "";

        $this->formNumbers1 = "";
        $this->formNumbers2 = "";
        $this->formNumbers3 = "";
        $this->formNumbers4 = "";

        $this->formStatus = "";
        $this->allTotalPrice = "";

        $this->product1Cost = "";
        $this->product2Cost = "";
        $this->product3Cost = "";
        $this->product4Cost = "";
        // $this->numproduct1 = null;
        // $this->numproduct2 = null;
        // $this->numproduct3 = null;
        // $this->numproduct4 = null;
        $this->total1price = null;
        $this->total2price = null;
        $this->total3price = null;
        $this->total4price = null;

        $this->product1NumberMax = null;
        $this->product2NumberMax = null;
        $this->product3NumberMax = null;
        $this->product4NumberMax = null;
        redirect()->to('/seller');
    }

    public function render()
    {
        return view('livewire.sell-product-shop-livewire');
    }
}