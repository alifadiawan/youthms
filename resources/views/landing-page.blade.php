@extends('layout-landing.body')
@section('content')
    <!-- hero / illustration -->
    <div id="hero">
        <div class="container d-flex">
            <div class="row justify-content-between align-items-center" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-6 col-sm-8 text-start">
                    <h1 class="fw-bolder">Gather more customers in your business area</h1>
                    <span>kami menyediakan aawjaojo</span>
                </div>
                <div class="col-lg-6 col-sm-4 text-center ">
                    <img class="img-fluid" src="{{ asset('illustration/group-390.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div data-aos="fade-up" data-aos-duration="2000" class="container-fluid content">

        <!-- Our Services -->
        <div id="our-services" class="content mt-5">
            <div class="h1 text-center my-5">Our Services</div>
            <div class="row justify-content-around">
                <div class="col-lg-3 col-sm-12">
                    <div class="card text-center">
                        <img src="{{ asset('youth-logo-nobg.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="card text-center">
                        <img src="{{ asset('youth-logo-nobg.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="card text-center">
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

    </div>


    <!-- Choose what you need card-->
    <div class="content text-white" data-aos="fade-up" data-aos-duration="2000">
        <div id="choose" class="px-5" style="background-color: #406CAB">
            <div class="card-content p-5">
                <h1 class="fw-bolder">Choose</h1>
                <h4 class="mb-5">What you need now</h4>

                <div class="row justify-content-between">
                    <div class="col-lg-3 col-sm-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Paket A</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of
                                    the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Paket B</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of
                                    the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Paket C</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of
                                    the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Paket D</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of
                                    the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    

                    

                    
                </div>

            </div>
        </div>
    </div>


    <!-- Our Partners -->
    <div class="container content" data-aos="fade-up" data-aos-duration="2000">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Our Partners</h1>
                <div class="lc-block">
                    <div id="carouselLogos" class="carousel slide pt-5 pb-4" data-bs-ride="carousel">

                        <div class="carousel-inner px-5">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-6 col-lg-2 align-self-center">
                                        <img class="d-block w-100 px-3 mb-3"
                                            src="https://cdn.livecanvas.com/media/logos/11.png" alt="">
                                    </div>
                                    <div class="col-6 col-lg-2  align-self-center">
                                        <img class="d-block w-100 px-3  mb-3"
                                            src="https://cdn.livecanvas.com/media/logos/2.png" alt="">
                                    </div>
                                    <div class="col-6 col-lg-2  align-self-center">
                                        <img class="d-block w-100 px-3  mb-3"
                                            src="https://cdn.livecanvas.com/media/logos/3.png" alt="">
                                    </div>
                                    <div class="col-6 col-lg-2  align-self-center">
                                        <img class="d-block w-100 px-3  mb-3"
                                            src="https://cdn.livecanvas.com/media/logos/12.png" alt="">
                                    </div>
                                    <div class="col-6 col-lg-2  align-self-center">
                                        <img class="d-block w-100 px-3  mb-3"
                                            src="https://cdn.livecanvas.com/media/logos/5.png" alt="">
                                    </div>
                                    <div class="col-6 col-lg-2  align-self-center">
                                        <img class="d-block w-100 px-3  mb-3"
                                            src="https://cdn.livecanvas.com/media/logos/6.png" alt="">
                                    </div>
                                </div>

                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-6 col-lg-2 align-self-center">
                                        <img class="d-block w-100 px-3 mb-3"
                                            src="https://cdn.livecanvas.com/media/logos/11.png" alt="">
                                    </div>
                                    <div class="col-6 col-lg-2  align-self-center">
                                        <img class="d-block w-100 px-3  mb-3"
                                            src="https://cdn.livecanvas.com/media/logos/2.png" alt="">
                                    </div>
                                    <div class="col-6 col-lg-2  align-self-center">
                                        <img class="d-block w-100 px-3  mb-3"
                                            src="https://cdn.livecanvas.com/media/logos/3.png" alt="">
                                    </div>
                                    <div class="col-6 col-lg-2  align-self-center">
                                        <img class="d-block w-100 px-3  mb-3"
                                            src="https://cdn.livecanvas.com/media/logos/12.png" alt="">
                                    </div>
                                    <div class="col-6 col-lg-2  align-self-center">
                                        <img class="d-block w-100 px-3  mb-3"
                                            src="https://cdn.livecanvas.com/media/logos/5.png" alt="">
                                    </div>
                                    <div class="col-6 col-lg-2  align-self-center">
                                        <img class="d-block w-100 px-3  mb-3"
                                            src="https://cdn.livecanvas.com/media/logos/6.png" alt="">
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="w-100 px-3 text-center mt-4">
                            <a class="carousel-control-prev position-relative d-inline me-4" href="#carouselLogos"
                                data-bs-slide="prev">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="text-dark"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z">
                                    </path>
                                </svg>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next position-relative d-inline" href="#carouselLogos"
                                data-bs-slide="next">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="text-dark"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                    </path>
                                </svg>
                                <span class="visually-hidden">Next</span>
                            </a>

                        </div>
                    </div>
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </div>


    <!-- Testimonials -->
    <div class="content text-white" data-aos="fade-up" data-aos-duration="2000">
        <div id="choose" class="px-5" style="background-color: #406CAB">
            <div class="card-content p-5">
                <h1 class="fw-bolder">Our</h1>
                <h4 class="mb-5">Testimonials</h4>

                <section>
                    <div class="row text-center text-dark">
                        <div class="col mb-5 mb-md-0 m-3 p-3 bg-white">
                            <div class="d-flex justify-content-center mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
                                    class="rounded-circle shadow-1-strong" width="150" height="150" />
                            </div>
                            <h5 class="mb-3">Maria Smantha</h5>
                            <h6 class="text-primary mb-3">Web Developer</h6>
                            <p class="px-xl-3">
                                <i class="fas fa-quote-left pe-2"></i>Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab hic
                                tenetur.
                            </p>
                            <ul class="list-unstyled d-flex justify-content-center mb-0">
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                                </li>
                            </ul>
                        </div>

                        <div class="col mb-5 mb-md-0 m-3 p-3 bg-white">
                            <div class="d-flex justify-content-center mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                                    class="rounded-circle shadow-1-strong" width="150" height="150" />
                            </div>
                            <h5 class="mb-3">Lisa Cudrow</h5>
                            <h6 class="text-primary mb-3">Graphic Designer</h6>
                            <p class="px-xl-3">
                                <i class="fas fa-quote-left pe-2"></i>Ut enim ad minima veniam, quis nostrum
                                exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid commodi.
                            </p>
                            <ul class="list-unstyled d-flex justify-content-center mb-0">
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                            </ul>
                        </div>


                        <div class="col mb-0 m-3 p-3 bg-white">
                            <div class="d-flex justify-content-center mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
                                    class="rounded-circle shadow-1-strong" width="150" height="150" />
                            </div>
                            <h5 class="mb-3">John Smith</h5>
                            <h6 class="text-primary mb-3">Marketing Specialist</h6>
                            <p class="px-xl-3">
                                <i class="fas fa-quote-left pe-2"></i>At vero eos et accusamus et iusto odio
                                dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.
                            </p>
                            <ul class="list-unstyled d-flex justify-content-center mb-0">
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                </li>
                                <li>
                                    <i class="far fa-star fa-sm text-warning"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

    <!-- About us -->
    <div class="container content" data-aos="fade-up" data-aos-duration="2000">
        <h1 class="text-center">About Us</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium sed maxime distinctio ea, voluptas porro
            earum aliquam rem ullam, dicta facilis alias sapiente. Asperiores optio, ea a reiciendis molestiae
            laudantium? Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero aperiam reiciendis, sapiente
            possimus esse sunt velit nihil illum necessitatibus, rerum sequi obcaecati quasi quos quia nam qui, culpa
            reprehenderit doloremque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam dolorem ullam
            eos nam eius at neque qui cupiditate consequuntur repudiandae. Aspernatur magnam animi voluptas culpa nemo
            eveniet voluptate quia ducimus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi
            veritatis, necessitatibus, facere soluta asperiores maxime unde culpa enim ad, nulla illum rem eaque quam.
            Maxime neque cupiditate quidem adipisci laboriosam!
        </p>
    </div>
@endsection
