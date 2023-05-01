@extends('layout.admin')
@section('content')
@section('judul', 'Detail Artikel')

@if ($message = Session::get('berhasil'))
    <!-- <div class="alert alert-success" role="alert">
        {{ $message }}
    </div> -->

    <div class="modal fade" id="messageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-body">
            <br><br>
            <h3 class="text-center">{{$message}}</h3>
            <br><br>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
@endif

<div class="row p-2">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="form">
                    <div class="form-group">
                        <label for="id_artikel">ID Artikel</label>
                        <input type="number" class="form-control" name="id" id="id" aria-describedby="helpId"
                            value="{{$data->id_artikel}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal"
                            aria-describedby="helpId" value="{{$data->tanggal}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Segmen">Segmen</label>
                        <input type="text" class="form-control" name="segmen" id="segmen"
                            aria-describedby="helpId" value="{{$data->segmen->segmen}}" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <a href="{{route('blog.edit', $data->id)}}" class="btn btn btn-warning text-white text-end">Edit</a>
            <a href="{{route('blog.hapus', $data->id)}}" class="btn btn btn-danger text-white">Hapus</a>
            <a href="{{route('blog.index')}}" class="btn btn btn-secondary text-white text-end">Kembali</a>
        </div>
    </div>
    {{-- compose --}}
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <label for="compose">Detail Artikel</label>
            </div>
            <div class="card-body">
                <textarea id="isi" name="isi" style="display: none;">{{$data->isi}}</textarea>

                <div id="tampilan_isi">
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>

@if(Session::has('berhasil'))
    <script>
        $(document).ready(function(){
            $('#messageModal').modal('show');
        });
    </script>
@endif
@endsection
