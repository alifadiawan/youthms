@extends('layout.admin')
@section('content-title', 'Portofolio')
@section('content')
@section('judul', 'Portofolio')


<div class="container">

    <div class="row">
        <div class="col">
            <h1 class="h3 font-weight-bold">Portofolio Illustration</h1>
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <img id="illustration" src="{{ asset('illustration/group-390.png') }}" style="width: 20rem">
                    </div>
                    <br>
                    <div class="row">
                        <a href="" class="text-start btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- portofolio -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('portfolio.create') }}" class="btn btn-success mb-2">Tambah</a>
                    <div class="row justify-content-start">
                        @if ($porto->isEmpty())
                            <div class="col-lg-12">
                                <h3 class="h3 text-center">Belum Ada Porto !!</h3>
                            </div>
                        @else
                            @foreach ($porto as $p)
                                <div class="col">
                                    <div class="card" style="width: 20rem;">
                                        <img src="{{ asset('./portofolio/' . $p->cover) }}" class="card-img-top"
                                            alt="...">
                                        <div class="card-body text-center">
                                            <p class="h3 card-text text-capitalize font-weight-bold">{{ $p->project }}
                                            </p>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <a href="" class="btn text-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('portfolio.edit', $p->id) }}"
                                                        class="btn text-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('portfolio.hapus', $p->id) }}"
                                                        class="btn text-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col text-left">
                            {{ $porto->links() }}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="row">

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul id="lightSlider">
                    <li>
                        <img src="{{ asset('/illustration/bmw.jpg') }}" class="card-img-top">
                        <h3>First Slide</h3>
                        <p>Lorem ipsum Cupidatat quis pariatur anim.</p>
                    </li>
                    <li>
                        <img src="{{ asset('/illustration/bmw.jpg') }}" class="card-img-top">
                        <h3>Second Slide</h3>
                        <p>Lorem ipsum Excepteur amet adipisicing fugiat velit nisi.</p>
                    </li>
                    ...
                </ul>
            </div>
        </div>
    </div>
</div>



<style>
    .modal {
        padding: 0 !important; // override inline padding-right added from js
    }

    .modal .modal-dialog {
        width: 90%;
        max-width: none;
        height: 90%;
    }

    .modal .modal-content {
        height: 100%;
        border: 0;
        border-radius: 0;
    }

    .modal .modal-body {
        overflow-y: auto;
    }

    .splide__slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>





@endsection
