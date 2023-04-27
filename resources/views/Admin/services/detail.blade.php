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
                        <strong>ID Pelanggan</strong>
                    </div>
                    <div class="col">
                        <p>18017</p>
                    </div>
                </div>
        
                {{-- Jenis Layanan --}}
                <div class="row">
                    <div class="col">
                        <strong>Jenis Layanan</strong>
                    </div>
                    <div class="col">
                        <p>Aplikasi</p>
                    </div>
                </div>
        
                {{-- Judul --}}
                <div class="row">
                    <div class="col">
                        <strong>Judul</strong>
                    </div>
                    <div class="col">
                        <p>Jasa desain membuat aplikas</p>
                    </div>
                </div>
                
                {{-- Deskripsi --}}
                <div class="row">
                    <div class="col">
                        <strong>Deskripsi</strong>
                    </div>
                    <div class="col">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui, porro aliquid ullam animi, fugiat dignissimos voluptas quas a cumque optio vel consectetur nihil? Quam maiores laboriosam deleniti alias fugit soluta.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <a href="/edit_service" class="btn btn-info" style="background-color: #0EA1E2">Edit</a>
                        <a href="/services" class="btn btn-danger">Hapus</a>
                    </div>
                </div>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection