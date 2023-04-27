@extends('layout.admin')
@section('content')
@section('judul', 'Store')

<div class="row">
    <div class="col">
        <a href="/store_tambah" class="btn mb-3" style="background-color: #0EA1E2">Tambah produk</a>
        <table class="table" >
            <thead style="background-color: #0EA1E2">
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
                        <a href="/store_detail" class="btn rounded-pill" style="background-color: #0EA1E2">Detail</a>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>Aplikasi Kasir</td>
                    <td>Rp.500.000</td>
                    <td>7</td>
                    <td>
                        <a href="/store_detail" class="btn rounded-pill" style="background-color: #0EA1E2">Detail</a>
                    </td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td>Aplikasi Kasir</td>
                    <td>Rp.300.000</td>
                    <td>7</td>
                    <td>
                        <a href="/store_detail" class="btn rounded-pill" style="background-color: #0EA1E2">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection