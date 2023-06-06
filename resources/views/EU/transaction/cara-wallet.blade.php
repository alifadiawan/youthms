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
                                    <i class="fa-solid fa-building-columns me-2"></i> Pembayaran Via Aplikasi Gopay
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">
                                        <p class="fw-bold">LANGKAH 1 : TEMUKAN ATM TERDEKAT</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item"> Masukkan kartu, kemudian pilih bahasa dan masukkan
                                                PIN anda</li>
                                            <li class="list-group-item">Pilih "Transaksi Lain" dan pilih "Pembayaran"</li>
                                            <li class="list-group-item">Pilih menu "Lainnya" dan pilih "Briva"</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : DETAIL PEMBAYARAN</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item"> Masukkan Nomor Virtual Account 92001981045887568
                                                dan jumlah yang ingin anda
                                                bayarkan</li>
                                            <li class="list-group-item">Periksa data transaksi dan tekan "YA"</li>
                                        </ol>

                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Setelah transaksi anda selesai, Silahkan kirimkan
                                                bukti transfer ke form yang sudah tersedia invoice ini akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">
                                        <p class="fw-bold">LANGKAH 1 : TEMUKAN ATM TERDEKAT</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item"> Masukkan kartu, kemudian pilih bahasa dan masukkan
                                                PIN anda</li>
                                            <li class="list-group-item">Pilih "Transaksi Lain" dan pilih "Pembayaran"</li>
                                            <li class="list-group-item">Pilih menu "Lainnya" dan pilih "Briva"</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : DETAIL PEMBAYARAN</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item"> Masukkan Nomor Virtual Account 92001981045887568
                                                dan jumlah yang ingin anda
                                                bayarkan</li>
                                            <li class="list-group-item">Periksa data transaksi dan tekan "YA"</li>
                                        </ol>

                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Setelah transaksi anda selesai, Silahkan kirimkan
                                                bukti transfer ke form yang sudah tersedia invoice ini akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Gopay --}}
                        <div class="card">
                            <div class="card-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#gojek" aria-expanded="false" aria-controls="gojek">
                                    <i class="fa-solid fa-money-bill-transfer me-2"></i> Pembayaran Via GoPay
                            </div>
                            <div id="gojek" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">
                                        <p class="fw-bold">LANGKAH 1 : BUKA APLIKASI GOJEK</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item"> Klik menu GoPay, lalu klik Pay.</li>
                                            <li class="list-group-item">Masukkan atau pilih nama yang akan menerima uang di
                                                Halaman Pay and Send.</li>
                                            <li class="list-group-item">Tentukan jumlah yang akan dikirim.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : KONFIRMASI PENGIRIMAN SALDO / PEMBAYARAN</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Tentukan jumlah yang akan dikirim.</li>
                                            <li class="list-group-item">Tekan Confirm & Pay untuk melanjutkan.</li>
                                            <li class="list-group-item">Masukkan PIN GoPay kamu.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Setelah transaksi anda selesai, Silahkan kirimkan
                                                bukti transfer ke form yang sudah tersedia invoice ini akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- lINKAJA --}}
                        <div class="card">
                            <div class="card-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#linkaja" aria-expanded="false" aria-controls="linkaja">
                                    <i class="fa-solid fa-money-bill-transfer me-2"></i> Pembayaran Via Link Aja
                            </div>
                            <div id="linkaja" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">
                                        <p class="fw-bold">LANGKAH 1 : BUKA APLIKASI LINK AJA</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Pada halaman utama aplikasi linkaja, klik menu
                                                kirim
                                                uang.</li>
                                            <li class="list-group-item">Sekarang pilih metode nomor telepon, sebagai
                                                tujuan
                                                kirim saldo linkaja.</li>
                                            <li class="list-group-item">Silahkan, masukan nomor handphone linkaja
                                                tujuan yang
                                                akan kita transfer.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : MENGISI NOMINAL TRANSFER</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Pastikan inisial nama pemilik akun linkaja
                                                sebagai
                                                penerima transfer sudah benar, lalu isi nominal transfer. Untuk kolom
                                                catatan,
                                                tidak di isi pun gak masalah. Jadi klik saja lanjut.</li>
                                            <li class="list-group-item">Silahkan perikasa kembali semua rincian
                                                transaksi
                                                transfer sesama linkaja. Jika sesuai semuanya, klik konfirmasi.</li>
                                            <li class="list-group-item">Sekarang tinggal masukan 6 digit angka pin
                                                linkaja.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Setelah transaksi anda selesai, Silahkan kirimkan
                                                bukti transfer ke form yang sudah tersedia invoice ini
                                                akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- SOPIPAY --}}
                        <div class="card">
                            <div class="card-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#sopi" aria-expanded="false" aria-controls="sopi">
                                    <i class="fa-solid fa-money-bill-transfer me-2"></i> Pembayaran Via ShopeePay
                                </button>
                            </div>
                            <div id="sopi" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">
                                        <p class="fw-bold">LANGKAH 1 : BUKA APLIKASI SHOPEE</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Masuk ke menu ShopeePay yang terletak di
                                                halaman utama.</li>
                                            <li class="list-group-item">Pilih menu “Transfer”.</li>
                                            <li class="list-group-item">Pilih Transfer ke Kontak</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : MENGISI IDENTITAS PENERIMA (NO TELEPON)</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Masukkan no. handphone</li>
                                            <li class="list-group-item">Cari nama kontak atau username Shopee</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : MENGISI NOMINAL TRANSFER</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Masukkan nominal yang ingin ditransfer</li>
                                            <li class="list-group-item">Pilih Lanjutkan</li>
                                            <li class="list-group-item">Pilih Transfer Sekarang</li>
                                            <li class="list-group-item">Masukkan PIN ShopeePay.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Setelah transaksi anda selesai, Silahkan kirimkan
                                                bukti transfer ke form yang sudah tersedia invoice ini
                                                akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Bank BSI --}}
                        <div class="card">
                            <div class="card-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#gojek" aria-expanded="false" aria-controls="gojek">
                                    <i class="fa-solid fa-money-bill-transfer me-2"></i> Pembayaran Via ATM
                            </div>
                            <div id="bsi" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">
                                        <p class="fw-bold">LANGKAH 1 : TEMUKAN ATM TERDEKAT</p>
                                        <ol>
                                            <li class="list-group-item">Masukkan kartu, kemudian pilih bahasa dan
                                                masukkan
                                                PIN anda</li>
                                            <li class="list-group-item">Pilih "Transaksi" dan pilih "Transfer"</li>
                                            <li class="list-group-item">Pilih menu transfer antar-bank atau transfer ke
                                                bank lain.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : DETAIL PEMBAYARAN</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Masukkan kode Bank BSI dan nomor rekening.(no rek
                                                mas faz)</li>
                                            <li class="list-group-item">Masukkan nominal transfer ke BSI.</li>
                                            <li class="list-group-item">Periksa data transaksi dan tekan "YA" / "BENAR"
                                            </li>
                                            <li class="list-group-item">Tunggu bukti transfer BSI muncul.</li>
                                        </ol>

                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Setelah transaksi anda selesai, Silahkan kirimkan
                                                bukti transfer ke form yang sudah tersedia, invoice ini akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Bank BSI Mbanking --}}
                        <div class="card">
                            <div class="card-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#gojek" aria-expanded="false" aria-controls="gojek">
                                    <i class="fa-solid fa-money-bill-transfer me-2"></i> Pembayaran Via M-Banking
                            </div>
                            <div id="bsi" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">
                                        <p class="fw-bold">LANGKAH 1 : BUKA APLIKASI BSI MOBILE.</p>
                                        <ol>
                                            <li class="list-group-item">Masuk dengan menggunakan akun BSI Mobile Anda.</li>
                                            <li class="list-group-item">Pada halaman utama, klik menu Transfer.</li>
                                            <li class="list-group-item">Masukkan kata sandi BSI Mobile Anda.</li>
                                            <li class="list-group-item">Lalu, klik pada menu Transfer antar Rekening BSI.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : DETAIL TRANSFER</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Tentukan rekening sumber dana.</li>
                                            <li class="list-group-item">Tentukan tujuan transfer.</li>                                         
                                            <li class="list-group-item">Masukkan nomor rekening BSI tujuan (no rek mas faza)</li>
                                            <li class="list-group-item">Masukkan keterangan (opsional), lalu klik Selanjutnya.</li>
                                            <li class="list-group-item">Periksa kembali informasi mengenai transaksi Anda. pastikan nomor rekening dan nama penerima sudah sesuai. Lalu, klik Transfer.</li>
                                            <li class="list-group-item">Masukkan PIN BSI Mobile Anda.</li>
                                        </ol>

                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Setelah transaksi anda selesai, Silahkan kirimkan
                                                bukti transfer ke form yang sudah tersedia, invoice ini akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Jenius --}}
                        <div class="card">
                            <div class="card-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#gojek" aria-expanded="false" aria-controls="gojek">
                                    <i class="fa-solid fa-money-bill-transfer me-2"></i> Pembayaran Via M-Banking
                            </div>
                            <div id="bsi" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">
                                        <p class="fw-bold">LANGKAH 1 : TEMUKAN ATM TERDEKAT</p>
                                        <ol>
                                            <li class="list-group-item">Pilih Transfer antar Bank</li>
                                            <li class="list-group-item"> Pada Bank Penerima, pilih BTPN atau masukkan kode bank BTPN (213).</li>
                                            <li class="list-group-item">Lanjutkan dengan masukan nomor rekening Jenius. (no mas faza)</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : DETAIL PEMBAYARAN</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Masukkan nominal yang akan ditransfer.</li>
                                            <li class="list-group-item">Pastikan informasi rekening tujuan sudah sesuai, lalu pilih Benar.</li>
                                        </ol>

                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">Setelah transaksi anda selesai, Silahkan kirimkan
                                                bukti transfer ke form yang sudah tersedia, invoice ini akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card box2 shadow-lg">
                <div class="d-flex align-items-center justify-content-center p-md-5 p-4"> <span
                        class="h5 fw-bold m-0">Metode Pembayaran</span>
                    {{-- <div class="btn btn-primary bar"><span class="fas fa-bars"></span></div> --}}
                </div>
                <ul class="nav nav-tabs mb-3 px-md-4 px-2">
                    <li class="nav-item"> <a class="nav-link px-2 active" aria-current="page" href="#">E-Wallet
                            Gopay</a>
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
                                <span>Nomor Gopay</span>
                                <div class="inputWithIcon">
                                    <input class="form-control" type="text" value="088936274892">
                                    <span class="">
                                        <a class="btn" type="button">
                                            <img src="{{ asset('illustration/qris.png') }}" alt=""
                                                style="width: 100%">
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
                            <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Nama Akun Gopay</span>
                                <div class="inputWithIcon"> <input class="form-control text-uppercase" type="text"
                                        value="YOUTHMS.ID"> <span class="far fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Nominal Yang Harus
                                    Dibayarkan</span>
                                <div class="inputWithIcon"> <input class="form-control text-uppercase" type="text"
                                        value="IDR 108.900"> <span class="fas fa-money-bill-wave-alt"></span> </div>
                            </div>
                        </div>
                        <div class="col-12 px-md-5 px-4 mt-3">
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#modalKonfirmasi">Konfirmasi Pembayaran</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- Konfirmasi Bayar Modal -->
    {{-- <section id="modal-konfirmasi" class="modal-konfirmasi"> --}}
    <div class="modal fade" id="modalKonfirmasi" tabindex="-1" aria-labelledby="modalKonfirmasi" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel" style="font-family: Poppins, sans-serif;">
                        Konfirmasi Pembayaran</h5>
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
    {{-- </section> --}}
@endsection
