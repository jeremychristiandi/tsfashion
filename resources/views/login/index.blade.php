@extends('main')

@section('container')
    <div class="row" style="width: 75%; margin: auto;">
        @if (session()->has("success"))
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                {{ session("success") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        @if (session()->has("loginError"))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session("loginError") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <h2>Login</h2>
        <form action="/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Email address" required>
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" name="password" id="inputPassword5" placeholder="Enter password" class="form-control" aria-labelledby="passwordHelpBlock" required>
            </div>
            <div class="text-center mb-3">
                <button class="btn btn-primary w-15" type="submit">
                    Login
                </button>
            </div>
            <small class="d-block text-center">
            Not registered? <a href="/register">Create account now.</a>
            </small>
        </form>
          
    </div>
@endsection