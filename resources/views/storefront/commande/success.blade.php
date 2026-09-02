<x-app-layout>
    @section('title', 'FON-KPA — Validation commande')
    <div
        class="relative min-h-screen overflow-hidden bg-[#FAF9F7] px-4 py-8 sm:px-6"
    >

        {{-- =========================================================
             ARRIÈRE-PLAN
        ========================================================== --}}

        <div
            class="absolute inset-0 -z-10 bg-cover bg-center opacity-[0.08]"
            style="
                background-image: url('{{ asset('images/Hero1.png') }}');
                filter: blur(2px);
            "
        ></div>


        {{-- =========================================================
             CONTENEUR PRINCIPAL
        ========================================================== --}}

        <div class="mx-auto flex min-h-[calc(100vh-4rem)] max-w-2xl items-center justify-center">

            <div
                class="w-full overflow-hidden rounded-3xl bg-white
                       shadow-[0_10px_40px_rgba(89,49,20,0.10)]"
            >

                {{-- =================================================
                     EN-TÊTE CONFIRMATION
                ================================================== --}}

                <div class="border-b border-[#EEE8E3] px-6 py-8 text-center sm:px-10">

                    {{-- ICÔNE VALIDATION --}}

                    <div
                        class="mx-auto flex h-16 w-16 items-center justify-center
                               rounded-full bg-[#BFF3D7] text-[#087A46]"
                    >
                        <i class="bi bi-check-circle-fill text-2xl"></i>
                    </div>


                    {{-- TITRE --}}

                    <h1
                        class="mt-5 text-3xl font-bold tracking-tight
                               text-[#3A1B09] sm:text-4xl"
                    >
                        Commande confirmée !
                    </h1>


                    {{-- DESCRIPTION --}}

                    <p class="mt-2 text-sm text-[#756D67]">
                        Merci pour votre confiance.
                        Votre repas est en bonne voie.
                    </p>

                </div>


                {{-- =================================================
                     CONTENU
                ================================================== --}}

                <div class="px-6 py-6 sm:px-8">


                    {{-- =================================================
                         DÉTAILS + LIVRAISON
                    ================================================== --}}

                    <div class="grid gap-4 sm:grid-cols-2">


                        {{-- ==============================
                             DÉTAILS
                        =============================== --}}

                        <div
                            class="rounded-xl border border-[#EEE7E2]
                                   bg-white p-4"
                        >

                            <div class="mb-3 flex items-center gap-2">

                                <i
                                    class="bi bi-receipt text-[#B84A0A]"
                                ></i>

                                <h2
                                    class="text-sm font-bold text-[#3A1B09]"
                                >
                                    Détails
                                </h2>

                            </div>


                            {{-- NUMÉRO --}}

                            <div
                                class="flex items-center justify-between
                                       gap-3 text-xs"
                            >

                                <span class="text-[#756D67]">
                                    Numéro :
                                </span>

                                <span
                                    class="font-semibold text-[#3A1B09]"
                                >
                                    #FK-2026-00125
                                </span>

                            </div>


                            {{-- MONTANT --}}

                            <div
                                class="mt-3 flex items-center justify-between
                                       gap-3 text-xs"
                            >

                                <span class="text-[#756D67]">
                                    Montant total :
                                </span>

                                <span
                                    class="font-bold text-[#B84A0A]"
                                >
                                    24 500 FCFA
                                </span>

                            </div>


                            {{-- PAIEMENT --}}

                            <div
                                class="mt-3 flex items-center justify-between
                                       gap-3 text-xs"
                            >

                                <span class="text-[#756D67]">
                                    Paiement :
                                </span>

                                <span class="font-medium text-[#3A1B09]">
                                    Carte bancaire
                                </span>

                            </div>

                        </div>


                        {{-- ==============================
                             LIVRAISON
                        =============================== --}}

                        <div
                            class="rounded-xl border border-[#EEE7E2]
                                   bg-white p-4"
                        >

                            <div class="mb-3 flex items-center gap-2">

                                <i
                                    class="bi bi-truck text-[#B84A0A]"
                                ></i>

                                <h2
                                    class="text-sm font-bold text-[#3A1B09]"
                                >
                                    Livraison
                                </h2>

                            </div>


                            {{-- ADRESSE --}}

                            <div class="flex items-start gap-2">

                                <i
                                    class="bi bi-geo-alt mt-0.5
                                           text-sm text-[#756D67]"
                                ></i>

                                <div>

                                    <p
                                        class="text-xs font-semibold
                                               text-[#3A1B09]"
                                    >
                                        Cocody Angré, 8ème Tranche
                                    </p>

                                    <p
                                        class="mt-1 text-[10px]
                                               leading-4 text-[#756D67]"
                                    >
                                        Résidence les Oliviers,<br>
                                        Bâtiment B
                                    </p>

                                </div>

                            </div>


                            {{-- ESTIMATION --}}

                            <div
                                class="mt-4 border-t border-[#EEE8E3]
                                       pt-3"
                            >

                                <div class="flex items-center gap-2">

                                    <i
                                        class="bi bi-clock text-xs
                                               text-[#B84A0A]"
                                    ></i>

                                    <span class="text-xs text-[#756D67]">
                                        Estimation :
                                    </span>

                                    <span
                                        class="text-xs font-bold
                                               text-[#3A1B09]"
                                    >
                                        12h45 - 13h15
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         ÉTAT DE LA COMMANDE
                    ================================================== --}}

                    <div class="mt-7">

                        <h2
                            class="text-center text-sm font-bold
                                   text-[#3A1B09]"
                        >
                            État de la commande
                        </h2>


                        {{-- PROGRESSION --}}

                        <div class="mt-5 grid grid-cols-5 gap-1">


                            {{-- REÇUE --}}

                            <div class="text-center">

                                <div
                                    class="mx-auto flex h-9 w-9
                                           items-center justify-center
                                           rounded-full
                                           bg-[#B84A0A]
                                           text-white
                                           shadow-sm"
                                >
                                    <i class="bi bi-receipt"></i>
                                </div>

                                <p
                                    class="mt-2 text-[9px]
                                           font-semibold text-[#3A1B09]"
                                >
                                    Reçue
                                </p>

                            </div>


                            {{-- CONFIRMÉE --}}

                            <div class="text-center">

                                <div
                                    class="mx-auto flex h-9 w-9
                                           items-center justify-center
                                           rounded-full
                                           bg-[#B84A0A]
                                           text-white
                                           ring-4 ring-[#B84A0A]/10"
                                >
                                    <i class="bi bi-hand-thumbs-up-fill"></i>
                                </div>

                                <p
                                    class="mt-2 text-[9px]
                                           font-bold text-[#B84A0A]"
                                >
                                    Confirmée
                                </p>

                            </div>


                            {{-- PRÉPARATION --}}

                            <div class="text-center">

                                <div
                                    class="mx-auto flex h-9 w-9
                                           items-center justify-center
                                           rounded-full
                                           bg-[#F3F1EF]
                                           text-[#C4BEB9]"
                                >
                                    <i class="bi bi-cup-hot"></i>
                                </div>

                                <p
                                    class="mt-2 text-[9px]
                                           font-medium text-[#B5ADA7]"
                                >
                                    Préparation
                                </p>

                            </div>


                            {{-- LIVRAISON --}}

                            <div class="text-center">

                                <div
                                    class="mx-auto flex h-9 w-9
                                           items-center justify-center
                                           rounded-full
                                           bg-[#F3F1EF]
                                           text-[#C4BEB9]"
                                >
                                    <i class="bi bi-bicycle"></i>
                                </div>

                                <p
                                    class="mt-2 text-[9px]
                                           font-medium text-[#B5ADA7]"
                                >
                                    Livraison
                                </p>

                            </div>


                            {{-- LIVRÉE --}}

                            <div class="text-center">

                                <div
                                    class="mx-auto flex h-9 w-9
                                           items-center justify-center
                                           rounded-full
                                           bg-[#F3F1EF]
                                           text-[#C4BEB9]"
                                >
                                    <i class="bi bi-house-check"></i>
                                </div>

                                <p
                                    class="mt-2 text-[9px]
                                           font-medium text-[#B5ADA7]"
                                >
                                    Livrée
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         BOUTONS
                    ================================================== --}}

                    <div class="mt-7 grid gap-3 sm:grid-cols-2">


                        {{-- SUIVRE LA COMMANDE --}}

                        <a
                            href="#"
                            class="flex min-h-[64px]
                                   items-center justify-center gap-3
                                   rounded-full
                                   bg-[#B84A0A]
                                   px-5 py-3
                                   text-center text-sm
                                   font-bold text-white
                                   shadow-[0_4px_10px_rgba(184,74,10,0.20)]
                                   transition
                                   hover:bg-[#593114]
                                   hover:shadow-md"
                        >

                            <i class="bi bi-geo-alt text-base"></i>

                            <span>
                                Suivre ma<br class="sm:hidden">
                                commande
                            </span>

                        </a>


                        {{-- RETOUR ACCUEIL --}}

                        <a
                            href="{{ route('home') }}"
                            class="flex min-h-[64px]
                                   items-center justify-center gap-3
                                   rounded-full
                                   border-2 border-[#593114]
                                   bg-white
                                   px-5 py-3
                                   text-center text-sm
                                   font-semibold text-[#593114]
                                   transition
                                   hover:bg-[#593114]
                                   hover:text-white"
                        >

                            <i class="bi bi-house text-base"></i>

                            <span>
                                Retour à<br class="sm:hidden">
                                l'accueil
                            </span>

                        </a>

                    </div>


                    {{-- =================================================
                         MESSAGE FINAL
                    ================================================== --}}

                    <p
                        class="mt-5 text-center text-[10px]
                               leading-4 text-[#9A918B]"
                    >
                        Un récapitulatif de votre commande vous sera
                        également envoyé.
                    </p>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>