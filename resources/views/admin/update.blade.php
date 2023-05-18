@extends('main')

@section('container')
    <div class="row" style="width: 75%; margin: auto;">
        <h2 class="text-center">Edit Product</h2>
        <form action="/products/{{ $product->id }}" method="post" enctype="multipart/form-data">
            @method("put")
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control @error('name')
                is-invalid
                @enderror" value="{{ old("name", $product->name) }}" id="name" placeholder="Product name" name="name">

                @error("name")
                <div class="invalid text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error('price')
                is-invalid 
                @enderror" value="{{ @old("price", $product->price) }}" id="price" placeholder="Price" name="price" required>

                @error('price')
                    <div class="invalid text-danger">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="category">Options</label>
                <select class="form-select" name="category" id="category">
                  <option selected>Choose category</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Input image</label>
                <input class="form-control" type="file" id="image" name="image">
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error("description") is-invalid @enderror" value="{{ @old("description", $product->description) }}" id="description" name="description" rows="3" required></textarea>
                @error('description')
                    <div class="invalid text-danger">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="text-center">
                <button class="btn btn-primary" type="submit">Edit Product</button>
              </div>
        </form>
    </div>
@endsection