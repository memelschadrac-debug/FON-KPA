<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
    {{ config('app.name', 'FON-KPA') }} — @yield('title', 'Accueil')
    </title>

     <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/lokmr.png') }}"
    >


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >


    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet"
    >


    <!-- Laravel / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body
    class="
        min-h-screen
        bg-[#f7f7f7]
        font-['Plus_Jakarta_Sans']
        text-gray-900
        antialiased
    "
>

    <!--
        Conteneur principal

        Le contenu est volontairement petit et centré
        afin de reproduire la composition de la maquette.
    -->
    <main
        class="
            flex
            min-h-screen
            items-center
            justify-center
            px-4
            py-12
        "
    >

        <!--
            Largeur volontairement réduite
            comme dans la maquette originale.
        -->
        <div class="w-full max-w-[320px]">


            <!-- ============================= -->
            <!-- LOGO -->
            <!-- ============================= -->

            <div class="mb-3">

                <a
                    href="{{ route('home') }}"
                    class="inline-flex items-center"
                >

                    <img
                        src="{{ asset('images/lokmr.png') }}"
                        alt="FON-KPA"
                        class="h-10 w-auto object-contain"
                    >

                </a>

            </div>


            <!-- ============================= -->
            <!-- CONTENU DU FORMULAIRE -->
            <!-- ============================= -->

            {{ $slot }}


        </div>

    </main>


</body>

</html>