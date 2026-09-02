<x-app-layout>
 @section('title', 'FON-KPA — À propos')
    {{-- =========================================================
         SECTION 1 — HERO / NOTRE HISTOIRE
    ========================================================== --}}
    <section class="bg-[#FFF9F2] py-14 sm:py-16 lg:py-20">

        <div class="mx-auto max-w-7xl px-6 sm:px-10 lg:px-16 xl:px-20">

            <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">

                {{-- TEXTE --}}
                <div class="max-w-xl">

                    <span
                        class="inline-flex items-center gap-2
                               text-[11px] font-semibold uppercase
                               tracking-[0.18em] text-[#E25F12]"
                    >
                        <i class="bi bi-heart-fill"></i>
                        Notre histoire
                    </span>

                    <h1
                        class="mt-3 text-3xl font-bold leading-tight
                               tracking-tight text-[#593114]
                               sm:text-4xl lg:text-[44px]"
                    >
                        L'amour de la cuisine ivoirienne,
                        <span class="text-[#E25F12]">
                            dans chaque bouchée.
                        </span>
                    </h2>

                    <p
                        class="mt-5 max-w-lg text-sm leading-6
                               text-[#6B625D] sm:text-[15px]"
                    >
                        Chez FON-KPA, nous croyons que la cuisine est
                        bien plus qu'un repas. Elle raconte notre histoire,
                        notre culture et notre manière de partager.
                    </p>

                    <p
                        class="mt-3 max-w-lg text-sm leading-6
                               text-[#6B625D] sm:text-[15px]"
                    >
                        Notre mission est de faire découvrir les saveurs
                        authentiques de la gastronomie ivoirienne,
                        simplement et avec passion.
                    </p>

                    {{-- PETITE INFO --}}
                    <div class="mt-6 flex items-center gap-3">

                        <span
                            class="flex h-9 w-9 shrink-0 items-center
                                   justify-center rounded-full
                                   bg-[#FCE7D8] text-[#E25F12]"
                        >
                            <i class="bi bi-geo-alt-fill text-sm"></i>
                        </span>

                        <span class="text-xs font-semibold text-[#593114]">
                            Une cuisine authentiquement ivoirienne
                        </span>

                    </div>

                </div>


                {{-- IMAGE --}}
                <div
                    class="group relative overflow-hidden rounded-2xl
                           shadow-[0_18px_45px_rgba(89,49,20,0.12)]"
                >

                    <img
                        src="{{ asset('images/garba.jpg') }}"
                        alt="Cuisine ivoirienne"
                        class="h-[280px] w-full object-cover
                               transition-transform duration-700
                               group-hover:scale-105
                               sm:h-[340px] lg:h-[360px]"
                    >

                    <div
                        class="absolute inset-0
                               bg-gradient-to-t
                               from-black/25
                               via-transparent
                               to-transparent"
                    ></div>

                    {{-- BADGE --}}
                    <div
                        class="absolute bottom-4 left-4
                               inline-flex items-center gap-2
                               rounded-full bg-white/95
                               px-3 py-2 text-[10px]
                               font-semibold text-[#593114]
                               shadow-lg backdrop-blur-sm"
                    >
                        <i class="bi bi-stars text-[#E25F12]"></i>
                        Saveurs de Côte d'Ivoire
                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
         SECTION 2 — NOTRE HISTOIRE
    ========================================================== --}}
    <section class="bg-white py-14 sm:py-16 lg:py-20">

        <div class="mx-auto max-w-7xl px-6 sm:px-10 lg:px-16 xl:px-20">

            <div class="grid items-center gap-10 lg:grid-cols-12 lg:gap-14">

                {{-- GALERIE --}}
                <div class="grid grid-cols-5 gap-3 lg:col-span-6">

                    {{-- GRANDE IMAGE --}}
                    <div
                        class="col-span-3 overflow-hidden rounded-2xl"
                    >
                        <img
                            src="{{ asset('images/Garba.jpg') }}"
                            alt="Attiéké ivoirien"
                            class="h-[260px] w-full object-cover
                                   transition-transform duration-500
                                   hover:scale-105
                                   sm:h-[320px]"
                        >
                    </div>

                    {{-- PETITE IMAGE --}}
                    <div
                        class="col-span-2 mt-8 overflow-hidden
                               rounded-2xl"
                    >
                        <img
                            src="{{ asset('images/Garba.jpg') }}"
                            alt="Grillades ivoiriennes"
                            class="h-[210px] w-full object-cover
                                   transition-transform duration-500
                                   hover:scale-105
                                   sm:h-[260px]"
                        >
                    </div>

                </div>


                {{-- TEXTE --}}
                <div class="lg:col-span-6">

                    <span
                        class="text-[11px] font-semibold uppercase
                               tracking-[0.18em] text-[#E25F12]"
                    >
                        Notre histoire
                    </span>

                    <h2
                        class="mt-2 text-3xl font-bold leading-tight
                               tracking-tight text-[#593114]
                               sm:text-4xl"
                    >
                        Une cuisine qui raconte
                        <span class="text-[#E25F12]">
                            notre identité.
                        </span>
                    </h2>

                    <p
                        class="mt-4 text-sm leading-6 text-[#6B625D]
                               sm:text-[15px]"
                    >
                        Tout a commencé avec une envie simple :
                        mettre en valeur les recettes qui font partie
                        de notre quotidien.
                    </p>

                    <p
                        class="mt-3 text-sm leading-6 text-[#6B625D]
                               sm:text-[15px]"
                    >
                        Du garba à l'attiéké, du foutou aux grillades,
                        nous voulons faire découvrir la richesse et
                        la diversité de notre cuisine.
                    </p>

                    {{-- POINTS --}}
                    <div class="mt-6 space-y-3">

                        <div class="flex items-center gap-3">

                            <span
                                class="flex h-8 w-8 items-center
                                       justify-center rounded-full
                                       bg-[#FCE7D8] text-[#E25F12]"
                            >
                                <i class="bi bi-check-lg text-sm"></i>
                            </span>

                            <span class="text-xs font-medium text-[#593114]">
                                Des recettes inspirées de nos traditions
                            </span>

                        </div>

                        <div class="flex items-center gap-3">

                            <span
                                class="flex h-8 w-8 items-center
                                       justify-center rounded-full
                                       bg-[#FCE7D8] text-[#E25F12]"
                            >
                                <i class="bi bi-check-lg text-sm"></i>
                            </span>

                            <span class="text-xs font-medium text-[#593114]">
                                Des saveurs authentiques et généreuses
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
         SECTION 3 — NOS VALEURS
    ========================================================== --}}
    <section class="bg-[#FFF9F2] py-14 sm:py-16 lg:py-20">

        <div class="mx-auto max-w-7xl px-6 sm:px-10 lg:px-16 xl:px-20">

            {{-- HEADER --}}
            <div class="mx-auto max-w-xl text-center">

                <span
                    class="text-[11px] font-semibold uppercase
                           tracking-[0.18em] text-[#E25F12]"
                >
                    Nos valeurs
                </span>

                <h2
                    class="mt-2 text-3xl font-bold tracking-tight
                           text-[#593114] sm:text-4xl"
                >
                    Ce qui nous tient à cœur
                </h2>

                <p
                    class="mt-3 text-sm leading-6 text-[#6B625D]"
                >
                    Les principes qui donnent du sens à chaque plat
                    que nous vous proposons.
                </p>

            </div>


            {{-- CARDS --}}
            <div
                class="mx-auto mt-9 grid max-w-6xl gap-4
                       sm:grid-cols-2 lg:grid-cols-4"
            >

                {{-- AUTHENTICITÉ --}}
                <div
                    class="rounded-2xl bg-white p-5
                           ring-1 ring-[#EAD8C5]
                           transition-all duration-300
                           hover:-translate-y-1
                           hover:shadow-lg"
                >

                    <div
                        class="flex h-10 w-10 items-center
                               justify-center rounded-xl
                               bg-[#FCE7D8] text-[#E25F12]"
                    >
                        <i class="bi bi-patch-check-fill"></i>
                    </div>

                    <h3
                        class="mt-4 text-sm font-bold text-[#593114]"
                    >
                        Authenticité
                    </h3>

                    <p
                        class="mt-2 text-[11px] leading-5
                               text-[#6B625D]"
                    >
                        Des recettes inspirées de la véritable
                        tradition ivoirienne.
                    </p>

                </div>


                {{-- QUALITÉ --}}
                <div
                    class="rounded-2xl bg-white p-5
                           ring-1 ring-[#EAD8C5]
                           transition-all duration-300
                           hover:-translate-y-1
                           hover:shadow-lg"
                >

                    <div
                        class="flex h-10 w-10 items-center
                               justify-center rounded-xl
                               bg-[#FCE7D8] text-[#E25F12]"
                    >
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <h3
                        class="mt-4 text-sm font-bold text-[#593114]"
                    >
                        Qualité
                    </h3>

                    <p
                        class="mt-2 text-[11px] leading-5
                               text-[#6B625D]"
                    >
                        Des ingrédients sélectionnés avec soin
                        pour préserver le goût.
                    </p>

                </div>


                {{-- GÉNÉROSITÉ --}}
                <div
                    class="rounded-2xl bg-white p-5
                           ring-1 ring-[#EAD8C5]
                           transition-all duration-300
                           hover:-translate-y-1
                           hover:shadow-lg"
                >

                    <div
                        class="flex h-10 w-10 items-center
                               justify-center rounded-xl
                               bg-[#FCE7D8] text-[#E25F12]"
                    >
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <h3
                        class="mt-4 text-sm font-bold text-[#593114]"
                    >
                        Générosité
                    </h3>

                    <p
                        class="mt-2 text-[11px] leading-5
                               text-[#6B625D]"
                    >
                        Parce que notre cuisine est avant tout
                        une histoire de partage.
                    </p>

                </div>


                {{-- SATISFACTION --}}
                <div
                    class="rounded-2xl bg-white p-5
                           ring-1 ring-[#EAD8C5]
                           transition-all duration-300
                           hover:-translate-y-1
                           hover:shadow-lg"
                >

                    <div
                        class="flex h-10 w-10 items-center
                               justify-center rounded-xl
                               bg-[#FCE7D8] text-[#E25F12]"
                    >
                        <i class="bi bi-emoji-smile-fill"></i>
                    </div>

                    <h3
                        class="mt-4 text-sm font-bold text-[#593114]"
                    >
                        Satisfaction
                    </h3>

                    <p
                        class="mt-2 text-[11px] leading-5
                               text-[#6B625D]"
                    >
                        Votre satisfaction reste notre priorité
                        à chaque commande.
                    </p>

                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
         SECTION 4 — CTA
    ========================================================== --}}
    <section class="relative overflow-hidden">

        <img
            src="{{ asset('images/garba.jpg') }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover"
        >

        <div
            class="absolute inset-0 bg-[#593114]/75"
        ></div>


        <div
            class="relative mx-auto max-w-7xl
                   px-6 py-16 sm:px-10 sm:py-20
                   lg:px-16"
        >

            <div
                class="mx-auto max-w-xl rounded-2xl
                       bg-white/95 px-6 py-8 text-center
                       shadow-2xl backdrop-blur-sm
                       sm:px-10"
            >

                <div
                    class="mx-auto flex h-11 w-11
                           items-center justify-center
                           rounded-full bg-[#FCE7D8]
                           text-[#E25F12]"
                >
                    <i class="bi bi-egg-fried"></i>
                </div>

                <span
                    class="mt-3 block text-[10px]
                           font-semibold uppercase
                           tracking-[0.18em] text-[#E25F12]"
                >
                    FON-KPA
                </span>

                <h2
                    class="mt-2 text-2xl font-bold
                           tracking-tight text-[#593114]
                           sm:text-3xl"
                >
                    Envie de goûter ?
                </h2>

                <p
                    class="mx-auto mt-2 max-w-md
                           text-xs leading-5 text-[#6B625D]
                           sm:text-sm"
                >
                    Découvrez notre menu et laissez-vous
                    transporter par les saveurs de la
                    gastronomie ivoirienne.
                </p>

                <a
                    href="{{ route('plats.index') }}"
                    class="mt-5 inline-flex items-center gap-2
                           rounded-full bg-[#E25F12]
                           px-5 py-2.5 text-[11px]
                           font-semibold text-white
                           shadow-sm
                           transition-all duration-300
                           hover:bg-[#593114]
                           hover:shadow-lg"
                >
                    Découvrir nos plats

                    <i
                        class="bi bi-arrow-right
                               transition-transform duration-300
                               group-hover:translate-x-1"
                    ></i>
                </a>

            </div>

        </div>

    </section>

</x-app-layout>