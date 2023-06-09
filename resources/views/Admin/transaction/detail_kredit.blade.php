    @extends('layout.admin')
    @section('content')
    @section('judul', 'Detail Kredit')

    {{-- detail total seluruh kredit di suatu transaksi  --}}
    <div class="card">
        <div class="col-lg-12">
            <table class="table table-striped mt-2">
                <thead>
                    <tr style="background-color: #0EA1E2">
                        <th class="text-white">No</th>
                        <th class="text-white">Nama</th>
                        <th class="text-white">Total harga</th>
                        <th class="text-white">Status</th>
                        <th class="text-white">Metode</th>
                        <th class="text-white">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requesr as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->transaksi->member->name }}</td>
                            <td>Rp. {{ number_format($p->transaksi->total, 0, ',', '.') }}</td>
                            <td>

                                @if ($p->status == 'checking')
                                    <button disabled="disabled" class="btn btn-sm btn-warning"></button><span
                                        class="badge">{{ $p->status }}</span>
                                @elseif($p->status == 'checked')
                                    <button disabled="disabled" class="btn btn-sm btn-success"></button><span
                                        class="badge">{{ $p->status }}</span>
                                @elseif($p->status == 'declined')
                                    <button disabled="disabled" class="btn btn-sm btn-danger"></button><span
                                        class="badge">{{ $p->status }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($p->bank_id)
                                    <div class="row">
                                        <img src="{{ asset('illustration/' . $p->bank->image) }}" alt=""
                                            style="width: 75px">
                                    </div>
                                @elseif($p->ewallet_id)
                                    <span>
                                        <img src="{{ asset('illustration/' . $p->ewallet->image) }}" alt=""
                                            style="width: 75px"></span>
                                @endif
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
