@extends('layout.admin')
@section('content')
@section('judul', 'Status Pembayaran')

<div class="container">

    <div class="row">

        <!-- table status -->
        <div class="col">
            <div class="card">
                <table class="table table-borderless">
                    <thead class="yms-blue">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Dibuat</th>
                            <th>Pembeli</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($request_user as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->tanggal_mulai }}</td>
                                <td>{{ $r->nama_pemesan }}</td>
                                <td>
                                    <p class="text-uppercase text-warning">{{ $r->status }}</p>
                                </td>
                                <td>
                                    <a href="{{ route('requestuser.show',$r->id) }}" class="btn yms-blue">detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
