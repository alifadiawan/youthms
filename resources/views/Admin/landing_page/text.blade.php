@extends('layout.admin')
@section('content-title', 'Landing Page')
@section('judul', 'Landing Page | Text')
@section('content')

    <div class="container">
        <p class="h3">Welcome Page text</p>
        <div class="card p-3">
            <div class="card-body">
                @foreach ($text as $item)
                    <p class="h4 font-weight-bold">Mainline :</p>
                    <p class="h3 font-weight-bold">{{ $item->mainline }}</p>
                    <p class="h4 font-weight-bold">Secondline</p>
                    <p>{{ $item->secondline }}</p>
                    <a href="{{ route('landingpage.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                @endforeach
            </div>
        </div>

    </div>

@endsection
