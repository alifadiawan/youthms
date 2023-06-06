@extends('layout-landing2.body')
@section('content')
    <section class="detail-service" id="detail-service">
        <div class="container" >
             <a href="{{ route('services.index') }}" class="btn btn yms-blue" style="margin-top: 50px" data-aos="fade-down" data-aos-duration="2000">
            <i class="fas fa-arrow-left"></i>
        </a>
            <header class="section-header" style="margin-top: 25px;" data-aos="fade-down" data-aos-duration="2000">
                <h1 class="fw-bold text-capitalize">{{$produk->services->jenis_layanan->layanan}}</h1>
            </header>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="2000">
                        <img src="{{ asset('produk/'.$produk->foto) }}" alt="" width="500px">
                    </div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-duration="2000">
                        <h2 class="text-center">
                            {{$produk->nama_produk}}
                        </h2>
                        <p>
                            {{$produk->deskripsi}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
