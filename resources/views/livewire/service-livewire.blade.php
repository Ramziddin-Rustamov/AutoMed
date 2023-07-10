

   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
     <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-center">
              <h3 class="text-center text-lg">Service !  <i class="fas fa-hammer"></i></h3>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              @auth
                @can('master')
                  <div class="container">
                      @if (session('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                    @endif
                     <form  wire:submit.prevent="saveService">
                      <div class="row">

                      <div  class="d-flex justify-content-start text-danger text-lg">{{ number_format($totalPrice1) }}</div>
                     <div class="col-md-6">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>                      
                            <label class="input-group text-lg" for="inputGroupSelect111102">{{ _('Product  1') }}</label>
                            <select required wire:model.lazy="formProduct1" name="" id="" class="form-control">
                           @if(count($products))
                             <option  selected class="form-control text-lg">Which product?</option>
                              @foreach($products as $product) 
                                 <option  value="{{ $product->name }}" class="form-control text-lg">{{ $product->name }} <br> <span class="text-danger"> ( Price - {{ $product->selling_cost }})</span> <hr> </option>
                            @endforeach
                           @endif
                            </select>
                          </div>
                        @error('formProduct1')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                            <label class="input-group text-lg" for="inputGroupSelect02">{{ _('Quantity 1') }} 
                            @if($product1NumberMax)
                             <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger text-lg">   Left in stock {{ number_format($product1NumberMax) }}  !</span>
                            @endif
                            </label>
                            <input required type="number" wire:model.lazy="formNumbers1"  id="sellingCost" class="form-control text-lg">
                          </div>
                        @error('formNumbers1')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                   
                    <div class="d-flex justify-content-start text-danger text-lg">{{ $totalPrice2 }}</div>
                    <div class="col-md-6">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                            <label class="input-group text-lg" for="inputGroupSelect11102">{{ _('Product  2') }}</label>
                            <select wire:model.lazy="formProduct2" name="" id="" class="form-control">
                           @if($baseproduct2)
                             <option selected class="form-control text-lg">Which product?</option>
                              @foreach($baseproduct2 as $product) 
                                 <option value="{{ $product->name }}" class="form-control">{{ $product->name }} <br> <span class="text-danger text-lg"> ( Price - {{ number_format($product->selling_cost) }})</span> <hr> </option>
                            @endforeach
                            @else
                                 <option class="form-control disabled text-lg" disabled>Product No </option>
                           @endif
                            </select>
                          </div>
                        @error('formProduct2')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                     <div class="col-md-6">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                            <label class="input-group text-lg" for="inputGroupSelect0122">{{ _('Quantity 2') }}
                             @if($product2NumberMax)
                             <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger text-lg">  Remained in {{ number_format($product2NumberMax) }}  !</span>
                            @endif
                            </label>
                            <input  type="number" wire:model.lazy="formNumbers2" name="" id="sellingCost" class="form-control text-lg">
                          </div>
                        @error('formNumbers2')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="d-flex justify-content-start text-danger text-lg">{{ number_format($totalPrice3) }}</div>
                    <div class="col-md-6">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                            <label class="input-group text-lg" for="inputGroupSelect1102">{{ _('Product  3') }} </label>
                            <select  wire:model.lazy="formProduct3" name="" id="" class="form-control">
                           @if($baseproduct3)
                             <option selected class="form-control">Which  Product  ?</option>
                              @foreach($baseproduct3 as $product) 
                                 <option value="{{ $product->name }}" class="form-control">{{ $product->name }} <br> <span class="text-danger text-lg"> ( Narxi - {{ number_format($product->selling_cost) }})</span> <hr> </option>
                            @endforeach
                             @else
                                 <option class="form-control disabled text-lg" disabled>No Product </option>
                           @endif
                            </select>
                          </div>
                        @error('formProduct3')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                            <label class="input-group text-lg" for="inputGroupSelect01222">{{ _('Quantity 3') }}
                             @if($product3NumberMax)
                             <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger text-lg"> Remained in storage {{ number_format($product3NumberMax) }}  !</span>
                            @endif
                            </label>
                            <input  type="number" wire:model.lazy="formNumbers3" name="" id="sellingCost" class="form-control">
                          </div>
                        @error('formNumbers3')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                    
                    {{-- begining form 4 product  --}}
                    <div class="d-flex justify-content-start text-danger text-lg">{{ number_format($totalPrice4) }}</div>
                    <div class="col-md-6">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                            <label class="input-group text-lg" for="inputGroupSelect102">{{ _('Product  4 '  ) }} </label>
                            <select wire:model.lazy="formProduct4" name="" id="" class="form-control">
                           @if($baseproduct4)
                             <option selected class="form-control">Which product ? ?</option>
                              @foreach($baseproduct4 as $product) 
                                 <option value="{{ $product->name }}" class="form-control">{{ $product->name }} <br> <span class="text-danger text-lg"> ( Narxi - {{ number_format($product->selling_cost) }})</span> <hr> </option>
                            @endforeach
                             @else
                                 <option class="form-control disabled" disabled>No product</option>
                           @endif
                            </select>
                          </div>
                        @error('formProduct4')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                     <div class="col-md-6">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                            <label class="input-group text-lg" for="inputGroupSelect0122q2">{{ _('Quantity 4') }}
                             @if($product4NumberMax)
                             <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger">  Remained in storage {{number_format( $product4NumberMax) }}  !</span>
                            @endif
                            </label>
                            <input  type="number" wire:model.lazy="formNumbers4" name="" id="sellingCost" class="form-control text-lg">
                          </div>
                        @error('formNumbers4')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                    {{-- ending form 4 input --}}

                    {{-- addational button  --}}
                    <div class="text-end py-3">
                      {{-- <p>
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                          Yana Product  +
                        </a>
                      </p> --}}
                      {{-- <div class="collapse" id="collapseExample"> --}}
                        <div class="card card-body">
                          {{-- begining collapse here --}}
                         <div class="row">
                          {{-- begining row --}}
                              <div class="d-flex justify-content-start text-danger text-lg">{{ number_format($totalPrice5) }}</div>
                              <div class="col-md-6">
                                  <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                                      <label class="input-group text-lg" for="inputGroupSelect102">{{ _('Product  5 '  ) }} </label>
                                      <select wire:model.lazy="formProduct5" name="" id="" class="form-control">
                                    @if($baseproduct5)
                                      <option selected class="form-control">Qa ?</option>
                                        @foreach($baseproduct5 as $product) 
                                          <option value="{{ $product->name }}" class="form-control">{{ $product->name }} <br> <span class="text-danger text-lg"> ( Narxi - {{ number_format($product->selling_cost) }})</span> <hr> </option>
                                      @endforeach
                                      @else
                                          <option class="form-control disabled" disabled>Product  no  </option>
                                    @endif
                                      </select>
                                    </div>
                                  @error('formProduct5')
                                      <span class="text-danger py-1">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="col-md-6">
                                  <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                                      <label class="input-group text-lg" for="inputGroupSelect0122q2">{{ _('Quantity 5') }}
                                      @if($product5NumberMax)
                                      <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger">  Left in storage {{number_format( $product5NumberMax) }}  !</span>
                                      @endif
                                      </label>
                                      <input  type="number" wire:model.lazy="formNumbers5" name="" id="sellingCost" class="form-control text-lg">
                                    </div>
                                  @error('formNumbers5')
                                      <span class="text-danger py-1">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="d-flex justify-content-start text-danger text-lg">{{ number_format($totalPrice6) }}</div>
                        <div class="col-md-6">
                            <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                                <label class="input-group text-lg" for="inputGroupSelect102">{{ _('Product  6 '  ) }} </label>
                                <select wire:model.lazy="formProduct6" name="" id="" class="form-control">
                              @if($baseproduct6)
                                <option selected class="form-control">Which  Product  ?</option>
                                  @foreach($baseproduct6 as $product) 
                                    <option value="{{ $product->name }}" class="form-control">{{ $product->name }} <br> <span class="text-danger text-lg"> ( Narxi - {{ number_format($product->selling_cost) }})</span> <hr> </option>
                                @endforeach
                                @else
                                    <option class="form-control disabled" disabled>Product  no  </option>
                              @endif
                                </select>
                              </div>
                            @error('formProduct6')
                                <span class="text-danger py-1">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                                <label class="input-group text-lg" for="inputGroupSelect0122q2">{{ _('Quantity 6') }}
                                @if($product6NumberMax)
                                <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger">  left in storage {{number_format( $product6NumberMax) }}  !</span>
                                @endif
                                </label>
                                <input  type="number" wire:model.lazy="formNumbers6" name="" id="sellingCost" class="form-control text-lg">
                              </div>
                            @error('formNumbers6')
                                <span class="text-danger py-1">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="d-flex justify-content-start text-danger text-lg">{{ number_format($totalPrice7) }}</div>
                        <div class="col-md-6">
                            <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                                <label class="input-group text-lg" for="inputGroupSelect102">{{ _('Product  7 '  ) }} </label>
                                <select wire:model.lazy="formProduct7" name="" id="" class="form-control">
                              @if($baseproduct7)
                                <option selected class="form-control">Which  Product  ?</option>
                                  @foreach($baseproduct7 as $product) 
                                    <option value="{{ $product->name }}" class="form-control">{{ $product->name }} <br> <span class="text-danger text-lg"> ( Narxi - {{ number_format($product->selling_cost) }})</span> <hr> </option>
                                @endforeach
                                @else
                                    <option class="form-control disabled" disabled>Product  no  </option>
                              @endif
                                </select>
                              </div>
                            @error('formProduct7')
                                <span class="text-danger py-1">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                                <label class="input-group text-lg" for="inputGroupSelect0122q2">{{ _('Quantity 7') }}
                                @if($product7NumberMax)
                                <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger">  left in storage {{number_format( $product7NumberMax) }}  !</span>
                                @endif
                                </label>
                                <input  type="number" wire:model.lazy="formNumbers7" name="" id="sellingCost" class="form-control text-lg">
                              </div>
                            @error('formNumbers7')
                                <span class="text-danger py-1">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="d-flex justify-content-start text-danger text-lg">{{ number_format($totalPrice7) }}</div>
                        <div class="col-md-6">
                            <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                                <label class="input-group text-lg" for="inputGroupSelect102">{{ _('Product  8 '  ) }} </label>
                                <select wire:model.lazy="formProduct8" name="" id="" class="form-control">
                              @if($baseproduct8)
                                <option selected class="form-control">Which  Product  ?</option>
                                  @foreach($baseproduct8 as $product) 
                                    <option value="{{ $product->name }}" class="form-control">{{ $product->name }} <br> <span class="text-danger text-lg"> ( Narxi - {{ number_format($product->selling_cost) }})</span> <hr> </option>
                                @endforeach
                                @else
                                    <option class="form-control disabled" disabled>Product  no  </option>
                              @endif
                                </select>
                              </div>
                            @error('formProduct8')
                                <span class="text-danger py-1">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                                <label class="input-group text-lg" for="inputGroupSelect0122q2">{{ _('Quantity 8') }}
                                @if($product8NumberMax)
                                <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger">  left in storage {{number_format( $product8NumberMax) }}  !</span>
                                @endif
                                </label>
                                <input  type="number" wire:model.lazy="formNumbers8" name="" id="sellingCost" class="form-control text-lg">
                              </div>
                            @error('formNumbers8')
                                <span class="text-danger py-1">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="d-flex justify-content-start text-danger text-lg">{{ number_format($totalPrice8) }}</div>
                        <div class="col-md-6">
                            <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                                <label class="input-group text-lg" for="inputGroupSelect102">{{ _('Product  9 '  ) }} </label>
                                <select wire:model.lazy="formProduct9" name="" id="" class="form-control">
                              @if($baseproduct9)
                                <option selected class="form-control">Which  Product  ?</option>
                                  @foreach($baseproduct9 as $product) 
                                    <option value="{{ $product->name }}" class="form-control">{{ $product->name }} <br> <span class="text-danger text-lg"> ( Narxi - {{ number_format($product->selling_cost) }})</span> <hr> </option>
                                @endforeach
                                @else
                                    <option class="form-control disabled" disabled>Product  no  </option>
                              @endif
                                </select>
                              </div>
                            @error('formProduct9')
                                <span class="text-danger py-1">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                                <label class="input-group text-lg" for="inputGroupSelect0122q2">{{ _('Quantity 9') }}
                                @if($product9NumberMax)
                                <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger">  left in storage {{number_format( $product9NumberMax) }}  !</span>
                                @endif
                                </label>
                                <input  type="number" wire:model.lazy="formNumbers9" name="" id="sellingCost" class="form-control text-lg">
                              </div>
                            @error('formNumbers9')
                                <span class="text-danger py-1">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="d-flex justify-content-start text-danger text-lg">{{ number_format($totalPrice9) }}</div>
                        <div class="col-md-6">
                            <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                                <label class="input-group text-lg" for="inputGroupSelect102">{{ _('Product  10 '  ) }} </label>
                                <select wire:model.lazy="formProduct10" name="" id="" class="form-control">
                              @if($baseproduct10)
                                <option selected class="form-control">Which  Product  ?</option>
                                  @foreach($baseproduct10 as $product) 
                                    <option value="{{ $product->name }}" class="form-control">{{ $product->name }} <br> <span class="text-danger text-lg"> ( Narxi - {{ number_format($product->selling_cost) }})</span> <hr> </option>
                                @endforeach
                                @else
                                    <option class="form-control disabled" disabled>Product  no  </option>
                              @endif
                                </select>
                              </div>
                            @error('formProduct10')
                                <span class="text-danger py-1">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                                <label class="input-group text-lg" for="inputGroupSelect0122q2">{{ _('Quantity 10') }}
                                @if($product10NumberMax)
                                <span style="position: absolute;z-index: 100; right: -1px;" class="text-danger">  left in storage {{number_format( $product10NumberMax) }}  !</span>
                                @endif
                                </label>
                                <input  type="number" wire:model.lazy="formNumbers10" name="" id="sellingCost" class="form-control text-lg">
                              </div>
                            @error('formNumbers10')
                                <span class="text-danger py-1">{{ $message }}</span>
                          @enderror
                        </div>
                          {{-- ending row below --}}
                         </div>
                          {{-- ending collapse here --}}
                        </div>
                      {{-- </div> --}}
                     </div>
                     {{-- end addatioan buuron --}}
                    <br><br>     
                     <div class="col-md-12">
                    <div class="input-group mb-3"><i class="fas fa-users fa-2x"></i>
                        <label class="input-group " for="inputGroupSelect05">{{ _('Usta (master) ismi ') }}</label>
                      @if($masters)
                         <select wire:model.lazy="formMaster" name="" id="" class="form-control text-lg">
                          <option selected class="form-control text-lg">Kimsiz ?</option>
                          @foreach($masters as $master)
                          <option value="{{ $master->id }}" class="form-control">{{ $master->name }}</option>
                          @endforeach
                        </select>
                      @endif
                      </div>
                    @error('formMaster')
                            <span class="text-danger py-1">{{ $message }}</span>
                    @enderror
                </div>
                   
                    <div class="col-md-12">
                        <div class="input-group mb-3"><i class="fas fa-cart-plus fa-2x"></i>
                            <label class="input-group" for="inputGroupSelect01">{{ _('Holati') }}</label>
                            <select required wire:model.lazy="formStatus" name="" id="" class="form-control">                
                             <option selected class="form-control text-lg">Status</option>
                             <option  value="Naxt" class="form-control text-lg">Paid</option>
                             <option value="Qarz" class="form-control text-lg">Not paid !</option>
                            </select>
                          </div>
                        @error('formStatus')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                    {{-- agar qarz bo'lsa majburiy --}}

                    @if($phoneShould)       
                    <div class="col-md-12">
                        <div class="input-group mb-3"> <i class="fas fa-phone"></i>
                            <label class="input-group text-lg" for="inputGroupSelect04">{{ _('Customer Phone Number') }}</label>
                            <input required type="number" wire:model.lazy="formClientPhone" name="formClientPhone" class="form-control text-lg">
                        </div>
                        @error('formClientPhone')
                            <span class="text-danger py-1">{{ $message }}</span>
                        @enderror
                    </div>
                     <div class="col-md-12">
                        <div class="input-group mb-3"><i class="fas fa-car"></i>
                            <label class="input-group text-lg" for="inputGroupSelect023">{{ _('Car Number') }}</label>
                            <input required type="text" wire:model.lazy="formClientCarNumber" name="sellingCost" id="sellingCost" class="form-control text-lg">
                        </div>
                        @error('formClientCarNumber')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                     <div class="col-md-12">
                        <div class="input-group mb-3"><i class="fas fa-user"></i>
                            <label class="input-group text-lg" for="inputGroupSelect04">{{ _('Customer name ') }} </label>
                            <input  type="text" wire:model.lazy="formClientName" name="numbers" id="numbers" class="form-control text-lg">
                        </div>
                        @error('formClientName')
                            <span class="text-danger py-1">{{ $message }}</span>
                        @enderror
                    </div>


                      @endif
                     <div class="col-md-12">
                        <div class="d-flex  justify-content-between">
                            <div class="text-success text-lg">
                              @if($allTotalPrice)
                              Total Value-  {{ number_format($allTotalPrice) }}
                              @endif
                            </div>
                            <div>
                              <button type="submit" class="btn btn-primary btn-lg btn-block"><h3>Added  </h3> </button>
                            </div>
                        </div>
                        <hr>
                    </div>
                  
                {{-- @endif --}}
            </div>{{-- ending row --}}
            </form>
            </div>
                @endcan
              @endauth
              
             {{-- @guest --}}
               
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 table-hover ">
                  <thead class="table-success text-dark">
                    <tr>
                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">T/R </th>
                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer name
                        <input type="text" wire:model="searchname" class="form-control" placeholder="Search..">
                    </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Customer <i class="fas fa-car"></i> raqami
                      <input type="text" wire:model="searchcarnumber" class="form-control" placeholder="Search..">
                      </th>
                    </th>
                       <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Bought Product </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          Who served  </th>
                         <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          Added to database   </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        The data</th>
                         <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Status</th>          
                    </tr>
                  </thead>
                  <tbody class="table-hover">
                     @if(count($services))
                   @foreach($services as $value)
                           <tr>
                             <td>
                               {{ $loop->index+ 1 }}
                             </td>
                        <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $value->clientName }}</h6>
                          
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $value->clientPhone }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $value->clientCarNumber }}</p>
                      </td>
                      <td class="align-middle  text-sm"> 
                       Price - {{ number_format(floatval($value->total1price) / floatval( $value->numproduct1)) }} , {{$value->product1  }}dan , <span > {{ $value->numproduct1 }} ta </span><span> , Overall = {{ $value->total1price }}</span> <br>
                       @if($value->total2price)
                       Price - {{ number_format(floatval($value->total2price) / floatval( $value->numproduct2)) }} , {{$value->product2  }}dan , <span > {{ $value->numproduct2 }} ta </span><span> , Overall = {{ $value->total2price }}</span> <br>
                       @endif
                       @if($value->numproduct3)

                         Price - {{ number_format(floatval($value->total3price) / floatval( $value->numproduct3)) }} , {{$value->product3  }}dan , <span > {{ $value->numproduct3 }} ta </span><span> , Overall = {{ $value->total3price }}</span> <br>
                       @endif
                       @if($value->numproduct4)
                       Price - {{ number_format(floatval($value->total4price) / floatval( $value->numproduct4)) }} , {{$value->product4  }}dan , <span > {{ $value->numproduct4 }} ta </span><span> , Overall = {{ $value->total4price }}</span> <br>
                       @endif
                       Total cost = {{ number_format(floatval( $value->total1price) +floatval( $value->total2price)+floatval( $value->total3price)+floatval( $value->total4price))}} <br>
                      </td>
                       <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $value->user->name }}</span>
                      </td>
                       <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $value->publishedBy }}</span>
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
                                Not paid
                        </span>
                         @endif    
                      </td> 
                      @auth
                        @can('super-admin')
                          @if($value->status == 'Qarz')
                              <td class="align-middle">
                                <a href="javascript:;" class="text-danger font-weight-bold text-xs" data-toggle="tooltip"
                                  data-original-title="Sms Yuborish">
                                {{-- <i class="fas fa-message"></i> --}}
                                <button class="btn btn-primary">SMS</button>
                                </a>
                              </td>

                              <td class="align-middle">
                              <form action="{{ route('client.update',['id'=>$value->id]) }}" method="POST">
                                  @csrf
                                  @method('put')
                                    <button type="submit" class="btn btn-primary" >Paid ?! </button>
                              </form>
                              </td>
                         @endif
                        @endcan
                      @endauth
                    </tr>
                   @endforeach
                    @else
                    <p class="text-center text-danger">There is no information yet</p>
                   @endif
                  </tbody>
                </table>
                
              </div>
              
             {{-- @endguest --}}
            </div>
          </div>
        </div>
      </div>
     
      
  </main>
