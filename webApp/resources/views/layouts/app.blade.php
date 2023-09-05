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
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">-->
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
                <div class="container m-auto">
                    <div class="bg-beige-200">
                        <div class="box-booking bg-white/70 py-[10px]">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<script src="/js/core.min.js"></script>
<script src="/js/script.js"></script>
@livewireScripts

</body>
</html>
