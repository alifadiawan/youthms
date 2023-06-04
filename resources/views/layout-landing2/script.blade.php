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
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


<!-- Template Main JS File -->
<script src="{{ asset('EU/js/main.js') }}"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6476f72dad80445890f02086/1h1obb38v';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->

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
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Konfirmasi Bayar Modal -->
<section id="modal-konfirmasi" class="modal-konfirmasi">
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" aria-labelledby="modalKonfirmasi" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="exampleModalLabel" style="font-family: Poppins, sans-serif;">Konfirmasi Pembayaran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div>
            <label for="">Tanggal Checkout</label>
            <input type="date" class="form-control mt-2" name="date" id="date">
          </div>
          <div>
            <label for="" class="mt-3">Kode Pesanan</label>
            <input type="text" class="form-control mt-2" name="kode" id="kode">
          </div>
          <div>
            <label for="" class="mt-3">Bukti Pembayaran (Struk / Screenshoot Transfer)</label>
            <input type="file" class="form-control mt-2" name="kode" id="kode">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary">Kirim Bukti</button>
        </div>
      </div>
    </div>
  </div>
</section>
