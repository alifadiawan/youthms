@extends('layout.admin')
@section('content')
@section('judul', 'Transaction')
<div class="card">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-striped mt-2">
                <thead>
                    <tr style="background-color: #0EA1E2">
                        <th class="text-white">kode transaksi</th>
                        <th class="text-white">Nama</th>
                        <th class="text-white">Total harga</th>
                        <th class="text-white">Tanggal</th>
                        <th class="text-white">Status</th>
                        <th class="text-white">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trx as $t)
                        <tr>
                            <td>{{ $t->unique_code }}</td>
                            <td>{{ $t->member->name }}</td>
                            <td>Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                            <td>{{ \Carbon\carbon::parse($t->created_at)->format('d F Y') }}</td>
                            @if (in_array($t->id, $uu))
                                <td>
                                    <button disabled="disabled" class="btn btn-sm btn-danger"></button><span
                                        class="badge">Belum Bayar</span>
                                </td>
                            @elseif(in_array($t->id, $uk))
                                <td>
                                    <button disabled="disabled" class="btn btn-sm btn-warning"></button><span
                                        class="badge">Kredit</span>
                                </td>
                            @elseif(in_array($t->id, $up))
                                <td>
                                    <button disabled="disabled" class="btn btn-sm btn-info"></button><span
                                        class="badge">Pending</span>
                                </td>
                            @elseif(in_array($t->id, $ud))
                                <td>
                                    <button disabled="disabled" class="btn btn-sm btn-dark"></button><span
                                        class="badge">Declined</span>
                                </td>
                            @elseif(in_array($t->id, $ul))
                                <td>
                                    <button disabled="disabled" class="btn btn-sm btn-success"></button><span
                                        class="badge">Lunas</span>
                                </td>
                            @elseif(in_array($t->id, $uc))
                                <td>
                                    <button disabled="disabled" class="btn btn-sm btn-primary"></button><span
                                        class="badge">Checking</span>
                                </td>
                            @endif
                            <td>
                                <a href="{{ route('transaksi.show', $t->id) }}" class="btn-sm btn-success">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        {{ $trx->links() }}

    </div>

</div>
@endsection
