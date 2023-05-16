@extends('layout-landing.body')
@section('content')
    
    <div class="container my-5">
        <div class="d-flex flex-row justify-content-between mb-5">
            <a href="" class="btn active">Editing</a>
            <a href="" class="btn">Design</a>
            <a href="" class="btn">Pemrograman</a>
        </div>
        <div class="d-flex flex-row justify-content-center">
            <div class="input-group mb-3 w-50">
                <div class="row mt-5">
                    <div class="col-md-5 mx-auto">
                        <div class="small fw-light">rounded search input with icon</div>
                        <div class="input-group">
                            <input class="form-control border-end-0 border" type="search" value="search" id="example-search-input">
                            <span class="input-group-append">
                                <button class="btn btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>

@endsection
