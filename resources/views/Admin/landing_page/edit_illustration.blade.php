@extends('layout.admin')
@section('content-title', 'Landing Page Edit Illustration')
@section('judul', 'Landing Page | Edit Illustration')
@section('content')

    <div class="container">
        <h1 class="h3 font-weight-bold">Landing page Edit Illustration</h1>
        <div class="card mb-5">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="form-group">
                        <input type="file" name="image" id="image" class="form-control">
                        <img id="preview" src="#" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <a href="/landing-page/edit" class="text-start btn btn-warning">Submit</a>
                    <a href="/landing-page/illustration" class="text-start btn btn-secondary">Cancel</a>
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
    </script>


@endsection
