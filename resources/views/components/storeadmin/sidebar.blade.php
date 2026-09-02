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

        {{-- Menu principal --}}
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

            {{-- Dashboard --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="
                    group
                    flex
                    items-center
                    gap-3
                    rounded-xl
                    bg-[#593114]/[0.07]
                    px-3
                    py-2.5
                    text-[12px]
                    font-semibold
                    text-[#593114]
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
                        bg-[#593114]
                        text-white
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


            {{-- ============================= --}}
            {{-- CATALOGUE --}}
            {{-- ============================= --}}

            <div
                x-data="{ open: true }"
                class="pt-2"
            >

                {{-- Bouton Catalogue --}}
                <button
                    type="button"
                    @click="open = !open"
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
                        transition
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
                            <path d="M4 9h16"/>
                            <path d="M9 5v4"/>
                        </svg>
                    </span>

                    <span class="flex-1">
                        Catalogue
                    </span>

                    {{-- Chevron --}}
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


                {{-- Sous-menu Catalogue --}}
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
                            transition
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Tous les plats
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
                            transition
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Ajouter un plat
                    </a>


                    @if (Route::has('admin.categories.index'))

                        <a
                            href="{{ route('admin.categories.index') }}"
                            class="
                                block
                                rounded-lg
                                px-3
                                py-2
                                text-[11px]
                                font-medium
                                text-gray-500
                                transition
                                hover:bg-[#593114]/[0.05]
                                hover:text-[#593114]
                            "
                        >
                            Catégories
                        </a>

                    @endif


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
                            transition
                            hover:bg-[#593114]/[0.05]
                            hover:text-[#593114]
                        "
                    >
                        Médias / Images
                    </a>

                </div>

            </div>


            {{-- Commandes --}}
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
                    transition
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
                        <path d="M6 3h12v18H6z"/>
                        <path d="M9 7h6"/>
                        <path d="M9 11h6"/>
                        <path d="M9 15h4"/>
                    </svg>
                </span>

                <span>
                    Commandes
                </span>

                <span
                    class="
                        ml-auto
                        rounded-full
                        bg-[#e25f12]/10
                        px-1.5
                        py-0.5
                        text-[9px]
                        font-semibold
                        text-[#e25f12]
                    "
                >
                    12
                </span>

            </a>


            {{-- Utilisateurs --}}
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
                    transition
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


            {{-- Messages --}}
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
                    transition
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
                        <rect x="3" y="5" width="18" height="14" rx="2"/>
                        <path d="m4 7 8 6 8-6"/>
                    </svg>
                </span>

                <span>
                    Messages
                </span>

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
                    3
                </span>

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

            {{-- Bouton Contenu du site --}}
            <button
                type="button"
                @click="open = !open"
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
                    transition
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


            {{-- Sous-menu Contenu du site --}}
            <div
                x-show="open"
                x-collapse
                class="ml-10 space-y-1 border-l border-gray-100 pl-3"
            >

                {{-- Accueil --}}
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
                        transition
                        hover:bg-[#593114]/[0.05]
                        hover:text-[#593114]
                    "
                >
                    Accueil
                </a>


                {{-- Nos plats --}}
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
                        transition
                        hover:bg-[#593114]/[0.05]
                        hover:text-[#593114]
                    "
                >
                    Nos plats
                </a>


                {{-- À propos --}}
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
                        transition
                        hover:bg-[#593114]/[0.05]
                        hover:text-[#593114]
                    "
                >
                    À propos
                </a>


                {{-- Contact --}}
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
                        transition
                        hover:bg-[#593114]/[0.05]
                        hover:text-[#593114]
                    "
                >
                    Contact
                </a>


                {{-- Textes & boutons --}}
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
                        transition
                        hover:bg-[#593114]/[0.05]
                        hover:text-[#593114]
                    "
                >
                    Textes & boutons
                </a>


                {{-- Bannières --}}
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
                        transition
                        hover:bg-[#593114]/[0.05]
                        hover:text-[#593114]
                    "
                >
                    Bannières
                </a>

            </div>

        </nav>


        {{-- ============================= --}}
        {{-- CONFIGURATION --}}
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
                    transition
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
            <form method="POST" action="{{ route('logout') }}">

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
                        transition
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