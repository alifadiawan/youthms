@extends('layout-landing2.body')
@section('title', '| Kredit')
@section('content')


    <div id="container" class="container mt-5">
        <a href="{{ url()->previous() }}" class="btn btn-lg">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="row">
            {{-- <div class="card"> --}}
            <div class="card mx-3 my-3">
                <div class="card-body">


                    <div class="details">
                        <div class="row">

                            <!-- Detail Transaksi -->
                            <div class="col border-end">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5 col-sm-3 fw-bold">
                                        <p>Tanggal Pembelian </p>
                                    </div>
                                    <div class="col">
                                        <p>12 Mei 2023</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-3 fw-bold">
                                            <p>Pembeli </p>
                                        </div>
                                        <div class="col">
                                            <p>alif_adiawan</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-3 fw-bold">
                                            <p>Tanggal Bayar</p>
                                        </div>
                                        <div class="col">
                                            <p>12 Mei 2023</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-3 fw-bold">
                                            <p>Status</p>
                                        </div>
                                        <div class="col">
                                            <p class="text-warning">Kredit</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Status Kredti -->
                            <div class="col">
                                <div class="row text-end">
                                    <div class="row">
                                        <div class="col fw-bold">
                                            <p>Tanggal Jatuh Tempo</p>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <p class="text-danger">15 Mei 2023</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col fw-bold">
                                            <p>Total yang harus dibayar</p>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <p>Rp. 500.000</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col fw-bold">
                                            <p>Sisa yang harus dibayar</p>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <p class="">Rp. 200.000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <ul class="list-group list-group-flush mt-3">
                        {{-- @foreach ($detail as $d) --}}
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 text-capitalize">
                            Laravel
                            <span id="total-price_">Rp.
                                Rp.500.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 text-capitalize">
                            Laravel
                            <span id="total-price_">Rp.
                                Rp.500.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 text-capitalize">
                            Laravel
                            <span id="total-price_">Rp.
                                Rp.500.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 text-capitalize">
                            Laravel
                            <span id="total-price_">Rp.
                                Rp.500.000</span>
                        </li>
                        {{-- @endforeach --}}
                        <li class="list-group-item d-flex justify-content-end align-items-center border-0 px-0 mb-3">
                            <div>
                                <strong> <span id="total-transaksi-b">Total : Rp.
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
        </div>
    </div>
    </div>


@endsection
