@extends('layout.admin')
@section('content-title', 'User')
@section('content')
@section('judul', 'User')

<!-- <div class="notifications">
    @foreach ($notifications as $notification)
        <div class="notification">
            <p>{{ $notification->data['message'] }}</p>
            <small>{{ $notification->created_at->diffForHumans() }}</small>
            <ul>
                <li>
                    {{ $notification->data['message'] }}
                </li>            
            </ul>
        </div>
    @endforeach
</div> -->

<div class="row">
    @if(auth()->user()->role->role !== 'admin')
    <div class="col-lg-12">
    @else
    <div class="col-lg-9">
    @endif
        <div class="card p-3">
            @if(auth()->user()->role_id == 1)
            <a href="{{route('user.create')}}" class="btn btn-md text-white rounded mb-2 mr-1" style="background-color: #1864BA; width: 14%;">Tambah User</a>
            @endif
            <table class="table table-striped table-hover mt-2">
                <thead>
                    <tr style="background-color: #0EA1E2">
                        <th class="text-white">No</th>
                        <th class="text-white">Username</th>
                        <th class="text-white">Role</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($user)<1)
                    <tr>
                        <td colspan="5" class="text-center">Belum Ada User !!</td>
                    </tr>
                    @else
                        @foreach($user as $u)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$u -> username}}</td>
                            <td>{{$u -> role -> role}}</td>
                            <td>
                                <a href="{{route('user.show',$u->id)}}" class="btn btn-sm btn text-white rounded-pill" style="background-color: #0EA1E2">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @if(auth()->user()->role->role == 'admin')
    <div class="col-lg-3">
        <div class="card p-3">
            <button data-toggle="modal" data-target="#addJabatan" class="btn btn-md text-white rounded mb-2 mr-1" style="background-color: #1864BA; width: 42%;" >Tambah</button>
            <table class="table table-striped table-hover mt-2">
                <thead>
                    <tr style="background-color: #0EA1E2">
                        <th class="text-white">Role</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($role)<1)
                    <tr>
                        <td colspan="2" class="text-center">Kosong</td>
                    </tr>
                    @else
                        @foreach($role as $r)
                        <tr>
                            <td>{{$r -> role}}</td>
                            <td><button data-toggle="modal" data-target="#hapusRole{{$r->id}}" class="btn btn-primary"><i class="fas fa fa-trash"></i></button></td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

<!-- Add jabatan Modal -->
<div class="modal fade" id="addJabatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="">Nama Role</label>
                        <input type="text" class="form-control" name="role" id="role">
                    </div>
            </div>
            <div class="modal-footer justify-content-start">
                <button class="btn btn-primary">Simpan</button>
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- hapus jabatan -->
@foreach ($role as $hapus)
    <div class="modal fade" id="hapusRole{{ $hapus->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-center">Yakin Ingin Menghapus {{ $hapus->role }} ?</h3>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="{{ route('role.hapus', $hapus->id) }}"
                        class="btn btn-danger text-white">Hapus</a>
                    <button class="btn btn-outline-secondary" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection