@extends('layout.admin')
@section('content-title', 'Detail Portofolio')
@section('content')
@section('judul', 'Detail Portofolio')
    <div class="container">
        <div class="card p-5">

            <div class="row">
                <div class="col">
                </div>
            </div>
            
            
            <!-- Detail -->
            <div class="row mb-5">
                <a href="/portfolio" class="btn">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <p class="h2 font-weight-bold">{{$porto->project}}</p>
            </div>
                <p class="h3 text-capitalize">Services : {{$porto->services->judul}}</p>
                <p>
                    {{$porto->deskripsi}}
                </p>
            
            <hr>
            
            <div class="row">

                <!-- Cover -->
                <div class="col-lg-12">
                    <img src="{{ asset('./portofolio/'.$porto->cover) }}" alt="Cover">
                </div>

            </div>

            <!-- images -->
            <div class="row mt-5 justify-content-around">
                @foreach ($pic as $p)
                <div class="col mt-3">
                    <a class="pop{{$p->id}}" data-toggle="modal" data-target="#foto{{$p->id}}">
                        <img src="{{ asset('./portofolio/'.$p->foto) }}" alt="" style="width: 15rem;">
                    </a>
                </div>
                @endforeach
            </div>


        </div>
    </div>


  @foreach($pic as $modal)
  <!-- Show Images modal -->
  <div class="modal fade" id="foto{{$modal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="" class="imagepreview" style="width: 100%;" >
        </div>
      </div>
    </div>
  </div>
  @endforeach

    @foreach($pic as $pop)
    <script>
        $(function() {
            $('.pop{{$pop->id}}').on('click', function() {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');
            });
        });
    </script>
    @endforeach
@endsection
