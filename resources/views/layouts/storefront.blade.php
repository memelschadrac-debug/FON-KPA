<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'FON-KPA')</title>

    {{-- Favicon --}}
    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/lokmr.png') }}"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900">

    {{-- Navbar --}}
    <header>
        <x-storefront.navbar />
    </header>

    {{-- Contenu de la page --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <x-storefront.footer />
    </footer>

</body>
</html>