@extends("main")

@section("container")

@if(session()->has("success"))
<div class="alert alert-success col-md-4" role="alert">
    {{ session('success') }}
</div>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carts</title>
</head>
<body>
    @if ($carts->isEmpty())
        <div class="container text-center" style="margin-top: 18%;">
            <h3>Your Cart is Empty!</h3>
            <a href="/products" class="btn btn-info">Buy Products</a>
        </div>
    @else
    <div class="container mt-3">
        <div class="row mb-3 text-center text-secondary">
            <h2>My Cart</h2>
        </div>
        <div class="row text-center">
            <hr style="width: 100%; margin: 0 auto;">
        </div>

        <div class="row">
            @foreach ($carts as $cart)
            <div class="col-md-4 my-3">
                <div class="card text-center" style="width: 18rem; height: 100%; margin: auto;">
                    <img src="https://source.unsplash.com/500x400?{{ $cart->product->name }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $cart->product->name }}</h5>
                      <p class="card-text">{{ $cart->product->price }}</p>
                      <form action="/cart/{{ $cart->id }}" method="post">
                        @method("put")
                        @csrf
                        Quantity  <input type="number" name="quantity" value="{{ $cart->quantity }}" min="0" style="width: 3rem;"></input>
                        <input type="hidden" name="price" value="{{ $cart->product->price }}">
                      </form>
                    </div>
    
                    <div class="card-body">
                        <form action="/cart/{{ $cart->id }}" method="post">
                            @method("delete")
                            @csrf
                            <button class="btn btn-danger">Remove from Cart</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      </div>
      <form action="/cart/checkout" method="post">
        @csrf
        <div class="text-center mt-3">
            <input type="hidden" name="product_id" value="{{ $cart->product->id }}">
            <input type="hidden" name="quantity" value="{{ $cart->quantity }}">
            <button type="submit" class="btn btn-primary">Checkout</button>
        </div>
      </form>
    </div>
    @endif
</body>
</html>

@endsection