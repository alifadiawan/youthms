@extends('layout.admin')
@section('content-title', 'User')
@section('content')
@section('judul', 'User')

<!-- <div class="notifications">
    @foreach ($notifications as $notification)
<div class="notification">
            <p>{{ $notification->data['message'] }}</p>
            <small>{{ $notification->created_at->diffForHumans() }}</small>
            <ul>
                <li>
                    {{ $notification->data['message'] }}
                </li>
            </ul>
        </div>
@endforeach
</div> -->

<div class="row">
    @if (auth()->user()->role->role == 'admin' || auth()->user()->role->role == 'owner')
        <div class="col-lg-9">
        @else
            <div class="col-lg-12">
    @endif
    <div class="card p-3">
        <div class="row align-items-end">
            <div class="col-7">
                <a class="btn font-weight-bold" data-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    Filter <i class="fas fa-chevron-down"></i>
                </a>

                <!-- filter -->
                <a href="" class="btn btn-outline-primary text-capitalize ml-3" id="activeRoleButton"
                    style="border-radius: 20px">Semua</a>
                <div class="collapse" id="collapseExample">
                    <div class="my-3">
                        <form action="{{ route('user.filter') }}" id="filterForm">
                            <select name="role_id" id="role_id" class="form-control text-capitalize mr-2">
                                <option value="">Semua</option>
                                @foreach ($role as $item)
                                    <option value="{{ $item->id }}">{{ $item->role }}</option>
                                @endforeach
                            </select>
                            <button id="filterButton" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>


            </div>
            @if (auth()->user()->role->role == 'admin' || auth()->user()->role->role == 'owner')
                <div class="col-5 text-right">
                    <a href="{{ route('user.create') }}" class="btn btn-md text-white rounded"
                        style="background-color: #1864BA;">Tambah User</a>
                </div>
            @endif
        </div>
        <table id="userTable" class="table table-striped table-hover mt-2 bg-white">
            <thead>
                <tr style="background-color: #0EA1E2">
                    <th class="text-white">No</th>
                    <th class="text-white">Username</th>
                    <th class="text-white">Role</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                @if (count($user) < 1)
                    <tr>
                        <td colspan="5" class="text-center">Belum Ada User !!</td>
                    </tr>
                @else
                    @foreach ($user as $u)
                        <tr class="userTableRow">
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $u->username }}</td>
                            <td class="text-capitalize">{{ $u->role->role }}</td>
                            <td>
                                <a href="{{ route('user.show', $u->id) }}"
                                    class="btn btn-sm btn text-white rounded-pill"
                                    style="background-color: #0EA1E2">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="row">
            {{ $user->links() }}
        </div>
    </div>
</div>
@if (auth()->user()->role->role == 'admin' || auth()->user()->role->role == 'owner')
    <div class="col-lg-3">
        <div class="card p-3">
            <button data-toggle="modal" data-target="#addJabatan" class="btn btn-md text-white rounded mb-2 mr-1"
                style="background-color: #1864BA; width: 42%;">Tambah</button>
            <table class="table table-borderless table-hover mt-2 text-center bg-white">
                <thead>
                    <tr style="background-color: #0EA1E2">
                        <th class="text-white">Role</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($role) < 1)
                        <tr>
                            <td colspan="2" class="text-center">Kosong</td>
                        </tr>
                    @else
                        @foreach ($role as $r)
                            <tr>
                                <td class="text-capitalize">{{ $r->role }}</td>
                                <td><button data-toggle="modal" data-target="#hapusRole{{ $r->id }}"
                                        class="btn text-danger"><i class="fas fa fa-trash"></i></button></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endif
</div>

<!-- Add jabatan Modal -->
<div class="modal fade" id="addJabatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="">Nama Role</label>
                        <input type="text" class="form-control" name="role" id="role">
                    </div>
            </div>
            <div class="row text-center p-3">
                <div class="col">
                    <button class="btn btn-success">Simpan</button>
                    <button class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- hapus jabatan -->
@foreach ($role as $hapus)
    <div class="modal fade" id="hapusRole{{ $hapus->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="h3 text-center my-5">Yakin Ingin Menghapus {{ $hapus->role }} ?</h3>
                </div>
                <div class="row text-center p-3">
                    <div class="col">
                        <a href="{{ route('role.hapus', $hapus->id) }}" class="btn btn-danger">Hapus</a>
                        <button class="btn" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var isFilterActive = false; // Status filter aktif

        // Fungsi untuk mengubah status dan teks tombol "Active Role"
        function toggleActiveRoleButton(active, roleName = '') {
            var activeRoleButton = $('#activeRoleButton');
            if (active) {
                activeRoleButton.addClass('active');
                activeRoleButton.text(roleName);
            } else {
                activeRoleButton.removeClass('active');
                activeRoleButton.text('Active role');
            }
        }

        // Fungsi untuk mengembalikan tabel ke keadaan awal
        function resetTable() {
            var tableBody = $('#userTable').find('tbody');
            tableBody.empty();

            // TODO: Tampilkan semua data di tabel

            toggleActiveRoleButton(false);
            isFilterActive = false;
        }

        $('#filterForm').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            // Menggunakan jQuery untuk melakukan permintaan Ajax
            $.ajax({
                url: '{{ route('user.filter') }}', // Ganti 'nama_route_anda' dengan URL atau rute yang sesuai
                type: 'GET', // Ganti dengan metode HTTP yang sesuai jika perlu
                data: formData, // Ganti nilai_role_id dengan nilai yang Anda ingin kirimkan
                success: function(response) {
                    // Respons berhasil diterima dari server
                    // Mengupdate tabel dengan baris baru
                    var tableBody = $('#userTable').find(
                        'tbody'); // Ganti 'nama_tabel' dengan ID tabel Anda
                    tableBody.empty(); // Menghapus baris yang ada sebelumnya

                    var counter = 1; // Variabel penghitung

                    // Mengisi tabel dengan data baru
                    $.each(response.user, function(index, user) {
                        var detailUrl =
                            '{{ route('user.show', ['user' => '__id__']) }}';
                        detailUrl = detailUrl.replace('__id__', user.id);
                        var newRow = '<tr>' +
                            '<td>' + counter + '</td>' +
                            '<td>' + user.username + '</td>' +
                            '<td class="text-capitalize">' + user.role.role + '</td>' +
                            '<td><a href="' + detailUrl +
                            '" class="btn btn-sm btn text-white rounded-pill" style="background-color: #0EA1E2">Detail</a></td>' +
                            // Tambahkan kolom tambahan sesuai kebutuhan
                            '</tr>';
                        tableBody.append(newRow); // Menambahkan baris baru ke tabel
                        counter++; // Increment Penghitung
                    });

                    // Mengubah status tombol "Active Role"
                    toggleActiveRoleButton(true, response.activeRoleName);
                    isFilterActive = true;
                },
                error: function(xhr) {
                    // Error saat melakukan permintaan Ajax
                    console.log(xhr.responseText);
                }
            });
        });

        // Event handler untuk tombol "Active Role"
        $('#activeRoleButton').click(function() {
            if (isFilterActive) {
                resetTable();
            }
        });
    })
</script>

@endsection
