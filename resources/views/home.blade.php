@extends('layouts.main')
@section('content')
<div class="main-home--img-absolute">
  <img src="{{ asset('images/sakura_home.png') }}" alt="sakura home">
</div>
<div class="main-home">
  <div>
    <img src="{{ asset('images/bubble_home_sakura.png') }}" alt="">
  </div>
  <article class="main-home-article">
    <div>
      <h2>The sakura season is here</h2>
      <p>get a hint of our new flavours</p>
      <button class="btn btn-primary"><a href="{{route('showPremade')}}">Discover</a></button>
    </div>
  </article>
</div>
@endsection
