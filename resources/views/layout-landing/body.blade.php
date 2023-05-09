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
                        <a class="nav-link" aria-current="page" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#our-services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fas fa-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="btn btn-outline-light">
                            Login
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
                <div class="col-lg-6 col-sm-4 text-start">
                    <h1 class="fw-bolder">Gather more customers in your business area</h1>
                    <span>kami menyediakan aawjaojo</span>
                </div>
                <div class="col-lg-6 col-sm-8 text-center ">
                    <img class="img-fluid" src="{{ asset('illustration/group-390.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container-fluid">

        <!-- Our Services -->
        <div id="our-services" class="content mt-5">
            <div class="h1 text-center my-5">Our Services</div>
            <div class="d-flex d-flex-row justify-content-around">
                <div class="card text-center" style="width: 18rem;">
                    <img src="{{ asset('youth-logo-nobg.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card text-center" style="width: 18rem;">
                    <img src="{{ asset('youth-logo-nobg.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card text-center" style="width: 18rem;">
                    <img src="{{ asset('youth-logo-nobg.png') }}" class="card-img-top" alt="...">
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


     <!-- Choose what you need card-->
     <div class="content mt-5 text-white">
        <div id="choose" class="px-5" style="background-color: #406CAB">
            <div class="card-content p-5">
                <h1 class="fw-bolder">Choose</h1>
                <h4 class="mb-5">What you need now</h4>

                <div class="d-flex d-flex-row flex-wrap justify-content-between gap-3">
                    <div class="card text-center" style="width: 18rem; height: 20rem;">
                        <div class="col">
                        <div class="card-body">
                                <h5 class="card-title">Paket A</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                    the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div> 
                    
                    <div class="card text-center" style="width: 18rem; height: 20rem;">
                        <div class="card-body">
                            <h5 class="card-title">Paket B</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div> 

                    <div class="card text-center" style="width: 18rem; height: 20rem;">
                        <div class="card-body">
                            <h5 class="card-title">Paket C</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div> 

                    <div class="card text-center" style="width: 18rem; height: 20rem;">
                        <div class="card-body">
                            <h5 class="card-title">Paket D</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div> 
                </div>
                
            </div>
        </div>
    </div>

    
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="lc-block">
				<div id="carouselLogos" class="carousel slide pt-5 pb-4" data-bs-ride="carousel">

					<div class="carousel-inner px-5">
						<div class="carousel-item active">
							<div class="row">
								<div class="col-6 col-lg-2 align-self-center">
									<img class="d-block w-100 px-3 mb-3" src="https://cdn.livecanvas.com/media/logos/11.png" alt="">
								</div>
								<div class="col-6 col-lg-2  align-self-center">
									<img class="d-block w-100 px-3  mb-3" src="https://cdn.livecanvas.com/media/logos/2.png" alt="">
								</div>
								<div class="col-6 col-lg-2  align-self-center">
									<img class="d-block w-100 px-3  mb-3" src="https://cdn.livecanvas.com/media/logos/3.png" alt="">
								</div>
								<div class="col-6 col-lg-2  align-self-center">
									<img class="d-block w-100 px-3  mb-3" src="https://cdn.livecanvas.com/media/logos/12.png" alt="">
								</div>
								<div class="col-6 col-lg-2  align-self-center">
									<img class="d-block w-100 px-3  mb-3" src="https://cdn.livecanvas.com/media/logos/5.png" alt="">
								</div>
								<div class="col-6 col-lg-2  align-self-center">
									<img class="d-block w-100 px-3  mb-3" src="https://cdn.livecanvas.com/media/logos/6.png" alt="">
								</div>
							</div>

						</div>
						<div class="carousel-item">
							<div class="row">
								<div class="col-6 col-lg-2 align-self-center">
									<img class="d-block w-100 px-3 mb-3" src="https://cdn.livecanvas.com/media/logos/11.png" alt="">
								</div>
								<div class="col-6 col-lg-2  align-self-center">
									<img class="d-block w-100 px-3  mb-3" src="https://cdn.livecanvas.com/media/logos/2.png" alt="">
								</div>
								<div class="col-6 col-lg-2  align-self-center">
									<img class="d-block w-100 px-3  mb-3" src="https://cdn.livecanvas.com/media/logos/3.png" alt="">
								</div>
								<div class="col-6 col-lg-2  align-self-center">
									<img class="d-block w-100 px-3  mb-3" src="https://cdn.livecanvas.com/media/logos/12.png" alt="">
								</div>
								<div class="col-6 col-lg-2  align-self-center">
									<img class="d-block w-100 px-3  mb-3" src="https://cdn.livecanvas.com/media/logos/5.png" alt="">
								</div>
								<div class="col-6 col-lg-2  align-self-center">
									<img class="d-block w-100 px-3  mb-3" src="https://cdn.livecanvas.com/media/logos/6.png" alt="">
								</div>
							</div>

						</div>

					</div>

					<!--
	<ol class="carousel-indicators position-relative mt-3">
		<li data-bs-target="#carouselLogos" data-bs-slide-to="0" class="active bg-dark carousel-control-prev-icon"></li>
		<li data-bs-target="#carouselLogos" data-bs-slide-to="1" class="bg-dark"></li>
	</ol>
	-->

					<div class="w-100 px-3 text-center mt-4">
						<a class="carousel-control-prev position-relative d-inline me-4" href="#carouselLogos" data-bs-slide="prev">
							<svg width="2em" height="2em" viewBox="0 0 16 16" class="text-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
							</svg>
							<span class="visually-hidden">Previous</span>
						</a>
						<a class="carousel-control-next position-relative d-inline" href="#carouselLogos" data-bs-slide="next">
							<svg width="2em" height="2em" viewBox="0 0 16 16" class="text-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
							</svg>
							<span class="visually-hidden">Next</span>
						</a>





					</div>


				</div>
			</div><!-- /lc-block -->
		</div><!-- /col -->
	</div>
</div>



    @include('layout-landing.script')

</body>

</html>
