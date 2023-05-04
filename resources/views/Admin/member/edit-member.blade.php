@extends('layout.admin')
@section('content-title', 'Edit Member')
@section('content')
@section('judul', 'Edit Member')

<div class="container">
	<div class="col-lg-12">
		<form class="form" action="{{route('member.update', $member->id)}}" method="post">
			@csrf
			@method('PUT')
			<div class="card">
				<div class="card-body">
					<div class="container">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>ID Member</label>
										<input class="form-control" type="number" value="{{$member->id_member}}" name="id_member" id="id_member">
									</div>
									<div class="form-group">
										<label>Nama</label>
										<input class="form-control" type="text" value="{{$member->name}}" name="name" id="name">
									</div>
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" type="email" value="{{$member->email}}" name="email" id="email">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>No. HP</label>
										<input class="form-control" type="number" value="{{$member->no_hp}}" name="no_hp" id="no_hp">
									</div>
									<div class="form-group">
										<label>Role</label>
										<input class="form-control" type="text" value="{{$member->role}}" name="role" id="role">
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