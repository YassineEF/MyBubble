@extends('layouts.main')
@section('content')
    <div class="main-home--form main-home--form-register">
        <h1>{{ __('Register') }}</h1>
        <div >
            <form class="container-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <div class="container-form--field">
                        <label for="firstname" class="form-label">{{ __('Firstname') }}</label>
                        <div>
                            <input id="firstname" type="text"
                                class="container-form--field--input @error('firstname') is-invalid @enderror" name="firstname"
                                value="{{ old('firstname') }}" required autocomplete="firstname" autofocus placeholder="{{ __('Firstname') }}">
                            @error('firstname')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="container-form--field">
                        <label for="lastname" class="form-label">{{ __('Lastname') }}</label>
                        <div>
                            <input id="lastname" type="text"
                                class="container-form--field--input @error('lastname') is-invalid @enderror" name="lastname"
                                value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="{{ __('Lastname') }}">

                            @error('lastname')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="container-form--field">
                        <label for="adress" class="form-label">{{ __('Adress') }}</label>

                        <div>
                            <input id="adress" type="text"
                                class="container-form--field--input @error('adress') is-invalid @enderror" name="adress"
                                value="{{ old('adress') }}" required autocomplete="adress" autofocus placeholder="{{ __('Adress') }}">

                            @error('adress')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="container-form--field">
                        <label for="mobile" class="form-label">{{ __('Mobile') }}</label>

                        <div>
                            <input id="mobile" type="text"
                                class="container-form--field--input @error('mobile') is-invalid @enderror" name="mobile"
                                value="{{ old('mobile') }}" required autocomplete="mobile" autofocus placeholder="{{ __('Mobile') }}">

                            @error('mobile')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div>
                    <div class="container-form--field">
                        <label for="email"
                            class="form-label">{{ __('Email Address') }}</label>

                        <div>
                            <input id="email" type="email"
                                class="container-form--field--input @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email Address') }}">

                            @error('email')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="container-form--field">
                        <label for="password"
                            class="form-label">{{ __('Password') }}</label>

                        <div>
                            <input id="password" type="password"
                                class="container-form--field--input @error('password') is-invalid @enderror" name="password"
                                required autocomplete="new-password" placeholder="{{ __('Password') }}">

                            @error('password')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="container-form--field">
                        <label for="password-confirm"
                            class="form-label">{{ __('Confirm Password') }}</label>

                        <div>
                            <input id="password-confirm" type="password" class="container-form--field--input"
                                name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                        </div>
                    </div>
                    <div>
                        <div class="btn-register">
                            <button type="submit" class="btn btn-secondary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
