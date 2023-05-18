@extends('layout.admin')
@section('content-title', 'Add Profile')
@section('content')
@section('judul', 'Add Profile')

<div class="container">
	<div class="col-lg-12">
		<form class="form" action="{{route('employee.store')}}" method="post">
			@csrf
			<div class="card">
				<div class="card-body">
					<div class="container">
							<div class="row">
								<div class="col-6">
									<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
									<!-- <div class="form-group">
										<label>ID Member</label>
										<input class="form-control" type="number" name="id_member" id="id_member" value="{{old('id_member')}}">
									</div> -->
									<div class="form-group">
										<label>NIK</label>
										<input class="form-control" type="number" name="nik" id="nik" value="{{old('nik')}}">
									</div>
									<div class="form-group">
										<label>Nama</label>
										<input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>No. HP</label>
										<input class="form-control" type="number" name="no_hp" id="no_hp" value="{{old('no_hp')}}">
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<input class="form-control" type="text" name="alamat" id="alamat" value="{{old('alamat')}}">
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<button class="btn btn-lg btn-success">Simpan</button>
			</div>
		</form>
	</div>
</div>

@endsection