@extends('layout.admin')
@section('content')
@section('judul', 'Tambah service')

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card rounded">
            <div class="card-body">

                <form action="{{ route('services.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id_services" id="">

                    {{-- Jenis Layanan --}}
                    <div class="row mb-3">
                        <div class="col">
                            <strong>Jenis Layanan</strong>
                        </div>
                        <div class="col">
                            <select name="jenis_layanan_id" id="" class="form-control">
                                <option value="">Pilih layanan</option>
                                @foreach ($jenis_layanan as $item)
                                    <option value="{{ $item->id }}">{{ $item->layanan }}</option>
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
                            <input type="text" name="judul" placeholder="judul" class="form-control" required>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="row mb-3">
                        <div class="col">
                            <strong>Deskripsi</strong>
                        </div>
                        <div class="col">
                            <textarea name="deskripsi" id="" class="form-control" cols="30" rows="5"  minlength="5"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <input type="submit" class="btn btn-info" style="background-color: #0EA1E2">
                            <a href="/services" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection
