<x-app-layout>
 @section('title', 'FON-KPA — Catégories')
    <section class="bg-[#FBF9F8] py-16 sm:py-20 lg:py-24">

        <div class="mx-auto w-full max-w-7xl px-6 sm:px-10 lg:px-16 xl:px-20">

            {{-- =====================================================
                 EN-TÊTE
            ====================================================== --}}

            <div class="mx-auto max-w-2xl text-center">

                <span
                    class="mb-3 inline-flex items-center gap-2
                           text-xs font-semibold uppercase tracking-[0.18em]
                           text-[#E25F12]"
                >
                    <i class="bi bi-stars"></i>
                    Notre sélection
                </span>

                <h2
                    class="text-3xl font-bold tracking-tight text-[#593114]
                           sm:text-4xl lg:text-[42px]"
                >
                    Découvrez nos catégories
                </h2>

                <p
                    class="mx-auto mt-3 max-w-xl
                           text-sm leading-6 text-[#6B625D]
                           sm:text-base"
                >
                    Explorez la richesse de la gastronomie ivoirienne.
                    Des plats traditionnels mijotés avec passion
                    pour chaque occasion.
                </p>

            </div>


            {{-- =====================================================
                 GRILLE PRINCIPALE
            ====================================================== --}}

            <div
                class="mt-10 grid gap-4 sm:mt-12 lg:grid-cols-12 lg:gap-5"
            >

                {{-- =================================================
                     GRANDE CARTE : PLATS IVOIRIENS
                ================================================== --}}

                <a
                    href="#"
                    class="group relative min-h-[390px]
                           overflow-hidden rounded-2xl
                           lg:col-span-5"
                >

                    <img
                        src="{{ asset('images/garba.jpg') }}"
                        alt="Plats ivoiriens"
                        class="absolute inset-0 h-full w-full
                               object-cover
                               transition-transform duration-700
                               ease-out
                               group-hover:scale-105"
                    >

                    <div
                        class="absolute inset-0
                               bg-gradient-to-t
                               from-black/85
                               via-black/35
                               to-transparent"
                    ></div>

                    <div
                        class="absolute inset-x-0 bottom-0 p-5 sm:p-6"
                    >

                        <span
                            class="inline-flex rounded-full
                                   bg-[#E25F12]
                                   px-2.5 py-1
                                   text-[10px] font-semibold
                                   text-white"
                        >
                            Populaire
                        </span>

                        <h3
                            class="mt-2 text-2xl font-bold text-white"
                        >
                            Plats ivoiriens
                        </h3>

                        <p
                            class="mt-1 max-w-sm
                                   text-xs leading-5
                                   text-white/80"
                        >
                            Découvrez les incontournables de la cuisine
                            ivoirienne : garba, foutou, attiéké
                            et bien plus encore.
                        </p>

                        <div
                            class="mt-4 flex items-center justify-between"
                        >

                            <span
                                class="text-[11px] font-medium text-white/70"
                            >
                                24 plats
                            </span>

                            <span
                                class="inline-flex items-center gap-2
                                       rounded-full
                                       bg-[#E25F12]
                                       px-4 py-2
                                       text-xs font-semibold
                                       text-white
                                       transition-all duration-300
                                       group-hover:bg-[#F47A2A]"
                            >
                                Découvrir

                                <i
                                    class="bi bi-arrow-right
                                           transition-transform duration-300
                                           group-hover:translate-x-1"
                                ></i>
                            </span>

                        </div>

                    </div>

                </a>


                {{-- =================================================
                     COLONNE DROITE
                ================================================== --}}

                <div
                    class="grid gap-4 lg:col-span-7"
                >

                    {{-- GRILLADES --}}

                    <a
                        href="#"
                        class="group relative min-h-[185px]
                               overflow-hidden rounded-2xl"
                    >

                        <img
                            src="{{ asset('images/garba.jpg') }}"
                            alt="Grillades"
                            class="absolute inset-0 h-full w-full
                                   object-cover
                                   transition-transform duration-700
                                   group-hover:scale-105"
                        >

                        <div
                            class="absolute inset-0
                                   bg-gradient-to-r
                                   from-black/75
                                   via-black/25
                                   to-transparent"
                        ></div>

                        <div
                            class="absolute inset-x-0 bottom-0 p-5"
                        >

                            <div
                                class="flex items-end
                                       justify-between gap-4"
                            >

                                <div>

                                    <h3
                                        class="text-xl font-bold text-white"
                                    >
                                        Grillades
                                    </h3>

                                    <p
                                        class="mt-1 max-w-sm
                                               text-xs text-white/75"
                                    >
                                        Viandes et poissons braisés
                                        avec passion.
                                    </p>

                                </div>

                                <span
                                    class="flex h-9 w-9 shrink-0
                                           items-center justify-center
                                           rounded-full bg-white
                                           text-[#593114]
                                           shadow-sm
                                           transition-transform duration-300
                                           group-hover:translate-x-1"
                                >
                                    <i class="bi bi-arrow-right"></i>
                                </span>

                            </div>

                        </div>

                    </a>


                    {{-- PETITES CARTES --}}

                    <div class="grid grid-cols-2 gap-4">

                        {{-- ATTIÉKÉ --}}

                        <a
                            href="#"
                            class="group overflow-hidden
                                   rounded-2xl bg-white
                                   shadow-sm ring-1 ring-[#EAD8C5]
                                   transition-shadow duration-300
                                   hover:shadow-lg"
                        >

                            <div
                                class="relative h-32 overflow-hidden"
                            >

                                <img
                                    src="{{ asset('images/garba.jpg') }}"
                                    alt="Attiéké"
                                    class="h-full w-full
                                           object-cover
                                           transition-transform duration-500
                                           group-hover:scale-105"
                                >

                            </div>

                            <div class="p-4">

                                <div
                                    class="flex items-center justify-between"
                                >

                                    <h3
                                        class="text-sm font-bold text-[#593114]"
                                    >
                                        Attiéké
                                    </h3>

                                    <i
                                        class="bi bi-arrow-up-right
                                               text-xs text-[#E25F12]"
                                    ></i>

                                </div>

                                <p
                                    class="mt-1 text-[11px]
                                           leading-4 text-[#6B625D]"
                                >
                                    L'incontournable
                                    accompagnement ivoirien.
                                </p>

                                <span
                                    class="mt-3 block
                                           text-[10px] font-medium
                                           text-[#A84B0B]"
                                >
                                    12 plats
                                </span>

                            </div>

                        </a>


                        {{-- RIZ & SAUCES --}}

                        <a
                            href="#"
                            class="group overflow-hidden
                                   rounded-2xl bg-white
                                   shadow-sm ring-1 ring-[#EAD8C5]
                                   transition-shadow duration-300
                                   hover:shadow-lg"
                        >

                            <div
                                class="relative h-32 overflow-hidden"
                            >

                                <img
                                    src="{{ asset('images/garba.jpg') }}"
                                    alt="Riz et sauces"
                                    class="h-full w-full
                                           object-cover
                                           transition-transform duration-500
                                           group-hover:scale-105"
                                >

                            </div>

                            <div class="p-4">

                                <div
                                    class="flex items-center justify-between"
                                >

                                    <h3
                                        class="text-sm font-bold text-[#593114]"
                                    >
                                        Riz & sauces
                                    </h3>

                                    <i
                                        class="bi bi-arrow-up-right
                                               text-xs text-[#E25F12]"
                                    ></i>

                                </div>

                                <p
                                    class="mt-1 text-[11px]
                                           leading-4 text-[#6B625D]"
                                >
                                    Des recettes généreuses
                                    et savoureuses.
                                </p>

                                <span
                                    class="mt-3 block
                                           text-[10px] font-medium
                                           text-[#A84B0B]"
                                >
                                    8 plats
                                </span>

                            </div>

                        </a>

                    </div>

                </div>


                {{-- =================================================
                     CARTES SECONDAIRES
                ================================================== --}}

                <div
                    class="grid grid-cols-1 gap-4
                           sm:grid-cols-3
                           lg:col-span-9"
                >

                    {{-- ACCOMPAGNEMENTS --}}

                    <a
                        href="#"
                        class="group rounded-2xl
                               border border-[#EAD8C5]
                               bg-[#F8EBD9]
                               p-5
                               transition-all duration-300
                               hover:-translate-y-1
                               hover:shadow-md"
                    >

                        <span
                            class="flex h-10 w-10
                                   items-center justify-center
                                   rounded-full bg-white
                                   text-[#E25F12]
                                   shadow-sm"
                        >
                            <i class="bi bi-egg-fried text-lg"></i>
                        </span>

                        <h3
                            class="mt-4 text-base
                                   font-bold text-[#593114]"
                        >
                            Accompagnements
                        </h3>

                        <p
                            class="mt-1 text-xs
                                   leading-5 text-[#6B625D]"
                        >
                            Aloco, attiéké, igname
                            et autres accompagnements.
                        </p>

                        <div
                            class="mt-5 flex items-center justify-between"
                        >

                            <span
                                class="text-[10px]
                                       font-medium text-[#A84B0B]"
                            >
                                6 options
                            </span>

                            <span
                                class="text-[10px]
                                       font-semibold text-[#593114]"
                            >
                                Voir
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </a>


                    {{-- BOISSONS --}}

                    <a
                        href="#"
                        class="group rounded-2xl
                               border border-[#EAD8C5]
                               bg-[#F8EBD9]
                               p-5
                               transition-all duration-300
                               hover:-translate-y-1
                               hover:shadow-md"
                    >

                        <span
                            class="flex h-10 w-10
                                   items-center justify-center
                                   rounded-full
                                   bg-[#DDF4F5]
                                   text-[#246174]
                                   shadow-sm"
                        >
                            <i class="bi bi-cup-straw text-lg"></i>
                        </span>

                        <h3
                            class="mt-4 text-base
                                   font-bold text-[#593114]"
                        >
                            Boissons
                        </h3>

                        <p
                            class="mt-1 text-xs
                                   leading-5 text-[#6B625D]"
                        >
                            Jus naturels, bissap,
                            gingembre et rafraîchissements.
                        </p>

                        <div
                            class="mt-5 flex items-center justify-between"
                        >

                            <span
                                class="text-[10px]
                                       font-medium text-[#A84B0B]"
                            >
                                10 options
                            </span>

                            <span
                                class="text-[10px]
                                       font-semibold text-[#593114]"
                            >
                                Voir
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </a>


                    {{-- DESSERTS --}}

                    <a
                        href="#"
                        class="group rounded-2xl
                               border border-[#EAD8C5]
                               bg-[#F8EBD9]
                               p-5
                               transition-all duration-300
                               hover:-translate-y-1
                               hover:shadow-md"
                    >

                        <span
                            class="flex h-10 w-10
                                   items-center justify-center
                                   rounded-full
                                   bg-[#FDE4DD]
                                   text-[#D85B36]
                                   shadow-sm"
                        >
                            <i class="bi bi-cake2 text-lg"></i>
                        </span>

                        <h3
                            class="mt-4 text-base
                                   font-bold text-[#593114]"
                        >
                            Desserts
                        </h3>

                        <p
                            class="mt-1 text-xs
                                   leading-5 text-[#6B625D]"
                        >
                            De délicieuses douceurs
                            pour terminer votre repas.
                        </p>

                        <div
                            class="mt-5 flex items-center justify-between"
                        >

                            <span
                                class="text-[10px]
                                       font-medium text-[#A84B0B]"
                            >
                                6 options
                            </span>

                            <span
                                class="text-[10px]
                                       font-semibold text-[#593114]"
                            >
                                Voir
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </a>

                </div>

            </div>

        </div>

    </section>

</x-app-layout>