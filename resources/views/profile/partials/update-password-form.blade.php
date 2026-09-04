{{-- ========================================================= --}}
{{-- MODIFICATION DU MOT DE PASSE                              --}}
{{-- ========================================================= --}}

<section class="rounded-2xl  bg-white p-5  sm:p-6">

    {{-- En-tête --}}
    <div class="mb-6">
        <h3 class="text-[15px] font-semibold tracking-tight text-gray-900 sm:text-base">
            {{ __('Modifier le mot de passe') }}
        </h3>

        <p class="mt-1 text-[11px] leading-5 text-gray-500 sm:text-xs">
            {{ __('Utilisez un mot de passe long et sécurisé pour protéger votre compte.') }}
        </p>
    </div>


    {{-- ===================================================== --}}
    {{-- FORMULAIRE                                            --}}
    {{-- ===================================================== --}}

    <form method="POST" action="{{ route('password.update') }}" class="w-full max-w-xl mx-auto">

        @csrf
        @method('PUT')


        {{-- ================================================ --}}
        {{-- ANCIEN MOT DE PASSE                              --}}
        {{-- ================================================ --}}

        <div class="mb-5">

            <label
                for="update_password_current_password"
                class="mb-1.5 block text-[11px] font-medium text-gray-700"
            >
                {{ __('Mot de passe actuel') }}
            </label>

            <div class="relative">

                {{-- Icône cadenas --}}
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.5 10.5V7a4.5 4.5 0 0 0-9 0v3.5M6 10.5h12a1.5 1.5 0 0 1 1.5 1.5v7A1.5 1.5 0 0 1 18 20.5H6A1.5 1.5 0 0 1 4.5 19v-7A1.5 1.5 0 0 1 6 10.5Z"
                        />
                    </svg>

                </div>


                {{-- Champ --}}
                <input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    autocomplete="current-password"
                    class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-10 text-[12px] text-gray-800 outline-none transition-all duration-200 placeholder:text-gray-400 focus:border-[#593114]/30 focus:bg-white focus:ring-2 focus:ring-[#593114]/10"
                    placeholder="Votre mot de passe actuel"
                >


                {{-- Bouton afficher / masquer --}}
                <button
                    type="button"
                    onclick="togglePasswordField(
                        'update_password_current_password',
                        'password-eye-current'
                    )"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 transition hover:text-[#593114]"
                    aria-label="Afficher ou masquer le mot de passe"
                >

                    <svg
                        id="password-eye-current"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.7"
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


            {{-- Erreur --}}
            @if ($errors->updatePassword->has('current_password'))
                <p class="mt-1.5 text-[11px] text-red-500">
                    {{ $errors->updatePassword->first('current_password') }}
                </p>
            @endif

        </div>



        {{-- ================================================ --}}
        {{-- NOUVEAU MOT DE PASSE                             --}}
        {{-- ================================================ --}}

        <div class="mb-5">

            <label
                for="update_password_password"
                class="mb-1.5 block text-[11px] font-medium text-gray-700"
            >
                {{ __('Nouveau mot de passe') }}
            </label>

            <div class="relative">

                {{-- Icône cadenas --}}
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.5 10.5V7a4.5 4.5 0 0 0-9 0v3.5M6 10.5h12a1.5 1.5 0 0 1 1.5 1.5v7A1.5 1.5 0 0 1 18 20.5H6A1.5 1.5 0 0 1 4.5 19v-7A1.5 1.5 0 0 1 6 10.5Z"
                        />
                    </svg>

                </div>


                {{-- Champ --}}
                <input
                    id="update_password_password"
                    name="password"
                    type="password"
                    autocomplete="new-password"
                    class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-10 text-[12px] text-gray-800 outline-none transition-all duration-200 placeholder:text-gray-400 focus:border-[#593114]/30 focus:bg-white focus:ring-2 focus:ring-[#593114]/10"
                    placeholder="Votre nouveau mot de passe"
                >


                {{-- Bouton afficher / masquer --}}
                <button
                    type="button"
                    onclick="togglePasswordField(
                        'update_password_password',
                        'password-eye-new'
                    )"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 transition hover:text-[#593114]"
                    aria-label="Afficher ou masquer le mot de passe"
                >

                    <svg
                        id="password-eye-new"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.7"
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


            {{-- Erreur --}}
            @if ($errors->updatePassword->has('password'))
                <p class="mt-1.5 text-[11px] text-red-500">
                    {{ $errors->updatePassword->first('password') }}
                </p>
            @endif

        </div>



        {{-- ================================================ --}}
        {{-- CONFIRMATION                                     --}}
        {{-- ================================================ --}}

        <div class="mb-6">

            <label
                for="update_password_password_confirmation"
                class="mb-1.5 block text-[11px] font-medium text-gray-700"
            >
                {{ __('Confirmer le nouveau mot de passe') }}
            </label>

            <div class="relative">

                {{-- Icône cadenas --}}
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.5 10.5V7a4.5 4.5 0 0 0-9 0v3.5M6 10.5h12a1.5 1.5 0 0 1 1.5 1.5v7A1.5 1.5 0 0 1 18 20.5H6A1.5 1.5 0 0 1 4.5 19v-7A1.5 1.5 0 0 1 6 10.5Z"
                        />
                    </svg>

                </div>


                {{-- Champ --}}
                <input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-10 text-[12px] text-gray-800 outline-none transition-all duration-200 placeholder:text-gray-400 focus:border-[#593114]/30 focus:bg-white focus:ring-2 focus:ring-[#593114]/10"
                    placeholder="Confirmez votre nouveau mot de passe"
                >


                {{-- Bouton afficher / masquer --}}
                <button
                    type="button"
                    onclick="togglePasswordField(
                        'update_password_password_confirmation',
                        'password-eye-confirm'
                    )"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 transition hover:text-[#593114]"
                    aria-label="Afficher ou masquer le mot de passe"
                >

                    <svg
                        id="password-eye-confirm"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.7"
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


            {{-- Erreur --}}
            @if ($errors->updatePassword->has('password_confirmation'))
                <p class="mt-1.5 text-[11px] text-red-500">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </p>
            @endif

        </div>



        {{-- ================================================ --}}
        {{-- ACTIONS                                          --}}
        {{-- ================================================ --}}

        <div class="flex items-center justify-end border-t border-gray-100 pt-5">

            <button
                type="submit"
                class="inline-flex h-10 items-center gap-2 rounded-md bg-[#593114] px-5 text-[12px] font-semibold text-white shadow-sm transition-all duration-200 hover:bg-[#47270f] hover:shadow-md focus:outline-none focus:ring-2 focus:ring-[#593114]/20 focus:ring-offset-1"
            >

                {{-- Icône sauvegarde --}}
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 4.5A1.5 1.5 0 0 1 6.5 3h9.879a1.5 1.5 0 0 1 1.06.44l2.121 2.12A1.5 1.5 0 0 1 20 6.621V19.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 4 19.5v-15A1.5 1.5 0 0 1 5 4.5Z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8 3v5h8V3M8 21v-6h8v6"
                    />
                </svg>

                {{ __('Enregistrer') }}

            </button>

        </div>

    </form>

