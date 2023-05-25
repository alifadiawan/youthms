@extends('layout.admin')
@section('content-title', 'Landing Page')
@section('judul', 'Landing Page | Text')
@section('content')

    <div class="container">
        <p class="h3">Welcome Page text</p>
        <div class="card p-3">
            <div class="card-body">
                @foreach ($text as $item)
                    <p class="h3 ">Mainline :</p>
                    <h1 class="h2 font-weight-bold">{{ $item->mainline }}</h1>
                    <br>
                    <p class="h3 ">Secondline :</p>
                    <p class="h2 font-weight-bold">{{ $item->secondline }}</p>
                    <br>
                    <p class="h3">ThirdLine :</p>
                    <p class="h2 font-weight-bold">We Will Help You to Expand Your Busniess</p>
                    <br>
                    <a href="{{route('landing.text_edit', $item->id)}}" class="btn btn-warning">Edit</a>
                @endforeach
            </div>
        </div>

    </div>

@endsection
