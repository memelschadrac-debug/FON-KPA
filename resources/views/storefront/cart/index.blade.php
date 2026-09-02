<x-app-layout>
    @section('title', 'FON-KPA — Panier')
    <div
        x-data="cart()"
        class="min-h-screen bg-[#FAF9F7] px-5 py-10 sm:px-8 lg:px-12"
    >

        <div class="mx-auto max-w-7xl">

            {{-- =========================================================
                 EN-TÊTE
            ========================================================== --}}
            <div class="mb-8">

                <h2
                    class="text-3xl font-bold tracking-tight
                           text-[#2F1608]
                           sm:text-4xl"
                >
                    Mon Panier
                </h2>

                <p class="mt-1 text-sm text-[#6B625D]">

                    Vous avez

                    <span
                        x-text="totalArticles"
                        class="font-semibold text-[#593114]"
                    ></span>

                    articles dans votre panier.

                </p>

            </div>



            {{-- =========================================================
                 PANIER + COLONNE DROITE
            ========================================================== --}}
            <div
                class="grid gap-6
                       lg:grid-cols-[1fr_320px]"
            >


                {{-- =====================================================
                     LISTE DES PRODUITS
                ====================================================== --}}
                <div class="space-y-4">


                    {{-- =================================================
                         PRODUIT 1
                    ================================================== --}}
                    <div
                        class="flex items-center gap-4
                               rounded-2xl bg-white p-4
                               shadow-[0_5px_20px_rgba(89,49,20,0.06)]
                               transition-shadow
                               hover:shadow-[0_8px_25px_rgba(89,49,20,0.09)]"
                    >

                        {{-- IMAGE --}}
                        <img
                            src="{{ asset('images/garba.jpg') }}"
                            alt="Garba Royal"
                            class="h-20 w-20 shrink-0
                                   rounded-xl object-cover
                                   sm:h-24 sm:w-24"
                        >


                        {{-- INFORMATIONS --}}
                        <div class="min-w-0 flex-1">

                            <h4
                                class="truncate text-sm font-semibold
                                       text-[#2F1608]
                                       sm:text-base"
                            >
                                Garba Royal
                            </h4>

                            <p
                                class="mt-1 text-[11px]
                                       text-[#756D67]"
                            >
                                <i class="bi bi-utensils"></i>
                                Accompagnement : Attiéké
                            </p>

                            <p
                                class="mt-2 text-base font-bold
                                       text-[#B84A0A]"
                            >
                                4 500 FCFA
                            </p>

                        </div>


                        {{-- ACTIONS --}}
                        <div
                            class="flex flex-col
                                   items-end
                                   justify-between
                                   gap-5"
                        >

                            {{-- SUPPRIMER --}}
                            <button
                                type="button"
                                @click="remove(0)"
                                class="text-[#9A918B]
                                       transition
                                       hover:text-red-500"
                                aria-label="Supprimer le produit"
                            >
                                <i class="bi bi-trash3 text-sm"></i>
                            </button>


                            {{-- QUANTITÉ --}}
                            <div
                                class="flex items-center
                                       overflow-hidden
                                       rounded-full
                                       bg-[#F7F4F1]"
                            >

                                {{-- MOINS --}}
                                <button
                                    type="button"
                                    @click="decrease(0)"
                                    class="flex h-8 w-8
                                           items-center
                                           justify-center
                                           text-[#593114]
                                           transition
                                           hover:bg-[#EEE5DE]"
                                    aria-label="Diminuer la quantité"
                                >
                                    <i class="bi bi-dash"></i>
                                </button>


                                {{-- QUANTITÉ --}}
                                <span
                                    x-text="items[0].quantity"
                                    class="w-7 text-center
                                           text-xs font-semibold
                                           text-[#593114]"
                                ></span>


                                {{-- PLUS --}}
                                <button
                                    type="button"
                                    @click="increase(0)"
                                    class="flex h-8 w-8
                                           items-center
                                           justify-center
                                           text-[#593114]
                                           transition
                                           hover:bg-[#EEE5DE]"
                                    aria-label="Augmenter la quantité"
                                >
                                    <i class="bi bi-plus"></i>
                                </button>

                            </div>

                        </div>

                    </div>



                    {{-- =================================================
                         PRODUIT 2
                    ================================================== --}}
                    <div
                        class="flex items-center gap-4
                               rounded-2xl bg-white p-4
                               shadow-[0_5px_20px_rgba(89,49,20,0.06)]
                               transition-shadow
                               hover:shadow-[0_8px_25px_rgba(89,49,20,0.09)]"
                    >

                        {{-- IMAGE --}}
                        <img
                            src="{{ asset('images/Garba.jpg') }}"
                            alt="Poulet Braisé Entier"
                            class="h-20 w-20 shrink-0
                                   rounded-xl object-cover
                                   sm:h-24 sm:w-24"
                        >


                        {{-- INFORMATIONS --}}
                        <div class="min-w-0 flex-1">

                            <h4
                                class="truncate text-sm font-semibold
                                       text-[#2F1608]
                                       sm:text-base"
                            >
                                Poulet Braisé Entier
                            </h4>

                            <p
                                class="mt-1 text-[11px]
                                       text-[#756D67]"
                            >
                                <i class="bi bi-fire"></i>
                                Épicé (Niveau 2)
                            </p>

                            <p
                                class="mt-2 text-base font-bold
                                       text-[#B84A0A]"
                            >
                                8 000 FCFA
                            </p>

                        </div>


                        {{-- ACTIONS --}}
                        <div
                            class="flex flex-col
                                   items-end
                                   justify-between
                                   gap-5"
                        >

                            {{-- SUPPRIMER --}}
                            <button
                                type="button"
                                @click="remove(1)"
                                class="text-[#9A918B]
                                       transition
                                       hover:text-red-500"
                                aria-label="Supprimer le produit"
                            >
                                <i class="bi bi-trash3 text-sm"></i>
                            </button>


                            {{-- QUANTITÉ --}}
                            <div
                                class="flex items-center
                                       overflow-hidden
                                       rounded-full
                                       bg-[#F7F4F1]"
                            >

                                {{-- MOINS --}}
                                <button
                                    type="button"
                                    @click="decrease(1)"
                                    class="flex h-8 w-8
                                           items-center
                                           justify-center
                                           text-[#593114]
                                           transition
                                           hover:bg-[#EEE5DE]"
                                    aria-label="Diminuer la quantité"
                                >
                                    <i class="bi bi-dash"></i>
                                </button>


                                {{-- QUANTITÉ --}}
                                <span
                                    x-text="items[1].quantity"
                                    class="w-7 text-center
                                           text-xs font-semibold
                                           text-[#593114]"
                                ></span>


                                {{-- PLUS --}}
                                <button
                                    type="button"
                                    @click="increase(1)"
                                    class="flex h-8 w-8
                                           items-center
                                           justify-center
                                           text-[#593114]
                                           transition
                                           hover:bg-[#EEE5DE]"
                                    aria-label="Augmenter la quantité"
                                >
                                    <i class="bi bi-plus"></i>
                                </button>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =====================================================
                     COLONNE DROITE
                ====================================================== --}}
                <div class="space-y-5">


                    {{-- =================================================
                         RÉSUMÉ DE LA COMMANDE
                    ================================================== --}}
                    <div
                        class="h-fit rounded-2xl bg-white p-5
                               shadow-[0_5px_20px_rgba(89,49,20,0.06)]"
                    >

                        {{-- TITRE --}}
                        <h3
                            class="text-lg font-bold
                                   text-[#2F1608]"
                        >
                            Résumé de la commande
                        </h3>


                        {{-- SEPARATION --}}
                        <div
                            class="my-4 h-px bg-[#EEE8E3]"
                        ></div>


                        {{-- SOUS-TOTAL --}}
                        <div
                            class="flex items-center
                                   justify-between text-xs"
                        >

                            <span class="text-[#756D67]">
                                Sous-total
                            </span>

                            <span
                                x-text="formatPrice(subtotal)"
                                class="font-semibold
                                       text-[#2F1608]"
                            ></span>

                        </div>


                        {{-- LIVRAISON --}}
                        <div
                            class="mt-4 flex items-center
                                   justify-between text-xs"
                        >

                            <span class="text-[#756D67]">
                                Frais de livraison
                            </span>

                            <span
                                class="rounded
                                       bg-[#BFF3D7]
                                       px-2 py-1
                                       font-semibold
                                       text-[#087A46]"
                            >
                                Gratuit
                            </span>

                        </div>


                        {{-- TAXES --}}
                        <div
                            class="mt-4 flex items-center
                                   justify-between text-xs"
                        >

                            <span class="text-[#756D67]">
                                Taxes estimées
                            </span>

                            <span
                                class="font-semibold
                                       text-[#2F1608]"
                            >
                                0 FCFA
                            </span>

                        </div>


                        {{-- SEPARATION --}}
                        <div
                            class="my-5 h-px bg-[#EEE8E3]"
                        ></div>


                        {{-- TOTAL --}}
                        <div
                            class="flex items-center
                                   justify-between"
                        >

                            <span
                                class="text-sm font-semibold
                                       text-[#2F1608]"
                            >
                                Total
                            </span>

                            <span
                                x-text="formatPrice(total)"
                                class="text-xl font-bold
                                       text-[#B84A0A]"
                            ></span>

                        </div>


                        {{-- PASSER COMMANDE --}}
                        <a
                            href="{{ route('commande.index') }}"
                            class="mt-5 flex w-full
                                items-center justify-center
                                gap-2 rounded-lg
                                bg-[#FF681F]
                                px-4 py-3
                                text-[10px]
                                font-bold
                                uppercase
                                tracking-wide
                                text-white
                                shadow-sm
                                transition-all
                                hover:bg-[#593114]
                                hover:shadow-md"
                        >
                            Passer la commande

                            <i class="bi bi-arrow-right"></i>
                        </a>

                        {{-- CONTINUER ACHATS --}}
                        <a
                            href="{{ route('categories.index') }}"
                            class="mt-2.5 flex w-full
                                   items-center
                                   justify-center
                                   rounded-lg
                                   border
                                   border-[#593114]
                                   px-4 py-2.5
                                   text-[9px]
                                   font-bold
                                   uppercase
                                   tracking-wide
                                   text-[#593114]
                                   transition
                                   hover:bg-[#593114]
                                   hover:text-white"
                        >
                            Continuer mes achats
                        </a>

                    </div>



                    {{-- =================================================
                         GARANTIES
                    ================================================== --}}
                    <div
                        class="grid grid-cols-3
                               rounded-2xl
                               bg-white
                               px-3 py-4
                               shadow-[0_5px_20px_rgba(89,49,20,0.05)]"
                    >


                        {{-- LIVRAISON RAPIDE --}}
                        <div class="text-center">

                            <div
                                class="mx-auto flex h-9 w-9
                                       items-center
                                       justify-center
                                       rounded-full
                                       bg-[#FFF1E8]"
                            >
                                <i
                                    class="bi bi-truck
                                           text-base
                                           text-[#E25F12]"
                                ></i>
                            </div>

                            <p
                                class="mt-2
                                       text-[8px]
                                       font-semibold
                                       leading-3
                                       text-[#756D67]"
                            >
                                Livraison rapide
                            </p>

                        </div>



                        {{-- PAIEMENT SÉCURISÉ --}}
                        <div
                            class="border-x
                                   border-[#EEE8E3]
                                   text-center"
                        >

                            <div
                                class="mx-auto flex h-9 w-9
                                       items-center
                                       justify-center
                                       rounded-full
                                       bg-[#FFF1E8]"
                            >
                                <i
                                    class="bi bi-shield-check
                                           text-base
                                           text-[#E25F12]"
                                ></i>
                            </div>

                            <p
                                class="mt-2
                                       text-[8px]
                                       font-semibold
                                       leading-3
                                       text-[#756D67]"
                            >
                                Paiement sécurisé
                            </p>

                        </div>



                        {{-- QUALITÉ GARANTIE --}}
                        <div class="text-center">

                            <div
                                class="mx-auto flex h-9 w-9
                                       items-center
                                       justify-center
                                       rounded-full
                                       bg-[#FFF1E8]"
                            >
                                <i
                                    class="bi bi-patch-check
                                           text-base
                                           text-[#E25F12]"
                                ></i>
                            </div>

                            <p
                                class="mt-2
                                       text-[8px]
                                       font-semibold
                                       leading-3
                                       text-[#756D67]"
                            >
                                Qualité garantie
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- =============================================================
         ALPINE.JS
    ============================================================= --}}
    <script>

        function cart() {

            return {

                /*
                |--------------------------------------------------------------------------
                | PRODUITS
                |--------------------------------------------------------------------------
                */

                items: [

                    {
                        name: 'Garba Royal',
                        price: 4500,
                        quantity: 1
                    },

                    {
                        name: 'Poulet Braisé Entier',
                        price: 8000,
                        quantity: 1
                    }

                ],



                /*
                |--------------------------------------------------------------------------
                | SOUS-TOTAL
                |--------------------------------------------------------------------------
                */

                get subtotal() {

                    return this.items.reduce(
                        (total, item) => {

                            return total +
                                (item.price * item.quantity);

                        },
                        0
                    );

                },



                /*
                |--------------------------------------------------------------------------
                | TOTAL
                |--------------------------------------------------------------------------
                */

                get total() {

                    return this.subtotal;

                },



                /*
                |--------------------------------------------------------------------------
                | NOMBRE TOTAL D'ARTICLES
                |--------------------------------------------------------------------------
                */

                get totalArticles() {

                    return this.items.reduce(
                        (total, item) => {

                            return total + item.quantity;

                        },
                        0
                    );

                },



                /*
                |--------------------------------------------------------------------------
                | AUGMENTER LA QUANTITÉ
                |--------------------------------------------------------------------------
                */

                increase(index) {

                    this.items[index].quantity++;

                },



                /*
                |--------------------------------------------------------------------------
                | DIMINUER LA QUANTITÉ
                |--------------------------------------------------------------------------
                */

                decrease(index) {

                    if (this.items[index].quantity > 1) {

                        this.items[index].quantity--;

                    }

                },



                /*
                |--------------------------------------------------------------------------
                | SUPPRIMER UN PRODUIT
                |--------------------------------------------------------------------------
                */

                remove(index) {

                    this.items.splice(index, 1);

                },



                /*
                |--------------------------------------------------------------------------
                | FORMATAGE DU PRIX
                |--------------------------------------------------------------------------
                */

                formatPrice(price) {

                    return new Intl.NumberFormat('fr-FR')
                        .format(price)
                        .replace(/\s/g, ' ') + ' FCFA';

                }

            }

        }

    </script>

</x-app-layout>