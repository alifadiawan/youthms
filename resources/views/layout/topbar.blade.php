<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
      
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" id="hamburger" href="#" role="button"><i class="fas fa-bars"></i></a>
        <a class="navbar-brand"><strong>@yield('judul')</strong></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                </h3>
                <p class="text-sm">I got your message bro</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                </h3>
                <p class="text-sm">The subject goes here</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="/chat" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge bell-badge badge-warning navbar-badge">{{count($notifications)}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" id="notificationCount">{{count($notifications)}} Notifications</span>
          <div class="dropdown-divider"></div>
          <!-- <a href="#" class="dropdown-item">
            <i class="fa-solid fa-circle-info text-warning"></i> Produk Telah di Update
          </a>
          <a href="#" class="dropdown-item">
            <i class="fa-solid fa-circle-info text-danger"></i> Produk Telah di Hapus
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <a href="#" class="dropdown-item">
            <i class="fa-solid fa-circle-info text-success"></i> Produk Telah di Tambahkan
            <span class="float-right text-muted text-sm">3 mins</span>
          </a> -->

          @include('Admin.notif')
        </ul>
      </li>
    

      <!-- Nav Item - User Information -->
      @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{auth()->user()->name}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel">Konfirmasi</h3>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              
              <div class="modal-body">
                <h3 class="text-center" style="font-size: 25px;">Anda Yakin Ingin Logout ?</h3>
              </div>
              <div class="modal-footer">
                  <form action="logout" method="post">
                     @csrf
                     <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button class="btn btn-primary">Logout</button>
                  </form>    
              </div>
          </div>
      </div>
  </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.notification-item').on('click', function(e) {
            e.preventDefault();
            
            var notificationId = $(this).data('notification-id');
            var notificationItem = $(this); // Simpan elemen notifikasi yang diklik
            var notificationCount = $('#notificationCount'); // Simpan elemen yang berisi jumlah notifikasi

            
            $.ajax({
                url: '/read/' + notificationId,
                type: 'GET',
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response.message);
                    // Lakukan tindakan lain setelah notifikasi ditandai sebagai "dibaca"
                    // Misalnya, perbarui tampilan notifikasi, tampilkan pesan sukses, dll.
                    // Perbarui tampilan dropdown notifikasi
                    notificationItem.remove(); // Hapus elemen notifikasi yang diklik dari tampilan dropdown
                
                    // Perbarui jumlah notifikasi yang belum dibaca
                    var badge = $('.bell-badge');
                    var unreadCount = parseInt(badge.text());
                    badge.text(unreadCount - 1); // Kurangi jumlah notifikasi yang belum dibaca

                    // Perbarui jumlah notifikasi yang belum dibaca
                  var unreadCount = parseInt(notificationCount.text().trim());
                  notificationCount.text(unreadCount - 1 + ' Notifications'); // Update jumlah notifikasi
                
                    // Lakukan tindakan lain setelah notifikasi ditandai sebagai "dibaca"
                    // Misalnya, tampilkan pesan sukses, dll.
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    // Lakukan tindakan jika terjadi kesalahan
                }
            });
        });
    });
</script>