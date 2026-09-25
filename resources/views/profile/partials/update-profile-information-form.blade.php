<section>

    {{-- ============================= --}}
    {{-- EN-TÊTE --}}
    {{-- ============================= --}}

    <header class="mb-7">

        <h2
            class="
                text-[15px]
                font-semibold
                text-gray-800
            "
        >
            {{ __('Informations personnelles') }}
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
            {{ __("Mettez à jour votre nom et votre adresse e-mail.") }}
        </p>

    </header>


    {{-- ============================= --}}
    {{-- FORMULAIRE DE VÉRIFICATION --}}
    {{-- ============================= --}}

    <form
        id="send-verification"
        method="post"
        action="{{ route('verification.send') }}"
    >
        @csrf
    </form>


    {{-- ============================= --}}
    {{-- FORMULAIRE PROFIL --}}
    {{-- ============================= --}}

    <form
        method="post"
        action="{{ route('profile.update') }}"
        class="space-y-5"
    >

        @csrf
        @method('patch')


        {{-- ============================= --}}
        {{-- NOM COMPLET --}}
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
                {{ __('Nom complet') }}
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

                        <circle
                            cx="12"
                            cy="7.5"
                            r="3.25"
                        />

                        <path
                            d="M4.75 19.25c.75-3.35 3.35-5.25 7.25-5.25s6.5 1.9 7.25 5.25"
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


            {{-- Erreur nom --}}

            <x-input-error
                class="mt-1.5 text-[11px]"
                :messages="$errors->get('name')"
            />

        </div>



        {{-- ============================= --}}
        {{-- ADRESSE E-MAIL --}}
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
                {{ __('Adresse e-mail') }}
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

                        <rect
                            x="3.75"
                            y="4.5"
                            width="16.5"
                            height="15"
                            rx="2.25"
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
                class="mt-1.5 text-[11px]"
                :messages="$errors->get('email')"
            />


            {{-- ============================= --}}
            {{-- VÉRIFICATION E-MAIL --}}
            {{-- ============================= --}}

            @if (
                $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail
                && ! $user->hasVerifiedEmail()
            )

                <div
                    class="
                        mt-3
                        rounded-md
                        border
                        border-orange-100
                        bg-orange-50
                        px-3.5
                        py-3
                    "
                >

                    <div class="flex items-start gap-2.5">

                        {{-- Icône information --}}

                        <div class="mt-0.5 shrink-0 text-[#e25f12]">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.6"
                                class="h-[16px] w-[16px]"
                                aria-hidden="true"
                            >

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9"
                                />

                                <path
                                    d="M12 10.5v5"
                                    stroke-linecap="round"
                                />

                                <path
                                    d="M12 7.5h.01"
                                    stroke-linecap="round"
                                />

                            </svg>

                        </div>


                        <div class="min-w-0">

                            <p
                                class="
                                    text-[11px]
                                    font-semibold
                                    text-orange-700
                                "
                            >
                                {{ __('Adresse e-mail non vérifiée') }}
                            </p>

                            <p
                                class="
                                    mt-0.5
                                    text-[11px]
                                    leading-[1.5]
                                    text-orange-600
                                "
                            >
                                {{ __("Votre adresse e-mail n'est pas encore vérifiée.") }}
                            </p>


                            <button
                                form="send-verification"
                                class="
                                    mt-1.5
                                    text-[11px]
                                    font-semibold
                                    text-[#e25f12]
                                    transition-colors
                                    duration-200
                                    hover:text-[#593114]
                                    hover:underline
                                "
                            >
                                {{ __('Renvoyer le lien de vérification') }}
                            </button>


                            @if (session('status') === 'verification-link-sent')

                                <p
                                    class="
                                        mt-1.5
                                        text-[11px]
                                        font-medium
                                        text-green-600
                                    "
                                >
                                    {{ __('Un nouveau lien a été envoyé à votre adresse e-mail.') }}
                                </p>

                            @endif

                        </div>

                    </div>

                </div>

            @endif

        </div>



        {{-- ============================= --}}
        {{-- ACTION --}}
        {{-- ============================= --}}

        <div
            class="
                flex
                items-center
                gap-3
                pt-1
            "
        >

            <button
                type="submit"
                class="
                    flex
                    h-10
                    items-center
                    justify-center
                    rounded-md
                    bg-[#593114]
                    px-5
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
                {{ __('Enregistrer') }}
            </button>


            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="
                        text-[11px]
                        font-medium
                        text-green-600
                    "
                >
                    {{ __('Modifications enregistrées.') }}
                </p>

            @endif

        </div>

    </form>

</section>