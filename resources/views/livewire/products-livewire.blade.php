<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">  
<div class="container-fluid py-4">
{{-- @if(count($products)) --}}
<div class="row">
  <div class="col-12">
    <div class="card mb-4">   
      <div class="card-body px-0 pt-0 pb-2">
        <div class="container">
          <div class="card-header pb-0 d-flex justify-content-between">
            
            <h3> <i class="fas fa-list fa-1"></i> Table of Products</h3> 
              </div>
               <div class="row">
                 <div class="col-md-12">
                    <div class="input-group mb-3">
                        <label class="input-group text-lg" for="inputGroupSelect02">{{ _('QR Kodi') }}</label>
                        <input required type="text"  wire:model.lazy="codeed" name="codeed" id="some" class="form-control">
                    </div>
                    @error('codeed')
                            <span class="text-danger py-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <div class="input-group mb-3">
                        <label class="input-group text-lg" for="inputGroupSelect01">{{ _('Name') }}</label>
                        <input required type="text"  wire:model.lazy="name" name="name" id="name" class="form-control">
                    </div>
                    @error('name')
                            <span class="text-danger py-1">{{ $message }}</span>
                    @enderror
                </div>
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <label class="input-group text-lg" for="inputGroupSelect03">{{ _('Number ') }}</label>
                            <input required type="numbers" wire:model.lazy="numbers" name="numbers" id="numbers" class="form-control">
                        </div>
                        @error('numbers')
                            <span class="text-danger py-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <label class="input-group text-lg" for="inputGroupSelect04">{{ _('comming cost') }}</label>
                            <input required type="number" wire:model.lazy="comingCost" name="comingCost" class="form-control">
                        </div>
                        @error('comingCost')
                            <span class="text-danger py-1">{{ $message }}</span>
                        @enderror
                    </div>
                     <div class="col-md-12">
                        <div class="input-group mb-3">
                            <label class="input-group text-lg" for="inputGroupSelect05">{{ _('Selling cost') }}</label>
                            <input required type="number" wire:model.lazy="sellingCost" name="sellingCost" id="sellingCost" class="form-control">
                        </div>
                        @error('selling_cost')
                            <span class="text-danger py-1">{{ $message }}</span>
                      @enderror
                    </div>
                {{-- @if () --}}
                 @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center justify-content-md-end">
                            <button wire:click="addProduct" type="submit" class="btn btn-primary ">Save</button>
                        </div>
                        <hr>
                    </div>
                {{-- @endif --}}
            </div>
            </div>
              @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
          @if(count($products))
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 table-hover">
                  <thead>
                    <tr>
                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> <i class="fas fa-trash"></i> </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Numbers</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">QR-code
                      </th>
                       <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Arrival Price</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          Selling price</th>
                         <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          Benefit</th>
                    </tr>
                  </thead>
                  <tbody class="table-hover">
                   @foreach($products as $value)
                           <tr>
                        <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button class="btn btn-danger" wire:click="removeProduct({{ $value->id }})"> <i class="fas fa-trash"></i> </button>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $value->name }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $value->numbers }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                     {{ $value->qr_code }}
                      </td>
                       <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $value->coming_cost }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $value->selling_cost }}</span>
                      </td>
                       <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{   intval( $value->selling_cost) -intval($value->coming_cost) }}</span>
                      </td>
    
                      <td class="align-middle">
                        <a href="javascript:;" class="text-danger font-weight-bold text-xs" data-toggle="tooltip"
                          data-original-title="Sms Yuborish">              
                        </a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
                {{-- <div class="d-flex justify-content-end text-success p-3">
                      {{ $products->links() }}
                  </div> --}}
              </div>
               @else
                  <p class="text-center text-danger">There are no products yet !</p>
              @endif
            </div>
          </div>
        </div>
      </div>
  </main>
