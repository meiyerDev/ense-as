@extends('layouts.templates')

@section('style')
<style>
    
</style>
@endsection

@section('content')
<div class="containe">
    <div class="row justify-content-center">
        <div class="col-sm-12 links">
            <a href="{{ url('/') }}" class="return mt-1">Atras</a>
        </div>
        <div class="col-sm-12 col-md-4 mt-md-4">
            <div class="card bg-light mt-sm-0 mt-xl-5 shadow">
                {{-- <div class="card-header">{{ __('Iniciar Sesión') }}</div> --}}

                <div class="card-body">
                    <div class="h4 text-center mb-3 text-muted text-uppercase">Iniciar Sesión</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label> --}}

                            <div class="col-sm-12 col-md-11 col-xl-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Ingrese su Correo Electrónico">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-sm-12 col-md-11 col-xl-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Ingrese su Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-sm-11 col-xl-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-0">
                            <div class="col-md-10 col-xl-8 row justify-content-center">
                                <button type="submit" class="btn btn-outline-primary col-md-12">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
