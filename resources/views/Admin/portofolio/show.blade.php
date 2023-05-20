@extends('layout.admin')
@section('content')
    <div class="container">
        <div class="card p-5">

            <div class="row">
                <div class="col">
                </div>
            </div>
            
            
            <!-- Detail -->
            <div class="row mb-5">
                <a href="/portofolio" class="btn">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <p class="h2 font-weight-bold">Nama project</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti voluptatum corrupti soluta voluptatem quidem minima quisquam praesentium cumque, quasi possimus perferendis fugit hic maxime cum, minus voluptatibus velit ullam doloribus.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut in explicabo eligendi iure, autem libero id pariatur suscipit fuga rem provident aliquid consequuntur maiores voluptatibus. Architecto unde mollitia suscipit corrupti.
                </p>
            </div>
            
            <hr>
            
            <div class="row">

                <!-- Cover -->
                <div class="col-lg-12">
                    <img src="{{ asset('illustration/bmw.jpg') }}" alt="">
                </div>

            </div>

            <!-- images -->
            <div class="row mt-5 justify-content-around">
                {{-- @foreach ($collection as $item) --}}
                <div class="col mt-3">
                    <a class="pop" data-toggle="modal" data-target="#exampleModal" >
                        <img src="{{ asset('illustration/bmw.jpg') }}" alt="" style="width: 18rem">
                    </a>
                </div>
                <div class="col mt-3">
                    <a class="pop" data-toggle="modal" data-target="#exampleModal" >
                        <img src="{{ asset('illustration/bmw.jpg') }}" alt="" style="width: 18rem">
                    </a>
                </div>
                <div class="col mt-3">
                    <a class="pop" data-toggle="modal" data-target="#exampleModal" >
                        <img src="{{ asset('illustration/bmw.jpg') }}" alt="" style="width: 18rem">
                    </a>
                </div>
                <div class="col mt-3">
                    <a class="pop" data-toggle="modal" data-target="#exampleModal" >
                        <img src="{{ asset('illustration/bmw.jpg') }}" alt="" style="width: 18rem">
                    </a>
                </div>
                <div class="col mt-3">
                    <a class="pop" data-toggle="modal" data-target="#exampleModal" >
                        <img src="{{ asset('illustration/bmw.jpg') }}" alt="" style="width: 18rem">
                    </a>
                </div>
                {{-- <div class="col mt-3">
                    <a class="pop" data-toggle="modal" data-target="#exampleModal">
                        <img src="{{ asset('illustration/bmw.jpg') }}" alt="">
                    </a>
                </div>
                <div class="col mt-3">
                    <a class="pop" data-toggle="modal" data-target="#exampleModal">
                        <img src="{{ asset('illustration/bmw.jpg') }}" alt="">
                    </a>
                </div>
                <div class="col mt-3">
                    <a class="pop" data-toggle="modal" data-target="#exampleModal">
                        <img src="{{ asset('illustration/bmw.jpg') }}" alt="">
                    </a>
                </div>
                <div class="col mt-3">
                    <a class="pop" data-toggle="modal" data-target="#exampleModal">
                        <img src="{{ asset('illustration/bmw.jpg') }}" alt="">
                    </a>
                </div> --}}

                {{-- @endforeach --}}
            </div>


        </div>
    </div>


  
  <!-- Show Images modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <script>
        $(function() {
            $('.pop').on('click', function() {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');
            });
        });
    </script>
@endsection
