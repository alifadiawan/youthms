@extends('layout-landing.body')
@section('title', 'Store')
@section('content')
    <div class="row">
        <div id="thumbnail" class="text-start">
            <img src="{{ asset('illustration/store-illustration.png') }}" class="img-fluid" alt="">
            <div id="caption">
                <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus fugit
                    pariatur, magnam aliquam et qui hic corporis odio neque nobis doloribus quidem delectus saepe commodi
                    illum minima blanditiis nostrum quod.</p>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        {{-- navbar kategori --}}
        <div class="d-flex flex-row text-center">
            {{-- <a href="{{ route('storeEU.editing') }}" class="btn my-3">Editing</a>
            <a href="{{ route('storeEU.design') }}" class="btn my-3">Design</a> --}}
            <a href="{{ route('storeEU.index') }}" class="btn my-3 active">All</a>
            @foreach ($layanan as $l)
                <a href="{{ route("store.show",$l->id) }}" class="btn my-3">{{ $l->layanan }}</a>
            @endforeach

        </div>


        <!-- promo content -->
        <p class="h2 fw-bold">PROMO</p>
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
        </div>

    </div>
@endsection
