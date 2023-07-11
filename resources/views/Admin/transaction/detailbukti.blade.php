@extends('layout.admin')
@section('content')
@section('judul', 'Show Pembayaran')

<div class="container" style="max-width: 50rem">
    <a href="{{ url()->previous() }}" class="pl-0 pb-3">
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
                                @if ($pembayaran->request_user_id != null)
                                    <h5 class="h3 mb-0 me-auto text-warning font-weight-bold">kredit
                                    </h5>
                                @endif
                                <h5 class="h3 mb-0 me-auto text-warning font-weight-bold">{{ $pembayaran->status }}</h5>
                                <p class="text-muted">Total</p>
                            </div>
                        </div>

                        <div class="row my-2">
                            @if ($pembayaran->request_user_id == null)
                                <div class="col text-center">
                                    <p class="h3">Rp.{{ number_format($pembayaran->total_bayar, '0', ',', '.') }}
                                    </p>
                                </div>
                            @endif
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
                            @if ($pembayaran->status == 'checked')
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-success w-100 yms-outline-blue rounded-pill">
                                            download
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-success w-100 yms-outline-blue rounded-pill">
                                            share
                                        </button>
                                    </div>
                                </div>
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
