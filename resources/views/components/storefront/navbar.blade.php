{{-- ========================================================= --}}
{{-- FON-KPA NAVBAR — DESIGN INSPIREE DE LA MAQUETTE          --}}
{{-- ========================================================= --}}

{{-- Bootstrap Icons --}}
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>


{{-- ========================================================= --}}
{{-- NAVBAR PRINCIPALE                                         --}}
{{-- ========================================================= --}}

<div
    x-data="fonKpaNavbar()"
    x-init="init()"
    class="relative z-[100]"
>

    {{-- ===================================================== --}}
    {{-- MOBILE MENU                                           --}}
    {{-- ===================================================== --}}

    <el-dialog>

        <dialog
            id="mobile-menu"
            class="backdrop:bg-transparent lg:hidden"
        >

            {{-- Backdrop --}}
            <el-dialog-backdrop
                class="fixed inset-0 bg-black/30 opacity-100
                       backdrop-blur-[2px]
                       transition-all duration-300 ease-out
                       data-closed:opacity-0"
            ></el-dialog-backdrop>


            {{-- Conteneur --}}
            <div
                tabindex="0"
                class="fixed inset-0 flex focus:outline-none"
            >

                {{-- ================================================= --}}
                {{-- PANNEAU MOBILE                                     --}}
                {{-- ================================================= --}}

                <el-dialog-panel
                    class="relative flex w-full max-w-[20rem]
                           transform flex-col overflow-y-auto
                           bg-[#FFFCF7] pb-10 shadow-2xl
                           transition-all duration-300 ease-out
                           data-closed:-translate-x-full
                           data-closed:opacity-0
                           sm:max-w-sm"
                >

                    {{-- ================================================= --}}
                    {{-- HEADER MOBILE                                      --}}
                    {{-- ================================================= --}}

                    <div class="flex items-center justify-between px-5 pb-4 pt-5">

                        {{-- Logo --}}
                        <a
                            href="{{ route('home') }}"
                            class="flex items-center"
                        >
                            <img
                                src="{{ asset('images/FON-KPA LOGO1.png') }}"
                                alt="FON-KPA"
                                class="h-7 w-auto"
                            >
                        </a>


                        {{-- Fermer --}}
                        <button
                            type="button"
                            command="close"
                            commandfor="mobile-menu"
                            class="flex h-10 w-10 items-center
                                   justify-center rounded-full
                                   text-gray-500
                                   transition-all duration-200
                                   hover:bg-[#F8EBD9]
                                   hover:text-[#e25f12]
                                   active:scale-90"
                            aria-label="Fermer le menu"
                        >
                            <i class="bi bi-x-lg text-lg"></i>
                        </button>

                    </div>


                    {{-- Séparation --}}
                    <div class="mx-5 border-b border-[#EDE4DA]"></div>


                    {{-- ================================================= --}}
                    {{-- NAVIGATION MOBILE                                 --}}
                    {{-- ================================================= --}}

                    <nav
                        aria-label="Navigation mobile"
                        class="mt-5 px-4"
                    >

                        <div class="space-y-1">

                            {{-- Accueil --}}
                            <a
                                href="{{ route('home') }}"
                                class="group flex items-center gap-3 rounded-xl
                                       px-3 py-3 text-sm font-medium
                                       transition-all duration-200
                                       {{ request()->routeIs('home')
                                           ? 'bg-[#FFF1E7] text-[#e25f12]'
                                           : 'text-gray-800 hover:bg-[#FFF7F1] hover:text-[#e25f12]' }}"
                            >

                                <span
                                    class="flex h-9 w-9 shrink-0
                                           items-center justify-center
                                           rounded-lg
                                           {{ request()->routeIs('home')
                                               ? 'bg-white text-[#e25f12]'
                                               : 'bg-[#F7F4F0] text-gray-500 group-hover:text-[#e25f12]' }}"
                                >
                                    <i class="bi bi-house text-lg"></i>
                                </span>

                                <span>
                                    Accueil
                                </span>

                            </a>


                            {{-- Nos plats --}}
                            <a
                                href="{{ route('plats.index') }}"
                                class="group flex items-center gap-3 rounded-xl
                                       px-3 py-3 text-sm font-medium
                                       transition-all duration-200
                                       {{ request()->routeIs('plats.*')
                                           ? 'bg-[#FFF1E7] text-[#e25f12]'
                                           : 'text-gray-800 hover:bg-[#FFF7F1] hover:text-[#e25f12]' }}"
                            >

                                <span
                                    class="flex h-9 w-9 shrink-0
                                           items-center justify-center
                                           rounded-lg
                                           bg-[#F7F4F0] text-gray-500
                                           transition-colors
                                           group-hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-egg-fried text-lg"></i>
                                </span>

                                <span>
                                    Nos plats
                                </span>

                            </a>


                            {{-- Catégories --}}
                            <a
                                href="{{ route('categories.index') }}"
                                class="group flex items-center gap-3 rounded-xl
                                       px-3 py-3 text-sm font-medium
                                       transition-all duration-200
                                       {{ request()->routeIs('categories.*')
                                           ? 'bg-[#FFF1E7] text-[#e25f12]'
                                           : 'text-gray-800 hover:bg-[#FFF7F1] hover:text-[#e25f12]' }}"
                            >

                                <span
                                    class="flex h-9 w-9 shrink-0
                                           items-center justify-center
                                           rounded-lg
                                           bg-[#F7F4F0] text-gray-500
                                           transition-colors
                                           group-hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-grid text-lg"></i>
                                </span>

                                <span>
                                    Catégories
                                </span>

                            </a>


                            {{-- À propos --}}
                            <a
                                href="{{ route('about') }}"
                                class="group flex items-center gap-3 rounded-xl
                                       px-3 py-3 text-sm font-medium
                                       transition-all duration-200
                                       {{ request()->routeIs('about')
                                           ? 'bg-[#FFF1E7] text-[#e25f12]'
                                           : 'text-gray-800 hover:bg-[#FFF7F1] hover:text-[#e25f12]' }}"
                            >

                                <span
                                    class="flex h-9 w-9 shrink-0
                                           items-center justify-center
                                           rounded-lg
                                           bg-[#F7F4F0] text-gray-500
                                           transition-colors
                                           group-hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-info-circle text-lg"></i>
                                </span>

                                <span>
                                    À propos
                                </span>

                            </a>


                            {{-- Contact --}}
                            <a
                                href="{{ route('contact') }}"
                                class="group flex items-center gap-3 rounded-xl
                                       px-3 py-3 text-sm font-medium
                                       transition-all duration-200
                                       {{ request()->routeIs('contact')
                                           ? 'bg-[#FFF1E7] text-[#e25f12]'
                                           : 'text-gray-800 hover:bg-[#FFF7F1] hover:text-[#e25f12]' }}"
                            >

                                <span
                                    class="flex h-9 w-9 shrink-0
                                           items-center justify-center
                                           rounded-lg
                                           bg-[#F7F4F0] text-gray-500
                                           transition-colors
                                           group-hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-envelope text-lg"></i>
                                </span>

                                <span>
                                    Contact
                                </span>

                            </a>

                        </div>

                    </nav>


                    {{-- ================================================= --}}
                    {{-- COMPTE MOBILE                                     --}}
                    {{-- ================================================= --}}

                    <div
                        x-data="{ open: false }"
                        class="mt-6 border-t border-[#EDE4DA]
                               px-4 pt-5"
                    >

                        <button
                            type="button"
                            @click="open = !open"
                            class="flex w-full items-center
                                   justify-between rounded-xl
                                   px-3 py-3 text-gray-900
                                   transition-all duration-200
                                   hover:bg-white"
                        >

                            <span class="flex items-center gap-3">

                                <span
                                    class="flex h-9 w-9 items-center
                                           justify-center rounded-lg
                                           bg-[#FFF1E7]
                                           text-[#e25f12]"
                                >
                                    <i class="bi bi-person text-lg"></i>
                                </span>

                                <span class="text-sm font-semibold">
                                    Mon compte
                                </span>

                            </span>

                            <i
                                class="bi bi-chevron-down text-sm
                                       transition-transform duration-300"
                                :class="open ? 'rotate-180' : ''"
                            ></i>

                        </button>


                        {{-- Sous-menu --}}
                        <div
                            x-show="open"
                            x-cloak
                            x-transition
                            class="mt-2 space-y-1 overflow-hidden"
                        >

                            @auth

                                <a
                                    href="{{ route('profile.edit') }}"
                                    class="flex items-center gap-3
                                           rounded-lg px-3 py-2.5
                                           text-sm text-gray-700
                                           transition
                                           hover:bg-[#FFF1E7]
                                           hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-person-circle text-lg"></i>
                                    <span>Mon profil</span>
                                </a>


                                <a
                                    href="#"
                                    class="flex items-center gap-3
                                           rounded-lg px-3 py-2.5
                                           text-sm text-gray-700
                                           transition
                                           hover:bg-[#FFF1E7]
                                           hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-bag-check text-lg"></i>
                                    <span>Mes commandes</span>
                                </a>

                            @endauth


                            @guest

                                <a
                                    href="{{ route('login') }}"
                                    class="flex items-center gap-3
                                           rounded-lg px-3 py-2.5
                                           text-sm text-gray-700
                                           transition
                                           hover:bg-[#FFF1E7]
                                           hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-box-arrow-in-right text-lg"></i>
                                    <span>Se connecter</span>
                                </a>


                                <a
                                    href="{{ route('register') }}"
                                    class="flex items-center gap-3
                                           rounded-lg px-3 py-2.5
                                           text-sm text-gray-700
                                           transition
                                           hover:bg-[#FFF1E7]
                                           hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-person-plus text-lg"></i>
                                    <span>Créer un compte</span>
                                </a>

                            @endguest


                            @auth

                                <div class="border-t border-gray-100 pt-1">

                                    <form
                                        method="POST"
                                        action="{{ route('logout') }}"
                                    >
                                        @csrf

                                        <button
                                            type="submit"
                                            class="flex w-full items-center
                                                   gap-3 rounded-lg
                                                   px-3 py-2.5 text-left
                                                   text-sm text-red-600
                                                   transition
                                                   hover:bg-red-50"
                                        >
                                            <i class="bi bi-box-arrow-right text-lg"></i>
                                            <span>Se déconnecter</span>
                                        </button>

                                    </form>

                                </div>

                            @endauth

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- PANIER MOBILE                                      --}}
                    {{-- ================================================= --}}

                    @php
                        $mobileCartCount = collect(
                            session('cart', [])
                        )->sum('quantity');
                    @endphp

                    <div class="mt-5 border-t border-[#EDE4DA] px-4 pt-5">

                        <a
                            href="{{ route('cart.index') }}"
                            class="flex items-center justify-between
                                   rounded-xl bg-white px-3 py-3
                                   shadow-sm ring-1 ring-[#EEE5DC]
                                   transition hover:ring-[#E25F12]"
                        >

                            <span class="flex items-center gap-3">

                                <span
                                    class="flex h-9 w-9 items-center
                                           justify-center rounded-lg
                                           bg-[#593114] text-white"
                                >
                                    <i class="bi bi-cart3"></i>
                                </span>

                                <span class="text-sm font-semibold text-[#593114]">
                                    Mon panier
                                </span>

                            </span>

                            <span
                                class="flex h-6 min-w-6 items-center
                                       justify-center rounded-full
                                       bg-[#e25f12] px-1.5
                                       text-[10px] font-bold text-white"
                            >
                                {{ $mobileCartCount }}
                            </span>

                        </a>

                    </div>


                    {{-- ================================================= --}}
                    {{-- DEVISE MOBILE                                     --}}
                    {{-- ================================================= --}}

                    <div class="mt-4 px-4">

                        <div class="flex items-center gap-3
                                    rounded-xl px-3 py-3
                                    text-gray-800">

                            <img
                                src="https://flagcdn.io/flags/4x3/ci.svg"
                                alt="Côte d'Ivoire"
                                class="w-5"
                            >

                            <span class="text-sm font-medium">
                                FCFA
                            </span>

                        </div>

                    </div>

                </el-dialog-panel>

            </div>

        </dialog>

    </el-dialog>


    {{-- ========================================================= --}}
    {{-- HEADER / NAVBAR DESKTOP                                  --}}
    {{-- ========================================================= --}}

    <header
        class="fixed inset-x-0 top-0 z-50
               transition-all duration-500 ease-out"
        :class="scrolled
            ? 'bg-white/95 shadow-[0_8px_30px_rgba(89,49,20,0.08)] backdrop-blur-xl'
            : 'bg-transparent'"
    >

        <nav
            aria-label="Navigation principale"
            class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]"
        >

            <div
                class="flex h-[76px] items-center justify-between
                       transition-all duration-500"
                :class="scrolled ? 'h-[68px]' : 'h-[76px]'"
            >


                {{-- ================================================= --}}
                {{-- GAUCHE : LOGO                                      --}}
                {{-- ================================================= --}}

                <div class="flex shrink-0 items-center">

                    {{-- Menu mobile --}}
                    <button
                        type="button"
                        command="show-modal"
                        commandfor="mobile-menu"
                        class="mr-3 flex h-10 w-10
                               items-center justify-center
                               rounded-full text-[#593114]
                               transition-all duration-200
                               hover:bg-[#FFF1E7]
                               hover:text-[#e25f12]
                               active:scale-90 lg:hidden"
                        aria-label="Ouvrir le menu"
                    >
                        <i class="bi bi-list text-2xl"></i>
                    </button>


                    {{-- Logo --}}
                    <a
                        href="{{ route('home') }}"
                        class="group flex items-center"
                    >

                        <span class="sr-only">
                            FON-KPA
                        </span>

                        <img
                            src="{{ asset('images/FON-KPA LOGO1.png') }}"
                            alt="FON-KPA"
                            class="h-7 w-auto transition-transform
                                   duration-300 group-hover:scale-[1.02]
                                   sm:h-7"
                        >

                    </a>

                </div>


                {{-- ================================================= --}}
                {{-- CENTRE : NAVIGATION                                --}}
                {{-- ================================================= --}}

                <div class="hidden lg:flex">

                    <div class="flex items-center gap-8 xl:gap-10">

                        {{-- Accueil --}}
                        <a
                            href="{{ route('home') }}"
                            class="relative py-2 text-[13px]
                                   font-medium transition-colors
                                   duration-200"
                            :class="'{{ request()->routeIs('home')
                                ? 'text-[#e25f12]'
                                : 'text-[#3F3834] hover:text-[#e25f12]' }}'"
                        >
                            Accueil

                            @if(request()->routeIs('home'))
                                <span
                                    class="absolute -bottom-1 left-1/2
                                           h-1 w-1 -translate-x-1/2
                                           rounded-full bg-[#e25f12]"
                                ></span>
                            @endif

                        </a>


                        {{-- Nos plats --}}
                        <a
                            href="{{ route('plats.index') }}"
                            class="relative py-2 text-[13px]
                                   font-medium transition-colors
                                   duration-200
                                   {{ request()->routeIs('plats.*')
                                       ? 'text-[#e25f12]'
                                       : 'text-[#3F3834] hover:text-[#e25f12]' }}"
                        >
                            Nos plats

                            @if(request()->routeIs('plats.*'))
                                <span
                                    class="absolute -bottom-1 left-1/2
                                           h-1 w-1 -translate-x-1/2
                                           rounded-full bg-[#e25f12]"
                                ></span>
                            @endif

                        </a>


                        {{-- Catégories --}}
                        <a
                            href="{{ route('categories.index') }}"
                            class="relative py-2 text-[13px]
                                   font-medium transition-colors
                                   duration-200
                                   {{ request()->routeIs('categories.*')
                                       ? 'text-[#e25f12]'
                                       : 'text-[#3F3834] hover:text-[#e25f12]' }}"
                        >
                            Catégories

                            @if(request()->routeIs('categories.*'))
                                <span
                                    class="absolute -bottom-1 left-1/2
                                           h-1 w-1 -translate-x-1/2
                                           rounded-full bg-[#e25f12]"
                                ></span>
                            @endif

                        </a>


                        {{-- À propos --}}
                        <a
                            href="{{ route('about') }}"
                            class="relative py-2 text-[13px]
                                   font-medium transition-colors
                                   duration-200
                                   {{ request()->routeIs('about')
                                       ? 'text-[#e25f12]'
                                       : 'text-[#3F3834] hover:text-[#e25f12]' }}"
                        >
                            À propos

                            @if(request()->routeIs('about'))
                                <span
                                    class="absolute -bottom-1 left-1/2
                                           h-1 w-1 -translate-x-1/2
                                           rounded-full bg-[#e25f12]"
                                ></span>
                            @endif

                        </a>


                        {{-- Contact --}}
                        <a
                            href="{{ route('contact') }}"
                            class="relative py-2 text-[13px]
                                   font-medium transition-colors
                                   duration-200
                                   {{ request()->routeIs('contact')
                                       ? 'text-[#e25f12]'
                                       : 'text-[#3F3834] hover:text-[#e25f12]' }}"
                        >
                            Contact

                            @if(request()->routeIs('contact'))
                                <span
                                    class="absolute -bottom-1 left-1/2
                                           h-1 w-1 -translate-x-1/2
                                           rounded-full bg-[#e25f12]"
                                ></span>
                            @endif

                        </a>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- DROITE : ACTIONS                                  --}}
                {{-- ================================================= --}}

                <div class="flex shrink-0 items-center gap-2 sm:gap-3">


                    {{-- ================================================= --}}
                    {{-- COMPTE                                           --}}
                    {{-- ================================================= --}}

                    <div
                        x-data="{ open: false }"
                        class="relative hidden lg:block"
                    >

                        <button
                            type="button"
                            @click="open = !open"
                            @click.outside="open = false"
                            class="group flex h-10 w-10
                                   items-center justify-center
                                   rounded-full border
                                   border-[#EADCCF]
                                   bg-white/70
                                   text-[#593114]
                                   transition-all duration-300
                                   hover:border-[#E25F12]
                                   hover:bg-[#FFF1E7]
                                   hover:text-[#e25f12]"
                            aria-label="Mon compte"
                        >

                            <i
                                class="bi bi-person text-[17px]"
                            ></i>

                        </button>


                        {{-- Dropdown --}}
                        <div
                            x-show="open"
                            x-cloak
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                            class="absolute right-0 top-12 z-50 w-64
                                   overflow-hidden rounded-2xl
                                   border border-[#EEE5DC]
                                   bg-white shadow-[0_20px_50px_rgba(89,49,20,0.12)]"
                        >

                            <div
                                class="border-b border-[#F0E9E3]
                                       bg-[#FFFCF7] px-4 py-4"
                            >

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10
                                               items-center justify-center
                                               rounded-full
                                               bg-[#FFF1E7]
                                               text-[#e25f12]"
                                    >
                                        <i class="bi bi-person text-xl"></i>
                                    </div>

                                    <div>
                                        <p class="text-sm font-semibold text-[#593114]">
                                            Mon compte
                                        </p>

                                        <p class="text-xs text-gray-500">
                                            Gérez votre espace personnel
                                        </p>
                                    </div>

                                </div>

                            </div>


                            <div class="p-2">

                                @auth

                                    <a
                                        href="{{ route('profile.edit') }}"
                                        class="flex items-center gap-3
                                               rounded-xl px-3 py-2.5
                                               text-sm text-gray-700
                                               transition
                                               hover:bg-[#FFF1E7]
                                               hover:text-[#e25f12]"
                                    >
                                        <i class="bi bi-person-circle text-lg"></i>
                                        <span>Mon profil</span>
                                    </a>


                                    <a
                                        href="#"
                                        class="flex items-center gap-3
                                               rounded-xl px-3 py-2.5
                                               text-sm text-gray-700
                                               transition
                                               hover:bg-[#FFF1E7]
                                               hover:text-[#e25f12]"
                                    >
                                        <i class="bi bi-bag-check text-lg"></i>
                                        <span>Mes commandes</span>
                                    </a>

                                @endauth


                                @guest

                                    <a
                                        href="{{ route('login') }}"
                                        class="flex items-center gap-3
                                               rounded-xl px-3 py-2.5
                                               text-sm text-gray-700
                                               transition
                                               hover:bg-[#FFF1E7]
                                               hover:text-[#e25f12]"
                                    >
                                        <i class="bi bi-box-arrow-in-right text-lg"></i>
                                        <span>Se connecter</span>
                                    </a>


                                    <a
                                        href="{{ route('register') }}"
                                        class="flex items-center gap-3
                                               rounded-xl px-3 py-2.5
                                               text-sm text-gray-700
                                               transition
                                               hover:bg-[#FFF1E7]
                                               hover:text-[#e25f12]"
                                    >
                                        <i class="bi bi-person-plus text-lg"></i>
                                        <span>Créer un compte</span>
                                    </a>

                                @endguest

                            </div>


                            @auth

                                <div class="border-t border-[#F0E9E3] p-2">

                                    <form
                                        method="POST"
                                        action="{{ route('logout') }}"
                                    >
                                        @csrf

                                        <button
                                            type="submit"
                                            class="flex w-full items-center
                                                   gap-3 rounded-xl px-3 py-2.5
                                                   text-left text-sm
                                                   text-red-600
                                                   transition
                                                   hover:bg-red-50"
                                        >
                                            <i class="bi bi-box-arrow-right text-lg"></i>
                                            <span>Se déconnecter</span>
                                        </button>

                                    </form>

                                </div>

                            @endauth

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- PANIER                                            --}}
                    {{-- ================================================= --}}

                    @php
                        $cartCount = collect(
                            session('cart', [])
                        )->sum('quantity');
                    @endphp

                    <div
                        x-data="{
                            cartCount: {{ $cartCount }}
                        }"
                        x-init="
                            window.addEventListener(
                                'fonkpa-cart-updated',
                                (event) => {
                                    cartCount = Number(
                                        event.detail?.count || 0
                                    );
                                }
                            );
                        "
                    >

                        <a
                            href="{{ route('cart.index') }}"
                            class="group relative flex h-10 w-10
                                   items-center justify-center
                                   rounded-full border
                                   border-[#EADCCF]
                                   bg-white/70
                                   text-[#593114]
                                   transition-all duration-300
                                   hover:border-[#E25F12]
                                   hover:bg-[#FFF1E7]
                                   hover:text-[#e25f12]"
                            aria-label="Voir le panier"
                        >

                            <i
                                class="bi bi-basket2 text-[16px]
                                       transition-transform duration-300
                                       group-hover:scale-110"
                            ></i>


                            <span
                                x-show="cartCount > 0"
                                x-text="cartCount"
                                x-cloak
                                class="absolute -right-1 -top-1
                                       flex h-[18px] min-w-[18px]
                                       items-center justify-center
                                       rounded-full
                                       bg-[#e25f12] px-1
                                       text-[9px] font-bold
                                       leading-none text-white
                                       ring-2 ring-white"
                            ></span>

                        </a>

                    </div>


                    {{-- ================================================= --}}
                    {{-- CTA PRINCIPAL                                     --}}
                    {{-- ================================================= --}}

                    <a
                        href="{{ route('plats.index') }}"
                        class="hidden h-10 items-center
                               justify-center rounded-full
                               bg-[#E25F12] px-5
                               text-[11px] font-bold text-white
                               shadow-[0_8px_20px_rgba(226,95,18,0.18)]
                               transition-all duration-300
                               hover:-translate-y-0.5
                               hover:bg-[#593114]
                               hover:shadow-[0_12px_25px_rgba(89,49,20,0.18)]
                               sm:flex"
                    >
                        Commander
                    </a>

                </div>

            </div>

        </nav>

    </header>

</div>


{{-- ========================================================= --}}
{{-- ESPACE POUR LA NAVBAR SUR MOBILE                         --}}
{{-- ========================================================= --}}

<div class="h-[76px] lg:hidden"></div>


{{-- ========================================================= --}}
{{-- ALPINE CLOAK                                              --}}
{{-- ========================================================= --}}

<style>
    [x-cloak] {
        display: none !important;
    }
</style>


{{-- ========================================================= --}}
{{-- ALPINE NAVBAR                                             --}}
{{-- ========================================================= --}}

<script>
    function fonKpaNavbar() {

        return {

            scrolled: false,

            init() {

                this.handleScroll();

                window.addEventListener(
                    'scroll',
                    () => this.handleScroll(),
                    { passive: true }
                );

            },


            handleScroll() {

                this.scrolled =
                    window.scrollY > 20;

            }

        };

    }
</script>