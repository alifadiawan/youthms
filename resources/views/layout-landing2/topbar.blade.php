<!-- ======= Header ======= -->
    <div class="container d-flex align-items-center">

        <!-- logo -->
       <a href="index.html" class="logo me-auto"><img src="{{ asset('youth-logo.png') }}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="/">Home</a></li>
          <li><a class="nav-link" href="/blog/editing">Blog</a></li>
          <li><a class="nav-link" href="{{route('storeEU.index')}}">Store</a></li>
          <li><a class="nav-link" href="/services/all">Service</a></li>
          <li><a class="nav-link" href="/cart"><i class="fa-solid fa-cart-shopping"></i></a></li>
          @guest
          <li><a class="getstarted" href="/login">Login</a></li>
          @endguest
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>      