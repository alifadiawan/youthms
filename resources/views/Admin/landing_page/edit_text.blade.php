@extends('layout.admin')
@section('content-title', 'Landing Page edit Data')
@section('judul', 'Landing Page | Edit Data')
@section('content')


    <div class="container">
        <p class="h3">Welcome Page text</p>
        <div class="card p-3">
            <div class="card-body">
                <form action="">
                    <div class="form-group mb-3">
                        <p class="font-weight-bold">Mainline :</p>
                        <input type="text" class="form-control" name="" id="">
                    </div>
                    <div class="form-group mb-3">
                        <p class="font-weight-bold">Secondline</p>
                        <input type="text" class="form-control" name="" id="">
                    </div>
                    <div class="form-group">
                        <a href="" class="btn btn-warning">Submit</a>
                        <a href="/landing-page/text" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection
