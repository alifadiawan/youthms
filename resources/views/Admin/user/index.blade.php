@extends('layout.admin')
@section('content-title', 'User')
@section('content')
@section('judul', 'User')

<div class="row">
    <div class="col-lg-9">
        <div class="card p-3">
            <a href="{{route('user.create')}}" class="btn btn-md text-white rounded mb-2 mr-1" style="background-color: #1864BA; width: 14%;">Tambah User</a>
            <table class="table table-striped table-hover mt-2">
                <thead>
                    <tr style="background-color: #0EA1E2">
                        <th class="text-white">No</th>
                        <th class="text-white">Nama</th>
                        <th class="text-white">Username</th>
                        <th class="text-white">Jabatan</th>
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
                            <td>{{$u -> name}}</td>
                            <td>{{$u -> username}}</td>
                            <td>{{$u -> jabatan -> jabatan}}</td>
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
    <div class="col-lg-3">
        <div class="card p-3">
            <button data-toggle="modal" data-target="#addJabatan" class="btn btn-md text-white rounded mb-2 mr-1" style="background-color: #1864BA; width: 42%;" >Tambah</button>
            <table class="table table-striped table-hover mt-2">
                <thead>
                    <tr style="background-color: #0EA1E2">
                        <th class="text-white">Jabatan</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($jabatan)<1)
                    <tr>
                        <td colspan="2" class="text-center">Kosong</td>
                    </tr>
                    @else
                        @foreach($jabatan as $j)
                        <tr>
                            <td>{{$j -> jabatan}}</td>
                            <td><button data-toggle="modal" data-target="#hapusJabatan{{$j->id}}" class="btn btn-primary"><i class="fas fa fa-trash"></i></button></td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add jabatan Modal -->
<div class="modal fade" id="addJabatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('jabatan.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="">Nama Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan">
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
@foreach ($jabatan as $hapus)
    <div class="modal fade" id="hapusJabatan{{ $hapus->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-center">Yakin Ingin Menghapus {{ $hapus->jabatan }} ?</h3>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="{{ route('jabatan.hapus', $hapus->id) }}"
                        class="btn btn-danger text-white">Hapus</a>
                    <button class="btn btn-outline-secondary" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection