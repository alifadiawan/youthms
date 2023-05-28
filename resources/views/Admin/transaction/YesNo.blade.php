@extends('layout.admin')
@section('content')
@section('judul', 'Transaction')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('transaksi.history') }}" class="btn my-3">
                <i class="fas fa-arrow-left"></i></a>

            <div class="card">
                <div class="card-header">
                    <h5>Do you want to accept it ?</h5>
                </div>
                <div class="card-body">
                    @foreach ($request_user as $r)
                        <div class="row">
                            <div class="col">
                                <h5 class="mb-0 me-auto">Pembeli</h5>
                            </div>
                            <div class="col text-right">
                                <h5 class="mb-0 me-auto font-weight-bold">{{ $r->nama_pemesan }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5 class="mb-0 me-auto">Permintaan Jangka waktu kredit</h5>
                            </div>
                            <div class="col text-right">
                                {{-- <h5 class="mb-0 me-auto font-weight-bold">1 Bulan</h5> --}}
                                <h5 class="mb-0 me-auto font-weight-bold">pending</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5 class="mb-0 me-auto">Notes / Catatan :</h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5 class="mb-0 me-auto text-muted">Saya ingin menciicl transaksi ini dalam seminggu 2x
                                    dalam sebulan</h5>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <a href="" class="btn btn-block btn-success">YES</a>
                            </div>
                            <div class="col">
                                <a href="" class="btn btn-block btn-secondary">No</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-0 me-auto">Status</h5>
                        </div>
                        <div class="col text-right">
                            <h5 class="mb-0 me-auto text-warning font-weight-bold">PENDING</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <ul class="list-group list-group-flush">
                        @foreach ($detail as $d)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0 pb-0">
                                    {{ $d->produk->nama_produk }}
                                    {{-- <span>Rp. {{ number_format($d->produk->harga * $d->quantity, 0, ',', '.') }}</span> --}}
                                    <span>Rp {{ number_format($d->produk->harga, 0, ',', '.') }}</span>
                                </li>
                            </ul>
                        @endforeach

                        @foreach ($transaksi as $t)
                            <ul class="list-group list-group-flush mt-5">
                                <hr>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <div>
                                        Total
                                    </div>
                                    <span>Rp. 211122</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <div>
                                        biaya admin
                                    </div>
                                    <span>Rp. 40000</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center px-0 mt-4 h4">
                                    <div>
                                        <strong>Grand Total</strong>
                                    </div>
                                    <span><strong>Rp.350000</strong></span>
                                </li>
                            </ul>
                        @endforeach
                    </ul>
                </div>
            </div>  

        </div>
    </div>
@endsection
