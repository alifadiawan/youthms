@extends('layout-landing2.body')
@section('title', 'Editing')
@section('content')


    <div id="store" class="row" data-aos="fade-right" data-aos-duration="1000">
        <div id="thumbnail" class="text-start">
            <img src="{{ asset('illustration/store-illustration.png') }}" class="img-fluid" alt="">
            <div id="caption">
                <h3 class="text-white">aowkaokwa</h3>
                <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus fugit
                    pariatur, magnam aliquam et qui hic corporis odio neque nobis doloribus quidem delectus saepe commodi
                    illum minima blanditiis nostrum quod.</p>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        {{-- navbar kategori --}}
        <div class="d-flex flex-row text-center gap-3">
            <a href="{{ route('storeEU.index') }}" class="text-capitalize my-3 active">Promo</a>
            @foreach ($layanan as $l)
                {{-- //branch main2 --}}
                <a href="{{ route('store.show', $l->layanan) }}" class=" my-3 text-capitalize">{{ $l->layanan }}</a>
                {{-- //branch main
                <a href="{{ route('store.show', $l->id) }}" class=" my-3 text-capitalize">{{ $l->layanan }}</a> --}}
            @endforeach

        </div>
        @if (count($errors) > 0)
            <div class="alert alert-success" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif


        <!-- promo content -->
        <p class="h2 fw-bold text-capitalize">{{ $jenis_layanan->layanan }}</p>
        <div class="d-flex row mb-5 justify-content-start" data-aos="fade-down" data-aos-duration="1000">
            {{-- @foreach ($produk as $item) --}}
            @foreach ($produk as $p)
                <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title text-capitalize">{{ $p->nama_produk }}</h4>
                            <p class="card-title text-secondary">{{ $p->services->judul }}</p>
                            <h3 class="card-text">Rp.{{ number_format($p->harga) }}</h3>
                            {{-- <h5>{{ $p->id }}</h5> --}}

                            @guest
                                <a href="{{ route('authcheck') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                </a>
                            @endguest

                            @if (!empty($member))
                                <a href="{{ route('user.show',$user) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                </a>
                            @else
                                @auth
                                    @if ($c->contains('id', $p->id))
                                        <button type="submit" class="btn btn-danger" disabled>
                                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                        </button>
                                    @else
                                        <form action="{{ route('transaksi.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="member_id" value="{{ $user }}">
                                            <input type="hidden" class="form-control" name="quantity" value="1">
                                            <input type="hidden" value="{{ $p->id }}" name="produk_id">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            @endif



                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- @endforeach --}}
        {{-- <div class="my-3 col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-title text-secondary"><del>Rp.300.000</del></p>
                        <h3 class="card-text">Rp.150.000</h3>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-title text-secondary"><del>Rp.300.000</del></p>
                        <h3 class="card-text">Rp.150.000</h3>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div> --}}
        {{-- <p class="h2 fw-bold">PROMO</p>
        <div class="d-flex row mb-5 justify-content-center">
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-title text-secondary"><del>Rp.300.000</del></p>
                        <h3 class="card-text">Rp.150.000</h3>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-title text-secondary"><del>Rp.300.000</del></p>
                        <h3 class="card-text">Rp.150.000</h3>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-title text-secondary"><del>Rp.300.000</del></p>
                        <h3 class="card-text">Rp.150.000</h3>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- yg paling diminati -->
        <p class="h2 fw-bold">PALING DIMINATI</p>
        <div class="row">
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-text">Rp.150.000</p>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-text">Rp.150.000</p>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-text">Rp.150.000</p>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
@endsection
