<x-app-layout>
    @section('title', 'FON-KPA — Panier')

    <div
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

                    <span class="font-semibold text-[#593114]">
                        {{ $totalArticles }}
                    </span>

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

                    @forelse($cart as $item)

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
                                alt="{{ $item['name'] }}"
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
                                    {{ $item['name'] }}
                                </h4>

                                <p
                                    class="mt-1 text-[11px]
                                           text-[#756D67]"
                                >
                                    <i class="bi bi-utensils"></i>
                                    Plat FON-KPA
                                </p>

                                <p
                                    class="mt-2 text-base font-bold
                                           text-[#B84A0A]"
                                >
                                    {{ number_format($item['price'], 0, ',', ' ') }}
                                    FCFA
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
                                <form
                                    method="POST"
                                    action="{{ route('cart.destroy', $item['id']) }}"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-[#9A918B]
                                               transition
                                               hover:text-red-500"
                                        aria-label="Supprimer le produit"
                                    >
                                        <i class="bi bi-trash3 text-sm"></i>
                                    </button>
                                </form>


                                {{-- QUANTITÉ --}}
                                <div
                                    class="flex items-center
                                           overflow-hidden
                                           rounded-full
                                           bg-[#F7F4F1]"
                                >

                                    {{-- MOINS --}}
                                    <form
                                        method="POST"
                                        action="{{ route('cart.update', $item['id']) }}"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <input
                                            type="hidden"
                                            name="quantity"
                                            value="{{ max(1, $item['quantity'] - 1) }}"
                                        >

                                        <button
                                            type="submit"
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
                                    </form>


                                    {{-- QUANTITÉ --}}
                                    <span
                                        class="w-7 text-center
                                               text-xs font-semibold
                                               text-[#593114]"
                                    >
                                        {{ $item['quantity'] }}
                                    </span>


                                    {{-- PLUS --}}
                                    <form
                                        method="POST"
                                        action="{{ route('cart.update', $item['id']) }}"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <input
                                            type="hidden"
                                            name="quantity"
                                            value="{{ min(99, $item['quantity'] + 1) }}"
                                        >

                                        <button
                                            type="submit"
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
                                    </form>

                                </div>

                            </div>

                        </div>

                    @empty

                        {{-- PANIER VIDE --}}
                        <div
                            class="rounded-2xl bg-white p-10
                                   text-center
                                   shadow-[0_5px_20px_rgba(89,49,20,0.06)]"
                        >

                            <div
                                class="mx-auto flex h-16 w-16
                                       items-center justify-center
                                       rounded-full
                                       bg-[#FFF1E8]"
                            >
                                <i
                                    class="bi bi-cart3 text-2xl
                                           text-[#E25F12]"
                                ></i>
                            </div>

                            <h3
                                class="mt-4 text-lg font-bold
                                       text-[#2F1608]"
                            >
                                Votre panier est vide
                            </h3>

                            <p
                                class="mt-1 text-sm
                                       text-[#756D67]"
                            >
                                Ajoutez vos plats préférés pour commencer.
                            </p>

                            <a
                                href="{{ route('categories.index') }}"
                                class="mt-5 inline-flex
                                       items-center gap-2
                                       rounded-lg
                                       bg-[#FF681F]
                                       px-5 py-3
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
                                Découvrir nos plats

                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    @endforelse

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
                                class="font-semibold
                                       text-[#2F1608]"
                            >
                                {{ number_format($subtotal, 0, ',', ' ') }} FCFA
                            </span>

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
                                class="text-xl font-bold
                                       text-[#B84A0A]"
                            >
                                {{ number_format($subtotal, 0, ',', ' ') }} FCFA
                            </span>

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

</x-app-layout>