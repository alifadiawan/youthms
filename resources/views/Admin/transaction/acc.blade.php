@extends('layout.admin')
@section('content')
@section('judul', 'Status Pembayaran')

<div class="container">

    <div class="row">
        
        <!-- table status -->
        <div class="col">
            <div class="card">
                <table class="table table-borderless">
                    <thead class="bg-primary">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Dibuat</th>
                            <th>Pembeli</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>12 Mei 2023</td>
                            <td>Ilham</td>
                            <td>
                                <p class="text-uppercase text-warning">Pending</p>
                            </td>
                            <td>
                                <a href="/transaksi/acc/detail" class="btn yms-blue">detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>12 Mei 2023</td>
                            <td>Ilham</td>
                            <td>
                                <p class="text-uppercase text-warning">Pending</p>
                            </td>
                            <td>
                                <a href="/transaksi/acc/detail" class="btn yms-blue">detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>12 Mei 2023</td>
                            <td>Ilham</td>
                            <td>
                                <p class="text-uppercase text-warning">Pending</p>
                            </td>
                            <td>
                                <a href="" class="btn yms-blue">detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
