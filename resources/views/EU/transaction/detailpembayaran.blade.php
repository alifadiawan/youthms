    @extends('layout-landing2.body')
    @section('content')

        <div id="container" class="container my-5" style="max-width: 800px">
            <a href="{{ url()->previous() }}" class="mb-3 btn btn-outline-secondary">
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
                                <div class="col text-end">
                                    {{ $pembayaran->unique_code }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="konten">
                                <div class="row">
                                    <div class="col text-center">

                                        @if ($pembayaran->request_user_id != null)
                                            <h5
                                                class="h3 mb-0 text-uppercase fw-bold me-auto text-warning font-weight-bold">
                                                kredit
                                            </h5>
                                        @endif
                                        @if ($pembayaran->status == 'checking')
                                            <h5
                                                class="h3 mb-0 text-uppercase fw-bold me-auto text-warning font-weight-bold">
                                                <i class="fa-solid fa-circle-notch fa-spin"></i>
                                                {{ $pembayaran->status }}
                                            </h5>
                                        @else
                                            <h5
                                                class="h3 mb-0 text-uppercase fw-bold me-auto text-success font-weight-bold">
                                                <i class="fa-regular fa-circle-check fa-bounce"></i>
                                                {{ $pembayaran->status }}
                                            </h5>
                                        @endif
                                        <p class="text-muted">
                                            {{ \Carbon\Carbon::parse($pembayaran->created_at)->format('d F Y H:i:s') }}</p>
                                    </div>
                                </div>

                                <div class="penerima">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            Bukti Pembayaran
                                        </div>
                                        <div class="col-12 text-center">
                                            <img class="img-fluid"
                                                src="{{ asset('bukti_transfer/' . $pembayaran->bukti_tf) }}" alt="">
                                        </div>
                                    </div>

                                </div>

                                <div class="pengirim">
                                    <hr class="my-3">
                                    <div class="row">
                                        <div class="col">
                                            Total :
                                        </div>
                                        @if ($pembayaran->request_user_id == null)
                                            <div class="col text-end fw-bold">
                                                Rp.{{ number_format($pembayaran->total_bayar, '0', ',', '.') }}
                                            </div>
                                        @endif
                                        {{-- <div class="col text-end">
                                            Rp. {{ number_format($pembayaran->total_bayar, 0, ',', '.') }}
                                        </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            Pembayar
                                        </div>
                                        <div class="col text-end">
                                            Ilham Bintang
                                        </div>
                                    </div>
                                </div>

                                <div class="footer mt-3">
                                    @if ($pembayaran->status == 'checked')
                                        <div class="row">
                                            <div class="col">
                                                <form action="{{ route('pembayaran.pdf') }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn w-100 yms-outline-blue rounded-pill">
                                                        Download
                                                    </button>
                                                    <input type="hidden" name="id" value="{{$pembayaran->id}}">
                                                </form>
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


                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
