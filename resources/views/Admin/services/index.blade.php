@extends('layout.admin')
@section('content-title', 'Services')
@section('content')
    
    <a href="{{url('/tambah_service')}}" class="btn btn-info mb-3 rounded-pill">Tambah</a>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-info rounded-pill">
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
                            <a href="{{ url('/service_detail')}}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td>Aplikasi</td>
                        <td>Pengembangan aplikasi</td>
                        <td>
                            <a href="{{ url('/service_detail')}}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection