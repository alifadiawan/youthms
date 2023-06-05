@extends('layout-landing2.body')
@section('content')
    <section class="detail-service" id="detail-service">
        <div class="container" >
            <header class="section-header" style="margin-top: 50px" data-aos="fade-down" data-aos-duration="2000">
                <h1 class="fw-bold">Desain</h1>
            </header>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-duration="2000">
                        <img src="{{ asset('illustration/social-media.png') }}" alt="">
                    </div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-duration="2000">
                        <h2 class="text-center">
                            Social Media Post
                        </h2>
                        <p>
                            Dalam praktiknya, fitur ini berupa beranda Instagram yang berisi postingan dari pengguna lain yang kita ikuti di Instagram. Feed Instagram bisa berupa foto atau video. Para pengguna juga bisa menekan tombol suka, mengomentari, menyimpan, dan mengirim postingan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
