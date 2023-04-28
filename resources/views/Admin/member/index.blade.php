@extends('layout.admin')
@section('content-title', 'Member')
@section('content')
@section('judul', 'Member')

<a href="/addmember" class="btn btn-md text-white rounded-pill mb-3" style="background-color: #1864BA">Tambah</a>
<div class="card">
    <div class="col-lg-12">
        <table class="table table-striped table-hover mt-2">
            <thead>
                <tr style="background-color: #0EA1E2">
                    <th class="text-white">No</th>
                    <th class="text-white">Nama</th>
                    <th class="text-white">Role</th>
                    <th class="text-white">No. HP</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>Steven Alden</td>
                    <td>Client</td>
                    <td>0811122211</td>
                    <td>
                        <a href="/memberdetail" class="btn btn-sm btn text-white rounded-pill" style="background-color: #0EA1E2">Detail</a>
                    </td>
                </tr>
           		<tr>
                    <td scope="row">2</td>
                    <td>Rafli Dwi Ferdiansyah</td>
                    <td>Customer</td>
                    <td>0811122212</td>
                    <td>
                        <a href="/memberdetail" class="btn btn-sm btn text-white rounded-pill" style="background-color: #0EA1E2">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

@endsection