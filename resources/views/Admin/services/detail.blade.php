@extends('layout.admin')
@section('content')
@section('judul', 'Detail')

<div class="row justify-content-center">
    <div class="col-lg-8 col-11">
        <div class="card rounded">
            <div class="card-body">

                {{-- ID Pelanggan --}}
                <div class="row mb-3">
                    <div class="col-lg col-6">
                        <strong>ID Layanan</strong>
                    </div>
                    <div class="col-lg col-6">
                        <p>{{ $services->id_service }}</p>
                    </div>
                </div>

                {{-- Jenis Layanan --}}
                <div class="row mb-3">
                    <div class="col-lg col-6">
                        <strong>Jenis Layanan</strong>
                    </div>
                    <div class="col-lg col-6">
                        <p class="text-capitalize">{{ $services->jenis_layanan->layanan }}</p>
                    </div>
                </div>

                {{-- Judul --}}
                <div class="row mb-3">
                    <div class="col-lg col-6">
                        <strong>Judul</strong>
                    </div>
                    <div class="col-lg col-6">
                        <p class="text-capitalize">{{ $services->judul }}</p>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="row mb-3">
                    <div class="col-lg col-6">
                        <strong>Deskripsi</strong>
                    </div>
                    <div class="col-lg col-6">
                        <p>{{ $services->deskripsi }}</p>
                    </div>
                </div>

                {{-- Foto --}}
                <div class="row mb-3">
                    <div class="col-lg col-6">
                        <strong>Foto</strong>
                    </div>
                    <div class="col">
                        <img style="width: 13rem;" src="{{ asset('./service/' . $services->foto) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ route('services.edit', $services->id) }}" class="btn btn-warning">Edit</a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#hapusservice">
                            Hapus
                        </a>
                    </div>
                </div>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<!-- Modal -->
<div class="modal fade" id="hapusservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body my-5">
                <h3 class="h3 text-center">Yakin Ingin Menghapus {{ $services->judul }} ?</h3>
            </div>
            <div class="row text-center p-3">
                <div class="col">
                    <a href="{{ route('services.hapus', $services->id) }}" class="btn btn-danger text-white">Hapus</a>
                    <a class="btn btn" data-dismiss="modal">tidak</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
