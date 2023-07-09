@extends('layout.admin')
@section('content')
@section('judul', 'Tambah service')

<div class="row justify-content-center">
    <div class="col-11 col-lg-8">
        <div class="card rounded">
            <div class="card-body">

                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Jenis Layanan --}}
                    <div class="row mb-3">
                        <div class="col-lg col-12">
                            <strong>Jenis Layanan</strong>
                        </div>
                        <div class="col-lg col-12">
                            <select name="jenis_layanan_id" id="" class="form-control">
                                <option value="">Pilih layanan</option>
                                @foreach ($jenis_layanan as $item)
                                    <option value="{{ $item->id }}">{{ $item->layanan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="row mb-3">
                        <div class="col-lg col-12">
                            <strong>Judul</strong>
                        </div>
                        <div class="col-lg col-12">
                            <input type="text" name="judul" placeholder="judul" class="form-control" required>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="row mb-3">
                        <div class="col-lg col-12">
                            <strong>Deskripsi</strong>
                        </div>
                        <div class="col-lg col-12">
                            <textarea name="deskripsi" class="form-control" required></textarea>
                        </div>
                    </div>

                    {{-- Foto --}}
                    <div class="row mb-3">
                        <div class="col-lg col-12">
                            <strong>Foto</strong>
                        </div>
                        <div class="col-lg col-12">
                            <input type="file" name="foto" id="foto" class="form-control" required>
                            <img id="preview" class="form-control" src="#"> 
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <input type="submit" class="btn btn-info" style="background-color: #0EA1E2">
                            <a href="/services" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

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
