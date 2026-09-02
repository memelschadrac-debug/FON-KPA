<x-guest-layout>
@section('title', 'Inscription')
    {{-- ============================= --}}
    {{-- EN-TÊTE --}}
    {{-- ============================= --}}

    <div class="mb-7">

        <h2
            class="
                text-[18px]
                font-semibold
                leading-6
                tracking-tight
                text-gray-900
            "
        >
            
        </h2>

        <p
            class="
                mt-1.5
                max-w-sm
                text-[12px]
                leading-[1.55]
                text-gray-500
            "
        >
            Rejoignez FON-KPA et découvrez les saveurs
            authentiques de la cuisine ivoirienne.
        </p>

    </div>


    {{-- ============================= --}}
    {{-- FORMULAIRE --}}
    {{-- ============================= --}}

    <form
        method="POST"
        action="{{ route('register') }}"
        class="space-y-4"
    >

        @csrf


        {{-- ============================= --}}
        {{-- NOM --}}
        {{-- ============================= --}}

        <div>

            <label
                for="name"
                class="
                    mb-1.5
                    block
                    text-[12px]
                    font-medium
                    text-gray-700
                "
            >
                Nom complet
            </label>

            <div class="relative">

                {{-- Icône utilisateur --}}
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
                            d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />

                        <path
                            d="M4.5 20.25a7.5 7.5 0 0 1 15 0"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />

                    </svg>

                </div>


                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Votre nom complet"
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


            @error('name')

                <p class="mt-1.5 text-[11px] text-red-500">
                    {{ $message }}
                </p>

            @enderror

        </div>



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

            <label
                for="password"
                class="
                    mb-1.5
                    block
                    text-[12px]
                    font-medium
                    text-gray-700
                "
            >
                Mot de passe
            </label>

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
                    autocomplete="new-password"
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


                {{-- Afficher / masquer --}}
                <button
                    type="button"
                    onclick="togglePassword('password', 'password-eye')"
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


            @error('password')

                <p class="mt-1.5 text-[11px] text-red-500">
                    {{ $message }}
                </p>

            @enderror

        </div>



        {{-- ============================= --}}
        {{-- CONFIRMATION MOT DE PASSE --}}
        {{-- ============================= --}}

        <div>

            <label
                for="password_confirmation"
                class="
                    mb-1.5
                    block
                    text-[12px]
                    font-medium
                    text-gray-700
                "
            >
                Confirmer le mot de passe
            </label>

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
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="Confirmez votre mot de passe"
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


                {{-- Afficher / masquer --}}
                <button
                    type="button"
                    onclick="togglePassword('password_confirmation', 'confirmation-eye')"
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
                    aria-label="Afficher la confirmation du mot de passe"
                >

                    <svg
                        id="confirmation-eye"
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


            @error('password_confirmation')

                <p class="mt-1.5 text-[11px] text-red-500">
                    {{ $message }}
                </p>

            @enderror

        </div>



        {{-- ============================= --}}
        {{-- BOUTON INSCRIPTION --}}
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
            Créer mon compte
        </button>

    </form>



    {{-- ============================= --}}
    {{-- CONNEXION --}}
    {{-- ============================= --}}

    @if (Route::has('login'))

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

                Vous avez déjà un compte ?

                <a
                    href="{{ route('login') }}"
                    class="
                        ml-0.5
                        font-semibold
                        text-[#e25f12]
                        transition-colors
                        duration-200
                        hover:text-[#593114]
                    "
                >
                    Se connecter
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

        function togglePassword(inputId, eyeId) {

            const password =
                document.getElementById(inputId);

            const eye =
                document.getElementById(eyeId);


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