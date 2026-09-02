<footer class="border-t border-[#D8D3D0] bg-[#E8E6E5] text-[#593114]">

    <div class="mx-auto w-full max-w-7xl px-5 py-10 sm:px-8 sm:py-12 lg:px-10 lg:py-14">

        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-12 lg:gap-12">

            {{-- ========================= --}}
            {{-- IDENTITÉ FON-KPA --}}
            {{-- ========================= --}}
            <div class="sm:col-span-2 lg:col-span-6">

                <img
                    src="{{ asset('images/FON-KPA LOGO1.png') }}"
                    alt="Logo FON-KPA"
                    class="h-8 w-auto object-contain sm:h-8"
                >

                <p class="mt-3 max-w-md text-sm leading-6 text-[#6B625D]">
                    L'expérience authentique de la gastronomie ivoirienne,
                    livrée chez vous avec passion et qualité.
                </p>

            </div>


            {{-- ========================= --}}
            {{-- NAVIGATION --}}
            {{-- ========================= --}}
            <div class="lg:col-span-3">

                <h3 class="text-base font-semibold text-[#593114]">
                    Navigation
                </h3>

                <nav class="mt-4 flex flex-col gap-2.5">

                    <a
                        href="#"
                        class="w-fit text-sm text-[#6B625D] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Accueil
                    </a>

                    <a
                        href="#"
                        class="w-fit text-sm font-medium text-[#E25F12]"
                    >
                        Nos plats
                    </a>

                    <a
                        href="#"
                        class="w-fit text-sm text-[#6B625D] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Catégories
                    </a>

                    <a
                        href="#"
                        class="w-fit text-sm text-[#6B625D] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        À propos
                    </a>

                    <a
                        href="#"
                        class="w-fit text-sm text-[#6B625D] transition-colors duration-200 hover:text-[#E25F12]"
                    >
                        Contact
                    </a>

                </nav>

            </div>


            {{-- ========================= --}}
            {{-- CONTACT --}}
            {{-- ========================= --}}
            <div class="lg:col-span-3">

                <h3 class="text-base font-semibold text-[#593114]">
                    Contact
                </h3>

                <div class="mt-4 flex flex-col gap-3">

                    {{-- Adresse --}}
                    <div class="flex items-start gap-2.5">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.7"
                            stroke="currentColor"
                            class="mt-0.5 h-4 w-4 shrink-0 text-[#593114]"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"
                            />
                        </svg>

                        <span class="text-sm text-[#6B625D]">
                            Abidjan, Côte d'Ivoire
                        </span>

                    </div>


                    {{-- Téléphone --}}
                    <div class="flex items-center gap-2.5">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.7"
                            stroke="currentColor"
                            class="h-4 w-4 shrink-0 text-[#593114]"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.968-.852-1.09l-4.423-1.081a1.125 1.125 0 0 0-1.173.417l-.97 1.182a11.25 11.25 0 0 1-5.873-5.873l1.182-.97c.35-.287.5-.75.417-1.173L8.977 5.117A1.125 1.125 0 0 0 7.887 4.25H6.5A2.25 2.25 0 0 0 4.25 6.5v.25Z"
                            />
                        </svg>

                        <a
                            href="tel:+2250000000000"
                            class="text-sm text-[#6B625D] transition-colors hover:text-[#E25F12]"
                        >
                            +225 00 00 00 00 00
                        </a>

                    </div>


                    {{-- Email --}}
                    <div class="flex items-center gap-2.5">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.7"
                            stroke="currentColor"
                            class="h-4 w-4 shrink-0 text-[#593114]"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25H4.5a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5H4.5a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.12 1.935l-7.5 4.375a2.25 2.25 0 0 1-2.26 0l-7.5-4.375A2.25 2.25 0 0 1 2.25 6.993V6.75"
                            />
                        </svg>

                        <a
                            href="mailto:contact@fon-kpa.ci"
                            class="break-all text-sm text-[#6B625D] transition-colors hover:text-[#E25F12]"
                        >
                            contact@fon-kpa.ci
                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================= --}}
        {{-- COPYRIGHT --}}
        {{-- ========================= --}}
        <div
            class="mt-10 border-t border-[#D5D1CF] pt-6 sm:mt-12 sm:pt-7"
        >

            <p class="text-xs text-[#593114] sm:text-sm">
                <a href="{{ route('dashboard') }}">
                    © {{ date('Y') }} FON-KPA. Tous droits réservés.
                </a>
            </p>

        </div>

    </div>

</footer>