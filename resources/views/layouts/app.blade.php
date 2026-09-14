<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> @yield('title', 'Accueil')</title>

        <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/lokmr.png') }}"
    >

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white text-gray-900 antialiased">
        <div class="min-h-screen bg-gray-100">
            <x-storefront.navbar />

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
             
            <x-storefront.footer />
        </div>

        {{-- =========================================================
     NOTIFICATION PANIER
========================================================== --}}
<div
    x-data="{
        show: false,
        message: ''
    }"
    x-on:cart-success.window="
        message = $event.detail.message;
        show = true;

        setTimeout(() => {
            show = false;
        }, 3000);
    "
    class="toast toast-top toast-end z-[9999]"
>
    <div
        x-show="show"
        x-transition
        class="alert alert-success shadow-lg"
    >
        <i class="bi bi-check-circle-fill text-lg"></i>

        <span x-text="message"></span>
    </div>
</div>
    </body>
</html>
