@extends('layout.admin')
@section('content')
@section('judul', 'Blog')

<div class="row">
    <div class="col-lg-9">
        <div class="card p-3">
            @if (count($segmen) > 0)
                <a href="{{ route('blog.create') }}" class="btn btn-md text-white rounded mb-2 mr-1"
                    style="background-color: #1864BA; width: 17%;">Tambah Artikel</a>
            @else
                <a href="{{ route('blog.create') }}" class="btn btn-md text-white rounded mb-2 mr-1 disabled"
                    style="background-color: #1864BA; width: 17%;">Tambah Artikel</a>
            @endif
            <table class="table table-striped table-hover mt-2">
                <thead>
                    <tr style="background-color: #0EA1E2">
                        <th class="text-white">No</th>
                        <th class="text-white">Tanggal</th>
                        <th class="text-white">Judul</th>
                        <th class="text-white">Author</th>
                        <th class="text-white">Segmen</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($data) == 0)
                        <tr>
                            <td colspan="6" class="text-center">Belum Ada Artikel !!</td>
                        </tr>
                    @else
                        @foreach ($data as $i)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $i->tanggal }}</td>
                                <td>{{ $i->judul }}</td>
                                <td>{{ $i->users->username}}</td>
                                <td>{{ $i->segmen->segmen }}</td>
                                <td>
                                    <a href="{{ route('blog.show', $i->id) }}"
                                        class="btn btn-sm btn text-white rounded-pill"
                                        style="background-color: #0EA1E2">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="row">
                {{$data->links()}}
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card p-3">
            <button data-toggle="modal" data-target="#addSegmen" class="btn btn-md yms-blue"
                style="width: 37%;">Tambah</button>
            <table class="table table-hover table-striped mt-3 text-center">
                <thead>
                    <tr style="background-color: #0EA1E2">
                        <th class="text-white">Segmen</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($segmen) < 1)
                        <tr>
                            <td colspan="2" class="text-center">Kosong</td>
                        </tr>
                    @else
                        @foreach ($segmen as $s)
                            <tr>
                                <td>{{ $s->segmen }}</td>
                                <td><button data-toggle="modal" data-target="#hapusSegmen{{ $s->id }}"
                                        class="btn text-danger"><i class="fas fa fa-trash"></i></button></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Segmen Modal -->
<div class="modal fade" id="addSegmen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p>Tambah Segmen</p>
            </div>
            <div class="modal-body">
                <form action="{{ route('segmen.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="">Nama Segmen</label>
                        <input type="text" class="form-control" name="segmen" id="segmen">
                    </div>
            </div>
            <div class="modal-footer justify-content-start">
                <button class="btn btn-success">Simpan</button>
                <button class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- hapus jenis layanan -->
@foreach ($segmen as $hapus)
    <div class="modal fade" id="hapusSegmen{{ $hapus->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p>Konfirmasi</p>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Yakin Ingin Menghapus {{ $hapus->segmen }} ?</h3>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="{{ route('segmen.hapus', $hapus->id) }}" class="btn btn-danger text-white">Hapus</a>
                    <button class="btn btn-outline-secondary" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
