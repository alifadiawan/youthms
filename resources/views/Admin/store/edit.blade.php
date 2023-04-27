@extends('layout.admin')
@section('content')
@section('judul', 'Edit Produk')

<div class="row justify-content-center">
    <div class="col-10">
        <div class="card rounded shadow-md">
            <div class="card-body">
                <form action="" method="">
                    
                    {{-- Nama produk --}}
                    <div class="row mb-3">
                        <div class="col">
                            <strong>Nama Produk</strong>
                        </div>
                        <div class="col">
                            <input type="text" name="" id="" class="form-control" placeholder="aplikasi">
                        </div>
                    </div>

                    {{-- Harga --}}
                    <div class="row mb-3">
                        <div class="col">
                            <strong>Harga</strong>
                        </div>
                        <div class="col">
                            <input type="number" name="" id="" class="form-control" placeholder="500.000">
                        </div>
                    </div>

                    {{-- Deskripsi Produk --}}
                    <div class="row mb-3">
                        <div class="col">
                            <strong>Deskripsi Produk</strong>
                        </div>
                        <div class="col">
                            <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="jasa membuat aplikasi"></textarea>    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <a href="/store" class="btn" style="background-color: #0EA1E2">Submit</a>
                            <a href="/store" class="btn btn-secondary">cancel</a>
                        </div>
                    </div>

                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection