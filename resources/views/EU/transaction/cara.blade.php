@extends('layout-landing2.body')
@section('content')
    <section class="cara-bayar" id="cara-bayar">
        <div class="container d-md-flex align-items-center" data-aos="fade-up" data-aos-duration="2000">
            <div class="card box1 shadow-sm p-md-7 p-md-5 p-4" style="border-radius: 25px">
                <div class="d-flex flex-column">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fa-solid fa-building-columns me-2"></i> Pembayaran Via ATM
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">LANGKAH 1 : TEMUKAN
                                        ATM
                                        TERDEKAT<br>

                                        1. Masukkan kartu, kemudian pilih bahasa dan masukkan PIN anda<br>
                                        2. Pilih "Transaksi Lain" dan pilih "Pembayaran"<br>
                                        3. Pilih menu "Lainnya" dan pilih "Briva"<br><br>

                                        LANGKAH 2 : DETAIL PEMBAYARAN<br>

                                        1. Masukkan Nomor Virtual Account 92001981045887568 dan jumlah yang ingin anda
                                        bayarkan<br>
                                        2. Periksa data transaksi dan tekan "YA"<br><br>

                                        LANGKAH 3 : TRANSAKSI BERHASIL<br>

                                        1. Setelah transaksi anda selesai, invoice ini akan diupdate secara otomatis. Proses
                                        ini mungkin
                                        memakan waktu hingga 5 menit

                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa-solid fa-money-bill-transfer me-2"></i> Pembayaran Via M-Banking
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px">
                                        LANGKAH 1 : MASUK KE AKUN ANDA<br>
                                        1. Buka aplikasi BRI Mobile Banking, masukkan USER ID dan PIN anda<br>
                                        2. Pilih "Pembayaran" dan pilih "Briva"<br><br>

                                        LANGKAH 2 : DETAIL PEMBAYARAN<br>

                                        1. Masukkan Nomor Virtual Account anda 92001981045887568 dan jumlah yang ingin anda
                                        bayarkan<br>
                                        2. Masukkan PIN Mobile Banking BRI<br><br>

                                        LANGKAH 3 : TRANSAKSI BERHASIL<br>

                                        1. Setelah transaksi anda selesai, invoice ini akan diupdate secara otomatis. Proses
                                        ini mungkin
                                        memakan waktu hingga 5 menit</span>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card text-dark">
                            <div class="card-header">
                              <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                                Collapsible Group Item #3
                              </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                              <div class="card-body">
                                <ol>
                                    <li>Buka aplikasi BRI Mobile Banking, masukkan USER ID dan PIN anda</li>
                                </ol>
                              </div>
                            </div>
                          </div> --}}
                    </div>
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
                            <div class="d-flex flex-column px-md-5 px-4 mb-4">
                                <span>Virtual Account BRI</span>
                                <div class="inputWithIcon">
                                    <input class="form-control" type="text" value="92001981045887568">
                                    <span class="">
                                        <a class="btn" type="button">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp8sk1NR5zI_Y3oPUKd2EovsQDejDMv14as0jINjnIOQVf9jE&s"
                                                alt="" style="width: 100%">
                                        </a>
                                        {{-- <div class="dropdown">
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <button class="dropdown-item active" type="button">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp8sk1NR5zI_Y3oPUKd2EovsQDejDMv14as0jINjnIOQVf9jE&s"
                                                            alt="" style="width: 100%">
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" type="button">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp8sk1NR5zI_Y3oPUKd2EovsQDejDMv14as0jINjnIOQVf9jE&s"
                                                            alt="" style="width: 100%">
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" type="button">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp8sk1NR5zI_Y3oPUKd2EovsQDejDMv14as0jINjnIOQVf9jE&s"
                                                            alt="" style="width: 100%">
                                                    </button>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    </span>
                                </div>
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
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalKonfirmasi">Konfirmasi Pembayaran</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </section>
@endsection
