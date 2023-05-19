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
                                            <form action="{{ route('transaksi.destroy', $c->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn text-danger me-2"
                                                    data-mdb-toggle="tooltip" title="Remove item">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <button class="btn btn-outline-primary me-2" onclick="decreaseQuantity(this)">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <div class="form-outline">
                                                <input id="quantity_{{ $c->id }}" min="1" name="quantity"
                                                    value="{{ $c->quantity }}" type="number" class="form-control"
                                                    onchange="updateQuantity(this)" readonly />
                                            </div>

                                            <button class="btn btn-outline-primary ms-2" onclick="increaseQuantity(this)">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-start text-md-center">
                                        <strong> harga / produk Rp. {{ number_format($c->produk->harga) }} </strong>
                                    </p>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                        <span id="total-price_{{ $c->id }}">Rp.
                                            {{ number_format($c->quantity * $c->produk->harga) }}</span>
                                    </li>
                                @endforeach
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total : <span id="total-transaksi">Rp. 0</span></strong>
                                    </div>
                                    <span><strong></strong></span>
                                </li>
                            </ul>

                            <form action="{{ route('tranaski.store',) }}" method="POST">
                                @csrf
                                <button type="submit" id="checkout" class="btn btn-success btn-lg btn-block"
                                    style="display: ">
                                    Go to checkout
                                </button>
                            </form>
                            <hr>
                            <form action="{{ route('transaksi.cart') }}" method="get">
                                @csrf
                                <button type="submit" id="checkout" class="btn btn-primary btn-lg btn-block"
                                    style="display: ">
                                    check
                                </button>
                            </form>
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
        function updateTotalTransaksi() {
            var totalTransaksi = 0;
            @foreach ($cart as $c)
                var quantity = parseInt('{{ $c->quantity }}');
                var harga = parseInt('{{ $c->produk->harga }}');
                totalTransaksi += quantity * harga;
            @endforeach

            var formattedTotal = totalTransaksi.toLocaleString('id-ID');
            $('#total-transaksi').text('Rp. ' + formattedTotal);
        }
        // function updateTotalTransaksi() {
        //     $.ajax({
        //         url: '{{ route('api.transaksi.total') }}',
        //         method: 'GET',
        //         success: function(response) {
        //             if (response.success) {
        //                 var totalTransaksi = response.totalTransaksi;
        //                 var formattedTotal = formatCurrency(totalTransaksi);
        //                 $('#total-transaksi').text('Rp. ' + formattedTotal);
        //             }
        //         }
        //     });
        // }

        // function formatCurrency(amount) {
        //     return amount.toLocaleString('id-ID', {
        //         style: 'currency',
        //         currency: 'IDR'
        //     });
        // }

        // Panggil fungsi updateTotalTransaksi saat halaman dimuat
        updateTotalTransaksi();

        function updateQuantity(input) {
            var cartId = $(input).attr('id').split('_')[1];
            var newQuantity = $(input).val();

            // Kirim permintaan Ajax untuk memperbarui kuantitas
            $.ajax({
                url: '{{ route('api.cart.update') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    cart_id: cartId,
                    quantity: newQuantity
                },
                success: function(response) {
                    // if (response.success) {
                    //     $('#total-price_' + cartId).text('Rp. ' + response.item_total_price);
                    // }
                    var formattedPrice = response.item_total_price.toLocaleString('id-ID');

                    $('#total-price_' + cartId).text("Rp. " + formattedPrice);
                }
            });
        }

        function increaseQuantity(button) {
            var input = $(button).siblings('.form-outline').find('input');
            var quantity = parseInt($(input).val());
            $(input).val(quantity + 1).trigger('change');
        }

        function decreaseQuantity(button) {
            var input = $(button).siblings('.form-outline').find('input');
            var quantity = parseInt($(input).val());
            if (quantity > 1) {
                $(input).val(quantity - 1).trigger('change');
            }
        }
    </script>
@endsection