</section>



{{-- ========================================================= --}}
{{-- MESSAGE DE SUCCÈS DAISYUI                                 --}}
{{-- ========================================================= --}}

@if (session('status') === 'password-updated')

    <div
        x-data="{ show: true }"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-4"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-4"
        x-init="setTimeout(() => show = false, 3500)"
        class="toast toast-top toast-end z-50 p-4"
    >

        <div
            role="alert"
            class="alert flex w-[320px] items-start gap-3 rounded-xl border border-green-200 bg-white px-4 py-3 shadow-xl"
        >

            {{-- Icône succès --}}
            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-green-50 text-green-600">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m5 12 4 4L19 6"
                    />
                </svg>

            </div>


            {{-- Texte --}}
            <div class="min-w-0 flex-1">

                <p class="text-[12px] font-semibold text-gray-900">
                    {{ __('Mot de passe mis à jour') }}
                </p>

                <p class="mt-0.5 text-[11px] leading-4 text-gray-500">
                    {{ __('Votre nouveau mot de passe a été enregistré avec succès.') }}
                </p>

            </div>


            {{-- Fermer --}}
            <button
                type="button"
                x-on:click="show = false"
                class="text-gray-400 transition hover:text-gray-700"
                aria-label="Fermer"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 6l12 12M6 18 18 6"
                    />
                </svg>

            </button>

        </div>

    </div>

@endif



{{-- ========================================================= --}}
{{-- JAVASCRIPT : AFFICHER / MASQUER MOT DE PASSE              --}}
{{-- ========================================================= --}}

<script>

    function togglePasswordField(inputId, eyeId) {

        const input = document.getElementById(inputId);
        const eye = document.getElementById(eyeId);

        // Vérifie que les éléments existent
        if (!input || !eye) {
            return;
        }


        // ================================================
        // AFFICHER LE MOT DE PASSE
        // ================================================

        if (input.type === 'password') {

            input.type = 'text';

            eye.innerHTML = `
                <path
                    d="M3 3l18 18"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />

                <path
                    d="M10.58 10.58a2 2 0 0 0 2.83 2.83"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />

                <path
                    d="M9.88 5.09A9.77 9.77 0 0 1 12 4.75c6 0 9.25 7.25 9.25 7.25a17.8 17.8 0 0 1-3.08 4.14M6.61 6.61C4.05 8.35 2.75 12 2.75 12s3.25 7.25 9.25 7.25a9.77 9.77 0 0 0 3.37-.6"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            `;

        }


        // ================================================
        // MASQUER LE MOT DE PASSE
        // ================================================

        else {

            input.type = 'password';

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

</script>