@extends('layout-landing2.body')
@section('title', ' | Store')
@section('content')


    <!-- hero section -->
    <div id="store" class="row" data-aos="fade-right" data-aos-duration="1000">
        <div id="thumbnail" class="text-start">
            <img src="{{ asset('illustration/store-illustration.png') }}" class="img-fluid" alt="">
            <div id="caption">
                <h3 class="text-white text-wrap h1 fw-bold">Store</h3>
                <p id="text" class="text-white">YouthMS memiliki berbagai jenis Produk dari beberapa Jenis Layanan,
                    mulai dari Aplikasi, Marketing, Desain, dan Editing</p>
            </div>
        </div>
    </div>

    <div class="container mb-5 mt-3">
        <div class="d-flex flex-row gap-2 justify-content-lg-start justify-content-md-start justify-content-around flex-lg-row flex-wrap">
            <a href="{{ route('store.index') }}" class="text-capitalize btn btn yms-outline-blue rounded-5">All</a>
                @foreach ($layanan as $l)
                    @php
                        $link = str_replace(' ', '_', $l->layanan);
                    @endphp
                    <a href="{{ route('store.showtype', $link) }}" class="text-capitalize btn yms-outline-blue rounded-5">{{ $l->layanan }}</a>
                @endforeach
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-success" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif


    <!-- promo content -->
    <div class="container">
        <p class="h2 fw-bold text-capitalize mt-3">{{ $jenis_layanan->layanan }}</p>
        <div class="row rows-cols-lg-4 justify-content-center justify-content-md-start gx-3 my-3" data-aos="fade-down"
            data-aos-duration="1000">
            @foreach ($produk as $p)
                <div class="my-3 col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="card card-hover border-0 shadow">
                        <img src="{{ asset('produk/' . $p->foto) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title text-capitalize fw-bold">{{ $p->nama_produk }}</p>
                            <p class="card-title text-secondary">{{ $p->services->judul }}</p>
                            <p class="card-text">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                            @guest
                                <a href="{{ route('authcheck') }}" class="btn yms-blue w-100 rounded-5 px-2 px-lg-3">
                                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                </a>
                            @endguest

                            @auth
                                {{-- @if (empty($member))
                                    <a href="{{ route('user.show', $user) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                    </a>
                                @else --}}
                                @if (auth()->user()->hasIncompleteProfile())
                                    <a type="submit" href="{{ route('user.show', auth()->user()->id) }}"
                                        class="btn yms-blue w-100 rounded-5 px-0 px-lg-3" disabled>
                                        <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                    </a>
                                @elseif ($cart->contains('produk_id', $p->id))
                                    <div class="row rows-cols-2 gx-2 gy-2 bg-light">
                                        <div class="col-lg-9 col-12">
                                            <div class="d-flex gap-0">
                                                <button class="btn btn-sm yms-blue rounded-5 px-3 me-0 me-lg-2 me-md-2 me-sm-2"
                                                    onclick="decreaseQuantity(this)">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <div class="form-outline">
                                                    <input id="form_{{ $p->id }}" min="1" name="quantity"
                                                        onchange="updateQuantity(this)"
                                                        value="{{ $cart->where('produk_id', $p->id)->value('quantity') }}"
                                                        type="number" class="form-control" readonly />
                                                </div>

                                                <button class="btn btn-sm yms-blue rounded-5 px-3 ms-0 ms-lg-2 ms-md-2 ms-sm-2"
                                                    onclick="increaseQuantity(this)">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <!-- Quantity -->
                                        </div>
                                        <div class="col-lg-3 col-12">
                                            <form action="{{ route('cart.destroy', $p->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger me-2" style="width: 100%">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        @foreach ($member as $m)
                                            <input type="hidden" name="member_id" value="{{ $m->id }}">
                                        @endforeach
                                        <input type="hidden" class="form-control" name="quantity" value="1">
                                        <input type="hidden" value="{{ $p->id }}" name="produk_id">
                                        <div class="row px-0 px-lg-3">
                                            <button type="submit" class="btn yms-blue rounded-5">
                                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                            </button>
                                        </div>
                                    </form>
                                @endif
                            @endauth
                            {{-- @endif --}}



                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- @endforeach --}}
    {{-- <div class="my-3 col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-title text-secondary"><del>Rp.300.000</del></p>
                        <h3 class="card-text">Rp.150.000</h3>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-title text-secondary"><del>Rp.300.000</del></p>
                        <h3 class="card-text">Rp.150.000</h3>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div> --}}
    {{-- <p class="h2 fw-bold">PROMO</p>
        <div class="d-flex row mb-5 justify-content-center">
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-title text-secondary"><del>Rp.300.000</del></p>
                        <h3 class="card-text">Rp.150.000</h3>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-title text-secondary"><del>Rp.300.000</del></p>
                        <h3 class="card-text">Rp.150.000</h3>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-title text-secondary"><del>Rp.300.000</del></p>
                        <h3 class="card-text">Rp.150.000</h3>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- yg paling diminati -->
        <p class="h2 fw-bold">PALING DIMINATI</p>
        <div class="row">
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-text">Rp.150.000</p>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-text">Rp.150.000</p>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('illustration/bmw.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Powerpoint</h4>
                        <p class="card-text">Rp.150.000</p>
                        <a href="#" class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function decreaseQuantity(button) {
            var input = $(button).siblings('.form-outline').find('input');
            var quantity = parseInt(input.val());

            if (quantity > 1) {
                input.val(quantity - 1).trigger('change');
            }
        }

        function increaseQuantity(button) {
            var input = $(button).siblings('.form-outline').find('input');
            var quantity = parseInt(input.val());

            input.val(quantity + 1).trigger('change');
        }

        function updateQuantity(input) {
            var productId = $(input).attr('id').split('_')[1];
            var newQuantity = $(input).val();

            $.ajax({
                url: '{{ route('api.update.cart') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    quantity: newQuantity,
                    productId: productId
                },
                success: function(response) {
                    // Tindakan setelah berhasil memperbarui quantity
                    console.log('Quantity berhasil diperbarui');
                },
                error: function(xhr, status, error) {
                    // Tindakan jika terjadi kesalahan
                    console.log('Error updating quantity:', error);
                }
            });
        }

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
