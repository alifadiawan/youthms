@extends('layout.admin')
@section('content')
@section('judul', 'Detail produk')

<div class="row justify-content-center">
    <div class="col-10">
        <div class="card rounded shadow-md">
            <div class="card-body">
                <form action="" method="">
                    
                    {{-- Nama produk --}}
                    <div class="row">
                        <div class="col">
                            <strong>Nama Produk</strong>
                        </div>
                        <div class="col">
                            <p>Aplikasi Kasir</p>
                        </div>
                    </div>

                    {{-- Harga --}}
                    <div class="row">
                        <div class="col">
                            <strong>Harga</strong>
                        </div>
                        <div class="col">
                            <p>Rp. 500.000</p>
                        </div>
                    </div>

                    {{-- Deskripsi Produk --}}
                    <div class="row">
                        <div class="col">
                            <strong>Deskripsi Produk</strong>
                        </div>
                        <div class="col">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda quod ex libero mollitia dolorem magnam voluptatum eligendi tenetur exercitationem quisquam, vitae dolores. Ipsum esse voluptatibus minima, repudiandae hic tenetur autem!</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <a href="/store_edit" class="btn" style="background-color: #0EA1E2">Edit</a>
                            <a href="/store" class="btn btn-secondary">cancel</a>
                        </div>
                    </div>

                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection