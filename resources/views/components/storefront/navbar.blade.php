{{-- ========================================================= --}}
{{-- FON-KPA NAVBAR                                           --}}
{{-- Desktop conservé + Mobile Bottom Navigation moderne     --}}
{{-- ========================================================= --}}


{{-- ========================================================= --}}
{{-- BOOTSTRAP ICONS                                          --}}
{{-- ========================================================= --}}

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>


{{-- ========================================================= --}}
{{-- NAVBAR PRINCIPALE                                        --}}
{{-- ========================================================= --}}

<div
    x-data="fonKpaNavbar()"
    x-init="init()"
    :class="{ 'overflow-hidden': mobileAccountOpen }"
    class="relative z-[100]"
>


    {{-- ===================================================== --}}
    {{-- MOBILE : BOTTOM SHEET COMPTE                        --}}
    {{-- ===================================================== --}}

    <div
        x-show="mobileAccountOpen"
        x-cloak
        class="fixed inset-0 z-[110] lg:hidden"
        aria-modal="true"
        role="dialog"
        aria-label="Menu mobile"
        @keydown.escape.window="mobileAccountOpen = false"
    >

        {{-- ------------------------------------------------- --}}
        {{-- BACKDROP                                          --}}
        {{-- ------------------------------------------------- --}}

        <div
            class="absolute inset-0 bg-[#3D1F0D]/25
                   backdrop-blur-[4px]"
            @click="mobileAccountOpen = false"

            x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"

            x-transition:leave="transition-opacity ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        ></div>


        {{-- ------------------------------------------------- --}}
        {{-- BOTTOM SHEET                                      --}}
        {{-- ------------------------------------------------- --}}

        <section
            x-show="mobileAccountOpen"

            x-transition:enter="transform transition ease-[cubic-bezier(0.22,1,0.36,1)] duration-400"
            x-transition:enter-start="translate-y-full"
            x-transition:enter-end="translate-y-0"

            x-transition:leave="transform transition ease-in duration-250"
            x-transition:leave-start="translate-y-0"
            x-transition:leave-end="translate-y-full"

            class="absolute inset-x-0 bottom-0
                   max-h-[88vh]
                   overflow-y-auto
                   rounded-t-[2rem]
                   border-t border-[#EADCCF]
                   bg-[#FFFCF7]
                   shadow-[0_-20px_60px_rgba(89,49,20,0.18)]
                   pb-[calc(1rem+env(safe-area-inset-bottom))]"
        >

            {{-- ------------------------------------------------- --}}
            {{-- HANDLE                                             --}}
            {{-- ------------------------------------------------- --}}

            <div class="flex justify-center pt-3">
                <span
                    class="h-1.5 w-12 rounded-full bg-[#DCCFC4]"
                ></span>
            </div>


            {{-- ------------------------------------------------- --}}
            {{-- HEADER DU SHEET                                    --}}
            {{-- ------------------------------------------------- --}}

            <div
                class="flex items-center justify-between
                       px-5 pb-4 pt-4"
            >

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-11 w-11 items-center
                               justify-center rounded-full
                               bg-[#FFF1E7]
                               text-[#E25F12]"
                    >
                        <i class="bi bi-person text-xl"></i>
                    </div>

                    <div>

                        <p
                            class="text-sm font-bold text-[#593114]"
                        >
                            Mon compte
                        </p>

                        <p
                            class="mt-0.5 text-xs text-[#8A7D74]"
                        >
                            Gérez votre espace personnel
                        </p>

                    </div>

                </div>


                {{-- Fermer --}}
                <button
                    type="button"
                    @click="mobileAccountOpen = false"
                    class="flex h-10 w-10 items-center
                           justify-center rounded-full
                           bg-white
                           text-[#593114]
                           ring-1 ring-[#EADCCF]
                           transition-all duration-300
                           hover:bg-[#FFF1E7]
                           hover:text-[#E25F12]
                           active:scale-90"
                    aria-label="Fermer le menu"
                >
                    <i class="bi bi-x-lg text-sm"></i>
                </button>

            </div>


            {{-- ------------------------------------------------- --}}
            {{-- CONTENU                                            --}}
            {{-- ------------------------------------------------- --}}

            <div class="px-4">


                {{-- ================================================= --}}
                {{-- ESPACE COMPTE                                    --}}
                {{-- ================================================= --}}

                <div
                    class="overflow-hidden rounded-2xl
                           border border-[#EEE5DC]
                           bg-white"
                >

                    @auth

                        {{-- Mon profil --}}
                        <a
                            href="{{ route('profile.edit') }}"
                            class="flex items-center gap-3
                                   px-4 py-3.5
                                   text-sm text-[#3F3834]
                                   transition-colors duration-200
                                   hover:bg-[#FFF7F1]
                                   hover:text-[#E25F12]"
                        >

                            <span
                                class="flex h-9 w-9 items-center
                                       justify-center rounded-xl
                                       bg-[#F8F4EF]
                                       text-[#593114]"
                            >
                                <i class="bi bi-person-circle text-lg"></i>
                            </span>

                            <span class="font-medium">
                                Mon profil
                            </span>

                            <i
                                class="bi bi-chevron-right ml-auto
                                       text-xs text-[#A99B91]"
                            ></i>

                        </a>


                        {{-- Mes commandes --}}
                        <a
                            href="#"
                            class="flex items-center gap-3
                                   border-t border-[#F0E9E3]
                                   px-4 py-3.5
                                   text-sm text-[#3F3834]
                                   transition-colors duration-200
                                   hover:bg-[#FFF7F1]
                                   hover:text-[#E25F12]"
                        >

                            <span
                                class="flex h-9 w-9 items-center
                                       justify-center rounded-xl
                                       bg-[#F8F4EF]
                                       text-[#593114]"
                            >
                                <i class="bi bi-bag-check text-lg"></i>
                            </span>

                            <span class="font-medium">
                                Mes commandes
                            </span>

                            <i
                                class="bi bi-chevron-right ml-auto
                                       text-xs text-[#A99B91]"
                            ></i>

                        </a>

                    @else

                        {{-- Se connecter --}}
                        <a
                            href="{{ route('login') }}"
                            class="flex items-center gap-3
                                   px-4 py-3.5
                                   text-sm text-[#3F3834]
                                   transition-colors duration-200
                                   hover:bg-[#FFF7F1]
                                   hover:text-[#E25F12]"
                        >

                            <span
                                class="flex h-9 w-9 items-center
                                       justify-center rounded-xl
                                       bg-[#F8F4EF]
                                       text-[#593114]"
                            >
                                <i
                                    class="bi bi-box-arrow-in-right text-lg"
                                ></i>
                            </span>

                            <span class="font-medium">
                                Se connecter
                            </span>

                            <i
                                class="bi bi-chevron-right ml-auto
                                       text-xs text-[#A99B91]"
                            ></i>

                        </a>


                        {{-- Créer un compte --}}
                        <a
                            href="{{ route('register') }}"
                            class="flex items-center gap-3
                                   border-t border-[#F0E9E3]
                                   px-4 py-3.5
                                   text-sm text-[#3F3834]
                                   transition-colors duration-200
                                   hover:bg-[#FFF7F1]
                                   hover:text-[#E25F12]"
                        >

                            <span
                                class="flex h-9 w-9 items-center
                                       justify-center rounded-xl
                                       bg-[#F8F4EF]
                                       text-[#593114]"
                            >
                                <i class="bi bi-person-plus text-lg"></i>
                            </span>

                            <span class="font-medium">
                                Créer un compte
                            </span>

                            <i
                                class="bi bi-chevron-right ml-auto
                                       text-xs text-[#A99B91]"
                            ></i>

                        </a>

                    @endauth

                </div>


                {{-- ================================================= --}}
                {{-- NAVIGATION SECONDAIRE                            --}}
                {{-- ================================================= --}}

                <div class="mt-4">

                    <p
                        class="mb-2 px-2 text-[10px]
                               font-bold uppercase tracking-[0.16em]
                               text-[#A99B91]"
                    >
                        Découvrir
                    </p>


                    <div
                        class="overflow-hidden rounded-2xl
                               border border-[#EEE5DC]
                               bg-white"
                    >

                        {{-- À propos --}}
                        <a
                            href="{{ route('about') }}"
                            class="flex items-center gap-3
                                   px-4 py-3.5
                                   text-sm text-[#3F3834]
                                   transition-colors duration-200
                                   hover:bg-[#FFF7F1]
                                   hover:text-[#E25F12]"
                        >

                            <span
                                class="flex h-9 w-9 items-center
                                       justify-center rounded-xl
                                       bg-[#F8F4EF]
                                       text-[#593114]"
                            >
                                <i class="bi bi-info-circle text-lg"></i>
                            </span>

                            <span class="font-medium">
                                À propos
                            </span>

                            <i
                                class="bi bi-chevron-right ml-auto
                                       text-xs text-[#A99B91]"
                            ></i>

                        </a>


                        {{-- Contact --}}
                        <a
                            href="{{ route('contact') }}"
                            class="flex items-center gap-3
                                   border-t border-[#F0E9E3]
                                   px-4 py-3.5
                                   text-sm text-[#3F3834]
                                   transition-colors duration-200
                                   hover:bg-[#FFF7F1]
                                   hover:text-[#E25F12]"
                        >

                            <span
                                class="flex h-9 w-9 items-center
                                       justify-center rounded-xl
                                       bg-[#F8F4EF]
                                       text-[#593114]"
                            >
                                <i class="bi bi-envelope text-lg"></i>
                            </span>

                            <span class="font-medium">
                                Contact
                            </span>

                            <i
                                class="bi bi-chevron-right ml-auto
                                       text-xs text-[#A99B91]"
                            ></i>

                        </a>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- DEVISE                                            --}}
                {{-- ================================================= --}}

                <div
                    class="mt-4 flex items-center
                           justify-between rounded-2xl
                           border border-[#EEE5DC]
                           bg-white px-4 py-3.5"
                >

                    <div class="flex items-center gap-3">

                        <span
                            class="flex h-9 w-9 items-center
                                   justify-center rounded-xl
                                   bg-[#F8F4EF] text-base"
                        >
                            🇨🇮
                        </span>

                        <div>

                            <p
                                class="text-sm font-semibold
                                       text-[#593114]"
                            >
                                Côte d'Ivoire
                            </p>

                            <p
                                class="text-[11px] text-[#9A8D84]"
                            >
                                Devise
                            </p>

                        </div>

                    </div>


                    <span
                        class="rounded-full
                               bg-[#FFF1E7]
                               px-3 py-1.5
                               text-xs font-bold
                               text-[#E25F12]"
                    >
                        FCFA
                    </span>

                </div>


                {{-- ================================================= --}}
                {{-- DÉCONNEXION                                       --}}
                {{-- ================================================= --}}

                @auth

                    <div class="mt-4">

                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="flex w-full items-center
                                       gap-3 rounded-2xl
                                       border border-red-100
                                       bg-red-50/70
                                       px-4 py-3.5
                                       text-left text-sm
                                       font-medium text-red-600
                                       transition-all duration-200
                                       hover:bg-red-50
                                       active:scale-[0.99]"
                            >

                                <span
                                    class="flex h-9 w-9 items-center
                                           justify-center rounded-xl
                                           bg-white text-red-600"
                                >
                                    <i
                                        class="bi bi-box-arrow-right text-lg"
                                    ></i>
                                </span>

                                <span>
                                    Se déconnecter
                                </span>

                            </button>

                        </form>

                    </div>

                @endauth


            </div>


            {{-- ------------------------------------------------- --}}
            {{-- ESPACE BAS                                         --}}
            {{-- ------------------------------------------------- --}}

            <div class="h-2"></div>

        </section>

    </div>



    {{-- ===================================================== --}}
    {{-- HEADER / NAVBAR                                      --}}
    {{-- ===================================================== --}}

    <header
        class="fixed inset-x-0 top-0 z-50
               transition-all duration-500 ease-out"
        :class="scrolled
            ? 'bg-white/95 shadow-[0_8px_30px_rgba(89,49,20,0.08)] backdrop-blur-xl'
            : 'bg-transparent'"
    >

        <nav
            aria-label="Navigation principale"
            class="mx-auto w-full max-w-[1720px]
                   px-[clamp(1.25rem,7vw,7.5rem)]"
        >

            <div
                class="flex h-[68px] items-center
                       justify-between
                       transition-all duration-500
                       sm:h-[72px] lg:h-[76px]"
                :class="scrolled
                    ? 'lg:h-[68px]'
                    : 'lg:h-[76px]'"
            >


                {{-- ================================================= --}}
                {{-- GAUCHE : LOGO                                    --}}
                {{-- ================================================= --}}

                <div
                    class="flex shrink-0 items-center"
                >

                    {{-- ------------------------------------------------- --}}
                    {{-- LOGO MOBILE + DESKTOP                             --}}
                    {{-- ------------------------------------------------- --}}

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
                            class="h-7 w-auto
                                   transition-transform duration-300
                                   group-hover:scale-[1.02]
                                   sm:h-7"
                        >

                    </a>

                </div>



                {{-- ================================================= --}}
                {{-- CENTRE : NAVIGATION DESKTOP                      --}}
                {{-- ================================================= --}}

                <div class="hidden lg:flex">

                    <div
                        class="flex items-center
                               gap-8 xl:gap-10"
                    >

                        {{-- ------------------------------------------------- --}}
                        {{-- ACCUEIL                                            --}}
                        {{-- ------------------------------------------------- --}}

                        <a
                            href="{{ route('home') }}"
                            class="relative py-2 text-[13px]
                                   font-medium
                                   transition-colors duration-200
                                   {{ request()->routeIs('home')
                                       ? 'text-[#e25f12]'
                                       : 'text-[#3F3834] hover:text-[#e25f12]' }}"
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


                        {{-- ------------------------------------------------- --}}
                        {{-- NOS PLATS                                          --}}
                        {{-- ------------------------------------------------- --}}

                        <a
                            href="{{ route('plats.index') }}"
                            class="relative py-2 text-[13px]
                                   font-medium
                                   transition-colors duration-200
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


                        {{-- ------------------------------------------------- --}}
                        {{-- CATÉGORIES                                        --}}
                        {{-- ------------------------------------------------- --}}

                        <a
                            href="{{ route('categories.index') }}"
                            class="relative py-2 text-[13px]
                                   font-medium
                                   transition-colors duration-200
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


                        {{-- ------------------------------------------------- --}}
                        {{-- À PROPOS                                           --}}
                        {{-- ------------------------------------------------- --}}

                        <a
                            href="{{ route('about') }}"
                            class="relative py-2 text-[13px]
                                   font-medium
                                   transition-colors duration-200
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


                        {{-- ------------------------------------------------- --}}
                        {{-- CONTACT                                            --}}
                        {{-- ------------------------------------------------- --}}

                        <a
                            href="{{ route('contact') }}"
                            class="relative py-2 text-[13px]
                                   font-medium
                                   transition-colors duration-200
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
                {{-- DROITE : ACTIONS DESKTOP                         --}}
                {{-- ================================================= --}}

                <div
                    class="flex shrink-0 items-center
                           gap-2 sm:gap-3"
                >


                    {{-- ================================================= --}}
                    {{-- COMPTE DESKTOP                                   --}}
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
                            :aria-expanded="open"
                        >

                            <i class="bi bi-person text-[17px]"></i>

                        </button>


                        {{-- ------------------------------------------------- --}}
                        {{-- DROPDOWN COMPTE                                   --}}
                        {{-- ------------------------------------------------- --}}

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
                                   bg-white
                                   shadow-[0_20px_50px_rgba(89,49,20,0.12)]"
                        >

                            {{-- Header compte --}}
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
                                        <i
                                            class="bi bi-person text-xl"
                                        ></i>
                                    </div>

                                    <div>

                                        <p
                                            class="text-sm font-semibold
                                                   text-[#593114]"
                                        >
                                            Mon compte
                                        </p>

                                        <p
                                            class="text-xs text-gray-500"
                                        >
                                            Gérez votre espace personnel
                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- Liens --}}
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
                                        <i
                                            class="bi bi-person-circle text-lg"
                                        ></i>

                                        <span>
                                            Mon profil
                                        </span>

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
                                        <i
                                            class="bi bi-bag-check text-lg"
                                        ></i>

                                        <span>
                                            Mes commandes
                                        </span>

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

                                        <i
                                            class="bi bi-box-arrow-in-right text-lg"
                                        ></i>

                                        <span>
                                            Se connecter
                                        </span>

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

                                        <i
                                            class="bi bi-person-plus text-lg"
                                        ></i>

                                        <span>
                                            Créer un compte
                                        </span>

                                    </a>

                                @endguest

                            </div>


                            {{-- Déconnexion --}}
                            @auth

                                <div
                                    class="border-t border-[#F0E9E3] p-2"
                                >

                                    <form
                                        method="POST"
                                        action="{{ route('logout') }}"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="flex w-full items-center
                                                   gap-3 rounded-xl
                                                   px-3 py-2.5
                                                   text-left text-sm
                                                   text-red-600
                                                   transition
                                                   hover:bg-red-50"
                                        >

                                            <i
                                                class="bi bi-box-arrow-right text-lg"
                                            ></i>

                                            <span>
                                                Se déconnecter
                                            </span>

                                        </button>

                                    </form>

                                </div>

                            @endauth

                        </div>

                    </div>



                    {{-- ================================================= --}}
                    {{-- PANIER DESKTOP                                   --}}
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
                        class="hidden lg:block"
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
                                x-text="cartCount"
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
                    {{-- CTA PRINCIPAL DESKTOP                           --}}
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
                               lg:flex"
                    >
                        Commander
                    </a>

                </div>

            </div>

        </nav>

    </header>



    {{-- ===================================================== --}}
    {{-- MOBILE BOTTOM NAVIGATION                             --}}
    {{-- ===================================================== --}}

    <div
        class="fixed inset-x-3 bottom-3 z-[90] lg:hidden"
    >

        <nav
            aria-label="Navigation mobile"
            class="mx-auto flex max-w-md items-center
                   rounded-[1.7rem]
                   border border-[#E8DDD4]
                   bg-white/90
                   px-2 py-2
                   shadow-[0_18px_50px_rgba(89,49,20,0.16)]
                   backdrop-blur-xl
                   pb-[calc(0.5rem+env(safe-area-inset-bottom))]"
        >


            {{-- ================================================= --}}
            {{-- ACCUEIL                                           --}}
            {{-- ================================================= --}}

            @php
                $mobileHomeActive = request()->routeIs('home');
            @endphp

            <a
                href="{{ route('home') }}"
                class="group relative flex min-w-0
                       flex-1 flex-col items-center
                       justify-center gap-1
                       rounded-2xl px-1 py-2
                       text-[10px] font-semibold
                       transition-all duration-300 ease-out
                       {{ $mobileHomeActive
                           ? 'text-[#E25F12]'
                           : 'text-[#857970] hover:text-[#593114]' }}"
            >

                <span
                    class="relative flex h-8 w-8
                           items-center justify-center
                           rounded-xl
                           transition-all duration-300
                           {{ $mobileHomeActive
                               ? 'scale-100 bg-[#FFF1E7]'
                               : 'bg-transparent group-hover:bg-[#FFF7F1]' }}"
                >

                    <i
                        class="text-[18px]
                               {{ $mobileHomeActive
                                   ? 'bi bi-house-fill'
                                   : 'bi bi-house' }}"
                    ></i>


                    @if($mobileHomeActive)

                        <span
                            class="absolute -bottom-1
                                   h-1 w-1 rounded-full
                                   bg-[#E25F12]"
                        ></span>

                    @endif

                </span>


                <span>
                    Accueil
                </span>

            </a>



            {{-- ================================================= --}}
            {{-- NOS PLATS                                         --}}
            {{-- ================================================= --}}

            @php
                $mobilePlatsActive = request()->routeIs('plats.*');
            @endphp

            <a
                href="{{ route('plats.index') }}"
                class="group relative flex min-w-0
                       flex-1 flex-col items-center
                       justify-center gap-1
                       rounded-2xl px-1 py-2
                       text-[10px] font-semibold
                       transition-all duration-300 ease-out
                       {{ $mobilePlatsActive
                           ? 'text-[#E25F12]'
                           : 'text-[#857970] hover:text-[#593114]' }}"
            >

                <span
                    class="relative flex h-8 w-8
                           items-center justify-center
                           rounded-xl
                           transition-all duration-300
                           {{ $mobilePlatsActive
                               ? 'scale-100 bg-[#FFF1E7]'
                               : 'bg-transparent group-hover:bg-[#FFF7F1]' }}"
                >

                    <i
                        class="text-[18px]
                               {{ $mobilePlatsActive
                                   ? 'bi bi-egg-fried'
                                   : 'bi bi-egg-fried' }}"
                    ></i>


                    @if($mobilePlatsActive)

                        <span
                            class="absolute -bottom-1
                                   h-1 w-1 rounded-full
                                   bg-[#E25F12]"
                        ></span>

                    @endif

                </span>


                <span>
                    Plats
                </span>

            </a>



            {{-- ================================================= --}}
            {{-- CATÉGORIES                                       --}}
            {{-- ================================================= --}}

            @php
                $mobileCategoriesActive =
                    request()->routeIs('categories.*');
            @endphp

            <a
                href="{{ route('categories.index') }}"
                class="group relative flex min-w-0
                       flex-1 flex-col items-center
                       justify-center gap-1
                       rounded-2xl px-1 py-2
                       text-[10px] font-semibold
                       transition-all duration-300 ease-out
                       {{ $mobileCategoriesActive
                           ? 'text-[#E25F12]'
                           : 'text-[#857970] hover:text-[#593114]' }}"
            >

                <span
                    class="relative flex h-8 w-8
                           items-center justify-center
                           rounded-xl
                           transition-all duration-300
                           {{ $mobileCategoriesActive
                               ? 'scale-100 bg-[#FFF1E7]'
                               : 'bg-transparent group-hover:bg-[#FFF7F1]' }}"
                >

                    <i class="bi bi-grid text-[18px]"></i>


                    @if($mobileCategoriesActive)

                        <span
                            class="absolute -bottom-1
                                   h-1 w-1 rounded-full
                                   bg-[#E25F12]"
                        ></span>

                    @endif

                </span>


                <span>
                    Catégories
                </span>

            </a>



            {{-- ================================================= --}}
            {{-- PANIER                                            --}}
            {{-- ================================================= --}}

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
                class="flex min-w-0 flex-1"
            >

                <a
                    href="{{ route('cart.index') }}"
                    class="group relative flex w-full
                           flex-col items-center
                           justify-center gap-1
                           rounded-2xl px-1 py-2
                           text-[10px] font-semibold
                           text-[#857970]
                           transition-all duration-300 ease-out
                           hover:text-[#593114]"
                >

                    <span
                        class="relative flex h-8 w-8
                               items-center justify-center
                               rounded-xl
                               transition-all duration-300
                               group-hover:bg-[#FFF7F1]"
                    >

                        <i
                            class="bi bi-basket2 text-[18px]
                                   transition-transform duration-300
                                   group-hover:scale-110"
                        ></i>


                        {{-- Badge dynamique --}}
                        <span
                            x-show="cartCount > 0"
                            x-cloak
                            x-text="cartCount"
                            class="absolute -right-1 -top-1
                                   flex h-[17px] min-w-[17px]
                                   items-center justify-center
                                   rounded-full
                                   bg-[#E25F12]
                                   px-1
                                   text-[8px] font-bold
                                   leading-none text-white
                                   ring-2 ring-white"
                        ></span>

                    </span>


                    <span>
                        Panier
                    </span>

                </a>

            </div>



            {{-- ================================================= --}}
            {{-- COMPTE                                            --}}
            {{-- ================================================= --}}

            <button
                type="button"
                @click="mobileAccountOpen = true"
                class="group relative flex min-w-0
                       flex-1 flex-col items-center
                       justify-center gap-1
                       rounded-2xl px-1 py-2
                       text-[10px] font-semibold
                       text-[#857970]
                       transition-all duration-300 ease-out
                       hover:text-[#593114]"
                :aria-expanded="mobileAccountOpen"
                aria-label="Ouvrir mon compte"
            >

                <span
                    class="flex h-8 w-8 items-center
                           justify-center rounded-xl
                           transition-all duration-300
                           group-hover:bg-[#FFF7F1]"
                >

                    <i
                        class="bi bi-person text-[18px]
                               transition-transform duration-300
                               group-hover:scale-110"
                    ></i>

                </span>


                <span>
                    Compte
                </span>

            </button>

        </nav>

    </div>



    {{-- ===================================================== --}}
    {{-- ESPACE BAS POUR ÉVITER QUE LE CONTENU SOIT CACHÉ    --}}
    {{-- PAR LA BOTTOM NAVIGATION                             --}}
    {{-- ===================================================== --}}

    <div
        class="h-[100px] lg:hidden"
        aria-hidden="true"
    ></div>

</div>



{{-- ========================================================= --}}
{{-- ALPINE CLOAK                                             --}}
{{-- ========================================================= --}}

<style>
    [x-cloak] {
        display: none !important;
    }
</style>



{{-- ========================================================= --}}
{{-- ALPINE NAVBAR                                            --}}
{{-- ========================================================= --}}

<script>
    function fonKpaNavbar() {

        return {

            /*
             * ----------------------------------------------------
             * État du scroll desktop
             * ----------------------------------------------------
             */
            scrolled: false,


            /*
             * ----------------------------------------------------
             * État du menu compte mobile
             * ----------------------------------------------------
             */
            mobileAccountOpen: false,


            /*
             * ----------------------------------------------------
             * Initialisation
             * ----------------------------------------------------
             */
            init() {

                this.handleScroll();


                /*
                 * Écoute du scroll.
                 *
                 * passive:true permet au navigateur de gérer
                 * le scroll sans bloquer l'interface.
                 */
                window.addEventListener(
                    'scroll',
                    () => this.handleScroll(),
                    { passive: true }
                );


                /*
                 * Fermeture du sheet mobile avec Escape.
                 */
                window.addEventListener(
                    'keydown',
                    (event) => {

                        if (
                            event.key === 'Escape' &&
                            this.mobileAccountOpen
                        ) {

                            this.mobileAccountOpen = false;

                        }

                    }
                );

            },


            /*
             * ----------------------------------------------------
             * Gestion du scroll
             * ----------------------------------------------------
             */
            handleScroll() {

                this.scrolled =
                    window.scrollY > 20;

            }

        };

    }
</script>