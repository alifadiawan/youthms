@extends('layout.admin')
@section('content')
@section('judul', 'Transaction')

<div class="container">
    @foreach ($pembayaran as $p)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('pembayaran.list') }}" class="btn my-3">
                    <i class="fas fa-arrow-left"></i></a>
                @foreach ($transaksi as $t)
                    {{ $t->unique_code }}
                @endforeach

                <div class="card">
                    @if ($p->status == 'checking')
                        <div class="card-header">
                            <h5>Do you want to accept it ?</h5>

                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-0 me-auto">Pembeli</h5>
                                </div>
                                <div class="col text-right">
                                    <h5 class="mb-0 me-auto font-weight-bold">{{ $p->transaksi->member->name }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-0 me-auto">Waktu Transaksi</h5>
                                </div>
                                <div class="col text-right">
                                    {{-- <h5 class="mb-0 me-auto font-weight-bold">1 Bulan</h5> --}}
                                    <h5 class="mb-0 me-auto font-weight-bold">{{ $p->created_at }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-0 me-auto">Bukti transfer</h5>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <img src="{{ asset('./bukti_transfer/' . $p->bukti_tf) }}" alt=""
                                        style="width: 100%">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <form action="{{ route('pembayaran.update', $p->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" value="checked" name="status">
                                        <button type="submit" class="btn btn-success w-100">accept</button>
                                    </form>
                                </div>

                                {{-- <div class="col">
                                    <form action="{{ route('pembayaran.update', $p->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" value="declined" name="status">
                                        <button type="submit" class="btn btn-sm btn-danger">declined</button>
                                    </form>
                                </div> --}}
                                <div class="col">
                                    <a class="btn btn-danger w-100" data-toggle="modal" data-target="#declinedModal">
                                        declined
                                    </a>
                                </div>
                            </div>

                            {{-- benekno modal e lip ;-; --}}
                            <div class="modal fade" id="declinedModal" tabindex="-1" role="dialog"
                                aria-labelledby="declinedModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('pembayaran.update', $p->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="note">Alasan ditolaknya request?</label>
                                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                    <input type="hidden" name="status" value="declined">
                                                    <textarea name="note" class="form-control" id="note" cols="30" rows="10" required></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-left">
                                                <button class="btn btn-primary" type="submit">Save
                                                    changes</button>
                                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-0 me-auto">Pembeli</h5>
                                </div>
                                <div class="col text-right">
                                    <h5 class="mb-0 me-auto font-weight-bold">{{ $p->transaksi->member->name }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-0 me-auto">Waktu Transaksi</h5>
                                </div>
                                <div class="col text-right">
                                    {{-- <h5 class="mb-0 me-auto font-weight-bold">1 Bulan</h5> --}}
                                    <h5 class="mb-0 me-auto font-weight-bold">{{ $p->created_at }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-0 me-auto">Bukti transfer</h5>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <img src="{{ asset('./bukti_transfer/' . $p->bukti_tf) }}" alt=""
                                        style="width: 100%">
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-0 me-auto">Status</h5>
                                </div>
                            </div>
                            <div class="col text-right">
                                @if ($p->status == 'declined')
                                    <h5 class="mb-0 me-auto text-danger font-weight-bold">DECLINED</h5>
                                @elseif($p->status == 'checked')
                                    <h5 class="mb-0 me-auto text-success font-weight-bold">CHECKED</h5>
                                @else
                                    <h5 class="mb-0 me-auto text-warning font-weight-bold">PENDING</h5>`
                                @endif
                            </div>
                            @if ($p->status == 'declined')
                                <div class="row">
                                    Alasan Ditolak
                                </div>
                                <div class="row text-muted">
                                    {{ $p->note_admin }}
                                </div>
                            @endif
                        </div>
                        <div class="card-body ">
                            {{-- <span>alasan ditolak</span> --}}
                            <div class="">
                                <div class="bg-dark">
                                    {{-- {{ $r->note_admin }} --}}
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach ($detail as $d)
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center px-0 pb-0">
                                            {{ $d->produk->nama_produk }}
                                            {{-- <span>Rp. {{ number_format($d->produk->harga * $d->quantity, 0, ',', '.') }}</span> --}}
                                            <span>Rp {{ number_format($d->produk->harga, 0, ',', '.') }}</span>
                                        </li>
                                    </ul>
                                @endforeach

                                @foreach ($transaksi as $t)
                                    <ul class="list-group list-group-flush mt-5">
                                        <hr>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <div>
                                                Total
                                            </div>
                                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center px-0">
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
                                            <span><strong>Rp
                                                    {{ number_format($grandtotal, 0, ',', '.') }}</strong></span>
                                        </li>
                                    </ul>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
    @endforeach
</div>
@endsection
