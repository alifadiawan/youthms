@extends('layout.admin')
@section('content-title', 'Landing Page Our Partner')
@section('judul', 'Landing Page | Edit Partner')
@section('content')

    <div class="container">

        <div class="content">
            <h1 class="h3 font-weight-bold">Edit Our Partners</h1>
            <div class="card mb-2">
                <div class="card-body">
                    <form action="{{route('landing.partner_update', $partner->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Partner Lama : </label>
                                    <br><br><br>
                                    <img src="{{asset('./partner/'.$partner->partner)}}" id="lama">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="partner">Partner Baru : </label>
                                    <input type="file" name="partner" id="partner" class="form-control">
                                    <img id="preview" src="#" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="text-start btn btn-warning">Edit</button>
                            <br>
                            <a href="{{route('landing.illustration')}}" class="text-start btn btn-secondary">Cancel</a>
                        </div>
                    </form>
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

        #lama {
            width: 100%;
            height: 200px;
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
