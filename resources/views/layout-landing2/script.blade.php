
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/e4a753eb05.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    
    <!-- Vendor JS Files -->
    <script src="{{ asset('EU/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('EU/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('EU/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('EU/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('EU/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('EU/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('EU/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('EU/js/main.js') }}"></script>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h3 class="text-center" style="font-size: 25px;">Anda Yakin Ingin Logout ?</h3>
          </div>
          <div class="modal-footer">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
