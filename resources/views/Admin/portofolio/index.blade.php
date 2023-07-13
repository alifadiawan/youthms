@extends('layout.admin')
@section('content-title', 'Portofolio')
@section('content')
@section('judul', 'Portofolio')



<div class="container">

    <!--Kategori -->
    <div class="card px-3">
        <div class="row align-items-center">
            <div class="col-lg-1 col-4 border-right">
                <a href="{{ route('portfolio.create') }}" class="text-capitalize my-3 active btn btn-success rounded-pill" style="margin-right: 6px">Tambah</a>
            </div>
            <div class="col-lg-11 col-8">
                <div class="d-flex flex-row" style="overflow-y: auto">
                    <a href="{{ route('portfolio.index') }}" class="text-capitalize my-3 active btn btn-primary rounded-pill" >All</a>
                    @foreach ($layanan as $l)
                        <a href="{{ route('portfolio.showtype', $l->layanan) }}"
                            class="my-3 mx-1 text-capitalize active btn btn-primary rounded-pill">{{ $l->layanan }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- content -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                @if ($porto->isEmpty())
                    <div class="col-lg-12">
                        <h3 class="h3 text-center">Belum Ada Porto !!</h3>
                    </div>
                @else
                    @foreach ($porto as $p)
                        <div class="col-lg-3 col-12">
                            <div class="card">
                                <img src="{{ asset('./portofolio/' . $p->cover) }}" class="card-img-top" alt="..." style="max-width: 18.5rem; height: 18.5rem; object-fit:cover;">
                                <div class="card-body text-center">
                                    <p class="h3 card-text text-capitalize font-weight-bold">{{ $p->project }}
                                    </p>
                                    <p class="h4 text-capitalize">{{ $p->services->jenis_layanan->layanan }} :
                                        {{ $p->services->judul }}</p>
                                    <div class="row text-center">
                                        <div class="col">
                                            <a href="{{ route('portfolio.show', $p->id) }}" class="btn text-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('portfolio.edit', $p->id) }}" class="btn text-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('portfolio.hapus', $p->id) }}" class="btn text-danger">
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
    </div>

    <div class="card">
        {{ $porto->links() }}
    </div>
</div>

{{-- <div class="container">

    <!-- portofolio -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row text-center">
                        <a href="{{ route('portfolio.index') }}"
                            class="text-capitalize my-3 active btn btn-primary w-20 rounded-5"
                            style="margin-right: 6px;">All</a>
                        @foreach ($layanan as $l)
                            <a href="{{ route('portfolio.showtype', $l->layanan) }}"
                                class=" my-3 text-capitalize active btn btn-primary w-20 rounded-5"
                                style="margin-right: 6px;">{{ $l->layanan }}</a>
                        @endforeach
                    </div>
                </div>
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
                                        <p class="h4 text-capitalize">{{ $p->services->jenis_layanan->layanan }} :
                                            {{ $p->services->judul }}</p>
                                        <div class="row text-center">
                                            <div class="col">
                                                <a href="{{ route('portfolio.show', $p->id) }}"
                                                    class="btn text-primary">
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
</div> --}}




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
