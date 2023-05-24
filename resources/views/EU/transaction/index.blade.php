@extends('layout-landing2.body')
@section('content') 
<div class="card">
    <div class="col-lg-12">
        <table class="table table-striped mt-2">
            <thead>
                <tr style="background-color: #0EA1E2">
                    <th class="text-white">No</th>
                    <th class="text-white">Nama</th>
                    <th class="text-white">Jasa yang dipesan</th>
                    <th class="text-white">Total harga</th>
                    <th class="text-white">Status</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($p as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item }}</td>
                    </tr>
                @endforeach --}}
                <tr>
                    <td scope="row">1</td>
                    <td>Maulana Gustaf</td>
                    <td>Poster Banner</td>
                    <td>300.000</td>
                    <td>
                        <button disabled="disabled" class="btn btn-sm btn-success"></button><span class="badge">Lunas</span>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>Rafli Dwi Ferdiansyah</td>
                    <td>Design Logo</td>
                    <td>150.000</td>
                    <td>
                        <button disabled="disabled" class="btn btn-sm btn-danger"></button><span class="badge">Pembayaran</span>
                    </td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td>Steven Alden</td>
                    <td>Web Kasir</td>
                    <td>750.000</td>
                    <td>
                        <button disabled="disabled" class="btn btn-sm btn-warning"></button><span class="badge">Kredit</span>
                    </td>
                </tr>
            </tbody>

            {{-- <body>
                <table>
                    @foreach ($Produk as $p)
                        <tr>
                            <td>
                                {{ $p }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </body> --}}
        </table>
    </div>
</div>
@endsection
