@extends('layout.admin')
@section('content-title', 'Services Illustration')
@section('content')
@section('judul', 'Services Illustration')

<div class="container">

    <div class="row">
        <div class="col">
            <div class="card mb-5">
                <div class="card-body">
                    <h1 class="h3 font-weight-bold text-center">Hero</h1>
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="row justify-content-center ">
                                <img id="illustration" src="{{ asset('illustration/services.png') }}"
                                    style="width: 18rem">
                            </div>
                        </div>
                        <div class="col">
                            <h1 class="h3 ">YouthMS memiliki 3 jenis layanan yang bergerak dibidang Aplikasi, Desain,
                                dan Editing</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <!--  ilustrasi 1-->
        <div class="col">

            <div class="card mb-5">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col">
                            <h1 class="h3 font-weight-bold">Design Illustration</h1>
                            <div class="row justify-content-center">
                                <img id="illustration" src="{{ asset('illustration/service1.png') }}"
                                    style="width: 18rem">
                            </div>
                            <br>
                            <div class="row">
                                <a href="" class="text-start btn btn-warning">Edit</a>
                            </div>
                        </div>
                        <div class="col">
                            <h1 class="h3 font-weight-bold">Aplikasi Illustration</h1>
                            <div class="row justify-content-center">
                                <img id="illustration" src="{{ asset('illustration/service1.png') }}"
                                    style="width: 18rem">
                            </div>
                            <br>
                        </div>
                        <div class="col">
                            <h1 class="h3 font-weight-bold">Editing Illustration</h1>
                            <div class="row justify-content-center">
                                <img id="illustration" src="{{ asset('illustration/service1.png') }}"
                                    style="width: 18rem">
                            </div>
                            <br>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
