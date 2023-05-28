<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Youthms.id | @yield('judul')</title>
    @include('EU.chat.link')
</head>

<body>
    <section class="message-area">
        @yield('content')
    </section>
</body>
    @include('EU.chat.script')
</html>