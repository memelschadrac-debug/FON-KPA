<x-guest-layout>

    @section('title', 'Mot de passe oublié')


    {{-- ============================= --}}
    {{-- EN-TÊTE --}}
    {{-- ============================= --}}

    <div class="mb-7">

        <h2 class="text-2xl font-black text-[#593114]">
           
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
            Indiquez votre adresse e-mail et nous vous enverrons
            un lien pour réinitialiser votre mot de passe en toute sécurité.
        </p>

    </div>


    {{-- ============================= --}}
    {{-- STATUT DE SESSION --}}
    {{-- ============================= --}}

    <x-auth-session-status
        class="mb-4 text-[11px] text-green-600"
        :status="session('status')"
    />


    {{-- ============================= --}}
    {{-- FORMULAIRE --}}
    {{-- ============================= --}}

    <form
        method="POST"
        action="{{ route('password.email') }}"
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
            <x-input-error
                :messages="$errors->get('email')"
                class="mt-1.5 text-[11px]"
            />

        </div>


        {{-- ============================= --}}
        {{-- BOUTON --}}
        {{-- ============================= --}}

        <div class="pt-1">

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
                Envoyer le lien de réinitialisation
            </button>

        </div>


        {{-- ============================= --}}
        {{-- RETOUR CONNEXION --}}
        {{-- ============================= --}}

        <div
            class="
                mt-5
                border-t
                border-gray-100
                pt-4
                text-center
            "
        >

            <a
                href="{{ route('login') }}"
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

                <span>Retour à la connexion</span>

            </a>

        </div>

    </form>

</x-guest-layout>