@extends('layout.admin')
@section('content')
@section('judul', 'Tambah Artikel Baru')

<form action="{{route('blog.store')}}" method="post" id="upload-image-form" enctype="multipart/form-data">
    <div class="row p-2">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="form">
                        <div class="form-group">
                            <label for="id_artikel">ID Artikel</label>
                            <input type="number" class="form-control" name="id_artikel" id="id_artikel" aria-describedby="helpId"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal"
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="segmen_id">Segmen</label>
                            <select class="form-control form-select" name="segmen_id" id="segmen_id">
                                @foreach($segmen as $s)
                                <option value="{{$s -> id}}">{{$s -> segmen}}</option>
                                @endforeach
                            </select><br>
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
                    <label for="compose isi">Tulis Artikel Baru</label>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <textarea id="isi" name="isi" class="form-control summernote" style="height: 500px">
                            </textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <div class="form-group">
                            <button type="submit" class="btn btn text-white" style="background-color: #0EA1E2"><i class="far fa-envelope"></i> Submit</button>
                        </div>
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>

    </div>
</form>

@endsection
<script>
$(document).ready(function() {
  $('.summernote').summernote();
});
</script>

