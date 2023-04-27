@extends('layout.admin')
@section('content-title', 'User Detail')
@section('content')
@section('judul', 'User Detail')

<div class="container">
	<div class="row">
		<div class="col-lg-10">
			<div class="card">
				<div class="container">
					<table class="table">
						<tbody>
							<tr>
								<td class="text-center"><strong>Name</strong></td>
								<td>Steven Alden Airlangga</td>
							</tr>
							<tr>
								<td class="text-center"><strong>Username</strong></td>
								<td>stevena1304</td>
							</tr>
							<tr>
								<td class="text-center"><strong>Email</strong></td>
								<td>stevena@gmail.com</td>
							</tr>
							<tr>
								<td class="text-center"><strong>No. HP</strong></td>
								<td>08111222111</td>
							</tr>
							<tr>
								<td class="text-center"><strong>Jabatan</strong></td>
								<td>Admin</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-2">
			<div class="container">
				<a href="/edituser" class="btn btn-md btn-warning" style="width: 80%;"><strong>Edit</strong></a>
				<br><br>
				<a class="btn btn-md btn-danger" style="width: 80%;"><strong>Hapus</strong></a>
			</div>
		</div>
	</div>
</div>

@endsection