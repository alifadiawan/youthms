@extends('layout-landing2.body')
@section('title', '| Lunas')
@section('content')


    {{-- lunas --}}
    <div id="container" class="container mt-5">
        <a href="{{ route('transaksi.history') }}" class="btn btn-lg mb-3">
            <i class="fas fa-arrow-left"></i>
        </a>

        <div class="card my-3">
            <div class="card-body">



                <!-- Lunas -->
                @foreach ($trx as $t)
                    {{-- @if ($EU_lunas->contains($t->id)) --}}
                    @if (in_array($t->id, $EU_lunas))
                        <!-- Date -->
                        <div class="row mb-5">
                            <div class="col">
                                {{-- Transaction Created {{ $t->created_at }} --}}
                                Transaction Created <p class="text-muted">12 Mei 2023</p>
                            </div>
                            <div class="col text-end">
                                alif_adiawan
                            </div>
                        </div>


                        <!-- Detail -->
                        <div class="row">
                            <div class="col fw-bold">
                                Status
                            </div>
                            <div class="col text-end text-success fw-bold">
                                LUNAS
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-muted">
                                Tanggal Bayar
                            </div>
                            <div class="col text-end">
                                9 Mei 2023
                            </div>
                        </div>
                    @endif
                @endforeach



                <!-- Kredit -->
                @foreach ($trx as $t)
                    @if (in_array($t->id, $EU_kredit))
                        <a href="{{ route('transaksi.pembayaran',$t->id) }}">
                            <div class="alert alert-warning" role="alert">
                                Klik disini untuk bayar
                            </div>

                        </a>
                        <!-- Date -->
                        <div class="row mb-5">

                            <div class="col">
                                {{-- {{ $t->created_at }} --}}
                                Transaction Created <p class="text-muted">12 Mei 2023</p>
                            </div>
                            <div class="col text-end">
                                alif_adiawan
                            </div>
                        </div>


                        <!-- Detail -->
                        <div class="row">
                            <div class="col fw-bold">
                                Status
                            </div>
                            <div class="col text-end text-warning fw-bold">
                                KREDIT
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col text-muted">
                                Total yang harus dibayar
                            </div>
                            <div class="col text-end">
                                Rp 1.645.020
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-muted">
                                Sisa yang harus dibayar
                            </div>
                            <div class="col text-end">
                                Rp.1.000.000
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-muted">
                                Bayar kredit sebelum
                            </div>
                            <div class="col text-end">
                                9 Mei 2023
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-muted">
                                Tanggal jatuh tempo
                            </div>
                            <div class="col text-end">
                                20 Mei 2023
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-muted">
                                Sisa hari
                            </div>
                            <div class="col text-end text-danger">
                                10 Hari
                            </div>
                        </div>
                    @endif


                    <!-- belum bayar -->
                    @foreach ($trx as $t)
                        {{-- VIEW UTANG --}}
                        @if (in_array($t->id, $EU_utang))
                            <a href="{{ route('transaksi.pembayaran',$t->id) }}">
                                <div class="alert alert-danger" role="alert">
                                    Bayar sebelum .... Klik disini untuk bayar
                                </div>
                            </a>
                            <div class="row mb-5">
                                <div class="col">
                                    {{-- Transaction Created {{ $t->created_at }} --}}
                                    Transaction Created <p class="text-muted">12 Mei 2023</p>
                                </div>
                                <div class="col text-end">
                                    alif_adiawan
                                </div>
                            </div>


                            <!-- Detail -->
                            <div class="row">
                                <div class="col fw-bold">
                                    Status
                                </div>
                                <div class="col text-end text-danger fw-bold">
                                    BELUM BAYAR
                                </div>
                            </div>
                            <hr>
                            {{-- <div class="row">
                                <div class="col text-muted">
                                    Segera bayar sebelum
                                </div>
                                <div class="col text-end">
                                    countdown / timer ?
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-muted">
                                    Tanggal Bayar
                                </div>
                                <div class="col text-end">
                                    -
                                </div>
                            </div> --}}
                        @endif
                    @endforeach

                    <!-- pending -->
                    @foreach ($trx as $t)
                        {{-- VIEW PENDING --}}
                        @if (in_array($t->id, $EU_pending))
                            <a href="{{ route('transaksi.pembayaran',$t->id) }}">
                                <div class="alert alert-danger" role="alert">
                                    Bayar sebelum .... Klik disini untuk bayar
                                </div>
                            </a>
                            <div class="row mb-5">
                                <div class="col">
                                    {{-- Transaction Created {{ $t->created_at }} --}}
                                    Transaction Created <p class="text-muted">12 Mei 2023</p>
                                </div>
                                <div class="col text-end">
                                    alif_adiawan
                                </div>
                            </div>


                            <!-- Detail -->
                            <div class="row">
                                <div class="col fw-bold">
                                    Status
                                </div>
                                <div class="col text-end text-info fw-bold">
                                    PENDING
                                </div>
                            </div>
                            <hr>
                            {{-- <div class="row">
                                <div class="col text-muted">
                                    Segera bayar sebelum
                                </div>
                                <div class="col text-end">
                                    countdown / timer ?
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-muted">
                                    Tanggal Bayar
                                </div>
                                <div class="col text-end">
                                    -
                                </div>
                            </div> --}}
                        @endif
                    @endforeach

                    <!-- declined -->
                    @foreach ($trx as $t)
                        {{-- VIEW DECLINED --}}
                        @if (in_array($t->id, $EU_declined))
                            {{-- <a href="{{ route('transaksi.pembayaran',$t->id) }}">
                                <div class="alert alert-danger" role="alert">
                                    Bayar sebelum .... Klik disini untuk bayar
                                </div>
                            </a> --}}
                            <div class="row mb-5">
                                <div class="col">
                                    {{-- Transaction Created {{ $t->created_at }} --}}
                                    Transaction Created <p class="text-muted">12 Mei 2023</p>
                                </div>
                                <div class="col text-end">
                                    alif_adiawan
                                </div>
                            </div>


                            <!-- Detail -->
                            <div class="row">
                                <div class="col fw-bold">
                                    Status
                                </div>
                                <div class="col text-end text-dark fw-bold">
                                    DECLINED
                                </div>
                            </div>
                            <hr>
                            {{-- <div class="row">
                                <div class="col text-muted">
                                    Segera bayar sebelum
                                </div>
                                <div class="col text-end">
                                    countdown / timer ?
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-muted">
                                    Tanggal Bayar
                                </div>
                                <div class="col text-end">
                                    -
                                </div>
                            </div> --}}
                        @endif
                    @endforeach

                    <!-- list items -->
                    <table class="table table-bordered table-responsive mt-5">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->produk->nama_produk }}</td>
                                    <td><span id="total-price_">
                                            {{ number_format($d->quantity) }}</span></td>
                                    <td> <span id="total-price_">Rp
                                            {{ number_format($d->quantity * $d->produk->harga, 0, ',', '.') }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tbody>
                            @foreach ($trx as $t)
                                <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                <td class=" fw-bold"><span id="total-transaksi-b">Rp
                                        {{ number_format($t->total, 0, ',', '.') }}</span></td>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>

        <div class="card my-3">
            <div class="card-body">
                <table class="table table-borderless tab"></table>
            </div>
        </div>

    </div>

@endsection
