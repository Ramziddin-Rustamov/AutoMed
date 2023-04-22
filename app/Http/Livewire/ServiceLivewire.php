<?php

namespace App\Http\Livewire;

// use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

use Spatie\Browsershot\Browsershot;

// use Illuminate\Support\Arr;


use function Livewire\invade;

class ServiceLivewire extends Component
{

    //
    public $phoneShould;
    //giving date to component by mount

    public $services;
    public $masters;
    public $products;

    public $totalPrice1;
    public $totalPrice2;
    public $totalPrice3;
    public $totalPrice4;
    public $totalPrice5;
    public $totalPrice6;
    public $totalPrice7;
    public $totalPrice8;
    public $totalPrice9;
    public $totalPrice10;

    //all total price 

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
    public $formProduct5 = null;
    public $formProduct6 = null;
    public $formProduct7 = null;
    public $formProduct8 = null;
    public $formProduct9 = null;
    public $formProduct10 = null;

    public $formNumbers1  = null;
    public $formNumbers2 = null;
    public $formNumbers3 = null;
    public $formNumbers4 = null;
    public $formNumbers5 = null;
    public $formNumbers6 = null;
    public $formNumbers7 = null;
    public $formNumbers8 = null;
    public $formNumbers9= null;
    public $formNumbers10 = null;
    // checking Total

    // products cost
    public $product1Cost;
    public $product2Cost;
    public $product3Cost;
    public $product4Cost;
    public $product5Cost;
    public $product6Cost;
    public $product7Cost;
    public $product8Cost;
    public $product9Cost;
    public $product10Cost;
    //check ready or not

    //get product numbers to limit how much stored to datebase numbers only
    public $product1NumberMax = null;
    public $product2NumberMax = null;
    public $product3NumberMax = null;
    public $product4NumberMax = null;
    public $product5NumberMax = null;
    public $product6NumberMax = null;
    public $product7NumberMax = null;
    public $product8NumberMax = null;
    public $product9NumberMax = null;
    public $product10NumberMax = null;


    //for searching 
    public $searchcarnumber;
    public $searchname;


    // one two or three and four prices
    public $total1price;
    public $total2price;
    public $total3price;
    public $total4price;
    public $total5price;
    public $total6price;
    public $total7price;
    public $total8price;
    public $total9price;
    public $total10price;
    public $ready = 0;

    //gaving date to foreach from datebase which not equal to previuos one 
    public $baseproduct2;
    public $baseproduct3;
    public $baseproduct4;
    public $baseproduct5;
    public $baseproduct6;
    public $baseproduct7;
    public $baseproduct8;
    public $baseproduct9;
    public $baseproduct10;

    public function mount()
    {
        $preMasters = User::where('job', 'master')->get();
        $this->masters = $preMasters;
        $preService = Service::orderBy('id', 'DESC')->get();
        $this->services = $preService;
        $this->products = Product::where('numbers', '>', 0)->get();
        $product = Product::where('numbers', '<=', '0')->get();
        if ($product) {
            foreach ($product as $value) {
                $value->delete();
            }
        }
    }
    // searching
    public function updatedsearchname($searchname)
    {
        $this->services = Service::where('clientName', 'like', '%' . $searchname . '%')->orderBy('id', 'DESC')->get();
    }
    public function updatedsearchcarnumber($searchcarnumber)
    {
        $this->services = Service::where('clientCarNumber', 'like', '%' . $searchcarnumber . '%')->orderBy('id', 'DESC')->get();
    }

    // validation
    public function updatedformMaster($formMaster)
    {
        if ($formMaster != 'Kimsiz ?' && $formMaster) {
            $this->formMaster = $formMaster;
        }
    }

    public function updatedformClientName($formClientName)
    {
        $this->formClientName = $formClientName;
    }

    public function updatedformClientPhone($formClientPhone)
    {
        $this->formClientPhone = $formClientPhone;
    }
    public function updatedformStatus($formStatus)
    {
        $this->formStatus = $formStatus;
        if ($this->formStatus == "Qarz") {
            $this->phoneShould = true;
        }
        if ($this->formStatus == "Naxt") {
            $this->phoneShould = false;
        }
      $this->allTotalPrice = $this->totalPrice1 +  $this->totalPrice2 + $this->totalPrice3 + $this->totalPrice4;

    }

    public function updatedformClientCarNumber($formClientCarNumber)
    {
        $this->formClientCarNumber = $formClientCarNumber;
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
        if ($this->formProduct4) {
            $this->baseproduct5 = Product::where('name', '!=', $this->formProduct4)
                ->where('name', '!=', $this->formProduct3)
                ->where('name', '!=', $this->formProduct2)
                ->where('name', '!=', $this->formProduct1)->get();
        }
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
    // 5
    public function updatedformProduct5($formProduct5)
    {
        $this->formProduct5 = $formProduct5;
        if ($this->formProduct5) {
            $this->baseproduct6 = Product::where('name', '!=', $this->formProduct5)
                ->where('name', '!=', $this->formProduct4)
                ->where('name', '!=', $this->formProduct3)
                ->where('name', '!=', $this->formProduct2)
                ->where('name', '!=', $this->formProduct1)->get();
        }
    }
    
    public function updatedformNumbers5($formNumbers5)
    {
        $this->formNumbers5 = $formNumbers5;
        if ($formNumbers5) {
            $product5 = Product::where('name', $this->formProduct5)->get();
            foreach ($product5 as $c) {
                $this->product5Cost =  $c->selling_cost;
                $this->product5NumberMax = $c->numbers;
                $this->totalPrice5 = intval($this->product5Cost) * floatval($this->formNumbers5);
            }
        }
    }
    // 6
    public function updatedformProduct6($formProduct6)
    {
        $this->formProduct6 = $formProduct6;
        if ($this->formProduct6) {
            $this->baseproduct7 = Product::where('name', '!=', $this->formProduct6)
                ->where('name', '!=', $this->formProduct5)
                ->where('name', '!=', $this->formProduct4)
                ->where('name', '!=', $this->formProduct3)
                ->where('name', '!=', $this->formProduct2)
                ->where('name', '!=', $this->formProduct1)->get();
        }
    }
    
    public function updatedformNumbers6($formNumbers6)
    {
        $this->formNumbers6 = $formNumbers6;
        if ($formNumbers6) {
            $product6 = Product::where('name', $this->formProduct6)->get();
            foreach ($product6 as $c) {
                $this->product6Cost =  $c->selling_cost;
                $this->product6NumberMax = $c->numbers;
                $this->totalPrice6 = intval($this->product6Cost) * floatval($this->formNumbers6);
            }
        }
    }

    // 7

    public function updatedformProduct7($formProduct7)
    {
        $this->formProduct7 = $formProduct7;
        if ($this->formProduct7) {
            $this->baseproduct8 = Product::where('name', '!=', $this->formProduct7)
                ->where('name', '!=', $this->formProduct6)
                ->where('name', '!=', $this->formProduct5)
                ->where('name', '!=', $this->formProduct4)
                ->where('name', '!=', $this->formProduct3)
                ->where('name', '!=', $this->formProduct2)
                ->where('name', '!=', $this->formProduct1)->get();
        }
    }
    
    public function updatedformNumbers7($formNumbers7)
    {
        $this->formNumbers7 = $formNumbers7;
        if ($formNumbers7) {
            $product7 = Product::where('name', $this->formProduct7)->get();
            foreach ($product7 as $c) {
                $this->product7Cost =  $c->selling_cost;
                $this->product7NumberMax = $c->numbers;
                $this->totalPrice7 = intval($this->product7Cost) * floatval($this->formNumbers7);
            }
        }
    }
    // 8
    public function updatedformProduct8($formProduct8)
    {
        $this->formProduct8 = $formProduct8;
        if ($this->formProduct8) {
            $this->baseproduct9 = Product::where('name', '!=', $this->formProduct8)
                ->where('name', '!=', $this->formProduct7)
                ->where('name', '!=', $this->formProduct6)
                ->where('name', '!=', $this->formProduct5)
                ->where('name', '!=', $this->formProduct4)
                ->where('name', '!=', $this->formProduct3)
                ->where('name', '!=', $this->formProduct2)
                ->where('name', '!=', $this->formProduct1)->get();
        }
    }
    
    public function updatedformNumbers8($formNumbers8)
    {
        $this->formNumbers8 = $formNumbers8;
        if ($formNumbers8) {
            $product8 = Product::where('name', $this->formProduct8)->get();
            foreach ($product8 as $c) {
                $this->product8Cost =  $c->selling_cost;
                $this->product8NumberMax = $c->numbers;
                $this->totalPrice8 = intval($this->product8Cost) * floatval($this->formNumbers8);
            }
        }
    }
    // 9
    public function updatedformProduct9($formProduct9)
    {
        $this->formProduct9 = $formProduct9;
        if ($this->formProduct9) {
            $this->baseproduct10 = Product::where('name', '!=', $this->formProduct9)
                ->where('name', '!=', $this->formProduct8)
                ->where('name', '!=', $this->formProduct7)
                ->where('name', '!=', $this->formProduct6)
                ->where('name', '!=', $this->formProduct5)
                ->where('name', '!=', $this->formProduct4)
                ->where('name', '!=', $this->formProduct3)
                ->where('name', '!=', $this->formProduct2)
                ->where('name', '!=', $this->formProduct1)->get();
        }
    }
    
    public function updatedformNumbers9($formNumbers9)
    {
        $this->formNumbers9 = $formNumbers9;
        if ($formNumbers9) {
            $product9 = Product::where('name', $this->formProduct9)->get();
            foreach ($product9 as $c) {
                $this->product9Cost =  $c->selling_cost;
                $this->product9NumberMax = $c->numbers;
                $this->totalPrice9 = intval($this->product9Cost) * floatval($this->formNumbers9);
            }
        }
    }
    // 10
    public function updatedformProduct10($formProduct10)
    {
        $this->formProduct10 = $formProduct10;
    }
    
    public function updatedformNumbers10($formNumbers10)
    {
        $this->formNumbers10 = $formNumbers10;
        if ($formNumbers10) {
            $product10 = Product::where('name', $this->formProduct10)->get();
            foreach ($product10 as $c) {
                $this->product10Cost =  $c->selling_cost;
                $this->product10NumberMax = $c->numbers;
                $this->totalPrice10 = intval($this->product10Cost) * floatval($this->formNumbers10);
            }
        }
    }


    public function updated($var)
    {
        $this->validateOnly($var, [
            'formProduct1' => ['required', 'exists:products,name'],
            'formMaster' => ['string'],
            'formClientName' => ['required'],
            'formStatus' => ['required'],
            'formNumbers1' => ['required', 'digits_between:1,1000000'],
            'formNumbers2' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers3' => ['nullable', 'sometimes',  'digits_between:1,1000000'],
            'formNumbers4' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers5' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers6' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers7' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers8' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers9' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers10' => ['nullable', 'sometimes', 'digits_between:1,1000000']
        ]);
    }
    public function saveService()
    {
        $this->validate([
            'formProduct1' => ['required', 'exists:products,name'],
            'formMaster' => ['required'],
            'formStatus' => ['required'],
            'formNumbers1' => ['required', 'digits_between:1,1000000'],
            'formNumbers2' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers3' => ['nullable', 'sometimes',  'digits_between:1,1000000'],
            'formNumbers4' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers5' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers6' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers7' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers8' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers9' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
            'formNumbers10' => ['nullable', 'sometimes', 'digits_between:1,1000000'],
        ]);

        $serviceCreated = Service::create([
            'clientName' => $this->formClientName ?? 'Naxt to`langan ',
            'clientPhone' => $this->formClientPhone,
            'clientCarNumber' => $this->formClientCarNumber,
            'user_id' => $this->formMaster,

            'product1' => $this->formProduct1,
            'product2' => $this->formProduct2,
            'product3' => $this->formProduct3,
            'product4' => $this->formProduct4,
            'product4' => $this->formProduct5,
            'product4' => $this->formProduct6,
            'product4' => $this->formProduct7,
            'product4' => $this->formProduct8,
            'product4' => $this->formProduct9,
            'product4' => $this->formProduct10,
            'status' => $this->formStatus,

            'numproduct1' => $this->formNumbers1,
            'numproduct2' => $this->formNumbers2,
            'numproduct3' => $this->formNumbers3,
            'numproduct4' => $this->formNumbers4,
            'numproduct5' => $this->formNumbers5,
            'numproduct6' => $this->formNumbers6,
            'numproduct7' => $this->formNumbers7,
            'numproduct8' => $this->formNumbers8,
            'numproduct9' => $this->formNumbers9,
            'numproduct10' => $this->formNumbers10,

            'total1price' => $this->totalPrice1,
            'total2price' => $this->totalPrice2,
            'total3price' => $this->totalPrice3,
            'total4price' => $this->totalPrice4,
            'total5price' => $this->totalPrice5,
            'total6price' => $this->totalPrice6,
            'total7price' => $this->totalPrice7,
            'total8price' => $this->totalPrice8,
            'total9price' => $this->totalPrice9,
            'total10price' => $this->totalPrice10,

            'totalPrice' => $this->allTotalPrice,
            'publishedBy' => Auth::user()->name,
        ]);



        //gaving users sucess message !

        Alert::success('Muvaffaqiyatli', ' Mijoz Bazaga Qo`shildi  !');

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
        if ($this->formNumbers5 && $this->formProduct5) {
            $product5Updated = Product::where('name', $this->formProduct5)->first();
            $substraction = floatval($this->product5NumberMax) - floatval($this->formNumbers5);
            $product5Updated->numbers = $substraction;
            $product5Updated->save();
        }
        if ($this->formNumbers6 && $this->formProduct6) {
            $product6Updated = Product::where('name', $this->formProduct6)->first();
            $substraction = floatval($this->product6NumberMax) - floatval($this->formNumbers6);
            $product6Updated->numbers = $substraction;
            $product6Updated->save();
        }
        if ($this->formNumbers7 && $this->formProduct7) {
            $product7Updated = Product::where('name', $this->formProduct7)->first();
            $substraction = floatval($this->product7NumberMax) - floatval($this->formNumbers7);
            $product7Updated->numbers = $substraction;
            $product7Updated->save();
        }
        if ($this->formNumbers8 && $this->formProduct8) {
            $product8Updated = Product::where('name', $this->formProduct8)->first();
            $substraction = floatval($this->product8NumberMax) - floatval($this->formNumbers8);
            $product8Updated->numbers = $substraction;
            $product8Updated->save();
        }
        if ($this->formNumbers9 && $this->formProduct9) {
            $product9Updated = Product::where('name', $this->formProduct9)->first();
            $substraction = floatval($this->product9NumberMax) - floatval($this->formNumbers9);
            $product9Updated->numbers = $substraction;
            $product9Updated->save();
        }
        if ($this->formNumbers10 && $this->formProduct10) {
            $product10Updated = Product::where('name', $this->formProduct10)->first();
            $substraction = floatval($this->product10NumberMax) - floatval($this->formNumbers10);
            $product10Updated->numbers = $substraction;
            $product10Updated->save();
        }



        $this->formMaster = "";
        $this->formClientName = "";
        $this->formClientPhone = "";
        $this->formClientCarNumber = "";

        $this->formProduct1 = "";
        $this->formProduct2 = "";
        $this->formProduct3 = "";
        $this->formProduct4 = "";
        $this->formProduct5 = "";
        $this->formProduct6 = "";
        $this->formProduct7 = "";
        $this->formProduct8 = "";
        $this->formProduct9 = "";
        $this->formProduct10 = "";

        $this->formNumbers1 = "";
        $this->formNumbers2 = "";
        $this->formNumbers3 = "";
        $this->formNumbers4 = "";
        $this->formNumbers5 = "";
        $this->formNumbers6 = "";
        $this->formNumbers7 = "";
        $this->formNumbers8 = "";
        $this->formNumbers9 = "";
        $this->formNumbers10 = "";

        $this->formStatus = "";
        $this->allTotalPrice = "";

        $this->product1Cost = "";
        $this->product2Cost = "";
        $this->product3Cost = "";
        $this->product4Cost = "";
        $this->product5Cost = "";
        $this->product6Cost = "";
        $this->product7Cost = "";
        $this->product8Cost = "";
        $this->product9Cost = "";
        $this->product10Cost = "";

        // $this->numproduct1 = null;
        // $this->numproduct2 = null;
        // $this->numproduct3 = null;
        // $this->numproduct4 = null;

        $this->total1price = null;
        $this->total2price = null;
        $this->total3price = null;
        $this->total4price = null;
        $this->total5price = null;
        $this->total6price = null;
        $this->total7price = null;
        $this->total8price = null;
        $this->total9price = null;
        $this->total10price = null;

        $this->product1NumberMax = null;
        $this->product2NumberMax = null;
        $this->product3NumberMax = null;
        $this->product4NumberMax = null;
        $this->product5NumberMax = null;
        $this->product6NumberMax = null;
        $this->product7NumberMax = null;
        $this->product8NumberMax = null;
        $this->product9NumberMax = null;
        $this->product10NumberMax = null;
        redirect()->to('pdf');
    }

    public function render()
    {
        return view('livewire.service-livewire');
    }
}
