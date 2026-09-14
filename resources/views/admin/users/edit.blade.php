<x-admin-layout>

    {{-- =========================================================
        PAGE : MODIFICATION D'UN UTILISATEUR
    ========================================================== --}}

    <div class="mx-auto max-w-3xl">

        {{-- =====================================================
            RETOUR
        ====================================================== --}}
        <div class="mb-5">
            <a
                href="{{ route('admin.users.index') }}"
                class="inline-flex items-center gap-1.5 text-[12px] font-medium text-gray-500 transition hover:text-[#593114]"
            >
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                    class="h-3.5 w-3.5"
                >
                    <path d="M19 12H5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="m11 18-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                Retour aux utilisateurs
            </a>
        </div>

        {{-- =====================================================
            EN-TÊTE
        ====================================================== --}}
        <div class="mb-6">

            <p class="mb-1 text-[11px] font-medium uppercase tracking-[0.08em] text-gray-400">
                Administration
            </p>

            <h2 class="text-[21px] font-semibold tracking-tight text-[#593114]">
                Modifier l'utilisateur
            </h2>

            <p class="mt-1 text-[13px] text-gray-500">
                Modifiez les informations du compte
                <span class="font-medium text-gray-700">
                    {{ $user->name }}
                </span>.
            </p>

        </div>

        {{-- =====================================================
            ERREURS DE VALIDATION
        ====================================================== --}}
        @if ($errors->any())

            <div class="mb-5 rounded-md border border-red-200 bg-red-50 px-4 py-3">

                <p class="mb-1 text-[12px] font-semibold text-red-700">
                    Vérifiez les informations saisies.
                </p>

                <ul class="space-y-1 text-[11px] text-red-600">

                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif

        {{-- =====================================================
            FORMULAIRE
        ====================================================== --}}
        <form
            method="POST"
            action="{{ route('admin.users.update', $user) }}"
        >

            @csrf
            @method('PUT')

            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                {{-- =================================================
                    CONTENU
                ================================================== --}}
                <div class="p-6 sm:p-7">

                    <div class="space-y-6">

                        {{-- =================================================
                            INFORMATIONS PERSONNELLES
                        ================================================== --}}
                        <div>

                            <div class="mb-4">

                                <p class="text-[12px] font-semibold text-[#593114]">
                                    Informations personnelles
                                </p>

                                <p class="mt-0.5 text-[10px] text-gray-400">
                                    Modifiez les informations principales de cet utilisateur.
                                </p>

                            </div>

                            <div class="space-y-5">

                                {{-- NOM --}}
                                <div>

                                    <label
                                        for="name"
                                        class="mb-1.5 block text-[12px] font-medium text-gray-700"
                                    >
                                        Nom complet
                                    </label>

                                    <div class="relative">

                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">

                                            <svg
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1.6"
                                                class="h-4 w-4"
                                            >
                                                <circle cx="12" cy="8" r="3.25"/>
                                                <path
                                                    d="M5.5 19a6.5 6.5 0 0 1 13 0"
                                                    stroke-linecap="round"
                                                />
                                            </svg>

                                        </div>

                                        <input
                                            id="name"
                                            name="name"
                                            type="text"
                                            value="{{ old('name', $user->name) }}"
                                            required
                                            autofocus
                                            autocomplete="name"
                                            class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-3 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                        >

                                    </div>

                                </div>

                                {{-- EMAIL --}}
                                <div>

                                    <label
                                        for="email"
                                        class="mb-1.5 block text-[12px] font-medium text-gray-700"
                                    >
                                        Adresse e-mail
                                    </label>

                                    <div class="relative">

                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">

                                            <svg
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1.6"
                                                class="h-4 w-4"
                                            >
                                                <path
                                                    d="M3.75 6.75A2.25 2.25 0 0 1 6 4.5h12a2.25 2.25 0 0 1 2.25 2.25v10.5A2.25 2.25 0 0 1 18 19.5H6a2.25 2.25 0 0 1-2.25-2.25V6.75Z"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="m4.5 7.5 6.15 4.1a2.4 2.4 0 0 0 2.7 0l6.15-4.1"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>

                                        </div>

                                        <input
                                            id="email"
                                            name="email"
                                            type="email"
                                            value="{{ old('email', $user->email) }}"
                                            required
                                            autocomplete="email"
                                            class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-3 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                        >

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- SÉPARATION --}}
                        <div class="border-t border-gray-100"></div>

                        {{-- =================================================
                            SÉCURITÉ
                        ================================================== --}}
                        <div>

                            <div class="mb-4">

                                <p class="text-[12px] font-semibold text-[#593114]">
                                    Sécurité
                                </p>

                                <p class="mt-0.5 text-[10px] text-gray-400">
                                    Laissez les champs vides si vous ne souhaitez pas modifier le mot de passe.
                                </p>

                            </div>

                            <div class="space-y-5">

                                {{-- MOT DE PASSE --}}
                                <div>

                                    <label
                                        for="password"
                                        class="mb-1.5 block text-[12px] font-medium text-gray-700"
                                    >
                                        Nouveau mot de passe
                                    </label>

                                    <div class="relative">

                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">

                                            <svg
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1.6"
                                                class="h-4 w-4"
                                            >
                                                <path
                                                    d="M7.5 10.5V7.75a4.5 4.5 0 0 1 9 0v2.75"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M5.75 10.5h12.5A1.75 1.75 0 0 1 20 12.25v6A1.75 1.75 0 0 1 18.25 20H5.75A1.75 1.75 0 0 1 4 18.25v-6a1.75 1.75 0 0 1 1.75-1.75Z"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M12 14.5v2"
                                                    stroke-linecap="round"
                                                />
                                            </svg>

                                        </div>

                                        <input
                                            id="password"
                                            name="password"
                                            type="password"
                                            autocomplete="new-password"
                                            placeholder="Laisser vide pour conserver le mot de passe actuel"
                                            class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-10 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                        >

                                        <button
                                            type="button"
                                            onclick="togglePassword('password', 'password-eye')"
                                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 transition-colors duration-200 hover:text-[#593114]"
                                            aria-label="Afficher le mot de passe"
                                        >
                                            <svg
                                                id="password-eye"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1.6"
                                                class="h-4 w-4"
                                            >
                                                <path
                                                    d="M2.75 12s3.25-6 9.25-6 9.25 6 9.25 6-3.25 6-9.25 6-9.25-6-9.25-6Z"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <circle cx="12" cy="12" r="2.5"/>
                                            </svg>
                                        </button>

                                    </div>

                                </div>

                                {{-- CONFIRMATION --}}
                                <div>

                                    <label
                                        for="password_confirmation"
                                        class="mb-1.5 block text-[12px] font-medium text-gray-700"
                                    >
                                        Confirmer le nouveau mot de passe
                                    </label>

                                    <div class="relative">

                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">

                                            <svg
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1.6"
                                                class="h-4 w-4"
                                            >
                                                <path
                                                    d="M7.5 10.5V7.75a4.5 4.5 0 0 1 9 0v2.75"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M5.75 10.5h12.5A1.75 1.75 0 0 1 20 12.25v6A1.75 1.75 0 0 1 18.25 20H5.75A1.75 1.75 0 0 1 4 18.25v-6a1.75 1.75 0 0 1 1.75-1.75Z"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M12 14.5v2"
                                                    stroke-linecap="round"
                                                />
                                            </svg>

                                        </div>

                                        <input
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            type="password"
                                            autocomplete="new-password"
                                            placeholder="Confirmer le nouveau mot de passe"
                                            class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-10 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                        >

                                        <button
                                            type="button"
                                            onclick="togglePassword('password_confirmation', 'password-confirmation-eye')"
                                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 transition-colors duration-200 hover:text-[#593114]"
                                            aria-label="Afficher la confirmation du mot de passe"
                                        >
                                            <svg
                                                id="password-confirmation-eye"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1.6"
                                                class="h-4 w-4"
                                            >
                                                <path
                                                    d="M2.75 12s3.25-6 9.25-6 9.25 6 9.25 6-3.25 6-9.25 6-9.25-6-9.25-6Z"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <circle cx="12" cy="12" r="2.5"/>
                                            </svg>
                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- SÉPARATION --}}
                        <div class="border-t border-gray-100"></div>

                        {{-- =================================================
                            RÔLE ET ACCÈS
                        ================================================== --}}
                        <div>

                            <div class="mb-4">

                                <p class="text-[12px] font-semibold text-[#593114]">
                                    Rôle et accès
                                </p>

                                <p class="mt-0.5 text-[10px] text-gray-400">
                                    Définissez les droits d'accès de cet utilisateur sur FON-KPA.
                                </p>

                            </div>

                            <div class="grid gap-3 sm:grid-cols-2">

                                {{-- CLIENT --}}
                                <label
                                    for="role_client"
                                    class="group flex cursor-pointer items-start gap-3 rounded-md border border-gray-200 bg-[#f8f8f8] p-4 transition hover:border-[#593114]/40 hover:bg-white"
                                >

                                    <input
                                        id="role_client"
                                        name="is_admin"
                                        type="radio"
                                        value="0"
                                        @checked(old('is_admin', $user->is_admin ? '1' : '0') === '0')
                                        class="mt-0.5 h-3.5 w-3.5 border-gray-300 text-[#593114] focus:ring-[#593114]"
                                    >

                                    <div>

                                        <p class="text-[12px] font-medium text-gray-700">
                                            Client
                                        </p>

                                        <p class="mt-1 text-[10px] leading-[1.5] text-gray-400">
                                            Accès à son espace personnel et aux fonctionnalités de la boutique.
                                        </p>

                                    </div>

                                </label>

                                {{-- ADMINISTRATEUR --}}
                                <label
                                    for="role_admin"
                                    class="group flex cursor-pointer items-start gap-3 rounded-md border border-gray-200 bg-[#f8f8f8] p-4 transition hover:border-[#593114]/40 hover:bg-white"
                                >

                                    <input
                                        id="role_admin"
                                        name="is_admin"
                                        type="radio"
                                        value="1"
                                        @checked(old('is_admin', $user->is_admin ? '1' : '0') === '1')
                                        class="mt-0.5 h-3.5 w-3.5 border-gray-300 text-[#593114] focus:ring-[#593114]"
                                    >

                                    <div>

                                        <p class="text-[12px] font-medium text-gray-700">
                                            Administrateur
                                        </p>

                                        <p class="mt-1 text-[10px] leading-[1.5] text-gray-400">
                                            Accès au back-office et aux fonctionnalités d'administration de FON-KPA.
                                        </p>

                                    </div>

                                </label>

                            </div>

                            {{-- AVERTISSEMENT ADMIN --}}
                            <div
                                id="admin-role-notice"
                                class="mt-3 hidden rounded-md border border-[#E25F12]/20 bg-[#E25F12]/[0.05] px-4 py-3"
                            >

                                <div class="flex items-start gap-2.5">

                                    <div class="mt-0.5 shrink-0 text-[#E25F12]">

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.6"
                                            class="h-4 w-4"
                                        >
                                            <circle cx="12" cy="12" r="9"/>
                                            <path d="M12 8v4" stroke-linecap="round"/>
                                            <path d="M12 15.5h.01" stroke-linecap="round"/>
                                        </svg>

                                    </div>

                                    <div>

                                        <p class="text-[11px] font-semibold text-[#593114]">
                                            Accès administrateur
                                        </p>

                                        <p class="mt-0.5 text-[10px] leading-[1.5] text-gray-500">
                                            Ce rôle donne accès au back-office FON-KPA. Attribuez-le uniquement
                                            aux personnes autorisées à administrer la plateforme.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- SÉPARATION --}}
                        <div class="border-t border-gray-100"></div>

                        {{-- =================================================
                            STATUT DU COMPTE
                        ================================================== --}}
                        <div>

                            <div class="mb-4">

                                <p class="text-[12px] font-semibold text-[#593114]">
                                    Statut du compte
                                </p>

                                <p class="mt-0.5 text-[10px] text-gray-400">
                                    Contrôlez si l'utilisateur peut se connecter à son compte.
                                </p>

                            </div>

                            <div class="grid gap-3 sm:grid-cols-2">

                                {{-- ACTIF --}}
                                <label
                                    for="status_active"
                                    class="group flex cursor-pointer items-start gap-3 rounded-md border border-gray-200 bg-[#f8f8f8] p-4 transition hover:border-green-200 hover:bg-white"
                                >

                                    <input
                                        id="status_active"
                                        name="is_active"
                                        type="radio"
                                        value="1"
                                        @checked(old('is_active', $user->is_active ? '1' : '0') === '1')
                                        class="mt-0.5 h-3.5 w-3.5 border-gray-300 text-[#593114] focus:ring-[#593114]"
                                    >

                                    <div>

                                        <div class="flex items-center gap-2">

                                            <p class="text-[12px] font-medium text-gray-700">
                                                Actif
                                            </p>

                                            <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-0.5 text-[9px] font-medium text-green-600">
                                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                                Autorisé
                                            </span>

                                        </div>

                                        <p class="mt-1 text-[10px] leading-[1.5] text-gray-400">
                                            L'utilisateur pourra se connecter à son compte.
                                        </p>

                                    </div>

                                </label>

                                {{-- DÉSACTIVÉ --}}
                                <label
                                    for="status_inactive"
                                    class="group flex cursor-pointer items-start gap-3 rounded-md border border-gray-200 bg-[#f8f8f8] p-4 transition hover:border-red-200 hover:bg-white"
                                >

                                    <input
                                        id="status_inactive"
                                        name="is_active"
                                        type="radio"
                                        value="0"
                                        @checked(old('is_active', $user->is_active ? '1' : '0') === '0')
                                        class="mt-0.5 h-3.5 w-3.5 border-gray-300 text-[#593114] focus:ring-[#593114]"
                                    >

                                    <div>

                                        <div class="flex items-center gap-2">

                                            <p class="text-[12px] font-medium text-gray-700">
                                                Désactivé
                                            </p>

                                            <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-0.5 text-[9px] font-medium text-red-500">
                                                <span class="h-1.5 w-1.5 rounded-full bg-red-400"></span>
                                                Bloqué
                                            </span>

                                        </div>

                                        <p class="mt-1 text-[10px] leading-[1.5] text-gray-400">
                                            L'utilisateur ne pourra plus se connecter à son compte.
                                        </p>

                                    </div>

                                </label>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- =================================================
                    ACTIONS
                ================================================== --}}
                <div class="flex items-center justify-end gap-2 border-t border-gray-100 bg-gray-50/70 px-6 py-4 sm:px-7">

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="inline-flex h-9 items-center justify-center rounded-md border border-gray-200 bg-white px-4 text-[11px] font-medium text-gray-600 transition hover:bg-gray-50"
                    >
                        Annuler
                    </a>

                    <button
                        type="submit"
                        class="inline-flex h-9 items-center justify-center rounded-md bg-[#593114] px-4 text-[11px] font-medium text-white transition hover:bg-[#47270f]"
                    >
                        Enregistrer les modifications
                    </button>

                </div>

            </div>

        </form>

    </div>

    {{-- =========================================================
        AFFICHAGE / MASQUAGE DES MOTS DE PASSE
    ========================================================== --}}
    <script>

        function togglePassword(inputId, eyeId) {

            const password = document.getElementById(inputId);
            const eye = document.getElementById(eyeId);

            if (!password || !eye) {
                return;
            }

            if (password.type === 'password') {

                password.type = 'text';

                eye.innerHTML = `
                    <path
                        d="M3 3l18 18"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />

                    <path
                        d="M10.6 6.2A9.8 9.8 0 0 1 12 6c6 0 9.25 6 9.25 6a16.5 16.5 0 0 1-3.15 3.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />

                    <path
                        d="M6.3 8.1C3.95 9.65 2.75 12 2.75 12s3.25 6 9.25 6c1.35 0 2.55-.3 3.6-.75"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                `;

            } else {

                password.type = 'password';

                eye.innerHTML = `
                    <path
                        d="M2.75 12s3.25-6 9.25-6 9.25 6 9.25 6-3.25 6-9.25 6-9.25-6-9.25-6Z"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />

                    <circle
                        cx="12"
                        cy="12"
                        r="2.5"
                    />
                `;

            }

        }

        // =========================================================
        // AFFICHAGE DE L'AVERTISSEMENT ADMINISTRATEUR
        // =========================================================

        document.addEventListener('DOMContentLoaded', function () {

            const adminRole = document.getElementById('role_admin');
            const clientRole = document.getElementById('role_client');
            const adminNotice = document.getElementById('admin-role-notice');

            if (!adminRole || !clientRole || !adminNotice) {
                return;
            }

            function updateAdminNotice() {

                if (adminRole.checked) {
                    adminNotice.classList.remove('hidden');
                } else {
                    adminNotice.classList.add('hidden');
                }

            }

            adminRole.addEventListener('change', updateAdminNotice);
            clientRole.addEventListener('change', updateAdminNotice);

            updateAdminNotice();

        });

    </script>

</x-admin-layout>