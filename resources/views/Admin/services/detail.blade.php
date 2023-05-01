@extends('layout.admin')
@section('content')
@section('judul', 'Detail')

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card rounded">
            <div class="card-body">
                
                {{-- ID Pelanggan --}}
                <div class="row">
                    <div class="col">
                        <strong>ID Layanan</strong>
                    </div>
                    <div class="col">
                        <p>{{$services->id_services}}</p>
                    </div>
                </div>
        
                {{-- Jenis Layanan --}}
                <div class="row">
                    <div class="col">
                        <strong>Jenis Layanan</strong>
                    </div>
                    <div class="col">
                        <p>{{$services->jenis_layanan->layanan}}</p>
                    </div>
                </div>
        
                {{-- Judul --}}
                <div class="row">
                    <div class="col">
                        <strong>Judul</strong>
                    </div>
                    <div class="col">
                        <p>{{$services->judul}}</p>
                    </div>
                </div>
                
                {{-- Deskripsi --}}
                <div class="row">
                    <div class="col">
                        <strong>Deskripsi</strong>
                    </div>
                    <div class="col">
                        <p>{{$services->deskripsi}}</p>    
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <a href="{{route('services.edit', $services->id)}}" class="btn btn-info" style="background-color: #0EA1E2">Edit</a>
                        <a href="{{route('services.hapus', $services->id)}}" class="btn btn-danger">Hapus</a>
                    </div>
                </div>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection