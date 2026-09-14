<x-guest-layout>
    @section('title', 'Connexion')

    {{-- ============================= --}}
    {{-- EN-TÊTE --}}
    {{-- ============================= --}}

    <div class="mb-7">

        <p
            class="
                mt-1.5
                max-w-sm
                text-[12px]
                leading-[1.55]
                text-gray-500
            "
        >
            Bienvenue sur FON-KPA, votre espace sécurisé pour découvrir
            les saveurs authentiques de la cuisine ivoirienne.
        </p>

    </div>

    {{-- ============================= --}}
    {{-- COMPTE DÉSACTIVÉ --}}
    {{-- ============================= --}}

    @if ($errors->has('email') && old('email'))

        <div
            class="
                mb-5
                flex
                items-start
                gap-3
                rounded-md
                border
                border-red-100
                bg-red-50
                px-3.5
                py-3
            "
        >

            {{-- Icône --}}
            <div class="mt-0.5 shrink-0 text-red-500">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.7"
                    class="h-[17px] w-[17px]"
                    aria-hidden="true"
                >
                    <circle
                        cx="12"
                        cy="12"
                        r="9"
                    />

                    <path
                        d="M12 8v4"
                        stroke-linecap="round"
                    />

                    <path
                        d="M12 15.5h.01"
                        stroke-linecap="round"
                    />
                </svg>

            </div>

            {{-- Message --}}
            <div class="min-w-0">

                <p class="text-[11px] font-semibold text-red-600">
                    Compte désactivé
                </p>

                <p class="mt-0.5 text-[11px] leading-[1.5] text-red-500">
                    {{ $errors->first('email') }}
                </p>

            </div>

        </div>

    @endif


    {{-- ============================= --}}
    {{-- FORMULAIRE --}}
    {{-- ============================= --}}

    <form
        method="POST"
        action="{{ route('login') }}"
        class="space-y-4"
    >

        @csrf


        {{-- ============================= --}}
        {{-- EMAIL --}}
        {{-- ============================= --}}

        <div>

            <label
                for="email"
                class="
                    mb-1.5
                    block
                    text-[12px]
                    font-medium
                    text-gray-700
                "
            >
                Adresse e-mail
            </label>

            <div class="relative">

                {{-- Icône email --}}
                <div
                    class="
                        pointer-events-none
                        absolute
                        inset-y-0
                        left-0
                        flex
                        items-center
                        pl-3
                        text-gray-400
                    "
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.6"
                        class="h-[17px] w-[17px]"
                        aria-hidden="true"
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
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="votre@email.com"
                    class="
                        block
                        h-10
                        w-full
                        rounded-md
                        border
                        border-gray-200
                        bg-[#f3f3f3]
                        pl-9
                        pr-3
                        text-[12px]
                        text-gray-900
                        outline-none
                        placeholder:text-gray-400
                        transition-all
                        duration-200
                        hover:border-gray-300
                        focus:border-[#593114]/30
                        focus:bg-white
                        focus:ring-2
                        focus:ring-[#593114]/10
                    "
                />

            </div>


            {{-- Erreur email --}}
            @error('email')

                <p class="mt-1.5 text-[11px] text-red-500">
                    {{ $message }}
                </p>

            @enderror

        </div>



        {{-- ============================= --}}
        {{-- MOT DE PASSE --}}
        {{-- ============================= --}}

        <div>

            <div class="mb-1.5 flex items-center justify-between">

                <label
                    for="password"
                    class="
                        block
                        text-[12px]
                        font-medium
                        text-gray-700
                    "
                >
                    Mot de passe
                </label>

            </div>


            <div class="relative">

                {{-- Icône cadenas --}}
                <div
                    class="
                        pointer-events-none
                        absolute
                        inset-y-0
                        left-0
                        flex
                        items-center
                        pl-3
                        text-gray-400
                    "
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.6"
                        class="h-[17px] w-[17px]"
                        aria-hidden="true"
                    >

                        <path
                            d="M7.5 10.5V7.75a4.5 4.5 0 0 1 9 0v2.75"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />

                        <path
                            d="M5.75 10.5h12.5a1.75 1.75 0 0 1 1.75 1.75v6A1.75 1.75 0 0 1 18.25 20H5.75A1.75 1.75 0 0 1 4 18.25v-6a1.75 1.75 0 0 1 1.75-1.75Z"
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
                    required
                    autocomplete="current-password"
                    placeholder="Votre mot de passe"
                    class="
                        block
                        h-10
                        w-full
                        rounded-md
                        border
                        border-gray-200
                        bg-[#f3f3f3]
                        pl-9
                        pr-10
                        text-[12px]
                        text-gray-900
                        outline-none
                        placeholder:text-gray-400
                        transition-all
                        duration-200
                        hover:border-gray-300
                        focus:border-[#593114]/30
                        focus:bg-white
                        focus:ring-2
                        focus:ring-[#593114]/10
                    "
                />


                {{-- Bouton afficher / masquer --}}
                <button
                    type="button"
                    onclick="togglePassword()"
                    class="
                        absolute
                        inset-y-0
                        right-0
                        flex
                        items-center
                        px-3
                        text-gray-400
                        transition-colors
                        duration-200
                        hover:text-[#593114]
                    "
                    aria-label="Afficher le mot de passe"
                >

                    <svg
                        id="password-eye"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.6"
                        class="h-[17px] w-[17px]"
                        aria-hidden="true"
                    >

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

                    </svg>

                </button>

            </div>


            {{-- Erreur mot de passe --}}
            @error('password')

                <p class="mt-1.5 text-[11px] text-red-500">
                    {{ $message }}
                </p>

            @enderror

        </div>



        {{-- ============================= --}}
        {{-- MOT DE PASSE OUBLIÉ --}}
        {{-- ============================= --}}

        @if (Route::has('password.request'))

            <div class="flex justify-end -mt-1">

                <a
                    href="{{ route('password.request') }}"
                    class="
                        text-[11px]
                        font-medium
                        text-[#e25f12]
                        transition-colors
                        duration-200
                        hover:text-[#593114]
                    "
                >
                    Mot de passe oublié ?
                </a>

            </div>

        @endif



        {{-- ============================= --}}
        {{-- BOUTON CONNEXION --}}
        {{-- ============================= --}}

        <button
            type="submit"
            class="
                flex
                h-10
                w-full
                items-center
                justify-center
                rounded-md
                bg-[#593114]
                px-4
                text-[12px]
                font-semibold
                text-white
                shadow-sm
                transition-all
                duration-200
                hover:bg-[#47270f]
                hover:shadow-md
                focus:outline-none
                focus:ring-2
                focus:ring-[#593114]/20
                focus:ring-offset-1
                active:scale-[0.99]
            "
        >
            Se connecter
        </button>

    </form>



    {{-- ============================= --}}
    {{-- INSCRIPTION --}}
    {{-- ============================= --}}

    @if (Route::has('register'))

        <div
            class="
                mt-5
                border-t
                border-gray-100
                pt-4
                text-center
            "
        >

            <p
                class="
                    text-[11px]
                    leading-4
                    text-gray-500
                "
            >

                Vous n'avez pas encore de compte ?

                <a
                    href="{{ route('register') }}"
                    class="
                        ml-0.5
                        font-semibold
                        text-[#e25f12]
                        transition-colors
                        duration-200
                        hover:text-[#593114]
                    "
                >
                    Créer un compte
                </a>

            </p>

        </div>

    @endif



    {{-- ============================= --}}
    {{-- RETOUR ACCUEIL --}}
    {{-- ============================= --}}

    <div class="mt-5 text-center">

        <a
            href="{{ route('home') }}"
            class="
                inline-flex
                items-center
                gap-1
                text-[11px]
                font-medium
                text-gray-400
                transition-colors
                duration-200
                hover:text-[#593114]
            "
        >

            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.6"
                class="h-3.5 w-3.5"
                aria-hidden="true"
            >

                <path
                    d="M19 12H5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />

                <path
                    d="m11 18-6-6 6-6"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />

            </svg>

            <span>Retour à l'accueil</span>

        </a>

    </div>



    {{-- ============================= --}}
    {{-- SCRIPT MOT DE PASSE --}}
    {{-- ============================= --}}

    <script>

        function togglePassword() {

            const password =
                document.getElementById('password');

            const eye =
                document.getElementById('password-eye');


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

    </script>

</x-guest-layout>
