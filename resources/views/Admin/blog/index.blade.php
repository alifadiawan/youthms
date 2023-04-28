@extends('layout.admin')
@section('content')
@section('judul', 'Blog')
<div class="card p-3">
    <div class="col-lg-12">
        <a href="/addartikel" class="btn btn-md text-white rounded mb-2 mr-1" style="background-color: #1864BA">Tambah Artikel</a>
        <table class="table table-striped table-hover mt-2">
            <thead>
                <tr style="background-color: #0EA1E2">
                    <th class="text-white">No</th>
                    <th class="text-white">Tanggal</th>
                    <th class="text-white">Judul</th>
                    <th class="text-white">Segmen</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>12 November 2022</td>
                    <td>5 Hosting Terbaik</td>
                    <td>Pemrograman</td>
                    <td>
                        <a href="/detail" class="btn btn-sm btn text-white rounded-pill" style="background-color: #0EA1E2">Detail</a>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>12 November 2022</td>
                    <td>5 Hosting Terbaik</td>
                    <td>Pemrograman</td>
                    <td>
                        <a href="/detail" class="btn btn-sm btn text-white rounded-pill" style="background-color: #0EA1E2">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection
