@include('layout.script')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Youthms | Login</title>
    @include('layout.style')
    <style>
        .bgcolor{
            background-image: linear-gradient(to right bottom, #436ba8, #3c629b, #34598f, #2d5082, #264776);
        }
    </style>
</head>

<body>
    {{-- <div class="container"> --}}
        <div class="bgcolor h-100 d-flex justify-content-center align-items-center">
            <div class="col-lg-4 col-md-5 col-sm-7">
                <div class="card shadow-lg" style="border-radius: 10px">
                    <div class="card-body">
                        <div class="row">
                            <a href="/" class="btn yms-blue">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                        <div class="row justify-content-center">
                            <img src="{{ asset('youth-blue.svg') }}" alt="" class="my-4 " style="width: 200px">
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>
                                            {{ $item }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif

                        <form action="login" method="post" class="user">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control form-control-user"
                                    id="exampleInputEmail" aria-describedby="emailHelp" name="email"
                                    placeholder="Enter Email Address...">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" name="password" placeholder="Password">
                            </div>
                            <div class="form-group text-center ">
                                <button class="btn yms-blue w-100">Login</button>
                                <hr>
                                <p>Don't have an account ?
                                    <a href="">Sign up here</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
