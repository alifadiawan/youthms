@extends('layout-landing2.body')
@section('content')
    <!-- Cart -->
    <div class="container my-5">
        <h5>Jasa yang anda pilih : </h5>
        <div class="card">
            <div class="card-body">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Aplikasi Laravel</td>
                            <td>
                                <input type="number" class="form-control w-25" name="" id="" value="1"
                                    min="1">
                            </td>
                            <td>
                                Rp. 1.000.000
                            </td>
                            <td>
                                <a href="" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Aplikasi Laravel</td>
                            <td>
                                <input type="number" class="form-control w-25" name="" id="" value="1"
                                    min="1">
                            </td>
                            <td>
                                Rp. 1.000.000
                            </td>
                            <td>
                                <a href="" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                    <thead>
                        <th colspan="2" class="text-end">Total : </th>
                        <th class="text-start">RP.1.000.000</th>
                    </thead>
                    <thead>
                        <th colspan="2" class="text-end">
                            <a href="{{ route('store.create') }}" class=" btn btn-outline-success">Checkout</a>
                        </th>
                    </thead>
                </table>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Pilih Bank</h5>
                    <div class="row align-items-center">
                        <div class="col">
                            <img src="{{ asset('bca.png') }}" class="img-thumbnail">
                        </div>
                        <div class="col">
                            <img src="{{ asset('bri.png') }}" class="img-thumbnail">
                        </div>
                        <div class="col">
                            <img src="{{ asset('bni.png') }}" class="img-thumbnail">
                        </div>
                        <div class="col">
                            <img src="{{ asset('mandiri.png') }}" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var qty = document.getelementbyid("quantity");
    </script>
@endsection
