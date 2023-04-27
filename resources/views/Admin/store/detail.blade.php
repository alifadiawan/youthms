@extends('layout.admin')
@section('content')
@section('judul', 'Detail produk')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card rounded shadow-md">
                <div class="card-body">
                    <form action="" method="">
                        
                       {{-- nama produk --}}
                    <div class="form-group">
                        <label for="">Nama produk</label>
                        <p>Jasa Desain</p>
                      </div>
  
                      {{-- harga --}}
                      <div class="form-group">
                          <label for="">Harga</label>
                          <p>Rp.500.000</p>
                      </div>
  
                      {{-- deskripsi produk --}}
                      <div class="form-group">
                          <label for="">Deskripsi produk</label>
                          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum recusandae cum accusantium, a error explicabo ducimus consequuntur laboriosam praesentium ipsam expedita fugiat repellendus quasi totam quos perferendis odit dicta enim.</p>
                      </div>
                      
  
                      <div class="row">
                          <div class="col">
                              <a href="/store_edit" class="btn text-white" style="background-color: #0EA1E2">Edit</a>
                              <a href="/store" class="btn btn-secondary">cancel</a>
                          </div>
                      </div>
    
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>

@endsection