@extends('layout-landing2.body')
@section('title', '| ')
@section('content')


<div id="container" class="container my-5 ">
    <a href="" class="my-5">
        <i class="fas fa-arrow-left"></i>
    </a>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header yms-blue">
                    <div class="row">
                        <div class="col">
                            <img src="{{asset('youth-logo.svg')}}" width="150px" alt="">
                        </div>
                        <div class="col text-end">
                            <p>akwdnada</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="konten">
                        <div class="row">
                            <div class="col text-center">
                                <h5 class="h3 mb-0 me-auto text-warning font-weight-bold">KREDIT</h5>
                                {{-- @if (in_array($detail[0]->transaksi_id, $adm_utang))
                                <h5 class="h3 mb-0 me-auto text-danger font-weight-bold">belum bayar</h5>
                            @elseif(in_array($detail[0]->transaksi_id, $adm_kredit))
                                <h5 class="h3 mb-0 me-auto text-warning font-weight-bold">KREDIT</h5>
                            @elseif(in_array($detail[0]->transaksi_id, $adm_pending))
                                <h5 class="h3 mb-0 me-auto text-warning font-weight-bold">PENDING</h5>
                            @elseif(in_array($detail[0]->transaksi_id, $adm_declined))
                                <h5 class="h3 mb-0 me-auto text-dark font-weight-bold">DECLINED</h5>
                            @else
                                <h5 class="mb-0 me-auto text-success font-weight-bold">LUNAS</h5>
                            @endif --}}
                                <p class="text-muted">10 Mei 2023 08:33:12 WIB</p>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col text-center">
                                <p class="h3">Rp.100.000</p>
                            </div>
                        </div>

                        <div class="penerima">
                            <div class="row mt-3">
                                <div class="col">
                                    Penerima
                                </div>
                                <div class="col text-end">
                                    Ilham Bintang
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Penerima
                                </div>
                                <div class="col text-end">
                                    Ilham Bintang
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Penerima
                                </div>
                                <div class="col text-end">
                                    Ilham Bintang
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Penerima
                                </div>
                                <div class="col text-end">
                                    Ilham Bintang
                                </div>
                            </div>
                        </div>

                        <div class="pengirim">
                            <hr class="my-3">
                            <div class="row">
                                <div class="col">
                                    Penerima
                                </div>
                                <div class="col text-end">
                                    Ilham Bintang
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Penerima
                                </div>
                                <div class="col text-end">
                                    Ilham Bintang
                                </div>
                            </div>
                        </div>

                        <div class="footer mt-3">
                            <div class="row">
                                <div class="col">
                                    <a href="" class="btn w-100 btn-outline-info rounded-pill">
                                        Download
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="" class="btn w-100 btn-outline-info rounded-pill">
                                        Share
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection