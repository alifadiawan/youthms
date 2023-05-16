@extends('layout.admin')
@section('content-title', 'Edit User')
@section('content')
@section('judul', 'Edit User')

<div class="container">
	<div class="col-lg-12">
		<form class="form" action="{{route('user.update', $user->id)}}" method="post">
			<div class="card">
				<div class="card-body">
					<div class="container">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text" value="{{$user->username}}" name="username" id="username">
								</div>
								<div class="form-group">
									<label for="role_id">Role</label>
									<select class="form-control form-select" name="role_id" id="role_id">
										<option>Pilih Role</option>
									    @foreach($role as $r)
									    <option value="{{$r -> id}}" @if($r->id == $user->role->id) selected @endif>{{$r -> role}}</option>
									    @endforeach
									</select><br>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="text" placeholder="!! Hanya Isi Jika Ingin Ganti Password !!" name="password" id="password">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="text" value="{{$user->email}}"name="email" id="email">
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