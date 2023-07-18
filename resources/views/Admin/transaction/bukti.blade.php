@extends('layout.admin')
@section('content')
@section('judul', 'List Pembayaran ')
<div class="card">
    <div class="card-body">
        <div class="row justify-content-start align-items-center ps-1 pb-2">
            <label>Sort by :</label>
        </div>
        <div class="row justify-content-start align-items-center gap-2 gap-lg-0">
            <div class="col-12 col-lg-3">
                <div class="form-group">
                    <div class="input-group">
                        <select name="sort_status" class="form-control form-select" id="sort_status">
                            <option value="">Semua</option>
                            <option value="checking">Checking</option>
                            <option value="checked">Checked</option>
                            <option value="declined">Declined</option>
                        </select>
                        <button onClick="window.location.reload();" class="btn btn-outline-secondary"><i
                                class="fa-solid fa-rotate fa-lg"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive">

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
                        @foreach ($pembayaran as $p)
                            <tr class="main-row">
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
                                    <a href="{{ route('pembayaran.show', $p->id) }}"
                                        class="btn-sm btn-success">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sort_status').on('change', function() {
            filterData();
        });
    })

    function filterData() {
        var statusFilter = $('#sort_status').val().toLowerCase();

        $('.main-row').hide();
        if (statusFilter === 'all') {
            $('.main-row').show();
        }
        $('.main-row').filter(function() {
            var status = $(this).find('td:eq(3) span.badge').text().toLowerCase();

            var matchesStatusFilter = status.includes(statusFilter);

            return matchesStatusFilter;
        }).show();
    }
</script>
@endsection
