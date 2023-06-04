@extends('layout-landing2.body')
@section('title', 'Portofolio')
@section('content')


    <!-- Hero section -->
    <section id="hero-portofolio" class="hero-portofolio d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 align-items-center" data-aos="zoom-in" data-aos-delay="200">
                    {{-- <img src="{{ asset('illustration/group-390.png') }}" class="img-fluid" alt=""> --}}
                    <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_d9wImAFTrS.json" data-aos="fade-down" id="porto-animation" background="transparent" speed="1" style="width: 100%" loop  autoplay></lottie-player>
                </div>
                <div class="col-lg-7 d-flex flex-column justify-content-center pt-4 pt-lg-0" data-aos="fade-up"
                    data-aos-delay="200">
                    @foreach($ills as $i)
                    <h1>{{$i->text_head}}</h1>
                    <p>{{$i->text_body}}</p>
                    @endforeach
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->


    <!-- project grid -->
    <div class="container">
        <h1 class="text-center text-uppercase fw-bold mt-5">All of our projects</h1>
        <div class="d-flex flex-row text-center gap-2">
            <a href="{{ route('portfolio.index') }}" class="text-capitalize my-3 active btn yms-blue w-20 rounded-5">All</a>
            @foreach ($layanan as $l)
            <a href="{{ route('portfolio.showtype', $l->layanan) }}" class=" my-3 text-capitalize active btn yms-blue w-20 rounded-5">{{ $l->layanan }}</a>
            @endforeach
        </div>
        <div class="project">
            <div class="row justify-content-center justify-content-lg-start">
                @if($porto->isEmpty())
                <p class="h1 text-center text-capitalize">Belum Ada Portofolio {{$type}}</p>
                @else
                @foreach ($porto as $item)
                    <div class="col-lg-3 col-md-6 d-flex mt-4 mb-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card card-hover text-center" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('./portofolio/'. $item->cover) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{route('portfolio.show', $item->id)}}">{{$item->project}}</a></h5>
                                <h6 class="text-capitalize">{{$item->services->jenis_layanan->layanan}} : {{$item->services->judul}}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>


@endsection