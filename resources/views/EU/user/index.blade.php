@extends('layout-landing2.body')
@section('title', '| Profile')
@section('content')

    <section id="profile" class="container mt-5">
        <h1>Profile</h1>
        @if (auth()->user()->hasIncompleteProfile())
            <div class="alert alert-warning" role="alert">
                Lengkapi data diri dulu. <a href="/edit-profile">Edit</a>
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-body">
                @foreach ($users as $u)
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">username</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text mb-0">{{ $u->username }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text mb-0">{{ $u->email }}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach

                @if ($member->isEmpty())
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nama Lengkap</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Johnatan Smith</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nomor Telp</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">(097) 234-5678</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">NIK</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">3578231290</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Alamat</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                        </div>
                    </div>
                @endif
                @foreach ($member as $m)
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nama Lengkap</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text mb-0">{{ $m->name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nomor Telp</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text mb-0">{{ $m->no_hp }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">NIK</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text mb-0">{{ $m->nik }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Alamat</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text mb-0">{{ $m->alamat }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <a href="{{ route('user.edit', $uid) }}" class="btn btn-warning">Edit</a>
    </section>

@endsection
