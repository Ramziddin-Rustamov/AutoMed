<div class="card-body px-0 pb-2">
    <div class="table-responsive">
       <table class="table align-items-center mb-0">
       <thead>
          <tr>
             <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                <input type="text" wire:model="name" class="form-control">
             </th>
             <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Xizmat ko'rsatgan mijozlar.
                {{-- <input type="text" wire:model="number" class="form-control"> --}}
                   </th>
             <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ishladi
                {{-- <input type="text" wire:model="earn" class="form-control"> --}}
             </th>
             <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ishga keldi !
                <input type="date" wire:model="date" class="form-control">
 
             </th>
             <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                   <i class="fas fa-trash"> </i> <br>
                   O'chirish
             </th>
          </tr>
       </thead>
       <tbody>
          <tr>
                <td>
                <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">{{ $key->name }}</h6>
                    </div>
                </div>
                </td>
          </tr>
          {{-- <h4 class="text-center">Hozircha mexaniklarimiz yo'q !</h4> --}}
          {{-- @endif --}}
       </tbody>
       </table>
    </div>
 </div>
 