@extends('layout.admin')
@section('content-title', 'Employee')
@section('content')
@section('judul', 'Employee')


<!-- <a href="{{route('employee.create')}}" class="btn btn-md text-white rounded-pill mb-3" style="background-color: #1864BA">Tambah</a> -->

<div class="row">
    <div class="col">

</div>
    <div class="col-lg-12">
        <table class="table table-striped table-hover mt-2">
            <thead>
                <tr style="background-color: #0EA1E2">
                    <th class="text-white">No</th>
                    <th class="text-white">Nama</th>
                    <th class="text-white">Alamat</th>
                    <th class="text-white">No. HP</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($member) < 1)
                    <tr>
                        <td colspan="5" class="text-center">Belum Ada Employee !!</td>
                    </tr>
                @else
                    @foreach($member as $m)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$m -> name}}</td>
                        <td>{{$m -> alamat}}</td>
                        <td>{{$m -> no_hp}}</td>
                        <td>
                            <a href="{{route('employee.show',$m->id)}}" class="btn btn-sm btn text-white rounded-pill" style="background-color: #0EA1E2">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


@endsection