@extends('layout-landing2.body')
@section('title', '| ')
@section('content')

    <div id="container" class="container my-5">

        <div class="card shadow rounded-3">
            <div class="row my-3 mx-0 mx-lg-4">
                <div class="col-6 col-lg text-start">
                    <strong>INVOCE</strong> <span class="badge bg-danger">New</span>
                </div>
                <div class="col-6 col-lg text-end text-lg-end">
                    <p class="text-muted">D6759869</p>
                </div>
            </div>

            <div class="konten my-lg-0 mx-5">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            Invoice To
                        </div>
                        <div class="row text-muted">
                            alifadiawan2005@gmail.com
                        </div>
                    </div>
                    <div class="col text-lg-end text-start">
                        <div class="row">
                            <div class="col">Status</div>
                            <div class="col text-warning">
                                KREDIT
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">Transaksi Dibuat</div>
                            <div class="col">
                                29 Mei 2023
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">Tanggal Mulai</div>
                            <div class="col">
                                31 Mei 2023
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">Jatuh Tempo</div>
                            <div class="col text-danger">
                                10 Hari lagi
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="konten mt-3 mx-3">
                <table class="table table-bordered">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Laravel</td>
                            <td>2</td>
                            <td class="text-end">Rp.200.000</td>
                        </tr> 
                        <tr>
                            <td>Laravel</td>
                            <td>2</td>
                            <td class="text-end">Rp.200.000</td>
                        </tr> 
                        <tr>
                            <td>Laravel</td>
                            <td>2</td>
                            <td class="text-end">Rp.200.000</td>
                        </tr> 
                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-end">Biaya admin</td>
                            <td colspan="1" class="text-end fw-bold">Rp.30.000</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Grand Total</td>
                            <td colspan="1" class="text-end fw-bold">Rp.30.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
