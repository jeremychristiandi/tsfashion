@extends('main')

@section('container')
<div class="content">
    <div class="content__trending my-3 text-center">
        <h2>Top Categories 🔝</h2>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-md-4 my-3">
                    <div class="card" style="width: 18rem; margin: auto;">
                        <img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title" style="text-transform: capitalize;">{{ $category->name }}</h5>
                          <a href="/categories/{{ $category->id }}" class="btn btn-primary">See products &#x279C;</a>
                        </div>
                      </div>
                </div>
                  @endforeach
            </div>
    </div>
</div>

{{-- <div class="d-flex justify-content-center mt-3">
  {{ $categories->links() }}
</div> --}}

@endsection