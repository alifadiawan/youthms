@extends('layout-landing2.body')
@section('content')
    <section class="trending" id="trending">
        <div class="container" data-aos="fade-up">
            <div class="trending-area fix">
                <div class="trending-main">
                    <a href="{{ route('blogs.index') }}" class="text-capitalize my-3 btn yms-outline rounded-5 active">All</a>
                    @foreach ($segmen as $s)
                        @php
                            $link = strtolower(str_replace(' ', '_', $s->segmen));
                        @endphp
                        <a href="{{ route('blogs.showtype', $link) }}"
                            class=" my-3 text-capitalize btn yms-outline rounded-5 active">{{ $s->segmen }}</a>
                    @endforeach
                    @foreach ($atas as $b)
                        <div class="row mt-40">
                            <div class="col-lg-8">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                <span class="fw-bold" style="font-size: 22px">Trending Artikel #1</span>
                                            </button>
                                        </h2>
                                        <hr>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="trending-top mb-30">
                                                <div class="trend-top-img">
                                                    {{-- <img src="{{ asset('blog/'.$b->foto) }}" alt="" width="100%"
                                                        height="100%" style="border-radius: 20px"> --}}
                                                    <img src="{{ asset('blog/' . $b->foto) }}" alt="" width="100%"
                                                        height="100%" style="border-radius:25px; margin-top:10px">

                                                    <div class="trend-top-cap">
                                                        {{-- <span>Pemrograman 5</span> --}}
                                                        <h2><a
                                                                href="{{ route('blogs.detail', $b->id) }}">{{ $b->judul }}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- Trending Top -->
                    @endforeach

                    <!-- Trending Bottom -->

                    <div class="trending-bottom">
                        <div class="row">
                            @foreach ($recently_uploaded as $ru)
                                <div class="col-lg-4" style="margin-top: 50px">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="{{ asset('blog/' . $ru->foto) }}" alt="" height="190px">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color1">{{ $ru->segmen->segmen }}</span>
                                            <h4><a href="{{ route('blogs.detail', $ru->id) }}">{{ $ru->judul }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            @foreach ($recently_lastweek as $rl)
                                <div class="col-lg-4" style="margin-top: 50px">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="{{ asset('blog/' . $rl->foto) }}" alt="" width="100%"
                                                height="190px">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color1">{{ $rl->segmen->segmen }}</span>
                                            <h4><a href="{{ route('blogs.detail', $rl->id) }}">{{ $rl->judul }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Right content -->
                <div class="col-lg-4">
                    <div class="card" style="border-radius: 25px">
                        <div class="card-body">
                            <div class="header container mb-2 mt-3">
                                <div class="d-flex flex-row text-center gap-3" style="justify-content: center">
                                    <a type="submit" href="#" onclick="show('populer')" class="btn-populer rounded-5"
                                        style="width:70px; height:100%"><i class="fa-solid fa-star"></i></a>
                                    <a type="submit" href="#" onclick="show('weekly')" class="btn-terkini rounded-5"
                                        style="width:70px; height:100%"><i class="fa-solid fa-chart-simple"></i></a>
                                    <a type="submit" href="#" onclick="show('terpilih')"
                                        class="btn-terpilih rounded-5" style="width:70px; height:100%"><i
                                            class="fa-regular fa-hand-pointer"></i></a>
                                </div>
                            </div>
                            <hr>
                            <div class="overflow-auto" style="max-width: 100%; max-height: 575px;">
                                <div class="col-lg-12" id="menu">
                                    @foreach ($populer as $p)
                                        <div class="trand-right-single d-flex">
                                            <div class="trand-right-img">
                                                <img src="{{ asset('blog/' . $p->foto) }}" alt="" width="100px"
                                                    height="100px">
                                            </div>
                                            <div class="trand-right-cap">
                                                <span class="color1">POPULER</span>
                                                <h4><a href="{{ route('blogs.detail', $p->id) }}">{{ $p->judul }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    @endforeach
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
                <!-- End Of Right Content -->

    </section>
    </div>
    </div>
    </div>
    </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function show(type) {
            $.get('/blogs/type/' + type, function(data) {
                $('#menu').html(data);
            })
        }
    </script>
@endsection
