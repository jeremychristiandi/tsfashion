<style>
  .nav-item {
    margin-right: 1rem;
  }
</style>

<nav class="navbar navbar-expand-lg" style="background-color: #e5e5e5">
    <div class="container-fluid">
      <a class="navbar-brand mx-3" href="#">TS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown" style="width: 75%">
        <ul class="navbar-nav mx-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categories">Catalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/products">Products</a>
          </li>
          @if (optional(Auth::user())->is_admin) 
            <li class="nav-item">
              <a class="nav-link" href="/products">My Products</a>
            </li>

          @else
          <li class="nav-item">
            <a class="nav-link" href="/aboutus">About Us</a>
          </li>
              
          @endif

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Account
            </a>
            <ul class="dropdown-menu">
              @auth
              <li><a class="dropdown-item" href="/profile">My Profile</a></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button class="dropdown-item" type="submit">Logout</button>
                </form>
              </li>
              @else 
              <li><a class="dropdown-item" href="/login">Login</a></li>
              <li><a class="dropdown-item" href="/register">Register</a></li>
              @endauth
            </ul>
          </li>
        </ul>
      </div>
      <div class="container-fluid" style="width: 25%">
        <form action="/products" class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" name="search" value="{{ request("search") }}">
          <button class="btn btn-outline-dark" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>