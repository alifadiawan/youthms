@extends('layout-landing2.body')
@section('content')
    <div id="container" class="container">

        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <a href="{{ route('cart.index') }}" class="btn my-3">
                    <i class="fas fa-arrow-left"></i></a>
                <div class="card mb-4">
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
                </div>


                <!-- MEtode pembayaran -->
                <div class="card mb-4 mb-lg-0 p-0">
                    <div class="card-header">
                        <h5 class="mb-0 me-auto">Metode Pembayaran</h5>
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
                                                <a href="">
                                                    <img class="img-thumbnail border-0" src="{{ asset('mandiri.png') }}"
                                                        style="width: 15rem" alt="">
                                                </a>
                                                <a href="">
                                                    <img class="img-thumbnail border-0" src="{{ asset('bri.png') }}"
                                                        style="width: 15rem" alt="">
                                                </a>
                                                <a href="">
                                                    <img class="img-thumbnail border-0" src="{{ asset('btpn .png') }}"
                                                        style="width: 15rem" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Virtaul Account -->
                            <div class="accordion-item">
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
                            </div>

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
                                            <form action="{{ route('transaksi.kredit',$tid) }}">
                                                <div class="form">
                                                    <div class="form-gorup">
                                                        <label for="">Nama Pemesan / Instansi</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="form-gorup">
                                                        <label for="">Jangka Waktu</label>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="">tanggal mulai</label>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                            <div class="col">
                                                                <label for="">tanggal akhir</label>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-gorup">
                                                        <label for="">Deskipsi (opsional)</label>
                                                        {{-- <input type="" class="form-control"> --}}
                                                        <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group"><button class="btn btn-primary"
                                                            type="submit">kirim request</button>
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Cash -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        <i class="fa-solid fa-money-bill me-2"></i> Cash
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
                                        <div class="form">
                                            <div class="form-gorup">
                                                <label for="">Nama Pemesan / Instansi</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-gorup">
                                                <label for="">bayar </label>
                                                <input type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">Bayar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
