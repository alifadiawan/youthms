@extends('layout-landing2.body')
@section('content')
    <section class="cara-bayar" id="cara-bayar">
        <div class="container d-md-flex align-items-center" data-aos="fade-up" data-aos-duration="2000">
            <div class="card box1 shadow-sm p-md-7 p-md-5 p-4" style="border-radius: 25px">
                <div class="d-flex flex-column">
                    {{-- <div class="d-flex align-items-center justify-content-between text"> <span
                            class="">Commission</span>
                        <span class="fas fa-dollar-sign"><span class="ps-1">1.99</span></span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between text mb-4"> <span>Total</span> <span
                            class="fas fa-dollar-sign"><span class="ps-1">600.99</span></span> </div>
                    <div class="border-bottom mb-4"></div> --}}
                    <div class="d-flex flex-column mb-4"> <span class="fas fa-credit-card"><span class="ps-2">Pembayaran
                                Via ATM
                                :<br><br></span></span> <span class="ps-3" style="font-size: 16px; line-height:normal">LANGKAH 1 : TEMUKAN ATM
                            TERDEKAT<br>

                            1. Masukkan kartu, kemudian pilih bahasa dan masukkan PIN anda<br>
                            2. Pilih "Transaksi Lain" dan pilih "Pembayaran"<br>
                            3. Pilih menu "Lainnya" dan pilih "Briva"<br><br>

                            LANGKAH 2 : DETAIL PEMBAYARAN<br>

                            1. Masukkan Nomor Virtual Account 92001981045887568 dan jumlah yang ingin anda bayarkan<br>
                            2. Periksa data transaksi dan tekan "YA"<br><br>

                            LANGKAH 3 : TRANSAKSI BERHASIL<br>

                            1. Setelah transaksi anda selesai, invoice ini akan diupdate secara otomatis. Proses ini mungkin
                            memakan waktu hingga 5 menit

                        </span> </div>
                    <div class="d-flex flex-column mb-5"> <span class="fas fa-mobile-android-alt"><span
                                class="ps-2">Pembayaran Via M-Banking :</span></span><br>
                        <span class="ps-3" style="font-size: 16px">LANGKAH 1 : MASUK KE AKUN ANDA<br>
                            1. Buka aplikasi BRI Mobile Banking, masukkan USER ID dan PIN anda<br>
                            2. Pilih "Pembayaran" dan pilih "Briva"<br><br>

                            LANGKAH 2 : DETAIL PEMBAYARAN<br>

                            1. Masukkan Nomor Virtual Account anda 92001981045887568 dan jumlah yang ingin anda bayarkan<br>
                            2. Masukkan PIN Mobile Banking BRI<br><br>

                            LANGKAH 3 : TRANSAKSI BERHASIL<br>

                            1. Setelah transaksi anda selesai, invoice ini akan diupdate secara otomatis. Proses ini mungkin
                            memakan waktu hingga 5 menit</span>
                    </div>
                    {{-- <div class="d-flex align-items-center justify-content-between text mt-5">
                        <div class="d-flex flex-column text"> <span>Customer Support:</span> <span>online chat 24/7</span>
                        </div>
                        <div class="btn btn-primary rounded-circle"><span class="fas fa-comment-alt"></span></div>
                    </div> --}}
                </div>
            </div>
            <div class="card box2 shadow-lg">
                <div class="d-flex align-items-center justify-content-center p-md-5 p-4"> <span
                        class="h5 fw-bold m-0">Metode Pembayaran</span>
                    {{-- <div class="btn btn-primary bar"><span class="fas fa-bars"></span></div> --}}
                </div>
                <ul class="nav nav-tabs mb-3 px-md-4 px-2">
                    <li class="nav-item"> <a class="nav-link px-2 active" aria-current="page" href="#">Virtual
                            Account</a>
                    </li>
                    {{-- <li class="nav-item ms-auto"> <a class="nav-link px-2" href="#">+ More</a> </li> --}}
                </ul>
                {{-- <div class="px-md-5 px-4 mb-4 d-flex align-items-center">
                    <div class="btn btn-success me-4"><span class="fas fa-plus"></span></div>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group"> <input
                            type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="btnradio1"><span class="pe-1">+</span>5949</label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off"> <label
                            class="btn btn-outline-primary" for="btnradio2"><span class="lpe-1">+</span>3894</label>
                    </div>
                </div> --}}
                <form action="">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Virtual Account BRI</span>
                                <div class="inputWithIcon"> <input class="form-control" type="text"
                                        value="92001981045887568">
                                    <span class=""> <img
                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp8sk1NR5zI_Y3oPUKd2EovsQDejDMv14as0jINjnIOQVf9jE&s"
                                            alt="" style="width: 100%"></span> </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Nama Virtual Account</span>
                                <div class="inputWithIcon"> <input class="form-control text-uppercase" type="text"
                                        value="YOUTHMS.ID"> <span class="far fa-user"></span> </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Nominal Yang Harus Dibayarkan</span>
                                <div class="inputWithIcon"> <input class="form-control text-uppercase" type="text"
                                        value="IDR 108.900"> <span class="fas fa-money-bill-wave-alt"></span> </div>
                            </div>
                        </div>
                        <div class="col-12 px-md-5 px-4 mt-3">
                            <button class="btn btn-primary w-100">Konfirmasi Pembayaran</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
