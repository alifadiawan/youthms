@extends('layout.admin')
@section('content-title', 'Add Member')
@section('content')
@section('judul', 'Add Member')

<div class="container">
	<div class="col-lg-12">
		<form class="form" action="{{route('member.store')}}" method="post">
			@csrf
			<div class="card">
				<div class="card-body">
					<div class="container">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>ID Member</label>
										<input class="form-control" type="text" name="id_member" id="id_member" value="{{old('id_member')}}">
									</div>
									<div class="form-group">
										<label>Nama</label>
										<input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
									</div>
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" type="email" name="email" id="email" value="{{old('email')}}">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>No. HP</label>
										<input class="form-control" type="number" name="no_hp" id="no_hp" value="{{old('no_hp')}}">
									</div>
									<div class="form-group">
										<label>Role</label>
										<input class="form-control" type="text" name="role" id="role" value="{{old('role')}}">
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