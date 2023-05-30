@include('layout-landing.script')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Youthms | Register</title>
    @include('layout.style')
    <style>
        .bgcolor {
            background: rgb(0, 89, 194);
            background: linear-gradient(320deg, rgba(0, 89, 194, 1) 39%, rgba(0, 152, 254, 1) 100%);
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
                        <a href="/login" class="btn yms-blue">
                            <i class="fas fa-chevron-left"></i>
                            <span>Login</span>
                        </a>
                    </div>
                    <div class="row justify-content-center">
                        <img src="{{ asset('yms-logo-notext.png') }}" alt="" class="my-3"
                            style="width: 100px">
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

                    <form action="{{route('register.store')}}" method="post" class="user">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control form-control-user" name="username" placeholder="username" value="{{old('username')}}">
                        </div>
                        <input type="hidden" name="role_id[]" value="2">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                aria-describedby="emailHelp" name="email" placeholder="Enter Email Address..." value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                name="password" placeholder="Password" value="{{old('password')}}">
                        </div>
                        <div class="form-group text-center ">
                            <button class="btn yms-blue w-100">Register</button>
                            <hr>
                            <p>Already have an account ?
                                <a href="/login">Log in</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
