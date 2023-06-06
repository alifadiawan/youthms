@extends('layout.admin')
@section('content')
@section('judul', 'Transaction')
<div class="card">
    <div class="col-lg-12">
        <table class="table table-striped mt-2">
            <thead>
                <tr style="background-color: #0EA1E2">
                    <th class="text-white">No</th>
                    <th class="text-white">Nama</th>
                    {{-- <th class="text-white">Jasa yang dipesan</th> --}}
                    <th class="text-white">Total harga</th>
                    <th class="text-white">Status</th>
                    <th class="text-white">Metode</th>
                    <th class="text-white">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayaran as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->transaksi->member->name }}</td>
                        <td>Rp. {{ number_format($p->transaksi->total, 0, ',', '.') }}</td>
                        <td>
                            @if ($p->status == 'pending')
                                pending
                            @elseif($p->status == 'checked')
                                cek
                            @endif
                        </td>
                        <td>
                            @if ($p->bank_id)
                                {{ $p->bank->nama }}
                                <img src="{{ asset('illustration/' . $p->bank->image) }}" alt="" style="width: 100%">
                            @elseif($p->ewallet_id)
                                {{ $p->ewallet->nama }}
                                <img src="{{ asset('illustration/' . $p->ewallet->image) }}" alt="" style="width: 100%">
                            @endif
                            {{-- {{ $p }} --}}
                        </td>
                        <td>
                            <a href="{{ route('pembayaran.show', $p->id) }}" class="btn-sm btn-success">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
