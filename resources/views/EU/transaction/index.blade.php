@extends('layout.admin')
@section('content')
@section('judul', 'Transaction')
<div class="card">
    <div class="col-lg-12">
        <table class="table table-striped mt-2">
            <form action="{{ route('transaksi.store') }}" method="POST">
                <div class="accordion" id="accordion">
                    <div class="card">
                        <div class="card-header" id="Jenis_Layanan">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#CollapseLayanan" aria-expanded="true" aria-controls="CollapseLayanan">
                                    Pilih Jenis Layanan
                                </button>
                            </h2>
                        </div>
                        <div id="CollapseLayanan" class="collapse show" aria-labelledby="Jenis_Layanan"
                            data-parent="#accordion">
                            <div class="card-body">
                                <label for="FormControl">Pilih item:</label>
                                <select class="form-control custom-scroll" id="FormControl" size="3"
                                    multiple>
                                    <option>Item 1</option>
                                    <option>Item 2</option>
                                    <option>Item 3</option>
                                    <option>Item 4</option>
                                    <option>Item 5</option>
                                    <option>Item 6</option>
                                    <option>Item 7</option>
                                    <option>Item 8</option>
                                    <option>Item 9</option>
                                    <option>Item 10</option>
                                    <option>Item 11</option>
                                    <option>Item 12</option>
                                    <option>Item 13</option>
                                    <option>Item 14</option>
                                    <option>Item 15</option>
                                </select>
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header" id="Pembayaran">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#CollapsePembayaran" aria-expanded="false"
                                    aria-controls="CollapsePembayaran">
                                    Pembayaran
                                </button>
                            </h2>
                        </div>
                        <div id="CollapsePembayaran" class="collapse" aria-labelledby="Pembayaran"
                            data-parent="#accordion">
                            <div class="card-body">
                                Some placeholder content for the second accordion panel. This panel is hidden by
                                default.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="Struk">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#CollapseStruk" aria-expanded="false"
                                    aria-controls="CollapseStruk">
                                    Struk
                                </button>
                            </h2>
                        </div>
                        <div id="CollapseStruk" class="collapse" aria-labelledby="Struk" data-parent="#accordion">
                            <div class="card-body">
                                And lastly, the placeholder content for the third and final accordion panel. This
                                panel
                                is hidden by default.
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </table>
    </div>
</div>

<style>
    #FormControl {
    max-height: 7000px;
    overflow-y: auto;
}
</style>
@endsection
