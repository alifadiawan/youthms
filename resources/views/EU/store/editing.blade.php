@extends('layout-landing.body')
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
        <a href="/store/all" class="btn my-3">All</a>
        <a href="/store/editing" class="btn my-3 active">Editing</a>
        <a href="/store/design" class="btn my-3">Design</a>
        <a href="" class="btn my-3">Pemrograman</a>
    </div>

    <br>

    <!-- content -->
    <h5 class="fw-bold">PROMO</h5>
    <div class="d-flex row mb-5">
        <div class="my-3 col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{asset('illustration/bmw.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title">Powerpoint</h4>
                 <h3 class="card-text">Rp.150.000</h3>
                  <a href="#" class="btn btn-primary">
                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                  </a>
                </div>
              </div>
        </div>
    </div>
    <h5 class="fw-bold">Editing</h5>
    <div class="d-flex row mb-5">
        <div class="my-3 col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{asset('illustration/bmw.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title">Powerpoint</h4>
                 <h3 class="card-text">Rp.150.000</h3>
                  <a href="#" class="btn btn-primary">
                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                  </a>
                </div>
              </div>
        </div>
        <div class="my-3 col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{asset('illustration/bmw.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title">Powerpoint</h4>
                 <h3 class="card-text">Rp.150.000</h3>
                  <a href="#" class="btn btn-primary">
                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                  </a>
                </div>
              </div>
        </div>
        <div class="my-3 col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{asset('illustration/bmw.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title">Powerpoint</h4>
                 <h3 class="card-text">Rp.150.000</h3>
                  <a href="#" class="btn btn-primary">
                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                  </a>
                </div>
              </div>
        </div>
        <div class="my-3 col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{asset('illustration/bmw.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title">Powerpoint</h4>
                 <h3 class="card-text">Rp.150.000</h3>
                  <a href="#" class="btn btn-primary">
                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                  </a>
                </div>
              </div>
        </div>
        <div class="my-3 col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{asset('illustration/bmw.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title">Powerpoint</h4>
                 <h3 class="card-text">Rp.150.000</h3>
                  <a href="#" class="btn btn-primary">
                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                  </a>
                </div>
              </div>
        </div>
        <div class="my-3 col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{asset('illustration/bmw.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title">Powerpoint</h4>
                 <h3 class="card-text">Rp.150.000</h3>
                  <a href="#" class="btn btn-primary">
                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                  </a>
                </div>
              </div>
        </div>
    </div>

</div>

@endsection