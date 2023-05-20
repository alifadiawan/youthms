@extends('layout.admin')
@section('content-title', 'Akun Detail')
@section('content')
@section('judul', 'Akun Detail')

<div class="container">
    <div class="row">
        @if (auth()->user()->role->role == 'admin' || auth()->user()->id == $user->id)
            <div class="col-lg-10">
            @else
                <div class="col-lg-12">
        @endif
        <div class="card">
            <div class="container">
                <table class="table table-borderless">
                    <tbody>
                    <p class="h4 text-center text-bold mt-2">AKUN</p><hr>
                        <tr>
                            <td class="text-center"><strong>Username</strong></td>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Email</strong></td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Password</strong></td>
                            <td>{{ $user->password }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Role</strong></td>
                            <td>{{ $user->role->role }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-borderless">
                    <tbody>
                    <p class="h4 text-center text-bold mt-2">PROFILE</p><hr>
                        @if($user->hasIncompleteProfile())
                            <div class="alert alert-warning mt-2">
                                Biodata Belum di Isi Oleh User.
                            </div> 
                        @else
                            @foreach($Member as $m)
                            <tr>
                                <td class="text-center"><strong>Kode Employee</strong></td>
                                <td>{{ $m->id_member }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>NIK</strong></td>
                                <td>{{ $m->nik }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Name</strong></td>
                                <td>{{ $m->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Alamat</strong></td>
                                <td>{{ $m->alamat }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>No. HP</strong></td>
                                <td>{{ $m->no_hp }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if (auth()->user()->role->role == 'admin' || auth()->user()->id == $user->id)
        <div class="col-lg-2">
            <div class="container">
                <button class="btn btn-md btn-warning" data-toggle="modal" data-target="#editakunmodal"
                    style="width: 80%;"><strong>Edit Akun</strong></button>
                <br><br>
                <button class="btn btn-md btn-warning" data-toggle="modal" data-target="#editprofilemodal"
                    style="width: 80%;"><strong>Edit Profile</strong></button>
                <br><br>
                <button class="btn btn-md btn-danger" data-toggle="modal" data-target="#hapusmodal"
                    style="width: 80%;"><strong>Hapus</strong></button>
                <br><br>
            </div>
        </div>
    @endif
</div>
</div>


<!-- Edit Modal -->

<div class="modal fade" id="editakunmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
		<div class="modal-header">
			<p>Konfirmasi</p>
		</div>

      <div class="modal-body">
        <h3 class="text-center" style="font-size: 30px;">Yakin Ingin Merubah Data ?</h3>
      </div>

      <div class="modal-footer">
		  <a href="{{route('user.edit', $user->id)}}" class="btn btn-danger text-white">Iya</a>
      	<button class="btn btn-outline-secondary" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editprofilemodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <p>Konfirmasi</p>
            </div>

            <div class="modal-body">
                <h3 class="text-center" style="font-size: 30px;">Yakin Ingin Merubah Data ?</h3>
            </div>

            <div class="modal-footer">
                @if($user->hasIncompleteProfile())
                <a href="{{ route('employee.create') }}" class="btn btn-danger text-white">Iya</a>
                @else
                <a href="{{route('employee.edit', $user->member->id)}}" class="btn btn-danger text-white">Iya</a>
                @endif
                <button class="btn btn-outline-secondary" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

<!-- Hapus Modal -->

<div class="modal fade" id="hapusmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
		<div class="modal-header">
			<p>Konfirmasi</p>
		</div>

      <div class="modal-body">
        <h3 class="text-center" style="font-size: 30px;">Yakin Ingin Menghapus Data ?</h3>
      </div>

      <div class="modal-footer">
		  <a href="{{route('user.hapus', $user->id)}}" class="btn btn-danger text-white">Iya</a>
      	<button class="btn btn-outline-secondary" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>



@endsection

