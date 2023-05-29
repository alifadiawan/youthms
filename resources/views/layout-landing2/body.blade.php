<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Youthms.id @yield('title')</title>
    @include('layout-landing2.style')
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        @include('layout-landing2.topbar')
    </header>
    <!-- End Header -->


    <!-- main content -->
    <main id="main">
        @yield('content')
    </main>


    <!-- footer -->
    <footer>
        @include('layout-landing2.footer')
    </footer>
    <!-- end footer -->


    <!-- preloader / loading animation -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- end preloader --> 


    @include('layout-landing2.script')
</body>

</html>
