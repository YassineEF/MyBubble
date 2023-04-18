@extends('layouts.main')
@section('content')
    <section class="main-home container-profile column">
        <div class="container-profile container-profile--info">
            <div>
                <figure class="container-profile--img"><img src="{{ asset('images/bear_profile.png') }}" alt="img profile">
                </figure>
            </div>
            <div>
                <p>{{ $info[0]->firstname }} {{ $info[0]->lastname }}</p>
                <p><span>Email :</span> {{ $info[0]->email }}</p>
                <p><span>Mobile :</span> {{ $info[0]->mobile }}</p>
                <p><span>Adress :</span> {{ $info[0]->adress }}</p>
            </div>
            @if (\Auth::user()->admin == '1')
                <button type="button" class="btn btn-secondary">
                    <a href="{{ route('create_product') }}">{{ __('Create product') }}</a>
                </button>
            @endif
        </div>
        <div id="command">
            <h3>Commands</h3>
            <hr>
            @foreach ($orders as $item)
                <article class="container-profile--article">
                    <?php $i = 0; ?>
                    <p>id order : {{ $item['idOrderProduct'] }}</p>
                    <div>
                        <img class="store--img" src="{{ url('images/tea', ['path' => $item['productImage']]) }}"
                            alt="">
                        <p>{{ $item['product'] }}</p>
                    </div>
                    <div>
                        @while ($i < sizeOf($item['popping']))
                            <div class="container--popping">
                                <figure>
                                    <img class="store--img"
                                        src="{{ url('images/popping', ['path' => $item['popping'][$i]->image]) }}"
                                        alt="">
                                </figure>
                                <p>{{ $item['popping'][$i]->name }}</p>
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
                    <div>
                        <p>Date : {{ date('d-m-Y', strtotime($item['date'])) }}</p>
                    </div>
                </article>
                <hr>
            @endforeach
        </div>
    </section>
@endsection
