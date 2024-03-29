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

<!-- Komponen Sukses -->


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<!--Start of Tawk.to Script-->
{{-- <script type="text/javascript">
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
</script> --}}
<!--End of Tawk.to Script-->

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel" style="font-family: Poppins"><i class="fa-solid fa-lock"></i> Logout</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="text-center" style="font-size: 25px; font-family: Poppins;"><i class="fa-solid fa-circle-question"></i> Anda Yakin Ingin Logout ?</h3>
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


