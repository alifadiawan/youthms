@extends('layout.admin')
@section('content')
@section('judul', 'Tambah produk')

<div class="row justify-content-center">
    <div class="col-lg-8 col-11">
        <div class="card rounded shadow-md">
            <div class="card-body">
                <form action="{{ route('store.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- nama produk --}}
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" name="nama_produk" id="" class="form-control"
                            placeholder="jasa desain" aria-describedby="helpId">
                    </div>

                    {{-- services --}}
                    <div class="form-group">
                        <label for="">Jenis Services</label>
                        <select name="services_id" id="" class="form-control">
                            <option value="" class="form-control">Pilih Services jika perlu</option>
                            @foreach ($jenis_services as $item)
                                <option value="{{$item->id}}" class="form-control">{{$item->judul}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- harga --}}
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" name="harga" id="" class="form-control"
                            placeholder="Rp.500.000" aria-describedby="helpId">
                    </div>

                    {{-- deskripsi produk --}}
                    <div class="form-group">
                        <label for="">Deskripsi Produk</label>
                        <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    {{-- foto produk --}}
                    <div class="form-group">
                        <label for="">Deskripsi Produk</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                        <img id="preview" src="">
                    </div>


                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn text-white" style="background-color: #0EA1E2"><i class="fa-solid fa-check"></i> Tambah</button>
                            <a href="{{ route('store.index') }}" class="btn btn-secondary">cancel</a>
                        </div>
                    </div>

                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->

<style>
    #preview {
            width: 100%;
            height: 190px;
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
