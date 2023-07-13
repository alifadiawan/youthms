@extends('layout.admin')
@section('content-title', 'Landing Page Edit Illustration')
@section('judul', 'Edit Illustration')
@section('content')

    <div class="container">
        <h1 class="h3 font-weight-bold">Landing page Edit Illustration</h1>
        <div class="card mb-5">
            <div class="card-body">
                <form action="{{route('landing.illustration_update', $illustration->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-center ">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label>Illustration Lama : </label>
                                <img src="{{asset('./illustration/'.$illustration->illustration)}}" id="lama">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="illustration">Illustration Baru : </label>
                                <input type="file" name="illustration" id="illustration" class="form-control">
                                <img id="preview" src="#" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button class="text-start btn btn-warning">Submit</button>
                        <a href="{{route('landing.illustration')}}" class="text-start btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        #preview {
                width: 100%;
                height: 190px;
                object-fit: contain;
        }
        #lama {
            width: 100%;
            height: 250px;
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
    </script>


@endsection
