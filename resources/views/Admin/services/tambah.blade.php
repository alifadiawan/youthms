@extends('layout.admin')
@section('content')
@section('judul', 'Tambah service')

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card rounded">
            <div class="card-body">

                {{-- ID Pelanggan --}}
                <div class="row mb-3">
                    <div class="col">
                        <strong>ID Pelanggan</strong>
                    </div>
                    <div class="col">
                        <input type="number" name="" id="" class="form-control" placeholder="08107">
                    </div>
                </div>
        
                {{-- Jenis Layanan --}}
                <div class="row mb-3">
                    <div class="col">
                        <strong>Jenis Layanan</strong>
                    </div>
                    <div class="col">
                        <input type="text" placeholder="aplikasi" class="form-control">
                    </div>
                </div>
        
                {{-- Judul --}}
                <div class="row mb-3">
                    <div class="col">
                        <strong>Judul</strong>
                    </div>
                    <div class="col">
                        <input type="text" placeholder="judul" class="form-control">
                    </div>
                </div>
                
                {{-- Deskripsi --}}
                <div class="row mb-3">
                    <div class="col">
                        <strong>Deskripsi</strong>
                    </div>
                    <div class="col">
                        <input type="text" placeholder="deskrpsi" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <a href="/services" class="btn btn-info" style="background-color: #0EA1E2">Submit</a>
                        <a href="/services" class="btn btn-secondary">Batal</a>
                    </div>
                </div>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection