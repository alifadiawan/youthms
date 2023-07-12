@extends('layout-landing2.body')
@section('content')


    {{-- lunas --}}
    <div id="container" class="container my-5">
        <a href="{{ route('transaksi.index') }}" class="btn btn-lg mb-3">
            <i class="fas fa-arrow-left"></i>
        </a>

        <!-- Lunas -->
        @foreach ($trx as $t)
            {{-- @if ($EU_lunas->contains($t->id)) --}}
            @if (in_array($t->id, $EU_lunas))
                @section('title', '| Lunas')
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
                            <div class="card-body">
                                <!-- Lunas -->
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
                                                <div class="col-6 col-lg-10 col-md-6 my-0 my-lg-0 text-start text-lg-end">
                                                    Status</div>
                                                <div class="col text-end text-lg text-success">
                                                    LUNAS
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-lg-10 col-md-6 my-0 my-lg-0">Transaksi Dibuat
                                                </div>
                                                <div class="col text-end text-lg">
                                                    {{ date('d F Y', strtotime($t->tanggal_transaksi)) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
                                            <td colspan="1" class="">Rp
                                                {{ number_format($total, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="3" class="text-end">Biaya admin</td>
                                            <td colspan="1" class="">Rp
                                                {{ number_format($admin, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                    <tbody>

                                        <tr class="h5">
                                            <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                            <td class=" fw-bold"><span id="total-transaksi-b">Rp
                                                    {{ number_format($t->total, 0, ',', '.') }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif



            {{-- VIEW denied --}}
            {{-- @if (in_array($t->id, $EU_denied))
                @section('title', '| Pending')
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-message me-2"></i> Hubungi Admin
                </div>
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
                                    <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0 text-start text-lg-end">Status</div>
                                    <div class="col text-end text-lg text-primary">
                                        CHECKING
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0">Transaksi Dibuat</div>
                                    <div class="col text-end text-lg">
                                        {{ date('d F Y', strtotime($t->tanggal_transaksi)) }}
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
                                    <td colspan="1" class="">Rp
                                        {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-end">Biaya admin</td>
                                    <td colspan="1" class="">Rp
                                        {{ number_format($admin, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                @foreach ($trx as $t)
                                    <tr class="h5">
                                        <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                        <td class=" fw-bold"><span id="total-transaksi-b">Rp
                                                {{ number_format($t->total, 0, ',', '.') }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif --}}

            @if (in_array($t->id, $EU_checking))
                @section('title', '| Pending')
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-message me-2"></i> Hubungi Admin Pada Tombol Di Pojok Kanan Bawah Layar Untuk
                    Konfirmasi
                </div>
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
                                    <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0 text-start text-lg-end">Status</div>
                                    <div class="col text-end text-lg text-primary">
                                        CHECKING
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0">Transaksi Dibuat</div>
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
                                    <td colspan="1" class="">Rp
                                        {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-end">Biaya admin</td>
                                    <td colspan="1" class="">Rp
                                        {{ number_format($admin, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                @foreach ($trx as $t)
                                    <tr class="h5">
                                        <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                        <td class=" fw-bold"><span id="total-transaksi-b">Rp
                                                {{ number_format($t->total, 0, ',', '.') }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            {{-- view belum bayar --}}
            @if (in_array($t->id, $EU_utang))
                @section('title', '| Belum Bayar')
                @if ($pembayaran->isnotempty())
                    @foreach ($pembayaran as $p)
                        <a href="{{ route('pembayaran.pembayaran', $t->id) }}">
                            <div class="alert alert-danger" role="alert">
                                {{ $p->note_admin }}, bayar sebelum {{ date('d F Y', strtotime($t->tanggal_transaksi)) }}
                                Klik disini
                                untuk bayar
                            </div>
                        </a>
                    @endforeach
                @else
                    {{-- <a href="{{ route('pembayaran.pembayaran', $t->id) }}">
                        <div class="alert alert-danger" role="alert">
                            Bayar sebelum {{ date('d F Y', strtotime($t->tanggal_transaksi)) }} <br> Klik disini untuk bayar
                        </div>
                    </a> --}}
                    <div class="alert alert-danger" role="alert">
                        Bayar sebelum {{ date('d F Y', strtotime($t->tanggal_transaksi)) }} <br> <a href="{{ route('pembayaran.pembayaran', $t->id) }}">Klik disini untuk bayar </a>
                    </div>
                @endif
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
                            <div class="col-12 col-lg-9 my-5 my-lg-0 text-lg-end text-start">
                                <div class="row">
                                    <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0 text-start text-lg-end">Status</div>
                                    <div class="col text-end text-lg text-danger">
                                        BELUM BAYAR
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0">Transaksi Dibuat</div>
                                    <div class="col text-end text-lg">
                                        {{ date('d F Y', strtotime($t->tanggal_transaksi)) }}
                                    </div>
                                </div>
                                {{-- <div class="row">
                                <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0">Tanggal Mulai</div>
                                <div class="col text-end text-lg">
                                    31 Mei 2023
                                </div>
                            </div> --}}
                                <div class="row">
                                    <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0">Jatuh Tempo</div>
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
                                    <td colspan="1" class="">Rp
                                        {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-end">Biaya admin</td>
                                    <td colspan="1" class="">Rp
                                        {{ number_format($admin, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr class="h5">
                                    <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                    <td class=" fw-bold"><span id="total-transaksi-b">Rp
                                            {{ number_format($t->total, 0, ',', '.') }}</span></td>
                                </tr>

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



            <!-- pending -->
            {{-- VIEW PENDING --}}
            @if (in_array($t->id, $EU_pending))
                @section('title', '| Pending')
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-message"></i> Hubungi Admin
                </div>
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
                                    <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0 text-start text-lg-end">Status</div>
                                    <div class="col text-end text-lg text-info">
                                        PENDING
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0">Transaksi Dibuat</div>
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
                                    <td colspan="1" class="">Rp
                                        {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-end">Biaya admin</td>
                                    <td colspan="1" class="">Rp
                                        {{ number_format($admin, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                @foreach ($trx as $t)
                                    <tr class="h5">
                                        <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                        <td class=" fw-bold"><span id="total-transaksi-b">Rp
                                                {{ number_format($t->total, 0, ',', '.') }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
            @endif
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


            <!-- declined -->
            {{-- VIEW DECLINED --}}
            @if (in_array($t->id, $EU_declined))
                @section('title', '| Declined')
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
                                <div class="row text-muted">
                                    {{ $t->member->user->email }}
                                </div>
                            </div>
                            @foreach ($requser as $r)
                                <div class="col-12 col-lg my-5 my-lg-0 text-lg-end text-start">
                                    <div class="row">
                                        <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0 text-start text-lg-end">Status
                                        </div>
                                        <div class="col text-end text-lg text-danger fw-bold">
                                            DECLINED
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0">Transaksi Dibuat</div>
                                        <div class="col text-end text-lg">
                                            {{ date('d F Y', strtotime($t->tanggal_transaksi)) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0">Tanggal Mulai</div>
                                        <div class="col text-end text-lg">
                                            {{ date('d F Y', strtotime($r->tanggal_mulai)) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg-9 col-md-6 my-0 my-lg-0">Tanggal Berakhir</div>
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
                        @foreach ($requser as $ru)
                            <div class="row">
                                Alasan Ditolak
                            </div>
                            <div class="row text-muted">
                                {{ $ru->note_admin }}
                            </div>
                        @endforeach
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
                                    <td colspan="1" class="">Rp
                                        {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-end">Biaya admin</td>
                                    <td colspan="1" class="">Rp
                                        {{ number_format($admin, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr class="h5">
                                    <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                    <td class=" fw-bold "><span id="total-transaksi-b">Rp
                                            {{ number_format($t->total, 0, ',', '.') }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
            @endif

            <!-- Kredit -->
            @if (in_array($t->id, $EU_kredit))
                @section('title', '| Kredit')
        
                <div class="alert alert-warning" role="alert">
                    <a href="{{ route('pembayaran.pembayaran', $t->id) }}">Klik disini untuk bayar</a>
                </div>
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
                                        <div class="col-12 col-lg-9 col-md-6 my-0 my-lg-0 fw-bold text-start text-lg-end">
                                            Status</div>
                                        <div class="col text-end text-lg text-warning">
                                            KREDIT
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-9 col-md-6 my-0 my-lg-0 fw-bold">Transaksi Dibuat</div>
                                        <div class="col text-end text-lg">
                                            {{ date('d F Y', strtotime($t->tanggal_transaksi)) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-9 col-md-6 my-0 my-lg-0 fw-bold">Tanggal Mulai</div>
                                        <div class="col text-end text-lg">
                                            {{ date('d F Y', strtotime($r->tanggal_mulai)) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-9 col-md-6 my-0 my-lg-0 fw-bold">Tanggal Jatuh tempo
                                        </div>
                                        <div class="col text-end text-lg">
                                            {{ date('d F Y', strtotime($r->jatuh_tempo)) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-9 col-md-6 my-0 my-lg-0 fw-bold">Jatuh Tempo</div>
                                        <div class="col text-end text-lg text-danger">
                                            {{ $selisih }} Hari lagi
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- detail produk --}}
                <div class="konten mt-3 mx-3">
                    <h4 class="text-muted">Detail</h4>
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
                                <td colspan="1" class="">Rp
                                    {{ number_format($total, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-end">Biaya admin</td>
                                <td colspan="1" class="">Rp
                                    {{ number_format($admin, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr class="h5">
                                <td class="text-end fw-bold" colspan="3">Grand Total</td>
                                <td class="fw-bold"><span id="total-transaksi-b">Rp
                                        {{ number_format($t->total, 0, ',', '.') }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                    

                    {{-- detail kredit --}}
                    <h4 class="text-muted">History Pembayaran</h4>
                    <table class="table table-bordered">
                        <thead class="bg-light text-dark">
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Metode</th>
                                <th>Bukti</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requser as $r)
                                @if ($r->pembayaran->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">belum ada pembayaran</td>
                                    </tr>
                                @else
                                    @foreach ($r->pembayaran as $p)
                                        <tr>
                                            @if ($p->total_bayar == 0)
                                                <td colspan="4" class="text-center">belum ada pembayaran</td>
                                            @else
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d F Y', strtotime($p->created_at)) }}</td>
                                                @if ($p->bank)
                                                    <td><img src="{{ asset('illustration/' . $p->bank->image) }}"
                                                            alt="" style="width: 50px">
                                                    </td>
                                                @else
                                                    <td><img src="{{ asset('illustration/' . $p->ewallet->image) }}"
                                                            alt="" style="width: 50px">
                                                    </td>
                                                @endif
                                                <td><img src="{{ asset('bukti_transfer/' . $p->bukti_tf) }}"
                                                        style="width: 50px" alt=""> </td>
                                                <td>Rp. {{ number_format($p->total_bayar, 0, ',', '.') }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>

                        <tbody>
                            @foreach ($requser as $r)
                                @foreach ($r->pembayaran as $p)
                                    <tr>
                                        <td colspan="4" class="text-end">Total</td>
                                        <td colspan="1" class="">Rp
                                            {{-- {{ $p }} --}}
                                            jumlah yang telah dibayar
                                            {{-- {{ number_format($p, 0, ',', '.') }}</td> --}}
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                        <tbody>

                            @foreach ($requser as $r)
                                @foreach ($r->pembayaran as $p)
                                    <tr class="h5">
                                        <td class="text-end fw-bold" colspan="4"></td>
                                        <td class="fw-bold"><span id="total-transaksi-b">Rp
                                                {{-- {{ number_format($t->total, 0, ',', '.') }}</span> --}}
                                                grand total = total bayar - total harga
                                            </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                        {{-- <tbody>

                            @foreach ($requser as $r)
                                @foreach ($r->pembayaran as $p)
                                    <tr>
                                        <td colspan="4" class="text-end">Total Kekurangan</td>
                                        <td colspan="1" class="">Rp
                                            {{ number_format($admin, 0, ',', '.') }}
                                            total Kekurangan = total 
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody> --}}
                    </table>
                </div>
                {{-- </div> --}}
            @endif
        @endforeach

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

@endsection
