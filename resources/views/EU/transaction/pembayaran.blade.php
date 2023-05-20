@extends('layout-landing2.body')
@section('content')
    <div id="container" class="container">

        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <a href="{{ route('cart.index') }}" class="btn my-3">
                    <i class="fas fa-arrow-left"></i></a>
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col">
                                <h5 class="mb-0 me-auto">Summary</h5>
                            </div>

                            <!-- countdown -->
                            <div class="col text-end text-danger">
                                <h5 id="time"></h5>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products
                                <span>Rp. 900.000</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Biaya Layanan
                                <span>Rp. 2.000.000</span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total</strong>
                                </div>
                                <span><strong>Rp. 2.900.000</strong></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0 p-0">
                    <div class="card-header">
                        <h4>Metode Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <a href="" class="btn card-hover">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"> <i class="fa-solid fa-building-columns"></i> Virtual Account
                                    </h5>
                                </div>
                            </div>
                        </a>
                        <a class="btn card-hover" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"> <i class="fa-solid fa-building-columns"></i> Transfer Bank</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- <script>
        function startTimer(duration, display) {
            var timer = duration,
                minutes, seconds;
            setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function() {
            var fiveMinutes = 60 * 30,
                display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        };
    </script> --}}

@endsection
