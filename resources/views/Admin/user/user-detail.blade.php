@extends('layout.admin')
@section('content-title', 'User Detail')
@section('content')
@section('judul', 'User Detail')

<div class="container">
	<div class="row">
		<div class="col-lg-10">
			<div class="card">
				<div class="container">
					<table class="table table-borderless">
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
				<button type="button" class="btn btn-md btn-warning" data-toggle="modal" data-target="#editmodal" style="width: 80%;"><strong>Edit</strong></button>
				<br><br>
				<button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#hapusmodal" style="width: 80%;"><strong>Hapus</strong></button>
				<br><br>
			</div>
		</div>
	</div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
      	<br><br>
        <h3 class="text-center">Yakin Ingin Merubah Data ?</h3>
        <br><br>
      </div>

      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <a href="/edituser" class="btn btn-warning text-white">Ya</a>
      </div>
    </div>
  </div>
</div>

<!-- Hapus Modal -->
<div class="modal fade" id="hapusmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
      	<br><br>
        <h3 class="text-center">Yakin Ingin Menghapus Data ?</h3>
        <br><br>
      </div>

      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <a href="/user" class="btn btn-warning text-white">Ya</a>
      </div>
    </div>
  </div>
</div>

@endsection