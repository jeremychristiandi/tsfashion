@extends('main')

@section('container')
    <style>
        .content {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .content__main {
            width: 75%;
            /* height: 40rem; */
            overflow: hidden;
            margin: auto;
            border-radius: 6px;
        }

        .content__main-img {
            background-size: cover;
            width: 100%;
        }
    </style>

    <div class="content">
        <div class="content__main my-5">
            <img src="https://images.unsplash.com/photo-1562740672-22db5c969f04?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="" class="content__main-img">
        </div>
        <hr>
        <div class="content__trending my-3">
            <h2>Trending 🔥</h2>
                <div class="row">
                    @foreach ($products as $p)
                    <div class="col-md-4 my-3">
                        <div class="card" style="width: 18rem; margin: auto;">
                            <img src="https://source.unsplash.com/500x400?{{ $p->category }}" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title" style="text-transform: capitalize;">{{ $p->name }}</h5>
                              <p class="card-text">{{ $p->description }}</p>
                              <a href="#" class="btn btn-primary">To product &#x279C;</a>
                            </div>
                          </div>
                    </div>
                      @endforeach
                </div>
        </div>
    </div>
@endsection