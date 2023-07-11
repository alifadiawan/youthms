@extends('layout.admin')
@section('content')
@section('judul', 'Show Pembayaran')

<div class="container" style="max-width: 50rem">
    <a href="btn" class="pl-0 pb-3">
        <i class="fas fa-arrow-left"></i>
    </a>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header yms-blue">
                    <div class="row align-items-center">
                        <div class="col">
                            @if ($pembayaran->ewallet)
                                <img src="{{ asset('illustration/' . $pembayaran->ewallet->image) }}" alt=""
                                    style="max-width: 110px">
                            @else
                                <img src="{{ asset('illustration/' . $pembayaran->bank->image) }}" alt=""
                                    style="max-width: 110px">
                            @endif
                        </div>
                        <div class="col text-right">
                            {{ $pembayaran->unique_code }}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="konten">
                        <div class="row">
                            <div class="col text-center">
                                <h5 class="h3 mb-0 me-auto text-warning font-weight-bold">{{ $pembayaran->status }}</h5>
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
                                <p class="text-muted">Total</p>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col text-center">
                                <p class="h3">Rp.{{ number_format($pembayaran->total_bayar, '0', ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="penerima">
                            <div class="row">
                                <div class="col">
                                    Bukti Pembayaran
                                </div>
                                <div class="col text-right">
                                    <img src="{{ asset('bukti_transfer/' . $pembayaran->bukti_tf) }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="footer mt-3">
                            <div class="row">
                                <div class="col">
                                    <a href="" class="btn btn-success w-100 yms-outline-blue rounded-pill">
                                        Accept
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="" class="btn btn-outline-danger w-100 yms-outline-blue rounded-pill">
                                        Decline
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

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ url()->previous() }}" class="btn my-3">
                <i class="fas fa-arrow-left"></i></a>

            <div class="card">
                <div class="col-lg-12">
                    <table>
                        <thead>
                            <tr>
                                <td>kode unik pembayaran</td>
                                <td>total dibayar</td>
                                <td>status pembayaran</td>
                                <td>metode pembayaran</td>
                                <td>bukti penmbayaran</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{ $pembayaran->unique_code }}

                                </td>
                                <td>

                                    Rp. {{ number_format($pembayaran->total_bayar, '0', ',', '.') }}
                                </td>
                                <td>

                                    {{ $pembayaran->status }}
                                </td>
                                <td>

                                    @if ($pembayaran->ewallet)
                                        <img src="{{ asset('illustration/' . $pembayaran->ewallet->image) }}"
                                            alt="">
                                    @else
                                        <img src="{{ asset('illustration/' . $pembayaran->bank->image) }}"
                                            alt="">
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ asset('bukti_transfer/' . $pembayaran->bukti_tf) }}" alt="">

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
@endsection
