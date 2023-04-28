@extends('layout.admin')
@section('content-title', 'Member Detail')
@section('content')
@section('judul', 'Member Detail')

<div class="container">
	<div class="row">
		<div class="col-lg-10">
			<div class="card">
				<div class="container">
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td class="text-center"><strong>ID Member</strong></td>
								<td>000123</td>
							</tr>
							<tr>
								<td class="text-center"><strong>Name</strong></td>
								<td>Steven Alden Airlangga</td>
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
								<td class="text-center"><strong>Role</strong></td>
								<td>Client</td>
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
      	<a href="/editmember" class="btn btn-warning text-white">Iya</a>
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
        <a href="/member" class="btn btn-warning text-white">Iya</a>
      </div>
    </div>
  </div>
</div>

<style>
	.modal-footer {
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-wrap: wrap;
	    flex-wrap: wrap;
	    -ms-flex-align: center;
	    align-items: center;
	    -ms-flex-pack: end;
	    justify-content: space-between;
	    padding: 0.75rem;
	    border-top: 1px solid #e9ecef;
	    border-bottom-right-radius: calc(0.3rem - 1px);
	    border-bottom-left-radius: calc(0.3rem - 1px);
	}
</style>
@endsection