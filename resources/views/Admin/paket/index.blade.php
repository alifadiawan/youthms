@extends('layout.admin')
@section('content-title', 'Paket')
@section('content')
@section('judul', 'Paket')


<div class="container">
    <a href="#" class="btn yms-blue my-3" data-toggle="modal" data-target="#tambah-paket">Tambah Paket</a>
    <div class="card shadow">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Isi Paket</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paket as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama_paket }}</td>
                                <td>
                                    <ul>
                                        @foreach ($p->paket_produk as $pp)
                                            <li>{{ $pp->produk->nama_produk }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('paket.hapus', $p->id) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah-paket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('paket.store') }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control" name="nama_paket" id="nama_paket" required>
                    </div>

                    <!-- checklist -->
                    <div class="form-group m-0">
                        <label for="isi_paket">Isi paket</label>
                        <div class="row m-0"style="max-height: 200px; overflow-y:scroll">
                            @foreach ($produk as $pr)
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $pr->id }}"
                                            id="produk{{ $pr->id }}" name="isi_paket[]">
                                        <label class="form-check-label" for="produk{{ $pr->id }}">
                                            {{ $pr->nama_produk }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Tambah</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
    /* ordered list */
    ul li {
        list-style-type: disc;
    }
</style>


@endsection
