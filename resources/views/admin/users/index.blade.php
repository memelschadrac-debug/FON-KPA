<x-admin-layout>

    {{-- ========================================================= --}}
    {{-- PAGE UTILISATEURS                                         --}}
    {{-- ========================================================= --}}

    <div
        class="space-y-6"
        x-data="userSearch()"
    >

        {{-- ========================================================= --}}
        {{-- EN-TÊTE DE PAGE                                           --}}
        {{-- ========================================================= --}}

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>

                {{-- BREADCRUMB --}}
                @include('admin.partials.breadcrumb', [
                    'section' => 'Administration',
                    'page' => 'Utilisateurs',
                    'current' => 'Liste',
                ])

                <p class="mt-3 text-[11px] font-semibold uppercase tracking-[0.16em] text-gray-400">
                    Administration
                </p>

                <h2 class="mt-1 text-2xl font-semibold tracking-tight text-[#593114]">
                    Utilisateurs
                </h2>

                <p class="mt-1 text-[12px] text-gray-400">
                    Gérez les comptes clients et administrateurs de FON-KPA.
                </p>

            </div>


            {{-- ===================================================== --}}
            {{-- BOUTON AJOUTER                                        --}}
            {{-- ===================================================== --}}

            <a
                href="{{ route('admin.users.create') }}"
                class="
                    inline-flex
                    items-center
                    justify-center
                    gap-2
                    rounded-xl
                    bg-[#593114]
                    px-4
                    py-2.5
                    text-[13px]
                    font-semibold
                    text-white
                    shadow-sm
                    transition
                    hover:bg-[#47270f]
                    focus:outline-none
                    focus:ring-2
                    focus:ring-[#593114]/20
                "
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    class="h-4 w-4"
                >
                    <path
                        d="M12 5v14"
                        stroke-linecap="round"
                    />

                    <path
                        d="M5 12h14"
                        stroke-linecap="round"
                    />
                </svg>

                Ajouter un utilisateur

            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- STATISTIQUES                                              --}}
        {{-- ========================================================= --}}

        <div class="grid gap-4 sm:grid-cols-3">

            {{-- TOTAL --}}
            <div
                class="
                    rounded-2xl
                    border
                    border-gray-200/80
                    bg-white
                    px-5
                    py-4
                    shadow-sm
                "
            >
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                            Total
                        </p>

                        <p
                            class="mt-1 text-2xl font-semibold tracking-tight text-[#593114]"
                            x-text="users.length"
                        >
                            {{ $users->count() }}
                        </p>
                    </div>

                    <div
                        class="
                            flex
                            h-10
                            w-10
                            items-center
                            justify-center
                            rounded-xl
                            bg-[#593114]/[0.07]
                            text-[#593114]
                        "
                    >
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-5 w-5"
                        >
                            <circle cx="9" cy="8" r="3"/>
                            <path d="M3.5 19a5.5 5.5 0 0 1 11 0"/>
                            <path d="M16 11a3 3 0 1 0 0-6"/>
                            <path d="M16 14.5a5 5 0 0 1 4.5 4.5"/>
                        </svg>
                    </div>

                </div>
            </div>


            {{-- CLIENTS --}}
            <div
                class="
                    rounded-2xl
                    border
                    border-gray-200/80
                    bg-white
                    px-5
                    py-4
                    shadow-sm
                "
            >
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                            Clients
                        </p>

                        <p class="mt-1 text-2xl font-semibold tracking-tight text-gray-800">
                            {{ $clientsCount }}
                        </p>
                    </div>

                    <div
                        class="
                            flex
                            h-10
                            w-10
                            items-center
                            justify-center
                            rounded-xl
                            bg-gray-50
                            text-gray-500
                        "
                    >
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-5 w-5"
                        >
                            <circle cx="12" cy="8" r="3"/>
                            <path d="M5 20a7 7 0 0 1 14 0"/>
                        </svg>
                    </div>

                </div>
            </div>


            {{-- ADMINISTRATEURS --}}
            <div
                class="
                    rounded-2xl
                    border
                    border-gray-200/80
                    bg-white
                    px-5
                    py-4
                    shadow-sm
                "
            >
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                            Administrateurs
                        </p>

                        <p class="mt-1 text-2xl font-semibold tracking-tight text-[#E25F12]">
                            {{ $adminsCount }}
                        </p>
                    </div>

                    <div
                        class="
                            flex
                            h-10
                            w-10
                            items-center
                            justify-center
                            rounded-xl
                            bg-[#E25F12]/10
                            text-[#E25F12]
                        "
                    >
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-5 w-5"
                        >
                            <path d="M12 3 5 6v5c0 4.5 2.8 8.5 7 10 4.2-1.5 7-5.5 7-10V6z"/>
                            <path
                                d="m9 12 2 2 4-4"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>

                </div>
            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- MESSAGE DE SUCCÈS                                         --}}
        {{-- ========================================================= --}}

        @if (session('success'))

            <div
                class="
                    flex
                    items-center
                    gap-3
                    rounded-xl
                    border
                    border-green-100
                    bg-green-50
                    px-4
                    py-3
                    text-sm
                    text-green-700
                "
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    class="h-5 w-5 shrink-0"
                >
                    <path
                        d="M5 12l4 4L19 6"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- MESSAGE D'ERREUR                                          --}}
        {{-- ========================================================= --}}

        @if (session('error'))

            <div
                class="
                    flex
                    items-center
                    gap-3
                    rounded-xl
                    border
                    border-red-100
                    bg-red-50
                    px-4
                    py-3
                    text-sm
                    text-red-700
                "
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    class="h-5 w-5 shrink-0"
                >
                    <path
                        d="M12 9v4"
                        stroke-linecap="round"
                    />

                    <path
                        d="M12 17h.01"
                        stroke-linecap="round"
                    />

                    <path
                        d="M10.3 4.6 2.8 17a2 2 0 0 0 1.7 3h15a2 2 0 0 0 1.7-3L13.7 4.6a2 2 0 0 0-3.4 0Z"
                        stroke-linejoin="round"
                    />
                </svg>

                <span>
                    {{ session('error') }}
                </span>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- CARD PRINCIPALE                                           --}}
        {{-- ========================================================= --}}

        <div
            class="
                overflow-hidden
                rounded-2xl
                border
                border-gray-200/80
                bg-white
                shadow-sm
            "
        >

            {{-- ===================================================== --}}
            {{-- EN-TÊTE DE LA CARD                                    --}}
            {{-- ===================================================== --}}

            <div
                class="
                    flex
                    flex-col
                    gap-3
                    border-b
                    border-gray-100
                    px-5
                    py-4
                    sm:flex-row
                    sm:items-center
                    sm:justify-between
                "
            >

                <div>

                    <h3 class="text-sm font-semibold text-gray-900">
                        Liste des utilisateurs
                    </h3>

                    <p class="mt-0.5 text-[12px] text-gray-400">

                        <span x-text="filteredUsers.length">
                            {{ $users->total() }}
                        </span>

                        <span x-text="filteredUsers.length > 1 ? 'utilisateurs' : 'utilisateur'">
                            {{ $users->total() > 1 ? 'utilisateurs' : 'utilisateur' }}
                        </span>

                    </p>

                </div>


                {{-- ================================================= --}}
                {{-- RECHERCHE                                         --}}
                {{-- ================================================= --}}

                <div class="relative w-full sm:w-64">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        class="
                            pointer-events-none
                            absolute
                            left-3
                            top-1/2
                            h-4
                            w-4
                            -translate-y-1/2
                            text-gray-400
                        "
                    >
                        <circle cx="11" cy="11" r="7"/>

                        <path
                            d="m20 20-4-4"
                            stroke-linecap="round"
                        />
                    </svg>


                    <input
                        type="text"
                        x-model="search"
                        autocomplete="off"
                        placeholder="Rechercher..."
                        class="
                            h-9
                            w-full
                            rounded-lg
                            border
                            border-gray-200
                            bg-gray-50
                            pl-9
                            pr-9
                            text-[12px]
                            text-gray-700
                            outline-none
                            transition
                            placeholder:text-gray-400
                            focus:border-[#593114]/30
                            focus:bg-white
                            focus:ring-2
                            focus:ring-[#593114]/10
                        "
                    >


                    {{-- BOUTON EFFACER --}}
                    <button
                        type="button"
                        x-show="search.length > 0"
                        x-cloak
                        @click="clearSearch()"
                        class="
                            absolute
                            right-2
                            top-1/2
                            flex
                            h-6
                            w-6
                            -translate-y-1/2
                            items-center
                            justify-center
                            rounded-md
                            text-gray-400
                            transition
                            hover:bg-gray-200
                            hover:text-gray-600
                        "
                        title="Effacer"
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            class="h-3.5 w-3.5"
                        >
                            <path
                                d="M6 6l12 12M18 6 6 18"
                                stroke-linecap="round"
                            />
                        </svg>

                    </button>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- TABLEAU                                                --}}
            {{-- ===================================================== --}}

            @if ($users->count())

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[1150px] text-left">

                        {{-- ================================================= --}}
                        {{-- EN-TÊTES                                           --}}
                        {{-- ================================================= --}}

                        <thead>

                            <tr class="border-b border-gray-100 bg-gray-50/70">

                                <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Utilisateur
                                </th>

                                <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Email
                                </th>

                                <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Rôle
                                </th>

                                <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Statut
                                </th>

                                <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Vérification
                                </th>

                                <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Inscription
                                </th>

                                <th class="px-5 py-3 text-right text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        {{-- ================================================= --}}
                        {{-- CORPS                                               --}}
                        {{-- ================================================= --}}

                        <tbody class="divide-y divide-gray-100">

                            @foreach ($users as $user)

                                <tr
                                    x-show="matchesUser({
                                        id: @js($user->id),
                                        name: @js($user->name),
                                        email: @js($user->email),
                                        role: @js($user->is_admin ? 'administrateur admin' : 'client'),
                                        status: @js($user->is_active ? 'actif active' : 'désactivé inactive'),
                                    })"
                                    x-cloak
                                    class="group transition hover:bg-[#593114]/[0.02]"
                                >

                                    {{-- UTILISATEUR --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="
                                                    flex
                                                    h-10
                                                    w-10
                                                    shrink-0
                                                    items-center
                                                    justify-center
                                                    rounded-full
                                                    bg-[#593114]/[0.07]
                                                    text-sm
                                                    font-bold
                                                    uppercase
                                                    text-[#593114]
                                                "
                                            >
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>

                                            <div class="min-w-0">

                                                <p class="truncate text-[13px] font-semibold text-gray-800">
                                                    {{ $user->name }}
                                                </p>

                                                <p class="text-[10px] text-gray-400">
                                                    ID #{{ $user->id }}
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- EMAIL --}}
                                    <td class="px-5 py-4">

                                        <span class="text-[13px] text-gray-600">
                                            {{ $user->email }}
                                        </span>

                                    </td>


                                    {{-- RÔLE --}}
                                    <td class="px-5 py-4">

                                        @if ($user->is_admin)

                                            <span
                                                class="
                                                    inline-flex
                                                    items-center
                                                    rounded-lg
                                                    bg-[#593114]/10
                                                    px-2.5
                                                    py-1
                                                    text-[11px]
                                                    font-semibold
                                                    text-[#593114]
                                                "
                                            >
                                                Administrateur
                                            </span>

                                        @else

                                            <span
                                                class="
                                                    inline-flex
                                                    items-center
                                                    rounded-lg
                                                    bg-gray-50
                                                    px-2.5
                                                    py-1
                                                    text-[11px]
                                                    font-semibold
                                                    text-gray-500
                                                "
                                            >
                                                Client
                                            </span>

                                        @endif

                                    </td>


                                    {{-- STATUT --}}
                                    <td class="px-5 py-4">

                                        @if ($user->is_active)

                                            <span
                                                class="
                                                    inline-flex
                                                    items-center
                                                    gap-1.5
                                                    rounded-lg
                                                    bg-green-50
                                                    px-2.5
                                                    py-1
                                                    text-[11px]
                                                    font-semibold
                                                    text-green-600
                                                "
                                            >

                                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                                Actif

                                            </span>

                                        @else

                                            <span
                                                class="
                                                    inline-flex
                                                    items-center
                                                    gap-1.5
                                                    rounded-lg
                                                    bg-red-50
                                                    px-2.5
                                                    py-1
                                                    text-[11px]
                                                    font-semibold
                                                    text-red-500
                                                "
                                            >

                                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                                Désactivé

                                            </span>

                                        @endif

                                    </td>


                                    {{-- VÉRIFICATION --}}
                                    <td class="px-5 py-4">

                                        @if ($user->email_verified_at)

                                            <span
                                                class="
                                                    inline-flex
                                                    items-center
                                                    gap-1.5
                                                    rounded-lg
                                                    bg-green-50
                                                    px-2.5
                                                    py-1
                                                    text-[11px]
                                                    font-semibold
                                                    text-green-600
                                                "
                                            >

                                                <svg
                                                    class="h-3.5 w-3.5"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l3-3z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>

                                                Vérifié

                                            </span>

                                        @else

                                            <span
                                                class="
                                                    inline-flex
                                                    items-center
                                                    gap-1.5
                                                    rounded-lg
                                                    bg-amber-50
                                                    px-2.5
                                                    py-1
                                                    text-[11px]
                                                    font-semibold
                                                    text-amber-600
                                                "
                                            >

                                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                                Non vérifié

                                            </span>

                                        @endif

                                    </td>


                                    {{-- INSCRIPTION --}}
                                    <td class="px-5 py-4">

                                        <span class="text-[13px] font-medium text-gray-600">
                                            {{ $user->created_at?->format('d/m/Y') }}
                                        </span>

                                    </td>


                                    {{-- ================================================= --}}
                                    {{-- ACTIONS                                             --}}
                                    {{-- ================================================= --}}

                                    <td class="px-5 py-4">

                                        <div class="flex items-center justify-end gap-2">

                                            {{-- VOIR --}}
                                            <a
                                                href="{{ route('admin.users.show', $user) }}"
                                                class="
                                                    inline-flex
                                                    h-8
                                                    w-8
                                                    items-center
                                                    justify-center
                                                    rounded-lg
                                                    border
                                                    border-gray-200
                                                    bg-white
                                                    text-gray-400
                                                    transition
                                                    hover:border-[#593114]/20
                                                    hover:bg-[#593114]/[0.05]
                                                    hover:text-[#593114]
                                                "
                                                title="Voir"
                                            >

                                                <svg
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="1.7"
                                                    class="h-4 w-4"
                                                >
                                                    <path
                                                        d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />

                                                    <circle
                                                        cx="12"
                                                        cy="12"
                                                        r="2.5"
                                                    />
                                                </svg>

                                            </a>


                                            {{-- MODIFIER --}}
                                            <a
                                                href="{{ route('admin.users.edit', $user) }}"
                                                class="
                                                    inline-flex
                                                    h-8
                                                    w-8
                                                    items-center
                                                    justify-center
                                                    rounded-lg
                                                    border
                                                    border-gray-200
                                                    bg-white
                                                    text-gray-400
                                                    transition
                                                    hover:border-[#593114]/20
                                                    hover:bg-[#593114]/[0.05]
                                                    hover:text-[#593114]
                                                "
                                                title="Modifier"
                                            >

                                                <svg
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="1.7"
                                                    class="h-4 w-4"
                                                >
                                                    <path
                                                        d="M12 20h9"
                                                        stroke-linecap="round"
                                                    />

                                                    <path
                                                        d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4Z"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>

                                            </a>


                                            {{-- ================================================= --}}
                                            {{-- SÉCURITÉ : COMPTE ACTUEL                        --}}
                                            {{-- ================================================= --}}

                                            @if ($user->id === auth()->id())

                                                {{-- ACTIVER / DÉSACTIVER GRISÉ --}}
                                                <span
                                                    class="
                                                        inline-flex
                                                        h-8
                                                        w-8
                                                        cursor-not-allowed
                                                        items-center
                                                        justify-center
                                                        rounded-lg
                                                        border
                                                        border-gray-100
                                                        bg-gray-50
                                                        text-gray-300
                                                    "
                                                    title="Action protégée sur votre propre compte"
                                                    aria-label="Action protégée sur votre propre compte"
                                                >

                                                    <svg
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="1.7"
                                                        class="h-4 w-4"
                                                    >

                                                        <circle
                                                            cx="12"
                                                            cy="12"
                                                            r="9"
                                                        />

                                                        <path
                                                            d="M8 12h8"
                                                            stroke-linecap="round"
                                                        />

                                                    </svg>

                                                </span>


                                                {{-- SUPPRIMER GRISÉ --}}
                                                <span
                                                    class="
                                                        inline-flex
                                                        h-8
                                                        w-8
                                                        cursor-not-allowed
                                                        items-center
                                                        justify-center
                                                        rounded-lg
                                                        border
                                                        border-gray-100
                                                        bg-gray-50
                                                        text-gray-300
                                                    "
                                                    title="Vous ne pouvez pas supprimer votre propre compte"
                                                    aria-label="Vous ne pouvez pas supprimer votre propre compte"
                                                >

                                                    <svg
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="1.7"
                                                        class="h-4 w-4"
                                                    >

                                                        <path
                                                            d="M4 7h16"
                                                            stroke-linecap="round"
                                                        />

                                                        <path
                                                            d="M10 11v6M14 11v6"
                                                            stroke-linecap="round"
                                                        />

                                                        <path
                                                            d="M6 7l1 14h10l1-14"
                                                            stroke-linejoin="round"
                                                        />

                                                        <path
                                                            d="M9 7V4h6v3"
                                                            stroke-linejoin="round"
                                                        />

                                                    </svg>

                                                </span>

                                            @else

                                                {{-- ================================================= --}}
                                                {{-- ACTIVER / DÉSACTIVER                            --}}
                                                {{-- ================================================= --}}

                                                @if ($user->is_active)

                                                    {{-- DÉSACTIVER --}}
                                                    <button
                                                        type="button"
                                                        onclick="document.getElementById('deactivate_user_{{ $user->id }}').showModal()"
                                                        class="
                                                            inline-flex
                                                            h-8
                                                            w-8
                                                            items-center
                                                            justify-center
                                                            rounded-lg
                                                            border
                                                            border-gray-200
                                                            bg-white
                                                            text-gray-400
                                                            transition
                                                            hover:border-amber-200
                                                            hover:bg-amber-50
                                                            hover:text-amber-600
                                                        "
                                                        title="Désactiver"
                                                    >

                                                        <svg
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="1.7"
                                                            class="h-4 w-4"
                                                        >

                                                            <circle
                                                                cx="12"
                                                                cy="12"
                                                                r="9"
                                                            />

                                                            <path
                                                                d="M8 12h8"
                                                                stroke-linecap="round"
                                                            />

                                                        </svg>

                                                    </button>

                                                @else

                                                    {{-- ACTIVER --}}
                                                    <button
                                                        type="button"
                                                        onclick="document.getElementById('activate_user_{{ $user->id }}').showModal()"
                                                        class="
                                                            inline-flex
                                                            h-8
                                                            w-8
                                                            items-center
                                                            justify-center
                                                            rounded-lg
                                                            border
                                                            border-gray-200
                                                            bg-white
                                                            text-gray-400
                                                            transition
                                                            hover:border-green-200
                                                            hover:bg-green-50
                                                            hover:text-green-600
                                                        "
                                                        title="Activer"
                                                    >

                                                        <svg
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="1.7"
                                                            class="h-4 w-4"
                                                        >

                                                            <circle
                                                                cx="12"
                                                                cy="12"
                                                                r="9"
                                                            />

                                                            <path
                                                                d="m8 12 2.5 2.5L16 9"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                            />

                                                        </svg>

                                                    </button>

                                                @endif


                                                {{-- SUPPRIMER --}}
                                                <button
                                                    type="button"
                                                    onclick="document.getElementById('delete_user_{{ $user->id }}').showModal()"
                                                    class="
                                                        inline-flex
                                                        h-8
                                                        w-8
                                                        items-center
                                                        justify-center
                                                        rounded-lg
                                                        border
                                                        border-gray-200
                                                        bg-white
                                                        text-gray-400
                                                        transition
                                                        hover:border-red-200
                                                        hover:bg-red-50
                                                        hover:text-red-500
                                                    "
                                                    title="Supprimer"
                                                >

                                                    <svg
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="1.7"
                                                        class="h-4 w-4"
                                                    >

                                                        <path
                                                            d="M4 7h16"
                                                            stroke-linecap="round"
                                                        />

                                                        <path
                                                            d="M10 11v6M14 11v6"
                                                            stroke-linecap="round"
                                                        />

                                                        <path
                                                            d="M6 7l1 14h10l1-14"
                                                            stroke-linejoin="round"
                                                        />

                                                        <path
                                                            d="M9 7V4h6v3"
                                                            stroke-linejoin="round"
                                                        />

                                                    </svg>

                                                </button>

                                            @endif

                                        </div>

                                    </td>

                                </tr>


                                {{-- ================================================= --}}
                                {{-- MODALE DÉSACTIVATION                              --}}
                                {{-- ================================================= --}}

                                @if ($user->id !== auth()->id() && $user->is_active)

                                    <dialog
                                        id="deactivate_user_{{ $user->id }}"
                                        class="modal"
                                    >

                                        <div class="modal-box max-w-md overflow-hidden rounded-2xl p-0">

                                            <div class="border-b border-gray-100 px-6 py-5">

                                                <div class="flex items-center gap-3">

                                                    <div
                                                        class="
                                                            flex
                                                            h-11
                                                            w-11
                                                            shrink-0
                                                            items-center
                                                            justify-center
                                                            rounded-xl
                                                            bg-amber-50
                                                            text-amber-600
                                                        "
                                                    >

                                                        <svg
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="1.8"
                                                            class="h-5 w-5"
                                                        >

                                                            <circle
                                                                cx="12"
                                                                cy="12"
                                                                r="9"
                                                            />

                                                            <path
                                                                d="M8 12h8"
                                                                stroke-linecap="round"
                                                            />

                                                        </svg>

                                                    </div>


                                                    <div>

                                                        <h3 class="text-base font-semibold text-gray-800">
                                                            Désactiver l'utilisateur ?
                                                        </h3>

                                                        <p class="mt-0.5 text-xs text-gray-400">
                                                            Le compte ne pourra plus se connecter.
                                                        </p>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="px-6 py-5">

                                                <p class="text-sm leading-6 text-gray-600">

                                                    Voulez-vous réellement désactiver l'utilisateur

                                                    <span class="font-semibold text-[#593114]">
                                                        « {{ $user->name }} »
                                                    </span>

                                                    ?

                                                    <br>

                                                    <span class="text-xs text-gray-400">
                                                        Son rôle sera conservé, mais son accès à FON-KPA sera bloqué.
                                                    </span>

                                                </p>

                                            </div>


                                            <div
                                                class="
                                                    flex
                                                    justify-end
                                                    gap-3
                                                    border-t
                                                    border-gray-100
                                                    bg-gray-50/50
                                                    px-6
                                                    py-4
                                                "
                                            >

                                                <form method="dialog">

                                                    <button
                                                        class="
                                                            rounded-xl
                                                            border
                                                            border-gray-200
                                                            bg-white
                                                            px-4
                                                            py-2.5
                                                            text-xs
                                                            font-semibold
                                                            text-gray-600
                                                            transition
                                                            hover:bg-gray-50
                                                        "
                                                    >
                                                        Annuler
                                                    </button>

                                                </form>


                                                <form
                                                    method="POST"
                                                    action="{{ route('admin.users.deactivate', $user) }}"
                                                >

                                                    @csrf
                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="
                                                            rounded-xl
                                                            bg-amber-500
                                                            px-4
                                                            py-2.5
                                                            text-xs
                                                            font-semibold
                                                            text-white
                                                            shadow-sm
                                                            transition
                                                            hover:bg-amber-600
                                                            focus:outline-none
                                                            focus:ring-2
                                                            focus:ring-amber-500/20
                                                        "
                                                    >
                                                        Oui, désactiver
                                                    </button>

                                                </form>

                                            </div>

                                        </div>


                                        <form
                                            method="dialog"
                                            class="modal-backdrop"
                                        >
                                            <button>close</button>
                                        </form>

                                    </dialog>

                                @endif


                                {{-- ================================================= --}}
                                {{-- MODALE ACTIVATION                                --}}
                                {{-- ================================================= --}}

                                @if ($user->id !== auth()->id() && !$user->is_active)

                                    <dialog
                                        id="activate_user_{{ $user->id }}"
                                        class="modal"
                                    >

                                        <div class="modal-box max-w-md overflow-hidden rounded-2xl p-0">

                                            <div class="border-b border-gray-100 px-6 py-5">

                                                <div class="flex items-center gap-3">

                                                    <div
                                                        class="
                                                            flex
                                                            h-11
                                                            w-11
                                                            shrink-0
                                                            items-center
                                                            justify-center
                                                            rounded-xl
                                                            bg-green-50
                                                            text-green-600
                                                        "
                                                    >

                                                        <svg
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="1.8"
                                                            class="h-5 w-5"
                                                        >

                                                            <circle
                                                                cx="12"
                                                                cy="12"
                                                                r="9"
                                                            />

                                                            <path
                                                                d="m8 12 2.5 2.5L16 9"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                            />

                                                        </svg>

                                                    </div>


                                                    <div>

                                                        <h3 class="text-base font-semibold text-gray-800">
                                                            Activer l'utilisateur ?
                                                        </h3>

                                                        <p class="mt-0.5 text-xs text-gray-400">
                                                            Le compte pourra de nouveau se connecter.
                                                        </p>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="px-6 py-5">

                                                <p class="text-sm leading-6 text-gray-600">

                                                    Voulez-vous réellement réactiver l'utilisateur

                                                    <span class="font-semibold text-[#593114]">
                                                        « {{ $user->name }} »
                                                    </span>

                                                    ?

                                                    <br>

                                                    <span class="text-xs text-gray-400">
                                                        Son accès à FON-KPA sera de nouveau autorisé.
                                                    </span>

                                                </p>

                                            </div>


                                            <div
                                                class="
                                                    flex
                                                    justify-end
                                                    gap-3
                                                    border-t
                                                    border-gray-100
                                                    bg-gray-50/50
                                                    px-6
                                                    py-4
                                                "
                                            >

                                                <form method="dialog">

                                                    <button
                                                        class="
                                                            rounded-xl
                                                            border
                                                            border-gray-200
                                                            bg-white
                                                            px-4
                                                            py-2.5
                                                            text-xs
                                                            font-semibold
                                                            text-gray-600
                                                            transition
                                                            hover:bg-gray-50
                                                        "
                                                    >
                                                        Annuler
                                                    </button>

                                                </form>


                                                <form
                                                    method="POST"
                                                    action="{{ route('admin.users.activate', $user) }}"
                                                >

                                                    @csrf
                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="
                                                            rounded-xl
                                                            bg-green-500
                                                            px-4
                                                            py-2.5
                                                            text-xs
                                                            font-semibold
                                                            text-white
                                                            shadow-sm
                                                            transition
                                                            hover:bg-green-600
                                                            focus:outline-none
                                                            focus:ring-2
                                                            focus:ring-green-500/20
                                                        "
                                                    >
                                                        Oui, activer
                                                    </button>

                                                </form>

                                            </div>

                                        </div>


                                        <form
                                            method="dialog"
                                            class="modal-backdrop"
                                        >
                                            <button>close</button>
                                        </form>

                                    </dialog>

                                @endif


                                {{-- ================================================= --}}
                                {{-- MODALE DE SUPPRESSION                             --}}
                                {{-- ================================================= --}}

                                @if ($user->id !== auth()->id())

                                    <dialog
                                        id="delete_user_{{ $user->id }}"
                                        class="modal"
                                    >

                                        <div class="modal-box max-w-md overflow-hidden rounded-2xl p-0">

                                            <div class="border-b border-gray-100 px-6 py-5">

                                                <div class="flex items-center gap-3">

                                                    <div
                                                        class="
                                                            flex
                                                            h-11
                                                            w-11
                                                            shrink-0
                                                            items-center
                                                            justify-center
                                                            rounded-xl
                                                            bg-red-50
                                                            text-red-500
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
                                                                d="M12 9v4"
                                                                stroke-linecap="round"
                                                            />

                                                            <path
                                                                d="M12 17h.01"
                                                                stroke-linecap="round"
                                                            />

                                                            <path
                                                                d="M10.3 4.6 2.8 17a2 2 0 0 0 1.7 3h15a2 2 0 0 0 1.7-3L13.7 4.6a2 2 0 0 0-3.4 0Z"
                                                                stroke-linejoin="round"
                                                            />

                                                        </svg>

                                                    </div>


                                                    <div>

                                                        <h3 class="text-base font-semibold text-gray-800">
                                                            Supprimer l'utilisateur ?
                                                        </h3>

                                                        <p class="mt-0.5 text-xs text-gray-400">
                                                            Cette action est irréversible.
                                                        </p>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="px-6 py-5">

                                                <p class="text-sm leading-6 text-gray-600">

                                                    Voulez-vous réellement supprimer l'utilisateur

                                                    <span class="font-semibold text-[#593114]">
                                                        « {{ $user->name }} »
                                                    </span>

                                                    et toutes les données associées à son compte ?

                                                </p>

                                            </div>


                                            <div
                                                class="
                                                    flex
                                                    justify-end
                                                    gap-3
                                                    border-t
                                                    border-gray-100
                                                    bg-gray-50/50
                                                    px-6
                                                    py-4
                                                "
                                            >

                                                <form method="dialog">

                                                    <button
                                                        class="
                                                            rounded-xl
                                                            border
                                                            border-gray-200
                                                            bg-white
                                                            px-4
                                                            py-2.5
                                                            text-xs
                                                            font-semibold
                                                            text-gray-600
                                                            transition
                                                            hover:bg-gray-50
                                                        "
                                                    >
                                                        Annuler
                                                    </button>

                                                </form>


                                                <form
                                                    method="POST"
                                                    action="{{ route('admin.users.destroy', $user) }}"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="
                                                            rounded-xl
                                                            bg-red-500
                                                            px-4
                                                            py-2.5
                                                            text-xs
                                                            font-semibold
                                                            text-white
                                                            shadow-sm
                                                            transition
                                                            hover:bg-red-600
                                                            focus:outline-none
                                                            focus:ring-2
                                                            focus:ring-red-500/20
                                                        "
                                                    >
                                                        Oui, supprimer
                                                    </button>

                                                </form>

                                            </div>

                                        </div>


                                        <form
                                            method="dialog"
                                            class="modal-backdrop"
                                        >
                                            <button>close</button>
                                        </form>

                                    </dialog>

                                @endif

                            @endforeach


                            {{-- ================================================= --}}
                            {{-- AUCUN RÉSULTAT DE RECHERCHE                       --}}
                            {{-- ================================================= --}}

                            <tr
                                x-show="filteredUsers.length === 0"
                                x-cloak
                            >

                                <td
                                    colspan="7"
                                    class="px-6 py-16 text-center"
                                >

                                    <div
                                        class="
                                            mx-auto
                                            flex
                                            h-12
                                            w-12
                                            items-center
                                            justify-center
                                            rounded-2xl
                                            bg-[#593114]/[0.07]
                                            text-[#593114]
                                        "
                                    >

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.7"
                                            class="h-5 w-5"
                                        >
                                            <circle cx="11" cy="11" r="7"/>

                                            <path
                                                d="m20 20-4-4"
                                                stroke-linecap="round"
                                            />
                                        </svg>

                                    </div>


                                    <h3 class="mt-4 text-base font-semibold text-gray-800">
                                        Aucun utilisateur trouvé
                                    </h3>


                                    <p class="mx-auto mt-1 max-w-sm text-sm text-gray-400">
                                        Aucun compte utilisateur ne correspond à votre recherche.
                                    </p>


                                    <button
                                        type="button"
                                        x-show="search.length > 0"
                                        x-cloak
                                        @click="clearSearch()"
                                        class="
                                            mt-5
                                            inline-flex
                                            items-center
                                            gap-2
                                            rounded-xl
                                            bg-[#593114]
                                            px-4
                                            py-2.5
                                            text-[12px]
                                            font-semibold
                                            text-white
                                            transition
                                            hover:bg-[#47270f]
                                        "
                                    >
                                        Effacer la recherche
                                    </button>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            @else

                {{-- ================================================= --}}
                {{-- AUCUN UTILISATEUR                                  --}}
                {{-- ================================================= --}}

                <div class="px-6 py-16 text-center">

                    <div
                        class="
                            mx-auto
                            flex
                            h-12
                            w-12
                            items-center
                            justify-center
                            rounded-2xl
                            bg-[#593114]/[0.07]
                            text-[#593114]
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-5 w-5"
                        >
                            <circle cx="9" cy="8" r="3"/>
                            <path d="M3.5 19a5.5 5.5 0 0 1 11 0"/>
                            <path d="M16 11a3 3 0 1 0 0-6"/>
                            <path d="M16 14.5a5 5 0 0 1 4.5 4.5"/>
                        </svg>

                    </div>


                    <h3 class="mt-4 text-base font-semibold text-gray-800">
                        Aucun utilisateur
                    </h3>


                    <p class="mx-auto mt-1 max-w-sm text-sm text-gray-400">
                        Aucun compte utilisateur ne correspond à votre recherche.
                    </p>


                    <a
                        href="{{ route('admin.users.create') }}"
                        class="
                            mt-5
                            inline-flex
                            items-center
                            gap-2
                            rounded-xl
                            bg-[#593114]
                            px-4
                            py-2.5
                            text-[12px]
                            font-semibold
                            text-white
                            transition
                            hover:bg-[#47270f]
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            class="h-4 w-4"
                        >

                            <path
                                d="M12 5v14"
                                stroke-linecap="round"
                            />

                            <path
                                d="M5 12h14"
                                stroke-linecap="round"
                            />

                        </svg>

                        Ajouter un utilisateur

                    </a>

                </div>

            @endif


            {{-- ===================================================== --}}
            {{-- PAGINATION                                            --}}
            {{-- ===================================================== --}}

            @if ($users->hasPages())

                <div class="border-t border-gray-100 px-5 py-4">
                    {{ $users->links() }}
                </div>

            @endif

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- ALPINE.JS : RECHERCHE UTILISATEURS                        --}}
    {{-- ========================================================= --}}

    <script>

        function userSearch() {

            return {

                search: '',

                users: @js(
                    $users->map(fn ($user) => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->is_admin
                            ? 'administrateur admin'
                            : 'client',
                        'status' => $user->is_active
                            ? 'actif active'
                            : 'désactivé inactive',
                    ])->values()
                ),


                /*
                 * Utilisateurs correspondant à la recherche.
                 */
                get filteredUsers() {

                    const query = this.search
                        .trim()
                        .toLowerCase();

                    if (!query) {
                        return this.users;
                    }

                    return this.users.filter(user => {

                        return (
                            String(user.id).includes(query) ||
                            user.name.toLowerCase().includes(query) ||
                            user.email.toLowerCase().includes(query) ||
                            user.role.toLowerCase().includes(query) ||
                            user.status.toLowerCase().includes(query)
                        );

                    });

                },


                /*
                 * Vérifie si un utilisateur doit être affiché.
                 */
                matchesUser(user) {

                    const query = this.search
                        .trim()
                        .toLowerCase();

                    if (!query) {
                        return true;
                    }

                    return (
                        String(user.id).includes(query) ||
                        user.name.toLowerCase().includes(query) ||
                        user.email.toLowerCase().includes(query) ||
                        user.role.toLowerCase().includes(query) ||
                        user.status.toLowerCase().includes(query)
                    );

                },


                /*
                 * Efface la recherche.
                 */
                clearSearch() {

                    this.search = '';

                }

            };

        }

    </script>

</x-admin-layout>