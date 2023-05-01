@extends('layout.admin')
@section('content')
@section('judul', 'Edit Produk')

<div class="row justify-content-center">
    <div class="col-10">
        <div class="card rounded shadow-md">
            <div class="card-body">
                <form action="{{route('store.update',$product->id)}}" method="POST">
                    @method('PUT')
                    @csrf

                    {{-- nama produk --}}
                    <div class="form-group">
                        <label for="">Nama produk</label>
                        <input type="text" name="nama_produk" id="" class="form-control"
                            placeholder="jasa desain" value="{{ $product->nama_produk }}" aria-describedby="helpId">
                    </div>

                    {{-- harga --}}
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="harga" id="" class="form-control"
                            placeholder="Rp.500.000" value="{{ $product->harga }}" aria-describedby="helpId">
                    </div>

                    {{-- deskripsi produk --}}
                    <div class="form-group">
                        <label for="">Deskripsi produk</label>
                        <textarea name="deskripsi" id="" cols="50" rows="5" class="form-control">{{ $product->deskripsi }}</textarea>
                    </div>


                    <div class="row">
                        <div class="col">
                            <input type="submit" class="btn text-white" style="background-color: #0EA1E2">
                            <a href="/store" class="btn btn-secondary">cancel</a>
                        </div>
                    </div>

                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection
