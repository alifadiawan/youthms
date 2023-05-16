<nav id="navbar" class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('youth-logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-white px-3">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/blog/editing">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('storeEU.index')}}">Store</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#our-services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
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
            </ul>
        </div>
    </div>
</nav>