<nav id="navbar" class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('youth-logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-white px-3">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/blog/editing">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('storeEU.index') }}">Store</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services/all">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->username }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                @endauth

                @guest
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="/cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="btn btn-outline-light">
                            Login
                        </a>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
