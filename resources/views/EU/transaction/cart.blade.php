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
                        @if ($cart->isEmpty())
                            <h2>hah kosong? astaghfirullah</h2>
                        @endif
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
                                            <button class="btn btn-outline-primary me-2" onclick="decreaseQuantity(this);">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <div class="form-outline">
                                                <input id="quantity_{{ $c->id }}" min="1" name="quantity"
                                                    value="{{ $c->quantity }}" type="number" class="form-control"
                                                    onchange="updateQuantity(this)" readonly />
                                            </div>

                                            <button class="btn btn-outline-primary ms-2" id="plus"
                                                onclick="increaseQuantity(this)">
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
                                            <strong> <span id="total-transaksi-b">Total : Rp.
                                                    {{ number_format($totalTransaksi) }}</span></strong>
                                            <strong><span id="total-transaksi" style="display: none;">Total : Rp.
                                                </span></strong>
                                        </div>
                                        <span><strong></strong></span>
                                    </li>
                                </ul>

                                <form action="{{ route('transaksi.create') }}" method="put">
                                    @csrf
                                    <button type="submit" id="checkout" class="btn btn-success btn-lg btn-block"
                                        style="display: ">
                                        <input type="hidden" name="member_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="total_bayar" value="0">
                                        <input type="hidden" name="total" id="total" value="{{ $totalTransaksi }}">
                                        Go to checkout
                                    </button>
                                </form>
                                <hr>
                                {{-- <form action="{{ route('cart.store') }}" method="get"> --}}
                                @csrf
                                <button type="submit" id="checkout" class="btn btn-primary btn-lg btn-block"
                                    style="display: ">
                                    check
                                </button>
                                {{-- </form> --}}
                                <a type="button" id="update" class="btn btn-danger btn-lg btn-block"
                                    style="display: none;">
                                    Update
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <script>
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
                    var formattedPrice = response.item_total_price.toLocaleString('id-ID');
                    formattedPrice = formattedPrice.replace(".", ",");
                    $('#total-price_' + cartId).text("Rp. " + formattedPrice);

                }
            });

            // harga total
            $.ajax({
                url: '{{ route('api.transaksi.total') }}',
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        var totalTransaksi = response.totalTransaksi;
                        var formattedTotal = formatCurrency(totalTransaksi);
                        $('#total').val(totalTransaksi);
                        $('#total-transaksi-b').hide();
                        $('#total-transaksi').text("Total : " + formattedTotal).show();
                    }
                }
            });

        }


        // format currency
        function formatCurrency(number) {
            var formatted = new Intl.NumberFormat('id-ID').format(number);
            formatted = formatted.replace(".", ",");
            return "Rp. " + formatted;
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

        function update() {
            document.getElementById("ubah").style.display = "inline";
            document.getElementById("hapus").style.display = "none";
        }
    </script>
@endsection
