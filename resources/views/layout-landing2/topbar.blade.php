<!-- ======= Header ======= -->
<div class="container d-flex align-items-center">

    <!-- logo -->
    <a href="/" class="logo me-auto"><img src="{{ asset('youth-logo.svg') }}" alt="Youthms Logo" class="m-3 brand-images img-fluid" width="200px"></a>

    <nav id="navbar" class="navbar navbar-expand">
        <ul class="navbar-nav">

            <li class="nav-item"><a class="nav-link" href="{{ route('blogs.index') }}">Blog</a></li>

            {{-- <li class="nav-item"><a class="nav-link" href="{{ route('transaksi.index') }}">Store</a></li> --}}
            <li class="nav-item"><a class="nav-link" href="{{ route('store.index') }}">Store</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('services.index') }}">Service</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('portfolio.index') }}">Portofolio</a></li>

            @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('authcheck') }}"><i
                            class="fa-solid fa-cart-shopping"></i></a></li>

                <li><a class="getstarted" href="/login">Login</a></li>
            @endguest
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        @if ($badge->isEmpty())
                            <i class="fa-solid fa-cart-shopping"></i>
                        @else
                            <i class="fa-solid fa-cart-shopping fa-"><span
                                    class="qty posisition-absolute badge bg-danger position-absolute top-0 translate-middle badge rounded-pill">{{ $badge->count() }}</span></i>
                        @endif
                    </a>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link nav-icon">
                        <i class="far fa-bell "></i>
                        <span class="qty posisition badge bg-danger position top-0 translate-middle badge rounded-pill">{{ count($notifications) }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications p-3">
                        <li class="dropdown-header" id="notificationCount">
                            You have {{ count($notifications) }} new notifications
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <!-- <li> -->
                        @include('EU.notif')
                        <!-- </li> -->
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>{{ auth()->user()->username }}</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="dropdown-item" href="{{ route('user.show', auth()->user()->id) }}">Profile</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('transaksi.index', auth()->user()->id) }}">Histori
                                Transaksi</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('pembayaran.index', auth()->user()->id) }}">Histori
                                Pembayaran</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('gc.index') }}">Chats</a></li>
                        <li>
                            @if (auth()->user()->role->role == 'admin' || auth()->user()->role->role == 'owner')
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.notification-item', function(e) {
            e.preventDefault();

            var url = $(this).data('url');

            // Kirim permintaan Ajax untuk mengubah status notifikasi menjadi "dibaca"
            $.ajax({
                url: '{{ route('read') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    notificationUrl: url
                },
                success: function(response) {
                    // Redirect pengguna ke URL yang disimpan pada notifikasi
                    window.location.href = url;
                },
                error: function(xhr, status, error) {
                    // Tindakan penanganan kesalahan jika diperlukan
                }
            });
        });
    </script>

</div>
