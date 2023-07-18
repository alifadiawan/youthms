@extends('layout.admin')
@section('content')
@section('judul', 'Transaction')
<div class="card">
    <div class="card-body">
        <div class="row justify-content-start align-items-center ps-1 pb-2">
            <label>Sort by :</label>
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
                        <select name="sort_status" class="form-control form-select" id="sort_status">
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
                        <tr class="main-row">
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
            var tanggal = $(this).find('td:eq(3)').text().toLowerCase();

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
