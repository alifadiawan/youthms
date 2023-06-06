@extends('layout-landing2.body')
@section('title', '| '.$blog->judul)
@section('content')
    <div id="container" class="container mt-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <a href="/blogs" class="">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
                <div class="title mt-2">
                    <h1 class="fw-bold">{{$blog->judul}}
                    </h1><span class="text-muted"><i class="fa-solid fa-calendar-days"></i> Uploaded : {{date('d F', strtotime($blog->created_at))}}</span>
                    <span class="text-muted" style="text-indent: 1.2cm"><i class="fa-solid fa-pen-to-square"></i></i> By : {{$blog->users->username}}</span>
                </div>
                <textarea id="isi" name="isi" style="display: none;">{{ $blog->isi }}</textarea>
                <div class="blog mt-3" id="tampilan_isi">
                    
                </div>

            </div>


            <!-- berita terkait -->
            <div class="col-lg-4 align-items-center border border-secondary p-3">
                <h3 class="fw-bold">Berita Terkait</h3>

                <!-- berita -->
                @foreach($rekom as $r)
                <hr>
                <a href="{{route('blogs.detail', $r->id)}}" class="">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('blog/'.$r->foto) }}" alt="" style="max-width: 11rem; max-height: 7rem; ">
                        </div>
                        <div class="col">
                            <p class="fw-bold">{{$r->judul}}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

    </div>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var isi = $('#isi').val();
        $('#tampilan_isi').html(isi);
        $('#summernote').summernote();
    });
</script>
@endsection
