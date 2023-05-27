@extends('layout-landing2.body')
@section('title', '| Lunas')
@section('content')




    {{-- lunas --}}
    <div id="container" class="container mt-5">
        <a href="{{ url()->previous() }}" class="btn btn-lg mb-3">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="row">
            {{-- <div class="card"> --}}
            <div class="card mx-3">
                <div class="card-body">
                    <div class="details">
                        @foreach ($trx as $t)
                            {{-- lunas --}}
                            {{-- @if ($EU_lunas->contains($t->id)) --}}
                            @if (in_array($t->id, $EU_lunas))
                                <div class="row">
                                    <div class="col-lg-2 col-sm-3 fw-bold">
                                        <p>Tanggal Pembelian </p>
                                    </div>
                                    <div class="col">
                                        <p>{{ $t->created_at }}</p>
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
                                        @if ($t->updated_a == $t->created_at)
                                            <p> - </p>
                                        @else
                                            <p>{{ $t->updated_at }}</p>
                                        @endif
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
                            @endif
                        @endforeach
                    </div>



                    @foreach ($trx as $t)
                        {{-- @if ($EU_kredit->contains($t->id)) --}}
                        @if (in_array($t->id, $EU_kredit))
                            <div class="row">
                                <div class="col-lg-2 col-sm-3 fw-bold">
                                    <p>Tanggal Pembelian </p>
                                </div>
                                <div class="col">
                                    <p>{{ $t->created_at }}</p>
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
                                    @if ($t->updated_at == $t->created_at)
                                        <p> - </p>
                                    @else
                                        <p>{{ $t->updated_at }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-sm-3 fw-bold">
                                    <p>Status</p>
                                </div>
                                <div class="col">
                                    <p class="text-warning">KREDIT</p>
                                </div>
                            </div>
                            
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
                        @endif
                    @endforeach

                    @foreach ($trx as $t)
                        {{-- @if ($EU_lunas->contains($t->id)) --}}
                        @if (in_array($t->id, $EU_utang))
                            <div class="row">
                                <div class="col-lg-2 col-sm-3 fw-bold">
                                    <p>Tanggal Pembelian </p>
                                </div>
                                <div class="col">
                                    <p>{{ $t->created_at }}</p>
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
                                    @if ($t->updated_at == $t->created_at)
                                        <p> - </p>
                                    @else
                                        <p>{{ $t->updated_at }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-sm-3 fw-bold">
                                    <p>Status</p>
                                </div>
                                <div class="col">
                                    <p class="text-danger">BELUM BAYAR</p>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <ul class="list-group list-group-flush mt-3">
                        @foreach ($detail as $d)
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center px-0 text-capitalize">
                                {{ $d->produk->nama_produk }}
                                <span id="total-price_">x
                                    {{ number_format($d->quantity) }}</span>
                                <span id="total-price_">Rp
                                    {{ number_format($d->quantity * $d->produk->harga, 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-end align-items-center border-0 px-0 mb-3">
                            <div>
                                @foreach ($trx as $t)
                                    <strong> <span id="total-transaksi-b">Rp
                                            {{ number_format($t->total, 0, ',', '.') }}</span></strong>
                                @endforeach
                            </div>
                            <span><strong></strong></span>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
        </div>
    </div>

@endsection
