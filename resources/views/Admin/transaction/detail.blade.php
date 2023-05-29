@extends('layout.admin')
@section('content')
@section('judul', 'Transaction')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('transaksi.history') }}" class="btn my-3">
                <i class="fas fa-arrow-left"></i></a>
            <div class="card mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-0 me-auto">Status</h5>
                        </div>
                        <div class="col text-right">
                            @if (in_array($detail[0]->transaksi_id, $adm_utang))
                                <h5 class="mb-0 me-auto text-danger font-weight-bold">belum bayar</h5>
                            @elseif(in_array($detail[0]->transaksi_id, $adm_kredit))
                                <h5 class="mb-0 me-auto text-warning font-weight-bold">KREDIT</h5>
                                <p class="h6 text-danger">Jatuh Tempo : 1 Hari Lagi</p>
                            @elseif(in_array($detail[0]->transaksi_id, $adm_pending))
                                <h5 class="mb-0 me-auto text-info font-weight-bold">PENDING</h5>
                            @elseif(in_array($detail[0]->transaksi_id, $adm_declined))
                                <h5 class="mb-0 me-auto text-dark font-weight-bold">DECLINED</h5>
                            @else
                                <h5 class="mb-0 me-auto text-success font-weight-bold">LUNAS</h5>
                            @endif
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
                                    <span>Rp. {{ number_format($d->produk->harga * $d->quantity, 0, ',', '.') }}</span>
                                </li>
                            </ul>
                        @endforeach

                        <ul class="list-group list-group-flush mt-5">
                            <hr>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    Total
                                </div>
                                <span>Rp. {{ number_format($total, 0, ',', '.') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    biaya admin
                                </div>
                                <span>Rp. {{ number_format($admin, 0, ',', '.') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 mt-4 h4">
                                <div>
                                    <strong>Grand Total</strong>
                                </div>
                                <span><strong>Rp. {{ number_format($grandtotal, 0, ',', '.') }}</strong></span>
                            </li>
                        </ul>
                    </ul>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4>Metode Pembayaran</h4>
                </div>
                {{-- <div class="card-body">
                    <a href="" class="btn card-hover">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"> <i class="fa-solid fa-building-columns"></i> Virtual Account
                                </h5>
                            </div>
                        </div>
                    </a>
                    <a class="btn card-hover" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"> <i class="fa-solid fa-money-bill-transfer"></i> Transfer Bank
                                </h5>
                            </div>
                        </div>
                    </a>
                    <a class="btn card-hover" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"> <i class="fa-solid fa-credit-card"></i> kredit </h5>
                            </div>
                        </div>
                    </a>
                    <a class="btn card-hover" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"> <i class="fa-solid fa-money-bill"></i> cash</h5>
                            </div>
                        </div>
                    </a>
                </div> --}}
            </div>
        </div>

    </div>
</div>
@endsection
