@extends('layout-landing2.body')
@section('title', '| list pembayaran')
@section('content')
    <div id="container" class="container my-5">
        <!-- tombol -->
        <div class="row gap-2 mb-3">
            <div class="col">
                <h2 class="fw-bold text-dark" style="font-family: Poppins, sans-serif">History Pembayaran
                </h2>
            </div>
        </div>
        <!-- content -->
        <div class="card text-left">
            
            <div class="card-head" style="margin: 12px 12px 5px 12px;">
                <div class="row justify-content-end align-items-center ps-1 pb-2">
                    <label class="text-muted ">Sort by :</label>
                </div>
                <div class="row justify-content-start align-items-center gap-2 gap-lg-0">
                    <div class="col-12 col-lg-3">
                        <div class="form-group">
                            <div class="input-group">
                                <select name="sort_status" class="form-select" id="sort_status">
                                    <option value="">Semua</option>
                                    <option value="belum bayar">Belum Bayar</option>
                                    <option value="kredit">Kredit</option>
                                    <option value="lunas">Lunas</option>
                                    <option value="pending">Pending</option>
                                    <option value="checking">Checking</option>
                                    <option value="declined">Declined</option>
                                </select>
                                <button onClick="window.location.reload();" class="btn btn-outline-secondary"><i
                                        class="fa-solid fa-rotate fa-lg"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table mt-3">
                        <thead style="background-color: rgb(231, 230, 230); ">
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Metode</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody id="sort">
                            @foreach ($pembayaran as $cp)
                                @foreach ($cp as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->transaksi->unique_code }}</td>
                                        <td>Rp. {{ number_format($p->total_bayar, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($p->status == 'checking')
                                                <button disabled="disabled" class="btn btn-sm btn-warning"></button><span
                                                    class="badge text-dark">{{ $p->status }}</span>
                                            @elseif($p->status == 'checked')
                                                <button disabled="disabled" class="btn btn-sm btn-success"></button><span
                                                    class="badge text-dark">{{ $p->status }}</span>
                                            @elseif($p->status == 'declined')
                                                <button disabled="disabled" class="btn btn-sm btn-danger"></button><span
                                                    class="badge text-dark">{{ $p->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($p->bank)
                                                <img src="{{ asset('illustration/' . $p->bank->image) }}"
                                                    style="width: 75px">
                                            @elseif($p->ewallet)
                                                <img src="{{ asset('illustration/' . $p->ewallet->image) }}"
                                                    style="width: 75px">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('pembayaran.show', $p->id) }}"
                                                class="btn btn-outline-primary"><i
                                                class="fa-solid fa-circle-info"></i> Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    {{-- <div id="container" class="container mt-5">
        <div class="card">
            <div class="col-lg-12">
                <div class="table-responsive">

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
                                        <td>Rp. {{ number_format($p->total_bayar, 0, ',', '.') }}</td>
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
                                            @if ($p->bank)
                                                <img src="{{ asset('illustration/' . $p->bank->image) }}"
                                                    style="width: 75px">
                                            @elseif($p->ewallet)
                                                <img src="{{ asset('illustration/' . $p->ewallet->image) }}"
                                                    style="width: 75px">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('pembayaran.show', $p->id) }}"
                                                class="btn-sm btn-success">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> --}}
@endsection
