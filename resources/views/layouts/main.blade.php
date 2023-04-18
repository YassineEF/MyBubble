<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="icon" href="{{ asset('images/bear_header.png') }}" />
    <!-- initialize font awesome -->
    <script src="https://kit.fontawesome.com/d3e3419a02.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>My Bubble</title>
</head>

<body>
    <header>
        <div class="container-logo">
            <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="">
            </a>
            <div id="header-menu--btn"><a href="{{ route('showPremade') }}">Menu</a></div>
        </div>
        @if (Route::has('login'))
            <div id="header-menu--btn-choose"><a href="{{ route('choose_own') }}">Create Own</a></div>
            <nav class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                <div>
                    <img id="bear--header" src="{{ asset('images/bear_header.png') }}" alt="bear">
                </div>
                <ul>
                    @auth
                        <li><a href="{{ route('account') }}" class="">Account</a></li>
                        <li class="log-bg"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                        </form>
                        <li><a href="{{ route('cart') }}" id="cart"><i
                                    class="fa-solid
                                fa-basket-shopping"></i></a>
                            <form id="cart-form" action="{{ url('cart') }}" method="POST" style="display: none;">@csrf
                                <input type="hidden" id="storage" name="storage" />
                            </form>

                        </li>
                    @else
                        <li class="log-bg"><a href="{{ route('login') }}" class="">Login</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="">Register</a></li>
                        @endif
                    @endauth
                </ul>
            </nav>
        @endif
    </header>
    <main>
        @if (Session::has('message'))
            <x-modal :message="Session::get('message')" />
        @endif
        @yield('content')
    </main>
</body>

</html>
