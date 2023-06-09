<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-ct.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> --}}
    {{-- <link rel="stylesheet" href="{{asset('icon/f/css/v5-font-face.min.css')}}"> --}}
    @livewireStyles
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
    {{-- <link href="{{ asset('icon/boxicons.min.css') }}" rel="stylesheet"> --}}
</head>
<body style="background-image: url(asset(''))">
         <main class="py-4  mt-5">
            @yield('content')
        </main>
    </div>
    @livewireScripts

</body>

</html>