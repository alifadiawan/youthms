@extends('layout-landing2.body')
@section('content')
    <section class="detail-service" id="detail-service">
        <div class="container" >
            <header class="section-header" style="margin-top: 50px" data-aos="fade-down" data-aos-duration="2000">
                <h1 class="fw-bold text-capitalize">{{$produk->services->jenis_layanan->layanan}}</h1>
            </header>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-duration="2000">
                        <img src="{{ asset('produk/'.$produk->foto) }}" alt="">
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
