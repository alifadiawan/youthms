@extends('layout.admin')
@section('content-title', 'Add User')
@section('content')
@section('judul', 'Add User')

<div class="container">
	<div class="col-lg-12">
		<form action="{{route('user.store')}}" method="post">
			<div class="card">
				<div class="card-body">
					<div class="container">
							<div class="row">
								@csrf
								<div class="col-6">
									<div class="form-group">
										<label for="username">Username</label>
										<input class="form-control" type="text" name="username" id="username" value="{{old('username')}}">
									</div>
									<div class="form-group">
										<label for="role_id">Role</label>
										<select class="form-control" name="role_id[]" id="role_id[]" multiple>
											<!-- <option>Pilih Role</option> -->
											@foreach($role as $r)
											<option class="text-capitalize" value="{{$r->id}}">{{$r -> role}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="password">Password</label>
										<input class="form-control" type="password" name="password" id="password">
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input class="form-control" type="email" name="email" id="email" value="{{old('email')}}">
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