@extends('layout.admin')
@section('content')
@section('judul', 'Status Termin')

<div class="container">
    <div class="row">

        <!-- table status -->
        <div class="col">
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
                                        <option value="accepted">Accepted</option>
                                        <option value="pending">Pending</option>
                                        <option value="declined">Declined</option>
                                    </select>
                                    <button onClick="window.location.reload();" class="btn btn-outline-secondary"><i
                                            class="fa-solid fa-rotate fa-lg"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead class="yms-blue">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Pembeli</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($request_user as $r)
                                    <tr class="main-row">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d F Y', strtotime($r->tanggal_mulai)) }}</td>
                                        <td>{{ $r->nama_pemesan }}</td>
                                        <td>
                                            @if ($r->status == 'accept')
                                                <button disabled="disabled" class="btn btn-sm btn-success"></button><span
                                                    class="badge">Accepted</span>
                                            @elseif($r->status == 'declined')
                                                <button disabled="disabled" class="btn btn-sm btn-danger"></button><span
                                                    class="badge">Declined</span>
                                            @else
                                                <button disabled="disabled" class="btn btn-sm btn-warning"></button><span
                                                    class="badge">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('requestuser.show', $r->id) }}"
                                                class="btn yms-blue">detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
            var status = $(this).find('td:eq(3) span.badge').text().toLowerCase();
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
