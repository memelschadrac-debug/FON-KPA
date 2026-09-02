<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ $title ?? 'FON-KPA — Administration' }}
    </title>

    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/lokmr.png') }}"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f8f8f6] text-gray-900 antialiased">

    <div class="drawer lg:drawer-open">

        {{-- ================================================= --}}
        {{-- CONTRÔLE DU DRAWER --}}
        {{-- ================================================= --}}

        <input
            id="admin-drawer"
            type="checkbox"
            class="drawer-toggle"
        />

        {{-- ================================================= --}}
        {{-- CONTENU PRINCIPAL --}}
        {{-- ================================================= --}}

        <div class="drawer-content flex min-h-screen flex-col">

            {{-- NAVBAR ADMIN --}}
            <header
                class="
                    sticky
                    top-0
                    z-30
                    flex
                    h-16
                    items-center
                    border-b
                    border-gray-200
                    bg-white/95
                    px-4
                    backdrop-blur
                    sm:px-6
                    lg:px-8
                "
            >

                {{-- Bouton mobile --}}
                <label
                    for="admin-drawer"
                    aria-label="Ouvrir le menu"
                    class="
                        btn
                        btn-square
                        btn-ghost
                        mr-3
                        lg:hidden
                    "
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </label>

                {{-- Titre --}}
                <div class="flex-1">

                    <p class="text-[16px] font-semibold text-[#593114]">
                        Administration
                    </p>

                    <p class="hidden text-[11px] text-gray-400 sm:block">
                        Gestion de votre plateforme FON-KPA
                    </p>

                </div>

                 {{-- Profil / notification --}}
            <div class="flex items-center gap-3">

                <button
                    type="button"
                    class="
                        flex
                        h-9
                        w-9
                        items-center
                        justify-center
                        rounded-full
                        border
                        border-gray-200
                        bg-white
                        text-gray-500
                        transition
                        hover:border-[#593114]/20
                        hover:text-[#593114]
                    "
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        class="h-4 w-4"
                    >
                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                        <path d="M10 21h4"/>
                    </svg>

                </button>


                <div
                    class="
                        hidden
                        items-center
                        gap-2.5
                        rounded-full
                        border
                        border-gray-200
                        bg-white
                        py-1.5
                        pl-1.5
                        pr-3
                        sm:flex
                    "
                >

                    <div
                        class="
                            flex
                            h-7
                            w-7
                            items-center
                            justify-center
                            rounded-full
                            bg-[#593114]
                            text-[10px]
                            font-bold
                            text-white
                        "
                    >
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>

                    <span class="text-[12px] font-semibold text-gray-700">
                        {{ auth()->user()->name ?? 'Administrateur' }}
                    </span>

                </div>

            </div>

            </header>


            {{-- ================================================= --}}
            {{-- CONTENU DES PAGES --}}
            {{-- ================================================= --}}

            <main class="flex-1">

                <div class="mx-auto w-full max-w-[1600px] p-4 sm:p-6 lg:p-8">

                    {{ $slot }}

                </div>

            </main>

        </div>


        {{-- ================================================= --}}
        {{-- SIDEBAR --}}
        {{-- ================================================= --}}

        <div class="drawer-side z-40">

            <label
                for="admin-drawer"
                aria-label="Fermer le menu"
                class="drawer-overlay"
            ></label>

            <aside
                class="
                    flex
                    min-h-full
                    w-64
                    flex-col
                    border-r
                    border-gray-200
                    bg-white
                "
            >

                <x-storeadmin.sidebar />

            </aside>

        </div>

    </div>

</body>

</html>