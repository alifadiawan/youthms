@extends('layout-landing2.body')
@section('content')
    {{-- <script>
        var qty = document.getelementbyid("quantity");
    </script>  --}}

    <section class="h-100 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Cart - 2 items</h5>
                        </div>
                        @foreach ($cart as $c)
                            <div class="card-body">
                                <!-- first item -->
                                <div class="row align-items-center">
                                    <div class="col-lg-9 col-md-6 mb-4 mb-lg-0">
                                        <p><strong>{{ $c->produk->nama_produk }}</strong></p>
                                    </div>

                                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                        <div class="d-flex mb-4" style="max-width: 300px">
                                            <button type="button" class="btn text-danger me-2" data-mdb-toggle="tooltip"
                                                title="Remove item">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <button class="btn btn-outline-primary me-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <div class="form-outline">
                                                <input id="form1" min="1" name="quantity" value="1"
                                                    type="number" class="form-control" onchange="update()" readonly />
                                            </div>

                                            <button class="btn btn-outline-primary ms-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <p class="text-start text-md-center">
                                            <strong>Rp. {{ number_format($c->produk->harga) }} </strong>
                                        </p>
                                    </div>
                                </div>

                                <hr class="my-4" />
                            </div>
                        @endforeach
                    </div>


                    <!-- metode pembayaran -->
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body">
                            <p><strong>Kami Menerima</strong></p>
                            <img class="me-2" width="45px" src="{{ asset('bca.png') }}" alt="bca" />
                            <img class="me-2" width="45px" src="{{ asset('bri.png') }}" alt="American Express" />
                            <img class="me-2" width="45px" src="{{ asset('mandiri.png') }}" alt="Mastercard" />
                            <img class="me-2" width="45px" src="{{ asset('bni.png') }}" alt="PayPal acceptance mark" />
                        </div>
                    </div>
                </div>


                <!-- Summary -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Summary</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @foreach ($cart as $c)
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        {{ $c->produk->nama_produk }}
                                        <span>{{ $c->produk->harga }}</span>
                                    </li>
                                @endforeach
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total </strong>
                                        <h2 value="{{ $cart->sum(function ($cart) {return $cart->produk->quantity * $cart->produk->harga;}) }}"></h2>

                                    </div>
                                    <span><strong></strong></span>
                                </li>
                            </ul>

                            <a type="button" href="/pembayaran" id="checkout" class="btn btn-success btn-lg btn-block"
                                style="display: ">
                                Go to checkout
                            </a>
                            <a type="button" id="update" class="btn btn-danger btn-lg btn-block" style="display: none;">
                                Update
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <script>
        function update() {
            document.getElementById("checkout").style.display = "none";
            document.getElementById("update").style.display = "inline";
        }
    </script>
@endsection
