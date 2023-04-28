@extends('layout.admin')
@section('content')
@section('judul', 'Tambah Artikel Baru')
<div class="row p-2">
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
        <div>
            <a href="/blog" class="btn btn btn-secondary text-white text-end">Kembali</a>
        </div>
    </div>

    {{-- compose --}}
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <label for="compose">Tulis Artikel Baru</label>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <textarea id="summernote" class="form-control" style="height: 500px">
                        </textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    <button type="submit" class="btn btn text-white" style="background-color: #0EA1E2"><i class="far fa-envelope"></i> Submit</button>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>

</div>
</div>

</div>
</div>

@endsection
<script>
$(document).ready(function() {
  $('#summernote').summernote();
});
</script>

