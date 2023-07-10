@extends('layout.admin')
@section('content')
@section('judul', 'List Pembayaran ')
<div class="card">
    <div class="col-lg-12">
        <table class="table table-striped mt-2">
            <thead>
                <tr style="background-color: #0EA1E2">
                    <th class="text-white">No</th>
                    <th class="text-white">Kode Transaksi</th>
                    <th class="text-white">Total Harga</th>
                    <th class="text-white">Status</th>
                    <th class="text-white">Metode</th>
                    <th class="text-white">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayaran as $cp)
                    @foreach ($cp as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->transaksi->unique_code }}</td>
                            <td>Rp. {{ number_format($p->transaksi->total, 0, ',', '.') }}</td>
                            <td>{{ $p->status }}</td>
                            <td>
                                @if ($p->bank)
                                    <img src="{{ asset('illustration/' . $p->bank->image) }}" style="width: 75px">
                                @elseif($p->ewallet)
                                    <img src="{{ asset('illustration/' . $p->ewallet->image) }}" style="width: 75px">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('pembayaran.show', $p->id) }}" class="btn-sm btn-success">Detail</a>

                            </td>
                        </tr>
                    @endforeach
                @endforeach

            </tbody>
            {{-- <tbody>
                @foreach ($cp as $pemb)
                    @foreach ($pemb as $index => $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->transaksi_id }}</td>
                           
                        </tr>
                    @endforeach
                @endforeach

            </tbody> --}}
        </table>
    </div>

</div>
@endsection
