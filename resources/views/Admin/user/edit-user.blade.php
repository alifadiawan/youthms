@extends('layout.admin')
@section('content-title', 'User Detail')
@section('content')
@section('judul', 'Edit User')

<div class="container">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="container">
					<form class="form">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" value="Steven Alden">
								</div>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text" value="stevena1304">
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input class="form-control" type="text" value="Admin">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="text" value="stevena1304">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="text" value="stevena@gmail.com">
								</div>
								<div class="form-group">
									<label>No. HP</label>
									<input class="form-control" type="text" value="081112222111">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<button class="btn btn-lg btn-success">Simpan</button>
	</div>
</div>

@endsection