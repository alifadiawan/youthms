@extends('layout.admin')
@section('content-title', 'Landing Page')
@section('judul', 'Landing Page')
@section('content')

    <div class="container">

        <div class="content">
            <h2 class="font-weight-bold h2 fs-">Illustration</h2>

        </div>
        <div class="content">
            <h2 class="font-weight-bold h2 fs-">Data</h2>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="file" name="image" id="image" class="form-control">
                        <img id="preview" src="#" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="file" name="image" id="image2" class="form-control">
                        <img id="preview2" src="#" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="file" name="image" id="image3" class="form-control">
                        <img id="preview3" src="#" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="file" name="image" id="image4" class="form-control">
                        <img id="preview4" src="#" class="form-control">
                    </div>
                </div>
                </form>
            </div>

        </div>
        <div class="content">
            <!-- Carousel images -->
        </div>
        <div class="content">
            <h2 class="font-weight-bold h2 fs-">Text</h2>

        </div>


        <!-- desciption box -->
        <div class="row mt-5">
            <div class="col">
                <h4>Edit Description</h4>
                <form>
                    <textarea class="form-control summernote"></textarea>
                    <br>
                    <button class="btn btn-md btn-success">Simpan</button>
                </form>
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
