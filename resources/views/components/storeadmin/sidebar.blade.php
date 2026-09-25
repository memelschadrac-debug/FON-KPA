@php
    /*
    |--------------------------------------------------------------------------
    | ÉTATS DES MENUS
    |--------------------------------------------------------------------------
    | On centralise les états actifs afin d'avoir exactement le même
    | comportement sur desktop et mobile.
    */

    $dashboardActive = request()->routeIs('admin.dashboard');

    $catalogueActive =
        request()->routeIs('admin.products.*') ||
        request()->routeIs('admin.categories.*') ||
        request()->routeIs('admin.media.*') ||
        request()->routeIs('admin.option-groups.*') ||
        request()->routeIs('admin.option-choices.*');

    $productsActive = request()->routeIs('admin.products.*');

    $categoriesActive = request()->routeIs('admin.categories.*');

    $mediaActive = request()->routeIs('admin.media.*');

    $optionsActive =
        request()->routeIs('admin.option-groups.*') ||
        request()->routeIs('admin.option-choices.*');

    $optionGroupsActive =
        request()->routeIs('admin.option-groups.*');

    $optionChoicesActive =
        request()->routeIs('admin.option-choices.*');

    $ordersActive = request()->routeIs('admin.orders.*');

    $usersActive = request()->routeIs('admin.users.*');

    $messagesActive = request()->routeIs('admin.messages.*');
@endphp


{{-- =========================================================================
   WRAPPER GLOBAL
   ========================================================================= --}}

<div
    x-data="{
        mobileOpen: false,

        closeMobile() {
            this.mobileOpen = false;
        }
    }"
    @keydown.escape.window="mobileOpen = false"
