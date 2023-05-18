<!-- ======= Header ======= -->
<div class="container d-flex align-items-center">

    <!-- logo -->
    <a href="/" class="logo me-auto"><img src="{{ asset('youth-logo.png') }}" alt="" class="img-fluid"></a>

    <nav id="navbar" class="navbar navbar-expand">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/blog/editing">Blog</a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="{{ route('transaksi.index') }}">Store</a></li> --}}
            <li class="nav-item"><a class="nav-link" href="{{ route('storeEU.index') }}">Store</a></li>
            <li class="nav-item"><a class="nav-link" href="/services/all">Service</a></li>
            <li class="nav-item"><a class="nav-link" href="/portofolio/all">Portofolio</a></li>
            @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('authcheck') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>
                <li><a class="getstarted" href="/login">Login</a></li>
            @endguest
            @auth
                <li class="nav-item"><a class="nav-link" href="/cart"><i class="fa-solid fa-cart-shopping"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->user()->username}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('storeEU.edit_profile') }}">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="/profile">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="/profile">Struk</a></li>
                        <li><a class="dropdown-item" href="/profile">Belum Bayar</a></li>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                Logout
                            </a>
                        </li>
                    </ul>

                </li>
            @endauth

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>




    <!-- .navbar -->

</div>
