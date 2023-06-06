@extends('layout-landing2.body')
@section('content')
    <div id="container" class="container">

        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <a href="{{ route('cart.index') }}" class="btn my-3">
                    <i class="fas fa-arrow-left"></i></a>
                <div class="card mb-3 shadow rounded-3">
                    @foreach ($transaksi as $t)
                        <div class="row my-3 mx-3 mx-lg-4">
                            <div class="col-6 col-lg text-start">
                                <strong>INVOCE</strong>
                            </div>
                            <div class="col-6 col-lg text-end text-lg-end">
                                <p class="text-muted">{{ $t->unique_code }}</p>
                            </div>

                        </div>


                        {{-- </div> --}}

                        <div class="row mx-3 mx-lg-4">
                            <div class="col-12 col-lg-12 text-start text-lg-end">
                                <div class="row">
                                    <div class="col-6 col-lg-9 fw-bold">Tanggal Terbit</div>
                                    <div class="col-6 col-lg-3 text-muted">{{ $t->created_at }}</div>
                                </div>
                            </div>
                        </div>
                        {{-- </div> --}}
                    @endforeach
                    {{-- <div class="konten my-lg-0 mx-5">

                            
                        </div>
            
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        Invoice To
                                    </div>
                                    <div class="row text-muted">
                                        alifadiawan2005@gmail.com
                                    </div>
                                </div>
                                <div class="col-12 col-lg my-5 my-lg-0 text-lg-end text-start">
                                    <div class="row">
                                        <div class="col-6 col-lg col-md-6 my-0 my-lg-0 text-start text-lg-end">Status</div>
                                        <div class="col text-end text-lg text-warning">
                                            KREDIT
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Transaksi Dibuat</div>
                                        <div class="col text-end text-lg">
                                            29 Mei 2023
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Tanggal Mulai</div>
                                        <div class="col text-end text-lg">
                                            31 Mei 2023
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Jatuh Tempo</div>
                                        <div class="col text-end text-lg text-danger">
                                            10 Hari lagi
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    <div class="konten mt-3 mx-3">
                        <table class="table table-bordered">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $d)
                                    <tr>
                                        <td>{{ $d->produk->nama_produk }}</td>
                                        <td>x {{ $d->quantity }}</td>
                                        <td class="text-end">Rp.
                                            {{ number_format($d->produk->harga * $d->quantity, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-end">Total</td>
                                    <td colspan="1" class="text-end">Rp. {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-end">Biaya admin</td>
                                    <td colspan="1" class="text-end">Rp. {{ number_format($admin, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-end fw-bold">Grand Total</td>
                                    <td colspan="1" class="text-end fw-bold">Rp.
                                        {{ number_format($grandtotal, 0, ',', '.') }}</td>
                                </tr>
                                {{-- test --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card mb-4"> --}}

                {{-- <div class="card mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col">
                                <h5 class="mb-0 me-auto">Summary</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">

                            @foreach ($detail as $d)
                                <ul class="list-group list-group-flush text-capitalize">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        {{ $d->produk->nama_produk }}
                                        <span>x {{ $d->quantity }}</span>
                                        <span>Rp. {{ number_format($d->produk->harga * $d->quantity, 0, ',', '.') }}</span>
                                    </li>
                                </ul>
                            @endforeach
                            <hr>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    Total
                                </div>
                                <span>Rp. {{ number_format($total, 0, ',', '.') }}</span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    biaya admin
                                </div>
                                <span>Rp. {{ number_format($admin, 0, ',', '.') }}</span>
                            </li>
                            <hr>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 fs-4">
                                <div>
                                    <strong>Grand Total</strong>
                                </div>
                                <span><strong>Rp. {{ number_format($grandtotal, 0, ',', '.') }}</strong></span>
                            </li>
                        </ul>
                    </div>
                </div> --}}


                <!-- MEtode pembayaran -->
                <div class="card mb-4 mb-lg-0 p-0">
                    <div class="card-header">
                        <h5 class="mb-0 me-auto fw-bold" style="font-family: Poppins, sans-serif;">Metode Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        <i class="fa-solid fa-money-bill-transfer me-2"></i>Transfer Bank
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col">
                                                @foreach ($bank as $b)
                                                    <div class="row">
                                                        @foreach ($transaksi as $t)
                                                            <div class="row">
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col-lg-5">
                                                                                <a href="{{ route('pembayaran.cara', ['id' => $b->nama, 'transaksi_id' => $t->id]) }}"
                                                                                    style="justify-content: start"
                                                                                    class="btn">
                                                                                    <img class="img-thumbnail border-0"
                                                                                        src="{{ asset('illustration/' . $b->image) }}"
                                                                                        style="width: 80px" alt="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-7">
                                                                                <p style="text-align: end; margin-top:18px"
                                                                                    class="fw-bold">
                                                                                    {{ $b->nama }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Virtaul Account -->
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        <i class="fa-solid fa-building-columns me-2"></i> Virtual Account
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                        demonstrate the <code>.accordion-flush</code> class. This is the second item's
                                        accordion body. Let's imagine this being filled with some actual content.</div>
                                </div>
                            </div> --}}

                            <!-- Virtaul Account -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFour" aria-expanded="false"
                                        aria-controls="flush-collapseFour">
                                        <i class="fa-solid fa-credit-card me-2"></i> Kredit
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <form action="{{ route('transaksi.kredit') }}" method="post">
                                            @csrf
                                            <div class="form">
                                                <div class="form-gorup">
                                                    <label for="">Nama Pemesan / Instansi</label>
                                                    <input type="text" class="form-control" name="nama_pemesan"
                                                        value="{{ old('nama_pemesan') }}" required>
                                                </div>
                                                <div class="form-gorup">
                                                    <label for="">Jangka Waktu</label>
                                                    <div class="row">
                                                        <div class="col">
                                                            {{-- pending --}}
                                                            <label for="">tanggal mulai</label>
                                                            <input type="date" id="tanggal" name="tanggal_mulai"
                                                                class="form-control" value="{{ date('Y-m-d') }}"
                                                                min="{{ date('Y-m-d') }}" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="">tanggal akhir</label>
                                                            <input type="date" name="jatuh_tempo" class="form-control"
                                                                min="{{ date('Y-m-d') }}"
                                                                value="{{ old('jatuh_tempo') }}" required>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-gorup">
                                                    <label for="">Deskripsi (opsional)</label>
                                                    <textarea class="form-control" name="deskripsi" cols="30" rows="10">{{ old('deskripsi') }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="status" value="pending">
                                                    <input type="hidden" name="transaksi_id"
                                                        value="{{ $tid }}">
                                                    <button class="btn btn-primary" type="submit">kirim request</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- E-wallet -->
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        <i class="fa-solid fa-money-bill me-2"></i> E-Wallet
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                </div>
                            </div>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form action="">
                                        <div class="row">
                                            <div class="col">

                                                <a href="">
                                                    <img class="img-thumbnail border-0"
                                                        style="width: 15rem" alt="">
                                                        <button>ceritanya gambarnya gopay</button>
                                                </a>
                                                <a href="">
                                                    <img class="img-thumbnail border-0"
                                                        style="width: 15rem" alt="">
                                                        <button>ceritanya gambarnya shoppee</button>
                                                </a>
                                                <a href="">
                                                    <img class="img-thumbnail border-0"
                                                        style="width: 15rem" alt="">
                                                        <button>ceritanya gambarnya qris</button>
                                                </a>
                                                <div class="row">
                                                    <a href="/cara-wallet" style="justify-content: start" class="btn" type="button">
                                                        {{-- <img class="img-thumbnail border-0"
                                                            style="width: 15rem" alt=""> --}}

                            <!-- E-wallet -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        <i class="fa-solid fa-money-bill me-2"></i> E-Wallet
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                </div>
                            </div>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @foreach ($ewallet as $w)
                                                    <div class="row">
                                                        @foreach ($transaksi as $t)
                                                            <div class="row">
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col-lg-5">
                                                                                <a href="{{ route('pembayaran.cara', ['id' => $w->nama, 'transaksi_id' => $t->id]) }}"
                                                                                    style="justify-content: start"
                                                                                    class="btn">
                                                                                    <img class="img-thumbnail border-0"
                                                                                        src="{{ asset('illustration/' . $w->image) }}"
                                                                                        style="width: 80px"
                                                                                        alt="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-7">
                                                                                <p style="text-align: end; margin-top:18px"
                                                                                    class="fw-bold">
                                                                                    {{ $w->nama }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                                <hr>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--End E-wallet -->
                        </div>


                        {{-- <div class="row justify-content-center">
                            <div class="col">
                                <a href="" class="btn card-hover">
                                    <div class="card" style="width: 23rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"> <i class="fa-solid fa-building-columns"></i> Virtual Account
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a class="btn card-hover" data-bs-toggle="modal" data-bs-target="#transfer-bank">
                                    <div class="card" style="width: 23rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"> <i class="fa-solid fa-money-bill-transfer"></i> Transfer Bank</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a class="btn card-hover" data-bs-toggle="modal" data-bs-target="#kredit">
                                    <div class="card" style="width: 23rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"> <i class="fa-solid fa-credit-card"></i> kredit </h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a class="btn card-hover" data-bs-toggle="modal" data-bs-target="#cash">
                                    <div class="card" style="width: 23rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"> <i class="fa-solid fa-money-bill"></i> cash</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#jangkawaktu').change(function() {
                $("#hide-submenu").hide();
                $("#w_" + this.value).show();
            });
        });
    </script>
@endsection
