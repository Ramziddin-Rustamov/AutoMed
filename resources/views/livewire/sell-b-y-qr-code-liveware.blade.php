<div>
   <div class="container">
    @if (session('success'))
    <div class="alert alert-success my-3" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger my-3" role="alert">
            {{ session('error') }}
        </div>
        @endif
     <div class="row">
        <div class="col-md-12">
            <div class="input-group my-3">
                <label class="input-group input-lg  text-lg" for="inputGroupSelect02">{{ _('QR Kodi') }}</label>
                <textarea autofocus required    wire:model.debounce.500ms="qrcode" name="qrcode" id="some" class="form-control-lg form-control text-lg text-success" rows="3" cols="80"></textarea>
            </div>
            @error('qrcode')
                    <span class="text-danger py-1">{{ $message }}</span>
            @enderror
        </div>

        @if(count($fullInterfaceProduct))
        <div class="col-12 text-end">
            <button type="button" class="btn btn-success text-lg position-relative z-index-100" aria-label="Close" wire:click="sellProduct()">Sotish</button>
         </div>
         @endif
        {{-- {{$overalPrice}} --}}
        <div class="row">
          @if(count($fullInterfaceProduct))
            @foreach($fullInterfaceProduct as $foreachindex => $value)
             @if(count($value))
             @foreach($value as $val)
             <div class="col-md-2 my-2 col-sm-4 col-xs-12 col-xl-2">
                <div class="card" style="width: 9rem;">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item text-success">{{ strtoupper($val['name']) }}</li>
                      <li class="list-group-item text-success">{{ number_format($val['selling_cost'])}} </li>
                      <li class="list-group-item">
                        @if($val['name'])
                        <button type="button" class="btn btn-danger" aria-label="Close" wire:click="backProduct({{ $foreachindex }})"><i class="fas fa-undo"></i> Qaytarish</button>
                        @endif
                      </li>
                    </ul>
                  </div>
              </div>
             @endforeach
             @endif
            @endforeach 
          @endif
     </div>
   </div>
</div>
