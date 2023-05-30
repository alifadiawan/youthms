@extends('layout-landing2.body')
@section('title', 'Transaction History')
@section('content')

    <div id="container" class="container my-5">

        <!-- tombol -->
        <div class="row gap-2 mb-3">
            <div class="col">
                <h2 class="fw-bold">History Transaksi</h2>
            </div>
        </div>

        <!-- content -->
        <div class="konten">


            <!-- filter -->
            <div class="row my-3">
                <div class="col">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Semua Transaksi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="lunas-tab" data-bs-toggle="pill" data-bs-target="#lunas"
                                type="button" role="tab" aria-controls="lunas" aria-selected="false">Lunas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="kredit-tab" data-bs-toggle="pill" data-bs-target="#kredit"
                                type="button" role="tab" aria-controls="kredit" aria-selected="false">kredit</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="belum-bayar-tab" data-bs-toggle="pill"
                                data-bs-target="#belum-bayar" type="button" role="tab" aria-controls="belum-bayar"
                                aria-selected="false">belum bayar</button>
                        </li>
                    </ul>


                    <div class="tab-content" id="pills-tabContent">
                        <!-- transaksi berhasil -->
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <table class="table table-borderless table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Total Bayar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all as $a)
                                        <tr>
                                            <td scope="row">{{ $a->tanggal }}</td>
                                            <td>Rp. {{ number_format($a->total, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($a->total_bayar, 0, ',', '.') }}</td>
                                            @if (in_array($a->id, $uu))
                                                <td>
                                                    <button disabled="disabled" class="btn btn-sm btn-danger"></button><span
                                                        class="badge text-dark">belum bayar</span>
                                                </td>
                                            @elseif(in_array($a->id, $uk))
                                                <td>
                                                    <button disabled="disabled"
                                                        class="btn btn-sm btn-warning"></button><span
                                                        class="badge text-dark">Kredit</span>
                                                </td>
                                            @elseif(in_array($a->id, $up))
                                                <td>
                                                    <button disabled="disabled"
                                                        class="btn btn-sm btn-info"></button><span
                                                        class="badge text-dark">pending</span>
                                                </td>
                                            @elseif(in_array($a->id, $ud))
                                                <td>
                                                    <button disabled="disabled"
                                                        class="btn btn-sm btn-dark"></button><span
                                                        class="badge text-dark">declined</span>
                                                </td>
                                            @elseif(in_array($a->id, $ul))
                                                <td>
                                                    <button disabled="disabled"
                                                        class="btn btn-sm btn-success"></button><span
                                                        class="badge text-dark">Lunas</span>
                                                </td>
                                            @endif
                                            <td>
                                                <form action="{{ route('transaksi.show', $a->id) }}">
                                                    <button type="submit" class="btn btn-success">detail</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



                    <!-- transaksi sedang berlangsung -->
                    {{-- <div class="tab-pane fade" id="lunas" role="tabpanel" aria-labelledby="lunas-tab" tabindex="0">
                        <div class="accordion-body">
                            <table class="table table-borderless table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>total</th>
                                        <th>total bayar</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lunas as $l)
                                        <tr>
                                            <td scope="row">{{ $l->tanggal }}</td>
                                            <td>Rp. {{ number_format($l->total) }}</td>
                                            <td>Rp. {{ number_format($l->total_bayar) }}</td>
                                            <td>
                                                <button disabled="disabled" class="btn btn-sm btn-success"></button><span
                                                    class="badge text-dark">Lunas</span>
                                            </td>
                                            <td>
                                                <form action="{{ route('transaksi.show', $l->id) }}">
                                                    <button type="submit" class="btn btn-success">detail</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}


                    {{-- <div class="tab-pane fade" id="kredit" role="tabpanel" aria-labelledby="kredit-tab" tabindex="0">
                        <div class="accordion-body">
                            <table class="table table-borderless table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>total</th>
                                        <th>total bayar</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kredit as $k)
                                        <tr>
                                            <td scope="row">{{ $k->tanggal }}</td>
                                            <td>Rp. {{ number_format($k->total) }}</td>
                                            <td>Rp. {{ number_format($k->total_bayar) }}</td>
                                            <td>
                                                <button disabled="disabled" class="btn btn-sm btn-warning"></button><span
                                                    class="badge text-dark">Kredit</span>
                                            </td>
                                            <td>
                                                <form action="{{ route('transaksi.show', $k->id) }}">
                                                    <button type="submit" class="btn btn-success">detail</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}


                    {{-- <div class="tab-pane fade" id="belum-bayar" role="tabpanel" aria-labelledby="belum-bayar-tab"
                        tabindex="0">
                        <div class="accordion-body">
                            <table class="table table-borderless table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>total</th>
                                        <th>total bayar</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($utang as $u)
                                        <tr>
                                            <td scope="row">{{ $u->tanggal }}</td>
                                            <td>Rp. {{ number_format($u->total) }}</td>
                                            <td>Rp. {{ number_format($u->total_bayar) }}</td>
                                            <td>
                                                <button disabled="disabled" class="btn btn-sm btn-danger"></button><span
                                                    class="badge text-dark">Belum Bayar</span>
                                            </td>
                                            <td>
                                                <form action="{{ route('transaksi.show', $u->id) }}">
                                                    <button type="submit" class="btn btn-success">detail</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                    <!-- transaksi success -->
                </div>
            </div>
        </div>
        {{-- <a href="" class="btn btn-sm btn-outline-primary active">Semua Transaksi</a>
                    <a href="" class="btn btn-sm btn-outline-secondary">Berhasil</a>
                    <a href="" class="btn btn-sm btn-outline-secondary">Sedang Berlangsung</a>
                    <a href="" class="btn btn-sm btn-outline-secondary">Gagal</a> --}}


        {{-- <div class="card">
                <div class="card-body">
                    <!-- kontent -->
                    <div class="row">
                        <table class="table table-borderless table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Subtotal</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($utang as $u)
                                    <tr>
                                        <td scope="row">{{ $u->tanggal }}</td>
                                        <td>Rp. {{ number_format($u->total) }}</td>
                                        <td>Rp. {{ number_format($u->total_bayar) }}</td>
                                        <td>
                                            <form action="{{ route('transaksi.show', $u->id) }}">
                                                <button type="submit" class="btn btn-success">detail</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div> --}}
        {{-- <div class="card">
                <div class="card-body">

                    <div class="accordion accordion-flush" id="accordionFlushExample">

                        <!-- item 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-utang" aria-expanded="false" aria-controls="flush-utang">
                                    Belum Bayar <span class="badge bg-danger ms-3">2</span>
                                </button>
                            </h2>
                            <div id="flush-utang" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                @if ($utang->isEmpty())
                                    tidak ada utang
                                @endif
                                <div class="accordion-body">
                                    <table class="table table-borderless table-responsive table-hover">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Subtotal</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($utang as $u)
                                                <tr>
                                                    <td scope="row">{{ $u->tanggal }}</td>
                                                    <td>Rp. {{ number_format($u->total) }}</td>
                                                    <td>Rp. {{ number_format($u->total_bayar) }}</td>
                                                    <td>
                                                        <form action="{{ route('transaksi.show', $u->id) }}">
                                                            <button type="submit" class="btn btn-success">detail</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>

                        <!-- item 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-kredit" aria-expanded="false" aria-controls="flush-kredit">
                                    Sedang Berlangsung <span class="badge bg-danger ms-3">2</span>
                                    </span>
                                </button>
                            </h2>
                            <div id="flush-kredit" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <table class="table table-borderless table-responsive ">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>jatuh tempo</th>
                                                <th>total</th>
                                                <th>telah dibayar</th>
                                                <th>sisa hutang</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    @if ($kredit->isEmpty())
                                                        tidak ada kredit
                                                    @endif
                                                </td>
                                            </tr>
                                            @foreach ($kredit as $k)
                                                <tr>
                                                    <td scope="row">{{ $k->tanggal }}</td>
                                                    <td scope=>{{ $k->date_expired }}</td>
                                                    <td>Rp. {{ number_format($k->total) }}</td>
                                                    <td>Rp. {{ number_format($k->total_bayar) }}</td>
                                                    <td>Rp. {{ number_format($k->total - $k->total_bayar) }}</td>
                                                    <td>
                                                        <form action="{{ route('transaksi.show', $k->id) }}">
                                                            <button type="submit" class="btn btn-success">detail</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-lunas" aria-expanded="false" aria-controls="flush-lunas">
                                    Success ( 2 )
                                </button>
                            </h2>
                            <div id="flush-lunas" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                @if ($lunas->isEmpty())
                                    tidak ada transaksi
                                @endif
                                @foreach ($lunas as $l)
                                    <div class="accordion-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>total</th>
                                                    <th>total bayar</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">{{ $l->tanggal }}</td>
                                                    <td>Rp. {{ number_format($l->total) }}</td>
                                                    <td>Rp. {{ number_format($l->total_bayar) }}</td>
                                                    <td>
                                                        <form action="{{ route('transaksi.show', $l->id) }}">
                                                            <button type="submit" class="btn btn-success">detail</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div> --}}
    </div>
    </div>

@endsection
