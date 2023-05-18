@extends('layout-landing2.body')
@section('title', '| Profile')
@section('content')

    <section id="profile" class="container mt-5">
        <h1>Edit Profile</h1>
        <form action="">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nama Lengkap</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="nama lengkap" name=""
                                id="">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="example@gmail.com">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nomor Telp</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" placeholder="087654">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">NIK</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="" id="" placeholder="3578231">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Alamat</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Indonesia">
                        </div>
                    </div>
                </div>
            </div>
            <a href="/profile" class="btn yms-blue">Submit</a>
            <a href="/profile" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </section>

@endsection
