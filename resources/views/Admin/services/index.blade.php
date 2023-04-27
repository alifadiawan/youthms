@extends('layout.admin')
@section('content-title', 'Services')
@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr class="bg-info rounded-lg">
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
                        <td>Pengembangan aplikasi</td>
                        <td>
                            <a href="{{ url('/detail_service')}}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td>Aplikasi</td>
                        <td>Pengembangan aplikasi</td>
                        <td>
                            <a href="{{ url('/detail_service')}}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection