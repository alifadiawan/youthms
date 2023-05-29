@extends('layout.admin')
@section('content-title', 'Edit User')
@section('content')
@section('judul', 'Edit User')

<div class="container">
    <div class="col-lg-12">
        <form class="form" action="{{ route('user.update', $user->id) }}" method="post">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        @csrf
                        @method('PUT')
                        <div class="row my-3">
                            <div class="col-sm-3">
                                <p class="h5 font-weight-bold mb-0">Username</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{ $user->username }}" name="username"
                                    id="username">
                            </div>
                        </div>
                        <hr>
                        <div class="row my-3">
                            <div class="col-sm-3">
                                <p class="h5 font-weight-bold mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{ $user->email }}"name="email"
                                        id="email">
                            </div>
                        </div>
                        <hr>
                        <div class="row my-3">
                            <div class="col-sm-3">
                                <p class="h5 font-weight-bold mb-0">Role</p>
                            </div>
                            <div class="col-sm-9">
                                @if (auth()->user()->roles->contains('role', 'admin'))
                                        <select class="form-control form-select" name="role_id[]" id="role_id[]" multiple>
                                            <option>Pilih Role</option>
                                            @foreach ($role as $r)
                                                <option value="{{ $r->id }}"
                                                    {{ $user->roles->pluck('id')->contains($r->id) ? 'selected' : '' }}>
                                                    {{ $r->role }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select disabled class="form-control form-select" name="role_id[]" id="role_id[]" multiple>
                                            @foreach ($role as $r)
                                                <option value="{{ $r->id }}"
                                                    {{ $user->roles->pluck('id')->contains($r->id) ? 'selected' : '' }}>
                                                    {{ $r->role }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row my-3">
                            <div class="col-sm-3">
                                <p class="h5 font-weight-bold mb-0">Password</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" type="password"
                                        placeholder="!! Hanya Isi Jika Ingin Ganti Password !!" name="password"
                                        id="password">
                            </div>
                        </div>
                        <hr>
                        {{-- <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" value="{{ $user->username }}"
                                        name="username" id="username">
                                </div>      
                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    @if (auth()->user()->role->role == 'admin')
                                        <select class="form-control form-select" name="role_id" id="role_id">
                                            <option>Pilih Role</option>
                                            @foreach ($role as $r)
                                                <option value="{{ $r->id }}"
                                                    @if ($r->id == $user->role->id) selected @endif>
                                                    {{ $r->role }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select disabled class="form-control form-select" name="role_id" id="role_id">
                                            @foreach ($role as $r)
                                                <option value="{{ $r->id }}"
                                                    @if ($r->id == $user->role->id) selected @endif>
                                                    {{ $r->role }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    <br>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password"
                                        placeholder="!! Hanya Isi Jika Ingin Ganti Password !!" name="password"
                                        id="password">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="text" value="{{ $user->email }}"name="email"
                                        id="email">
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Simpan</button>
                <a class="btn btn-secondary" href="{{URL()->previous()}}">Batal</a>
            </div>
        </form>
    </div>
</div>



@endsection
