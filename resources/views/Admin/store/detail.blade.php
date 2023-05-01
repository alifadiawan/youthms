@extends('layout.admin')
@section('content')
@section('judul', 'Detail produk')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card rounded shadow-md">
                <div class="card-body">

                        {{-- nama produk --}}
                        <div class="form-group">
                            <label for="">Nama produk</label>
                            <p>{{$product->nama_produk}}</p>
                        </div>

                        {{-- harga --}}
                        <div class="form-group">
                            <label for="">Harga</label>
                            <p>{{$product->harga}}</p>
                        </div>

                        {{-- deskripsi produk --}}
                        <div class="form-group">
                            <label for="">Deskripsi produk</label>
                            <p>{{$product->deskripsi}}</p>
                        </div>


                        <div class="row">
                            <div class="col">
                                <a href="{{route('store.edit' , $product->id)}}" class="btn text-white" style="background-color: #0EA1E2">Edit</a>
                                <a href="{{route('store.hapus' , $product->id)}}" class="btn btn-danger text-white">Hapus</a>
                                <a href="{{route('store.index')}}" class="btn btn-secondary">cancel</a>
                            </div>
                        </div>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>

@endsection
