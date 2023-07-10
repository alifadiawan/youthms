@extends('layout.admin')
@section('content')
@section('judul', 'Show Pembayaran')

{{-- detail sebuah struk pembayaran  --}}
<div class="container">
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
        </div>
    @endsection
