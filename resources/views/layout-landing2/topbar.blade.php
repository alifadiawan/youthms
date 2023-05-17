<!-- ======= Header ======= -->
<div class="container d-flex align-items-center">

    <!-- logo -->
    <a href="/" class="logo me-auto"><img src="{{ asset('youth-logo.png') }}" alt="" class="img-fluid"></a>

    <nav id="navbar" class="navbar navbar-expand">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/blog/editing">Blog</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('storeEU.index') }}">Store</a></li>
            <li class="nav-item"><a class="nav-link" href="/services/all">Service</a></li>
            <li class="nav-item"><a class="nav-link" href="/cart"><i class="fa-solid fa-cart-shopping"></i></a></li>
            @guest
                <li><a class="getstarted" href="/login">Login</a></li>
            @endguest
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            @endauth

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Konfirmasi</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h3 class="text-center" style="font-size: 25px;">Anda Yakin Ingin Logout ?</h3>
                </div>
                <div class="modal-footer">
                    <form action="logout" method="post">
                        @csrf
                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- .navbar -->

</div>
