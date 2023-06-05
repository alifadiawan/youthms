@include('layout-landing.script')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Youthms | Login</title>
    @notifyCss
    @include('layout.style')
    <x-notify::notify />

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
                        <a href="/" class="btn yms-blue">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="row justify-content-center">
                        <img src="{{ asset('yms-logo-notext.png') }}" alt="" class="my-3"
                            style="width: 200px">
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="login" method="post" class="user">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                aria-describedby="emailHelp" name="email" placeholder="Enter Email Address...">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                name="password" placeholder="Password">
                                <div class="form-group text-right mt-1">
                                    <a href="/forgot-password">Forgot Password</a>
                                </div>
                        </div>
                        <div class="form-group text-center m-0">
                            <button class="btn yms-blue w-100">LOGIN</button>
                        </div>
                        <p class="text-center text-muted my-2 ">Or</p>
                        <div class="form-group">
                            <a href="/register" class="btn btn-outline-primary btn-block">Sign up here</a>
                        </div>
                        <a class="btn btn-block btn-danger" href="{{ url('auth/google') }}" type="submit"><i class="fab fa-google me-2"></i> Sign in with Google
                        </a>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    @notifyJs

</body>

</html>
