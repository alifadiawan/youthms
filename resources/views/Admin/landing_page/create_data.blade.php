@extends('layout.admin')
@section('content-title', 'Landing Page Data')
@section('judul', 'Landing Page | Create Data')
@section('content')

<div class="container">

        <div class="content">
            <h1 class="h3 font-weight-bold">Tambah Testimonial</h1>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('landing.data_store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="foto">Photo : </label>
                                    <input type="file" name="foto" id="foto" class="form-control">
                                    <img id="preview" src="#" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center w-100">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" id="jabatan">
                                </div>
                                <div class="form-group">
                                    <label for="">Review</label>
                                    <textarea name="review" class="form-control" id="review" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-warning">Submit</button>
                                    <a href="{{route('landing.data')}}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>




                    <!-- desciption box -->
                    <!-- {{-- <div class="row mt-5">
                        <div class="col">
                            <h4>Edit Description</h4>
                            <form>
                                <textarea class="form-control summernote"></textarea>
                                <br>
                                <button class="btn btn-md btn-success">Simpan</button>
                            </form>
                        </div>
                    </div> --}} -->

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
            document.getElementById("foto").addEventListener("change", function() {
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