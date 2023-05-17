<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout-landing.style')
    <title>Youthms.id | @yield('title')</title>
</head>

<body>
    {{-- navbar --}}
    @include('layout-landing.topbar')

    {{-- Content --}}
    @yield('content')

    {{-- foooter --}}
    @include('layout-landing.footer')

    {{-- javascript --}}
    @include('layout-landing.script')
</body>

</html>
