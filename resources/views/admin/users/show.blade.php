<x-admin-layout>

    <div class="space-y-6">

        {{-- ========================================================= --}}
        {{-- EN-TÊTE DE LA PAGE                                       --}}
        {{-- ========================================================= --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-gray-400">
                    Utilisateurs
                </p>

                <h2 class="mt-1 text-2xl font-semibold tracking-tight text-[#593114]">
                    {{ $user->name }}
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Consultez les informations et gérez ce compte utilisateur.
                </p>
            </div>


            {{-- Retour à la liste --}}
            <a
                href="{{ route('admin.users.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 transition hover:border-[#593114]/30 hover:bg-[#593114]/[0.03] hover:text-[#593114]"
            >
                <svg
                    class="h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M15 19l-7-7 7-7"
                    />
                </svg>

                Retour aux utilisateurs
            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- MESSAGE DE SUCCÈS                                        --}}
        {{-- ========================================================= --}}
        @if (session('success'))

            <div class="flex items-center gap-3 rounded-xl border border-green-100 bg-green-50 px-4 py-3 text-sm text-green-700">

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- MESSAGE D'ERREUR                                         --}}
        {{-- ========================================================= --}}
        @if (session('error'))

            <div class="flex items-center gap-3 rounded-xl border border-red-100 bg-red-50 px-4 py-3 text-sm text-red-700">

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 9v4m0 4h.01M10.29 3.86l-7.82 14a2 2 0 001.74 3h15.58a2 2 0 001.74-3l-7.82-14a2 2 0 00-3.42 0z"
                    />
                </svg>

                <span>
                    {{ session('error') }}
                </span>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- INFORMATIONS PRINCIPALES DE L'UTILISATEUR                --}}
        {{-- ========================================================= --}}
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">


            {{-- ===================================================== --}}
            {{-- PROFIL + INFORMATIONS                                 --}}
            {{-- ===================================================== --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm xl:col-span-2">

                {{-- En-tête --}}
                <div class="flex flex-col gap-3 border-b border-gray-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>
                        <p class="text-[18px] font-semibold text-gray-800">
                            Informations de l'utilisateur
                        </p>

                        <p class="mt-0.5 text-[12px] text-gray-400">
                            Profil et informations du compte
                        </p>
                    </div>

                </div>


                {{-- Contenu --}}
                <div class="p-5">

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


                        {{-- ================================================= --}}
                        {{-- AVATAR                                            --}}
                        {{-- ================================================= --}}
                        <div>

                            <div class="overflow-hidden rounded-2xl border border-gray-100 bg-[#593114]/[0.03]">

                                <div class="flex aspect-[4/3] items-center justify-center">

                                    <div class="flex h-32 w-32 items-center justify-center rounded-full bg-[#593114] text-5xl font-semibold text-white shadow-sm">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- INFORMATIONS                                       --}}
                        {{-- ================================================= --}}
                        <div class="space-y-5">


                            {{-- Nom --}}
                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Nom complet
                                </p>

                                <p class="mt-1 text-base font-semibold text-gray-800">
                                    {{ $user->name }}
                                </p>

                            </div>


                            {{-- Email --}}
                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Adresse email
                                </p>

                                <p class="mt-1 break-all text-sm font-semibold text-gray-800">
                                    {{ $user->email }}
                                </p>

                            </div>


                            {{-- Rôle --}}
                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Rôle
                                </p>

                                @if ($user->is_admin)

                                    <span class="mt-2 inline-flex items-center rounded-full border border-[#593114]/10 bg-[#593114]/[0.06] px-2.5 py-1 text-[11px] font-semibold text-[#593114]">
                                        Administrateur
                                    </span>

                                @else

                                    <span class="mt-2 inline-flex items-center rounded-full border border-gray-100 bg-gray-50 px-2.5 py-1 text-[11px] font-semibold text-gray-500">
                                        Client
                                    </span>

                                @endif

                            </div>


                            {{-- Statut --}}
                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Statut du compte
                                </p>

                                @if ($user->is_active)

                                    <span class="mt-2 inline-flex items-center rounded-full border border-green-100 bg-green-50 px-2.5 py-1 text-[11px] font-semibold text-green-700">
                                        Actif
                                    </span>

                                @else

                                    <span class="mt-2 inline-flex items-center rounded-full border border-red-100 bg-red-50 px-2.5 py-1 text-[11px] font-semibold text-red-600">
                                        Désactivé
                                    </span>

                                @endif

                            </div>


                            {{-- Vérification --}}
                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Vérification email
                                </p>

                                @if ($user->email_verified_at)

                                    <span class="mt-2 inline-flex items-center gap-1.5 rounded-full border border-green-100 bg-green-50 px-2.5 py-1 text-[11px] font-semibold text-green-700">

                                        <svg
                                            class="h-3.5 w-3.5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 13l4 4L19 7"
                                            />
                                        </svg>

                                        Email vérifié

                                    </span>

                                @else

                                    <span class="mt-2 inline-flex items-center rounded-full border border-amber-100 bg-amber-50 px-2.5 py-1 text-[11px] font-semibold text-amber-700">
                                        Non vérifié
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- COLONNE DROITE                                       --}}
            {{-- ===================================================== --}}
            <div class="space-y-6">


                {{-- ================================================= --}}
                {{-- RÉSUMÉ                                             --}}
                {{-- ================================================= --}}
                <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                    <div class="border-b border-gray-100 px-5 py-4">

                        <p class="text-[18px] font-semibold text-gray-800">
                            Résumé
                        </p>

                        <p class="mt-0.5 text-[12px] text-gray-400">
                            Informations complémentaires
                        </p>

                    </div>


                    <div class="space-y-5 px-5 py-5">


                        {{-- Identifiant --}}
                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Identifiant
                            </p>

                            <p class="mt-1 text-sm font-semibold text-gray-700">
                                #{{ $user->id }}
                            </p>

                        </div>


                        {{-- Type de compte --}}
                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Type de compte
                            </p>

                            @if ($user->is_admin)

                                <span class="mt-2 inline-flex items-center rounded-full border border-[#593114]/10 bg-[#593114]/[0.06] px-2.5 py-1 text-[11px] font-semibold text-[#593114]">
                                    Administrateur
                                </span>

                            @else

                                <span class="mt-2 inline-flex items-center rounded-full border border-gray-100 bg-gray-50 px-2.5 py-1 text-[11px] font-semibold text-gray-500">
                                    Client
                                </span>

                            @endif

                        </div>


                        {{-- Création --}}
                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Compte créé le
                            </p>

                            <p class="mt-1 text-sm text-gray-700">
                                {{ $user->created_at?->format('d/m/Y à H:i') }}
                            </p>

                        </div>


                        {{-- Modification --}}
                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Dernière modification
                            </p>

                            <p class="mt-1 text-sm text-gray-700">
                                {{ $user->updated_at?->format('d/m/Y à H:i') }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- ACTIONS                                            --}}
                {{-- ================================================= --}}
                <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                    <div class="border-b border-gray-100 px-5 py-4">

                        <p class="text-[18px] font-semibold text-gray-800">
                            Actions
                        </p>

                        <p class="mt-0.5 text-[12px] text-gray-400">
                            Gérez cet utilisateur
                        </p>

                    </div>


                    <div class="space-y-3 px-5 py-5">


                        {{-- Modifier --}}
                        <a
                            href="{{ route('admin.users.edit', $user) }}"
                            class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-lg bg-[#593114] px-5 text-sm font-medium text-white transition hover:bg-[#47260F] focus:outline-none focus:ring-2 focus:ring-[#593114]/20"
                        >

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M16.862 3.487a2.1 2.1 0 013.01 2.93L8.5 17.79l-4 1 1-4 11.362-11.303z"
                                />
                            </svg>

                            Modifier

                        </a>


                        {{-- Activer / Désactiver --}}
                        @if ($user->id !== auth()->id())

                            @if ($user->is_active)

                                <button
                                    type="button"
                                    onclick="document.getElementById('deactivate-user').showModal()"
                                    class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-5 text-sm font-medium text-gray-600 transition hover:border-orange-200 hover:bg-orange-50 hover:text-orange-700"
                                >

                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M18.36 6.64A9 9 0 115.64 6.64M12 8v4"
                                        />
                                    </svg>

                                    Désactiver

                                </button>

                            @else

                                <form
                                    action="{{ route('admin.users.activate', $user) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-lg border border-green-200 bg-white px-5 text-sm font-medium text-green-600 transition hover:bg-green-50"
                                    >

                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M5 13l4 4L19 7"
                                            />
                                        </svg>

                                        Activer

                                    </button>

                                </form>

                            @endif

                        @else

                            {{-- Protection du compte connecté --}}
                            <button
                                type="button"
                                disabled
                                title="Vous ne pouvez pas modifier le statut de votre propre compte."
                                class="inline-flex h-10 w-full cursor-not-allowed items-center justify-center gap-2 rounded-lg border border-gray-100 bg-gray-50 px-5 text-sm font-medium text-gray-300"
                            >

                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M18.36 6.64A9 9 0 115.64 6.64M12 8v4"
                                    />
                                </svg>

                                Désactiver

                            </button>

                        @endif


                        {{-- Supprimer --}}
                        @if ($user->id !== auth()->id())

                            <button
                                type="button"
                                onclick="document.getElementById('delete-user').showModal()"
                                class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-lg border border-red-200 bg-white px-5 text-sm font-medium text-red-600 transition hover:bg-red-50"
                            >

                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0v12a1 1 0 01-1 1H8a1 1 0 01-1-1V7m3 4v6m4-6v6"
                                    />
                                </svg>

                                Supprimer

                            </button>

                        @else

                            {{-- Protection du compte connecté --}}
                            <button
                                type="button"
                                disabled
                                title="Vous ne pouvez pas supprimer votre propre compte."
                                class="inline-flex h-10 w-full cursor-not-allowed items-center justify-center gap-2 rounded-lg border border-gray-100 bg-gray-50 px-5 text-sm font-medium text-gray-300"
                            >

                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0v12a1 1 0 01-1 1H8a1 1 0 01-1-1V7m3 4v6m4-6v6"
                                    />
                                </svg>

                                Supprimer

                            </button>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- INFORMATIONS DU COMPTE                                   --}}
        {{-- ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

            <div class="border-b border-gray-100 px-5 py-4">

                <p class="text-[18px] font-semibold text-gray-800">
                    Informations du compte
                </p>

                <p class="mt-0.5 text-[12px] text-gray-400">
                    État et sécurité du compte utilisateur
                </p>

            </div>


            <div class="grid grid-cols-1 gap-6 px-5 py-5 md:grid-cols-3">


                {{-- Statut --}}
                <div>

                    <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                        Statut
                    </p>

                    @if ($user->is_active)

                        <span class="mt-2 inline-flex items-center gap-1.5 rounded-full border border-green-100 bg-green-50 px-2.5 py-1 text-[11px] font-semibold text-green-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                            Compte actif
                        </span>

                    @else

                        <span class="mt-2 inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50 px-2.5 py-1 text-[11px] font-semibold text-red-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                            Compte désactivé
                        </span>

                    @endif

                </div>


                {{-- Vérification --}}
                <div>

                    <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                        Email
                    </p>

                    @if ($user->email_verified_at)

                        <span class="mt-2 inline-flex items-center rounded-full border border-green-100 bg-green-50 px-2.5 py-1 text-[11px] font-semibold text-green-700">
                            Vérifié
                        </span>

                    @else

                        <span class="mt-2 inline-flex items-center rounded-full border border-amber-100 bg-amber-50 px-2.5 py-1 text-[11px] font-semibold text-amber-700">
                            Non vérifié
                        </span>

                    @endif

                </div>


                {{-- Rôle --}}
                <div>

                    <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                        Rôle
                    </p>

                    <p class="mt-1 text-sm font-semibold text-gray-700">
                        {{ $user->is_admin ? 'Administrateur FON-KPA' : 'Client FON-KPA' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- ZONE DE SUPPRESSION                                      --}}
        {{-- ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-red-100 bg-white shadow-sm">

            <div class="flex flex-col gap-4 px-5 py-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <p class="text-sm font-semibold text-gray-800">
                        Supprimer cet utilisateur
                    </p>

                    <p class="mt-1 text-xs leading-5 text-gray-400">
                        Cette action est définitive et ne peut pas être annulée.
                    </p>

                </div>


                @if ($user->id !== auth()->id())

                    <button
                        type="button"
                        onclick="document.getElementById('delete-user').showModal()"
                        class="inline-flex h-9 items-center justify-center gap-2 rounded-lg border border-red-200 bg-white px-4 text-sm font-medium text-red-600 transition hover:bg-red-50"
                    >

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0v12a1 1 0 01-1 1H8a1 1 0 01-1-1V7m3 4v6m4-6v6"
                            />
                        </svg>

                        Supprimer

                    </button>

                @else

                    <button
                        type="button"
                        disabled
                        title="Vous ne pouvez pas supprimer votre propre compte."
                        class="inline-flex h-9 cursor-not-allowed items-center justify-center gap-2 rounded-lg border border-gray-100 bg-gray-50 px-4 text-sm font-medium text-gray-300"
                    >

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0v12a1 1 0 01-1 1H8a1 1 0 01-1-1V7m3 4v6m4-6v6"
                            />
                        </svg>

                        Supprimer

                    </button>

                @endif

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- MODAL DE DÉSACTIVATION                                   --}}
        {{-- ========================================================= --}}
        <dialog
            id="deactivate-user"
            class="modal"
        >

            <div class="modal-box max-w-md overflow-hidden rounded-2xl p-0">

                <div class="px-6 py-6">

                    <div class="flex items-start gap-4">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-orange-50 text-orange-600">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M18.36 6.64A9 9 0 115.64 6.64M12 8v4"
                                />
                            </svg>

                        </div>

                        <div>

                            <h3 class="text-base font-semibold text-gray-800">
                                Désactiver le compte ?
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-gray-500">
                                Vous êtes sur le point de désactiver le compte de
                                <span class="font-semibold text-gray-700">
                                    {{ $user->name }}
                                </span>.
                                L'utilisateur ne pourra plus se connecter.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="flex items-center justify-end gap-3 bg-gray-50 px-6 py-4">

                    <form method="dialog">

                        <button
                            type="submit"
                            class="rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50"
                        >
                            Annuler
                        </button>

                    </form>


                    <form
                        action="{{ route('admin.users.deactivate', $user) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="rounded-lg bg-orange-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-orange-700"
                        >
                            Désactiver
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


        {{-- ========================================================= --}}
        {{-- MODAL DE SUPPRESSION                                     --}}
        {{-- ========================================================= --}}
        <dialog
            id="delete-user"
            class="modal"
        >

            <div class="modal-box max-w-md overflow-hidden rounded-2xl p-0">

                {{-- Header --}}
                <div class="px-6 py-6">

                    <div class="flex items-start gap-4">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-600">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0v12a1 1 0 01-1 1H8a1 1 0 01-1-1V7m3 4v6m4-6v6"
                                />
                            </svg>

                        </div>


                        <div>

                            <h3 class="text-base font-semibold text-gray-800">
                                Supprimer l'utilisateur ?
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-gray-500">
                                Vous êtes sur le point de supprimer
                                <span class="font-semibold text-gray-700">
                                    {{ $user->name }}
                                </span>.
                                Cette action est irréversible.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Footer --}}
                <div class="flex items-center justify-end gap-3 bg-gray-50 px-6 py-4">

                    <form method="dialog">

                        <button
                            type="submit"
                            class="rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50"
                        >
                            Annuler
                        </button>

                    </form>


                    <form
                        action="{{ route('admin.users.destroy', $user) }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700"
                        >
                            Supprimer
                        </button>

                    </form>

                </div>

            </div>


            {{-- Fermer en cliquant à l'extérieur --}}
            <form
                method="dialog"
                class="modal-backdrop"
            >
                <button>close</button>
            </form>

        </dialog>

    </div>

</x-admin-layout>