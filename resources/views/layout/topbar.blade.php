<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" id="hamburger" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
            <a class="navbar-brand"><strong>@yield('judul')</strong></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                @foreach ($notifications as $notification)
                    @if ($notification->type === 'App\Notifications\NewNotification')
                        <span class="badge bell-badge badge-warning navbar-badge">{{ count($notifications) }}</span>
                    @endif
                @endforeach
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @include('Admin.chat-notif')
                <a href="/chat" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                @foreach ($notifications as $notification)
                    @if ($notification->type === 'App\Notifications\NewMessageNotification')
                        <span class="badge bell-badge badge-warning navbar-badge">{{ count($notifications) }}</span>
                    @endif
                @endforeach
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header" id="notificationCount">{{ count($notifications) }}
                    Notifications</span>
                <div class="dropdown-divider"></div>

                @include('Admin.notif')
            </ul>
        </li>


        <!-- Nav Item - User Information -->
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->username }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <span class="dropdown-item dropdown-header">AKUN</span>
                    <div class="dropdown-divider"></div>
                    @if (auth()->user()->hasIncompleteProfile())
                        <a class="dropdown-item" href="{{ route('employee.create') }}">
                            <i class="fas fa-user-pen fa-sm fa-fw mr-2 text-gray-400"></i>
                            Lengkapi Profile
                        </a>
                    @elseif(auth()->user()->hasProfile())
                        <a class="dropdown-item" href="{{ route('employee.edit', auth()->user()->member->id) }}">
                            <i class="fas fa-user-pen fa-sm fa-fw mr-2 text-gray-400"></i>
                            Edit Profile
                        </a>
                    @endif
                    <a class="dropdown-item" href="{{ route('user.edit', auth()->user()->id) }}">
                        <i class="fas fa-user-gear fa-sm fa-fw mr-2 text-gray-400"></i>
                        Edit Akun
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/">
                        Ke Dashboard EU
                    </a>
                    <a class="dropdown-item" href="{{route('gc.index')}}">
                        <i class="fas fa-comments fa-sm fa-fw mr-2 text-gray-400"></i>
                        Group Chat
                    </a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        @endauth
    </ul>
</nav>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body my-5">
                <h3 class="h3 text-center">Anda Yakin Ingin Logout ?</h3>
            </div>
            <div class="row text-center p-3">
                <div class="col">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-danger">Logout</button>
                        <button class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.notification-item', function(e) {
        e.preventDefault();

        var url = $(this).data('url');

        // Kirim permintaan Ajax untuk mengubah status notifikasi menjadi "dibaca"
        $.ajax({
            url: '{{ route('read') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                notificationUrl: url
            },
            success: function(response) {
                // Redirect pengguna ke URL yang disimpan pada notifikasi
                window.location.href = url;
            },
            error: function(xhr, status, error) {
                // Tindakan penanganan kesalahan jika diperlukan
            }
        });
    });
</script>

<script>
    $(document).on('click', '.notif-chat', function() {
        var notifId = $(this).data('notif-id');

        // Mengirim permintaan Ajax
        $.ajax({
            url: '/read_chat/' + notifId,
            method: 'GET',
            success: function(response) {
                // Mengarahkan pengguna ke URL room chat setelah notifikasi dibaca
                window.location.href = response.redirectUrl;
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
</script>
