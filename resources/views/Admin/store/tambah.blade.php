@extends('layout.admin')
@section('content')
@section('judul', 'Tambah produk')

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card rounded shadow-md">
            <div class="card-body">
                <form action="{{route('store.store')}}" method="POST">
                    @csrf

                    {{-- nama produk --}}
                    <div class="form-group">
                      <label for="">Nama produkk</label>
                      <input type="text" name="nama_produk" id="" class="form-control" placeholder="jasa desain" aria-describedby="helpId">
                    </div>

                    {{-- harga --}}
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" name="harga" id="" class="form-control" placeholder="Rp.500.000" aria-describedby="helpId">
                    </div>

                    {{-- deskripsi produk --}}
                    <div class="form-group">
                        <label for="">Deskripsi produk</label>
                        <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    

                    <div class="row">
                        <div class="col">
                            <input type="submit" href="{{route('store.create')}}" value="Submit" class="btn text-white" style="background-color: #0EA1E2">
                            <a href="{{route('store.index')}}" class="btn btn-secondary">cancel</a>
                        </div>
                    </div>

                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection