@extends('layout-landing2.body')
@section('title', '| Lunas')
@section('content')


    <div id="container" class="container mt-5">
        <a href="{{ url()->previous() }}" class="btn btn-lg mb-3">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="row">
            {{-- <div class="card"> --}}
            <div class="card mx-3">
                <div class="card-body">
                    <div class="details">
                        @foreach ($c_lunas as $c)
                            <div class="row">
                                <div class="col-lg-2 col-sm-3 fw-bold">
                                    <p>Tanggal Pembelian </p>
                                </div>
                                <div class="col">
                                    <p>12 Mei 2023</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-sm-3 fw-bold">
                                    <p>Pembeli </p>
                                </div>
                                <div class="col">
                                    <p>alif_adiawan</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-sm-3 fw-bold">
                                    <p>Tanggal Bayar</p>
                                </div>
                                <div class="col">
                                    <p>12 Mei 2023</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-sm-3 fw-bold">
                                    <p>Status</p>
                                </div>
                                <div class="col">
                                    <p class="text-success">LUNAS</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <ul class="list-group list-group-flush mt-3">
                        {{-- @foreach ($detail as $d) --}}
                        <div class="list-barang my-5">
                            <h5 class="fw-bold text-center">List Barang</h5>
                            <table class="table table-borderless table-hover table-responsive text-center">
                                <thead>
                                    <tr>
                                        <th class="text-start">Nama Barang</th>
                                        <th class="text-end">Qty</th>
                                        <th class="text-end">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-start">Laravel</td>
                                        <td class="text-end">2</td>
                                        <td class="text-end">Rp.500.000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Laravel</td>
                                        <td class="text-end">2</td>
                                        <td class="text-end">Rp.500.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- <li class="list-group-item d-flex justify-content-between align-items-center px-0 text-capitalize">
                            Laravel
                            <span id="total-price_">Rp.
                                Rp.500.000</span>
                        </li> --}}
                        {{-- @endforeach --}}
                        <li class="list-group-item d-flex justify-content-end align-items-center border-0 px-0 mb-3">
                            <div>
                                <strong> <span id="total-transaksi-b">Total :
                                        Rp.500.000</span></strong>
                                <strong><span id="total-transaksi" style="display: none;">Total : Rp.
                                    </span></strong>
                            </div>
                            <span><strong></strong></span>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            {{-- <div class="card mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-0 me-auto">Summary</h5>
                        </div>

                        <!-- countdown -->
                        <div class="col text-end text-danger">
                            <h5 id="time"></h5>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        @foreach ($detail as $d)
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    {{ $d->produk->nama_produk }}
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
                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                            <div>
                                <strong>Grand Total</strong>
                            </div>
                            <span><strong>Rp. {{ number_format($grandtotal, 0, ',', '.') }}</strong></span>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
    </div>


@endsection
