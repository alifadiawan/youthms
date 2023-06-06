@extends('layout.admin')
@section('content-title', 'Paket')
@section('content')
@section('judul', 'Paket')


<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <a href="/tambah-paket" class="btn yms-blue">Tambah Paket</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Isi Paket</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Paket A</td>
                        <td>Web, Poster</td>
                        <td>
                            <a href="" class="btn yms-blue">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
