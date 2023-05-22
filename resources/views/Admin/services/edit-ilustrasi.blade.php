@extends('layout.admin')
@section('content-title', 'Services Illustration')
@section('content')
@section('judul', 'Services Illustration')

<div class="container">
    <form action="{{route('services.ilustrasi_update', $ills->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                                        <img id="illustration" src="{{ asset('./illustration/'.$ills->hero_ills) }}"
                                            style="width: 18rem">
                                    </div>
                                    <div class="col">
                                        <p class="h3">Ilustrasi Baru</p>
                                        <input type="file" name="hero_ills" id="hero_ills" class="form-control">
                                        <img id="preview" src="#" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <p class="h3">Tagline :</p>
                            <input type="text" class="form-control"
                                value="{{$ills->hero_text}}"
                                name="hero_text" id="hero_text">
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
                                    <img id="illustration" src="{{ asset('./illustration/'.$ills->ills1) }}"
                                        style="width: 18rem">
                                </div>
                                <br>
                            </div>
                            <div class="col">
                                <h1 class="h3 font-weight-bold">Aplikasi Illustration Lama</h1>
                                <div class="row justify-content-center">
                                    <img id="illustration" src="{{ asset('./illustration/'.$ills->ills2) }}"
                                        style="width: 18rem">
                                </div>
                                <br>
                            </div>
                            <div class="col">
                                <h1 class="h3 font-weight-bold">Editing Illustration Lama</h1>
                                <div class="row justify-content-center">
                                    <img id="illustration" src="{{ asset('./illustration/'.$ills->ills3) }}"
                                        style="width: 18rem">
                                </div>
                                <br>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <p class="h3">Ilustrasi Baru</p>
                                <input type="file" name="ills1" id="ills1" class="form-control">
                                <img id="preview2" src="#" class="form-control">
                            </div>
                            <div class="col">
                                <p class="h3">Ilustrasi Baru</p>
                                <input type="file" name="ills2" id="ills2" class="form-control">
                                <img id="preview3" src="#" class="form-control">
                            </div>
                            <div class="col">
                                <p class="h3">Ilustrasi Baru</p>
                                <input type="file" name="ills3" id="ills3" class="form-control">
                                <img id="preview4" src="#" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <button class="text-start btn btn-warning">Edit</button>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </form>
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
    document.getElementById("hero_ills").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById("preview");
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(this.files[0]);
    });


    document.getElementById("ills1").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById("preview2");
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(this.files[0]);
    });


    document.getElementById("ills2").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById("preview3");
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(this.files[0]);
    });


    document.getElementById("ills3").addEventListener("change", function() {
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
