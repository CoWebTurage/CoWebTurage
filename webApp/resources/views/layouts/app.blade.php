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
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900,900i%7CPT+Serif:400,700">
        <!--<link rel="stylesheet" href="ressources/css/bootstrap.css">-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Page Heading -->

            <!-- Page Header - Non connecté-->
            <header class="section page-header">
                <!-- RD Navbar-->
                <div class="rd-navbar-wrap">
                    <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                        <div class="rd-navbar-main-outer">
                            <div class="rd-navbar-main">
                                <!-- RD Navbar Panel-->
                                <div class="rd-navbar-panel">
                                    <!-- RD Navbar Toggle-->
                                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                    <!-- RD Navbar Brand-->
                                    <div class="rd-navbar-brand"><a href="index.html"><img class="brand-logo-light" src="/home_page/images/logo-default1-140x57.png" alt="" width="140" height="57" srcset="/home_page/images/logo-default-280x113.png 2x"/></a></div>
                                </div>
                                <div class="rd-navbar-main-element">
                                    <div class="rd-navbar-nav-wrap">
                                        <!-- RD Navbar Nav-->
                                        <ul class="rd-navbar-nav">
                                            <li class="rd-nav-item active"><a class="rd-nav-link" href="index.html">Accueil</a>
                                            </li>
                                            <li class="rd-nav-item"><a class="rd-nav-link" href="about-us.html">A propos</a>
                                            </li>
                                        </ul><a class="button button-white button-sm" href="#">Se connecter</a>
                                    </div>
                                </div><a class="button button-white button-sm" href="#">Se connecter</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>

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
                <div class="main-bunner-img" style="background-image: url(&quot;/home_page/images/bg-bunner-2.png&quot;); background-size: cover;"></div>
                <div class="main-bunner-inner">
                    <div class="container">
                        <div class="bg-gray-1">
                            <div class="box-booking">
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
                            <div class="col-12"><a href="index.html"><img src="/home_page/images/logo-default1-140x57.png" alt="" width="140" height="57" srcset="/home_page/images/logo-default-280x113.png 2x"/></a></div>
                            <div class="col-12">
                                <ul class="footer-minimal-nav">
                                    <li><a href="#">Menu</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="contacts.html">Contacts</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="about-us.html">About</a></li>
                                </ul>
                            </div>
                            <div class="col-12">
                                <ul class="social-list">
                                    <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-facebook" href="#"></a></li>
                                    <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-instagram" href="#"></a></li>
                                    <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-twitter" href="#"></a></li>
                                    <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-youtube-play" href="#"></a></li>
                                    <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-pinterest-p" href="#"></a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="rights"><span>&copy;&nbsp; </span><span class="copyright-year"></span><span>&nbsp;</span><span>Pesto</span><span>.&nbsp;</span><span>All Rights Reserved.</span><span>&nbsp;</span><a href="#">Privacy Policy</a>. Design&nbsp;by&nbsp;<a href="https://www.templatemonster.com">Templatemonster</a></p>
                    </div>
                </div>
            </footer>
        </div>
        <div class="snackbars" id="form-output-global"></div>
        <script src="/home_page/js/core.min.js"></script>
        <script src="/home_page/js/script.js"></script>
        </div>
    </body>
</html>
