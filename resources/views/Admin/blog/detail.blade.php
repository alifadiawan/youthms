@extends('layout.admin')
@section('content')
@section('judul', 'Detail Artikel')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="form">
                    <div class="form-group">
                        <label for="id_artikel">ID Artikel</label>
                        <input type="number" class="form-control" name="id" id="id" aria-describedby="helpId"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Segmen">Segmen</label>
                        <input type="text" class="form-control" name="segmen" id="segmen"
                            aria-describedby="helpId" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <a href="/edit" class="btn btn btn-warning text-white text-end">Edit</a>
            <a href="/detail" class="btn btn btn-danger text-white">Hapus</a>
            <a href="/blog" class="btn btn btn-secondary text-white text-end">Kembali</a>
        </div>
    </div>
    {{-- compose --}}
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <label for="compose">Detail Artikel</label>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <textarea id="compose-textarea" readonly class="form-control" style="height: 500px"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>
@endsection
