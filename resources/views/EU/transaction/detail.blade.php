@extends('layout-landing2.body')
@section('title', '| Lunas')
@section('content')


    {{-- lunas --}}
    <div id="container" class="container mt-5">
        <a href="{{ route('transaksi.history') }}" class="btn btn-lg mb-3">
            <i class="fas fa-arrow-left"></i>
        </a>


        <!-- Lunas -->
        @foreach ($trx as $t)
            {{-- @if ($EU_lunas->contains($t->id)) --}}
            @if (in_array($t->id, $EU_lunas))
                <div class="card shadow rounded-3">
                    @foreach ($trx as $t)
                        <div class="row my-3 mx-3 mx-lg-4">
                            <div class="col-6 col-lg text-start">
                                <strong>INVOCE</strong>
                            </div>
                            <div class="col-6 col-lg text-end text-lg-end">
                                <p class="text-muted">{{ $t->unique_code }}</p>
                            </div>
                        </div>
                    @endforeach

                    <div class="konten my-lg-0 mx-5">
                        <div class="row">
                            <div class="card-body">
                                <!-- Lunas -->
                                @foreach ($trx as $t)
                                    @if (in_array($t->id, $EU_lunas))
                                        <!-- Date -->
                                        <div class="row">
                                            <div class="row">
                                                Invoice To
                                                <div class="row text-muted">
                                                    {{ $t->member->user->email }}
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg my-5 my-lg-0 text-lg-end text-start">
                                                <div class="row">
                                                    <div class="col-6 col-lg col-md-6 my-0 my-lg-0 text-start text-lg-end">
                                                        Status</div>
                                                    <div class="col text-end text-lg text-success">
                                                        LUNAS
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Transaksi Dibuat
                                                    </div>
                                                    <div class="col text-end text-lg">
                                                        {{ date('d F Y', strtotime($t->tanggal_transaksi)) }}
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Tanggal Mulai
                                                    </div>
                                                    <div class="col text-end text-lg">
                                                        31 Mei 2023
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="konten mt-3 mx-3">
                                <table class="table table-bordered">
                                    <thead class="bg-light text-dark">
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
                                                        {{ number_format($d->quantity * $d->produk->harga, 0, ',', '.') }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="3" class="text-end">Total</td>
                                            <td colspan="1" class="text-end fw-bold">Rp
                                                {{ number_format($total, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="3" class="text-end">Biaya admin</td>
                                            <td colspan="1" class="text-end fw-bold">Rp
                                                {{ number_format($admin, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        @foreach ($trx as $t)
                                            <tr>
                                                <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                                <td class=" fw-bold text-end"><span id="total-transaksi-b">Rp
                                                        {{ number_format($t->total, 0, ',', '.') }}</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        <!-- belum bayar -->
        @foreach ($trx as $t)
            {{-- VIEW UTANG --}}
            @if (in_array($t->id, $EU_utang))
                <a href="{{ route('transaksi.pembayaran', $t->id) }}">
                    <div class="alert alert-danger" role="alert">
                        Bayar sebelum .... Klik disini untuk bayar
                    </div>
                </a>
                <div class="card shadow rounded-3">
                    <div class="row my-3 mx-3 mx-lg-4">
                        <div class="col-6 col-lg text-start">
                            <strong>INVOCE</strong>
                        </div>
                        <div class="col-6 col-lg text-end text-lg-end">
                            <p class="text-muted">{{ $t->unique_code }}</p>
                        </div>
                    </div>

                    <div class="konten my-lg-0 mx-5">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    Invoice To
                                </div>
                                <div class="row text-muted">
                                    {{ $t->member->user->email }}
                                </div>
                            </div>
                            <div class="col-12 col-lg my-5 my-lg-0 text-lg-end text-start">
                                <div class="row">
                                    <div class="col-6 col-lg col-md-6 my-0 my-lg-0 text-start text-lg-end">Status</div>
                                    <div class="col text-end text-lg text-danger">
                                        BELUM BAYAR
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Transaksi Dibuat</div>
                                    <div class="col text-end text-lg">
                                        {{ date('d F Y', strtotime($t->tanggal_transaksi)) }}
                                    </div>
                                </div>
                                {{-- <div class="row">
                                <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Tanggal Mulai</div>
                                <div class="col text-end text-lg">
                                    31 Mei 2023
                                </div>
                            </div> --}}
                                <div class="row">
                                    <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Jatuh Tempo</div>
                                    <div class="col text-end text-lg text-danger">
                                        {{-- 10 Hari lagi --}}
                                        ongoing fiture
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="konten mt-3 mx-3">
                        <table class="table table-bordered">
                            <thead class="bg-light text-dark">
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
                                                {{ number_format($d->quantity * $d->produk->harga, 0, ',', '.') }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-end">Total</td>
                                    <td colspan="1" class="text-end fw-bold">Rp
                                        {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-end">Biaya admin</td>
                                    <td colspan="1" class="text-end fw-bold">Rp
                                        {{ number_format($admin, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                @foreach ($trx as $t)
                                    <tr>
                                        <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                        <td class=" fw-bold text-end"><span id="total-transaksi-b">Rp
                                                {{ number_format($t->total, 0, ',', '.') }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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

        <!-- Kredit -->
        @foreach ($trx as $t)
            @if (in_array($t->id, $EU_kredit))
                <div class="card shadow rounded-3">
                    <div class="row my-3 mx-3 mx-lg-4">
                        <div class="col-6 col-lg text-start">
                            <strong>INVOCE</strong>
                        </div>
                        <div class="col-6 col-lg text-end text-lg-end">
                            <p class="text-muted">{{ $t->unique_code }}</p>
                        </div>
                    </div>

                    <div class="konten my-lg-0 mx-5">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    Invoice To
                                </div>
                                <div class="row text-muted">
                                    {{ $t->member->user->email }}
                                </div>
                            </div>
                            @foreach ($requser as $r)
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
                                            {{ date('d F Y', strtotime($t->tanggal_transaksi)) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Tanggal Mulai</div>
                                        <div class="col text-end text-lg">
                                            {{date('d F Y', strtotime( $r->tanggal_mulai)) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Tanggal Jatuh tempo</div>
                                        <div class="col text-end text-lg">
                                            {{ date('d F Y', strtotime($r->jatuh_tempo)) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Jatuh Tempo</div>
                                        <div class="col text-end text-lg text-danger">
                                            {{ $selisih }} Hari lagi
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="konten mt-3 mx-3">
                    <table class="table table-bordered">
                        <thead class="bg-light text-dark">
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
                                            {{ number_format($d->quantity * $d->produk->harga, 0, ',', '.') }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-end">Total</td>
                                <td colspan="1" class="text-end fw-bold">Rp
                                    {{ number_format($total, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-end">Biaya admin</td>
                                <td colspan="1" class="text-end fw-bold">Rp
                                    {{ number_format($admin, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                        <tbody>
                            @foreach ($trx as $t)
                                <tr>
                                    <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                    <td class=" fw-bold text-end"><span id="total-transaksi-b">Rp
                                            {{ number_format($t->total, 0, ',', '.') }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- </div> --}}
            @endif
        @endforeach


        <!-- pending -->
        @foreach ($trx as $t)
            {{-- VIEW PENDING --}}
            @if (in_array($t->id, $EU_pending))
                <a href="{{ route('transaksi.pembayaran', $t->id) }}">
                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-message"></i> Hubungi Admin
                    </div>
                </a>
                <div class="card shadow rounded-3">
                    <div class="row my-3 mx-3 mx-lg-4">
                        <div class="col-6 col-lg text-start">
                            <strong>INVOCE</strong>
                        </div>
                        <div class="col-6 col-lg text-end text-lg-end">
                            <p class="text-muted">{{ $t->unique_code }}</p>
                        </div>
                    </div>

                    <div class="konten my-lg-0 mx-5">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    Invoice To
                                </div>
                                <div class="row text-muted">
                                    {{ $t->member->user->email }}
                                </div>
                            </div>
                            <div class="col-12 col-lg my-5 my-lg-0 text-lg-end text-start">
                                <div class="row">
                                    <div class="col-6 col-lg col-md-6 my-0 my-lg-0 text-start text-lg-end">Status</div>
                                    <div class="col text-end text-lg text-info">
                                        PENDING
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Transaksi Dibuat</div>
                                    <div class="col text-end text-lg">
                                        {{ date('d F Y', strtotime($t->tanggal_transaksi)) }}
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Tanggal Mulai</div>
                                    <div class="col text-end text-lg">
                                        31 Mei 2023
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Jatuh Tempo</div>
                                    <div class="col text-end text-lg text-danger">
                                        10 Hari lagi
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="konten mt-3 mx-3">
                        <table class="table table-bordered">
                            <thead class="bg-light text-dark">
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
                                                {{ number_format($d->quantity * $d->produk->harga, 0, ',', '.') }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-end">Total</td>
                                    <td colspan="1" class="text-end fw-bold">Rp
                                        {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-end">Biaya admin</td>
                                    <td colspan="1" class="text-end fw-bold">Rp
                                        {{ number_format($admin, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                @foreach ($trx as $t)
                                    <tr>
                                        <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                        <td class=" fw-bold text-end"><span id="total-transaksi-b">Rp
                                                {{ number_format($t->total, 0, ',', '.') }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                <div class="card shadow rounded-3">
                    <div class="row my-3 mx-3 mx-lg-4">
                        <div class="col-6 col-lg text-start">
                            <strong>INVOCE</strong>
                        </div>
                        <div class="col-6 col-lg text-end text-lg-end">
                            <p class="text-muted">{{ $t->unique_code }}</p>
                        </div>
                    </div>

                    <div class="konten my-lg-0 mx-5">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    Invoice To
                                </div>
                                <div class="row text-muted"> {{ $t->member->user->email }}

                                </div>
                            </div>
                            @foreach ($requser as $r)
                                <div class="col-12 col-lg my-5 my-lg-0 text-lg-end text-start">
                                    <div class="row">
                                        <div class="col-6 col-lg col-md-6 my-0 my-lg-0 text-start text-lg-end">Status</div>
                                        <div class="col text-end text-lg text-dark">
                                            DECLINED
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Transaksi Dibuat</div>
                                        <div class="col text-end text-lg">
                                            {{ date('d F Y', strtotime($t->tanggal_transaksi)) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Tanggal Mulai</div>
                                        <div class="col text-end text-lg">
                                            {{ date('d F Y', strtotime($r->tanggal_mulai)) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Tanggal Mulai</div>
                                        <div class="col text-end text-lg">
                                            {{ date('d F Y', strtotime($r->jatuh_tempo)) }}
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                    <div class="col-6 col-lg col-md-6 my-0 my-lg-0">Jatuh Tempo</div>
                                    <div class="col text-end text-lg text-danger">
                                        10 Hari lagi
                                    </div>
                                </div> --}}
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="konten mt-3 mx-3">
                        <table class="table table-bordered">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <td>No</td>
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
                                                {{ number_format($d->quantity * $d->produk->harga, 0, ',', '.') }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-end">Total</td>
                                    <td colspan="1" class="text-end fw-bold">Rp
                                        {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-end">Biaya admin</td>
                                    <td colspan="1" class="text-end fw-bold">Rp
                                        {{ number_format($admin, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                @foreach ($trx as $t)
                                    <tr>
                                        <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                        <td class=" fw-bold text-end"><span id="total-transaksi-b">Rp
                                                {{ number_format($t->total, 0, ',', '.') }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        @endforeach {{-- <div class="row">
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

        <!-- list items -->
        {{-- <table class="table table-bordered table-responsive mt-5">
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
                    <tr>
                                <td class="text-end fw-bold" colspan="3"> Total</td>
                        <td class=" fw-bold"><span id="total-transaksi-b">Rp
                                {{ number_format($total, 0, ',', '.') }}</span></td>
                            </tr>
                            <tr>
                                <td class="text-end fw-bold" colspan="3">Biaya Admin</td>
                                <td class=" fw-bold"><span id="total-transaksi-b">Rp
                                        {{ number_format($admin, 0, ',', '.') }}</span></td>
                            </tr>
                            <tr>
                        <td class="text-end fw-bold" colspan="3">Grand Total</td>
                        <td class=" fw-bold"><span id="total-transaksi-b">Rp
                                {{ number_format($grandtotal, 0, ',', '.') }}</span></td>
                    </tr>
                </tbody>
            </table> --}}
    </div>
    {{-- </div> --}}

    <div class="card my-3">
        <div class="card-body">
            <table class="table table-borderless tab"></table>
        </div>
    </div>

    </div>

@endsection
