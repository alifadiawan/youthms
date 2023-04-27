@extends('layout.admin')
@section('content-title', 'Add Member')
@section('content')
@section('judul', 'Add Member')

<div class="container">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="container">
					<form class="form">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>ID Member</label>
									<input class="form-control" type="number">
								</div>
								<div class="form-group">
									<label>Nama</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>No. HP</label>
									<input class="form-control" type="number">
								</div>
								<div class="form-group">
									<label>Role</label>
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