@extends('layout.admin')
@section('content')
@section('judul', 'Edit Produk')

<div class="row justify-content-center">
    <div class="col-10">
        <div class="card rounded shadow-md">
            <div class="card-body">
                <form action="{{ route('store.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    {{-- layanan produk --}}
                    <div class="form-group">
                        <label for="">Layanan</label>
                        <select name="services_id" id="services_id" class="form-control">
                            <option value="">Pilih layanan</option>
                            @foreach ($services as $item)
                                <option value="{{$item->id}}" @if($item->id == $product->services_id) selected @endif>{{$item->judul}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- nama produk --}}
                    <div class="form-group">
                        <label for="">Nama Produk</label>
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
                        <label for="">Deskripsi Produk</label>
                        <textarea name="deskripsi" id="" cols="50" rows="5" class="form-control">{{ $product->deskripsi }}</textarea>
                    </div>

                    {{-- foto produk --}}
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Foto Lama :</label>
                                <img id="lama" src="{{asset('./produk/'.$product->foto)}}">
                            </div>
                            <div class="col">
                                <label>Foto Baru (Optional) :</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                                <img id="preview" src="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <a class="btn btn-warning" data-toggle="modal" data-target="#editproduk">
                                Edit
                            </a>
                            <a href="{{route('store.index')}}" class="btn btn-secondary">cancel</a>
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


<style>
    #preview {
            width: 100%;
            height: 190px;
            object-fit: contain;
    }
    #lama {
        width: 100%;
        height: 250px;
        object-fit: contain;
    }
</style>

<script>
    document.getElementById("foto").addEventListener("change", function() {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById("preview");
                preview.src = reader.result;
                preview.style.display = "block";
            }
            reader.readAsDataURL(this.files[0]);
        });
</script>
@endsection
