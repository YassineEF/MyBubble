@extends('layouts.main')
@section('content')
    <div class="main-home--form">
        <div class="container-form">
            <h1>{{ __('Login') }}</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <div>
                        <input id="email" type="email"
                            class="container-form--field--input @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                        @error('email')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="container-form--field">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <div>
                        <input id="password" type="password"
                            class="container-form--field--input @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="container-form--field">
                    <div>
                        <input class="form-check--input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check--label" for="remember">
                            {{ __('Remember Me?') }}
                        </label>
                    </div>
                </div>
                <div>
                    <div class="container-login--btn">
                        <button type="submit" class="btn btn-secondary">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-primary forget-password" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
