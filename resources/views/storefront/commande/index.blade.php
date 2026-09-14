<x-app-layout>
    @section('title', 'FON-KPA — Commande')

    <div
        x-data="orderPage()"
        class="min-h-screen bg-[#FAF9F7] px-5 py-10 sm:px-8 lg:px-12"
    >

        <div class="mx-auto max-w-7xl">

            {{-- =========================================================
                 EN-TÊTE
            ========================================================== --}}
            <div class="mb-8">

                <div class="flex items-center gap-3">

                    <div>

                        <p
                            class="text-[10px] font-bold uppercase
                                   tracking-[0.18em] text-[#FF681F]"
                        >
                            FON-KPA
                        </p>

                        <h2
                            class="mt-1 text-3xl font-bold
                                   tracking-tight text-[#2F1608]
                                   sm:text-4xl"
                        >
                            Passer la commande
                        </h2>

                    </div>

                </div>

                <p class="mt-3 max-w-xl text-sm leading-6 text-[#756D67]">
                    Renseignez vos informations pour finaliser votre commande.
                </p>

            </div>


            {{-- =========================================================
                 CONTENU PRINCIPAL
            ========================================================== --}}
            <div
                class="grid items-start gap-6
                       lg:grid-cols-[minmax(0,1fr)_360px]"
            >

                {{-- =====================================================
                     FORMULAIRE
                ====================================================== --}}
                <div
                    class="rounded-2xl bg-white p-5
                           shadow-[0_5px_20px_rgba(89,49,20,0.06)]
                           sm:p-7"
                >

                    {{-- TITRE --}}
                    <div class="mb-7">

                        <div class="flex items-center gap-3">

                            <div
                                class="flex h-10 w-10 shrink-0
                                       items-center justify-center
                                       rounded-xl bg-[#FFF0E8]
                                       text-[#FF681F]"
                            >
                                <i class="bi bi-person text-lg"></i>
                            </div>

                            <div>

                                <h3
                                    class="text-lg font-bold text-[#2F1608]"
                                >
                                    Informations de livraison
                                </h3>

                                <p
                                    class="mt-0.5 text-xs text-[#8A817B]"
                                >
                                    Où devons-nous livrer votre commande ?
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- FORMULAIRE --}}
                    <form
                        action="{{ route('commande.store') }}"
                        method="POST"
                        @submit="submitOrder"
                    >

                        @csrf


                        {{-- =================================================
                             INFORMATIONS PERSONNELLES
                        ================================================== --}}
                        <div class="space-y-4">

                            <div class="grid gap-4 sm:grid-cols-2">

                                {{-- PRÉNOM --}}
                                <div>

                                    <label
                                        for="first_name"
                                        class="mb-1.5 block text-xs
                                               font-semibold text-[#593114]"
                                    >
                                        Prénom
                                    </label>

                                    <div class="relative">

                                        <i
                                            class="bi bi-person
                                                   pointer-events-none
                                                   absolute left-3 top-1/2
                                                   -translate-y-1/2
                                                   text-sm text-[#A69D97]"
                                        ></i>

                                        <input
                                            id="first_name"
                                            name="first_name"
                                            type="text"
                                            value="{{ old('first_name') }}"
                                            required
                                            placeholder="Votre prénom"
                                            class="h-11 w-full rounded-xl
                                                   border border-[#EEE7E2]
                                                   bg-[#FAF9F7]
                                                   pl-9 pr-3
                                                   text-sm text-[#593114]
                                                   outline-none transition
                                                   placeholder:text-[#AAA29D]
                                                   focus:border-[#FF681F]
                                                   focus:bg-white
                                                   focus:ring-2
                                                   focus:ring-[#FF681F]/10"
                                        >

                                    </div>

                                </div>


                                {{-- NOM --}}
                                <div>

                                    <label
                                        for="last_name"
                                        class="mb-1.5 block text-xs
                                               font-semibold text-[#593114]"
                                    >
                                        Nom
                                    </label>

                                    <div class="relative">

                                        <i
                                            class="bi bi-person
                                                   pointer-events-none
                                                   absolute left-3 top-1/2
                                                   -translate-y-1/2
                                                   text-sm text-[#A69D97]"
                                        ></i>

                                        <input
                                            id="last_name"
                                            name="last_name"
                                            type="text"
                                            value="{{ old('last_name') }}"
                                            required
                                            placeholder="Votre nom"
                                            class="h-11 w-full rounded-xl
                                                   border border-[#EEE7E2]
                                                   bg-[#FAF9F7]
                                                   pl-9 pr-3
                                                   text-sm text-[#593114]
                                                   outline-none transition
                                                   placeholder:text-[#AAA29D]
                                                   focus:border-[#FF681F]
                                                   focus:bg-white
                                                   focus:ring-2
                                                   focus:ring-[#FF681F]/10"
                                        >

                                    </div>

                                </div>

                            </div>


                            {{-- EMAIL + TÉLÉPHONE --}}
                            <div class="grid gap-4 sm:grid-cols-2">

                                {{-- EMAIL --}}
                                <div>

                                    <label
                                        for="email"
                                        class="mb-1.5 block text-xs
                                               font-semibold text-[#593114]"
                                    >
                                        Adresse email
                                    </label>

                                    <div class="relative">

                                        <i
                                            class="bi bi-envelope
                                                   pointer-events-none
                                                   absolute left-3 top-1/2
                                                   -translate-y-1/2
                                                   text-sm text-[#A69D97]"
                                        ></i>

                                        <input
                                            id="email"
                                            name="email"
                                            type="email"
                                            value="{{ old(
                                                'email',
                                                auth()->user()->email ?? ''
                                            ) }}"
                                            required
                                            placeholder="votre@email.com"
                                            class="h-11 w-full rounded-xl
                                                   border border-[#EEE7E2]
                                                   bg-[#FAF9F7]
                                                   pl-9 pr-3
                                                   text-sm text-[#593114]
                                                   outline-none transition
                                                   placeholder:text-[#AAA29D]
                                                   focus:border-[#FF681F]
                                                   focus:bg-white
                                                   focus:ring-2
                                                   focus:ring-[#FF681F]/10"
                                        >

                                    </div>

                                </div>


                                {{-- TÉLÉPHONE --}}
                                <div>

                                    <label
                                        for="phone"
                                        class="mb-1.5 block text-xs
                                               font-semibold text-[#593114]"
                                    >
                                        Téléphone
                                    </label>

                                    <div class="relative">

                                        <i
                                            class="bi bi-telephone
                                                   pointer-events-none
                                                   absolute left-3 top-1/2
                                                   -translate-y-1/2
                                                   text-sm text-[#A69D97]"
                                        ></i>

                                        <input
                                            id="phone"
                                            name="phone"
                                            type="tel"
                                            value="{{ old('phone') }}"
                                            required
                                            placeholder="+225 07 00 00 00 00"
                                            class="h-11 w-full rounded-xl
                                                   border border-[#EEE7E2]
                                                   bg-[#FAF9F7]
                                                   pl-9 pr-3
                                                   text-sm text-[#593114]
                                                   outline-none transition
                                                   placeholder:text-[#AAA29D]
                                                   focus:border-[#FF681F]
                                                   focus:bg-white
                                                   focus:ring-2
                                                   focus:ring-[#FF681F]/10"
                                        >

                                    </div>

                                </div>

                            </div>


                            {{-- ADRESSE --}}
                            <div>

                                <label
                                    for="address"
                                    class="mb-1.5 block text-xs
                                           font-semibold text-[#593114]"
                                >
                                    Adresse de livraison
                                </label>

                                <div class="relative">

                                    <i
                                        class="bi bi-geo-alt
                                               pointer-events-none
                                               absolute left-3 top-3
                                               text-sm text-[#A69D97]"
                                    ></i>

                                    <textarea
                                        id="address"
                                        name="address"
                                        required
                                        rows="3"
                                        placeholder="Ex : Cocody, Angré 7ème Tranche..."
                                        class="w-full resize-none rounded-xl
                                               border border-[#EEE7E2]
                                               bg-[#FAF9F7]
                                               pl-9 pr-3 pt-3
                                               text-sm leading-5
                                               text-[#593114]
                                               outline-none transition
                                               placeholder:text-[#AAA29D]
                                               focus:border-[#FF681F]
                                               focus:bg-white
                                               focus:ring-2
                                               focus:ring-[#FF681F]/10"
                                    >{{ old('address') }}</textarea>

                                </div>

                            </div>


                            {{-- VILLE + COMMUNE --}}
                            <div class="grid gap-4 sm:grid-cols-2">

                                {{-- VILLE --}}
                                <div>

                                    <label
                                        for="city"
                                        class="mb-1.5 block text-xs
                                               font-semibold text-[#593114]"
                                    >
                                        Ville
                                    </label>

                                    <div class="relative">

                                        <i
                                            class="bi bi-buildings
                                                   pointer-events-none
                                                   absolute left-3 top-1/2
                                                   -translate-y-1/2
                                                   text-sm text-[#A69D97]"
                                        ></i>

                                        <input
                                            id="city"
                                            name="city"
                                            type="text"
                                            value="{{ old('city', 'Abidjan') }}"
                                            required
                                            class="h-11 w-full rounded-xl
                                                   border border-[#EEE7E2]
                                                   bg-[#FAF9F7]
                                                   pl-9 pr-3
                                                   text-sm text-[#593114]
                                                   outline-none transition
                                                   focus:border-[#FF681F]
                                                   focus:bg-white
                                                   focus:ring-2
                                                   focus:ring-[#FF681F]/10"
                                        >

                                    </div>

                                </div>


                                {{-- COMMUNE --}}
                                <div>

                                    <label
                                        for="district"
                                        class="mb-1.5 block text-xs
                                               font-semibold text-[#593114]"
                                    >
                                        Commune
                                    </label>

                                    <div class="relative">

                                        <i
                                            class="bi bi-map
                                                   pointer-events-none
                                                   absolute left-3 top-1/2
                                                   -translate-y-1/2
                                                   text-sm text-[#A69D97]"
                                        ></i>

                                        <select
                                            id="district"
                                            name="district"
                                            required
                                            class="h-11 w-full appearance-none
                                                   rounded-xl
                                                   border border-[#EEE7E2]
                                                   bg-[#FAF9F7]
                                                   pl-9 pr-9
                                                   text-sm text-[#593114]
                                                   outline-none transition
                                                   focus:border-[#FF681F]
                                                   focus:bg-white
                                                   focus:ring-2
                                                   focus:ring-[#FF681F]/10"
                                        >

                                            <option value="">
                                                Sélectionnez votre commune
                                            </option>

                                            <option value="cocody">
                                                Cocody
                                            </option>

                                            <option value="marcory">
                                                Marcory
                                            </option>

                                            <option value="yopougon">
                                                Yopougon
                                            </option>

                                            <option value="abobo">
                                                Abobo
                                            </option>

                                            <option value="plateau">
                                                Plateau
                                            </option>

                                            <option value="treichville">
                                                Treichville
                                            </option>

                                        </select>

                                        <i
                                            class="bi bi-chevron-down
                                                   pointer-events-none
                                                   absolute right-3 top-1/2
                                                   -translate-y-1/2
                                                   text-xs text-[#A69D97]"
                                        ></i>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             MODE DE LIVRAISON
                        ================================================== --}}
                        <div class="mt-8">

                            <div class="mb-3">

                                <h3
                                    class="text-sm font-bold text-[#2F1608]"
                                >
                                    Mode de livraison
                                </h3>

                                <p class="mt-1 text-xs text-[#8A817B]">
                                    Choisissez comment recevoir votre commande.
                                </p>

                            </div>


                            <div class="grid gap-3 sm:grid-cols-2">

                                {{-- LIVRAISON --}}
                                <label class="cursor-pointer">

                                    <input
                                        type="radio"
                                        name="delivery_method"
                                        value="delivery"
                                        x-model="deliveryMethod"
                                        class="peer sr-only"
                                        checked
                                    >

                                    <div
                                        class="rounded-xl border
                                               border-[#EEE7E2]
                                               bg-[#FAF9F7] p-4
                                               transition
                                               peer-checked:border-[#FF681F]
                                               peer-checked:bg-[#FFF8F3]"
                                    >

                                        <div class="flex gap-3">

                                            <div
                                                class="flex h-9 w-9 shrink-0
                                                       items-center justify-center
                                                       rounded-lg bg-white
                                                       text-[#FF681F]
                                                       shadow-sm"
                                            >
                                                <i class="bi bi-truck"></i>
                                            </div>

                                            <div>

                                                <p
                                                    class="text-sm font-semibold
                                                           text-[#593114]"
                                                >
                                                    Livraison à domicile
                                                </p>

                                                <p
                                                    class="mt-1 text-[11px]
                                                           leading-4 text-[#8A817B]"
                                                >
                                                    Recevez votre commande
                                                    directement chez vous.
                                                </p>

                                                <p
                                                    class="mt-2 text-xs font-bold
                                                           text-[#087A46]"
                                                >
                                                    Livraison gratuite
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </label>


                                {{-- RETRAIT --}}
                                <label class="cursor-pointer">

                                    <input
                                        type="radio"
                                        name="delivery_method"
                                        value="pickup"
                                        x-model="deliveryMethod"
                                        class="peer sr-only"
                                    >

                                    <div
                                        class="rounded-xl border
                                               border-[#EEE7E2]
                                               bg-[#FAF9F7] p-4
                                               transition
                                               peer-checked:border-[#FF681F]
                                               peer-checked:bg-[#FFF8F3]"
                                    >

                                        <div class="flex gap-3">

                                            <div
                                                class="flex h-9 w-9 shrink-0
                                                       items-center justify-center
                                                       rounded-lg bg-white
                                                       text-[#FF681F]
                                                       shadow-sm"
                                            >
                                                <i class="bi bi-shop"></i>
                                            </div>

                                            <div>

                                                <p
                                                    class="text-sm font-semibold
                                                           text-[#593114]"
                                                >
                                                    Retrait sur place
                                                </p>

                                                <p
                                                    class="mt-1 text-[11px]
                                                           leading-4 text-[#8A817B]"
                                                >
                                                    Retirez votre commande
                                                    directement chez FON-KPA.
                                                </p>

                                                <p
                                                    class="mt-2 text-xs font-bold
                                                           text-[#087A46]"
                                                >
                                                    Gratuit
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </label>

                            </div>

                        </div>


                        {{-- =================================================
                             MODE DE PAIEMENT
                        ================================================== --}}
                        <div class="mt-8">

                            <div class="mb-3">

                                <h3
                                    class="text-sm font-bold text-[#2F1608]"
                                >
                                    Mode de paiement
                                </h3>

                                <p class="mt-1 text-xs text-[#8A817B]">
                                    Sélectionnez votre moyen de paiement.
                                </p>

                            </div>


                            <div class="grid gap-3 sm:grid-cols-3">

                                @foreach([
                                    ['mobile_money', 'bi-phone', 'Mobile Money'],
                                    ['cash', 'bi-cash-coin', 'Paiement à la livraison'],
                                    ['card', 'bi-credit-card', 'Carte bancaire']
                                ] as [$value, $icon, $label])

                                    <label class="cursor-pointer">

                                        <input
                                            type="radio"
                                            name="payment_method"
                                            value="{{ $value }}"
                                            class="peer sr-only"
                                            @checked($value === 'mobile_money')
                                        >

                                        <div
                                            class="flex items-center gap-3
                                                   rounded-xl border
                                                   border-[#EEE7E2]
                                                   bg-[#FAF9F7]
                                                   p-3 transition
                                                   peer-checked:border-[#FF681F]
                                                   peer-checked:bg-[#FFF8F3]"
                                        >

                                            <i
                                                class="bi {{ $icon }}
                                                       text-lg text-[#FF681F]"
                                            ></i>

                                            <span
                                                class="text-xs font-semibold
                                                       text-[#593114]"
                                            >
                                                {{ $label }}
                                            </span>

                                        </div>

                                    </label>

                                @endforeach

                            </div>

                        </div>


                        {{-- =================================================
                             NOTE
                        ================================================== --}}
                        <div class="mt-8">

                            <label
                                for="note"
                                class="mb-1.5 block text-xs
                                       font-semibold text-[#593114]"
                            >
                                Note pour la commande

                                <span class="font-normal text-[#A69D97]">
                                    (facultatif)
                                </span>
                            </label>

                            <textarea
                                id="note"
                                name="note"
                                rows="3"
                                placeholder="Une précision concernant votre commande ?"
                                class="w-full resize-none rounded-xl
                                       border border-[#EEE7E2]
                                       bg-[#FAF9F7]
                                       px-3 py-3
                                       text-sm text-[#593114]
                                       outline-none transition
                                       placeholder:text-[#AAA29D]
                                       focus:border-[#FF681F]
                                       focus:bg-white
                                       focus:ring-2
                                       focus:ring-[#FF681F]/10"
                            >{{ old('note') }}</textarea>

                        </div>


                        {{-- =================================================
                             BOUTON CONFIRMATION
                        ================================================== --}}
                        <button
                            type="submit"
                            :disabled="loading"
                            class="mt-7 flex w-full
                                   items-center justify-center
                                   gap-2 rounded-xl
                                   bg-[#FF681F]
                                   px-5 py-3.5
                                   text-xs font-bold
                                   uppercase tracking-wide
                                   text-white
                                   shadow-sm
                                   transition-all
                                   hover:bg-[#593114]
                                   hover:shadow-md
                                   disabled:cursor-not-allowed
                                   disabled:opacity-60"
                        >

                            <i
                                class="bi"
                                :class="loading
                                    ? 'bi-arrow-repeat animate-spin'
                                    : 'bi-check2-circle'"
                            ></i>

                            <span
                                x-text="loading
                                    ? 'Traitement...'
                                    : 'Confirmer la commande'"
                            ></span>

                        </button>

                    </form>

                </div>


                {{-- =====================================================
                     COLONNE DROITE
                ====================================================== --}}
                <div class="space-y-4 lg:sticky lg:top-6">


                    {{-- =================================================
                         RÉSUMÉ
                    ================================================== --}}
                    <div
                        class="rounded-2xl bg-white p-5
                               shadow-[0_5px_20px_rgba(89,49,20,0.06)]"
                    >

                        {{-- HEADER --}}
                        <div class="flex items-center gap-3">

                            <div
                                class="flex h-10 w-10 shrink-0
                                       items-center justify-center
                                       rounded-xl bg-[#FFF0E8]
                                       text-[#FF681F]"
                            >
                                <i class="bi bi-bag-check text-lg"></i>
                            </div>

                            <div>

                                <h3
                                    class="text-lg font-bold text-[#2F1608]"
                                >
                                    Résumé de la commande
                                </h3>

                                {{-- =================================================
                                     NOMBRE D'ARTICLES DYNAMIQUE
                                ================================================== --}}
                                <p class="mt-0.5 text-xs text-[#8A817B]">

                                    {{ $totalArticles }}

                                    {{ $totalArticles > 1
                                        ? 'articles'
                                        : 'article'
                                    }}

                                </p>

                            </div>

                        </div>


                        <div class="my-5 h-px bg-[#EEE8E3]"></div>


                        {{-- =================================================
                             PRODUITS DU PANIER
                        ================================================== --}}

                        @forelse($cart as $item)

                            <div
                                class="{{ $loop->first ? '' : 'mt-4' }}
                                       flex items-center gap-3"
                            >

                                {{-- Image produit --}}
                                <img
                                    src="{{ asset('images/garba.jpg') }}"
                                    alt="{{ $item['name'] }}"
                                    class="h-16 w-16 shrink-0
                                           rounded-xl object-cover"
                                >

                                <div class="min-w-0 flex-1">

                                    {{-- Nom --}}
                                    <h4
                                        class="truncate text-sm font-semibold
                                               text-[#2F1608]"
                                    >
                                        {{ $item['name'] }}
                                    </h4>

                                    {{-- Quantité --}}
                                    <p
                                        class="mt-1 text-[11px]
                                               text-[#8A817B]"
                                    >
                                        Quantité :
                                        {{ $item['quantity'] }}
                                    </p>

                                    {{-- Prix de la ligne --}}
                                    <p
                                        class="mt-1 text-sm font-bold
                                               text-[#B84A0A]"
                                    >
                                        {{ number_format(
                                            $item['price'] * $item['quantity'],
                                            0,
                                            ',',
                                            ' '
                                        ) }}
                                        FCFA
                                    </p>

                                </div>

                            </div>

                        @empty

                            {{-- Panier vide --}}
                            <div class="py-5 text-center">

                                <div
                                    class="mx-auto flex h-12 w-12
                                           items-center justify-center
                                           rounded-xl bg-[#FFF0E8]
                                           text-[#FF681F]"
                                >
                                    <i class="bi bi-cart-x text-xl"></i>
                                </div>

                                <p
                                    class="mt-3 text-xs font-semibold
                                           text-[#593114]"
                                >
                                    Votre panier est vide.
                                </p>

                            </div>

                        @endforelse


                        <div class="my-5 h-px bg-[#EEE8E3]"></div>


                        {{-- =================================================
                             SOUS-TOTAL DYNAMIQUE
                        ================================================== --}}
                        <div
                            class="flex items-center justify-between text-xs"
                        >

                            <span class="text-[#756D67]">
                                Sous-total
                            </span>

                            <span class="font-semibold text-[#2F1608]">

                                {{ number_format(
                                    $subtotal,
                                    0,
                                    ',',
                                    ' '
                                ) }}

                                FCFA

                            </span>

                        </div>


                        {{-- =================================================
                             LIVRAISON
                        ================================================== --}}
                        <div
                            class="mt-3 flex items-center justify-between text-xs"
                        >

                            <span class="text-[#756D67]">
                                Livraison
                            </span>

                            <span
                                class="rounded-md bg-[#BFF3D7]
                                       px-2 py-1
                                       font-semibold text-[#087A46]"
                            >
                                Gratuit
                            </span>

                        </div>


                        <div class="my-5 h-px bg-[#EEE8E3]"></div>


                        {{-- =================================================
                             TOTAL DYNAMIQUE
                        ================================================== --}}
                        <div class="flex items-center justify-between">

                            <span
                                class="text-sm font-semibold text-[#2F1608]"
                            >
                                Total
                            </span>

                            <span
                                class="text-xl font-bold text-[#B84A0A]"
                            >

                                {{ number_format(
                                    $subtotal,
                                    0,
                                    ',',
                                    ' '
                                ) }}

                                FCFA

                            </span>

                        </div>

                    </div>


                    {{-- =================================================
                         GARANTIES
                    ================================================== --}}
                    <div
                        class="rounded-2xl bg-white px-4 py-5
                               shadow-[0_5px_20px_rgba(89,49,20,0.05)]"
                    >

                        <div
                            class="grid grid-cols-3
                                   divide-x divide-[#EEE8E3]"
                        >

                            {{-- LIVRAISON --}}
                            <div class="px-2 text-center">

                                <div
                                    class="mx-auto flex h-9 w-9
                                           items-center justify-center
                                           rounded-full bg-[#F7F4F1]
                                           text-[#8A817B]"
                                >
                                    <i class="bi bi-truck"></i>
                                </div>

                                <p
                                    class="mt-2 text-[9px]
                                           font-semibold leading-3
                                           text-[#593114]"
                                >
                                    Livraison rapide
                                </p>

                            </div>


                            {{-- PAIEMENT --}}
                            <div class="px-2 text-center">

                                <div
                                    class="mx-auto flex h-9 w-9
                                           items-center justify-center
                                           rounded-full bg-[#F7F4F1]
                                           text-[#8A817B]"
                                >
                                    <i class="bi bi-shield-check"></i>
                                </div>

                                <p
                                    class="mt-2 text-[9px]
                                           font-semibold leading-3
                                           text-[#593114]"
                                >
                                    Paiement sécurisé
                                </p>

                            </div>


                            {{-- QUALITÉ --}}
                            <div class="px-2 text-center">

                                <div
                                    class="mx-auto flex h-9 w-9
                                           items-center justify-center
                                           rounded-full bg-[#F7F4F1]
                                           text-[#8A817B]"
                                >
                                    <i class="bi bi-patch-check"></i>
                                </div>

                                <p
                                    class="mt-2 text-[9px]
                                           font-semibold leading-3
                                           text-[#593114]"
                                >
                                    Qualité garantie
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         RETOUR PANIER
                    ================================================== --}}
                    <a
                        href="{{ route('cart.index') }}"
                        class="flex w-full items-center
                               justify-center gap-2
                               rounded-xl border
                               border-[#593114]
                               bg-transparent
                               px-4 py-3
                               text-xs font-bold
                               text-[#593114]
                               transition
                               hover:bg-[#593114]
                               hover:text-white"
                    >

                        <i class="bi bi-arrow-left"></i>

                        Retour au panier

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- =============================================================
         ALPINE.JS
    ============================================================== --}}
    <script>

        function orderPage() {

            return {

                loading: false,

                deliveryMethod: 'delivery',

                submitOrder(event) {

                    this.loading = true;

                }

            }

        }

    </script>

</x-app-layout>