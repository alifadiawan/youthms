@extends('layout.admin')
@section('content-title', 'Edit Portofolio')
@section('content')
@section('judul', 'Edit Portofolio')


<div class="card">
    <div class="card-body">
        <div class="content">
            
            <div class="row mb-4">
                <div class="col-4">
                    <p>Client / Company</p>
                    <input type="text" placeholder="pertamini" class="form-control" name="" id="">
                    <p>Comment</p>
                    <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="col">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="illustration">Cover Lama : </label>
                    <img src="{{ asset('/illustration/bmw.jpg') }}">
                </div>
                <div class="col">
                    <label for="illustration">Screenshot Lama : </label>
                    <img src="{{ asset('/illustration/bmw.jpg') }}">
                </div>
                <div class="col">
                    <label for="illustration">Screenshot Lama : </label>
                    <img src="{{ asset('/illustration/bmw.jpg') }}">
                </div>
                <div class="col">
                    <label for="illustration">Screenshot Lama : </label>
                    <img src="{{ asset('/illustration/bmw.jpg') }}">
                </div>
                <div class="col">
                    <label for="illustration">Screenshot Lama : </label>
                    <img src="{{ asset('/illustration/bmw.jpg') }}">
                </div>
                <div class="col">
                    <label for="illustration">Screenshot Lama : </label>
                    <img src="{{ asset('/illustration/bmw.jpg') }}">
                </div>
            </div>


            <div class="row mt-5">
                <div class="col">
                    <div class="form-group">
                        <label for="illustration">Cover Baru : </label>
                        <input type="file" name="illustration" id="illustration" class="form-control">
                        <img id="preview" src="#" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="illustration">Screenshot Baru : </label>
                        <input type="file" name="illustration" id="illustration2" class="form-control">
                        <img id="preview2" src="#" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="illustration">Screenshot Baru : </label>
                        <input type="file" name="illustration" id="illustration3" class="form-control">
                        <img id="preview3" src="#" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="illustration">Screenshot Baru : </label>
                        <input type="file" name="illustration" id="illustration4" class="form-control">
                        <img id="preview4" src="#" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="illustration">Screenshot Baru : </label>
                        <input type="file" name="illustration" id="illustration5" class="form-control">
                        <img id="preview5" src="#" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="illustration">Screenshot Baru : </label>
                        <input type="file" name="illustration6" id="illustration6" class="form-control">
                        <img id="preview6" src="#" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="" class="btn btn-warning">Submit</a>
                <a href="/portofolio" class="btn btn-outline-secondary">Cancel</a>
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

    #preview2 {
        width: 100%;
        height: 190px;
        object-fit: contain;
    }

    #preview3 {
        width: 100%;
        height: 190px;
        object-fit: contain;
    }

    #preview4 {
        width: 100%;
        height: 190px;
        object-fit: contain;
    }

    #preview5 {
        width: 100%;
        height: 190px;
        object-fit: contain;
    }

    #preview6 {
        width: 100%;
        height: 190px;
        object-fit: contain;
    }
</style>
<script>
    document.getElementById("illustration").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById("preview");
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(this.files[0]);
    });

    document.getElementById("illustration2").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById("preview2");
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(this.files[0]);
    });

    document.getElementById("illustration3").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById("preview3");
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(this.files[0]);
    });

    document.getElementById("illustration4").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById("preview4");
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(this.files[0]);
    });

    document.getElementById("illustration5").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById("preview5");
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(this.files[0]);
    });

    document.getElementById("illustration6").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById("preview6");
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>

@endsection
