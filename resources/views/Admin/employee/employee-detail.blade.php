@extends('layout.admin')
@section('content-title', 'Employee Detail')
@section('content')
@section('judul', 'Employee Detail')

<div class="container">

    <div class="row">
        @if (auth()->user()->roles->contains('role', 'admin') || auth()->user()->id == $user->id)
            <div class="col-lg-10">
            @else
                <div class="col-lg-12">
        @endif
        <div class="card">
            <div class="container">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="text-center"><strong>Kode Employee</strong></td>
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
    </div>
    @if (auth()->user()->roles->contains('role', 'admin') || auth()->user()->id == $user->id)
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
    @endif
</div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <p>Konfirmasi</p>
            </div>

            <div class="modal-body">
                <h3 class="text-center" style="font-size: 30px;">Yakin Ingin Merubah Data ?</h3>
            </div>

            <div class="modal-footer">
                <a href="{{ route('employee.edit', $member->id) }}" class="btn btn-warning text-white">Iya</a>
                <button class="btn btn-outline-secondary" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

<!-- Hapus Modal -->
<div class="modal fade" id="hapusmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <p>Konfirmasi</p>
            </div>

            <div class="modal-body">
                <h3 class="text-center" style="font-size: 30px;">Yakin Ingin Menghapus Data ?</h3>
            </div>

            <div class="modal-footer">
                <a href="{{ route('employee.hapus', $member->id) }}" class="btn btn-warning text-white">Iya</a>
                <button class="btn btn-danger" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

{{-- <style>
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
</style> --}}
@endsection
