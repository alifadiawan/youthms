@extends('layout.admin')
@section('content-title','Detail layanan')
@section('content')

<div class="col">
    <a class="btn btn-secondary" href="{{url('/services')}}">
        Back
    </a>
</div>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body bg-white shadow-md rounded">
                    {{-- ID Layanan --}}
                    <div class="row">
                        <div class="col">
                            <strong>ID Pelanggan</strong>
                        </div>
                        <div class="col">
                            <p>021808</p>
                        </div>
                    </div>

                    {{-- Jenis Layanan --}}
                    <div class="row">
                        <div class="col">
                            <strong>Jenis Layanan</strong>
                        </div>
                        <div class="col">
                            <p>Aplikasi</p>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="row">
                        <div class="col">
                            <strong>Judul</strong>
                        </div>
                        <div class="col">
                            <p>Desain Aplikasi</p>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="row">
                        <div class="col">
                            <strong>Deskripsi</strong>
                        </div>
                        <div class="col">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium sed iure, necessitatibus magni rerum odio dignissimos debitis est perspiciatis optio pariatur nostrum nam odit unde alias expedita dolor delectus ipsum.</p>
                        </div>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection