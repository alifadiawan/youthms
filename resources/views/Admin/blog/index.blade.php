@extends('layout.admin')
@section('content')
@section('judul', 'Blog')

<div class="row">
    <div class="col-lg-9">
        <div class="card p-3">
            <div class="card-body">
                <div class="row align-items-center justify-content-end">
                    <div class="col-lg-11 col-md-10 col-sm-10 col-8 mb-3 mb-lg-0">
                        <label>Sort by :</label>
                    </div>
                    <div class="col m-0 p-0">
                        @if (count($segmen) > 0)
                            <a href="{{ route('blogs.create') }}" class="btn btn-sm text-white rounded"
                                style="background-color: #1864BA;">Tambah Artikel</a>
                        @else
                            <a href="{{ route('blogs.create') }}" class="btn btn-sm text-white rounded disabled"
                                style="background-color: #1864BA;">Tambah Artikel</a>
                        @endif
                    </div>
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
                                <select name="sort_status" class="form-control form-select text-capitalize" id="sort_status">
                                    <option value="">Semua</option>
                                    @foreach($segmen as $ss)
                                    <option class="text-capitalize" value="{{$ss->segmen}}">{{$ss->segmen}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">

                    <table class="table table-striped table-hover mt-2" id="blog-container">
                        <thead>
                            <tr style="background-color: #0EA1E2">
                                <th class="text-white">No</th>
                                <th class="text-white">Tanggal</th>
                                <th class="text-white">Judul</th>
                                <th class="text-white">Author</th>
                                <th class="text-white">Segmen</th>
                                <th class="text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) == 0)
                                <tr>
                                    <td colspan="6" class="text-center">Belum Ada Artikel !!</td>
                                </tr>
                            @else
                                @foreach ($data as $i)
                                    <tr class="main-row">
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ date('d F Y', strtotime($i->created_at)) }}</td>
                                        <td>{{ $i->judul }}</td>
                                        <td>{{ $i->users->username }}</td>
                                        <td class="text-capitalize">{{ $i->segmen->segmen }}</td>
                                        <td>
                                            <a href="{{ route('blogs.show', $i->id) }}"
                                                class="btn btn-sm btn text-white rounded-pill"
                                                style="background-color: #0EA1E2">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="row" id="blog-pagination">
                    <nav>
                        <ul class="pagination">
                            @for ($page = 1; $page <= $data->lastPage(); $page++)
                                <li class="page-item"><a class="page-link"
                                        href="{{ $data->url($page) }}">{{ $page }}</a></li>
                            @endfor
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card p-3">
            <button data-toggle="modal" data-target="#addSegmen" class="btn btn-md yms-blue"
                style="width: 37%;">Tambah</button>
            <table class="table table-hover table-striped mt-3 text-center">
                <thead>
                    <tr style="background-color: #0EA1E2">
                        <th class="text-white">Segmen</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($segmen) < 1)
                        <tr>
                            <td colspan="2" class="text-center">Kosong</td>
                        </tr>
                    @else
                        @foreach ($segmen as $s)
                            <tr>
                                <td class="text-capitalize">{{ $s->segmen }}</td>
                                <td><button data-toggle="modal" data-target="#hapusSegmen{{ $s->id }}"
                                        class="btn text-danger"><i class="fas fa fa-trash"></i></button></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Segmen Modal -->
<div class="modal fade" id="addSegmen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('segmen.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="">Nama Segmen</label>
                        <input type="text" class="form-control" name="segmen" id="segmen">
                    </div>
            </div>
            <div class="row text-center p-3">
                <div class="col">
                    <button class="btn btn-success">Simpan</button>
                    <button class="btn" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- hapus jenis layanan -->
@foreach ($segmen as $hapus)
    <div class="modal fade" id="hapusSegmen{{ $hapus->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body my-5">
                    <h3 class="text-center">Yakin Ingin Menghapus {{ $hapus->segmen }} ?</h3>
                </div>
                <div class="row text-center p-3">
                    <div class="col">
                        <a href="{{ route('segmen.hapus', $hapus->id) }}" class="btn btn-danger text-white">Hapus</a>
                        <button class="btn" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

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
            var status = $(this).find('td:eq(4)').text().toLowerCase();
            var tanggal = $(this).find('td:eq(1)').text().toLowerCase();

            var matchesStatusFilter = status.includes(statusFilter);
            var matchesTanggalFilter = true; // Default true jika filter tanggal kosong

            if (tanggalFilter !== "Tanggal") {
                matchesTanggalFilter = tanggal.includes(tanggalFilter);
            }

            return matchesStatusFilter && matchesTanggalFilter;
        }).show();
    }


    $('#blog-pagination').on('click', '.pagination a', function(event) {
        event.preventDefault();

        //add class active di li pagination
        $('#blog-pagination .pagination li').removeClass('active');
        $(this).parent('li').addClass('active');

        //inisialisasi url pagination
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            dataType: 'html',
            type: 'get',
            success: function(response) {
                $('#blog-container').html('');
                $('#blog-container').html(response);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
</script>

@endsection
