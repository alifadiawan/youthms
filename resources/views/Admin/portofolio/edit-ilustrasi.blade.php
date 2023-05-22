@extends('layout.admin')
@section('content-title', 'Edit Ilustrasi Portofolio')
@section('content')
@section('judul', 'Edit Ilustrasi Portofolio')


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-5 p-5">
                <form action="{{route('portofolio.update_ilustrasi', $ills->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <p class="h3">Ilustrasi Lama</p>
                            <img id="illustration" src="{{ asset('./illustration/'.$ills->foto) }}" style="width: 20rem">
                        </div>
                        <div class="col">
                            <p class="h3">Ilustrasi Baru</p>
                            <input type="file" name="foto" id="foto" class="form-control">
                            <img id="preview" src="#" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <p class="h3">Tagline</p>
                        <input type="text" class="form-control" name="text_head" value="{{$ills->text_head}}">
                        <p class="h3">description</p>
                        <textarea name="text_body" class="form-control" cols="30" rows="3">{{$ills->text_body}}</textarea>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
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