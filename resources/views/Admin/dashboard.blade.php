@extends('layout.admin')
@section('judul', 'Dashboard')
@section('content-title', 'Dashboard')
@section('content')
    <div class="row">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{ $chart1->options['chart_title'] }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    {!! $chart1->renderHtml() !!}
                </div>

            </div>
        </div>


        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{ $chart2->options['chart_title'] }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    {!! $chart2->renderHtml() !!}
                </div>
            </div>
        </div>

        {{-- produk --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Transaksi Terbaru</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Tanggal Pembelian</th>
                                <th>Nama Pembeli</th>
                                <th>More Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="badge bg-danger">NEW</span>
                                    Aplikasi Kasir
                                </td>
                                <td>
                                    13 Mei 2023
                                </td>
                                <td>Steven</td>
                                <td>
                                    <a href="#" class="text-muted" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    React Native
                                </td>
                                <td>
                                    3 Mei 2023
                                </td>
                                <td>Ilham</td>
                                <td>
                                    <a href="#" class="text-muted" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Logo
                                </td>
                                <td>
                                    28 April 2023
                                </td>
                                <td>Alif</td>
                                <td>
                                    <a href="#" class="text-muted" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Web Profile
                                </td>
                                <td>
                                    20 April 2023
                                </td>
                                <td>Rafli</td>
                                <td>
                                    <a href="#" class="text-muted" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <!-- Modals -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transaksi oleh ...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col">
                            <div class="d-flex flex-column font-weight-bold">
                                <p>Layanan / Produk</p>
                                <p>Total</p>
                                <p>Tanggal Pembelian</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column">
                                <p>: Aplikasi Kasir</p>
                                <p>: Rp. 1.000.000</p>
                                <p>: 13 Mei 2023</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



    <!-- Dashboard Charts -->
    {!! $chart1->renderChartJsLibrary() !!}

    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}


@endsection
