@extends('main')

@section('container')
    <div class="row" style="width: 75%; margin: auto;">
        <h2>Register</h2>
        <form action="/register" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Full name" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" required>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email"  name="email" class="form-control @error('email')
                is-invalid @enderror" id="email" placeholder="Email address" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter password" class="form-control @error('password')
                is-invalid
                @enderror" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="text-center mb-3">
                <button class="btn btn-primary w-15" type="submit">
                    Register
                </button>
            </div>
            <small class="d-block text-center">
                Registered already? <a href="/register">Login now.</a>
            </small>
        </form>
          
    </div>
@endsection