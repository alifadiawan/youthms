@extends('layout.admin')
@section('content')
@section('judul', 'Transaction')
<div class="card">
    <div class="col-lg-12">
        <table class="table table-striped mt-2">
            <form action="{{ route('transaksi.store') }}" method="POST">
                <div class="container mt-4">
                    <h1 class="mb-4">Accordion dengan Pengkondisian</h1>
                    <div class="form-group">
                        <label>Pilih Dropdown Pertama:</label>
                        <select id="dropdown1" class="form-control">
                            <option value="">Pilih Salah Satu</option>
                            @foreach ($collection as $item)
                                
                            @endforeach
                        </select>
                    </div>
                    <div id="accordion2" class="accordion" id="accd2" style="display:none;">
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapse2">Dropdown Kedua</a>
                            </div>
                            <div id="collapse2" class="collapse">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Pilih Dropdown Kedua:</label>
                                        <select id="dropdown2" class="form-control">
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="option1">Option 1</option>
                                            <option value="option2">Option 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion3" class="accordion" style="display:none;">
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapse3">Dropdown Ketiga</a>
                            </div>
                            <div id="collapse3" class="collapse">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Pilih Dropdown Ketiga:</label>
                                        <select id="dropdown3" class="form-control">
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="option1">Option 1</option>
                                            <option value="option2">Option 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="button" class="btn btn-primary" disabled>Simpan</button>
                </div>
                
                <script>
                    $(document).ready(function)() {
                        // Tampilkan dropdown kedua jika dropdown pertama dipilih
                        $('#dropdown1').change(function() {
                            if ($('#dropdown1').val() !== '') {
                                $('#accordion2').show();
                                $('#button').attr('disabled',false);
                                // document.getElementById("accd2").style.display = "block";
                            } else {
                                $('#accordion2').hide();
                                $('#accordion3').hide();
                                $('#button').attr('disabled', true);
                            }
                        });
                        // Tampilkan dropdown ketiga jika dropdown kedua dipilih
                        // $('#dropdown2').change(function() {
                        //     if ($('#dropdown2').val() !== '') {
                        //         $('#accordion3').show();
                        //     } else {
                        //         $('#accordion3').hide();
                        //         $('#button').attr('enabled', true);
                        //     }
                        // });
                    }
                </script>
            </form>
        </table>
    </div>
</div>
@endsection
