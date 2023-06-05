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
                        <td>Rp. {{ number_format($p->transaksi->total,0,',','.') }}</td>
                        <td>
                            @if ($p->status == 'pending')
                                pending
                            @elseif($p->status == 'checked')
                                cek
                            @endif
                        </td>
                        <td>{{ $p->gateaways->nama_gateaway }}</td>
                        <td>
                            <a href="{{ route('transaksidetail.show',$p->id) }}" class="btn-sm btn-success">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
