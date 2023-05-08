@extends('layout.admin')
@section('content')
@section('judul', 'edit service')

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card rounded">
            <div class="card-body">

                <form action="{{ route('services.update', $services->id) }}" method="post">
                    @method('PUT')
                    @csrf

                    {{-- Jenis Layanan --}}
                    <div class="row mb-3">
                        <div class="col">
                            <strong>Jenis Layanan</strong>
                        </div>
                        <div class="col">
                            <select name="jenis_layanan_id" id="" class="form-control">
                                <option value="">Pilih jenis services</option>
                                @foreach ($jenis_layanan as $item)
                                    <option name="jenis_layanan_id" id="" class="form-control"
                                        value="{{ $item->id }}">{{ $item->layanan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="row mb-3">
                        <div class="col">
                            <strong>Judul</strong>
                        </div>
                        <div class="col">
                            <input type="text" name="judul" value="{{ $services->judul }}" placeholder="judul"
                                class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <a class="btn btn-warning text-white" data-toggle="modal"
                                data-target="#editservices">Edit</a>
                            <a href="{{ route('services.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->


<div class="modal fade" id="editservices" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center">Yakin Ingin Merubah ?</h3>
            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn btn-warning">Edit</button>
                <a class="btn btn-outline-secondary" data-dismiss="modal">tidak</a>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection
