@extends('layout.admin')
@section('content')
@section('judul', 'Transaction')

<div class="container">

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
                            @elseif(in_array($detail[0]->transaksi_id, $adm_pending))
                                <h5 class="mb-0 me-auto text-info font-weight-bold">PENDING</h5>
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
