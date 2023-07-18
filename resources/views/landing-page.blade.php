@extends('layout-landing2.body')
{{-- @extends('layout-landing.body') --}}
@section('content')
    <!-- ======= Hero Section ======= -->
    <section class="hero" id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center order-2 mt-5 mt-lg-0 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    @foreach ($text as $item)
                        <h1>{{ $item->mainline }}</h1>
                        <h2>{{ $item->secondline }}</h2>
                        <h3 class="text-lg-start text-center">{{ $item->thirdline }}</h3>
                    @endforeach
                </div>
                @foreach ($illustration as $i)
                    <div class="col-lg-6 order-1 order-lg-2 hero-img align-items-center" data-aos="zoom-in"
                        data-aos-delay="200">
                        <img src="{{ asset('./illustration/' . $i->illustration) }}" class="img-fluid">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Hero -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2 class="text-dark" style="font-family: Poppins">Our Services</h2>
            </div>
            <div class="row justify-content-around">
                @foreach ($jenis_layanan as $item)
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch my-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box text-center text-lg-start" style="width: 100%p">
                            <div class="d-flex flex-column" style="height: 100%">
                                <h4 class="text-center text-uppercase text-lg-start fw-bold">{{ $item->layanan }}</h4>
                                <p style="height: 100%">{{ $item->deskripsi }}</p>
                                <a href="{{ route('services.index') }}">Lihat lebih lanjut</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box">
                        <h4>Aplikasi</h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                        <a href="" class="">Lihat lebih lanjut</a>
                    </div>
                </div> --}}
            </div>

        </div>
    </section>
    <!-- End Services Section -->


    <!-- ======= Choose what you need now Section ======= -->
    <section id="paket" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2 class="text-center">Choose what you need now</h2>
            </div>

            <div class="row justify-content-between">
                @foreach ($paket as $p)
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box text-center" style="width: 100%; height: 30rem;">
                            <h4>{{ $p->nama_paket }}</h4>
                            @foreach ($p->produk as $pp)
                                <ul class="m-0">
                                    <li class="paket text-start">{{ $pp->nama_produk }}</li>
                                </ul>
                            @endforeach

                            @php
                                
                                $total = 0;
                            @endphp
                            @foreach ($p->produk as $pt)
                                @php
                                    $total += $pt->harga;
                                @endphp
                                
                            @endforeach
                            <div class="footer" style="position: absolute; bottom:20px; right:50px; left: 50px">
                                 {{-- <p class="fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</p> --}}
                                @guest
                                <a href="/login" class="btn yms-blue mt-4">Beli Sekarang</a>
                                @endguest

                                @auth
                                <a href="/store" class="btn yms-blue mt-4">Beli Sekarang</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Choose what you need now Section -->


    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
        <div class="container">

            <h2 class="text-dark fw-bold">OUR PARTNERS</h2>

            <div class="row justify-content-center" data-aos="zoom-in">

                @foreach ($partner as $item)
                    <div class="col-lg-3 col-md-4 col-sm-7 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('./partner/' . $item->partner) }}" class="img-fluid" alt="">
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Cliens Section -->



    <section id="testimonial">
        <!-- Carousel wrapper -->
        <div id="carouselExampleControls" class="carousel slide text-center text-white" data-bs-ride="carousel">
            <h2 class="fw-bold mb-4" style="font-family: Poppins">TESTIMONIALS</h2>
            <div class="carousel-inner">
                @foreach ($testi as $item)
                    <div class="carousel-item active">
                        <img class="rounded-5 shadow-1-strong mb-4" src="{{ asset('./testimonial/' . $item->foto) }}"
                            alt="avatar" style="width: 100px; height:3cm" />
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <h5 class="mb-3 fw-bold" style="font-family: Poppins">{{ $item->nama }}</h5>
                                <p>{{ $item->jabatan }}</p>
                                <p class="">
                                    <i class="fas fa-quote-left pe-2"></i>
                                    {{ $item->review }}
                                    <i class="fas fa-quote-right ps-2"></i>
                                </p>
                            </div>
                        </div>
                        {{-- <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                            <li><i class="fas fa-star fa-sm"></i></li>
                            <li><i class="fas fa-star fa-sm"></i></li>
                            <li><i class="fas fa-star fa-sm"></i></li>
                            <li><i class="fas fa-star fa-sm"></i></li>
                            <li><i class="far fa-star fa-sm"></i></li>
                        </ul> --}}
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Carousel wrapper -->
    </section>


    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

                <h2 class="text-dark fw-bold my-5 text-center" style="font-size: 42px">About Us</h2>

            <div class="row content">
                <div class="col pt-4 pt-lg-0">
                    <h5>
                        Youthms.id merupakan startup yang berkembang di bidang pelayanan jasa teknologi. Kami menyediakan berbagai jenis layanan dan sub layanan, mulai dari bidang desain grafis hingga pembuatan aplikasi. Youthms.id membantu mengembangkan bisnis anda dengan mudah menggunakan kecanggihan teknologi dan jasa yang kami berikan kepada anda.
                    </h5>
                    <br>
                    <h5>
                        Kami adalah mitra terpercaya yang siap membantu mewujudkan potensi penuh bisnis Anda. Dengan tim ahli yang terdiri dari pengembang aplikasi berpengalaman, desainer kreatif yang menghasilkan karya visual menakjubkan, ahli pemasaran yang menggunakan strategi digital terkini, dan tim pengedit yang menyempurnakan konten, kami memberikan layanan berkualitas tinggi untuk mencapai kesuksesan bersama.
                    </h5>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Us Section -->


    {{--  -->

    <div class="konten">

        <!-- Content -->
        <div data-aos="fade-up" data-aos-duration="2000" class="container-fluid content">

            <!-- Our Services -->
            <div id="our-services" class="content mt-5">
                <div class="h1 text-center my-5">Our Services</div>
                <div class="row justify-content-around">
                    <div class="col-lg-3 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Aplikasi</h5>
                                <ul>
                                    <li>Aplikasi</li>
                                    <li>Desain pengembangan Aplikasi</li>
                                </ul>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Desain</h5>
                                <ul>
                                    <li>Kartu Nama</li>
                                    <li>Cover Buku</li>
                                    <li>Logo</li>
                                </ul>
                                <a href="#" class="text-center btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Editing</h5>
                                <ul>
                                    <li>Surat Menyurat</li>
                                    <li>Editing Full format</li>
                                    <li>Parafrase</li>
                                </ul>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Choose what you need card-->
        <div class="content text-white" data-aos="fade-up" data-aos-duration="2000">
            <div id="choose" class="px-5" style="background-color: #406CAB">
                <div class="card-content p-5">
                    <h1 class="fw-bolder">Choose</h1>
                    <h4 class="mb-5">What you need now</h4>

                    <div class="row justify-content-between">
                        <div class="col-lg-3 col-sm-12">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Paket A</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of
                                        the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-12">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Paket B</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of
                                        the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Paket C</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of
                                        the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Paket D</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of
                                        the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>





                    </div>

                </div>
            </div>
        </div>


        <!-- Our Partners -->
        <div class="container content" data-aos="fade-up" data-aos-duration="2000">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Our Partners</h1>
                    <div class="lc-block">
                        <div id="carouselLogos" class="carousel slide pt-5 pb-4" data-bs-ride="carousel">

                            <div class="carousel-inner px-5">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-6 col-lg-2 align-self-center">
                                            <img class="d-block w-100 px-3 mb-3"
                                                src="https://cdn.livecanvas.com/media/logos/11.png" alt="">
                                        </div>
                                        <div class="col-6 col-lg-2  align-self-center">
                                            <img class="d-block w-100 px-3  mb-3"
                                                src="https://cdn.livecanvas.com/media/logos/2.png" alt="">
                                        </div>
                                        <div class="col-6 col-lg-2  align-self-center">
                                            <img class="d-block w-100 px-3  mb-3"
                                                src="https://cdn.livecanvas.com/media/logos/3.png" alt="">
                                        </div>
                                        <div class="col-6 col-lg-2  align-self-center">
                                            <img class="d-block w-100 px-3  mb-3"
                                                src="https://cdn.livecanvas.com/media/logos/12.png" alt="">
                                        </div>
                                        <div class="col-6 col-lg-2  align-self-center">
                                            <img class="d-block w-100 px-3  mb-3"
                                                src="https://cdn.livecanvas.com/media/logos/5.png" alt="">
                                        </div>
                                        <div class="col-6 col-lg-2  align-self-center">
                                            <img class="d-block w-100 px-3  mb-3"
                                                src="https://cdn.livecanvas.com/media/logos/6.png" alt="">
                                        </div>
                                    </div>

                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-6 col-lg-2 align-self-center">
                                            <img class="d-block w-100 px-3 mb-3"
                                                src="https://cdn.livecanvas.com/media/logos/11.png" alt="">
                                        </div>
                                        <div class="col-6 col-lg-2  align-self-center">
                                            <img class="d-block w-100 px-3  mb-3"
                                                src="https://cdn.livecanvas.com/media/logos/2.png" alt="">
                                        </div>
                                        <div class="col-6 col-lg-2  align-self-center">
                                            <img class="d-block w-100 px-3  mb-3"
                                                src="https://cdn.livecanvas.com/media/logos/3.png" alt="">
                                        </div>
                                        <div class="col-6 col-lg-2  align-self-center">
                                            <img class="d-block w-100 px-3  mb-3"
                                                src="https://cdn.livecanvas.com/media/logos/12.png" alt="">
                                        </div>
                                        <div class="col-6 col-lg-2  align-self-center">
                                            <img class="d-block w-100 px-3  mb-3"
                                                src="https://cdn.livecanvas.com/media/logos/5.png" alt="">
                                        </div>
                                        <div class="col-6 col-lg-2  align-self-center">
                                            <img class="d-block w-100 px-3  mb-3"
                                                src="https://cdn.livecanvas.com/media/logos/6.png" alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="w-100 px-3 text-center mt-4">
                                <a class="carousel-control-prev position-relative d-inline me-4" href="#carouselLogos"
                                    data-bs-slide="prev">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="text-dark"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z">
                                        </path>
                                    </svg>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next position-relative d-inline" href="#carouselLogos"
                                    data-bs-slide="next">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="text-dark"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                    <span class="visually-hidden">Next</span>
                                </a>

                            </div>
                        </div>
                    </div><!-- /lc-block -->
                </div><!-- /col -->
            </div>
        </div>


        <!-- Testimonials -->
        <div class="content text-white" data-aos="fade-up" data-aos-duration="2000">
            <div id="choose" class="px-5" style="background-color: #406CAB">
                <div class="card-content p-5">
                    <h1 class="fw-bolder">Our</h1>
                    <h4 class="mb-5">Testimonials</h4>

                    <section>
                        <div class="row text-center text-dark">
                            <div class="col mb-5 mb-md-0 m-3 p-3 bg-white">
                                <div class="d-flex justify-content-center mb-4">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
                                        class="rounded-circle shadow-1-strong" width="150" height="150" />
                                </div>
                                <h5 class="mb-3">Maria Smantha</h5>
                                <h6 class="text-primary mb-3">Web Developer</h6>
                                <p class="px-xl-3">
                                    <i class="fas fa-quote-left pe-2"></i>Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab hic
                                    tenetur.
                                </p>
                                <ul class="list-unstyled d-flex justify-content-center mb-0">
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                                    </li>
                                </ul>
                            </div>

                            <div class="col mb-5 mb-md-0 m-3 p-3 bg-white">
                                <div class="d-flex justify-content-center mb-4">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                                        class="rounded-circle shadow-1-strong" width="150" height="150" />
                                </div>
                                <h5 class="mb-3">Lisa Cudrow</h5>
                                <h6 class="text-primary mb-3">Graphic Designer</h6>
                                <p class="px-xl-3">
                                    <i class="fas fa-quote-left pe-2"></i>Ut enim ad minima veniam, quis nostrum
                                    exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid commodi.
                                </p>
                                <ul class="list-unstyled d-flex justify-content-center mb-0">
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                </ul>
                            </div>


                            <div class="col mb-0 m-3 p-3 bg-white">
                                <div class="d-flex justify-content-center mb-4">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
                                        class="rounded-circle shadow-1-strong" width="150" height="150" />
                                </div>
                                <h5 class="mb-3">John Smith</h5>
                                <h6 class="text-primary mb-3">Marketing Specialist</h6>
                                <p class="px-xl-3">
                                    <i class="fas fa-quote-left pe-2"></i>At vero eos et accusamus et iusto odio
                                    dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.
                                </p>
                                <ul class="list-unstyled d-flex justify-content-center mb-0">
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                        <i class="far fa-star fa-sm text-warning"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>

        <!-- About us -->
        <div class="container content" data-aos="fade-up" data-aos-duration="2000">
            <h1 class="text-center">About Us</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium sed maxime distinctio ea, voluptas porro
                earum aliquam rem ullam, dicta facilis alias sapiente. Asperiores optio, ea a reiciendis molestiae
                laudantium? Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero aperiam reiciendis, sapiente
                possimus esse sunt velit nihil illum necessitatibus, rerum sequi obcaecati quasi quos quia nam qui, culpa
                reprehenderit doloremque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam dolorem ullam
                eos nam eius at neque qui cupiditate consequuntur repudiandae. Aspernatur magnam animi voluptas culpa nemo
                eveniet voluptate quia ducimus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi
                veritatis, necessitatibus, facere soluta asperiores maxime unde culpa enim ad, nulla illum rem eaque quam.
                Maxime neque cupiditate quidem adipisci laboriosam!
            </p>
        </div>

    </div> --}}

    <style>
        .paket {
            list-style-type: disc;
        }
    </style>
@endsection
