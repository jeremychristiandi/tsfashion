@extends('main')

@section('container')

@if (session()->has("success"))
    <div class="alert alert-success my-2" role="alert">
      {{ session("success") }}
    </div>
@endif

@if (session()->has("cartFailed"))
    <div class="alert alert-danger my-2" role="alert">
      {{ session("cartFailed") }}
    </div>
@endif

<div class="content">
  @if (optional(Auth::user())->is_admin)
        <div class="row text-center my-5">
          <h2>Add New Product</h2>
          <a href="/products/create" class="btn btn-primary" style="width: 8rem; margin: auto">Add Product</a>
        </div>
  @else
    <h2>Best out of the best ✨</h2>
  @endif
  <div class="row text-center">
      @foreach ($products as $p)
      <div class="col-md-4 my-3">
          <div class="card" style="width: 18rem; height: 100%; margin: auto;">
              <img src="https://source.unsplash.com/500x400?{{ $p->category }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" style="text-transform: capitalize;">{{ $p->name }}</h5>
                <p class="card-text">{{ $p->description }}</p>
                @if (optional(Auth::user())->is_admin)
                  <div class="d-flex justify-content-center" style="flex-direction: row; gap: 1rem;">
                      <a href="/products/{{ $p->id }}/edit" class="btn btn-success">Edit</a>
                      <form action="/products/{{ $p->id }}" method="post">
                        @method("delete")
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Delete item?')">Delete</button>
                      </form>
                  </div>
                @else
                  <a href="/products/{{ $p->id }}" class="btn btn-primary mb-2">To product &#x279C;</a>
                  <form action="/cart" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $p->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button class="btn btn-info text-white">Add to Cart &#x2738;</button>
                  </form>
                @endif
              </div>
            </div>
      </div>
      @endforeach
  </div>
</div>

<div class="d-flex justify-content-center mt-3">
  {{ $products->links() }}
</div>

@endsection