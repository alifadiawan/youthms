@extends('layout.admin')
@section('content')
@section('judul', 'Detail produk')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card rounded shadow-md">
                <div class="card-body">

                    <div class="row">
                        
                    </div>

                    {{-- nama produk --}}
                    <div class="form-group mb-3">
                        <label for="">Nama produk</label>
                        <p>{{ $product->nama_produk }}</p>
                    </div>
                    
                    {{-- jenis services --}}
                    <div class="form-group mb-3">
                        <label for="">Jenis Services</label>
                        <p>{{ $product->services->judul }}</p>
                    </div>

                    {{-- harga --}}
                    <div class="form-group mb-3">
                        <label for="">Harga</label>
                        <p>{{ $product->harga }}</p>
                    </div>

                    {{-- deskripsi produk --}}
                    <div class="form-group mb-3">
                        <label for="">Deskripsi produk</label>
                        <p>{{ $product->deskripsi }}</p>
                    </div>


                    <div class="row">
                        <div class="col">
                            <a href="{{ route('store.edit', $product->id) }}"
                                class="btn btn-warning text-white">Edit</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#hapusproduk{{ $product->id }}">
                                Hapus
                            </a>
                            <a href="{{ route('store.index') }}" class="btn btn-secondary">cancel</a>
                        </div>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>


<!-- Modal -->
<div class="modal fade" id="hapusproduk{{ $product->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center">Yakin Ingin Menghapus {{ $product->nama_produk }} ?</h3>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="{{ route('store.hapus', $product->id) }}" class="btn btn-danger text-white">Hapus</a>
                <a class="btn btn-outline-secondary" data-dismiss="modal">tidak</a>
            </div>
        </div>
    </div>
</div>
@endsection
