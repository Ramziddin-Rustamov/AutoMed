<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"></head>
<body>
    <div class="card">
  <div class="card-header bg-black"></div>
  <div class="card-body">

    <div class="container">
      <div class="row">

        <div class="col-xl-12">

          <ul class="list-unstyled float-end">
            <li style="font-size: 30px; color: red;">Auto<span class="text-success">Med</span>  </li>
            <li>123, Elm Street</li>
            <li>mail@mail.com</li>
          </ul>
        </div>
      </div>

      <div class="row ">
        <div class="col-xl-6 pb-1">
            <h3 class="text-uppercase text-start mt-3" style="font-size: 40px;">To'lov</h3>
        <p> ID =  {{Str::random(10) }}</p>
        </div>
        <div class="col-xl-6">
            <ul class="list-unstyled float-end ">
            <li><i class="fas fa-user-tie"></i> <span class="me-3 float-start">Mijoz Ismi:</span> {{ $service->clientName }}
            </li>
            <li>  <span class="me-5">Xizmatchi:</span><i class="fas fa-users-cog"></i> {{ $service->user->name }}</li>
          </ul>
        </div>
      </div>

       <div class="row ">
        <table class="table  table-striped">
          <thead class="text-center">
            <tr>
              <th scope="col">Nomi</th>
              <th scope="col">Narxi</th>
              <th scope="col">Qancha </th>
              <th scope="col">Jami </th>

            </tr>
          </thead>
          <tbody class="text-center">
            <tr >
              <td>{{ $service->product1 }}</td>
              <td>{{ ($service->total1price) / $service->numproduct1 }} So'm</td>
              <td>{{ $service->numproduct1 }} </td>
              <td>{{ $service->total1price }} </td>
            </tr>
            @if($service->product2)
              <tr >
              <td>{{ $service->product2 }}</td>
              <td>{{ ($service->total2price) / $service->numproduct2 }} So'm</td>
              <td>{{ $service->numproduct2 }} </td>
              <td>{{ $service->total2price }} </td>
            </tr>
            @endif
             @if($service->product3)
              <tr >
              <td>{{ $service->product3 }}</td>
              <td>{{ ($service->total3price) / $service->numproduct3 }} So'm</td>
              <td>{{ $service->numproduct3 }} </td>
              <td>{{ $service->total3price }} </td>
            </tr>
            @endif
             @if($service->product4)
              <tr >
              <td>{{ $service->product4 }}</td>
              <td>{{ ($service->total4price) / $service->numproduct4 }} So'm</td>
              <td>{{ $service->numproduct4 }} </td>
              <td>{{ $service->total4price }} </td>
            </tr>
            @endif
          </tbody>
        </table>

      </div>
     
      <div class="row">
        <div class="col-xl-12">
          <ul class="list-unstyled float-end ">
            <li><span class="me-3 float-start">Umumiy So'mma:</span><span class="text-end">{{ $service->totalPrice }}</span>
            </li>
            <li> <span class="me-5">Chegirma :</span> <span class="text-end">0</span></li>
            <li> <span class="me-5">Holati : </span><span class="text-danger">{{ $service->status }}</span></li>
            @if($service->status == 'Qarz')
               <li> <span class="me-5"><i class="fas fa-car"></i> Raqami :</span> {{ $service->clientCarNumber }}</li>
               <li> <span class="me-5"><i class="fas fa-phone"></i> Raqami :</span> {{ $service->clientPhone }}</li>
            @endif
          </ul>
        </div>
      </div>
        
      <div class="row">
        <div class="col-xl-12 mr-auto ">
          <p class="float-end "
            style="font-size: 30px; color: red; font-weight: 400;font-family: Arial, Helvetica, sans-serif;">
                  Umumiy So'mma:
            <span><i class="fas fa-dollar-sign"></i> {{ $service->totalPrice }}</span></p>
        </div>
      </div>
      <hr>

        <div class="row">
          <div class="col-xl-6">
          <i class="fas fa-stamp text-danger fa-2x float-start"></i>
        </div>
        <div class="col-xl-6">
            <p class=" float-end h5">{{ $service->created_at }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>