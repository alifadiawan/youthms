@extends('layout.admin')
@section('content-title', 'Services Illustration')
@section('content')
@section('judul', 'Services Illustration')

<div class="container">
    <!-- hero -->
    <div class="row">
        <div class="col">
            <h1 class="h3 font-weight-bold text-center">Hero</h1>
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="row justify-content-center ">
                                <div class="col">
                                    <p class="h3">Ilustrasi Lama</p>
                                    <img id="illustration" src="{{ asset('illustration/services.png') }}"
                                        style="width: 18rem">
                                </div>
                                <div class="col">
                                    <p class="h3">Ilustrasi Baru</p>
                                    <input type="file" name="partner" id="partner" class="form-control">
                                    <img id="preview" src="#" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <p class="h3">Tagline :</p>
                        <input type="text" class="form-control"
                            value="YouthMS memiliki 3 jenis layanan yang bergerak dibidang Aplikasi, Desain, dan Editing"
                            name="" id="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- 3 seksi -->
    <div class="row">
        <!--  ilustrasi 1-->
        <div class="col">

            <div class="card mb-5">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col">
                            <h1 class="h3 font-weight-bold">Design Illustration Lama</h1>
                            <div class="row justify-content-center">
                                <img id="illustration" src="{{ asset('illustration/service1.png') }}"
                                    style="width: 18rem">
                            </div>
                            <br>
                        </div>
                        <div class="col">
                            <h1 class="h3 font-weight-bold">Aplikasi Illustration Lama</h1>
                            <div class="row justify-content-center">
                                <img id="illustration" src="{{ asset('illustration/service1.png') }}"
                                    style="width: 18rem">
                            </div>
                            <br>
                        </div>
                        <div class="col">
                            <h1 class="h3 font-weight-bold">Editing Illustration Lama</h1>
                            <div class="row justify-content-center">
                                <img id="illustration" src="{{ asset('illustration/service1.png') }}"
                                    style="width: 18rem">
                            </div>
                            <br>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <p class="h3">Ilustrasi Baru</p>
                            <input type="file" name="illustration" id="design" class="form-control">
                            <img id="preview2" src="" class="form-control">
                        </div>
                        <div class="col">
                            <p class="h3">Ilustrasi Baru</p>
                            <input type="file" name="illustration" id="aplikasi" class="form-control">
                            <img id="preview3" src="" class="form-control">
                        </div>
                        <div class="col">
                            <p class="h3">Ilustrasi Baru</p>
                            <input type="file" name="illustration" id="editing" class="form-control">
                            <img id="preview4" src="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <a href="" class="text-start btn btn-warning">Edit</a>
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


        document.getElementById("design").addEventListener("change", function() {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById("preview2");
                preview.src = reader.result;
                preview.style.display = "block";
            }
            reader.readAsDataURL(this.files[0]);
        });


        document.getElementById("aplikasi").addEventListener("change", function() {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById("preview3");
                preview.src = reader.result;
                preview.style.display = "block";
            }
            reader.readAsDataURL(this.files[0]);
        });


        document.getElementById("editing").addEventListener("change", function() {
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
