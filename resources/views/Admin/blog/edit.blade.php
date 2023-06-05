@extends('layout.admin')
@section('content')
@section('judul', 'Edit Artikel')

<form action="{{route('blogs.update', $data->id)}}" method="post" id="upload-image-form" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row p-2">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="form">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_artikel" id="id_artikel" value="{{$data->id_artikel}}">
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" value="{{$data->judul}}">
                        </div>
                        <input type="hidden" name="users_id" value="{{$data->users_id}}">
                        <div class="form-group">
                            <label for="segmen_id">Segmen</label>
                            <select class="form-control form-select" name="segmen_id" id="segmen_id">
                                @foreach($segmen as $s)
                                <option value="{{$s -> id}}" @if($s->id == $data->segmen->id) selected @endif>{{$s -> segmen}}</option>
                                @endforeach
                            </select><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <a href="{{route('blogs.show', $data->id)}}" class="btn btn btn-secondary text-white text-end">Kembali</a>
            </div>
        </div>

        {{-- compose --}}
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <label for="compose isi">Edit Artikel</label>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <textarea class="summernote" id="summernote" name="isi" class="form-control" style="height: 300px">{{$data -> isi }}</textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Simpan">
                        </div>
                    </div>
                    
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>

    </div>
</form>


<script>
    $(document).ready(function() {
        @if (Session::has('berhasil'))
            $('#messageModal').modal('show');
        @endif
    });
</script>
@endsection
