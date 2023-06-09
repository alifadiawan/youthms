@extends('layout-landing2.body')
@section('title', 'Transaction History')
@section('content')

    <div id="container" class="container my-5">
        <!-- tombol -->
        <div class="row gap-2 mb-3">
            <div class="col">
                <h2 class="fw-bold text-dark" style="font-family: Poppins, sans-serif">History Transaksi ({{ $all->count() }})
                </h2>
            </div>
        </div>
        <!-- content -->
        <div class="card text-left">
            {{-- <img class="card-img-top" src="holder.js/100px180/" alt=""> --}}
            <div class="card-head" style="margin: 12px 12px 5px 12px;">
                <div class="row justify-content-end align-items-center ps-1 pb-2">
                    <label class="text-muted ">Sort by :</label>
                </div>
                <div class="row justify-content-start align-items-center gap-2 gap-lg-0">
                    <div class="col-12 col-lg-3">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" value="" placeholder="Tanggal" readonly class="form-control"
                                    pattern="\d{4}-\d{2}-\d{2}" name="sort_tanggal" id="sort_tanggal">
                                <button class="btn btn-outline-secondary" id="clear_button"><i
                                        class="fa-solid fa-rotate fa-lg"></i></button>
                            </div>
                        </div>

                    </div>
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
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="sort">
                            @if ($all->isEmpty())
                                <tr class="text-center fw-bold text-uppercase">
                                    <td colspan="6"><h2 class="mt-3">Belum ada Transaksi</h2></td>
                                </tr>
                            @else
                                @foreach ($all as $a)
                                    <tr class="main-row">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td scope="row">
                                            {{ \Carbon\Carbon::parse($a->tanggal_transaksi)->format('d F Y') }}

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
                                                <button type="submit" class="btn btn-outline-primary"><i
                                                        class="fa-solid fa-circle-info"></i> Detail</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        flatpickr("#sort_tanggal", {
            dateFormat: "d F Y"
        });

        $(document).ready(function() {
            $('#sort_status').on('change', function() {
                filterData();
            });

            $('#sort_tanggal').on('change', function() {
                filterData();
            });

            $('#clear_button').on('click', function() {
                $('#sort_tanggal').val('');
                filterData();
            });
        })

        function filterData() {
            var statusFilter = $('#sort_status').val().toLowerCase();
            var tanggalFilter = $('#sort_tanggal').val().toLowerCase();

            $('.main-row').hide();
            if (statusFilter === 'all') {
                $('.main-row').show();
            }
            $('.main-row').filter(function() {
                var status = $(this).find('td:eq(4) span.badge').text().toLowerCase();
                var tanggal = $(this).find('td:eq(1)').text().toLowerCase();

                var matchesStatusFilter = status.includes(statusFilter);
                var matchesTanggalFilter = true; // Default true jika filter tanggal kosong

                if (tanggalFilter !== "Tanggal") {
                    matchesTanggalFilter = tanggal.includes(tanggalFilter);
                }

                return matchesStatusFilter && matchesTanggalFilter;
            }).show();
        }
    </script>
@endsection
