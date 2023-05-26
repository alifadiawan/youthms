@extends('layout.admin')
@section('content-title', 'Member Detail')
@section('content')
@section('judul', 'Member Detail')

<div class="container">
    <div class="row">
        @if (auth()->user()->role->role == 'admin')
            <div class="col-lg-12">
            @else
                <div class="col-lg-12">
        @endif
        <div class="card">
            <div class="container p-3">
                <p class="h4 text-center text-bold mt-2">AKUN </p>
                <div class="row my-3">
                    <div class="col-sm-3">
                        <p class="h5 font-weight-bold mb-0">Username</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text mb-0">{{ $member->id_member }}</p>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-sm-3">
                        <p class="h5 font-weight-bold mb-0">NIK</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text mb-0">{{ $member->nik }}</p>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-sm-3">
                        <p class="h5 font-weight-bold mb-0">Name</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text mb-0">{{ $member->name }}</p>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-sm-3">
                        <p class="h5 font-weight-bold mb-0">Alamat</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text mb-0">{{ $member->alamat }}</p>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-sm-3">
                        <p class="h5 font-weight-bold mb-0">Username</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text mb-0">{{ $member->user->username }}</p>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-sm-3">
                        <p class="h5 font-weight-bold mb-0">No HP</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text mb-0">{{ $member->no_hp }}</p>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-sm-3">
                        <p class="h5 font-weight-bold mb-0">Role</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text mb-0">{{ $user->role->role }}</p>
                    </div>
                </div>
                <hr>
                @if (auth()->user()->role->role == 'admin')
                    <div class="row my-3">
                        <div class="col">
                            <button class="btn btn-md btn-warning" data-toggle="modal"
                                data-target="#editmodal"><strong>Edit</strong></button>
                            <button class="btn btn-md btn-danger" data-toggle="modal"
                                data-target="#hapusmodal"><strong>Hapus</strong></button>
                        </div>
                    </div>
                @endif
            </div>
            {{-- @if (auth()->user()->role->role == 'admin')
            <div class="col-lg-10">
            @else
                <div class="col-lg-12">
        @endif
        <div class="card">
            <div class="container">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="text-center"><strong>Kode Member</strong></td>
                            <td>{{ $member->id_member }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>NIK</strong></td>
                            <td>{{ $member->nik }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Name</strong></td>
                            <td>{{ $member->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Alamat</strong></td>
                            <td>{{ $member->alamat }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>No. HP</strong></td>
                            <td>{{ $member->no_hp }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Username</strong></td>
                            <td>{{ $member->user->username }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Role</strong></td>
                            <td>{{ $user->role->role }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
            {{-- @if (auth()->user()->role->role == 'admin')
        <div class="col-lg-2">
            <div class="container">
                <button class="btn btn-md btn-warning" data-toggle="modal" data-target="#editmodal"
                    style="width: 80%;"><strong>Edit</strong></button>
                <br><br>
                <button class="btn btn-md btn-danger" data-toggle="modal" data-target="#hapusmodal"
                    style="width: 80%;"><strong>Hapus</strong></button>
                <br><br>
            </div>
        </div>
    @endif --}}
        </div>
    </div>


    <!-- Edit Modal -->
    <div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <br><br>
                    <h3 class="text-center" style="font-size: 30px;">Yakin Ingin Merubah Data ?</h3>
                    <br><br>
                </div>


                <div class="row text-center p-3">
                    <div class="col">
                        <a href="{{ route('member.edit', $member->id) }}" class="btn btn-danger text-white">Iya</a>
                        <a class="btn" data-dismiss="modal">Tidak</a>
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

                <div class="modal-body">
                    <br><br>
                    <h3 class="text-center" style="font-size: 30px;">Yakin Ingin Menghapus Data ?</h3>
                    <br><br>
                </div>

                <div class="row text-center p-3">
                    <div class="col">
                        <a href="{{ route('member.hapus', $member->id) }}" class="btn btn-danger text-white">Iya</a>
                        <button class="btn" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal-footer {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: end;
            justify-content: space-between;
            padding: 0.75rem;
            border-top: 1px solid #e9ecef;
            border-bottom-right-radius: calc(0.3rem - 1px);
            border-bottom-left-radius: calc(0.3rem - 1px);
        }
    </style>
@endsection
