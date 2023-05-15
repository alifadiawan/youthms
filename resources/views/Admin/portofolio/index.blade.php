@extends('layout.admin')
@section('content-title', 'Portofolio')
@section('content')
@section('judul', 'Portofolio')


<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">


                <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="{{ asset('/illustration/bmw.jpg') }}" class="card-img-top" style="width: 300px">
                        <div class="card-body">
                            <h5 class="card-title mb-2">(BMW) Bayerische Motoren Werke</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <div class="row">
                                <div class="col">
                                    <a href="/delete" class="btn btn-danger mt-2 w-100">Hapus</a>
                                </div>
                                <div class="col">
                                    <a href="{{ route('portofolio.test') }}" class="btn btn-warning mt-2 w-100">Edit</a>
                                </div>
                                <div class="col">
                                    <a href="/show" class="btn btn-primary mt-2 w-100" data-toggle="modal"
                                        data-target="#show">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="{{ asset('/illustration/bmw.jpg') }}" class="card-img-top" style="width: 300px">
                        <div class="card-body">
                            <h5 class="card-title mb-2">(BMW) Bayerische Motoren Werke</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn btn-danger mt-2 w-100">Hapus</a>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-warning mt-2 w-100">Edit</a>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-primary mt-2 w-100">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="{{ asset('/illustration/bmw.jpg') }}" class="card-img-top" style="width: 300px">
                        <div class="card-body">
                            <h5 class="card-title mb-2">(BMW) Bayerische Motoren Werke</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn btn-danger mt-2 w-100">Hapus</a>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-warning mt-2 w-100">Edit</a>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-primary mt-2 w-100">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="{{ asset('/illustration/bmw.jpg') }}" class="card-img-top" style="width: 300px">
                        <div class="card-body">
                            <h5 class="card-title mb-2">(BMW) Bayerische Motoren Werke</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn btn-danger mt-2 w-100">Hapus</a>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-warning mt-2 w-100">Edit</a>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-primary mt-2 w-100">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col text-left">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col text-right">
                    <a href="{{ route('portofolio.create') }}" class="btn btn-success mb-2">Tambah</a>
                </div>
            </div>
        </div>

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
