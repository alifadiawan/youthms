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
                    @foreach($illustration as $i)
                    <div class="row justify-content-center">
                        <img id="illustration" src="{{ asset('./illustration/'.$i->illustration) }}">
                    </div>
                    <br>
                    <div class="row">
                        <a href="{{route('landing.illustration_edit', $i->id)}}" class="text-start btn btn-warning">Edit</a>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Our Partners -->
            <h1 class="h3 font-weight-bold">Our Partners</h1>
            <div class="card">
                <div class="card-body">
                    @foreach($partner as $p)
                    <div class="col">
                        <img id="partner" src="{{ asset('./partner/'.$p->partner) }}">
                        <a href="{{route('landing.partner_edit', $p->id)}}" class="text-start btn btn-warning">Edit</a>
                    </div>
                    @endforeach
                </div>
                <div class="card-footer  d-flex justify-content-end">
                    {{$partner->links()}}
                </div>
            </div>

        </div>
    </div>

    <style>
        /*#preview {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }*/

        #illustration {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }

        #partner {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }

    </style>

    <!-- <script>
        document.getElementById("image").addEventListener("change", function() {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById("preview");
                preview.src = reader.result;
                preview.style.display = "block";
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script> -->

@endsection
