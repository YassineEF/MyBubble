@extends('layouts.main')

@section('content')

<section class="main-home premade-container">
    <h1 id="premade-title">PREMADE COLLECTION </h1>
    <div class="premade-container--article">
        
        @foreach ($premade as $drink)
            <article class="drink-article">
                <figure>
                    <img src="{{url('images/premade_drinks', ['path' => $drink->image])}}" alt="">
                </figure>
                <h4>{{$drink->name}} :  {{$drink->price}}$</h4>
            </article>
        @endforeach
    </div>
</section>
@endsection
