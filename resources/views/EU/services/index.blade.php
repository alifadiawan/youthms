@extends('layout-landing2.body')
@section('title', '| Services')
@section('content')
    <!-- hero / illustration -->
    @foreach($ills as $i)
    <section class="main-banner mt-5" id="main-banner">
        <div id="hero-services">
            <div class="container">
                <div class="row align-items-center" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-lg-8">
                        <img class="img-fluid" src="{{ asset('illustration/'.$i->hero_ills) }}" alt="">
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <p>{{$i->hero_text}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach

    <h1 data-aos="fade-up" data-aos-duration="1000" class="text-center text-dark" style="font-family: Poppins, sans-serif; font-weight:bold">Layanan Yang Kami Tawarkan</h1>
@foreach($jenis_layanan as $jenis)
    @php
        $layanan = strtolower(str_replace(' ', '_', $jenis->layanan));
        $produk = ${$layanan};
    @endphp
    <section class="layanan" id="layanan">
        <div class="konten">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
                integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
            <div class="container">
                <div class="row align-items-center" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-lg-6 col-md-6 order-2 order-md-1 mt-4 pt-2 mt-sm-0 opt-sm-0">
                        <div class="row align-items-center">
                            <lottie-player src="{{$jenis->link_illus}}"
                                data-aos="fade-down" id="porto-animation" background="transparent" speed="1"
                                style="width: 100%" loop autoplay></lottie-player>

                        </div>
                        <!--end row-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-6 col-md-6 col-12 order-1 order-md-2">
                        <div class="section-title ml-lg-5">
                            <h4 class="title mb-4 text-capitalize">
                                {{$jenis->layanan}}
                            </h4>
                            <p class="text-muted mb-0">{{$jenis->deskripsi}}</p>
                            <div class="row">
                                @foreach($produk as $item)
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-play h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="{{route('services.show', $item->id)}}" class="text-white">{{$item->nama_produk}}</a>
                                        </h6>
                                    </div>
                                </div>
                                @endforeach
                                <!-- <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-file-download h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Aplikasi Kasir
                                                Berbasis Web</a></h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-user h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Website Company
                                                Profile</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-image h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Website
                                                E-commerce</a>
                                        </h6>
                                    </div>
                                </div> -->
                            </div>
                            <div class="d-grid gap-2" style="margin-top: 20px">
                                <a href="/portfolio/{{$layanan}}/show" class="btn-porto btn btn text-white rounded-5"
                                    type="button">Portofolio
                                    Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--enr row-->
        </div>
    </section>
    <hr>
@endforeach
    </div>
@endsection
