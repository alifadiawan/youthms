<section id="topbar-chat" class="topbar-chat">
<div class="msg-head">
    <div class="row align-items-center">
        <div class="col-8">
            <h4 style="font-family: Poppins, sans-serif; font-weight:bold">{{$group->group}}</h4>
            <h6>Admin Group : 
                @foreach($group->admin as $admin)
                    @if($loop->last)
                        @if($admin->hasProfile())
                        {{$admin->member->name}}
                        @else
                        {{$admin->username}}
                        @endif
                    @else
                        @if($admin->hasProfile())
                        {{$admin->member->name}}, 
                        @else
                        {{$admin->username}}, 
                        @endif 
                    @endif
                @endforeach
            </h6>
            <p>Kode Group : {{$group->kode}}</p>
        </div>
        <div class="col-4">
            <ul class="moreoption">
                <li class="navbar nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i
                            class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        @if($group->admin()->where('user_id', auth()->user()->id)->exists())
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addMember"><i class="fa-solid fa-user-plus"></i> Tambah Member</a>
                        </li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeMember"><i class="fa-solid fa-user-xmark"></i> Hapus Member</a>
                        </li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addAdmin"><i class="fa-solid fa-user-gear"></i> Tambah Admin</a>
                        </li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeAdmin"> Hapus Admin</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{route('gc.delete', ['group' => $group->id])}}" id="delete-group-form" method="GET">
                                @csrf
                            </form>
                            <button class="dropdown-item" id="delete-group-button">Hapus Group</button>
                        </li>
                        @endif
                        <li>
                            <form action="{{route('gc.left', ['group' => $group->id])}}" id="left-group-form" method="POST">
                                @csrf
                            </form>
                            <button class="dropdown-item" id="left-group-button"><i class="fa-solid fa-arrow-right-from-bracket"></i> Left Group</button>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>


@include('EU.chat.modal')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Temukan tombol dropdown dengan ID delete-button
  @if($group->admin()->where('user_id', auth()->user()->id)->exists())
  const deleteButton = document.getElementById('delete-group-button');

  deleteButton.addEventListener('click', function() {
    Swal.fire({
      title: 'Yakin Ingin Menghapus Group ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yakin !'
    }).then((result) => {
      if (result.isConfirmed) {
        // Ambil form yang berisi tombol delete-button
        const formDelete = document.getElementById('delete-group-form');
        
        // Submit form
        formDelete.submit();
      }
    });
  });
  @endif
  const leftButton = document.getElementById('left-group-button');

  leftButton.addEventListener('click', function() {
    Swal.fire({
      title: 'Yakin Ingin Keluar ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yakin !'
    }).then((result) => {
      if (result.isConfirmed) {
        // Ambil form yang berisi tombol left-button
        const formLeft = document.getElementById('left-group-form');
        
        // Submit form
        formLeft.submit();
      }
    });
  });
</script>
</section>