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
                    <h1>Some of Our Amazing Projects</h1>
                    <p>Because actions speak louder than words, we help you build better software today for your better
                        tomorrow. When you choose Youthms.id to develop and service your software, you are joining hundreds
                        of satisfied clients and market leader</p>
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->


    <!-- project grid -->
    <div class="container">
        <h1 class="text-center text-uppercase fw-bold mt-5">All of our projects</h1>
        <div class="project">
            <div class="row justify-content-start">

                @foreach ($porto as $item)
                    <div class="col-lg-3 col-md-6 d-flex mt-4 mb-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card card-hover text-center" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('./portofolio/'. $item->cover) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{route('portfolio.show', $item->id)}}">{{$item->project}}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>


@endsection
