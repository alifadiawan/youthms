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
                    {{-- ID Pelanggan --}}
                    <div class="row mb-3">
                        <div class="col">
                            <strong>ID Layanan</strong>
                        </div>
                        <div class="col">
                            <input type="number" value="{{ $services->id_services }}" name="id_services" id=""
                                class="form-control">
                        </div>
                    </div>

                    {{-- Jenis Layanan --}}
                    <div class="row mb-3">
                        <div class="col">
                            <strong>Jenis Layanan</strong>
                        </div>
                        <div class="col">
                            <select name="jenis_layanan_id" id="" class="form-control">
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

                    {{-- Deskripsi --}}
                    <div class="row mb-3">
                        <div class="col">
                            <strong>Deskripsi</strong>
                        </div>
                        <div class="col">
                            <input type="text" name="deskripsi" value="{{ $services->deskripsi }}"
                                placeholder="deskrpsi" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <input type="submit" class="btn" style="background-color: #0EA1E2">
                            <a href="{{ route('services.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection
