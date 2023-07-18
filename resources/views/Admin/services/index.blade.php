@extends('layout.admin')
@section('content')
@section('judul', 'Services')


<div class="row mt-3">
    <div class="col-lg-9">
        <div class="card p-3">

            <div class="row mb-3">
                @if (count($jenis_layanan) < 1)
                    <div class="col">
                        <a href="{{ route('services.create') }}" class="btn text-white disabled"
                            style="background-color: #1864BA">
                            <i class="fas fa-plus"></i> Tambahkan Layanan
                        </a>
                    </div>
                @else
                    <div class="col">
                        <a href="{{ route('services.create') }}" class="btn text-white"
                            style="background-color: #1864BA">
                            <i class="fas fa-plus"></i> Tambahkan Layanan
                        </a>
                    </div>
                @endif
            </div>

            <table class="table">
                <thead class="text-white" style="background-color: #0EA1E2">
                    <tr>
                        <th>No</th>
                        <th>Jenis Layanan</th>
                        <th>Nama Layanan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($jenis_layanan) < 1)
                        <tr>
                            <td colspan="6" class="text-center">Mohon tambahkan jenis layanan terlebih dahulu
                            </td>
                        </tr>
                    @elseif (count($jenis_layanan) > 0 && count($services) < 1)
                        <tr>
                            <td colspan="6" class="text-center">Belum ada layanan</td>
                        </tr>
                    @else
                        @foreach ($services as $item)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td class="text-capitalize">{{ $item->jenis_layanan->layanan }}</td>
                                <td class="text-capitalize">{{ $item->judul }}</td>
                                <td>
                                    <a href="{{ route('services.show', $item->id) }}"
                                        class="btn btn-info btn-sm rounded-pill"
                                        style="background-color: #0EA1E2">Detail</a>
                                </td>
                            </tr>

                        @endforeach
                    @endif
                </tbody>
            </table>

            <div class="row">
                {{ $services->links() }}
            </div>
        </div>

    </div>
    <div class="col">
        <div class="card p-3">

            <div class="row mb-3">
                <div class="col">
                    <h3 class="text-bold mt-2 mb-2">Jenis layanan</h3>
                </div>
            </div>

            <table class="table">
                <thead class="text-white" style="background-color: #0EA1E2">
                    <tr>
                        <th>Nama layanan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($jenis_layanan) < 1)
                        <tr class="text-center">
                            <td colspan="3">Belum ada jenis layanan</td>
                        </tr>
                    @else
                        @foreach ($jenis_layanan as $item)
                            <tr>
                                <td class="text-capitalize">{{ $item->layanan }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm text-white" data-toggle="modal"
                                        data-target="#editModal{{ $item->id }}"
                                        style="background-color: #1864BA">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{-- <div class="card-footer text-center">
                <div class="div">
                    <a class="btn text-white" data-toggle="modal" data-target="#exampleModal"
                        style="background-color: #0EA1E2">Tambah jenis layanan</a>
                </div>
            </div> --}}
        </div>
    </div>
</div>


<!-- Edit Modal -->
@foreach ($jenis_layanan as $edit)
<div class="modal fade" id="editModal{{$edit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form action="{{ route('jenislayanan.update', $edit->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10">{{$edit->deskripsi}}</textarea>
                    </div>
            </div>
            <div class="row text-center p-3">
                <div class="col">
                    <button class="btn btn-success">Tambah</button>
                    <a type="button" class="btn" data-dismiss="modal">Close</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- hapus jenis layanan -->
{{-- @foreach ($jenis_layanan as $hapus)
    <div class="modal fade" id="hapusjenislayanan{{ $hapus->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p>Konfirmasi</p>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Yakin Ingin Menghapus {{ $hapus->layanan }} ?</h3>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="{{ route('jenislayanan.hapus', $hapus->id) }}" class="btn btn-danger text-white">Hapus</a>
                    <button class="btn btn-outline-secondary" data-dismiss="modal">tidak</button>
                </div>
            </div>
        </div>
    </div>
@endforeach --}}

@endsection
