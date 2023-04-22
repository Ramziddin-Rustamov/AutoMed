<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-ct.png') }}" type="image/x-icon">
  <title>
   @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link href="{{ asset('assets/css/font.css') }}" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  {{-- sweat alert
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'> --}}
  <!-- Font Awesome Icons -->
  <script src="{{ asset('assets/css/fontawesome.js') }}" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.5') }}" rel="stylesheet" />
</head>
<body class="g-sidenav-show  bg-gray-100">
   <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm z-index-100">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"> <span
                class="text-success font-weight-bold"><h3> Auto<span class="text-danger">Med</span> <i style="--fa-animation-duration: 0.5s;" class="fas fa-car fa-2x fa-beat"></i></h3></span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto pb-4 pt-0 index-2 ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                           
                        @else
                          @can('super-admin')
                               <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><h4>Register</h4></a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}"><h4>Boshqarish <i class="fas fa-crash"></i></h4> </a>
                                </li>
                          @endcan
                           @can('seller')

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('seller.qrcode') }}"><h4>{{ __('QR orqali sotish !') }}</h4></a>
                                </li>

                               <li class="nav-item">
                                    <a class="nav-link" href="{{ route('seller.index') }}"><h4>{{ __('Sotish !') }}</h4></a>
                                </li>

                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ route('product.index') }}"><h4>{{ __('Maxsulotlar') }} <i class="fas fa-plus"></i> </h4></a>
                                </li>

                          @endcan
                           @can('master')
                               <li class="nav-item ">
                                    <a class="nav-link {{ (Request::is('service') ? 'active underline' : '') }}" href="{{ route('service.index') }}"><h4>Mexaniklar</h4></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('master.qrcode') }}"><h4>{{ __('QR orqali sotish !') }}</h4></a>
                                </li>
                          @endcan
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div style="position: absolute; z-index:1000; top:-10px" class="dropdown-menu dropdown-menu-end position-absolute " aria-labelledby="#navbarDropdown">
                                    <a  class="dropdown-item " href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Chiqish ') }} <i class="svg-inline--fa fa-person-to-portal fa-xl"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      @yield('content')
 <!--   Core JS Files   -->
   @livewireScripts

  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.5') }}"></script>
    @include('sweetalert::alert')
</body>
</html>