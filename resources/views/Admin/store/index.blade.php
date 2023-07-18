@extends('layout.admin')
@section('content')
@section('judul', 'Store')

<div class="card p-3">
    <div class="card-body">
        <div class="row justify-content-start align-items-center ps-1 pb-2">
            <label>Sort by :</label>
        </div>
        <div class="row justify-content-start align-items-center gap-2 gap-lg-0">
            <div class="col-12 col-lg-3">
                <div class="form-group">
                    <div class="input-group">
                        <select name="sort_status" class="form-control form-select text-capitalize" id="sort_status">
                            <option value="">Semua</option>
                            @foreach($services as $ss)
                            <option class="text-capitalize" value="{{$ss->judul}}">{{$ss->judul}}</option>
                            @endforeach
                        </select>
                        <button onClick="window.location.reload();" class="btn btn-outline-secondary"><i
                                class="fa-solid fa-rotate fa-lg"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('store.create') }}" class="btn mb-3 text-white" style="background-color: #1864BA"><i class="fa-solid fa-plus"></i> Tambah
                    produk</a>
                <div class="table-responsive">

                    <table class="table table-hover">
                        <thead class="text-white" style="background-color: #0EA1E2">
                            <tr>
                                <th>No</th>
                                <th>Layanan</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($product->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada produk</td>
                                </tr>
                            @else
                                @foreach ($product as $item)
                                    <tr class="main-row">
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-capitalize">{{ $item->services->judul }}</td>
                                        <td>{{ $item->nama_produk }}</td>
                                        <td>Rp. {{ number_format($item->harga) }}</td>
                                        <td>
                                            <a href="{{ route('store.showid', $item->id) }}"
                                                class="btn btn-sm text-white"
                                                style="background-color: #0EA1E2"><i class="fa-solid fa-xl fa-circle-info"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="row">
            {{ $product->links() }}
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
            var status = $(this).find('td:eq(1)').text().toLowerCase();

            var matchesStatusFilter = status.includes(statusFilter);

            return matchesStatusFilter;
        }).show();
    }
</script>
@endsection
