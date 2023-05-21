@extends('layout.admin')
@section('content-title', 'Portofolio')
@section('content')
@section('judul', 'Portofolio')


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-5 p-5">
                <div class="row">
                    <div class="col">
                        <p class="h3">Ilustrasi Lama</p>
                        <img id="illustration" src="{{ asset('illustration/group-390.png') }}" style="width: 20rem">
                    </div>
                    <div class="col">
                        <p class="h3">Ilustrasi Baru</p>
                        <input type="file" name="partner" id="partner" class="form-control">
                        <img id="preview" src="#" class="form-control">
                    </div>
                </div>
                
                <div class="row mt-3">
                    <p class="h3">Tagline</p>
                    <input type="text" class="form-control" value="Some of Our Amazing Projects">
                    <p class="h3">description</p>
                    <textarea name="" class="form-control" id="" cols="30" rows="3"> </textarea>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <a href="" class="btn btn-success">Submit</a>
                    </div>
                </div>
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
     document.getElementById("partner").addEventListener("change", function() {
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