<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout-landing.style')
    <title>Youthms.id</title>
</head>

<body>

    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('youth-logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-white px-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fas fa-cart"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- hero / illustration -->
    <div id="hero">
        <div class="container d-flex">
            <div class="row justify-content-between align-items-center">
                <div class="col text-start">
                    <h1 class="fw-bolder">Gather more customers in your business area</h1>
                    <span>kami menyediakan aawjaojo</span>
                </div>
                <div class="col text-center ">
                    <img src="{{ asset('illustration/group-390.png.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container-fluid">

        <!-- Our Services -->
        <div class="content mt-5">
            <div class="h1 text-center my-5">Our Services</div>
            <div class="d-flex d-flex-row justify-content-around">
                <div class="card text-center" style="width: 18rem;">
                    <img src="{{asset('youth-logo-nobg.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card text-center" style="width: 18rem;">
                    <img src="{{asset('youth-logo-nobg.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card text-center" style="width: 18rem;">
                    <img src="{{asset('youth-logo-nobg.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Choose what you need -->
        <div class="content mt-5">
            <div id="choose" style="background-color: #406CAB">
                <h1 class="fw-bolder">Choose what you need</h1>
                <div class="d-flex d-flex-row justify-content-center">
                    <div class="card text-center" style="width: 18rem;">
                        <img src="{{asset('youth-logo-nobg.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>


    </div>

    @include('layout-landing.script')

</body>

</html>
