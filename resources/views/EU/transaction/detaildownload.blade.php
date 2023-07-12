<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Vendor CSS Files -->
    <link href="{{ asset('EU/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('EU/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('EU/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('EU/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('EU/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('EU/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('EU/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('EU/css/style.css') }}" rel="stylesheet">
</head>

<body>


    <div class="container" style="max-width: 50rem">
        <a href="{{ url()->previous() }}" class="pl-0 pb-3">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header yms-blue">
                        <div class="row align-items-center">
                            {{-- <div class="col">
                                @if ($pembayaran->ewallet)
                                    <img src="{{ public_path('illustration/' . $pembayaran->ewallet->image) }}" alt=""
                                    
                                        style="max-width: 110px">
                                @else
                                   
                                    <img src="{{ public_path('illustration/' . $pembayaran->bank->image) }}" alt=""
                                        style="max-width: 110px">
                                @endif
                            </div> --}}
                            <div class="col text-right">
                                {{ $pembayaran->unique_code }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="konten">
                            <div class="row">
                                <div class="col text-center">
                                    @if ($pembayaran->request_user_id != null)
                                        <h5 class="h3 mb-0 me-auto text-warning font-weight-bold">kredit
                                        </h5>
                                    @endif
                                    @if ($pembayaran->status == 'checking')
                                        <h5 class="h3 mb-0 me-auto text-warning font-weight-bold">
                                            {{ $pembayaran->status }}
                                        </h5>
                                    @else
                                        <h5 class="h3 mb-0 me-auto text-success font-weight-bold">
                                            {{ $pembayaran->status }}
                                        </h5>
                                    @endif
                                    <p class="text-muted">Total: Rp.
                                        {{ number_format($pembayaran->total_bayar, 0, ',', '.') }}
                                    </p>
                                    <p class="text-muted">Tanggal Pembayaran {{ $pembayaran->created_at }}</p>
                                </div>
                            </div>

                            <div class="row my-2">
                                @if ($pembayaran->request_user_id == null)
                                    <div class="col text-center">
                                        <p class="h3">
                                            Rp.{{ number_format($pembayaran->total_bayar, '0', ',', '.') }}
                                        </p>
                                    </div>
                                @endif
                            </div>

                            <div class="penerima">
                                <div class="row">
                                    {{-- <div class="col">
                                        Bukti Pembayaran
                                    </div> --}}
                                    {{-- <div class="col text-right">
                                        
                                        <img src="{{ public_path('bukti_transfer/' . $pembayaran->bukti_tf) }}"
                                            alt="">
                                    </div> --}}
                                </div>
                            </div>



                            <div class="footer mt-3">
                                @if ($pembayaran->status == 'checked')
                                @else
                                    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
                                        @csrf
                                        @method('put')

                                        @if ($pembayaran->request_user_id != null)
                                            <div class="total bayar">
                                                <div class="row">
                                                    <div class="col">
                                                        Total Bayar
                                                    </div>
                                                    <div class="col text-right">
                                                        Rp. <input type="number" placeholder="total bayar"
                                                            name="total_bayar" required>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="row">
                                            <div class="col">
                                                <input type="hidden" value="checked" name="status">
                                                <button type="submit"
                                                    class="btn btn-success w-100 yms-outline-blue rounded-pill">
                                                    Accept
                                                </button>
                                            </div>
                                    </form>
                                    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="col">
                                            <input type="hidden" value="decline" name="status">
                                            <button type="submit"
                                                class="btn btn-outline-danger w-100 yms-outline-blue rounded-pill">
                                                Decline
                                            </button>
                                    </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


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

</html>
