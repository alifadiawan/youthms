@extends('layout-landing2.body')
@section('title', 'Transaction History')
@section('content')

    <div id="container" class="container my-5">
        <!-- tombol -->
        <div class="row gap-2 mb-3">
            <div class="col">
                <h2 class="fw-bold text-dark" style="font-family: Poppins, sans-serif">History Transaksi (24)</h2>
                <h2 class="fw-bold text-dark" style="font-family: Poppins, sans-serif">History Transaksi (24)</h2>
            </div>
        </div>
        <!-- content -->
        <div class="card text-left">
            {{-- <img class="card-img-top" src="holder.js/100px180/" alt=""> --}}
            <div class="card-body">

                <div class="d-flex flex-row align-items-center justify-content-end gap-3">
                    <div class="form-group">
                        <select name="sort_status" class="form-select" id="sort_status">
                            <option value="all">Sort by</option>
                            <option value="kredit">Kredit</option>
                            <option value="lunas">Lunas</option>
                            <option value="pending">Pending</option>
                            <option value="checking">Checking</option>
                            <option value="decined">Declined</option>
                        </select>
                    </div>
                </div>

                <table class="table mt-3">
                    <thead style="background-color: rgb(231, 230, 230); ">
                        <tr>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="sort">
                        @foreach ($all as $a)
                            <tr>
                                <td scope="row">{{ \Carbon\Carbon::parse($a->tanggal_transaksi)->format('d F Y') }}

                                </td>
                                <td>Rp. {{ number_format($a->total, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($a->total_bayar, 0, ',', '.') }}</td>
                                @if (in_array($a->id, $uu))
                                    <td>
                                        <button disabled="disabled" class="btn btn-sm btn-danger"></button><span
                                            class="badge text-dark">Belum Bayar</span>
                                    </td>
                                @elseif(in_array($a->id, $uk))
                                    <td>
                                        <button disabled="disabled" class="btn btn-sm btn-warning"></button><span
                                            class="badge text-dark">Kredit</span>
                                    </td>
                                @elseif(in_array($a->id, $up))
                                    <td>
                                        <button disabled="disabled" class="btn btn-sm btn-info"></button><span
                                            class="badge text-dark">Pending</span>
                                    </td>
                                @elseif(in_array($a->id, $ud))
                                    <td>
                                        <button disabled="disabled" class="btn btn-sm btn-dark"></button><span
                                            class="badge text-dark">Declined</span>
                                    </td>
                                @elseif(in_array($a->id, $ul))
                                    <td>
                                        <button disabled="disabled" class="btn btn-sm btn-success"></button><span
                                            class="badge text-dark">Lunas</span>
                                    </td>
                                @elseif(in_array($a->id, $uc))
                                    <td>
                                        <button disabled="disabled" class="btn btn-sm btn-primary"></button><span
                                            class="badge text-dark">Checking</span>
                                    </td>
                                @endif
                                <td>
                                    <form action="{{ route('transaksi.show', $a->id) }}">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa-solid fa-circle-info"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="konten">
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
                                type="button" role="tab" aria-controls="kredit" aria-selected="false">Kredit</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="belum-bayar-tab" data-bs-toggle="pill"
                                data-bs-target="#belum-bayar" type="button" role="tab" aria-controls="belum-bayar"
                                aria-selected="false">Belum Bayar</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pending-tab" data-bs-toggle="pill" data-bs-target="#pending"
                                type="button" role="tab" aria-controls="pending" aria-selected="false">Pending</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="declined-tab" data-bs-toggle="pill" data-bs-target="#declined"
                                type="button" role="tab" aria-controls="declined"
                                aria-selected="false">Declined</button>
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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all as $a)
                                        <tr>
                                            <td scope="row">{{ $a->tanggal_transaksi }}</td>
                                            <td>Rp. {{ number_format($a->total, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($a->total_bayar, 0, ',', '.') }}</td>
                                            @if (in_array($a->id, $uu))
                                                <td>
                                                    <button disabled="disabled" class="btn btn-sm btn-danger"></button><span
                                                        class="badge text-dark">Belum Bayar</span>
                                                </td>
                                            @elseif(in_array($a->id, $uk))
                                                <td>
                                                    <button disabled="disabled"
                                                        class="btn btn-sm btn-warning"></button><span
                                                        class="badge text-dark">Kredit</span>
                                                </td>
                                            @elseif(in_array($a->id, $up))
                                                <td>
                                                    <button disabled="disabled" class="btn btn-sm btn-info"></button><span
                                                        class="badge text-dark">Pending</span>
                                                </td>
                                            @elseif(in_array($a->id, $ud))
                                                <td>
                                                    <button disabled="disabled" class="btn btn-sm btn-dark"></button><span
                                                        class="badge text-dark">Declined</span>
                                                </td>
                                            @elseif(in_array($a->id, $ul))
                                                <td>
                                                    <button disabled="disabled"
                                                        class="btn btn-sm btn-success"></button><span
                                                        class="badge text-dark">Lunas</span>
                                                </td>
                                            @elseif(in_array($a->id, $uc))
                                                <td>
                                                    <button disabled="disabled"
                                                        class="btn btn-sm btn-primary"></button><span
                                                        class="badge text-dark">Checking</span>
                                                </td>
                                            @endif
                                            <td>
                                                <form action="{{ route('transaksi.show', $a->id) }}">
                                                    <button type="submit" class="btn btn-success">Detail</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



                    <!-- transaksi sedang berlangsung -->
                    <div class="tab-pane fade" id="lunas" role="tabpanel" aria-labelledby="lunas-tab"
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
                                    @foreach ($lunas as $l)
                                        <tr>
                                            <td scope="row">{{ $l->tanggal_transaksi }}</td>
                                            <td>Rp. {{ number_format($l->total, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($l->total_bayar, 0, ',', '.') }}</td>
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
                    </div>


                    <div class="tab-pane fade" id="kredit" role="tabpanel" aria-labelledby="kredit-tab"
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
                                    @foreach ($kredit as $k)
                                        <tr>
                                            <td scope="row">{{ $k->tanggal }}</td>
                                            <td>Rp. {{ number_format($k->total, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($k->total_bayar, 0, ',', '.') }}</td>
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
                    </div>


                    <div class="tab-pane fade" id="belum-bayar" role="tabpanel" aria-labelledby="belum-bayar-tab"
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
                                            <td>Rp. {{ number_format($u->total, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($u->total_bayar, 0, ',', '.') }}</td>
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
                    </div>


                    <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab"
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
                                    @foreach ($pending as $p)
                                        <tr>
                                            <td scope="row">{{ $p->tanggal }}</td>
                                            <td>Rp. {{ number_format($p->total, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($p->total_bayar, 0, ',', '.') }}</td>
                                            <td>
                                                <button disabled="disabled" class="btn btn-sm btn-info"></button><span
                                                    class="badge text-dark">Pending</span>
                                            </td>
                                            <td>
                                                <form action="{{ route('transaksi.show', $p->id) }}">
                                                    <button type="submit" class="btn btn-success">detail</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="declined" role="tabpanel" aria-labelledby="declined-tab"
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
                                    @foreach ($declined as $d)
                                        <tr>
                                            <td scope="row">{{ $d->tanggal }}</td>
                                            <td>Rp. {{ number_format($d->total, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($d->total_bayar, 0, ',', '.') }}</td>
                                            <td>
                                                <button disabled="disabled" class="btn btn-sm btn-dark"></button><span
                                                    class="badge text-dark">Declined</span>
                                            </td>
                                            <td>
                                                <form action="{{ route('transaksi.show', $d->id) }}">
                                                    <button type="submit" class="btn btn-success">detail</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- transaksi success -->
                </div>
            </div>
        </div> --}}
        </div> --}}
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const sortBySelect = $('#sort_status');
        const tablebody = $('#sort');

        sortBySelect.on('change', function() {
            const selectedVal = sortBySelect.val();

            $.ajax({
                url: '/history-transaksi/status',
                method: 'GET',
                success: function(response) {
                    let filteredData = [];
                    console.log(response.data.kredit);

                    if (selectedVal === 'kredit') {
                        filteredData = response.data.kredit;
                    }
                    //  else if (selectedVal === 'lunas') {
                    //     filteredData = response.data.lunas;
                    // } else if (selectedVal === 'pending') {
                    //     filteredData = response.data.pending;
                    // } else if (selectedVal === 'checking') {
                    //     filteredData = response.data.checking;
                    // } else if (selectedVal === 'declined') {
                    //     filteredData = response.data.declined;
                    // } else {
                    //     filteredData = response.data.all;
                    // }

                    updateTable(filteredData);
                },
                error: function(error) {
                    console.log('Error: ', error);
                }

            });
        });

        function updateTable(data) {
            // tablebody.empty();
            $('#sort').empty();

            $.each(data, function(index, item) {
                var row = $('<tr></tr>');

                var dateCell = $('<td></td>').text(item.tanggal_transaksi);
                row.append(dateCell);

                var totalCell = $('<td></td>').text(item.total);
                row.append(totalCell);

                var totalBayarCell = $('<td></td>').text(item.total_bayar);
                row.append(totalBayarCell);

                var statusCell = $('<td></td>').text(item.status);
                row.append(statusCell);

                var buttonCell = $('<td></td>');
                var button = $('<button></button>').text('Detail');
                button.on('click', function() {
                    // Logika saat tombol Detail diklik
                });
                buttonCell.append(button);
                row.append(buttonCell);

                // tablebody.append(row);
            });

            $('#sort').show();
        }

        // try 1
        // $(document).ready(function() {
        //     $('$sort_status').on(change, function() {
        //         var selected = $(this).val();
        //         $('#sort').attrr('id', selected);
        //     });
        // });

        // try 2
        // document.addEventListener('DOMContentLoad', function() {
        //     var sort = document.getElementById('sort_status');
        //     var body = document.body;

        //     sort.addEventListener('change', function() {
        //         var selected = sort.value;
        //         body.setAttribute('data-sort', selected);
        //     });
        // })



        // Lakukan pengolahan sesuai dengan nilai-nilai yang dipilih
    </script>
@endsection
