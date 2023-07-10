  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
     <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-center">
              @auth
               @can('super-admin')
                 <h6 class="text-center">From Selling  <i class="fas fa-sell"></i></h6>
               @endcan
                 @can('seller')
                 <h6 class="text-center">Selling  ! <i class="fas fa-sell"></i></h6>
               @endcan
              @endauth
            </div>
             @auth
               @can('seller')
            <div class="card-body px-0 pt-0 pb-2">
                <div class="container">
                <form  wire:submit.prevent="sell()" >
               <div class="row">
                      <div class="d-flex justify-content-start text-danger">{{ number_format($totalPrice1) }}</div>
                     <div class="col-md-12">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus"></i>                      
                            <label class="input-group text-lg" for="inputGroupSelect111102">{{ _('Product 1') }}</label>
                            <select required wire:model.lazy="formProduct1" name="" id="" class="form-control">
                           @if(count($products))
                             <option  selected class="form-control border-2 text-lg py-2 my-2">Which product?</option>
                              @foreach($products as $product) 
                                 <option  value="{{ $product->name }}" class="form-control  text-lg py-2 my-2">{{ $product->name }} <br> <span class="text-danger"> ( Narxi - {{ number_format($product->selling_cost) }})</span> <hr></option>
                            @endforeach
                           @endif
                            </select>
                          </div>
                        @error('formProduct1')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-md-12 border-bottom-2">
                        <div class="input-group mb-3"><i class="fab fa-product-hunt"></i>
                            <label class="input-group text-lg" for="inputGroupSelect02">{{ _('Quantity 1') }} 
                            @if($product1NumberMax)
                             <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger">  Productleft in the warehouse  {{ number_format($product1NumberMax) }}  !</span>
                            @endif
                            </label>        
                            <input required type="number" wire:model.lazy="formNumbers1"  name="" id="sellingCost " class="form-control">
                        
                          </div>
                        @error('formNumbers1')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                     
                    <div class="d-flex justify-content-start text-danger">{{ number_format($totalPrice2)}}</div>
                    <div class="col-md-12">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus"></i>
                            <label class="input-group text-lg" for="inputGroupSelect11102">{{ _('Product 2') }}</label>
                            <select wire:model.lazy="formProduct2" name="" id="" class="form-control">
                           @if($baseproduct2)
                             <option selected class="form-control form-control text-lg py-2 my-2">Which product?</option>
                              @foreach($baseproduct2 as $product) 
                                 <option value="{{ $product->name }}" class="form-control form-control text-lg py-2 my-2">{{ $product->name }} <br> <span class="text-danger"> ( Narxi - {{ number_format($product->selling_cost) }})</span> <hr> </option>
                            @endforeach
                            @else
                                 <option class="form-control disabled" disabled>Product Yo'q </option>
                           @endif
                            </select>
                          </div>
                        @error('formProduct2')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                     <div class="col-md-12">
                        <div class="input-group mb-3"><i class="fab fa-product-hunt"></i>
                            <label class="input-group text-lg" for="inputGroupSelect0122">{{ _('Miqdor 2') }}
                             @if($product2NumberMax)
                             <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger">  Productleft in the warehouse {{( number_format($product2NumberMax)) }}  !</span>
                            @endif
                            </label>
                            <input  type="number" wire:model.lazy="formNumbers2" name="" id="sellingCost" class="form-control">
                          </div>
                        @error('formNumbers2')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="d-flex justify-content-start text-danger">{{ number_format($totalPrice3) }}</div>
                    <div class="col-md-12">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus"></i>
                            <label class="input-group text-lg" for="inputGroupSelect1102">{{ _('Product 3') }} </label>
                            <select  wire:model.lazy="formProduct3" name="" id="" class="form-control">
                           @if($baseproduct3)
                             <option selected class="form-control form-control text-lg py-2 my-2">Which product?</option>
                              @foreach($baseproduct3 as $product) 
                                 <option value="{{ $product->name }}" class="form-control form-control text-lg py-2 my-2">{{ $product->name }} <br> <span class="text-danger"> ( Narxi - {{ number_format($product->selling_cost) }})</span> <hr> </option>
                            @endforeach
                             @else
                                 <option class="form-control disabled" disabled>Product Yo'q </option>
                           @endif
                            </select>
                          </div>
                        @error('formProduct3')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mb-3"><i class="fab fa-product-hunt"></i>
                            <label class="input-group text-lg" for="inputGroupSelect01222">{{ _('Miqdor 3') }}
                             @if($product3NumberMax)
                             <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger">  Productleft in the warehouse {{number_format($product3NumberMax) }}  !</span>
                            @endif
                            </label>
                            <input  type="number" wire:model.lazy="formNumbers3" name="" id="sellingCost" class="form-control">
                          </div>
                        @error('formNumbers3')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="d-flex justify-content-start text-danger">{{number_format( $totalPrice4) }}</div>
                    <div class="col-md-12">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus"></i>
                            <label class="input-group text-lg" for="inputGroupSelect102">{{ _('Product 4 '  ) }} </label>
                            <select wire:model.lazy="formProduct4" name="" id="" class="form-control">
                           @if($baseproduct4)
                             <option selected class="form-control form-control text-lg py-2 my-2">Which product?</option>
                              @foreach($baseproduct4 as $product) 
                                 <option value="{{ $product->name }}" class="form-control form-control text-lg py-2 my-2">{{ $product->name }} <br> <span class="text-danger"> ( Narxi - {{ number_format($product->selling_cost) }})</span> <hr> </option>
                            @endforeach
                             @else
                                 <option class="form-control disabled" disabled>No Product </option>
                           @endif
                            </select>
                          </div>
                        @error('formProduct4')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                     <div class="col-md-12">
                        <div class="input-group mb-3"><i class="fab fa-product-hunt"></i>
                            <label class="input-group text-lg" for="inputGroupSelect0122q2">{{ _('Miqdor 4') }}
                             @if($product4NumberMax)
                             <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger">  Productleft in the warehouse {{ number_format($product4NumberMax) }}  !</span>
                            @endif
                            </label>
                            <input  type="number" wire:model.lazy="formNumbers4" name="" id="sellingCost" class="form-control">
                          </div>
                        @error('formNumbers4')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                    <br><br>
                   <div class="col-md-12">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus"></i>
                            <label class="input-group" for="inputGroupSelect01 form-control text-lg py-2 my-2">{{ _('Holati') }}</label>
                            <select required wire:model.lazy="formStatus" name="" id="" class="form-control">                
                             <option selected class="form-control text-lg"></option>
                             <option  value="Naxt" class="form-control text-lg py-2 my-2">The money was paid <i class="fas fa-money-bill"></i></option>
                             <option value="Qarz" class="form-control text-lg py-2 my-2">The loan was serviced!</option>
                            </select>
                          </div>
                        @error('formStatus')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                    @if($phoneRequired)
                    <div class="col-md-12">
                        <div class="input-group mb-3"> <i class="fas fa-phone"></i>
                            <label class="input-group" for="inputGroupSelect04">{{ _('Customer Phone Number') }}</label>
                            <input required type="number" wire:model.lazy="formClientPhone" name="formClientPhone" class="form-control">
                        </div>
                        @error('formClientPhone')
                            <span class="text-danger py-1">{{ $message }}</span>
                        @enderror
                    </div>
                    @endif
                     <div class="col-md-12">
                        <div class="d-flex  justify-content-between">
                            <div class="text-success">
                              @if($allTotalPrice)
                              Total Value-  {{ $allTotalPrice }}
                              @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div>
                            {{-- <button type="submit" class="btn btn-primary ">Sotish !<i class="fas fa-check"></i></button> --}}
                            <button type="submit" class="btn btn-primary btn-lg btn-block"><h3>Sell </h3> </button>
                         </div>
                        </div>
                        <hr>
                    </div>
                    @if (session('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                    @endif
                {{-- @endif --}}
                </div>{{-- ending row --}}
              </form>
              </div>
              </div>
               @endcan
             @endauth
              @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
             {{-- @guest --}}
               
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 table-hover ">
                  <thead class="table-success text-dark">
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer phone number
                        <input type="text" wire:model="searchPhone" id="" class="form-control">
                      </th>
                       <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Received Product</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          The date</th>
                         <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          Status</th> 
                       @can('super-admin')
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Message</th> 
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        + / -</th>  
                       @endcan        
                    </tr>
                  </thead>
                   @if(count($sell))
                  <tbody class="table-hover">
                   @foreach($sell as $value)
                  <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center font-bold">{{$value->status == 'Naxt' ? 'To`landi ' :  $value->clientPhone   }}</p>
                      </td>

                      <td class="align-middle  text-sm"> 
                       Narxi - {{ number_format(floatval($value->total1price) / floatval( $value->numproduct1)) }} , {{$value->product1  }} - dan , <span > {{ $value->numproduct1 }} ta </span><span> , overall = {{ number_format($value->total1price) }}</span> <br>
                       @if($value->total2price)
                       Narxi - {{ number_format(floatval($value->total2price) / floatval( $value->numproduct2)) }} , {{$value->product2  }} - dan , <span > {{ $value->numproduct2 }} ta </span><span> , overlall = {{ number_format($value->total2price) }}</span> <br>
                       @endif
                       @if($value->numproduct3)
                         Narxi - {{ number_format(floatval($value->total3price) / floatval( $value->numproduct3)) }} , {{$value->product3  }} - dan , <span > {{ $value->numproduct3 }} ta </span><span> , overlall = {{ number_format($value->total3price) }}</span> <br>
                       @endif
                       @if($value->numproduct4)
                       Narxi - {{ number_format(floatval($value->total4price) / floatval( $value->numproduct4)) }} , {{$value->product4  }} - dan , <span > {{ $value->numproduct4 }} ta </span><span> , overlall = {{  number_format($value->total4price) }}</span> <br>
                       @endif
                       Umumiy qiymati = {{  number_format(floatval( $value->total1price) +floatval( $value->total2price)+floatval( $value->total3price)+floatval( $value->total4price))}} <br>
                      </td>     
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $value->created_at }}</span>
                      </td>
                     <td class="align-middle text-center text-sm">
                        @if($value->status == 'Naxt')
                        <span class="badge badge-sm bg-gradient-success">
                                Paid 
                        </span>
                         @endif
                          @if($value->status == 'Qarz')
                        <span class="badge badge-sm bg-gradient-danger">
                                Loan
                        </span>
                         @endif    
                      </td> 
                      @auth
                      @can('super-admin')
                       @if($value->status == 'Qarz')
                      <td class="align-middle">
                        <a href="#" class="text-danger font-weight-bold text-xs" data-toggle="tooltip"
                          data-original-title="Sms Yuborish">
                         {{-- <i class="fas fa-mail"></i> --}}
                         <button  class="btn btn-primary"> <i class="fas fa-envelope"></i> </button>
                        </a>
                      </td>
                       <td class="align-middle">
                       <form action="{{ route('sell.update',['id'=>$value->id]) }}" method="POST">
                           @csrf
                           @method('put')
                            <button type="submit" class="btn btn-primary" >Paid  ?! </button>
                       </form>
                      </td>
                      @else
                        <td class="align-middle">
                         <i class=" align-middle fas fa-check"></i>
                      </td>
                      <td class="align-middle">
                         <i class=" align-middle fas fa-check"></i>
                      </td>
                      @endif
                      @endcan
                      @endauth
                    </tr>
                   @endforeach
                  </tbody>
                   @else
                      <p class="text-center text-danger">Not sold </p>
                    @endif  
                </table>
              </div> 
             {{-- @endguest --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
