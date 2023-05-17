@extends('layout-landing2.body')
@section('title', '| Profile')
@section('content')
    
<section id="profile" class="container mt-5">
    <h1>Profile</h1>
    <div class="alert alert-warning" role="alert">
        Lengkapi data diri dulu. <a href="/edit-profile">Edit</a>
      </div>
    <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Nama Lengkap</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">Johnatan Smith</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Email</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">example@example.com</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Nomor Telp</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">(097) 234-5678</p>
            </div>
        </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">NIK</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">3578231290</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Alamat</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
            </div>
          </div>
        </div>
    </div>
    <a href="/edit-profile" class="btn btn-warning">Edit</a>
</section>

@endsection