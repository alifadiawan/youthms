@extends('layout-landing2.body')
@section('content')
    <section class="trending" id="trending">
        <div class="container" data-aos="fade-up">
            <div class="trending-area fix">
                <div class="trending-main">
                    <div class="row mt-40">
                        <div class="col-lg-9">
                            <!-- Trending Top -->

                            {{-- @foreach ($blog as $b) --}}
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    {{-- <img src="{{ asset('blog/' . $b->foto) }}" alt="" width="100%"
                                                height="100%" style="border-radius: 20px"> --}}
                                    <img src="{{ asset('illustration/il1.jpg') }}" alt="" width="100%"
                                        height="100%">

                                    <div class="trend-top-cap">
                                        {{-- <span>Pemrograman 5</span> --}}
                                        <h2><a href="/blog-detail">ealah <br> consectetur
                                                adipiscing elit.</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            {{-- @endforeach --}}
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top: 50px">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{ asset('illustration/il1.jpg') }}" alt="" width="100%"
                                                    height="100%">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1">Design</span>
                                                <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit. </a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 50px">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{ asset('illustration/il1.jpg') }}" alt="" width="100%"
                                                    height="100%">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color2">Editing</span>
                                                <h4>
                                                    <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit. </a></h4>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 50px">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{ asset('illustration/il1.jpg') }}" alt="" width="100%"
                                                    height="100%">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color3">Pemrograman</span>
                                                <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit. </a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3" style="margin-top: 50px">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{ asset('illustration/il1.jpg') }}" alt="" width="100%"
                                                    height="100%">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1">Design</span>
                                                <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit. </a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3" style="margin-top: 50px">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{ asset('illustration/il1.jpg') }}" alt="" width="100%"
                                                    height="100%">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color2">Editing</span>
                                                <h4>
                                                    <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit. </a></h4>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3" style="margin-top: 50px">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{ asset('illustration/il1.jpg') }}" alt="" width="100%"
                                                    height="100%">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color2">Editing</span>
                                                <h4>
                                                    <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit. </a></h4>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3" style="margin-top: 50px">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{ asset('illustration/il1.jpg') }}" alt="" width="100%"
                                                    height="100%">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color3">Pemrograman</span>
                                                <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit. </a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Right content -->
                            <div class="col-lg-3">
                                <div class="card card-right">
                                    <div class="card-body">
                                        <!-- tombol kategori jasa -->
                                        <div class="header container mb-2 mt-3">
                                            <div class="d-flex flex-row text-center gap-3"
                                                style="justify-content: center">
                                                <a href="" class="btn-populer rounded-5"
                                                    style="width:70px; height:100%"><i class="fa-solid fa-star"></i></a>
                                                <a href="" class="btn-terkini rounded-5"
                                                    style="width:70px; height:100%"><i
                                                        class="fa-solid fa-chart-simple"></i></a>
                                                <a href="" class="btn-terpilih rounded-5"
                                                    style="width:70px; height:100%"><i
                                                        class="fa-regular fa-hand-pointer"></i></a>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="overflow-auto" style="max-width: 100%; max-height: 575px;">
                                            <div class="col-lg-12">
                                                <div class="trand-right-single d-flex">
                                                    <div class="trand-right-img">
                                                        <img src="{{ asset('illustration/il1.jpg') }}" alt=""
                                                            width="100px" height="100px">
                                                    </div>
                                                    <div class="trand-right-cap">
                                                        <span class="color1">Pemrograman 2</span>
                                                        <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="trand-right-single d-flex">
                                                    <div class="trand-right-img">
                                                        <img src="{{ asset('illustration/il1.jpg') }}" alt=""
                                                            width="100px" height="100px">
                                                    </div>
                                                    <div class="trand-right-cap">
                                                        <span class="color3">Pemrograman 5</span>
                                                        <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="trand-right-single d-flex">
                                                    <div class="trand-right-img">
                                                        <img src="{{ asset('illustration/il1.jpg') }}" alt=""
                                                            width="100px" height="100px">
                                                    </div>
                                                    <div class="trand-right-cap">
                                                        <span class="color2">Pemrograman 4</span>
                                                        <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="trand-right-single d-flex">
                                                    <div class="trand-right-img">
                                                        <img src="{{ asset('illustration/il1.jpg') }}" width="100px"
                                                            height="100%">
                                                    </div>
                                                    <div class="trand-right-cap">
                                                        <span class="color4">Pemrograman 6</span>
                                                        <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="trand-right-single d-flex">
                                                    <div class="trand-right-img">
                                                        <img src="{{ asset('illustration/il1.jpg') }}" width="100px"
                                                            height="100px">
                                                    </div>
                                                    <div class="trand-right-cap">
                                                        <span class="color4">Pemrograman 6</span>
                                                        <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="trand-right-single d-flex">
                                                    <div class="trand-right-img">
                                                        <img src="{{ asset('illustration/il1.jpg') }}" width="100px"
                                                            height="100px">
                                                    </div>
                                                    <div class="trand-right-cap">
                                                        <span class="color4">Pemrograman 6</span>
                                                        <h4><a href="/blog-detail">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. </a>
                                                        </h4>
                                                    </div>
                                                </div>

                                                {{-- <div class="trand-right-single d-flex">
                                                <div class="trand-right-img">
                                                    <img src="assets/img/images/course-11.jpg" alt="" width="100%" height="100%">
                                                </div>
                                                <div class="trand-right-cap">
                                                    <span class="color1">Skeping</span>
                                                    <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
