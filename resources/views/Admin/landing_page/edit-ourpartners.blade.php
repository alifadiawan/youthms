@extends('layout.admin')
@section('content-title', 'Landing Page Our Partner')
@section('judul', 'Landing Page | Edit Our Partner')
@section('content')

    <div class="container">

        <div class="content">
            <h1 class="h3 font-weight-bold">Edit Our Partners</h1>
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="form-group m-2">
                            <input type="file" name="image" id="image" class="form-control">
                            <img id="preview" src="#" class="form-control">
                        </div>
                        <div class="form-group m-2">
                            <input type="file" name="image" id="image2" class="form-control">
                            <img id="preview2" src="#" class="form-control">
                        </div>
                        <div class="form-group m-2">
                            <input type="file" name="image" id="image3" class="form-control">
                            <img id="preview3" src="#" class="form-control">
                        </div>
                        <div class="form-group m-2">
                            <input type="file" name="image" id="image4" class="form-control">
                            <img id="preview4" src="#" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <a href="" class="text-start btn btn-warning">Edit</a>
                        <a href="/landing-page/illustration" class="text-start btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        #preview {
                width: 100%;
                height: 200px;
                object-fit: contain;
            }
        #preview2 {
                width: 100%;
                height: 200px;
                object-fit: contain;
            }
        #preview3 {
                width: 100%;
                height: 200px;
                object-fit: contain;
            }
        #preview4 {
                width: 100%;
                height: 200px;
                object-fit: contain;
            }
    </style>
    <script>
        document.getElementById("image").addEventListener("change", function() {
                var reader = new FileReader();
                reader.onload = function() {
                    var preview = document.getElementById("preview");
                    preview.src = reader.result;
                    preview.style.display = "block";
                }
                reader.readAsDataURL(this.files[0]);
            });

        document.getElementById("image2").addEventListener("change", function() {
                var reader = new FileReader();
                reader.onload = function() {
                    var preview = document.getElementById("preview2");
                    preview.src = reader.result;
                    preview.style.display = "block";
                }
                reader.readAsDataURL(this.files[0]);
            });

        document.getElementById("image3").addEventListener("change", function() {
                var reader = new FileReader();
                reader.onload = function() {
                    var preview = document.getElementById("preview3");
                    preview.src = reader.result;
                    preview.style.display = "block";
                }
                reader.readAsDataURL(this.files[0]);
            });

        document.getElementById("image4").addEventListener("change", function() {
                var reader = new FileReader();
                reader.onload = function() {
                    var preview = document.getElementById("preview4");
                    preview.src = reader.result;
                    preview.style.display = "block";
                }
                reader.readAsDataURL(this.files[0]);
            });
    </script>

@endsection
