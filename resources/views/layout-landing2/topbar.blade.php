<!-- ======= Header ======= -->
<div class="container d-flex align-items-center">

    <!-- logo -->
    <a href="/" class="logo me-auto"><img src="{{ asset('youth-logo.png') }}" alt="" class="img-fluid"></a>

    <nav id="navbar" class="navbar navbar-expand">
        <ul class="navbar-nav">

            <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Blog</a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="{{ route('transaksi.index') }}">Store</a></li> --}}
            <li class="nav-item"><a class="nav-link" href="{{ route('store.index') }}">Store</a></li>
            <li class="nav-item"><a class="nav-link" href="/services/all">Service</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('portfolio.index') }}">Portofolio</a></li>

            @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('authcheck') }}"><i
                            class="fa-solid fa-cart-shopping"></i></a></li>

                <li><a class="getstarted" href="/login">Login</a></li>
            @endguest
            @auth
                <li class="nav-item"><a class="nav-link" href="/groupchat">Chats</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        @if ($badge->isEmpty())
                            <i class="fa-solid fa-cart-shopping"></i>
                        @else
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="badge bg-primary ms-3">{{ $badge->count() }}</span>
                        @endif
                    </a>
                </li>


                <li class="dropdown"><a href="#"><span>{{ auth()->user()->username }}</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="dropdown-item" href="{{ route('user.show', auth()->user()->id) }}">Profile</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('transaksi.history', auth()->user()->id) }}">Histori
                                Transaksi</a>
                        <li>
                            @if (auth()->user()->roles->contains('role', 'admin') || auth()->user()->roles->contains('role', 'owner'))
                        <li>
                            <a class="dropdown-item" href="{{ route('dashboard.index') }}">Ke Dashboard Admin</a>
                        </li>
                        @endif
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                Logout
                            </a>
                        </li>
                    </ul>
                    {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->username }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <li><a class="dropdown-item" href="{{ route('storeEU.edit_profile') }}">Edit Profile</a></li> --}}
                    {{-- <li><a class="dropdown-item" href="{{ route('user.show', auth()->user()->id) }}">Profile</a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('transaksi.history', auth()->user()->id) }}">Histori
                        Transaksi</a>
                <li>
                    <hr class="dropdown-divider">
                </li>
                @if (auth()->user()->role->role == 'admin' || auth()->user()->role->role == 'admin')
                    <li>
                        <a class="dropdown-item" href="{{ route('dashboard.index') }}">Ke Dashboard Admin</a>
                    </li>
                @endif
                <li>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        Logout
                    </a>
                </li>
            </ul>

            </li> --}}
                @endauth


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>



    <!-- .navbar -->

</div>
