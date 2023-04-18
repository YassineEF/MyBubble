@extends('layouts.main')
@section('content')
    <div class="main-home column no-wrap main-home--store">
        <div class="main-home--store-absolute main-home--store-absolute--right"><img
                src="{{ asset('images/tea_inside.png') }}" alt=""></div>
        <h1>Cart <span><img src="{{ asset('images/bubbleTea_panda.png') }}" alt="bubble panda"></span></h1>
        @if (isset($orders))
            <section id="command">
                <?php $i = 0; ?>
                @foreach ($orders as $item)
                    <article>
                        <div>
                            <figure>
                                <img class="store--img" src="{{ url('images/tea', ['path' => $item['productImage']]) }}"
                                    alt="">
                            </figure>
                            <h4>{{ $item['product'] }}</h4>
                        </div>
                        <div>
                            @while ($i < sizeOf($item['popping']))
                                <div class="container--popping">
                                    <figure>
                                        <img class="store--img"
                                            src="{{ url('images/popping', ['path' => $item['poppingImage'][$i]]) }}"
                                            alt="">
                                    </figure>
                                    <p>{{ $item['popping'][$i] }}</p>
                                </div>
                                <?php $i++; ?>
                            @endwhile
                        </div>
                        <div>
                            <p>Size : <span>{{ $item['size'] }}</span></p>
                        </div>
                        <div class="img-desc--container">
                            <img class="img-desc" src="{{ asset('images/sugar.png') }}" alt="sugar">
                            <p>Sugar level : <span>{{ $item['sugar'] }}</span></p>
                        </div>
                        <div>
                            <p>Quantity : <span>{{ $item['quantity'] }}</span></p>
                        </div>
                    </article>
                    <hr>
                @endforeach
            </section>
            <form id="order-form" action="{{ route('storage') }}" method="POST" style="display: none;">@csrf
                <input type="hidden" id="storageOrder" name="storage" />
            </form>
            <button id="btn-store--command" class="btn btn-secondary" type="submit">Command</button>
        @endif
        @if (!isset($orders))
            <button class="btn btn-secondary">
                <a href="{{ route('choose_own') }}">Create own</a>
            </button class="btn btn-secondary">
        @endif
        <a href=""></a>
        <div class="main-home--store-absolute main-home--store-absolute--left">
            <img src="{{ asset('images/tea_inside.png') }}" alt="">
        </div>
    </div>
@endsection
