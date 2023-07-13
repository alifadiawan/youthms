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
                        @foreach($ills as $i)
                        <div class="col-lg-5 col-12">
                            <img id="illustration" src="{{ asset('./illustration/'.$i->foto) }}" style="width: 20rem">
                        </div>
                        <div class="col-12">
                            <h1 class="h3 font-weight-bold">{{$i->text_head}}</h1>
                            <p>{{$i->text_body}}</p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <a href="{{route('portofolio.edit_ilustrasi', $i->id)}}" class="text-start btn btn-warning">Edit</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
