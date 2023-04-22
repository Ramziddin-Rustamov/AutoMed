@extends('layouts.app')
@section('title', 'Boshqaruv')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   <div class="container-fluid py-4">
   <div class="row">
      <div class="col-xl-12 col-sm-12 py-5">
         <div class="card">
         <div class="card-body p-3">
            <div class="row">
               <div class="col-12">
               <div class="numbers">
                 
                  <h3 class="font-weight-bolder mb-0 text-center">
                   Umumiy Summa Aylanmasi <i class="fas fa-circle"></i>
                  </h3>
               </div>
               </div>
               <div class=" d-flex justify-content-around pb-2">
                  <div class="col-4 text-center h5">
                       Magazindan - <span class="text-success">{{  number_format($shopTotalPrice)  }}  SO'M !</span>
                  </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                         <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
               </div>
               </div>
            
                <div class=" d-flex justify-content-around">
                  <div class="col-4 text-center h5 ">
                       Xizmatlardan - <span class="text-success">{{  number_format($serviceTotalPrice) }}   SO'M !</span>
                  </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                         <i class="fas fa-car text-lg opacity-10" aria-hidden="true"></i>
                  </div>
               </div>
               </div>
               <div class=" d-flex justify-content-around pt-2">
                  <div class="col-4 text-center h5">
                       QrCode orqali sotilgan mahsulot - <span class="text-success">{{  number_format($SumOfQr)  }}  SO'M !</span>
                  </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                         <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
               </div>
               </div>
            </div>
         </div>
         </div>
      </div>
      @if($services)
      <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
       <div class="card">
        <div class="card-body p-3">
           <div class="row">
               @foreach($services as $value)
         
               <div class="numbers">
                  <h5 class="text-sm mb-0 text-capitalize font-weight-bold text-center h3">Tushum So'm</h3>
                  <h5 class="font-weight-bolder mb-0">
                     <span class="text-success"><i class="fas fa-money-check-alt"></i>  So'mmasi : </span> <br /><span class="text-primary"> 
                    {{  $value->totalPrice ?? $value->total1price +  $value->total2price2 + $value->total3price + $value->total4price   }} so'm . </span><br> 
                    <span class="text-success"><i class="fas fa-calendar"></i>  Vaqti </span> <br> <span class="text-primary">  {{  $value->created_at  }}
                  </span><br><span class="text-success"> <i class="fas fa-user"></i> Xizmatchi : </span> <br> <span class="text-primary">   {{  $value->user->name  }}</span> <br>
                   
                  </h5>
               </div>
               <div class=" border-radius-md">
                  <h2 class="text-sm mb-0 text-capitalize font-weight-bold text-center">Olingan Mahsulotlar</h2>
                      Narxi - {{ number_format(floatval($value->total1price) / floatval( $value->numproduct1)) }} , {{$value->product1  }}dan , <span > {{ number_format($value->numproduct1) }} ta </span><span> , Umumiy = {{ number_format($value->total1price) }}</span> <br>
                       @if($value->total2price)
                       Narxi - {{ number_format(floatval($value->total2price) / floatval( $value->numproduct2)) }} , {{$value->product2  }}dan , <span > {{number_format( $value->numproduct2) }} ta </span><span> , Umumiy = {{ number_format($value->total2price) }}</span> <br>
                       @endif
                       @if($value->numproduct3)

                         Narxi - {{ number_format(floatval($value->total3price) / floatval( $value->numproduct3)) }} , {{$value->product3  }}dan , <span > {{number_format( $value->numproduct3) }} ta </span><span> , Umumiy = {{ number_format($value->total3price) }}</span> <br>
                       @endif
                       @if($value->numproduct4)
                       Narxi - {{ number_format(floatval($value->total4price) / floatval( $value->numproduct4)) }} , {{$value->product4  }}dan , <span > {{ number_format($value->numproduct4) }} ta </span><span> , Umumiy = {{ number_format($value->total4price )}}</span> <br>
                       @endif
                       Umumiy qiymati = {{ (floatval( $value->total1price) +floatval( $value->total2price)+floatval( $value->total3price)+floatval( ($value->total4price)))}} <br> <hr>
               </div>
               <hr> <hr>
               @endforeach
     
            </div>  
            <div>
               {{ $services->links()  }}
            </div> 
         </div>
          @else
          <h4 class="text-center py-5 my-5">Xizmat ko'rsatilmadi !</h4> 
         </div>
      </div>
      @endif

     
   </div>
   <div class="row my-5 pb-5">
      <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
         <div class="card">
         <div class="card-header pb-0">
            <div class="row">
               <h3 class="text-center"> <i class="fas fa-user"></i> Ustalar</h3>
               <div class="col-lg-6 col-7">
               <p class="text-sm mb-0">
                  <i class="fa fa-check text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">Bajarilgan Ishlar</span> 
               </p>
               </div>
               <div class="col-lg-6 col-5 my-auto text-end">
               </div>
            </div>
         </div>
            @livewire('master-table')
         </div>
      </div>
   </div>
    @livewire('home-qrcode-livewire')
    @livewire('service-livewire') <br> <hr>
   
   </div>
    
</main>
  @livewire('sell-product-shop-livewire')
@endsection