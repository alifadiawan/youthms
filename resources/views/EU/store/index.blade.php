@extends('layout-landing2.body')
@section('title', 'Store')
@section('content')

    <!-- hero section -->
    <div id="store" class="row" data-aos="fade-right" data-aos-duration="1000">
        <div id="thumbnail" class="text-start">
            <img src="{{ asset('illustration/store-illustration.png') }}" class="img-fluid" alt="">
            <div id="caption">
                <h3 class="text-white">aowkaokwa</h3>
                <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus fugit
                    pariatur, magnam aliquam et qui hic corporis odio neque nobis doloribus quidem delectus saepe commodi
                    illum minima blanditiis nostrum quod.</p>
            </div>
        </div>
    </div>


    <!-- tombol kategori jasa -->
    <div class="container mb-5">
        <div class="d-flex flex-row text-center gap-3">
            <a href="{{ route('store.index') }}" class="text-capitalize my-3 active">All</a>
            @foreach ($layanan as $l)
                {{-- //branch main 2 --}}
                <a href="{{ route('store.showtype', $l->layanan) }}" class=" my-3 text-capitalize">{{ $l->layanan }}</a>
            @endforeach
        </div>

        <div class="d-flex row mb-5 justify-content-start">
            <p class="h2 fw-bold">
                Paling Diminati
            </p>
            @foreach ($populer as $p)
                <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $p->services->judul }}</h4>
                            <p class="card-title text-secondary">{{ $p->nama_produk }}</p>
                            <h3 class="card-text">Rp{{ number_format($p->harga) }}</h3>
                            @guest
                                <a href="{{ route('authcheck') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                </a>
                            @endguest

                            @auth
                                @if (empty($member))
                                    <a href="{{ route('user.show', $user) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                    </a>
                                @else
                                    @if (auth()->user()->hasIncompleteProfile())
                                        <a type="submit" href="{{ route('user.show', auth()->user()->id) }}"
                                            class="btn btn-primary" disabled>
                                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                        </a>
                                    @elseif ($cart->contains('id', $p->id))
                                        <button type="submit" class="btn btn-danger" disabled>
                                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                        </button>
                                    @else
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            @foreach ($member as $m)
                                                <input type="hidden" name="member_id" value="{{ $m->id }}">
                                            @endforeach
                                            <input type="hidden" class="form-control" name="quantity" value="1">
                                            <input type="hidden" value="{{ $p->id }}" name="produk_id">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($layanan as $l)
                <p class="h2 fw-bold">{{ $l->layanan }}</p>
                @foreach ($l->services as $ls)
                    @foreach ($ls->produk as $p)
                        <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $ls->judul }}</h4>
                                    <p class="card-title text-secondary">{{ $p->nama_produk }}</p>
                                    <h3 class="card-text">Rp.{{ number_format($p->harga) }}</h3>
                                    @guest
                                        <a href="{{ route('authcheck') }}" class="btn btn-primary">
                                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                        </a>
                                    @endguest

                                    @auth
                                        @if (empty($member))
                                            <a href="{{ route('user.show', $user) }}" class="btn btn-primary">
                                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                            </a>
                                        @else
                                            @if (auth()->user()->hasIncompleteProfile())
                                                <a type="submit" href="{{ route('user.show', auth()->user()->id) }}"
                                                    class="btn btn-primary" disabled>
                                                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                                </a>
                                            @elseif ($cart->contains('id', $p->id))
                                                <button type="submit" class="btn btn-danger" disabled>
                                                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                                </button>
                                            @else
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    @foreach ($member as $m)
                                                        <input type="hidden" name="member_id" value="{{ $m->id }}">
                                                    @endforeach
                                                    <input type="hidden" class="form-control" name="quantity" value="1">
                                                    <input type="hidden" value="{{ $p->id }}" name="produk_id">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            @endforeach
        </div>
    </div>

    <script>
        window.onload = function() {
            let scrollPosition = sessionStorage.getItem('scrollPosition');
            if (scrollPosition) {
                window.scrollTo(0, scrollPosition);
                sessionStorage.removeItem('scrollPosition');
            }
        };

        window.onbeforeunload = function() {
            sessionStorage.setItem('scrollPosition', window.pageYOffset);
        };
    </script>

@endsection
