@extends('layout.admin')
@section('content')
@section('judul', 'Services')

<div class="row">
    <div class="col-lg-9">
        <div class="card">

            <table class="table">
                <thead class="text-white" style="background-color: #0EA1E2">
                    <tr>
                        <th>No</th>
                        <th>ID Services</th>
                        <th>Jenis Layanan</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($jenis_layanan) < 1)
                        <tr>
                            <td colspan="6" class="text-center">Mohon tambahkan jenis layanan terlebih dahulu
                            </td>
                        </tr>
                    @elseif (count($jenis_layanan) > 0)
                        @foreach ($services as $item)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>000{{ $item->id_services }}</td>
                                <td>{{ $item->jenis_layanan->layanan }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('services.show', $item->id) }}"
                                        class="btn btn-info btn-sm rounded-pill"
                                        style="background-color: #0EA1E2">Detail</a>
                                </td>
                            </tr>
                        @endforeach 
                        <tr>
                            <td colspan="6" class="text-center">
                                <a href="{{ route('services.create') }}" class="text-dark">
                                    <i class="fas fa-plus"></i> Tambahkan Layanan
                                </a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                
                <div class="card-footer">
                    
                    {{ $services->links() }}    
            </div>
        </div>

    </div>
    <div class="col">
        <div class="card">
            <table class="table">
                <thead class="text-white" style="background-color: #0EA1E2">
                    <tr>
                        <th>No</th>
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
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->layanan }}</td>
                                <td>
                                    <button type="button" class="btn text-white" data-toggle="modal"
                                        data-target="#hapusjenislayanan{{ $item->id }}"
                                        style="background-color: #1864BA">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="card-footer text-center">
                <div class="div">
                    <button type="button" class="btn text-white" data-toggle="modal" data-target="#exampleModal"
                        style="background-color: #1864BA">Tambah jenis layanan</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('jenislayanan.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="">Nama Layanan</label>
                        <input type="text" class="form-control" placeholder="jasa editing" name="layanan"
                            id="">
                    </div>
            </div>
            <div class="modal-footer justify-content-start">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- hapus jenis layanan -->
@foreach ($jenis_layanan as $hapus)
    <div class="modal fade" id="hapusjenislayanan{{ $hapus->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-center">Yakin Ingin Menghapus {{ $hapus->layanan }} ?</h3>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="{{ route('jenislayanan.hapus', $hapus->id) }}"
                        class="btn btn-danger text-white">Delete</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">tidak</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
