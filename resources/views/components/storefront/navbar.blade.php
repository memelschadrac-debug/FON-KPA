<!-- ========================================================= -->
<!-- FON-KPA NAVBAR                                            -->
<!-- ========================================================= -->

<!-- Bootstrap Icons -->
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

<div class="bg-white">

    <!-- ========================================================= -->
    <!-- MOBILE MENU                                               -->
    <!-- ========================================================= -->

    <el-dialog>

        <dialog
            id="mobile-menu"
            class="backdrop:bg-transparent lg:hidden"
        >

            <!-- Backdrop -->
            <el-dialog-backdrop
                class="fixed inset-0 bg-black/30 opacity-100 backdrop-blur-[1px]
                       transition-all duration-300 ease-out
                       data-closed:opacity-0 data-closed:backdrop-blur-0"
            ></el-dialog-backdrop>


            <div
                tabindex="0"
                class="fixed inset-0 flex focus:outline-none"
            >

                <!-- ================================================= -->
                <!-- PANNEAU MOBILE                                     -->
                <!-- ================================================= -->

                <el-dialog-panel
                    class="relative flex w-full max-w-xs transform flex-col
                           overflow-y-auto bg-white pb-12 shadow-2xl
                           transition-all duration-300 ease-out
                           data-closed:-translate-x-full data-closed:opacity-0
                           lg:max-w-sm"
                >

                    <!-- ================================================= -->
                    <!-- HEADER MOBILE                                      -->
                    <!-- ================================================= -->

                    <div class="flex items-center justify-between px-4 pt-5 pb-3">

                        <!-- Logo -->
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


                        <!-- Fermer -->
                        <button
                            type="button"
                            command="close"
                            commandfor="mobile-menu"
                            class="relative flex h-10 w-10 items-center justify-center rounded-full
                                   text-gray-400 transition-all duration-200
                                   hover:bg-gray-100 hover:text-[#e25f12]
                                   active:scale-90"
                        >

                            <span class="absolute -inset-0.5"></span>

                            <span class="sr-only">
                                Fermer le menu
                            </span>

                            <i class="bi bi-x-lg text-xl"></i>

                        </button>

                    </div>


                    <!-- Petite séparation -->
                    <div class="mx-4 border-b border-gray-100"></div>


                    <!-- ================================================= -->
                    <!-- NAVIGATION MOBILE                                 -->
                    <!-- ================================================= -->

                    <div class="mt-3 px-4">

                        <div class="space-y-1">


                            <!-- Accueil -->
                            <a
                                href="{{ route('home') }}"
                                class="group flex items-center gap-3 rounded-xl px-3 py-3
                                       text-base font-medium transition-all duration-200
                                       {{ request()->routeIs('home')
                                           ? 'bg-orange-50 text-[#e25f12]'
                                           : 'text-gray-900 hover:bg-gray-50 hover:text-[#e25f12]' }}"
                            >

                                <span
                                    class="flex h-9 w-9 items-center justify-center rounded-lg
                                           transition-colors
                                           {{ request()->routeIs('home')
                                               ? 'bg-white text-[#e25f12]'
                                               : 'bg-gray-50 text-gray-500 group-hover:text-[#e25f12]' }}"
                                >
                                    <i class="bi bi-house text-lg"></i>
                                </span>

                                <span>
                                    Accueil
                                </span>

                            </a>


                            <!-- Nos plats -->
                            <a
                                href="{{ route('plats.index') }}"
                                class="group flex items-center gap-3 rounded-xl px-3 py-3
                                       text-base font-medium transition-all duration-200
                                       {{ request()->routeIs('plats.*')
                                           ? 'bg-orange-50 text-[#e25f12]'
                                           : 'text-gray-900 hover:bg-gray-50 hover:text-[#e25f12]' }}"
                            >

                                <span
                                    class="flex h-9 w-9 items-center justify-center rounded-lg
                                           bg-gray-50 text-gray-500
                                           transition-colors group-hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-egg-fried text-lg"></i>
                                </span>

                                <span>
                                    Nos plats
                                </span>

                            </a>


                            <!-- Catégories -->
                            <a
                                href="{{ route('categories.index') }}"
                                class="group flex items-center gap-3 rounded-xl px-3 py-3
                                       text-base font-medium transition-all duration-200
                                       {{ request()->routeIs('categories.*')
                                           ? 'bg-orange-50 text-[#e25f12]'
                                           : 'text-gray-900 hover:bg-gray-50 hover:text-[#e25f12]' }}"
                            >

                                <span
                                    class="flex h-9 w-9 items-center justify-center rounded-lg
                                           bg-gray-50 text-gray-500
                                           transition-colors group-hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-grid text-lg"></i>
                                </span>

                                <span>
                                    Catégories
                                </span>

                            </a>


                            <!-- À propos -->
                            <a
                                href="{{ route('about') }}"
                                class="group flex items-center gap-3 rounded-xl px-3 py-3
                                       text-base font-medium transition-all duration-200
                                       {{ request()->routeIs('about')
                                           ? 'bg-orange-50 text-[#e25f12]'
                                           : 'text-gray-900 hover:bg-gray-50 hover:text-[#e25f12]' }}"
                            >

                                <span
                                    class="flex h-9 w-9 items-center justify-center rounded-lg
                                           bg-gray-50 text-gray-500
                                           transition-colors group-hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-info-circle text-lg"></i>
                                </span>

                                <span>
                                    À propos
                                </span>

                            </a>


                            <!-- Contact -->
                            <a
                                href="{{ route('contact') }}"
                                class="group flex items-center gap-3 rounded-xl px-3 py-3
                                       text-base font-medium transition-all duration-200
                                       {{ request()->routeIs('contact')
                                           ? 'bg-orange-50 text-[#e25f12]'
                                           : 'text-gray-900 hover:bg-gray-50 hover:text-[#e25f12]' }}"
                            >

                                <span
                                    class="flex h-9 w-9 items-center justify-center rounded-lg
                                           bg-gray-50 text-gray-500
                                           transition-colors group-hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-envelope text-lg"></i>
                                </span>

                                <span>
                                    Contact
                                </span>

                            </a>

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- COMPTE MOBILE                                     -->
                    <!-- ================================================= -->

                    <div
                        x-data="{ open: false }"
                        class="mt-5 border-t border-gray-200 px-4 pt-5"
                    >

                        <button
                            type="button"
                            @click="open = !open"
                            class="flex w-full items-center justify-between rounded-xl
                                   px-3 py-3 text-gray-900 transition-all duration-200
                                   hover:bg-gray-50 active:scale-[0.99]"
                        >

                            <span class="flex items-center gap-3">

                                <span
                                    class="flex h-9 w-9 items-center justify-center
                                           rounded-lg bg-orange-50 text-[#e25f12]"
                                >
                                    <i class="bi bi-person text-lg"></i>
                                </span>

                                <span class="text-sm font-semibold">
                                    Mon compte
                                </span>

                            </span>


                            <i
                                class="bi bi-chevron-down text-sm transition-transform duration-300"
                                :class="open ? 'rotate-180' : ''"
                            ></i>

                        </button>


                        <!-- Sous-menu -->
                        <div
                            x-show="open"
                            x-cloak
                            x-transition:enter="transition ease-out duration-250"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            class="mt-2 space-y-1 overflow-hidden"
                        >

                            @auth

                                <!-- Mon profil -->
                                <a
                                    href="{{ route('profile.edit') }}"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2.5
                                           text-sm text-gray-700 transition hover:bg-orange-50
                                           hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-person-circle text-lg"></i>
                                    Mon profil
                                </a>


                                <!-- Mes commandes -->
                                <a
                                    href="#"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2.5
                                           text-sm text-gray-700 transition hover:bg-orange-50
                                           hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-bag-check text-lg"></i>
                                    Mes commandes
                                </a>

                            @endauth


                            @guest

                                <!-- Se connecter -->
                                <a
                                    href="{{ route('login') }}"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2.5
                                           text-sm text-gray-700 transition hover:bg-orange-50
                                           hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-box-arrow-in-right text-lg"></i>
                                    Se connecter
                                </a>


                                <!-- Créer un compte -->
                                <a
                                    href="{{ route('register') }}"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2.5
                                           text-sm text-gray-700 transition hover:bg-orange-50
                                           hover:text-[#e25f12]"
                                >
                                    <i class="bi bi-person-plus text-lg"></i>
                                    Créer un compte
                                </a>

                            @endguest


                            @auth

                                <!-- Se déconnecter -->
                                <div class="border-t border-gray-100 pt-1">

                                    <form
                                        method="POST"
                                        action="{{ route('logout') }}"
                                    >
                                        @csrf

                                        <button
                                            type="submit"
                                            class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5
                                                   text-left text-sm text-red-600 transition
                                                   hover:bg-red-50"
                                        >
                                            <i class="bi bi-box-arrow-right text-lg"></i>
                                            Se déconnecter
                                        </button>

                                    </form>

                                </div>

                            @endauth

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- DEVISE MOBILE                                     -->
                    <!-- ================================================= -->

                    <div class="mt-5 border-t border-gray-200 px-4 pt-5">

                        <a
                            href="#"
                            class="flex items-center gap-3 rounded-xl px-3 py-3
                                   text-gray-900 transition hover:bg-gray-50
                                   hover:text-[#e25f12]"
                        >

                            <img
                                src="https://flagcdn.io/flags/4x3/ci.svg"
                                alt="Côte d'Ivoire"
                                class="w-5"
                            >

                            <span class="text-sm font-medium">
                                FCFA
                            </span>

                        </a>

                    </div>

                </el-dialog-panel>

            </div>

        </dialog>

    </el-dialog>


    <!-- ========================================================= -->
    <!-- HEADER                                                     -->
    <!-- ========================================================= -->

    <header class="sticky top-0 z-50 bg-white">


        <!-- ===================================================== -->
        <!-- BANDEAU PROMOTIONNEL                                  -->
        <!-- ===================================================== -->

        <div
            x-data="{
                messages: [
                    {
                        text: 'Livraison gratuite dès 10 000 FCFA',
                        icon: '🎉',
                        confetti: true
                    },
                    {
                        text: 'Paiement sécurisé',
                        icon: '🔒',
                        confetti: false
                    },
                    {
                        text: 'Des plats ivoiriens authentiques',
                        icon: '🍲',
                        confetti: false
                    },
                    {
                        text: 'Livraison rapide à Abidjan',
                        icon: '⚡',
                        confetti: false
                    },
                    {
                        text: 'Profitez de nos offres du moment',
                        icon: '🎁',
                        confetti: false
                    },
                    {
                        text: 'Préparé avec soin et passion',
                        icon: '❤️',
                        confetti: false
                    }
                ],

                current: 0,
                showPromo: true,

                nextMessage() {
                    this.showPromo = false;

                    setTimeout(() => {
                        this.current =
                            (this.current + 1) % this.messages.length;

                        this.showPromo = true;
                    }, 500);
                }
            }"
            x-init="
                setInterval(() => {
                    nextMessage();
                }, 5000);
            "
            class="flex h-10 items-center justify-center gap-2 bg-[#593114]
                   px-4 text-sm font-medium text-white sm:px-6 lg:px-8"
        >

            <!-- Icône -->
            <span
                x-show="showPromo"
                x-transition:enter="transition ease-out duration-700 delay-100"
                x-transition:enter-start="opacity-0 scale-50 -translate-y-3"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-75"
                x-text="messages[current].icon"
                class="shrink-0 text-base"
            ></span>


            <!-- Texte -->
            <span
                x-show="showPromo"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 scale-75 -translate-y-3"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-90 translate-y-2"
                x-text="messages[current].text"
                class="inline-block text-center"
            ></span>

        </div>


        <!-- ===================================================== -->
        <!-- NAVBAR                                                -->
        <!-- ===================================================== -->

        <nav
            aria-label="Navigation principale"
            class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"
        >

            <div
                class="grid h-16 grid-cols-2 items-center border-b border-gray-200
                       lg:grid-cols-3"
            >


                <!-- ================================================= -->
                <!-- GAUCHE : MOBILE + LOGO                            -->
                <!-- ================================================= -->

                <div class="flex min-w-0 items-center justify-start">

                    <!-- Menu mobile -->
                    <button
                        type="button"
                        command="show-modal"
                        commandfor="mobile-menu"
                        class="relative mr-3 flex h-10 w-10 shrink-0 items-center
                               justify-center rounded-lg text-gray-500
                               transition-all duration-200
                               hover:bg-gray-100 hover:text-[#e25f12]
                               active:scale-90 lg:hidden"
                    >

                        <span class="absolute -inset-0.5"></span>

                        <span class="sr-only">
                            Ouvrir le menu
                        </span>

                        <i class="bi bi-list text-2xl"></i>

                    </button>


                    <!-- Logo -->
                    <a
                        href="{{ route('home') }}"
                        class="flex min-w-0 items-center"
                    >

                        <span class="sr-only">
                            FON-KPA
                        </span>

                        <img
                            src="{{ asset('images/FON-KPA LOGO1.png') }}"
                            alt="FON-KPA"
                            class="h-4 w-auto sm:h-6"
                        >

                    </a>

                </div>


                <!-- ================================================= -->
                <!-- CENTRE : NAVIGATION                               -->
                <!-- ================================================= -->

                <div class="hidden min-w-0 lg:block">

                    <div
                        class="flex h-16 items-center justify-center
                               gap-5 xl:gap-8 2xl:gap-10"
                    >


                        <!-- Accueil -->
                        <a
                            href="{{ route('home') }}"
                            class="relative flex h-16 shrink-0 items-center text-sm font-medium
                                   transition-colors duration-200
                                   {{ request()->routeIs('home')
                                       ? 'text-[#e25f12]'
                                       : 'text-gray-700 hover:text-[#e25f12]' }}"
                        >

                            Accueil

                            @if(request()->routeIs('home'))
                                <span
                                    class="absolute bottom-0 left-1/2 h-0.5 w-6
                                           -translate-x-1/2 rounded-full bg-[#e25f12]"
                                ></span>
                            @endif

                        </a>


                        <!-- Nos plats -->
                        <a
                            href="{{ route('plats.index') }}"
                            class="relative flex h-16 shrink-0 items-center text-sm font-medium
                                   transition-colors duration-200
                                   {{ request()->routeIs('plats.*')
                                       ? 'text-[#e25f12]'
                                       : 'text-gray-700 hover:text-[#e25f12]' }}"
                        >

                            Nos plats

                            @if(request()->routeIs('plats.*'))
                                <span
                                    class="absolute bottom-0 left-1/2 h-0.5 w-6
                                           -translate-x-1/2 rounded-full bg-[#e25f12]"
                                ></span>
                            @endif

                        </a>


                        <!-- Catégories -->
                        <a
                            href="{{ route('categories.index') }}"
                            class="relative flex h-16 shrink-0 items-center text-sm font-medium
                                   transition-colors duration-200
                                   {{ request()->routeIs('categories.*')
                                       ? 'text-[#e25f12]'
                                       : 'text-gray-700 hover:text-[#e25f12]' }}"
                        >

                            Catégories

                            @if(request()->routeIs('categories.*'))
                                <span
                                    class="absolute bottom-0 left-1/2 h-0.5 w-6
                                           -translate-x-1/2 rounded-full bg-[#e25f12]"
                                ></span>
                            @endif

                        </a>


                        <!-- À propos -->
                        <a
                            href="{{ route('about') }}"
                            class="relative flex h-16 shrink-0 items-center text-sm font-medium
                                   transition-colors duration-200
                                   {{ request()->routeIs('about')
                                       ? 'text-[#e25f12]'
                                       : 'text-gray-700 hover:text-[#e25f12]' }}"
                        >

                            À propos

                            @if(request()->routeIs('about'))
                                <span
                                    class="absolute bottom-0 left-1/2 h-0.5 w-6
                                           -translate-x-1/2 rounded-full bg-[#e25f12]"
                                ></span>
                            @endif

                        </a>


                        <!-- Contact -->
                        <a
                            href="{{ route('contact') }}"
                            class="relative flex h-16 shrink-0 items-center text-sm font-medium
                                   transition-colors duration-200
                                   {{ request()->routeIs('contact')
                                       ? 'text-[#e25f12]'
                                       : 'text-gray-700 hover:text-[#e25f12]' }}"
                        >

                            Contact

                            @if(request()->routeIs('contact'))
                                <span
                                    class="absolute bottom-0 left-1/2 h-0.5 w-6
                                           -translate-x-1/2 rounded-full bg-[#e25f12]"
                                ></span>
                            @endif

                        </a>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- DROITE                                             -->
                <!-- ================================================= -->

                <div class="flex min-w-0 items-center justify-end">


                    <!-- ================================================= -->
                    <!-- COMPTE UTILISATEUR                              -->
                    <!-- ================================================= -->

                    <div
                        x-data="{ open: false }"
                        class="relative hidden lg:block"
                    >

                        <button
                            type="button"
                            @click="open = !open"
                            @click.outside="open = false"
                            class="group flex items-center gap-2 rounded-lg px-2 py-2
                                   text-gray-700 transition hover:bg-gray-50
                                   hover:text-[#e25f12]"
                        >

                            <span
                                class="flex h-9 w-9 items-center justify-center
                                       rounded-full border border-gray-200 bg-white
                                       transition group-hover:border-orange-200
                                       group-hover:bg-orange-50"
                            >
                                <i class="bi bi-person text-lg"></i>
                            </span>

                            <span class="hidden text-sm font-medium xl:block">
                                Mon compte
                            </span>

                            <i
                                class="bi bi-chevron-down text-xs transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''"
                            ></i>

                        </button>


                        <!-- ================================================= -->
                        <!-- SOUS-MENU COMPTE                                  -->
                        <!-- ================================================= -->

                        <div
                            x-show="open"
                            x-cloak
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                            class="absolute right-0 z-50 mt-3 w-64 origin-top-right
                                   overflow-hidden rounded-xl border border-gray-100
                                   bg-white shadow-xl ring-1 ring-black/5"
                        >

                            <!-- En-tête -->
                            <div class="border-b border-gray-100 bg-gray-50 px-4 py-4">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10 items-center justify-center
                                               rounded-full bg-orange-100 text-[#e25f12]"
                                    >
                                        <i class="bi bi-person text-xl"></i>
                                    </div>

                                    <div>

                                        <p class="text-sm font-semibold text-gray-900">
                                            Mon compte
                                        </p>

                                        <p class="text-xs text-gray-500">
                                            Gérez votre espace personnel
                                        </p>

                                    </div>

                                </div>

                            </div>


                            <!-- Liens -->
                            <div class="p-2">

                                @auth

                                    <!-- Mon profil -->
                                    <a
                                        href="{{ route('profile.edit') }}"
                                        class="flex items-center gap-3 rounded-lg px-3 py-2.5
                                               text-sm text-gray-700 transition
                                               hover:bg-orange-50 hover:text-[#e25f12]"
                                    >
                                        <i class="bi bi-person-circle text-lg"></i>
                                        <span>Mon profil</span>
                                    </a>


                                    <!-- Mes commandes -->
                                    <a
                                        href="#"
                                        class="flex items-center gap-3 rounded-lg px-3 py-2.5
                                               text-sm text-gray-700 transition
                                               hover:bg-orange-50 hover:text-[#e25f12]"
                                    >
                                        <i class="bi bi-bag-check text-lg"></i>
                                        <span>Mes commandes</span>
                                    </a>

                                @endauth


                                @guest

                                    <!-- Se connecter -->
                                    <a
                                        href="{{ route('login') }}"
                                        class="flex items-center gap-3 rounded-lg px-3 py-2.5
                                               text-sm text-gray-700 transition
                                               hover:bg-orange-50 hover:text-[#e25f12]"
                                    >
                                        <i class="bi bi-box-arrow-in-right text-lg"></i>
                                        <span>Se connecter</span>
                                    </a>


                                    <!-- Créer un compte -->
                                    <a
                                        href="{{ route('register') }}"
                                        class="flex items-center gap-3 rounded-lg px-3 py-2.5
                                               text-sm text-gray-700 transition
                                               hover:bg-orange-50 hover:text-[#e25f12]"
                                    >
                                        <i class="bi bi-person-plus text-lg"></i>
                                        <span>Créer un compte</span>
                                    </a>

                                @endguest

                            </div>


                            @auth

                                <!-- Déconnexion -->
                                <div class="border-t border-gray-100 p-2">

                                    <form
                                        method="POST"
                                        action="{{ route('logout') }}"
                                    >
                                        @csrf

                                        <button
                                            type="submit"
                                            class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5
                                                   text-left text-sm text-red-600 transition
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


                    <!-- Séparateur -->
                    <div
                        class="mx-3 hidden h-6 w-px bg-gray-200 lg:block"
                    ></div>


                    <!-- ================================================= -->
                    <!-- DEVISE                                             -->
                    <!-- ================================================= -->

                    <div class="hidden lg:flex">

                        <a
                            href="#"
                            class="group flex items-center gap-2 rounded-lg px-2 py-2
                                   text-gray-700 transition-all duration-200
                                   hover:bg-gray-50 hover:text-[#e25f12]"
                            aria-label="Changer la devise"
                        >

                            <img
                                src="https://flagcdn.io/flags/4x3/ci.svg"
                                alt="Côte d'Ivoire"
                                class="w-5 transition-transform duration-200
                                       group-hover:scale-105"
                            >

                            <span class="text-sm font-medium">
                                FCFA
                            </span>

                            <i class="bi bi-chevron-down text-[10px]"></i>

                        </a>

                    </div>


                    <!-- ================================================= -->
                    <!-- SÉPARATEUR                                        -->
                    <!-- ================================================= -->

                    <div
                        class="mx-2 hidden h-6 w-px bg-gray-200 lg:block"
                    ></div>


                    <!-- ================================================= -->
                    <!-- RECHERCHE                                          -->
                    <!-- ================================================= -->

                    <a
                        href="#"
                        class="group flex h-10 w-10 items-center justify-center
                               rounded-full text-gray-500 transition-all duration-200
                               hover:bg-orange-50 hover:text-[#e25f12]"
                        aria-label="Rechercher"
                    >

                        <i
                            class="bi bi-search text-lg transition-transform
                                   duration-200 group-hover:scale-105"
                        ></i>

                    </a>


                    <!-- ================================================= -->
                    <!-- PANIER UNIQUE                                      -->
                    <!-- ================================================= -->

                    @php
                        $cartCount = collect(session('cart', []))->sum('quantity');
                    @endphp

                    <div
                        x-data="{
                            cartCount: {{ $cartCount }}
                        }"
                        x-init="
                            window.addEventListener(
                                'fonkpa-cart-updated',
                                (event) => {
                                    cartCount = Number(event.detail.count || 0);
                                }
                            );
                        "
                    >

                        <a
                            href="{{ route('cart.index') }}"
                            class="group relative ml-1 flex h-10 w-10 items-center justify-center
                                   rounded-full text-gray-500 transition-all duration-200
                                   hover:bg-orange-50 hover:text-[#e25f12]"
                            aria-label="Voir le panier"
                        >

                            <i
                                class="bi bi-cart3 text-xl transition-transform
                                       duration-200 group-hover:scale-105"
                            ></i>


                            <!-- ================================================= -->
                            <!-- BADGE PANIER                                      -->
                            <!-- Toujours visible, même avec 0 article            -->
                            <!-- ================================================= -->

                            <span
                                x-text="cartCount"
                                class="absolute -right-0.5 -top-0.5 flex h-5 min-w-5
                                       items-center justify-center rounded-full
                                       bg-[#e25f12] px-1 text-[10px] font-bold
                                       leading-none text-white ring-2 ring-white"
                            ></span>


                            <span
                                class="sr-only"
                                x-text="
                                    cartCount +
                                    ' article' +
                                    (cartCount > 1 ? 's' : '') +
                                    ' dans le panier'
                                "
                            ></span>

                        </a>

                    </div>

                </div>

            </div>

        </nav>

    </header>

</div>


<!-- ========================================================= -->
<!-- ALPINE CLOAK                                              -->
<!-- ========================================================= -->

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
