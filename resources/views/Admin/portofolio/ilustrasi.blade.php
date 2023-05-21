@extends('layout.admin')
@section('content-title', 'Porto Page Illustration')
@section('content')
@section('judul', 'Porto Page Illustration')




<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <img id="illustration" src="{{ asset('illustration/group-390.png') }}" style="width: 20rem">
                        </div>
                        <div class="col">
                            <h1 class="h3 font-weight-bold">Some of Our Amazing Projects</h1>
                            <p>Because actions speak louder than words, we help you build better software today for your
                                better tomorrow. When you choose Youthms to develop and service your software, you are
                                joining hundreds of satisfied clients and market leader</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <a href="" class="text-start btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
