@extends('layout.admin')
@section('content-title', 'Edit Member')
@section('content')
@section('judul', 'Edit Member')

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
									<input class="form-control" type="number" value="000123">
								</div>
								<div class="form-group">
									<label>Nama</label>
									<input class="form-control" type="text" value="Steven Alden">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" value="stevena@gmail.com">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>No. HP</label>
									<input class="form-control" type="number" value="0811122211">
								</div>
								<div class="form-group">
									<label>Role</label>
									<input class="form-control" type="text" value="Client">
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