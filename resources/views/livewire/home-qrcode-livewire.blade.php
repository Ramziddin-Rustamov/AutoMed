<div>
<div class="row">
<div class="col-12">
<div class="card mb-4"> 
    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <h4 class="text-center">Products sold via QRcode </h4>
           <table class="table align-items-center mb-0">
           <thead>
              <tr>
                 <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 h5">OLingan mahsulotlar !
                    {{-- <input type="text" wire:model="number" class="form-control"> --}}
                       </th>
                 <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Umumiy so'mma
                    {{-- <input type="text" wire:model="earn" class="form-control"> --}}
                 </th>
                 <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Xizmat ko'rsatdi !
                     
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vaqti !
                     <input type="text" wire:model="date" class="form-control">    
                 </th>
              </tr>
           </thead>
           <tbody>
            @if(count($qrcodeProducts))
            @foreach($qrcodeProducts as $value)
               <tr>
                    <th>
                     @foreach(json_decode($value->products) as $productsName)
                      {{$productsName}},
                      @endforeach
                    </th>
                    <th class="text-center">
                        {{$value->overalCost}}
                   </th>
                   <th class="text-center">
                        {{$value->user->name}}
                   </th>
                    <th class="text-center">
                        {{$value->created_at}}
                    </th>
                </tr>
                @endforeach
              @endif
           </tbody>
           </table>
        </div>
     </div>    
    </div>
</div>    
</div>
</div>
