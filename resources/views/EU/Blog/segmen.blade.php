@extends('layout-landing2.body')
@section('content')
<section class="trending" id="trending">
    <div class="container" data-aos="fade-up">
        <div class="trending-area fix">
            <a href="{{ route('blogs.index') }}" class="text-capitalize my-3 btn yms-outline rounded-5 active">All</a>
            @foreach ($segmen as $s)
                @php
                    $link = strtolower(str_replace(' ', '_', $s->segmen));
                @endphp
                <a href="{{ route('blogs.showtype', $link) }}"
                    class=" my-3 text-capitalize btn yms-outline rounded-5 active">{{ $s->segmen }}</a>
            @endforeach
            <div class="trending-main">
                <div class="col-lg-12 align-items-center border border-secondary p-3" style="margin-top: 25px; border-radius:25px">
                    <h3 class="fw-bold text-capitalize">{{$type}}</h3>
                    @foreach($blog as $b)
                    <hr>
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('blog/'.$b->foto) }}" alt="" style="max-width: 11rem;">
                            </div>
                            <div class="col-10">
                                <span class="color2 text-uppercase">{{$type}}</span><br>
                                <a href="{{ route('blogs.detail', $b->id) }}" class="text-dark text-capitalize"><p class="fw-bold">{{$b->judul}}</p></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endsection