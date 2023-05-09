@extends('layout.admin')
@section('content-title', 'Landing Page Data')
@section('judul', 'Landing Page | Edit Data')
@section('content')

<div class="container">

        <div class="content">
            <h1 class="h3 font-weight-bold">Edit Testimonial</h1>
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div class="form-group">
                                <input type="file" name="image" id="image" class="form-control">
                                <img id="preview" src="#" class="form-control">
                            </div>
                            {{-- <img src="{{ asset('youth-logo-nobg.png') }}" style="height: 300px"> --}}
                        </div>
                    </div>

                    <div class="row justify-content-center w-100">
                        <div class="col">
                            <form action="" method="get">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="">
                                </div>
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <input type="text" class="form-control" name="">
                                </div>
                                <div class="form-group">
                                    <label for="">Review</label>
                                    <input type="text" class="form-control" name="">
                                </div>
                                <div class="form-group">
                                    <label for="">Review</label>
                                    <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                            </form>
                            <a href="/data/edit" class="btn btn-warning">Submit</a>
                            <a href="/landing-page/data/" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>




                    <!-- desciption box -->
                    {{-- <div class="row mt-5">
                        <div class="col">
                            <h4>Edit Description</h4>
                            <form>
                                <textarea class="form-control summernote"></textarea>
                                <br>
                                <button class="btn btn-md btn-success">Simpan</button>
                            </form>
                        </div>
                    </div> --}}

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