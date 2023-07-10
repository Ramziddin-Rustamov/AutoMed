 <div class="card-body px-0 pb-2">
   <div class="table-responsive">
      <table class="table align-items-center mb-0">
      <thead>
         <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name !
               <input type="text" wire:model="name" class="form-control">
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Served customers.
               {{-- <input type="text" wire:model="number" class="form-control"> --}}
                  </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">He worked
               {{-- <input type="text" wire:model="earn" class="form-control"> --}}

            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Came to work !
               <input type="date" wire:model="date" class="form-control">

            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  <i class="fas fa-trash"> </i> <br>
                  Delete
            </th>
         </tr>
      </thead>
      <tbody>
         @if($masters)
         @foreach($masters as $key)
         <tr>
            <td>
            <div class="d-flex px-2 py-1">
               <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-sm">{{ $key->name }}</h6>
               </div>
            </div>
            </td>
            <td>
               {{count($key->service)}}
            </td>
            <td class="align-middle text-center text-sm">
            <span class="text-xs font-weight-bold"> 
             @empty($key->price)
             <p>This is master hasn't do any service</p>
             @else 
             {{-- {{dd($key->price)}} --}}
             @endempty
             {{-- {{dd($key->price)}} --}}
            </span>
            </td>
            <td class="align-middle">
            <div class="progress-wrapper w-75 mx-auto">
               <div class="progress-info">
                  {{ $key->created_at }}
               </div>
            </div>
            </td>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
               <button class="btn btn-danger"  wire:click="removeMaster({{ $key->id }})"> <i class="fas fa-trash"></i></button> 
            </th>
         </tr>
         @endforeach
         @else
         <h4 class="text-center">We have no mechanics yet!</h4>
         @endif
      </tbody>
      </table>
   </div>
</div>
