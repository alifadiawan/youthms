@extends('layout-landing2.body')
@section('content')
<section class="trending" id="trending">
    <div class="container" data-aos="fade-up">
        <div class="trending-area fix">
            <div class="trending-main">
                <div class="col-lg-12 align-items-center border border-secondary p-3" style="margin-top: 25px; border-radius:25px">
                    <h3 class="fw-bold text-capitalize">{{$type}}</h3>
                    @foreach($blog as $b)
                    <hr>
                        <div class="row">
                            <div class="col">
                                <img src="{{ asset('blog/'.$b->foto) }}" alt="" style="max-width: 11rem;">
                            </div>
                            <div class="col">
                                <span class="color2 text-uppercase">{{$type}}</span><br>
                                <p class="fw-bold"><a href="#"></a>{{$b->judul}}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endsection