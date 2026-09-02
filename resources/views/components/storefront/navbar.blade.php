<!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->

<div class="bg-white">

    <!-- Mobile menu -->
    <el-dialog>
        <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">

            <el-dialog-backdrop
                class="fixed inset-0 bg-black/25 transition-opacity duration-300 ease-linear data-closed:opacity-0">
            </el-dialog-backdrop>

            <div tabindex="0" class="fixed inset-0 flex focus:outline-none">

                <el-dialog-panel
                    class="relative flex w-full max-w-xs transform flex-col overflow-y-auto bg-white pb-12 shadow-xl transition duration-300 ease-in-out data-closed:-translate-x-full">

                    <div class="flex px-4 pt-5 pb-2">

                        <button
                            type="button"
                            command="close"
                            commandfor="mobile-menu"
                            class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">

                            <span class="absolute -inset-0.5"></span>

                            <span class="sr-only">
                                Fermer le menu
                            </span>

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                data-slot="icon"
                                aria-hidden="true"
                                class="size-6">

                                <path
                                    d="M6 18 18 6M6 6l12 12"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />

                            </svg>

                        </button>

                    </div>


                    <!-- Links -->
                    <div class="mt-2 block">

                        <div class="space-y-2 px-4 py-6">

                            <div class="flow-root">

                                <a
                                    href="#"
                                    class="-m-2 block p-2 text-base font-medium text-gray-900 transition-colors duration-200 hover:text-[#e25f12]">

                                    Accueil

                                </a>

                            </div>


                            <div class="flow-root">

                                <a
                                    href="#"
                                    class="-m-2 block p-2 text-base font-medium text-gray-900 transition-colors duration-200 hover:text-[#e25f12]">

                                    Nos plats

                                </a>

                            </div>


                            <div class="flow-root">

                                <a
                                    href="#"
                                    class="-m-2 block p-2 text-base font-medium text-gray-900 transition-colors duration-200 hover:text-[#e25f12]">

                                    Catégories

                                </a>

                            </div>


                            <div class="flow-root">

                                <a
                                    href="#"
                                    class="-m-2 block p-2 text-base font-medium text-gray-900 transition-colors duration-200 hover:text-[#e25f12]">

                                    À propos

                                </a>

                            </div>


                            <div class="flow-root">

                                <a
                                    href="#"
                                    class="-m-2 block p-2 text-base font-medium text-gray-900 transition-colors duration-200 hover:text-[#e25f12]">

                                    Contact

                                </a>

                            </div>

                        </div>

                    </div>


                    <div class="space-y-6 border-t border-gray-200 px-4 py-6">

                        <div class="flow-root">

                            <a
                                href="#"
                                class="-m-2 block p-2 font-medium text-gray-900 transition-colors duration-200 hover:text-[#e25f12]">

                                Se connecter

                            </a>

                        </div>


                        <div class="flow-root">

                            <a
                                href="#"
                                class="-m-2 block p-2 font-medium text-gray-900 transition-colors duration-200 hover:text-[#e25f12]">

                                Créer un compte

                            </a>

                        </div>

                    </div>


                    <div class="border-t border-gray-200 px-4 py-6">

                        <a
                            href="#"
                            class="-m-2 flex items-center p-2 text-gray-900 transition-colors duration-200 hover:text-[#e25f12]">

                            <span class="block text-base font-medium">
                                FCFA
                            </span>

                            <span class="sr-only">
                                , changer la devise
                            </span>

                        </a>

                    </div>

                </el-dialog-panel>

            </div>

        </dialog>

    </el-dialog>


    <header class="relative bg-white">

        <!-- Promotional banner -->
        <p
            class="flex h-10 items-center justify-center gap-2 bg-[#593114] px-4 text-sm font-medium text-white sm:px-6 lg:px-8">

            <span>
                Livraison gratuite sur les commandes de plus de 50 000 FCFA
            </span>


            <svg
                viewBox="0 0 512 512"
                fill="none"
                aria-hidden="true"
                class="h-7 w-7 shrink-0">

                <!-- Chapeau -->
                <path
                    d="M158 153L61 438C57 450 68 461 80 456L363 359L158 153Z"
                    fill="#FFC515" />

                <!-- Bande rouge -->
                <path
                    d="M132 224L95 337L247 398L283 382L132 224Z"
                    fill="#D93652" />

                <!-- Bande bleue -->
                <path
                    d="M95 337L73 402L136 438L166 428L95 337Z"
                    fill="#2867D8" />

                <!-- Partie sombre -->
                <path
                    d="M158 153C218 180 300 244 363 359L158 153Z"
                    fill="#D99B0B" />

                <!-- Confetti bleu gauche -->
                <path
                    d="M234 98C254 137 254 172 217 202"
                    stroke="#2867D8"
                    stroke-width="14"
                    stroke-linecap="round" />

                <!-- Confetti vert -->
                <path
                    d="M196 126L208 138"
                    stroke="#22B573"
                    stroke-width="13"
                    stroke-linecap="round" />

                <!-- Confetti rouge -->
                <path
                    d="M313 85C323 103 324 123 314 140"
                    stroke="#D93652"
                    stroke-width="13"
                    stroke-linecap="round" />

                <path
                    d="M282 115V128"
                    stroke="#D93652"
                    stroke-width="13"
                    stroke-linecap="round" />

                <!-- Confetti jaune -->
                <path
                    d="M378 126C367 145 374 159 352 168C329 177 329 192 321 202"
                    stroke="#FFC515"
                    stroke-width="13"
                    stroke-linecap="round" />

                <!-- Confetti vert -->
                <path
                    d="M282 170H293"
                    stroke="#22B573"
                    stroke-width="13"
                    stroke-linecap="round" />

                <!-- Confetti rouge droit -->
                <path
                    d="M376 204C397 195 416 196 433 203"
                    stroke="#D93652"
                    stroke-width="13"
                    stroke-linecap="round" />

                <path
                    d="M346 220V232"
                    stroke="#D93652"
                    stroke-width="13"
                    stroke-linecap="round" />

                <path
                    d="M388 233H400"
                    stroke="#D93652"
                    stroke-width="13"
                    stroke-linecap="round" />

                <!-- Confetti bleu bas -->
                <path
                    d="M314 298C344 267 384 265 417 282"
                    stroke="#2867D8"
                    stroke-width="14"
                    stroke-linecap="round" />

                <!-- Confetti vert bas -->
                <path
                    d="M377 309L389 321"
                    stroke="#22B573"
                    stroke-width="13"
                    stroke-linecap="round" />

            </svg>

        </p>


        <!-- Navbar -->
        <nav
            aria-label="Top"
            class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="border-b border-gray-200">

                <div class="flex h-16 items-center">


                    <!-- Mobile menu button -->
                    <button
                        type="button"
                        command="show-modal"
                        commandfor="mobile-menu"
                        class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden">

                        <span class="absolute -inset-0.5"></span>

                        <span class="sr-only">
                            Ouvrir le menu
                        </span>

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5"
                            data-slot="icon"
                            aria-hidden="true"
                            class="size-6">

                            <path
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                stroke-linecap="round"
                                stroke-linejoin="round" />

                        </svg>

                    </button>


                    <!-- Logo -->
                    <div class="ml-4 flex lg:ml-0">

                        <a href="{{ route('home') }}">

                            <span class="sr-only">
                                FON-KPA
                            </span>

                            <img
                                src="{{ asset('images/FON-KPA LOGO1.png') }}"
                                alt="FON-KPA"
                                class="h-6 w-auto" />

                        </a>

                    </div>


                    <!-- Navigation -->
                    <div class="hidden lg:ml-8 lg:block lg:self-stretch">

                        <div class="flex h-full space-x-8">


                            <!-- Accueil -->
                            <a
                                href="{{ route('home') }}"
                                class="flex items-center text-sm font-medium transition-colors duration-200
                                {{ request()->routeIs('home')
                                    ? 'text-[#e25f12]'
                                    : 'text-gray-700 hover:text-[#e25f12]' }}"
                            >
                                Accueil
                            </a>


                            <!-- Nos plats -->
                            <a
                                href="{{ route('plats.index') }}"
                                class="flex items-center text-sm font-medium transition-colors duration-200
                                {{ request()->routeIs('plats.*')
                                    ? 'text-[#e25f12]'
                                    : 'text-gray-700 hover:text-[#e25f12]' }}">

                                Nos plats

                            </a>


                            <!-- Catégories -->
                            <a
                                href="{{ route('categories.index') }}"
                                class="flex items-center text-sm font-medium transition-colors duration-200
                                {{ request()->routeIs('categories.*')
                                    ? 'text-[#e25f12]'
                                    : 'text-gray-700 hover:text-[#e25f12]' }}">

                                Catégories

                            </a>


                            <!-- À propos -->
                            <a
                                href="{{ route('about') }}"
                                class="flex items-center text-sm font-medium transition-colors duration-200
                                {{ request()->routeIs('about')
                                    ? 'text-[#e25f12]'
                                    : 'text-gray-700 hover:text-[#e25f12]' }}">

                                À propos

                            </a>


                            <!-- Contact -->
                            <a
                                href="{{ route('contact') }}"
                                class="flex items-center text-sm font-medium transition-colors duration-200
                                {{ request()->routeIs('contact')
                                    ? 'text-[#e25f12]'
                                    : 'text-gray-700 hover:text-[#e25f12]' }}">

                                Contact

                            </a>

                        </div>

                    </div>


                    <!-- Right side -->
                    <div class="ml-auto flex items-center">


                        <!-- Authentication -->
                        <div
                            class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">

                            <a
                                href="#"
                                class="text-sm font-medium text-gray-700 transition-colors duration-200 hover:text-[#e25f12]">

                                Se connecter

                            </a>


                            <span
                                aria-hidden="true"
                                class="h-6 w-px bg-gray-200">
                            </span>


                            <a
                                href="#"
                                class="text-sm font-medium text-gray-700 transition-colors duration-200 hover:text-[#e25f12]">

                                Créer un compte

                            </a>

                        </div>


                        <!-- Currency -->
                        <div class="hidden lg:ml-8 lg:flex">

                            <a
                                href="#"
                                class="flex items-center text-gray-700 transition-colors duration-200 hover:text-[#e25f12]">

                                <img
                                    src="https://flagcdn.io/flags/4x3/ci.svg"
                                    alt="Côte d'Ivoire"
                                    class="block h-auto w-5 shrink-0" />

                                <span class="ml-3 block text-sm font-medium">
                                    FCFA
                                </span>

                                <span class="sr-only">
                                    , changer la devise
                                </span>

                            </a>

                        </div>


                        <!-- Search -->
                        <div class="flex lg:ml-6">

                            <a
                                href="#"
                                class="group p-2 text-gray-400 transition-colors duration-200 hover:text-[#e25f12]">

                                <span class="sr-only">
                                    Rechercher
                                </span>

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    data-slot="icon"
                                    aria-hidden="true"
                                    class="size-6 transition-colors duration-200">

                                    <path
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                        stroke-linecap="round"
                                        stroke-linejoin="round" />

                                </svg>

                            </a>

                        </div>


                        <!-- Cart -->
                        <div class="ml-4 flow-root lg:ml-6">

                            <a
                                href="{{ route('cart.index') }}"
                                class="group relative flex items-center rounded-full p-2 transition-all duration-200 hover:bg-gray-100"
                                aria-label="Voir le panier">


                                <!-- Icône panier -->
                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                    aria-hidden="true"
                                    class="size-6 text-gray-400 transition-colors duration-200 group-hover:text-[#e25f12]">

                                    <path
                                        d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 1.9-1.4L21 8H6"
                                        stroke-linecap="round"
                                        stroke-linejoin="round" />

                                    <circle cx="10" cy="20" r="1" />

                                    <circle cx="18" cy="20" r="1" />

                                </svg>


                                <!-- Badge quantité -->
                                <span
                                    class="absolute -right-0.5 -top-0.5 flex h-5 min-w-5 items-center justify-center rounded-full bg-[#e25f12] px-1 text-[11px] font-bold leading-none text-white ring-2 ring-white">

                                    0

                                </span>


                                <span class="sr-only">
                                    0 articles dans le panier, voir le panier
                                </span>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </nav>

    </header>

</div>