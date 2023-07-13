@extends('layout.admin')
@section('content-title', 'Landing Page')
@section('judul', 'Landing Page | Data')
@section('content')

    <div class="container">

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="text-left">
                        <h1 class="h3 font-weight-bold">Testimonial</h1>
                    </div>
                    <div class="text-right">
                        <a href="{{route('landing.data_create')}}" class="btn btn-md btn-success">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card">
            @foreach($data as $d)
                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col-4 col-12">
                            <img id="testi" src="{{ asset('./testimonial/'.$d->foto) }}">
                        </div>
                    </div>

                    <div class="row justify-content-center w-100">
                        <div class="col">
                            <form action="" method="get">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <p>{{$d->nama}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <p>{{$d->jabatan}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Review</label>
                                    <p>{{$d->review}}</p>
                                </div>
                            </form>
                            <a href="{{route('landing.data_edit', $d->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('landing.data_hapus', $d->id)}}" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>




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
            @endforeach
                <div class="card-footer d-flex justify-content-end">
                    {{$data->links()}}
                </div>
            </div>
        </div>

<style>
    #testi {
        width: 100%;
        height: 200px;
        object-fit: contain;
    }

    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -7.5px;
        margin-left: -7.5px;
        justify-content: space-between;
    }
</style>
    @endsection
