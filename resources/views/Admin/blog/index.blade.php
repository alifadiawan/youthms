@extends('layout.admin')
@section('content')
@section('judul', 'Blog')

<div class="card p-3">
    <div class="col-lg-12">
        <a href="{{route('blog.create')}}" class="btn btn-md text-white rounded mb-2 mr-1" style="background-color: #1864BA">Tambah Artikel</a>
        <table class="table table-striped table-hover mt-2">
            <thead>
                <tr style="background-color: #0EA1E2">
                    <th class="text-white">No</th>
                    <th class="text-white">Tanggal</th>
                    <th class="text-white">Judul</th>
                    <th class="text-white">Segmen</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data)==0)
                <tr>
                    <td colspan="5" class="text-center">Belum Ada Artikel !!</td>
                </tr>

                @else
                    @foreach($data as $i)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$i -> tanggal}}</td>
                        <td>{{$i -> judul}}</td>
                        <td>{{$i -> segmen -> segmen}}</td>
                        <td>
                            <a href="{{route('blog.show',$i->id)}}" class="btn btn-sm btn text-white rounded-pill" style="background-color: #0EA1E2">Detail</a>
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
@endsection
