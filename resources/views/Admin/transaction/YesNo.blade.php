@extends('layout.admin')
@section('content')
@section('judul', 'Transaction')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('requestuser.index') }}" class="btn my-3">
                <i class="fas fa-arrow-left"></i></a>
            @foreach ($transaksi as $t)
                {{ $t->unique_code }}
            @endforeach

            @foreach ($request_user as $r)
                @if ($r->status == "pending")
                    <div class="card">
                        <div class="card-header">
                            @foreach ($request_user as $r)
                                <h5>Do you want to accept it ?</h5>
                            @endforeach
                        </div>
                        <div class="card-body">
                            @foreach ($request_user as $r)
                                <div class="row">
                                    <div class="col">
                                        <h5 class="mb-0 me-auto">Pembeli</h5>
                                    </div>
                                    <div class="col text-right">
                                        <h5 class="mb-0 me-auto font-weight-bold">{{ $r->nama_pemesan }}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    @php
                                        $tanggalMulai = app(\Illuminate\Support\Carbon::class)->parse($r->tanggal_mulai);
                                        $jatuhTempo = app(\Illuminate\Support\Carbon::class)->parse($r->jatuh_tempo);

                                        $selisihHari = $tanggalMulai->diffInDays($jatuhTempo) . ' Hari';
                                        $selisihBulan = $tanggalMulai->diffInMonths($jatuhTempo);

                                        // Jika selisih lebih dari 30 hari, ubah ke dalam format "1 bulan"
                                        if ($selisihBulan >= 1) {
                                            $selisihHari = $selisihBulan . ' Bulan';
                                        }
                                    @endphp
                                    <div class="col">
                                        <h5 class="mb-0 me-auto">Permintaan Jangka waktu kredit</h5>
                                    </div>
                                    <div class="col text-right">
                                        {{-- <h5 class="mb-0 me-auto font-weight-bold">1 Bulan</h5> --}}
                                        <h5 class="mb-0 me-auto font-weight-bold">{{$selisihHari}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="mb-0 me-auto">Status</h5>
                                    </div>
                                    <div class="col text-right">
                                        <h5 class="mb-0 me-auto font-weight-bold text-uppercase">{{$r->status}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="mb-0 me-auto">Notes / Catatan :</h5>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <h5 class="mb-0 me-auto text-muted">{{$r->deskripsi}}</h5>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    {{-- form yes --}}
                                    <div class="col">
                                        <form action="{{ route('requestuser.update', $r->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            <input type="hidden" value="accept" name="status">
                                            @foreach ($request_user as $r)
                                                <input type="hidden" value="{{ $r->id }}" name="requser_id">
                                            @endforeach
                                            <button class="btn btn-success w-100">Accept</button>
                                        </form>
                                        {{-- <a href="" class="btn btn-block btn-success">YES</a> --}}
                                    </div>

                                    <div class="col">
                                        <a class="btn btn-danger w-100" data-toggle="modal"
                                            data-target="#declinedModal">
                                            declined
                                        </a>
                                    </div>

                                    {{-- benekno modal e lip ;-; --}}
                                    <div class="modal fade" id="declinedModal" tabindex="-1" role="dialog"
                                        aria-labelledby="declinedModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('requestuser.update', $r->id) }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="note">Alasan ditolaknya request?</label>
                                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                                            <input type="hidden" name="status" value="declined">
                                                            @foreach ($request_user as $r)
                                                                <input type="hidden" value="{{ $r->id }}"
                                                                    name="requser_id">
                                                            @endforeach
                                                            <textarea name="note" class="form-control" id="note" cols="30" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer text-left">
                                                        <button class="btn btn-primary" type="submit">Save
                                                            changes</button>
                                                        <button class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach



            <div class="card mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-0 me-auto">Status</h5>
                        </div>
                    </div>
                    @foreach ($request_user as $r)
                        <div class="col text-right">
                            @if ($r->status == 'declined')
                                <h5 class="mb-0 me-auto text-danger font-weight-bold">DECLINED</h5>
                            @elseif($r->status == 'accept')
                                <h5 class="mb-0 me-auto text-success font-weight-bold">ACCEPTED</h5>
                            @else
                                <h5 class="mb-0 me-auto text-warning font-weight-bold">PENDING</h5>`
                            @endif
                        </div>
                    @endforeach
                    <div class="col text-right">
                    </div>
                </div>
                <div class="card-body ">
                    <span>alasan ditolak</span>
                    @foreach ($request_user as $r)
                        <div class="">
                            <div class="bg-dark">
                                {{ $r->note_admin }}
                            </div>
                        </div>
                    @endforeach
                    <ul class="list-group list-group-flush">
                        @foreach ($detail as $d)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0 pb-0">
                                    {{ $d->produk->nama_produk }}
                                    {{-- <span>Rp. {{ number_format($d->produk->harga * $d->quantity, 0, ',', '.') }}</span> --}}
                                    <span>Rp {{ number_format($d->produk->harga, 0, ',', '.') }}</span>
                                </li>
                            </ul>
                        @endforeach

                        @foreach ($transaksi as $t)
                            <ul class="list-group list-group-flush mt-5">
                                <hr>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <div>
                                        Total
                                    </div>
                                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <div>
                                        biaya admin
                                    </div>
                                    <span>Rp {{ number_format($admin, 0, ',', '.') }}</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center px-0 mt-4 h4">
                                    <div>
                                        <strong>Grand Total</strong>
                                    </div>
                                    <span><strong>Rp {{ number_format($grandtotal, 0, ',', '.') }}</strong></span>
                                </li>
                            </ul>
                        @endforeach
                    </ul>
                </div>
            </div>

            @foreach ($request_user as $r)
                @if ($r->status == 'declined')
                @else
                    <div class="card mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body ">
                            <ul class="list-group list-group-flush">
                                @if (!$termin->isEmpty())
                                    @foreach ($termin as $t)
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center px-0 pb-0">
                                                {{ $loop->iteration }}
                                                <span>{{ $t->image }}</span>
                                                <span>Rp. {{ number_format($t->harga, 0, ',', '.') }}</span>
                                                {{-- <span>Rp {{ number_format($d->produk->harga, 0, ',', '.') }}</span> --}}
                                            </li>
                                        </ul>
                                    @endforeach
                                @else
                                    belum bayar
                                @endif

                                <ul class="list-group list-group-flush mt-5">
                                    <hr>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <div>
                                            Total
                                        </div>
                                        <span>Rp {{ number_format($totaltermin, 0, ',', '.') }}</span>
                                    </li>
                                </ul>

                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center px-0 mt-4 h4">
                                    <div>
                                        <strong>Grand Total</strong>
                                    </div>
                                    <span><strong>Rp {{ number_format($grandtotal, 0, ',', '.') }}</strong></span>
                                </li>

                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center px-0 mt-4 h4">
                                    <div>
                                        <strong>Total Yang Harus Dibayar</strong>
                                    </div>
                                    <span><strong>Rp
                                            {{ number_format($grandtotal - $totaltermin, 0, ',', '.') }}</strong></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
@endsection
