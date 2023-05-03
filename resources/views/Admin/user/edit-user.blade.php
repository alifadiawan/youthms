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
									<label>Name</label>
									<input class="form-control" type="text" value="{{$user->name}}" name="name" id="name">
								</div>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text" value="{{$user->username}}" name="username" id="username">
								</div>
								<div class="form-group">
									<label for="jabatan_id">Segmen</label>
									<select class="form-control form-select" name="jabatan_id" id="jabatan_id">
										<option>Pilih Jabatan</option>
									    @foreach($jabatan as $j)
									    <option value="{{$j -> id}}" @if($j->id == $user->jabatan->id) selected @endif>{{$j -> jabatan}}</option>
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
								<div class="form-group">
									<label>No. HP</label>
									<input class="form-control" type="text" value="{{$user->no_hp}}"name="no_hp" id="no_hp">
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