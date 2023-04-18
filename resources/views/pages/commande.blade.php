@extends('layouts.main')
@section('content')
    <div class="container-img--absolute">
        <img src="{{ asset('images/sakura-own.png') }}" alt="">
    </div>
    <form action="{{ route('orderOne') }}" method="POST" class="container-form-product" id="formCommande">
        @csrf
        <section class="container-form-product--pres">
            <div class="container-form-product--img">
                <img src="{{ asset('images/bubbleteadrawing.png') }}" alt="test">
            </div>
            <div class="container-form-product--add">
                <div class="img-desc--container">
                    <div class="img-desc--container-title">
                        <img class="img-desc" src="{{ asset('images/sugar.png') }}" alt="sugar">
                        <p>Sugar level</p>
                    </div>
                    <div class="container-btn--choose">
                        <button type="button" id="sugar-down" onclick="downValue(document.getElementById('sugar'))"><i
                                class="fa-solid fa-minus"></i></button>
                        <input type="number" id="sugar" name="sugar" placeholder="0" min="0" max="5">
                        <button type="button" id="sugar-add" onclick="upValue(document.getElementById('sugar'))"><i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
                <div class="container-form-product--add">
                    <p>Quantity</p>

                    <div class="container-btn--choose">
                        <button type="button" id="quantity-down"
                            onclick="downValue(document.getElementById('quantity'))"><i
                                class="fa-solid fa-minus"></i></button>
                        <input type="number" id="quantity" name="quantity" placeholder="0" min="1" max="50">
                        <button type="button" id="quantity-add" onclick="upValue(document.getElementById('quantity'))"><i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <button class="btn btn-secondary" type="submit">Submit</button>
        </section>
        <div class="container-form-product--choose">
            <section class="container-form-product--product">
                <div class="absolute-container absolute-container--tea">
                    <p>Pick a Tea</p>
                </div>
                @foreach ($products as $product)
                    <article class="container-form-product--input">
                        <input type="radio" id="{{ $product->id_product }}product" name="product"
                            value="{{ $product->id_product }}">
                        <label for="{{ $product->id_product }}product"><img class="form-order--img"
                                src="{{ url('images/tea', ['path' => $product->image]) }}"
                                alt="">{{ $product->name }}</label><br>
                    </article>
                @endforeach
            </section>
            <section class="container-form-product--product">
                <div class="absolute-container absolute-container--popping">
                    <p>Choose up to<br> 3 poppings</p>
                </div>
                @foreach ($poppings as $popping)
                    <article class="container-form-product--input">
                        <input type="checkbox" name="{{ $popping->name }}" id="{{ $popping->id_popping }}popping"
                            {{ old($popping->name) ? 'checked' : '' }} value="{{ $popping->id_popping }}">

                        <label class="form-check--label" for="{{ $popping->id_popping }}popping">
                            <img class="form-order--img" src="{{ url('images/popping', ['path' => $popping->image]) }}"
                                alt="">
                            {{ $popping->name }}
                        </label>
                    </article>
                @endforeach
            </section>
            <section class="container-form-product--product">

                <div class="absolute-container absolute-container--popping">
                    <p>Pick a size</p>
                </div>
                @foreach ($sizes as $size)
                    <article class="container-form-product--input">
                        <input type="radio" id="{{ $size->id_size }}" name="size" value="{{ $size->id_size }}">
                        <label for="{{ $size->id_size }}">{{ $size->name }}</label><br>
                    </article>
                @endforeach
            </section>
        </div>
    </form>
    <script>
        // increase and decrease value btn 
        const upValue = (input) => {
            if (input.id == "sugar" && input.value === "5") input.value = 5;
            else input.value = Number(input.value) + 1;
        };
        const downValue = (input) => {
            input.value = Number(input.value) > 0 ? Number(input.value) - 1 : 0;
        }

        // Set to localStorage
        const formCommande = document.getElementById('formCommande');
        checkBoxes = document.querySelectorAll('input[type="checkbox"]');
        let popping = []
        formCommande.addEventListener('submit', function(e) {
            let newData = [];
            // e.preventDefault();

            popping = [];
            checkBoxes.forEach(item => {
                if (item.checked) {
                    popping.push(item.value);
                }
            })
            let product = document.querySelector('input[name="product"]:checked').value;
            console.log(product);
            let sugar = document.getElementById('sugar').value;
            let quantity = document.getElementById('quantity').value;
            let size = document.querySelector('input[name="size"]:checked').value;
            let commande = {
                product: product,
                popping: popping,
                sugar: sugar,
                quantity: quantity,
                size: size
            };

            if (localStorage.getItem('order')) {
                newData = JSON.parse(localStorage.getItem('order'));
                console.log(newData);
                newData.push(commande);
            } else {
                newData = [commande];
            }

            localStorage.setItem("order", JSON.stringify(newData));
        })
    </script>
@endsection
