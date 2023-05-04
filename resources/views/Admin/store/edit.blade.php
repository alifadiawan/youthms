@extends('layout.admin')
@section('content')
@section('judul', 'Edit Produk')

<div class="row justify-content-center">
    <div class="col-10">
        <div class="card rounded shadow-md">
            <div class="card-body">
                <form action="{{ route('store.update', $product->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    {{-- nama produk --}}
                    <div class="form-group">
                        <label for="">Nama produk</label>
                        <select name="" id="" class="form-control">
                            <option value="">Pilih layanan</option>
                            @foreach ($services as $item)
                                <option value="{{$item->id}}">{{$item->judul}}</option>
                            @endforeach
                        </select>
                    </div>

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
                            <a class="btn btn-warning" data-toggle="modal" data-target="#editproduk">
                                Edit
                            </a>
                            <a href="/store" class="btn btn-secondary">cancel</a>
                        </div>
                    </div>

            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->


<!-- Modal -->
<div class="modal fade" id="editproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center">Yakin Ingin Merubah ?</h3>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-warning active">Iya</button>
                <a class="btn btn-outline-secondary" data-dismiss="modal">Tidak</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
