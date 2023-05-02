@extends('layout.admin')
@section('content')
@section('judul', 'Detail')

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card rounded">
            <div class="card-body">
                
                {{-- ID Pelanggan --}}
                <div class="row mb-3">
                    <div class="col">
                        <strong>ID Layanan</strong>
                    </div>
                    <div class="col">
                        <p>{{$services->id_services}}</p>
                    </div>
                </div>
        
                {{-- Jenis Layanan --}}
                <div class="row mb-3">
                    <div class="col">
                        <strong>Jenis Layanan</strong>
                    </div>
                    <div class="col">
                        <p>{{$services->jenis_layanan->layanan}}</p>
                    </div>
                </div>
        
                {{-- Judul --}}
                <div class="row mb-3">
                    <div class="col">
                        <strong>Judul</strong>
                    </div>
                    <div class="col">
                        <p>{{$services->judul}}</p>
                    </div>
                </div>
                
                {{-- Deskripsi --}}
                <div class="row mb-3">
                    <div class="col">
                        <strong>Deskripsi</strong>
                    </div>
                    <div class="col">
                        <p>{{$services->deskripsi}}</p>    
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <a href="{{route('services.edit', $services->id)}}" class="btn btn-warning">Edit</a>
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
<div class="modal fade" id="hapusservice" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center">Yakin Ingin Menghapus {{ $services->judul }} ?</h3>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="{{ route('services.hapus', $services->id) }}" class="btn btn-danger text-white">Hapus</a>
                <a class="btn btn-outline-secondary" data-dismiss="modal">tidak</a>
            </div>
        </div>
    </div>
</div>

@endsection