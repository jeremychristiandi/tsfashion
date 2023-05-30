@extends('main')

@section('container')

<style>
    .card-img-top {
        height: 60vh;
        object-fit: cover;
    }
</style>

<div class="card my-4" style="width: 50%; margin: auto;">
    <img src="https://source.unsplash.com/500x400?{{ $product->category }}" class="card-img-top" alt="..." >
    <div class="card-body text-center">
      <h5 class="card-title" style="text-transform: capitalize;">{{ $product->name }}</h5>
      <p class="card-text">Rp{{ $product->price }}</p>
      <p class="card-text">{{ $product->description }}</p>
    </div>
  </div>
@endsection