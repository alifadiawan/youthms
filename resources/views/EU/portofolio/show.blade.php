@extends('layout-landing2.body')
@section('title', 'Show Portofolio')
@section('content')

    <div id="container" class="container my-5">
        <div class="row">

        <div class="card p-5">

            <a href="{{ route('portfolio.index') }}">
                back
            </a>

            <!-- Detail -->
            <div class="row mb-5">
                <p class="h2 fw-bold">{{ $porto->project }}</p>
                <p>{{ $porto->deskripsi }}</p>
            </div>


            <!-- Cover -->
            <div class="row justify-content-center">
                <div class="col">
                    <img src="{{ asset('./portofolio/' . $porto->cover) }}" class="img-fluid" alt="Cover" >
                </div>
            </div>

            <!-- images -->
            <div class="row mt-3 justify-content-center justify-content-lg-around">
                @foreach ($pic as $p)
                    <div class="col-lg col-12 mt-3">
                        <a class="pop{{ $p->id }}" data-bs-toggle="modal" data-bs-target="#foto{{ $p->id }}">
                            <img src="{{ asset('./portofolio/' . $p->foto) }}" class="img-fluid">
                        </a>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
</div>



    <!-- Show Images modal -->
    @foreach ($pic as $modal)
      <div class="modal fade" id="foto{{$modal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <img src="" class="imagepreview" style="width: 100%;" >
            </div>
          </div>
        </div>
      </div>
    @endforeach

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
