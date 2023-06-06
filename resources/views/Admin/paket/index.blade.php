@extends('layout.admin')
@section('content-title', 'Paket')
@section('content')
@section('judul', 'Paket')


<div class="container">
    <a href="#" class="btn yms-blue my-3" data-toggle="modal" data-target="#tambah-paket">Tambah Paket</a>
    <p class="h1">Paket</p>
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
                    @foreach($paket as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->nama_paket}}</td>
                        <td>
                        @foreach($p->produk as $pp)
                            {{$pp->nama_produk}}<br>
                            {{-- @if(!$loop->last)
                                ,
                            @endif --}}
                        @endforeach
                        </td>
                        <td>
                            <a href="{{route('paket.hapus', $p->id)}}" class="btn btn-danger">Hapus</a>
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
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
            </div>
            <form action="{{route('paket.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control" name="nama_paket" id="nama_paket" required>
                    </div>

                    <!-- checklist -->
                    <div class="form-group m-0">
                        <label for="isi_paket">Isi paket</label>
                        <div class="row row-cols-3 m-0">
                            @foreach($produk as $pr)
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$pr->id}}" id="produk{{ $pr->id }}" name="isi_paket[]">
                                    <label class="form-check-label" for="produk{{ $pr->id }}">
                                        {{$pr->nama_produk}}
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


@endsection
