@extends('layout-landing.body')
@section('content')
    <!-- hero / illustration -->
    <div id="hero-services">
        <div class="container d-flex">
            <div class="row justify-content-between align-items-center" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-6 col-sm-8">
                    <img class="img-fluid" src="{{ asset('illustration/services.png') }}" alt="">
                </div>
                <div class="col-lg-6 col-sm-4 text-center ">
                    <h1 class="fw-bolder">YouthMS memiliki 3 jenis layanan
                        yang bergerak dibidang Aplikasi,
                        Desain, dan Editing</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="konten">
        <h1 class="text-center fw-bold">Layanan yang kami Tawarkan</h1>
        <div class="row">
            <div class="col">
                <div style="background-color: #2FA5FB; height: 60vh; border-radius: 0px 100px 100px 0px">
                    <p>Untuk para pedagang online maupun offline, desain merupakan salah satu hal penting untuk menarik pembeli. Di youthMS kami memiliki beberapa layanan yang dapat digunakan untuk membantu meningkatkan upaya penjualan</p>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
        </div>

    </div>
@endsection
