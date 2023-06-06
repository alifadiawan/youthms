@extends('layout-landing2.body')
@section('title', '| Profile')
@section('content')

    <section id="profile" class="container mt-5">
        <!-- Content Row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-12 col-lg-6 text-center"><h1>Informasi Pribadi</h1></div>
        </div>
        @if (auth()->user()->hasIncompleteProfile())
            <div class="alert alert-warning" role="alert">
                Lengkapi data diri dulu. <a href="/edit-profile">Edit</a>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-6">
                <div class="profile card mb-4">
                    <div class="card-body">
                        @foreach ($users as $u)
                            <div class="row">
                                <div class="col-sm-5 col-6">
                                    <p class="header mb-0 fw-bold"><i class="fa-solid fa-user fa-xl fa-fw"></i> Username</p>
                                </div>
                                <div class="col-sm-7 col-6">
                                    <p class="text mb-0">{{ $u->username }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5 col-6 gap-3">
                                    <p class="mb-0 fw-bold"><i class="fa-solid fa-envelope fa-xl fa-fw"></i> Email</p>
                                </div>
                                <div class="col-sm-7 col-6">
                                    <p class="text mb-0">{{ $u->email }}</p>
                                </div>
                            </div>
                            <hr>
                        @endforeach

                        @if ($member->isEmpty())
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="mb-0 fw-bold"><i class="fas fa-id-card fa-lg"></i>Nama Lengkap</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0">Johnatan Smith</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="mb-0 fw-bold">Nomor Telp</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0">(097) 234-5678</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="mb-0 fw-bold">NIK</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0">3578231290</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="mb-0 fw-bold">Alamat</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                                </div>
                            </div>
                        @endif
                        @foreach ($member as $m)
                            <div class="row">
                                <div class="col-sm-5 col-6">
                                    <p class="mb-0 fw-bold"><i class="fas fa-id-card fa-xl fa-fw"></i> Nama Lengkap</p>
                                </div>
                                <div class="col-sm-7 col-6">
                                    <p class="text mb-0">{{ $m->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5 col-6">
                                    <p class="mb-0 fw-bold"><i class="fa-solid fa-phone-volume fa-xl fa-fw"></i> Nomor Telp</p>
                                </div>
                                <div class="col-sm-7 col-6">
                                    <p class="text mb-0">{{ $m->no_hp }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5 col-6">
                                    <p class="mb-0 fw-bold"><i class="fa-solid fa-passport fa-xl fa-fw"></i> NIK</span></p>
                                </div>
                                <div class="col-sm-7 col-6">
                                    <p class="text mb-0">{{ $m->nik }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5 col-6">
                                    <p class="mb-0 fw-bold"><i class="fa-solid fa-map-location-dot fa-xl fa-fw"></i> Alamat</p>
                                </div>
                                <div class="col-sm-7 col-6">
                                    <p class="text mb-0">{{ $m->alamat }}</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-grid gap-3">
                            <a href="{{ route('user.edit', $uid) }}" class="btn-edit btn">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kumpulan Card Riwayat Transaksi User -->
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 ">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        {{-- <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Pesanan Anda</div> --}}
                                        <div class="h5 mt-3 font-weight-bold text-gray-800">{{ $trx_berjalan }} Transaksi <span
                                                class="qty posisition-absolute badge bg-success position-absolute top-0 translate-middle badge">Transaksi Berjalan</span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-bag-shopping fa-2xl"></i>
                                    </div>
                                </div>
                                <a href="{{ route('transaksi.history', auth()->user()->id) }}"
                                    class="btn-sm btn-selengkapnya btn">Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        {{-- <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Riwayat Transaksi</div> --}}
                                        <div class="h5 mt-3 font-weight-bold text-gray-800">{{ $trx_kredit }} Transaksi<span
                                                class="qty posisition-absolute badge bg-secondary position-absolute top-0 translate-middle badge">Riwayat
                                                Transaksi</span></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-clock-rotate-left fa-2xl"></i>
                                    </div>
                                </div>
                                <a href="{{ route('transaksi.history', auth()->user()->id) }}"
                                    class="btn-sm btn-selengkapnya btn">Selengkapnya</a>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mt-3">
                                        {{-- <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Riwayat Transaksi</div> --}}
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $trx_kredit }} Transaksi<span
                                                class="qty posisition-absolute badge bg-warning position-absolute top-0 translate-middle badge">Kredit</span></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-user-gear fa-2xl"></i>
                                    </div>
                                </div>
                                <a href="{{ route('transaksi.history', auth()->user()->id) }}"
                                    class="btn-sm btn-selengkapnya btn">Selengkapnya</a>

                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mt-3">
                                        {{-- <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Riwayat Transaksi</div> --}}
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $badge->count() }} Produk<span
                                                class="qty posisition-absolute badge bg-info position-absolute top-0 translate-middle badge">Keranjang
                                                Anda</span></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                                    </div>
                                </div>
                                <a href="{{ route('cart.index') }}"
                                    class="btn-sm btn-selengkapnya btn">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
