@extends('layout.admin')
@section('content-title', 'Landing Page Illustration')
@section('judul', 'Landing Page | Illustration')
@section('content')

    <div class="container">

        <!-- Welcome page illustration -->
        <div class="content">
            <h1 class="h3 font-weight-bold">Landing page Picture</h1>
            <div class="card mb-5">
                <div class="card-body">
                    @foreach ($illustration as $i)
                        <div class="row justify-content-center">
                            <img id="illustration" src="{{ asset('./illustration/' . $i->illustration) }}">
                        </div>
                        <br>
                        <div class="row">
                            <a href="{{ route('landing.illustration_edit', $i->id) }}"
                                class="text-start btn btn-warning">Edit</a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Our Partners -->
            <div class="container">
                <div class="row haha">
                    <div class="text-left">
                        <h1 class="h3 font-weight-bold">Testimonial</h1>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @foreach ($partner as $p)
                        <div class="col">
                            <img id="partner" src="{{ asset('./partner/' . $p->partner) }}">
                            
                        </div>
                        <div class="col mt-3">
                            <a href="{{ route('landing.partner_create') }}" class="btn btn-md btn-success"><i
                                class="fa-solid fa-plus"></i> Tambah</a>
                        <a href="{{ route('landing.partner_edit', $p->id) }}" class="text-start btn btn-warning"><i
                                class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <a href="{{ route('landing.partner_hapus', $p->id) }}" class="text-start btn btn-danger"><i
                                class="fa-solid fa-trash"></i> Hapus</a>
                        </div>
                    @endforeach
                    <div class="mt-3">
                        {{ $partner->links() }}
                    </div>
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

        .haha {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -7.5px;
            margin-left: -7.5px;
            justify-content: space-between;
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
