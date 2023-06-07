@extends('layout-landing2.body')
@section('content')
    <section class="cara-bayar" id="cara-bayar">
        <div class="container d-md-flex align-items-center" data-aos="fade-up" data-aos-duration="2000">
            <div class="card box1 shadow-sm p-md-7 p-md-5 p-4" style="border-radius: 25px">
                <div class="d-flex flex-column">
                    <div id="accordion">
                        <!-- <div class="card">
                            <div class="card-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fa-solid fa-building-columns me-2"></i> Pembayaran Via ATM
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">
                                        <p class="fw-bold">LANGKAH 1 : TEMUKAN ATM TERDEKAT</p>
                                        <ol>
                                            <li>Masukkan kartu, kemudian pilih bahasa dan
                                                masukkan
                                                PIN anda</li>
                                            <li>Pilih "Transaksi Lain" dan pilih "Pembayaran"</li>
                                            <li>Pilih menu "Lainnya" dan pilih "Briva"</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : DETAIL PEMBAYARAN</p>
                                        <ol>
                                            <li> Masukkan Nomor Virtual Account 92001981045887568
                                                dan jumlah yang ingin anda
                                                bayarkan</li>
                                            <li>Periksa data transaksi dan tekan "YA"</li>
                                        </ol>

                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol>
                                            <li>Setelah transaksi anda selesai, invoice ini akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                        </div> -->

                        @if($nama == 'GoPay')
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
                                        <ol>
                                            <li> Klik menu GoPay, lalu klik Pay.</li>
                                            <li>Masukkan atau pilih nama yang akan menerima uang di
                                                Halaman Pay and Send.</li>
                                            <li>Tentukan jumlah yang akan dikirim.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : KONFIRMASI PENGIRIMAN SALDO / PEMBAYARAN</p>
                                        <ol>
                                            <li>Tentukan jumlah yang akan dikirim.</li>
                                            <li>Tekan Confirm & Pay untuk melanjutkan.</li>
                                            <li>Masukkan PIN GoPay kamu.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol>
                                            <li>Setelah transaksi anda selesai, Silahkan kirimkan
                                                bukti transfer ke form yang sudah tersedia invoice ini akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($nama == 'Link Aja')
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
                                        <ol>
                                            <li>Pada halaman utama aplikasi linkaja, klik menu
                                                kirim
                                                uang.</li>
                                            <li>Sekarang pilih metode nomor telepon, sebagai
                                                tujuan
                                                kirim saldo linkaja.</li>
                                            <li>Silahkan, masukan nomor handphone linkaja
                                                tujuan yang
                                                akan kita transfer.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : MENGISI NOMINAL TRANSFER</p>
                                        <ol>
                                            <li>Pastikan inisial nama pemilik akun linkaja
                                                sebagai
                                                penerima transfer sudah benar, lalu isi nominal transfer. Untuk kolom
                                                catatan,
                                                tidak di isi pun gak masalah. Jadi klik saja lanjut.</li>
                                            <li>Silahkan perikasa kembali semua rincian
                                                transaksi
                                                transfer sesama linkaja. Jika sesuai semuanya, klik konfirmasi.</li>
                                            <li>Sekarang tinggal masukan 6 digit angka pin
                                                linkaja.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol>
                                            <li>Setelah transaksi anda selesai, Silahkan kirimkan
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
                        @endif
                        @if($nama == 'ShoppeePay')
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
                                        <ol>
                                            <li>Masuk ke menu ShopeePay yang terletak di
                                                halaman utama.</li>
                                            <li>Pilih menu “Transfer”.</li>
                                            <li>Pilih Transfer ke Kontak</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : MENGISI IDENTITAS PENERIMA (NO TELEPON)</p>
                                        <ol>
                                            <li>Masukkan no. handphone</li>
                                            <li>Cari nama kontak atau username Shopee</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : MENGISI NOMINAL TRANSFER</p>
                                        <ol>
                                            <li>Masukkan nominal yang ingin ditransfer</li>
                                            <li>Pilih Lanjutkan</li>
                                            <li>Pilih Transfer Sekarang</li>
                                            <li>Masukkan PIN ShopeePay.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol>
                                            <li>Setelah transaksi anda selesai, Silahkan kirimkan
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
                        @endif
                        @if($nama == 'Bank BSI')
                        {{-- Bank BSI --}}
                        <div class="card">
                            <div class="card-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#bsi" aria-expanded="false" aria-controls="bsi">
                                    <i class="fa-solid fa-money-bill-transfer me-2"></i> Pembayaran Via ATM
                            </div>
                            <div id="bsi" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">
                                        <p class="fw-bold">LANGKAH 1 : TEMUKAN ATM TERDEKAT</p>
                                        <ol>>
                                            <li>Masukkan kartu, kemudian pilih bahasa dan
                                                masukkan
                                                PIN anda</li>
                                            <li>Pilih "Transaksi" dan pilih "Transfer"</li>
                                            <li>Pilih menu transfer antar-bank atau transfer ke
                                                bank lain.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : DETAIL PEMBAYARAN</p>
                                        <ol>
                                            <li>Masukkan kode Bank BSI dan nomor rekening.(no rek
                                                mas faz)</li>
                                            <li>Masukkan nominal transfer ke BSI.</li>
                                            <li>Periksa data transaksi dan tekan "YA" / "BENAR"
                                            </li>
                                            <li>Tunggu bukti transfer BSI muncul.</li>
                                        </ol>

                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol>
                                            <li>Setelah transaksi anda selesai, Silahkan kirimkan
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
                                    data-bs-target="#bsiM" aria-expanded="false" aria-controls="bsiM">
                                    <i class="fa-solid fa-money-bill-transfer me-2"></i> Pembayaran Via M-Banking
                            </div>
                            <div id="bsiM" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">
                                        <p class="fw-bold">LANGKAH 1 : BUKA APLIKASI BSI MOBILE.</p>
                                        <ol>>
                                            <li>Masuk dengan menggunakan akun BSI Mobile Anda.</li>
                                            <li>Pada halaman utama, klik menu Transfer.</li>
                                            <li>Masukkan kata sandi BSI Mobile Anda.</li>
                                            <li>Lalu, klik pada menu Transfer antar Rekening BSI.</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : DETAIL TRANSFER</p>
                                        <ol>
                                            <li>Tentukan rekening sumber dana.</li>
                                            <li>Tentukan tujuan transfer.</li>                                         
                                            <li>Masukkan nomor rekening BSI tujuan (no rek mas faza)</li>
                                            <li>Masukkan keterangan (opsional), lalu klik Selanjutnya.</li>
                                            <li>Periksa kembali informasi mengenai transaksi Anda. pastikan nomor rekening dan nama penerima sudah sesuai. Lalu, klik Transfer.</li>
                                            <li>Masukkan PIN BSI Mobile Anda.</li>
                                        </ol>

                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol>
                                            <li>Setelah transaksi anda selesai, Silahkan kirimkan
                                                bukti transfer ke form yang sudah tersedia, invoice ini akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($nama == 'Jenius')
                        {{-- Jenius --}}
                        <div class="card">
                            <div class="card-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#jenius" aria-expanded="false" aria-controls="jenius">
                                    <i class="fa-solid fa-money-bill-transfer me-2"></i> Pembayaran Via M-Banking
                            </div>
                            <div id="jenius" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px; line-height:normal">
                                        <p class="fw-bold">LANGKAH 1 : TEMUKAN ATM TERDEKAT</p>
                                        <ol>
                                            <li>Pilih Transfer antar Bank</li>
                                            <li> Pada Bank Penerima, pilih BTPN atau masukkan kode bank BTPN (213).</li>
                                            <li>Lanjutkan dengan masukan nomor rekening Jenius. (no mas faza)</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : DETAIL PEMBAYARAN</p>
                                        <ol>
                                            <li>Masukkan nominal yang akan ditransfer.</li>
                                            <li>Pastikan informasi rekening tujuan sudah sesuai, lalu pilih Benar.</li>
                                        </ol>

                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol>
                                            <li>Setelah transaksi anda selesai, Silahkan kirimkan
                                                bukti transfer ke form yang sudah tersedia, invoice ini akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- <div class="card">
                            <div class="card-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa-solid fa-money-bill-transfer me-2"></i> Pembayaran Via M-Banking
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="text-dark" style="font-size: 16px">
                                        <p class="fw-bold">LANGKAH 1 : MASUK KE AKUN ANDA</p>
                                        <ol>
                                            <li>Buka aplikasi BRI Mobile Banking, masukkan USER ID
                                                dan PIN anda</li>
                                            <li>Pilih "Pembayaran" dan pilih "Briva"</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 2 : DETAIL PEMBAYARAN</p>
                                        <ol>
                                            <li>Masukkan Nomor Virtual Account anda
                                                92001981045887568 dan jumlah yang ingin anda
                                                bayarkan</li>
                                            <li>Masukkan PIN Mobile Banking BRI</li>
                                        </ol>
                                        <br>
                                        <p class="fw-bold">LANGKAH 3 : TRANSAKSI BERHASIL</p>
                                        <ol>
                                            <li>Setelah transaksi anda selesai, invoice ini akan
                                                diupdate secara otomatis. Proses
                                                ini mungkin
                                                memakan waktu hingga 5 menit</li>
                                        </ol>
                                    </span>
                                </div>
                            </div>
                        </div> -->

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
                {{-- <form action=""> --}}
                @if ($bank->isnotempty())
                    <div class="row">
                        @foreach ($bank as $b)
                            <div class="col-12">
                                <div class="d-flex flex-column px-md-5 px-4 mb-4">
                                    <span>Nomer Rekening {{ $b->nama }}</span>
                                    <div class="inputWithIcon">
                                        <input class="form-control" type="text" value="{{ $b->nomor_rekening }}">
                                        <span class="">
                                            <a class="btn" type="button">
                                                <img src="{{ asset('illustration/' . $b->image) }}" alt=""
                                                    style="width: 100%">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Atas Nama</span>
                                    <div class="inputWithIcon"> <input class="form-control text-uppercase" type="text"
                                            value="{{ $b->penerima }}"> <span class="far fa-user"></span> </div>
                                </div>
                            </div>
                            <div class="col-12">
                                @foreach ($transaksi as $t)
                                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Nominal Yang Harus
                                            Dibayarkan</span>
                                        <div class="inputWithIcon"> <input class="form-control text-uppercase"
                                                type="text" value="IDR. {{ number_format($t->total, 0, ',', '.') }}">
                                            <span class="fas fa-money-bill-wave-alt"></span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-12 px-md-5 px-4 mt-3">
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalKonfirmasi">Konfirmasi Pembayaran</button>
                            </div>
                        @endforeach
                    </div>
                @elseif ($ewallet->isnotempty())
                    <div class="row">
                        @foreach ($ewallet as $w)
                            <div class="col-12">
                                <div class="d-flex flex-column px-md-5 px-4 mb-4">
                                    <span>Pembayaran Via {{ $w->nama }}</span>
                                    <div class="inputWithIcon">
                                        <input class="form-control" type="text" value="{{ $w->nomor_hp }}">
                                        <span class="">
                                            <a class="btn" type="button">
                                                <img src="{{ asset('illustration/' . $w->image) }}" alt=""
                                                    style="width: 100%">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Atas Nama</span>
                                    <div class="inputWithIcon"> <input class="form-control text-uppercase" type="text"
                                            value="{{ $w->penerima }}"> <span class="far fa-user"></span> </div>
                                </div>
                            </div>
                            <div class="col-12">
                                @foreach ($transaksi as $t)
                                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Nominal Yang Harus
                                            Dibayarkan</span>
                                        <div class="inputWithIcon"> <input class="form-control text-uppercase"
                                                type="text" value="IDR. {{ number_format($t->total, 0, ',', '.') }}">
                                            <span class="fas fa-money-bill-wave-alt"></span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-12 px-md-5 px-4 mt-3">
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalKonfirmasi">Konfirmasi Pembayaran</button>
                            </div>
                        @endforeach
                    </div>
                @endif
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

                {{-- </form> --}}

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
                <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @foreach ($transaksi as $t)
                            <div>
                                <label for="">Tanggal Checkout</label>
                                <input type="date" class="form-control mt-2" name="date" id="date"
                                    value="{{ date('Y-m-d') }}" readonly>
                            </div>
                            <div>
                                <label for="" class="mt-3">Kode Pesanan</label>
                                <input type="text" class="form-control mt-2" name="kode" id="kode"
                                    value="{{ $t->unique_code }}" readonly>
                            </div>
                            <div>
                                <label for="" class="mt-3">Bukti Pembayaran (Struk / Screenshoot
                                    Transfer)</label>
                                <input type="file" class="form-control mt-2" name="bukti" id="bukti" required>
                            </div>
                            <input type="hidden" name="transaksi_id" value="{{ $t->id }}">
                            @if ($bank->isnotempty())
                                @foreach ($bank as $b)
                                    <input type="hidden" name="bank" value="{{ $b->nama }}">
                                @endforeach
                            @elseif($ewallet->isnotempty())
                                @foreach ($ewallet as $w)
                                    <input type="hidden" name="wallet" value="{{ $w->nama }}">
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" data-bs-target="#myModal"
                            data-bs-toggle="modal">Kirim Bukti</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    {{-- </section> --}}
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="icon-box">
                        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_atippmse.json"
                            data-aos="fade-down" id="porto-animation" background="transparent" speed="1"
                            style="width: 100%" loop autoplay></lottie-player>
                    </div>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
                </div>
                <div class="modal-body text-center">
                    <h4>Success!</h4>
                    <p>Konfirmasi pembayaran anda sudah kami terima, berkas sedang kami proses.</p>
                    {{--   --}}
                </div>
            </div>
        </div>
    </div>
    <style>
        ol li {
            list-style-type: decimal !important;
        }
    </style>
@endsection
