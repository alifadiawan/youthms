@extends('layout.admin')
@section('content')
@section('judul', 'Transaction')

<div class="row justify-content-center">
    <div class="col-lg-7 col-11">
        <div class="container">
            <a href="{{ route('transaksi.index') }}" class="my-5">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div class="row">
                <div class="col">
                    @foreach ($trx as $t)
                        <div class="card rounded-lg shadow">
                            <div class="card-header yms-blue">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <img src="{{ asset('youth-logo.svg') }}" width="150px" alt="">
                                    </div>
                                    <div class="col text-right">
                                        <p>{{ $t->unique_code }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="konten">
                                    <div class="row">
                                        <div class="col text-center">
                                            @if (in_array($t->id, $adm_utang))
                                                <h5 class="h3 mb-0 me-auto text-danger font-weight-bold">BELUM BAYAR
                                                </h5>
                                            @elseif(in_array($t->id, $adm_kredit))
                                                <h5 class="h3 mb-0 me-auto text-warning font-weight-bold">KREDIT</h5>
                                            @elseif(in_array($t->id, $adm_pending))
                                                <h5 class="h3 mb-0 me-auto text-info font-weight-bold">PENDING</h5>
                                            @elseif(in_array($t->id, $adm_declined))
                                                <h5 class="h3 mb-0 me-auto text-dark font-weight-bold">DECLINED</h5>
                                            @elseif(in_array($t->id, $adm_lunas))
                                                <h5 class="mb-0 me-auto text-success font-weight-bold">LUNAS</h5>
                                            @elseif(in_array($t->id, $adm_checking))
                                                <h5 class="mb-0 me-auto text-primary font-weight-bold">CHECKING</h5>
                                            @endif
                                            <p class="text-muted">{{ $t->tanggal_transaksi }}</p>
                                        </div>
                                    </div>

                                    <div class="penerima">

                                        @foreach ($detail as $d)
                                            <div class="row mt-3">
                                                <div class="col">
                                                    {{ $d->produk->nama_produk }}
                                                </div>
                                                <div class="col text-right">
                                                    {{ $d->quantity }}
                                                </div>
                                                <div class="col text-right">
                                                    Rp.
                                                    {{ number_format($d->quantity * $d->produk->harga, 0, ',', '.') }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="pengirim">
                                        <hr class="my-3">

                                        <div class="row">
                                            <div class="col">
                                                total
                                            </div>
                                            <div class="col text-right">
                                                Rp. {{ number_format($total, 0, ',', '.') }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                biaya admin
                                            </div>
                                            <div class="col text-right">
                                                Rp. {{ number_format($admin, 0, ',', '.') }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                grandtotal
                                            </div>
                                            <div class="col text-right">
                                                Rp. {{ number_format($grandtotal, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row">
                                        @foreach ($pembayaran as $p)
                                            <div class="col">
                                                metode pembayaran
                                            </div>
                                            <div class="col text-right">
                                                @if ($p->bank_id == !null)
                                                    <img class="img-thumbnail border-0"
                                                        src="{{ asset('illustration/' . $p->bank->image) }}"
                                                        style="width: 80px" alt="">
                                                @elseif ($p->ewallet_id == !null)
                                                    <img class="img-thumbnail border-0"
                                                        src="{{ asset('illustration/' . $p->ewallet->image) }}"
                                                        style="width: 80px" alt="">
                                                @endif

                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="row justify-content-center">
                                        @foreach ($pembayaran as $p)
                                            <div
                                                class="col-lg col-12 text-center text-lg-left mt-lg-0 mt-4g font-weight-bold">
                                                Bukti transfer
                                            </div>
                                            <div class="col text-right">
                                                <img src="{{ asset('./bukti_transfer/' . $p->bukti_tf) }}"
                                                    class="card-img-top " alt="..."
                                                    style="max-width: 15.3rem; height: 15.3rem; object-fit:cover;">

                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="footer mt-3">
                                        <div class="row">
                                            <div class="col">
                                                <a href="" class="btn btn-block btn-outline-info rounded-pill">
                                                    Download
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="" class="btn btn-block btn-outline-info rounded-pill">
                                                    Share
                                                </a>
                                            </div>
                                            @if (in_array($detail[0]->transaksi_id, $adm_kredit))
                                                <div class="col">
                                                    <a href="{{ route('pembayaran.show', $t->id) }}"
                                                        class="btn btn-block btn-outline-info rounded-pill">
                                                        Bukti Pembayaran Kredit
                                                    </a>
                                                </div>
                                            @elseif(in_array($detail[0]->transaksi_id, $adm_lunas))
                                                <div class="col">
                                                    <a href="{{ route('pembayaran.show', $t->id) }}"
                                                        class="btn btn-block btn-outline-info rounded-pill">
                                                        Bukti Pembayaran
                                                    </a>
                                                </div>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        {{-- <div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('transaksi.history') }}" class="btn my-3">
                <i class="fas fa-arrow-left"></i></a>
            <div class="card mb-4">

                <!-- status -->
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
                                <h5 class="mb-0 me-auto text-warning font-weight-bold">PENDING</h5>
                            @elseif(in_array($detail[0]->transaksi_id, $adm_declined))
                                <h5 class="mb-0 me-auto text-dark font-weight-bold">DECLINED</h5>
                            @else
                                <h5 class="mb-0 me-auto text-success font-weight-bold">LUNAS</h5>
                            @endif
                        </div>
                    </div>


                    <!-- detail belum bayar jika ada -->
                    @if (in_array($detail[0]->transaksi_id, $adm_utang))
                        <div class="row border-top mt-3">
                            <div class="col">
                                Total yang harus dibayar
                            </div>
                            <div class="col text-right">
                                Rp.300.000
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Bayar sebelum
                            </div>
                            <div class="col text-right">
                                12 Mei 2023
                            </div>
                        </div>
                    @endif

                    <!-- detail kredit jika ada -->
                    @if (in_array($detail[0]->transaksi_id, $adm_kredit))
                        <div class="row border-top mt-3">
                            <div class="col">
                                Total yang harus dibayar
                            </div>
                            <div class="col text-right">
                                Rp.300.000
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Sisa yang harus dibayar
                            </div>
                            <div class="col text-right">
                                Rp.300.000
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Bayar kredit sebelum
                            </div>
                            <div class="col text-right">
                                12 Mei 2023
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Tanggal Jatuh Tempo
                            </div>
                            <div class="col text-right">
                                20 Mei 2023
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Sisa Hari
                            </div>
                            <div class="col text-right text-danger">
                                8 hari
                            </div>
                        </div>
                    @endif


                    <!-- detail pending bila ada -->
                    @if (in_array($detail[0]->transaksi_id, $adm_pending))
                        <div class="row border-top mt-3">
                            <div class="col">
                                Transaksi Dibuat Pada
                            </div>
                            <div class="col text-right">
                                10 Mei 2023
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Nama Pemesan
                            </div>
                            <div class="col text-right">
                                Ilham Bintang
                            </div>
                        </div>
                        @endif


                </div>





                <!-- list barang -->
                <div class="card-body">


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Item</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $d)
                                <tr>
                                    <td>{{ $d->produk->nama_produk }}</td>
                                    <td></td>
                                    <td>Rp. {{ number_format($d->produk->harga * $d->quantity, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <thead>
                            <td colspan="2" class="text-right">Total</td>
                            <td colspan="1" class="text-left">Rp. {{ number_format($total, 0, ',', '.') }}</td>
                        </thead>
                        <thead>
                            <td colspan="2" class="text-right">Biaya Admin</td>
                            <td colspan="1" class="text-left">Rp. {{ number_format($admin, 0, ',', '.') }}</td>
                        </thead>
                        <thead>
                            <th colspan="2" class="text-right h4  font-weight-bold">Grand Total</th>
                            <th colspan="1" class="text-left h4 font-weight-bold">Rp.
                                {{ number_format($grandtotal, 0, ',', '.') }}</th>
                        </thead>
                    </table>



                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4>Metode Pembayaran</h4>
                </div>

            </div>
        </div>

    </div>
</div> --}}
    @endsection
