@extends('layout.admin')
@section('content')
@section('judul', 'Store')

<div class="card p-3">
    <div class="row">
        <div class="col">
            <a href="/store_tambah" class="btn mb-3 text-white" style="background-color: #1864BA">Tambah produk</a>
            <table class="table table-hover" >
                <thead class="text-white" style="background-color: #0EA1E2">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>Aplikasi Kasir</td>
                        <td>Rp.500.000</td>
                        <td>7</td>
                        <td>
                            <a href="/store_detail" class="btn btn-sm rounded-pill text-white" style="background-color: #0EA1E2">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Aplikasi Kasir</td>
                        <td>Rp.500.000</td>
                        <td>7</td>
                        <td>
                            <a href="/store_detail" class="btn btn-sm rounded-pill text-white" style="background-color: #0EA1E2">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>Aplikasi Kasir</td>
                        <td>Rp.300.000</td>
                        <td>7</td>
                        <td>
                            <a href="/store_detail" class="btn btn-sm rounded-pill text-white" style="background-color: #0EA1E2">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection