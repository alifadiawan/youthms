@extends('layout.admin')
@section('content-title', 'Akun Detail')
@section('content')
@section('judul', 'Akun Detail')

<div class="container">
    <div class="row">
        @if (auth()->user()->role->role == 'admin' || auth()->user()->role->role == 'owner' || auth()->user()->id == $user->id)
            <div class="col-lg-12">
            @else
                <div class="col-lg-12">
        @endif
        <div class="card">
            <div class="container p-3">
                <p class="h4 text-center text-bold mt-2">AKUN</p>
                <div class="row my-3">
                    <div class="col-sm-3">
                        <p class="h5 font-weight-bold mb-0">Username</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text mb-0">{{ $user->username }}</p>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-sm-3">
                        <p class="h5 font-weight-bold mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text mb-0">{{ $user->email }}</p>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-sm-3">
                        <p class="h5 font-weight-bold mb-0">Password</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text mb-0">{{ $user->password }}</p>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-sm-3">
                        <p class="h5 font-weight-bold mb-0">Role</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text mb-0 text-capitalize">{{$user->role->role}}</p>
                    </div>
                </div>
                <hr>
                @if (auth()->user()->role->role == 'admin' || auth()->user()->role->role == 'owner' || auth()->user()->id == $user->id)
                    <div class="row my-3">
                        <div class="col">
                            <button class="btn btn-md btn-warning" data-toggle="modal"
                                data-target="#editakunmodal"><strong>Edit Akun</strong></button>
                            <button class="btn btn-md btn-danger" data-toggle="modal"
                                data-target="#hapusmodal"><strong>Hapus</strong></button>
                        </div>
                    </div>
                @endif
            </div>

            {{-- <table class="table table-borderless">
                    <tbody>
                    <p class="h4 text-center text-bold mt-2">AKUN</p><hr>
                        <tr>
                            <td class="text-center"><strong>Username</strong></td>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Email</strong></td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Password</strong></td>
                            <td>{{ $user->password }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Role</strong></td>
                            <td>{{ $user->role->role }}</td>
                        </tr>
                    </tbody>
                </table> --}}
            {{-- <table class="table table-borderless">
                <tbody>
                    <p class="h4 text-center text-bold mt-2">PROFILE</p>
                    <hr>
                    @if ($user->hasIncompleteProfile())
                        <div class="alert alert-warning mt-2">
                            Biodata Belum di Isi Oleh User.
                        </div>
                    @else
                        @foreach ($member as $m)
                            <tr>
                                <td class="text-center"><strong>Kode Employee</strong></td>
                                <td>{{ $m->id_member }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>NIK</strong></td>
                                <td>{{ $m->nik }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Name</strong></td>
                                <td>{{ $m->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Alamat</strong></td>
                                <td>{{ $m->alamat }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>No. HP</strong></td>
                                <td>{{ $m->no_hp }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table> --}}

        </div>
        <div class="card">
            <div class="container p-3">
                <p class="h4 text-center text-bold mt-2">PROFILE</p>
                @if ($user->hasIncompleteProfile())
                    <div class="alert alert-warning mt-2">
                        Biodata Belum di Isi Oleh User.
                    </div>
                @else
                    @foreach ($member as $m)
                        <div class="row my-3">
                            <div class="col-sm-3">
                                <p class="h5 font-weight-bold mb-0">Kode Employee</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text mb-0">{{ $m->id_member }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row my-3">
                            <div class="col-sm-3">
                                <p class="h5 font-weight-bold mb-0">Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text mb-0">{{ $m->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row my-3">
                            <div class="col-sm-3">
                                <p class="h5 font-weight-bold mb-0">NIK</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text mb-0">{{ $m->nik }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row my-3">
                            <div class="col-sm-3">
                                <p class="h5 font-weight-bold mb-0">Nomor HP</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text mb-0">{{ $m->no_hp }}</p>
                            </div>
                        </div>
                        <hr>
                        @if (auth()->user()->role->role == 'admin' || auth()->user()->role->role == 'owner' || auth()->user()->id == $user->id)
                            <div class="row my-3">
                                <div class="col">
                                    <button class="btn btn-md btn-warning" data-toggle="modal"
                                        data-target="#editprofilemodal"><strong>Edit Profile</strong></button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
</div>
{{-- @if (auth()->user()->role->role == 'admin' || auth()->user()->id == $user->id)
        <div class="row">
            <div class="col">
                <div class="container">
                    <button class="btn btn-md btn-danger" data-toggle="modal" data-target="#hapusmodal"><strong>Hapus</strong></button>
                    <br><br>
                </div>
            </div>
        </div>
    @endif --}}


<!-- Edit Modal -->
<div class="modal fade" id="editakunmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body my-5">
                <h3 class="text-center" style="font-size: 30px;">Yakin Ingin Merubah Data ?</h3>
            </div>

            <div class="row text-center p-3">
                <div class="col">
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-danger text-white">Iya</a>
                    <button class="btn" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editprofilemodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body my-5">
                <h3 class="text-center" style="font-size: 30px;">Yakin Ingin Merubah Data ?</h3>
            </div>

            <div class="row text-center p-3">
                <div class="col">
                    @if ($user->hasIncompleteProfile())
                        <a href="{{ route('employee.create') }}" class="btn btn-danger text-white">Iya</a>
                    @else
                        <a href="{{ route('employee.edit', $user->member->id) }}"
                            class="btn btn-danger text-white">Iya</a>
                    @endif
                    <button class="btn" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hapus Modal -->

<div class="modal fade" id="hapusmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body my-5">
                <h3 class="text-center" style="font-size: 30px;">Yakin Ingin Menghapus Data ?</h3>
            </div>

            <div class="row text-center p-3">
                <div class="col">
                    <a href="{{ route('user.hapus', $user->id) }}" class="btn btn-danger text-white">Iya</a>
                    <button class="btn btn" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