>


    {{-- =========================================================================
       DESKTOP SIDEBAR
       ========================================================================= --}}

    <aside
        class="
            fixed
            inset-y-0
            left-0
            z-40
            hidden
            w-[250px]
            border-r
            border-gray-200/80
            bg-white
            lg:flex
            lg:flex-col
        "
    >

        {{-- ============================= --}}
        {{-- LOGO --}}
        {{-- ============================= --}}

        <div class="flex h-[76px] items-center px-6">

            <a
                href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-2.5"
            >

                <div
                    class="
                        flex
                        h-9
                        w-9
                        items-center
                        justify-center
                        rounded-xl
                        bg-[#593114]
                        text-white
                        shadow-sm
                    "
                >
                    <img
                        src="{{ asset('images/lokmr.png') }}"
                        alt="FON-KPA"
                        class="h-full w-full object-contain"
                    >
                </div>

                <div>

                    <p class="text-[15px] font-bold tracking-tight text-[#593114]">
                        FON-KPA
                    </p>

                    <p class="text-[9px] font-medium uppercase tracking-[0.12em] text-gray-400">
                        Administration
                    </p>

                </div>

            </a>

        </div>


        {{-- ============================= --}}
        {{-- NAVIGATION --}}
        {{-- ============================= --}}

        <div class="flex-1 overflow-y-auto px-3 py-5">

            {{-- ============================= --}}
            {{-- MENU PRINCIPAL --}}
            {{-- ============================= --}}

            <p
                class="
                    mb-2
                    px-3
                    text-[9px]
                    font-semibold
                    uppercase
                    tracking-[0.16em]
                    text-gray-400
                "
            >
                Menu
            </p>


            <nav class="space-y-1">


                {{-- ========================================================= --}}
                {{-- DASHBOARD --}}
                {{-- ========================================================= --}}

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="
                        group
                        flex
                        items-center
                        gap-3
                        rounded-xl
                        px-3
                        py-2.5
                        text-[12px]
                        font-medium
                        transition-all
                        duration-200
                        {{ $dashboardActive
                            ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                            : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                    "
                >

                    <span
                        class="
                            flex
                            h-7
                            w-7
                            items-center
                            justify-center
                            rounded-lg
                            transition-all
                            duration-200
                            {{ $dashboardActive
                                ? 'bg-[#593114] text-white'
                                : 'bg-gray-50 text-gray-400 group-hover:bg-[#593114]/10 group-hover:text-[#593114]' }}
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                            <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                            <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                            <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                        </svg>

                    </span>

                    <span>
                        Dashboard
                    </span>

                </a>


                {{-- ========================================================= --}}
                {{-- CATALOGUE --}}
                {{-- ========================================================= --}}

                <div
                    x-data="{ open: {{ $catalogueActive ? 'true' : 'false' }} }"
                >

                    <button
                        type="button"
                        @click="open = !open"
                        :aria-expanded="open.toString()"
                        class="
                            group
                            flex
                            w-full
                            items-center
                            gap-3
                            rounded-xl
                            px-3
                            py-2.5
                            text-left
                            text-[12px]
                            font-semibold
                            transition-all
                            duration-200
                            {{ $catalogueActive
                                ? 'bg-[#593114]/[0.07] text-[#593114]'
                                : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                        "
                    >

                        <span
                            class="
                                flex
                                h-7
                                w-7
                                shrink-0
                                items-center
                                justify-center
                                rounded-lg
                                transition-all
                                duration-200
                                {{ $catalogueActive
                                    ? 'bg-[#593114] text-white'
                                    : 'bg-gray-50 text-gray-400 group-hover:bg-[#593114]/10 group-hover:text-[#593114]' }}
                            "
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                class="h-4 w-4"
                            >
                                <path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v15.5a2.5 2.5 0 0 0-2.5-2.5H4z"/>
                                <path d="M4 5.5v13A2.5 2.5 0 0 0 6.5 21H20"/>
                                <path d="M8 7h8"/>
                                <path d="M8 11h6"/>
                            </svg>

                        </span>

                        <span class="flex-1">
                            Catalogue
                        </span>

                        <svg
                            class="
                                h-4
                                w-4
                                shrink-0
                                text-gray-400
                                transition-transform
                                duration-300
                                ease-out
                            "
                            :class="{ 'rotate-180 text-[#593114]': open }"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                d="m6 9 6 6 6-6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>

                    </button>


                    {{-- SOUS-MENU CATALOGUE --}}

                    <div
                        x-show="open"
                        x-collapse
                        class="ml-10 space-y-1 border-l border-gray-100 pl-3"
                    >

                        {{-- Plats --}}

                        <a
                            href="{{ Route::has('admin.products.index') ? route('admin.products.index') : '#' }}"
                            class="
                                block
                                rounded-lg
                                px-3
                                py-2
                                text-[11px]
                                font-medium
                                transition-all
                                duration-200
                                {{ $productsActive
                                    ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                                    : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                            "
                        >
                            Plats
                        </a>


                        {{-- Catégories --}}

                        <a
                            href="{{ Route::has('admin.categories.index') ? route('admin.categories.index') : '#' }}"
                            class="
                                block
                                rounded-lg
                                px-3
                                py-2
                                text-[11px]
                                font-medium
                                transition-all
                                duration-200
                                {{ $categoriesActive
                                    ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                                    : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                            "
                        >
                            Catégories
                        </a>


                        {{-- Médias --}}

                        <a
                            href="{{ Route::has('admin.media.index') ? route('admin.media.index') : '#' }}"
                            class="
                                block
                                rounded-lg
                                px-3
                                py-2
                                text-[11px]
                                font-medium
                                transition-all
                                duration-200
                                {{ $mediaActive
                                    ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                                    : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                            "
                        >
                            Médias
                        </a>


                        {{-- OPTIONS --}}

                        <div
                            x-data="{ openOptions: {{ $optionsActive ? 'true' : 'false' }} }"
                        >

                            <button
                                type="button"
                                @click="openOptions = !openOptions"
                                :aria-expanded="openOptions.toString()"
                                class="
                                    group
                                    flex
                                    w-full
                                    items-center
                                    rounded-lg
                                    px-3
                                    py-2
                                    text-left
                                    text-[11px]
                                    font-medium
                                    transition-all
                                    duration-200
                                    {{ $optionsActive
                                        ? 'font-semibold text-[#593114]'
                                        : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                                "
                            >

                                <span class="flex-1">
                                    Options
                                </span>

                                <svg
                                    class="
                                        h-3.5
                                        w-3.5
                                        shrink-0
                                        text-gray-400
                                        transition-transform
                                        duration-300
                                        ease-out
                                    "
                                    :class="{ 'rotate-180 text-[#593114]': openOptions }"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        d="m6 9 6 6 6-6"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>

                            </button>


                            <div
                                x-show="openOptions"
                                x-collapse
                                class="ml-3 mt-1 space-y-1 border-l border-gray-100 pl-3"
                            >

                                <a
                                    href="{{ Route::has('admin.option-groups.index') ? route('admin.option-groups.index') : '#' }}"
                                    class="
                                        block
                                        rounded-lg
                                        px-3
                                        py-2
                                        text-[10.5px]
                                        font-medium
                                        transition-all
                                        duration-200
                                        {{ $optionGroupsActive
                                            ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                                            : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                                    "
                                >
                                    Groupes
                                </a>


                                <a
                                    href="{{ Route::has('admin.option-choices.index') ? route('admin.option-choices.index') : '#' }}"
                                    class="
                                        block
                                        rounded-lg
                                        px-3
                                        py-2
                                        text-[10.5px]
                                        font-medium
                                        transition-all
                                        duration-200
                                        {{ $optionChoicesActive
                                            ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                                            : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                                    "
                                >
                                    Choix
                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- COMMANDES --}}
                {{-- ========================================================= --}}

                <a
                    href="{{ route('admin.orders.index') }}"
                    class="
                        group
                        flex
                        items-center
                        gap-3
                        rounded-xl
                        px-3
                        py-2.5
                        text-[12px]
                        font-medium
                        transition-all
                        duration-200
                        {{ $ordersActive
                            ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                            : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                    "
                >

                    <span
                        class="
                            flex
                            h-7
                            w-7
                            items-center
                            justify-center
                            rounded-lg
                            transition-all
                            duration-200
                            {{ $ordersActive
                                ? 'bg-[#593114] text-white'
                                : 'bg-gray-50 text-gray-400 group-hover:bg-[#593114]/10 group-hover:text-[#593114]' }}
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <path d="M6 3h12v18H6z"/>
                            <path d="M9 7h6"/>
                            <path d="M9 11h6"/>
                            <path d="M9 15h4"/>
                        </svg>

                    </span>

                    <span>
                        Commandes
                    </span>

                    @if ($pendingOrdersCount > 0)
                    <span
                        class="
                            ml-auto
                            flex
                            h-4
                            min-w-4
                            items-center
                            justify-center
                            rounded-full
                            bg-[#e25f12]
                            px-1
                            text-[8px]
                            font-bold
                            text-white
                        "
                    >
                        {{ $pendingOrdersCount }}
                    </span>
                    @endif

                </a>


                {{-- ========================================================= --}}
                {{-- UTILISATEURS --}}
                {{-- ========================================================= --}}

                <a
                    href="{{ route('admin.users.index') }}"
                    class="
                        group
                        flex
                        items-center
                        gap-3
                        rounded-xl
                        px-3
                        py-2.5
                        text-[12px]
                        font-medium
                        transition-all
                        duration-200
                        {{ $usersActive
                            ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                            : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                    "
                >

                    <span
                        class="
                            flex
                            h-7
                            w-7
                            items-center
                            justify-center
                            rounded-lg
                            transition-all
                            duration-200
                            {{ $usersActive
                                ? 'bg-[#593114] text-white'
                                : 'bg-gray-50 text-gray-400 group-hover:bg-[#593114]/10 group-hover:text-[#593114]' }}
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <circle cx="9" cy="8" r="3"/>
                            <path d="M3.5 19a5.5 5.5 0 0 1 11 0"/>
                            <path d="M16 11a3 3 0 1 0 0-6"/>
                            <path d="M16 14.5a5 5 0 0 1 4.5 4.5"/>
                        </svg>

                    </span>

                    <span>
                        Utilisateurs
                    </span>

                </a>


                {{-- ========================================================= --}}
                {{-- MESSAGES --}}
                {{-- ========================================================= --}}

                <a
                    href="{{ route('admin.messages.index') }}"
                    class="
                        group
                        flex
                        items-center
                        gap-3
                        rounded-xl
                        px-3
                        py-2.5
                        text-[12px]
                        font-medium
                        transition-all
                        duration-200
                        {{ $messagesActive
                            ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                            : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                    "
                >

                    <span
                        class="
                            flex
                            h-7
                            w-7
                            items-center
                            justify-center
                            rounded-lg
                            transition-all
                            duration-200
                            {{ $messagesActive
                                ? 'bg-[#593114] text-white'
                                : 'bg-gray-50 text-gray-400 group-hover:bg-[#593114]/10 group-hover:text-[#593114]' }}
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <rect x="3" y="5" width="18" height="14" rx="2"/>
                            <path d="m4 7 8 6 8-6"/>
                        </svg>

                    </span>

                    <span>
                        Messages
                    </span>

                    @if ($unreadMessagesCount > 0)
                    <span
                        class="
                            ml-auto
                            flex
                            h-4
                            min-w-4
                            items-center
                            justify-center
                            rounded-full
                            bg-[#e25f12]
                            px-1
                            text-[8px]
                            font-bold
                            text-white
                        "
                    >
                        {{ $unreadMessagesCount }}
                    </span>
                @endif

                </a>

            </nav>


            {{-- ============================= --}}
            {{-- CONTENU DU SITE --}}
            {{-- ============================= --}}

            <p
                class="
                    mb-2
                    mt-8
                    px-3
                    text-[9px]
                    font-semibold
                    uppercase
                    tracking-[0.16em]
                    text-gray-400
                "
            >
                Contenu du site
            </p>


            <nav
                class="space-y-1"
                x-data="{ open: true }"
            >

                <button
                    type="button"
                    @click="open = !open"
                    :aria-expanded="open.toString()"
                    class="
                        group
                        flex
                        w-full
                        items-center
                        gap-3
                        rounded-xl
                        px-3
                        py-2.5
                        text-left
                        text-[12px]
                        font-semibold
                        text-[#593114]
                        transition-all
                        duration-200
                        hover:bg-[#593114]/[0.04]
                    "
                >

                    <span
                        class="
                            flex
                            h-7
                            w-7
                            shrink-0
                            items-center
                            justify-center
                            rounded-lg
                            bg-[#593114]/10
                            text-[#593114]
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <path d="M4 5h16v14H4z"/>
                            <path d="M8 9h8"/>
                            <path d="M8 13h6"/>
                            <path d="M8 17h4"/>
                        </svg>

                    </span>

                    <span class="flex-1">
                        Contenu du site
                    </span>

                    <svg
                        class="
                            h-4
                            w-4
                            shrink-0
                            text-gray-400
                            transition-transform
                            duration-300
                        "
                        :class="{ 'rotate-180 text-[#593114]': open }"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            d="m6 9 6 6 6-6"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>

                </button>


                <div
                    x-show="open"
                    x-collapse
                    class="ml-10 space-y-1 border-l border-gray-100 pl-3"
                >

                    <a
                        href="#"
                        class="
                            block
                            rounded-lg
                            px-3
                            py-2
                            text-[11px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Accueil
                    </a>

                    <a
                        href="#"
                        class="
                            block
                            rounded-lg
                            px-3
                            py-2
                            text-[11px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Nos plats
                    </a>

                    <a
                        href="#"
                        class="
                            block
                            rounded-lg
                            px-3
                            py-2
                            text-[11px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        À propos
                    </a>

                    <a
                        href="#"
                        class="
                            block
                            rounded-lg
                            px-3
                            py-2
                            text-[11px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Contact
                    </a>

                    <a
                        href="#"
                        class="
                            block
                            rounded-lg
                            px-3
                            py-2
                            text-[11px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Textes & boutons
                    </a>

                    <a
                        href="#"
                        class="
                            block
                            rounded-lg
                            px-3
                            py-2
                            text-[11px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Bannières
                    </a>

                </div>

            </nav>


            {{-- ============================= --}}
            {{-- GÉNÉRAL --}}
            {{-- ============================= --}}

            <p
                class="
                    mb-2
                    mt-8
                    px-3
                    text-[9px]
                    font-semibold
                    uppercase
                    tracking-[0.16em]
                    text-gray-400
                "
            >
                Général
            </p>


            <nav class="space-y-1">

                {{-- Paramètres --}}

                <a
                    href="#"
                    class="
                        group
                        flex
                        items-center
                        gap-3
                        rounded-xl
                        px-3
                        py-2.5
                        text-[12px]
                        font-medium
                        text-gray-500
                        transition-all
                        duration-200
                        hover:bg-[#593114]/[0.05]
                        hover:text-[#593114]
                    "
                >

                    <span
                        class="
                            flex
                            h-7
                            w-7
                            items-center
                            justify-center
                            rounded-lg
                            bg-gray-50
                            text-gray-400
                            transition-all
                            duration-200
                            group-hover:bg-[#593114]/10
                            group-hover:text-[#593114]
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.7 1.7-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.6v.1h-2.4v-.1a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1L8 17l.1-.1a1.7 1.7 0 0 0 .3-1.9 1.7 1.7 0 0 0-1.6-1H6.7v-2.4h.1a1.7 1.7 0 0 0 1.6-1 1.7 1.7 0 0 0-.3-1.9L8 8.6l1.7-1.7.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1-1.6v-.1h2.4v.1a1.7 1.7 0 0 0 1 1.6 1.7 1.7 0 0 0 1.9-.3l.1-.1 1.7 1.7-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.6 1h.1V14h-.1a1.7 1.7 0 0 0-1.6 1Z"/>
                        </svg>

                    </span>

                    <span>
                        Paramètres
                    </span>

                </a>


                {{-- Déconnexion --}}

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="
                            group
                            flex
                            w-full
                            items-center
                            gap-3
                            rounded-xl
                            px-3
                            py-2.5
                            text-left
                            text-[12px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-red-50
                            hover:text-red-600
                        "
                    >

                        <span
                            class="
                                flex
                                h-7
                                w-7
                                items-center
                                justify-center
                                rounded-lg
                                bg-gray-50
                                text-gray-400
                                transition-all
                                duration-200
                                group-hover:bg-red-50
                                group-hover:text-red-500
                            "
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                class="h-4 w-4"
                            >
                                <path d="M10 17l5-5-5-5"/>
                                <path d="M15 12H3"/>
                                <path d="M21 3v18"/>
                            </svg>

                        </span>

                        <span>
                            Déconnexion
                        </span>

                    </button>

                </form>

            </nav>

        </div>


        {{-- ============================= --}}
        {{-- PROFIL ADMIN --}}
        {{-- ============================= --}}

        <div class="border-t border-gray-100 p-4">

            <div class="flex items-center gap-3">

                <div
                    class="
                        flex
                        h-9
                        w-9
                        shrink-0
                        items-center
                        justify-center
                        rounded-full
                        bg-[#593114]
                        text-xs
                        font-bold
                        text-[#E25F12]
                    "
                >
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>

                <div class="min-w-0">

                    <p class="truncate text-[12px] font-semibold text-gray-800">
                        {{ auth()->user()->name ?? 'Administrateur' }}
                    </p>

                    <p class="truncate text-[11px] text-gray-400">
                        {{ auth()->user()->email ?? '' }}
                    </p>

                </div>

            </div>

        </div>

    </aside>



    {{-- =========================================================================
       BOUTON MOBILE
       ========================================================================= --}}

    <button
        type="button"
        @click="mobileOpen = true"
        aria-label="Ouvrir le menu"
        :aria-expanded="mobileOpen.toString()"
        class="
            fixed
            left-4
            top-4
            z-[80]
            flex
            h-11
            w-11
            items-center
            justify-center
            rounded-2xl
            border
            border-[#EADFD5]
            bg-white/95
            text-[#593114]
            shadow-[0_8px_30px_rgba(89,49,20,0.10)]
            backdrop-blur-xl
            transition-all
            duration-200
            active:scale-95
            lg:hidden
        "
    >

        <svg
            x-show="!mobileOpen"
            x-cloak
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            class="h-5 w-5"
        >
            <path
                d="M4 7h16M4 12h16M4 17h16"
                stroke-linecap="round"
            />
        </svg>

        <svg
            x-show="mobileOpen"
            x-cloak
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            class="h-5 w-5"
        >
            <path
                d="M6 6l12 12M18 6L6 18"
                stroke-linecap="round"
            />
        </svg>

    </button>



    {{-- =========================================================================
       BACKDROP MOBILE
       ========================================================================= --}}

    <div
        x-show="mobileOpen"
        x-cloak
        class="fixed inset-0 z-[90] bg-[#2D170A]/30 backdrop-blur-[3px] lg:hidden"
        x-transition:enter="transition-opacity duration-300 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity duration-200 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="closeMobile()"
    ></div>



    {{-- =========================================================================
       MOBILE SIDEBAR / DRAWER
       ========================================================================= --}}

    <aside
        x-show="mobileOpen"
        x-cloak
        class="
            fixed
            inset-y-0
            left-0
            z-[100]
            flex
            w-[min(86vw,320px)]
            flex-col
            overflow-hidden
            border-r
            border-gray-200/80
            bg-white
            shadow-[15px_0_50px_rgba(45,23,10,0.15)]
            lg:hidden
        "
        x-transition:enter="transform transition duration-300 ease-out"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition duration-250 ease-in"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        @click.stop
    >

        {{-- ============================= --}}
        {{-- HEADER MOBILE --}}
        {{-- ============================= --}}

        <div
            class="
                flex
                h-[76px]
                shrink-0
                items-center
                justify-between
                border-b
                border-gray-100
                px-5
            "
        >

            <a
                href="{{ route('admin.dashboard') }}"
                @click="closeMobile()"
                class="flex items-center gap-2.5"
            >

                <div
                    class="
                        flex
                        h-9
                        w-9
                        items-center
                        justify-center
                        overflow-hidden
                        rounded-xl
                        bg-[#593114]
                        shadow-sm
                    "
                >

                    <img
                        src="{{ asset('images/lokmr.png') }}"
                        alt="FON-KPA"
                        class="h-full w-full object-contain"
                    >

                </div>

                <div>

                    <p class="text-[15px] font-bold tracking-tight text-[#593114]">
                        FON-KPA
                    </p>

                    <p class="text-[9px] font-medium uppercase tracking-[0.12em] text-gray-400">
                        Administration
                    </p>

                </div>

            </a>


            {{-- Fermer --}}

            <button
                type="button"
                @click="closeMobile()"
                aria-label="Fermer le menu"
                class="
                    flex
                    h-9
                    w-9
                    items-center
                    justify-center
                    rounded-xl
                    bg-gray-50
                    text-gray-500
                    transition-all
                    duration-200
                    hover:bg-[#593114]/10
                    hover:text-[#593114]
                    active:scale-95
                "
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    class="h-5 w-5"
                >
                    <path
                        d="M6 6l12 12M18 6L6 18"
                        stroke-linecap="round"
                    />
                </svg>

            </button>

        </div>



        {{-- ============================= --}}
        {{-- NAVIGATION MOBILE --}}
        {{-- ============================= --}}

        <div
            class="
                flex-1
                overflow-y-auto
                overscroll-contain
                px-3
                py-5
            "
        >

            {{-- MENU --}}

            <p
                class="
                    mb-2
                    px-3
                    text-[9px]
                    font-semibold
                    uppercase
                    tracking-[0.16em]
                    text-gray-400
                "
            >
                Menu
            </p>


            <nav class="space-y-1">


                {{-- DASHBOARD --}}

                <a
                    href="{{ route('admin.dashboard') }}"
                    @click="closeMobile()"
                    class="
                        group
                        flex
                        items-center
                        gap-3
                        rounded-xl
                        px-3
                        py-2.5
                        text-[12px]
                        font-medium
                        transition-all
                        duration-200
                        {{ $dashboardActive
                            ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                            : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                    "
                >

                    <span
                        class="
                            flex
                            h-8
                            w-8
                            shrink-0
                            items-center
                            justify-center
                            rounded-lg
                            transition-all
                            duration-200
                            {{ $dashboardActive
                                ? 'bg-[#593114] text-white'
                                : 'bg-gray-50 text-gray-400 group-hover:bg-[#593114]/10 group-hover:text-[#593114]' }}
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                            <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                            <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                            <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                        </svg>

                    </span>

                    Dashboard

                </a>



                {{-- CATALOGUE --}}

                <div
                    x-data="{ open: {{ $catalogueActive ? 'true' : 'false' }} }"
                >

                    <button
                        type="button"
                        @click="open = !open"
                        :aria-expanded="open.toString()"
                        class="
                            group
                            flex
                            w-full
                            items-center
                            gap-3
                            rounded-xl
                            px-3
                            py-2.5
                            text-left
                            text-[12px]
                            font-semibold
                            transition-all
                            duration-200
                            {{ $catalogueActive
                                ? 'bg-[#593114]/[0.07] text-[#593114]'
                                : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                        "
                    >

                        <span
                            class="
                                flex
                                h-8
                                w-8
                                shrink-0
                                items-center
                                justify-center
                                rounded-lg
                                transition-all
                                duration-200
                                {{ $catalogueActive
                                    ? 'bg-[#593114] text-white'
                                    : 'bg-gray-50 text-gray-400 group-hover:bg-[#593114]/10 group-hover:text-[#593114]' }}
                            "
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                class="h-4 w-4"
                            >
                                <path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v15.5a2.5 2.5 0 0 0-2.5-2.5H4z"/>
                                <path d="M4 5.5v13A2.5 2.5 0 0 0 6.5 21H20"/>
                                <path d="M8 7h8"/>
                                <path d="M8 11h6"/>
                            </svg>

                        </span>

                        <span class="flex-1">
                            Catalogue
                        </span>

                        <svg
                            class="h-4 w-4 text-gray-400 transition-transform duration-300"
                            :class="{ 'rotate-180 text-[#593114]': open }"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                d="m6 9 6 6 6-6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>

                    </button>


                    <div
                        x-show="open"
                        x-collapse
                        class="ml-10 space-y-1 border-l border-gray-100 pl-3"
                    >

                        <a
                            href="{{ Route::has('admin.products.index') ? route('admin.products.index') : '#' }}"
                            @click="closeMobile()"
                            class="
                                block
                                rounded-lg
                                px-3
                                py-2
                                text-[11px]
                                font-medium
                                transition-all
                                duration-200
                                {{ $productsActive
                                    ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                                    : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                            "
                        >
                            Plats
                        </a>

                        <a
                            href="{{ Route::has('admin.categories.index') ? route('admin.categories.index') : '#' }}"
                            @click="closeMobile()"
                            class="
                                block
                                rounded-lg
                                px-3
                                py-2
                                text-[11px]
                                font-medium
                                transition-all
                                duration-200
                                {{ $categoriesActive
                                    ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                                    : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                            "
                        >
                            Catégories
                        </a>

                        <a
                            href="{{ Route::has('admin.media.index') ? route('admin.media.index') : '#' }}"
                            @click="closeMobile()"
                            class="
                                block
                                rounded-lg
                                px-3
                                py-2
                                text-[11px]
                                font-medium
                                transition-all
                                duration-200
                                {{ $mediaActive
                                    ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                                    : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                            "
                        >
                            Médias
                        </a>


                        {{-- OPTIONS --}}

                        <div
                            x-data="{ openOptions: {{ $optionsActive ? 'true' : 'false' }} }"
                        >

                            <button
                                type="button"
                                @click="openOptions = !openOptions"
                                :aria-expanded="openOptions.toString()"
                                class="
                                    group
                                    flex
                                    w-full
                                    items-center
                                    rounded-lg
                                    px-3
                                    py-2
                                    text-left
                                    text-[11px]
                                    font-medium
                                    transition-all
                                    duration-200
                                    {{ $optionsActive
                                        ? 'font-semibold text-[#593114]'
                                        : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                                "
                            >

                                <span class="flex-1">
                                    Options
                                </span>

                                <svg
                                    class="h-3.5 w-3.5 text-gray-400 transition-transform duration-300"
                                    :class="{ 'rotate-180 text-[#593114]': openOptions }"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        d="m6 9 6 6 6-6"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>

                            </button>


                            <div
                                x-show="openOptions"
                                x-collapse
                                class="ml-3 mt-1 space-y-1 border-l border-gray-100 pl-3"
                            >

                                <a
                                    href="{{ Route::has('admin.option-groups.index') ? route('admin.option-groups.index') : '#' }}"
                                    @click="closeMobile()"
                                    class="
                                        block
                                        rounded-lg
                                        px-3
                                        py-2
                                        text-[10.5px]
                                        font-medium
                                        transition-all
                                        duration-200
                                        {{ $optionGroupsActive
                                            ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                                            : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                                    "
                                >
                                    Groupes
                                </a>

                                <a
                                    href="{{ Route::has('admin.option-choices.index') ? route('admin.option-choices.index') : '#' }}"
                                    @click="closeMobile()"
                                    class="
                                        block
                                        rounded-lg
                                        px-3
                                        py-2
                                        text-[10.5px]
                                        font-medium
                                        transition-all
                                        duration-200
                                        {{ $optionChoicesActive
                                            ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                                            : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                                    "
                                >
                                    Choix
                                </a>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- COMMANDES --}}

                <a
                    href="{{ route('admin.orders.index') }}"
                    @click="closeMobile()"
                    class="
                        group
                        flex
                        items-center
                        gap-3
                        rounded-xl
                        px-3
                        py-2.5
                        text-[12px]
                        font-medium
                        transition-all
                        duration-200
                        {{ $ordersActive
                            ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                            : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                    "
                >

                    <span
                        class="
                            flex
                            h-8
                            w-8
                            items-center
                            justify-center
                            rounded-lg
                            transition-all
                            duration-200
                            {{ $ordersActive
                                ? 'bg-[#593114] text-white'
                                : 'bg-gray-50 text-gray-400 group-hover:bg-[#593114]/10 group-hover:text-[#593114]' }}
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <path d="M6 3h12v18H6z"/>
                            <path d="M9 7h6"/>
                            <path d="M9 11h6"/>
                            <path d="M9 15h4"/>
                        </svg>

                    </span>

                    <span class="flex-1">
                        Commandes
                    </span>

                     @if ($pendingOrdersCount > 0)
                    <span
                        class="
                            ml-auto
                            flex
                            h-4
                            min-w-4
                            items-center
                            justify-center
                            rounded-full
                            bg-[#e25f12]
                            px-1
                            text-[8px]
                            font-bold
                            text-white
                        "
                    >
                        {{ $pendingOrdersCount }}
                    </span>
                    @endif

                </a>



                {{-- UTILISATEURS --}}

                <a
                    href="{{ route('admin.users.index') }}"
                    @click="closeMobile()"
                    class="
                        group
                        flex
                        items-center
                        gap-3
                        rounded-xl
                        px-3
                        py-2.5
                        text-[12px]
                        font-medium
                        transition-all
                        duration-200
                        {{ $usersActive
                            ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                            : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                    "
                >

                    <span
                        class="
                            flex
                            h-8
                            w-8
                            items-center
                            justify-center
                            rounded-lg
                            transition-all
                            duration-200
                            {{ $usersActive
                                ? 'bg-[#593114] text-white'
                                : 'bg-gray-50 text-gray-400 group-hover:bg-[#593114]/10 group-hover:text-[#593114]' }}
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <circle cx="9" cy="8" r="3"/>
                            <path d="M3.5 19a5.5 5.5 0 0 1 11 0"/>
                            <path d="M16 11a3 3 0 1 0 0-6"/>
                            <path d="M16 14.5a5 5 0 0 1 4.5 4.5"/>
                        </svg>

                    </span>

                    Utilisateurs

                </a>



                {{-- MESSAGES --}}

                <a
                    href="{{ route('admin.messages.index') }}"
                    @click="closeMobile()"
                    class="
                        group
                        flex
                        items-center
                        gap-3
                        rounded-xl
                        px-3
                        py-2.5
                        text-[12px]
                        font-medium
                        transition-all
                        duration-200
                        {{ $messagesActive
                            ? 'bg-[#593114]/[0.07] font-semibold text-[#593114]'
                            : 'text-gray-500 hover:bg-[#593114]/[0.05] hover:text-[#593114]' }}
                    "
                >

                    <span
                        class="
                            flex
                            h-8
                            w-8
                            items-center
                            justify-center
                            rounded-lg
                            transition-all
                            duration-200
                            {{ $messagesActive
                                ? 'bg-[#593114] text-white'
                                : 'bg-gray-50 text-gray-400 group-hover:bg-[#593114]/10 group-hover:text-[#593114]' }}
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <rect x="3" y="5" width="18" height="14" rx="2"/>
                            <path d="m4 7 8 6 8-6"/>
                        </svg>

                    </span>

                    <span class="flex-1">
                        Messages
                    </span>

                    @if ($unreadMessagesCount > 0)
                        <span
                            class="
                                ml-auto
                                flex
                                h-4
                                min-w-4
                                items-center
                                justify-center
                                rounded-full
                                bg-[#e25f12]
                                px-1
                                text-[8px]
                                font-bold
                                text-white
                            "
                        >
                            {{ $unreadMessagesCount }}
                        </span>
                    @endif

                </a>

            </nav>


            {{-- ============================= --}}
            {{-- CONTENU DU SITE --}}
            {{-- ============================= --}}

            <p
                class="
                    mb-2
                    mt-8
                    px-3
                    text-[9px]
                    font-semibold
                    uppercase
                    tracking-[0.16em]
                    text-gray-400
                "
            >
                Contenu du site
            </p>


            <nav
                class="space-y-1"
                x-data="{ open: true }"
            >

                <button
                    type="button"
                    @click="open = !open"
                    :aria-expanded="open.toString()"
                    class="
                        group
                        flex
                        w-full
                        items-center
                        gap-3
                        rounded-xl
                        px-3
                        py-2.5
                        text-left
                        text-[12px]
                        font-semibold
                        text-[#593114]
                        transition-all
                        duration-200
                        hover:bg-[#593114]/[0.04]
                    "
                >

                    <span
                        class="
                            flex
                            h-8
                            w-8
                            shrink-0
                            items-center
                            justify-center
                            rounded-lg
                            bg-[#593114]/10
                            text-[#593114]
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <path d="M4 5h16v14H4z"/>
                            <path d="M8 9h8"/>
                            <path d="M8 13h6"/>
                            <path d="M8 17h4"/>
                        </svg>

                    </span>

                    <span class="flex-1">
                        Contenu du site
                    </span>

                    <svg
                        class="h-4 w-4 text-gray-400 transition-transform duration-300"
                        :class="{ 'rotate-180 text-[#593114]': open }"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            d="m6 9 6 6 6-6"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>

                </button>


                <div
                    x-show="open"
                    x-collapse
                    class="ml-10 space-y-1 border-l border-gray-100 pl-3"
                >

                    <a
                        href="#"
                        @click="closeMobile()"
                        class="
                            block
                            rounded-lg
                            px-3
                            py-2
                            text-[11px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Accueil
                    </a>

                    <a
                        href="#"
                        @click="closeMobile()"
                        class="
                            block
                            rounded-lg
                            px-3
                            py-2
                            text-[11px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Nos plats
                    </a>

                    <a
                        href="#"
                        @click="closeMobile()"
                        class="
                            block
                            rounded-lg
                            px-3
                            py-2
                            text-[11px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        À propos
                    </a>

                    <a
                        href="#"
                        @click="closeMobile()"
                        class="
                            block
                            rounded-lg
                            px-3
                            py-2
                            text-[11px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Contact
                    </a>

                    <a
                        href="#"
                        @click="closeMobile()"
                        class="
                            block
                            rounded-lg
                            px-3
                            py-2
                            text-[11px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Textes & boutons
                    </a>

                    <a
                        href="#"
                        @click="closeMobile()"
                        class="
                            block
                            rounded-lg
                            px-3
                            py-2
                            text-[11px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Bannières
                    </a>

                </div>

            </nav>


            {{-- ============================= --}}
            {{-- GÉNÉRAL --}}
            {{-- ============================= --}}

            <p
                class="
                    mb-2
                    mt-8
                    px-3
                    text-[9px]
                    font-semibold
                    uppercase
                    tracking-[0.16em]
                    text-gray-400
                "
            >
                Général
            </p>


            <nav class="space-y-1">

                <a
                    href="#"
                    @click="closeMobile()"
                    class="
                        group
                        flex
                        items-center
                        gap-3
                        rounded-xl
                        px-3
                        py-2.5
                        text-[12px]
                        font-medium
                        text-gray-500
                        transition-all
                        duration-200
                        hover:bg-[#593114]/[0.05]
                        hover:text-[#593114]
                    "
                >

                    <span
                        class="
                            flex
                            h-8
                            w-8
                            items-center
                            justify-center
                            rounded-lg
                            bg-gray-50
                            text-gray-400
                            transition-all
                            duration-200
                            group-hover:bg-[#593114]/10
                            group-hover:text-[#593114]
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.7 1.7-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.6v.1h-2.4v-.1a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1L8 17l.1-.1a1.7 1.7 0 0 0 .3-1.9 1.7 1.7 0 0 0-1.6-1H6.7v-2.4h.1a1.7 1.7 0 0 0 1.6-1 1.7 1.7 0 0 0-.3-1.9L8 8.6l1.7-1.7.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1 1.6v.1h2.4v-.1a1.7 1.7 0 0 0 1-1.6 1.7 1.7 0 0 0 1.9.3l.1-.1 1.7 1.7-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.6 1h.1V14h-.1a1.7 1.7 0 0 0-1.6 1Z"/>
                        </svg>

                    </span>

                    Paramètres

                </a>


                {{-- Déconnexion --}}

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="
                            group
                            flex
                            w-full
                            items-center
                            gap-3
                            rounded-xl
                            px-3
                            py-2.5
                            text-left
                            text-[12px]
                            font-medium
                            text-gray-500
                            transition-all
                            duration-200
                            hover:bg-red-50
                            hover:text-red-600
                        "
                    >

                        <span
                            class="
                                flex
                                h-8
                                w-8
                                items-center
                                justify-center
                                rounded-lg
                                bg-gray-50
                                text-gray-400
                                transition-all
                                duration-200
                                group-hover:bg-red-50
                                group-hover:text-red-500
                            "
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                class="h-4 w-4"
                            >
                                <path d="M10 17l5-5-5-5"/>
                                <path d="M15 12H3"/>
                                <path d="M21 3v18"/>
                            </svg>

                        </span>

                        Déconnexion

                    </button>

                </form>

            </nav>

        </div>


        {{-- ============================= --}}
        {{-- PROFIL MOBILE --}}
        {{-- ============================= --}}

        <div
            class="
                shrink-0
                border-t
                border-gray-100
                bg-[#FFFCF7]
                p-4
            "
        >

            <div class="flex items-center gap-3">

                <div
                    class="
                        flex
                        h-9
                        w-9
                        shrink-0
                        items-center
                        justify-center
                        rounded-full
                        bg-[#593114]
                        text-xs
                        font-bold
                        text-[#E25F12]
                    "
                >
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>

                <div class="min-w-0">

                    <p class="truncate text-[12px] font-semibold text-gray-800">
                        {{ auth()->user()->name ?? 'Administrateur' }}
                    </p>

                    <p class="truncate text-[11px] text-gray-400">
                        {{ auth()->user()->email ?? '' }}
                    </p>

                </div>

            </div>

        </div>

    </aside>

</div>
