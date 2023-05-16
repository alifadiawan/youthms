@extends('layout-landing.body')
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Full Marketing Web</td>
                            <td>1</td>
                            <td>Rp. 1.000.000</td>
                        </tr>
                        <tr>
                            <td>Desain feed Instagram</td>
                            <td>1</td>
                            <td>Rp. 300.000</td>
                        </tr>
                        <th colspan="2" class="text-end">TOTAL : </th>
                        <th class="text-start">RP. 2.000.000</th>
                    </tbody>
                    <thead>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Metode Pembayaran -->
    <div class="container my-5">
        <h5>Metode Pembayaran :</h5>
        <div class="d-flex flex-lg-row flex-md-column flex-sm-column justify-content-lg-start justify-content-sm-center gap-3">
            <a href="" class="btn">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"> <i class="fa-solid fa-building-columns"></i> Virtual Account</h5>
                    </div>
                </div>
            </a>
            <a class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"> <i class="fa-solid fa-building-columns"></i> Transfer Bank</h5>
                    </div>
                </div>
            </a>
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
                <img src="{{asset('bca.png')}}" class="img-thumbnail">
            </div>
            <div class="col">
                <img src="{{asset('bri.png')}}" class="img-thumbnail">
            </div>
            <div class="col">
                <img src="{{asset('bni.png')}}" class="img-thumbnail">
            </div>
            <div class="col">
                <img src="{{asset('mandiri.png')}}" class="img-thumbnail">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
