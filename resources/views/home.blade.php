@extends('main')

@section('container')
    <style>
        .content {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .banner-text {
          position: absolute; 
          z-index: 10;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          color: #ffffff;
          text-shadow: 2px 2px 3px #3a3a3a;
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
        <div id="carouselExampleIndicators" class="carousel slide" style="position: relative;">
            <div class="banner-text" style="">
                <h1>Welcome to TS Fashions</h1>
            </div>
            <div class="carousel-indicators" style="transform: translateY(-100%);">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
        
            <div class="carousel-inner my-3" style="height: 32rem; border-radius: 6px;">
              <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1506152983158-b4a74a01c721?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1173&q=80" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://plus.unsplash.com/premium_photo-1668485968681-fa4a97d09331?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1608739872119-f78feab7f976?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        <hr>
        <div class="content__trending my-3">
            <h2 class="text-center mb-3">Trending 🔥</h2>
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