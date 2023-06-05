@include('layout-landing.script')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Youthms | Reset</title>
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
                    {{-- <div class="row justify-content-center">
                        <img src="{{ asset('yms-logo-notext.png') }}" alt="" class="my-3"
                            style="width: 250px">
                    </div> --}}
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
                    <h3 class="text-center text-bold">Reset Password</h3>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password-confirm" required>
                        </div>
                        <div class="form-group text-center ">
                            <button class="btn yms-blue w-100">RESET PASSWORD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     @notifyJs

</body>

</html>
