@extends('auth-layouts.app')
@section('title', 'Tizimga kirish')
@section('content')
<div class="container">
    <div class="row justify-content-center align-item-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header d-flex justify-content-center"> <i class="fas fa-sign-in"></i>{{ __('Tizimga Kirish') }}</h4>

                <div class="card-body text-lg">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 py-5">
                            <label for="email" class="col-md-4 col-form-label text-md-end "><h3>{{ __('Email') }}</h3></label>

                            <div class="col-md-6 ">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"><h3>{{ __('Parol') }}</h3></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" value="1" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Eslab qolish !') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-4 ">                       
                                <button type="submit" class="btn btn-primary  text-lg btn-block">
                                  {{ __('Kirish') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
