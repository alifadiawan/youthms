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
                        <div class="row justify-content-center">
                            <img src="{{ asset('youth-blue.svg') }}" alt="" class="my-5" style="width: 150px">
                        </div>
                        <form action="" method="get">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="youremail@gmail.com" aria-describedby="helpId" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="" id="" class="form-control"
                                    placeholder="a67shi" aria-describedby="helpId" required>
                            </div>
                            <div class="form-group text-center ">
                                <a href="/dashboard" class="btn text-white w-100"
                                    style="background-color: #0EA1E2">Login</a>
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
