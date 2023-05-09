@extends('layout.admin')
@section('content-title', 'Landing Page Illustration')
@section('judul', 'Landing Page | Illustration')
@section('content')

    <div class="container">

        <!-- Welcome page illustration -->
        <div class="content">
            <h1 class="h3 font-weight-bold">Landing page Illustration</h1>
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <img id="illustration" src="{{ asset('illustration/group-390.png') }}">
                    </div>
                    <div class="row">
                        <a href="/landing-page/edit" class="text-start btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>

            <!-- Our Partners -->
            <h1 class="h3 font-weight-bold">Our Partners</h1>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('youth-logo-nobg.png') }}" alt="">
                        </div>
                        <div class="col">
                            <img src="{{ asset('youth-logo-nobg.png') }}" alt="">
                        </div>
                        <div class="col">
                            <img src="{{ asset('youth-logo-nobg.png') }}" alt="">
                        </div>
                        <div class="col">
                            <img src="{{ asset('youth-logo-nobg.png') }}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <a href="/our-partners/edit" class="text-start btn btn-warning">Edit</a>
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

        #illustration {
            width: 500px;
            height: 500px;
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
