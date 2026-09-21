{{-- ========================================================= --}}
{{-- FOOTER FON-KPA                                             --}}
{{-- Inspiré fidèlement de la maquette de référence            --}}
{{-- ========================================================= --}}

<footer class="border-t border-[#E5DDD5] bg-[#FCF8F3] text-[#593114]">

    <div class="mx-auto w-full max-w-[1720px] px-5 py-12 sm:px-8 sm:py-14 lg:px-10 xl:px-14">

        {{-- ===================================================== --}}
        {{-- CONTENU PRINCIPAL                                    --}}
        {{-- ===================================================== --}}

        <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-12 lg:gap-10 xl:gap-14">


            {{-- ================================================= --}}
            {{-- IDENTITÉ + NEWSLETTER                             --}}
            {{-- ================================================= --}}

            <div class="sm:col-span-2 lg:col-span-4">

                {{-- Logo --}}
                <a
                    href="{{ route('home') }}"
                    class="inline-flex items-center"
                >

                    <img
                        src="{{ asset('images/FON-KPA LOGO1.png') }}"
                        alt="Logo FON-KPA"
                        class="h-9 w-auto object-contain"
                    >

                </a>


                {{-- Newsletter --}}
                <div class="mt-8 max-w-sm">

                    <h3 class="text-[13px] font-bold tracking-tight text-[#593114]">
                        Abonnez-vous à notre newsletter
                    </h3>

                    <p class="mt-2 max-w-xs text-[11px] leading-5 text-[#7D7067]">
                        Recevez nos nouveautés, nos offres et nos meilleures
                        découvertes culinaires directement dans votre boîte mail.
                    </p>


                    {{-- Champ newsletter --}}
                    <form
                        action="#"
                        method="POST"
                        class="mt-4"
                    >

                        @csrf

                        <div class="flex h-10 w-full max-w-sm overflow-hidden rounded-full border border-[#DED3C9] bg-white p-1 transition-all duration-200 focus-within:border-[#E25F12] focus-within:ring-2 focus-within:ring-[#E25F12]/10">

                            <input
                                type="email"
                                name="email"
                                placeholder="Votre adresse email"
                                class="min-w-0 flex-1 border-0 bg-transparent px-3 text-[10px] text-[#593114] outline-none placeholder:text-[#A79A91]"
                                aria-label="Votre adresse email"
                            >

                            <button
                                type="submit"
                                class="btn h-8 min-h-8 rounded-full border-0 bg-[#593114] px-4 text-[9px] font-bold text-white shadow-none hover:bg-[#E25F12]"
                            >
                                S'inscrire
                            </button>

                        </div>

                    </form>

                </div>


                {{-- Réseaux sociaux --}}
                <div class="mt-6 flex items-center gap-2">

                    <a
                        href="#"
                        aria-label="Facebook"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-[#DED4CB] bg-white text-[#593114] transition-all duration-200 hover:-translate-y-0.5 hover:border-[#593114] hover:bg-[#593114] hover:text-white"
                    >
                        <i class="bi bi-facebook text-[12px]"></i>
                    </a>

                    <a
                        href="#"
                        aria-label="Instagram"
                        class="flex h-10 w-10  items-center justify-center rounded-full border border-[#DED4CB] bg-white text-[#593114] transition-all duration-200 hover:-translate-y-0.5 hover:border-[#593114] hover:bg-[#593114] hover:text-white"
                    >
                        <i class="bi bi-instagram text-[12px]"></i>
                    </a>

                    <a
                        href="#"
                        aria-label="WhatsApp"
                        class="flex h-10 w-10  items-center justify-center rounded-full border border-[#DED4CB] bg-white text-[#593114] transition-all duration-200 hover:-translate-y-0.5 hover:border-[#593114] hover:bg-[#593114] hover:text-white"
                    >
                        <i class="bi bi-whatsapp text-[12px]"></i>
                    </a>

                    <a
                        href="#"
                        aria-label="TikTok"
                        class="flex h-10 w-10  items-center justify-center rounded-full border border-[#DED4CB] bg-white text-[#593114] transition-all duration-200 hover:-translate-y-0.5 hover:border-[#593114] hover:bg-[#593114] hover:text-white"
                    >
                        <i class="bi bi-tiktok text-[12px]"></i>
                    </a>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- SERVICES                                         --}}
            {{-- ================================================= --}}

            <div class="lg:col-span-2">

                <h3 class="text-[10px] font-bold text-[#593114]">
                    Services
                </h3>

                <nav class="mt-5 flex flex-col gap-3">

                    <a
                        href="{{ route('plats.index') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Commander
                    </a>

                    <a
                        href="{{ route('cart.index') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Mon panier
                    </a>

                    <a
                        href="{{ route('plats.index') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Livraison
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Nous contacter
                    </a>

                    <a
                        href="{{ route('about') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Notre histoire
                    </a>

                </nav>

            </div>


            {{-- ================================================= --}}
            {{-- LIENS RAPIDES                                    --}}
            {{-- ================================================= --}}

            <div class="lg:col-span-2">

                <h3 class="text-[10px] font-bold text-[#593114]">
                    Liens rapides
                </h3>

                <nav class="mt-5 flex flex-col gap-3">

                    <a
                        href="{{ route('home') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Accueil
                    </a>

                    <a
                        href="{{ route('plats.index') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Nos plats
                    </a>

                    <a
                        href="{{ route('categories.index') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Catégories
                    </a>

                    <a
                        href="{{ route('about') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        À propos
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Contact
                    </a>

                </nav>

            </div>


            {{-- ================================================= --}}
            {{-- À PROPOS                                         --}}
            {{-- ================================================= --}}

            <div class="lg:col-span-2">

                <h3 class="text-[10px] font-bold text-[#593114]">
                    À propos
                </h3>

                <nav class="mt-5 flex flex-col gap-3">

                    <a
                        href="{{ route('about') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Notre histoire
                    </a>

                    <a
                        href="{{ route('categories.index') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Nos spécialités
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Contact
                    </a>

                </nav>

            </div>


            {{-- ================================================= --}}
            {{-- AIDE                                             --}}
            {{-- ================================================= --}}

            <div class="lg:col-span-2">

                <h3 class="text-[10px] font-bold text-[#593114]">
                    Aide
                </h3>

                <nav class="mt-5 flex flex-col gap-3">

                    <a
                        href="{{ route('contact') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Contact
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Support
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="w-fit text-[12px] text-[#7D7067] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        FAQ
                    </a>

                </nav>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- LIGNE INFÉRIEURE                                     --}}
        {{-- ===================================================== --}}

        <div class="mt-12 border-t border-[#DCD3CB] pt-6 sm:mt-14 sm:pt-7">

            <div class="flex flex-col gap-3 text-center sm:flex-row sm:items-center sm:justify-between sm:text-left">

                {{-- Copyright --}}
                <p class="text-[11px] text-[#897A70] sm:text-[11px]">
                    © {{ date('Y') }} FON-KPA. Tous droits réservés.
                </p>


                {{-- Administration --}}
                @auth

                    @if(auth()->user()->is_admin)

                        <a
                            href="{{ route('dashboard') }}"
                            class="group inline-flex items-center justify-center gap-1.5 text-[9px] font-medium text-[#593114] transition-colors duration-200 hover:text-[#E25F12] sm:text-[10px]"
                        >

                            {{-- Icône --}}
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-3.5 w-3.5 transition-transform duration-200 group-hover:scale-110"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06-1.9 1.9-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V20h-2.7v-.1a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06-1.9-1.9.06-.06A1.65 1.65 0 0 0 8 15a1.65 1.65 0 0 0-1.51-1H6.4v-2.7h.09A1.65 1.65 0 0 0 8 10.3a1.65 1.65 0 0 0-.33-1.82l-.06-.06 1.9-1.9.06.06a1.65 1.65 0 0 0 1.82.33 1.65 1.65 0 0 0 1-1.51V5h2.7v.1a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06 1.9 1.9-.06.06A1.65 1.65 0 0 0 19.4 10a1.65 1.65 0 0 0 1.51 1H21v2.7h-.09A1.65 1.65 0 0 0 19.4 15Z"
                                />
                            </svg>

                            <span>
                                Administration
                            </span>

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-3 w-3 transition-transform duration-200 group-hover:translate-x-0.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m9 18 6-6-6-6"
                                />
                            </svg>

                        </a>

                    @endif

                @endauth

            </div>

        </div>

    </div>

</footer>