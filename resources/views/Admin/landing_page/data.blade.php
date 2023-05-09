@extends('layout.admin')
@section('content-title', 'Landing Page')
@section('judul', 'Landing Page | Data')
@section('content')

    <div class="container">

        <div class="content">
            <h1 class="h3 font-weight-bold">Testimonial</h1>
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col-4">
                            <img src="{{ asset('youth-logo-nobg.png') }}" style="height: 300px">
                        </div>
                    </div>

                    <div class="row justify-content-center w-100">
                        <div class="col">
                            <form action="" method="get">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <p>Steven Alden</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <p>Wirausaha</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Review</label>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti aliquid blanditiis odio, ipsa sunt reiciendis, temporibus, molestiae recusandae ducimus ipsam labore a? Numquam eveniet quaerat expedita, fuga ut ipsum officiis.
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta aut non quam perspiciatis corporis possimus doloribus inventore repudiandae ratione eius, impedit omnis eveniet at nam officia nihil dolorem commodi voluptates.
                                    </p>
                                </div>
                            </form>
                            <a href="/data/edit" class="btn btn-warning">Edit</a>
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


    @endsection
