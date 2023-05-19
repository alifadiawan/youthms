@extends('layout.admin')
@section('content-title', 'Edit Profile')
@section('content')
@section('judul', 'Edit Profile')

{{-- <div class="container">
	<div class="col-lg-12">
		<form class="form" action="{{route('employee.update', $member->id)}}" method="post">
			@csrf
			@method('PUT')
			<div class="card">
				
				
							<div class="row">
								<div class="col-6">
									<input type="hidden" name="user_id" value="{{$member->user_id}}"><!-- 
									<div class="form-group">
										<label>Kode Member</label>
										<input class="form-control" type="number" value="{{$member->id_member}}" name="id_member" id="id_member">
									</div> -->
									<div class="form-group">
										<label>NIK</label>
										<input class="form-control" type="nik" value="{{$member->nik}}" name="nik" id="nik">
									</div>
									<div class="form-group">
										<label>Nama</label>
										<input class="form-control" type="text" value="{{$member->name}}" name="name" id="name">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>No. HP</label>
										<input class="form-control" type="number" value="{{$member->no_hp}}" name="no_hp" id="no_hp">
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<input class="form-control" type="text" value="{{$member->alamat}}" name="alamat" id="alamat">
									</div>
								</div>
							</div>
					
				
			</div>
			<div class="form-group">
				<button class="btn btn-lg btn-success">Simpan</button>
			</div>
		</form>
	</div>
</div> --}}

<section id="profile" class="container">
    <form class="form" action="{{ route('employee.update', $member->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card mb-4">
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-sm-3">
                        <p class="mb-0">NIK</p>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="nik" value="{{ $member->nik }}" name="nik"
                            id="nik">
                    </div>
                </div>
                <hr>
                <div class="row my-2">
                    <div class="col-sm-3">
                        <p class="mb-0">Nama</p>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" value="{{ $member->name }}" name="name"
                            id="name">
                    </div>
                </div>
                <hr>
                <div class="row my-2">
                    <div class="col-sm-3">
                        <p class="mb-0">Nomor Telp</p>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" value="{{ $member->no_hp }}" name="no_hp"
                            id="no_hp">
                    </div>
                </div>
                <hr>
                <div class="row my-2">
                    <div class="col-sm-3">
                        <p class="mb-0">NIK</p>
                    </div>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="" id="" placeholder="3578231">
                    </div>
                </div>
                <hr>
                <div class="row my-2">
                    <div class="col-sm-3">
                        <p class="mb-0">Alamat</p>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" value="{{ $member->alamat }}" name="alamat"
                            id="alamat">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="/employee" class="btn btn-outline-secondary">Cancel</a>
    </form>
</section>

@endsection
