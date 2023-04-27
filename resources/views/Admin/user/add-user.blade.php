@extends('layout.admin')
@section('content-title', 'User Detail')
@section('content')
@section('judul', 'Add User')

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
									<input class="form-control" type="text">
								</div>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group">
									<label>No. HP</label>
									<input class="form-control" type="text">
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