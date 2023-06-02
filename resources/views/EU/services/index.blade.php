@extends('layout-landing2.body')
@section('content')
    <!-- hero / illustration -->
    <section class="main-banner mt-5" id="main-banner">
        <div id="hero-services">
            <div class="container">
                <div class="row align-items-center" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-lg-8">
                        <img class="img-fluid" src="{{ asset('illustration/services.png') }}" alt="">
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <p>YouthMS memiliki 3 jenis layanan
                            yang bergerak dibidang Aplikasi,
                            Desain, dan Editing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layanan" id="layanan">
        <div class="konten">
            <h1 data-aos="fade-up" data-aos-duration="1000">Layanan Yang Kami Tawarkan</h1>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
                integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
            <div class="container">
                <div class="row align-items-center" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-lg-6 col-md-6 order-2 order-md-1 mt-4 pt-2 mt-sm-0 opt-sm-0">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                        {{-- <div class="card work-desk rounded border-0 shadow-lg overflow-hidden"> --}}
                                            <img src="{{ asset('illustration/1.jpg') }}" class="img-fluid" alt="Image" />
                                            <div class="img-overlay bg-dark"></div>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        {{-- <div class="card work-desk rounded border-0 shadow-lg overflow-hidden"> --}}
                                            <img src="{{ asset('illustration/2.jpg') }}" class="img-fluid" alt="Image" />
                                            <div class="img-overlay bg-dark"></div>
                                        {{-- </div> --}}
                                    </div>
                                    <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                        {{-- <div class="card work-desk rounded border-0 shadow-lg overflow-hidden"> --}}
                                            <img src="{{ asset('illustration/3.jpg') }}" class="img-fluid" alt="Image">
                                            <div class="img-overlay bg-dark"></div>
                                        {{-- </div> --}}
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-6 col-md-6 col-12 order-1 order-md-2">
                        <div class="section-title ml-lg-5">
                            <h4 class="title mb-4">
                                Aplikasi
                            </h4>
                            <p class="text-muted mb-0">Aplikasi merupakan salah satu tempat untuk memasrkan produk/jasa anda secara online. YouthMS memiliki 2 layanan dalam bidang aplikasi</p>
                            <div class="row">
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-play h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Website
                                                Sekolah/Yayasan/dan lain-lain</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
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
                                </div>
                            </div>
                            <div class="d-grid gap-2" style="margin-top: 20px">
                                <a href="/portfolio" class="btn-porto btn btn text-white rounded-5" href="/portofolio" type="button">Portofolio
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
    <section class="layanan" id="layanan">
        <div class="konten">
            {{-- <h1 data-aos="fade-up" data-aos-duration="1000">Layanan Yang Kami Tawarkan</h1> --}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
                integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
            <div class="container">
                <div class="row align-items-center" data-aos="fade-up" data-aos-duration="2000" style="margin-top: -75px">
                    <div class="col-lg-6 col-md-6 order-2 order-md-1 mt-4 pt-2 mt-sm-0 opt-sm-0">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                        {{-- <div class="card work-desk rounded border-0 shadow-lg overflow-hidden"> --}}
                                            <img src="{{ asset('illustration/7.jpg') }}" class="img-fluid" alt="Image" />
                                            <div class="img-overlay bg-dark"></div>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                            
                            <!--end col-->

                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        {{-- <div class="card work-desk rounded border-0 shadow-lg overflow-hidden"> --}}
                                            <img src="{{ asset('illustration/9.jpg') }}" class="img-fluid"
                                                alt="Image" />
                                            <div class="img-overlay bg-dark"></div>
                                        {{-- </div> --}}
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                        {{-- <div class="card work-desk rounded border-0 shadow-lg overflow-hidden"> --}}
                                            <img src="{{ asset('illustration/8.jpg') }}" class="img-fluid"
                                                alt="Image">
                                            <div class="img-overlay bg-dark"></div>
                                        {{-- </div> --}}
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-6 col-md-6 col-12 order-1 order-md-2">
                        <div class="section-title ml-lg-5">
                            {{-- <h5 class="text-custom font-weight-normal mb-3">About Us</h5> --}}
                            <h4 class="title mb-4">
                                Desain
                            </h4>
                            <p class="text-muted mb-0">Untuk para pedagang online maupun offline, desain merupakan salah
                                satu hal penting untuk menarik pembeli. Di youthMS kami memiliki beberapa layanan yang dapat
                                digunakan untuk membantu meningkatkan upaya penjualan</p>

                            <h4 class="title mb-4">
                                Marketing
                            </h4>
                            <div class="row">
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-play h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">
                                                Social Media Management</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-file-download h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Social Media
                                                Post</a></h6>
                                    </div>
                                </div>
                                <div class="d-grid gap-2" style="margin-top: 20px">
                                    <a href="/portfolio" class="btn-porto btn btn text-white rounded-5" href="/portofolio" type="button">Portofolio
                                        Kami</a>
                                </div>
                                <h4>
                                    Desain Grafis
                                </h4>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-user h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail"
                                                class="text-white">Banner/X-Banner/Poster</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-image h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail"
                                                class="text-white">Brosur/Pamflet/Leaflet</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-image h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Packaging+Mock
                                                Up</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-image h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Poster
                                                Penelitian
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-image h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Kartu Nama</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-image h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Cover Buku</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2" style="justify-content: center">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-image h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Logo</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2" style="margin-top: 20px">
                                <a href="/portfolio" class="btn-porto btn btn text-white rounded-5" type="button">Portofolio Kami</a>
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

    <section class="layanan" id="layanan">
        <div class="konten">
            {{-- <h1 data-aos="fade-up" data-aos-duration="1000">Layanan Yang Kami Tawarkan</h1> --}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
                integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
            <div class="container">
                <div class="row align-items-center" data-aos="fade-up" data-aos-duration="2000" style="margin-top: -75px">
                    <div class="col-lg-6 col-md-6 order-2 order-md-1 mt-4 pt-2 mt-sm-0 opt-sm-0">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                        {{-- <div class="card work-desk rounded border-0 shadow-lg overflow-hidden"> --}}
                                            <img src="{{ asset('illustration/4.jpg') }}" class="img-fluid"
                                                alt="Image" />
                                            <div class="img-overlay bg-dark"></div>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                            <!--end col-->

                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        {{-- <div class="card work-desk rounded border-0 shadow-lg overflow-hidden"> --}}
                                            <img src="{{ asset('illustration/5.jpg') }}" class="img-fluid"
                                                alt="Image" />
                                            <div class="img-overlay bg-dark"></div>
                                        {{-- </div> --}}
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                        {{-- <div class="card work-desk rounded border-0 shadow-lg overflow-hidden"> --}}
                                            <img src="{{ asset('illustration/6.jpg') }}" class="img-fluid"
                                                alt="Image">
                                            <div class="img-overlay bg-dark"></div>
                                        {{-- </div> --}}
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-6 col-md-6 col-12 order-1 order-md-2">
                        <div class="section-title ml-lg-5">
                            {{-- <h5 class="text-custom font-weight-normal mb-3">About Us</h5> --}}
                            <h4 class="title mb-4">
                                Editing
                            </h4>
                            <p class="text-muted mb-0">Penyunting buku dalam arti sempit adalah orang yang bertugas
                                melakukan penyuntingan naskah. Penyuntingan naskah adalah proses, cara, atau perbuatan
                                menyunting naskah</p>

                            <div class="row">
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-play h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Memindahkan
                                                Dari Skripsi
                                                Ke Jurnal/Makalah Ke Artikel</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-file-download h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Transkrip Data
                                                Audio To Word</a></h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-user h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail"
                                                class="text-white">PowerPoint/Presentasi</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-image h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Editing
                                                Buku+Cover</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-image h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Editing Full
                                                Format</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-image h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Cek
                                                Plagiarisme</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-image h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Surat
                                                Menyurat</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="media align-items-center rounded shadow p-3">
                                        {{-- <i class="fa fa-image h4 mb-0 text-custom"></i> --}}
                                        <h6 class="ml-3 mb-0"><a href="/services/detail" class="text-white">Pengetikan &
                                                Parafrase</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2" style="margin-top: 20px">
                                <a href="/portfolio" class="btn-porto btn btn text-white rounded-5" type="button">Portofolio Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--enr row-->
        </div>
    </section>
    </div>
@endsection
