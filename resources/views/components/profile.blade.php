@extends('main')

@section('container')

<style>
    .card-img-top {
        height: 60vh;
        object-fit: cover;
    }
</style>

<div class="card my-4" style="width: 50%; margin: auto;">
    <img src="https://source.unsplash.com/500x400?person" class="card-img-top" alt="..." >
    <div class="card-body text-center">
      <h5 class="card-title" style="text-transform: capitalize;">{{ $user->name }}</h5>
      <p class="card-text">{{ $user->username }}</p>
      <p class="card-text">{{ $user->email }}</p>
    </div>
  </div>
@endsection