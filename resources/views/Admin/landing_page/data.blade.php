@extends('layout.admin')
@section('content-title', 'Landing Page')
@section('judul', 'Landing Page | Data')
@section('content')

    <div class="container">

        <div class="content">
            <h1 class="h3 font-weight-bold">Testimonial</h1>
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('youth-logo-nobg.png') }}" style="height: 300px">
                        </div>
                        <div class="row">

                        </div>
                    </div>
                   
                        <div class="col">
                            <span>Nama</span>
                            <p class="h4 font-weight-bold">Steven Alden</p>
                        </div>
                        <div class="col">
                            <span>Star Rating</span>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        {{-- </div> --}}
                    </div>


                    <!-- desciption box -->
                    <div class="row mt-5">
                        <div class="col">
                            <h4>Edit Description</h4>
                            <form>
                                <textarea class="form-control summernote"></textarea>
                                <br>
                                <button class="btn btn-md btn-success">Simpan</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    @endsection
