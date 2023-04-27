@extends('layout.admin')
@section('content')
@section('judul', 'Services')

<div class="card p-3">
    <div class="row">
        <div class="col">
            <a href="/tambah_service" class="btn btn-info mb-3 rounded-pill" style="background-color: #0EA1E2">Tambah</a>
            <table class="table table-hover">
                <thead class="text-white" style="background-color: #0EA1E2">
                    <tr>
                        <th>No</th>
                        <th>Jenis Layanan</th>
                        <th>Judul</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>Aplikasi</td>
                        <td>Desain aplikasi</td>
                        <td>
                            <a href="/detail_service" class="btn btn-info rounded-pill" style="background-color: #0EA1E2">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Aplikasi</td>
                        <td>Pengembangan aplikasi</td>
                        <td>
                            <a href="/detail_service" class="btn btn-info rounded-pill" style="background-color: #0EA1E2">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>Editing</td>
                        <td>Editing buku + cover</td>
                        <td>
                            <a href="/detail_service" class="btn btn-info rounded-pill" style="background-color: #0EA1E2">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection