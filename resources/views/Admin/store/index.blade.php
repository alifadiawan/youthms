@extends('layout.admin')
@section('content')
@section('judul', 'Store')

<div class="card p-3">
    <div class="row">
        <div class="col">
            <a href="{{ route('store.create') }}" class="btn mb-3 text-white" style="background-color: #1864BA">Tambah
                produk</a>
            <table class="table table-hover">
                <thead class="text-white" style="background-color: #0EA1E2">
                    <tr>
                        <th>No</th>
                        <th>Layanan</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($product->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Belum ada produk</td>
                        </tr>
                    @else
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->services->judul }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>Rp. {{ number_format( $item->harga) }}</td>
                                <td>
                                    <a href="{{ route('store.showid', $item->id) }}"
                                        class="btn btn-sm rounded-pill text-white"
                                        style="background-color: #0EA1E2">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        {{$product->links()}}
    </div>

</div>

@endsection
