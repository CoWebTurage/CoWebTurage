<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!--<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />-->

    <!-- CSS -->
    <link rel="stylesheet" type="text/css"
          href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900,900i%7CPT+Serif:400,700">
    <!--<link rel="stylesheet" href="ressources/css/bootstrap.css">-->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>


    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Page Heading -->

    @include('layouts.navigation')

    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        <section class="section section-lg section-main-bunner section-main-bunner-filter text-center">
            <div class="main-bunner-img"
                 style="background-image: url(/images/bg-bunner-2.png); background-size: cover;"></div>
            <div class="main-bunner-inner max-h-full overflow-auto">
                <div class="container">
                    <div class="bg-beige-200">
                        <div class="box-booking bg-white/70">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- SLOT -->
    </main>

    <!-- Page Footer-->
    <footer class="section footer-minimal context-dark">
        <div class="container wow-outer">
            <div class="wow fadeIn">
                <div class="row row-60">
                    <div class="col-12"><a href="{{route('home')}}"><img src="/images/logo-default-280x113.png" alt=""
                                                                  width="140" height="57"
                                                                  srcset="/images/logo-default-280x113.png 2x"/></a>
                    </div>
                    <div class="col-12">
                        <ul class="footer-minimal-nav">
                            <li><a href="{{route('landing_page')}}">About Us</a></li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <ul class="social-list">
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-facebook"
                                   href="#"></a></li>
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-instagram"
                                   href="#"></a></li>
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-twitter"
                                   href="#"></a></li>
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-youtube-play"
                                   href="#"></a></li>
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-pinterest-p"
                                   href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <p class="rights"><span>&copy;&nbsp; </span><span
                        class="copyright-year"></span><span>&nbsp;</span><span>Pesto</span><span>.&nbsp;</span><span>All Rights Reserved.</span><span>&nbsp;</span><a
                        href="#">Privacy Policy</a>. Design&nbsp;by&nbsp;<a href="https://www.templatemonster.com">Templatemonster</a>
                </p>
            </div>
        </div>
    </footer>
</div>

<script src="/js/core.min.js"></script>
<script src="/js/script.js"></script>
@livewireScripts

</body>
</html>
