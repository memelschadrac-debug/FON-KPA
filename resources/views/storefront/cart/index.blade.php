{{-- resources/views/storefront/cart/index.blade.php --}}

<x-app-layout>

    @section('title', 'FON-KPA — Mon panier')

    <div class="min-h-screen bg-[#FCFAF7] text-[#3D1F0D] lg:mt-10">

        <main
            class="mx-auto w-full max-w-[1440px] px-[clamp(1.25rem,5vw,5rem)] pb-20 pt-10 sm:pt-14 lg:pb-28 lg:pt-16"
        >

            {{-- =========================================================
                 HEADER
            ========================================================== --}}

            <header>

                {{-- Fil d'étapes --}}
                <div class="mb-8 flex items-center gap-3">

                    <div class="flex items-center gap-2">

                        <div
                            class="flex h-8 w-8 shrink-0 items-center
                            justify-center rounded-full
                            bg-[#E25F12] text-white
                            shadow-[0_5px_15px_rgba(226,95,18,0.2)]"
                        >
                            <span class="text-[10px] font-bold">1</span>
                        </div>

                        <div class="hidden sm:block">

                            <p
                                class="text-[8px] font-bold
                                    uppercase tracking-[0.12em]
                                    text-[#E25F12]"
                            >
                                    Étape 1
                            </p>

                            <p
                                class="text-[10px] font-bold
                                    text-[#593114]"
                            >
                                Panier
                            </p>

                        </div>

                    </div>


                    <span class="h-px w-8 bg-[#DCCFC5] sm:w-12"></span>

                    <div class="flex items-center gap-2">

                        <span
                            class="flex h-7 w-7 items-center justify-center rounded-full border border-[#DED3CB] bg-white text-[9px] font-semibold text-[#A2948B]"
                        >
                            2
                        </span>

                       <div class="hidden sm:block">

                            <p
                                class="text-[8px] font-bold
                                uppercase tracking-[0.12em]
                                text-[#9B8D82]"
                            >
                                Étape 2
                            </p>

                            <p
                                class="text-[10px] font-bold
                                text-[#593114]"
                            >
                                Livraison
                            </p>

                        </div>

                    </div>

                    <span class="h-px w-8 bg-[#DCCFC5] sm:w-12"></span>


                    <div class="flex items-center gap-2">

                        <span
                            class="flex h-7 w-7 items-center justify-center rounded-full border border-[#DED3CB] bg-white text-[9px] font-semibold text-[#A2948B]"
                        >
                            3
                        </span>

                       <div class="hidden sm:block">

                            <p
                                class="text-[8px] font-bold
                                uppercase tracking-[0.12em]
                                text-[#9B8D82]"
                            >
                                Étape 3
                            </p>

                            <p
                                class="text-[10px] font-bold
                                text-[#593114]"
                            >
                                Paiament
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Titre --}}
                <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">

                    <div>

                        <span
                            class="text-[9px] font-bold uppercase tracking-[0.25em] text-[#E25F12]"
                        >
                            Votre sélection
                        </span>

                        <h2
                            class="mt-2 text-[2.1rem] font-black leading-none tracking-[-0.045em] text-[#3B200F] sm:text-4xl lg:text-[3.1rem]"
                        >
                            Mon panier
                        </h2>

                        <p
                            class="mt-3 max-w-xl text-xs leading-6 text-[#81756D] sm:text-sm"
                        >
                            Vérifiez votre sélection avant de passer à la livraison.
                            Vos plats préférés sont presque prêts à rejoindre votre table.
                        </p>

                    </div>


                    {{-- Nombre articles --}}
                    <div
                        class="flex w-fit items-center gap-2 rounded-full border border-[#E8DDD5] bg-white px-4 py-2.5 shadow-[0_5px_20px_rgba(89,49,20,0.04)]"
                    >

                        <i class="bi bi-bag text-[12px] text-[#E25F12]"></i>

                        <span class="text-[10px] font-semibold text-[#756A62]">
                            {{ $totalArticles }}
                            {{ $totalArticles > 1 ? 'articles' : 'article' }}
                        </span>

                    </div>

                </div>

            </header>


            {{-- =========================================================
                 PANIER
            ========================================================== --}}

            @if(count($cart) > 0)

                <div
                    class="mt-10 grid items-start gap-8 lg:grid-cols-[minmax(0,1fr)_370px]"
                >

                    {{-- =================================================
                         COLONNE GAUCHE
                    ================================================== --}}

                    <div class="min-w-0">


                        {{-- =================================================
                             PRODUITS
                        ================================================== --}}

                        <section>

                            <div class="mb-4 flex items-center justify-between">

                                <div>

                                    <p class="text-[28px] font-black text-[#593114]">
                                        Vos articles
                                    </p>

                                    <p class="mt-1 text-[9px] text-[#9A8D84]">
                                        Quantité et détails de votre commande
                                    </p>

                                </div>

                                <span
                                    class="hidden text-[9px] font-medium uppercase tracking-[0.12em] text-[#B0A39A] sm:block"
                                >
                                    {{ $totalArticles }}
                                    {{ $totalArticles > 1 ? 'articles' : 'article' }}
                                </span>

                            </div>


                            {{-- LISTE DES PRODUITS --}}
                            <div class="space-y-4">

                                @foreach($cart as $lineKey => $item)

                                    @php
                                        $quantity = (int) ($item['quantity'] ?? 1);
                                        $unitPrice = (float) ($item['price'] ?? 0);
                                        $lineSubtotal = $unitPrice * $quantity;
                                        $options = $item['options'] ?? [];
                                    @endphp


                                    <article
                                        class="group relative overflow-hidden rounded-[1.5rem] border border-[#EDE3DB] bg-white p-3.5 shadow-[0_8px_30px_rgba(89,49,20,0.035)] transition-all duration-300 hover:border-[#E5D4C5] hover:shadow-[0_15px_40px_rgba(89,49,20,0.07)] sm:p-4"
                                    >

                                        <div class="flex gap-4 sm:gap-5">


                                            {{-- =================================================
                                                IMAGE
                                            ================================================== --}}

                                            <div
                                                class="relative h-[100px] w-[100px] shrink-0 overflow-hidden rounded-[1.15rem] bg-[#F7EEE7] sm:h-[125px] sm:w-[125px]"
                                            >
                                                @if(!empty($item['image']))
                                                    <img
                                                        src="{{ $item['image'] }}"
                                                        alt="{{ $item['name'] ?? 'Plat FON-KPA' }}"
                                                        class="block h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                                        loading="lazy"
                                                        onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');"
                                                    >

                                                    <div class="absolute inset-0 hidden items-center justify-center bg-[#F7EEE7] text-[#B69F8E]">
                                                        <div class="text-center">
                                                            <i class="bi bi-image text-2xl"></i>
                                                            <p class="mt-1 text-[8px] font-semibold">
                                                                Image indisponible
                                                            </p>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="flex h-full w-full items-center justify-center text-[#B69F8E]">
                                                        <div class="text-center">
                                                            <i class="bi bi-image text-2xl"></i>
                                                            <p class="mt-1 text-[8px] font-semibold">
                                                                Image indisponible
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endif

                                                <span
                                                    class="absolute bottom-2 left-2 flex h-6 items-center gap-1 rounded-full border border-white/80 bg-white/90 px-2 text-[7px] font-bold text-[#593114] shadow-sm backdrop-blur-sm"
                                                >
                                                    <i class="bi bi-check-circle-fill text-[#4B8B5D]"></i>
                                                    Disponible
                                                </span>
                                            </div>


                                            {{-- =================================================
                                                 INFORMATIONS
                                            ================================================== --}}

                                            <div
                                                class="flex min-w-0 flex-1 flex-col justify-between py-0.5"
                                            >

                                                <div>

                                                    <div
                                                        class="flex items-start justify-between gap-3"
                                                    >

                                                        <div class="min-w-0">

                                                            <p
                                                                class="mb-1 text-[8px] font-bold uppercase tracking-[0.15em] text-[#A4958B]"
                                                            >
                                                                Plat FON-KPA
                                                            </p>

                                                            <h3
                                                                class="line-clamp-2 text-sm font-black leading-5 text-[#3B200F] sm:text-[15px]"
                                                            >
                                                                {{ $item['name'] ?? 'Plat FON-KPA' }}
                                                            </h3>

                                                        </div>


                                                        {{-- SUPPRIMER --}}
                                                        <form
                                                            method="POST"
                                                            action="{{ route('cart.destroy', $lineKey) }}"
                                                            class="shrink-0"
                                                        >

                                                            @csrf
                                                            @method('DELETE')

                                                            <button
                                                                type="submit"
                                                                class="flex h-8 w-8 items-center justify-center rounded-full text-[#A79B93] transition-all hover:bg-[#FFF1EC] hover:text-[#C24B24]"
                                                                aria-label="Supprimer {{ $item['name'] ?? 'ce plat' }}"
                                                            >

                                                                <i class="bi bi-trash3 text-[11px]"></i>

                                                            </button>

                                                        </form>

                                                    </div>


                                                    {{-- DESCRIPTION --}}
                                                    <div
                                                        class="mt-2 flex items-center gap-2"
                                                    >

                                                        <span
                                                            class="flex items-center gap-1 text-[8px] text-[#9A8D84]"
                                                        >

                                                            <i class="bi bi-stars text-[#E25F12]"></i>

                                                            Cuisine ivoirienne

                                                        </span>

                                                        <span class="h-1 w-1 rounded-full bg-[#D8CCC4]"></span>

                                                        <span class="text-[8px] text-[#9A8D84]">
                                                            Préparé avec soin
                                                        </span>

                                                    </div>


                                                    {{-- =================================================
                                                         PERSONNALISATION
                                                    ================================================== --}}

                                                    @if(count($options) > 0)

                                                        <div
                                                            class="mt-4 rounded-xl border border-[#EEE4DC] bg-[#FCFAF7] p-3"
                                                        >

                                                            <div
                                                                class="mb-2.5 flex items-center justify-between gap-3"
                                                            >

                                                                <div
                                                                    class="flex items-center gap-2"
                                                                >

                                                                    <span
                                                                        class="flex h-6 w-6 items-center justify-center rounded-lg bg-white text-[#E25F12] shadow-sm"
                                                                    >
                                                                        <i class="bi bi-sliders2 text-[9px]"></i>
                                                                    </span>

                                                                    <span
                                                                        class="text-[8px] font-bold uppercase tracking-[0.12em] text-[#593114]"
                                                                    >
                                                                        Votre personnalisation
                                                                    </span>

                                                                </div>

                                                                <span
                                                                    class="text-[7px] font-semibold text-[#A09288]"
                                                                >
                                                                    {{ count($options) }}
                                                                    {{ count($options) > 1 ? 'options' : 'option' }}
                                                                </span>

                                                            </div>


                                                            <div class="space-y-2">

                                                                @foreach($options as $option)

                                                                    <div
                                                                        class="flex items-center justify-between gap-3"
                                                                    >

                                                                        <div class="flex min-w-0 items-center gap-2">

                                                                            <span
                                                                                class="h-1.5 w-1.5 shrink-0 rounded-full bg-[#E25F12]"
                                                                            ></span>

                                                                            <div class="min-w-0">

                                                                                <p
                                                                                    class="truncate text-[8px] font-semibold text-[#593114]"
                                                                                >
                                                                                    {{ $option['group'] ?? 'Option' }}
                                                                                </p>

                                                                                <p
                                                                                    class="truncate text-[8px] text-[#8F8279]"
                                                                                >
                                                                                    {{ $option['choice'] ?? '' }}
                                                                                </p>

                                                                            </div>

                                                                        </div>


                                                                        {{-- MODIFICATEUR DE PRIX --}}
                                                                        @php
                                                                            $modifier = (float) ($option['price_modifier'] ?? 0);
                                                                        @endphp

                                                                        @if($modifier > 0)

                                                                            <span
                                                                                class="shrink-0 text-[8px] font-bold text-[#A84B0B]"
                                                                            >
                                                                                +
                                                                                {{ number_format($modifier, 0, ',', ' ') }}
                                                                                FCFA
                                                                            </span>

                                                                        @elseif($modifier < 0)

                                                                            <span
                                                                                class="shrink-0 text-[8px] font-bold text-[#4B8B5D]"
                                                                            >
                                                                                -
                                                                                {{ number_format(abs($modifier), 0, ',', ' ') }}
                                                                                FCFA
                                                                            </span>

                                                                        @else

                                                                            <span
                                                                                class="shrink-0 text-[7px] font-semibold text-[#8C8078]"
                                                                            >
                                                                                Inclus
                                                                            </span>

                                                                        @endif

                                                                    </div>

                                                                @endforeach

                                                            </div>

                                                        </div>

                                                    @else

                                                        {{-- Aucun choix --}}
                                                        <div
                                                            class="mt-3 flex items-center gap-2"
                                                        >

                                                            <span
                                                                class="flex h-5 w-5 items-center justify-center rounded-full bg-[#F2EDE8] text-[#8F8178]"
                                                            >
                                                                <i class="bi bi-check text-[9px]"></i>
                                                            </span>

                                                            <span
                                                                class="text-[8px] text-[#958980]"
                                                            >
                                                                Préparation standard
                                                            </span>

                                                        </div>

                                                    @endif

                                                </div>


                                                {{-- =================================================
                                                     BAS DE CARTE
                                                ================================================== --}}

                                                <div
                                                    class="mt-4 flex flex-wrap items-end justify-between gap-4"
                                                >


                                                    {{-- PRIX UNITAIRE --}}
                                                    <div>

                                                        <p
                                                            class="text-[8px] uppercase tracking-[0.12em] text-[#A99B91]"
                                                        >
                                                            Prix unitaire
                                                        </p>

                                                        <p
                                                            class="mt-0.5 text-sm font-black tracking-tight text-[#A84B0B]"
                                                        >

                                                            {{ number_format($unitPrice, 0, ',', ' ') }}

                                                            <span
                                                                class="text-[8px] font-bold text-[#8D8078]"
                                                            >
                                                                FCFA
                                                            </span>

                                                        </p>

                                                    </div>


                                                    {{-- QUANTITÉ --}}
                                                    <div
                                                        class="flex items-center overflow-hidden rounded-full border border-[#E6DCD4] bg-[#FCFAF7]"
                                                    >

                                                        {{-- MOINS --}}
                                                        <form
                                                            method="POST"
                                                            action="{{ route('cart.update', $lineKey) }}"
                                                        >

                                                            @csrf
                                                            @method('PATCH')

                                                            <input
                                                                type="hidden"
                                                                name="quantity"
                                                                value="{{ max(1, $quantity - 1) }}"
                                                            >

                                                            <button
                                                                type="submit"
                                                                class="flex h-8 w-8 items-center justify-center text-[#593114] transition hover:bg-[#F2E7DE] disabled:cursor-not-allowed disabled:opacity-40"
                                                                aria-label="Diminuer la quantité"
                                                                @if($quantity <= 1) disabled @endif
                                                            >

                                                                <i class="bi bi-dash text-[11px]"></i>

                                                            </button>

                                                        </form>


                                                        {{-- QUANTITÉ --}}
                                                        <span
                                                            class="flex h-8 min-w-8 items-center justify-center border-x border-[#E6DCD4] px-2 text-[10px] font-black text-[#593114]"
                                                        >
                                                            {{ $quantity }}
                                                        </span>


                                                        {{-- PLUS --}}
                                                        <form
                                                            method="POST"
                                                            action="{{ route('cart.update', $lineKey) }}"
                                                        >

                                                            @csrf
                                                            @method('PATCH')

                                                            <input
                                                                type="hidden"
                                                                name="quantity"
                                                                value="{{ min(99, $quantity + 1) }}"
                                                            >

                                                            <button
                                                                type="submit"
                                                                class="flex h-8 w-8 items-center justify-center text-[#593114] transition hover:bg-[#F2E7DE]"
                                                                aria-label="Augmenter la quantité"
                                                            >

                                                                <i class="bi bi-plus text-[11px]"></i>

                                                            </button>

                                                        </form>

                                                    </div>


                                                    {{-- TOTAL LIGNE --}}
                                                    <div class="text-right">

                                                        <p
                                                            class="text-[8px] uppercase tracking-[0.12em] text-[#A99B91]"
                                                        >
                                                            Total
                                                        </p>

                                                        <p
                                                            class="mt-0.5 text-sm font-black text-[#593114]"
                                                        >

                                                            {{ number_format($lineSubtotal, 0, ',', ' ') }}

                                                            <span class="text-[8px]">
                                                                FCFA
                                                            </span>

                                                        </p>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </article>

                                @endforeach

                            </div>

                        </section>


                        {{-- =================================================
                             INFORMATIONS LIVRAISON
                        ================================================== --}}

                        <section class="mt-7">

                            <div
                                class="rounded-[1.5rem] border border-[#E9DED5] bg-white p-5 sm:p-6"
                            >

                                <div class="flex items-start gap-4">

                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#F8EBD9] text-[#593114]"
                                    >
                                        <i class="bi bi-truck text-sm"></i>
                                    </div>

                                    <div class="min-w-0">

                                        <h3 class="text-sm font-black text-[#593114]">
                                            Livraison
                                        </h3>

                                        <p
                                            class="mt-1 text-[9px] leading-5 text-[#94877F]"
                                        >
                                            Les informations de livraison seront précisées
                                            lors de l'étape suivante.
                                        </p>

                                    </div>

                                </div>


                                <div class="mt-5 grid gap-3 sm:grid-cols-2">

                                    {{-- ZONE --}}
                                    <div
                                        class="rounded-xl border border-[#EEE5DE] bg-[#FCFAF7] p-4"
                                    >

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-white text-[#E25F12] shadow-sm"
                                            >
                                                <i class="bi bi-geo-alt text-xs"></i>
                                            </div>

                                            <div>

                                                <p
                                                    class="text-[8px] uppercase tracking-[0.12em] text-[#A1948B]"
                                                >
                                                    Zone de livraison
                                                </p>

                                                <p
                                                    class="mt-0.5 text-[10px] font-bold text-[#593114]"
                                                >
                                                    À définir
                                                </p>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- TEMPS --}}
                                    <div
                                        class="rounded-xl border border-[#EEE5DE] bg-[#FCFAF7] p-4"
                                    >

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-white text-[#E25F12] shadow-sm"
                                            >
                                                <i class="bi bi-clock text-xs"></i>
                                            </div>

                                            <div>

                                                <p
                                                    class="text-[8px] uppercase tracking-[0.12em] text-[#A1948B]"
                                                >
                                                    Livraison
                                                </p>

                                                <p
                                                    class="mt-0.5 text-[10px] font-bold text-[#593114]"
                                                >
                                                    Rapide à Abidjan
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- =================================================
                             GARANTIES
                        ================================================== --}}

                        <section class="mt-4">

                            <div
                                class="grid grid-cols-1 divide-y divide-[#EEE6DF] overflow-hidden rounded-[1.5rem] border border-[#E9DED5] bg-white sm:grid-cols-3 sm:divide-x sm:divide-y-0"
                            >

                                {{-- GARANTIE 1 --}}
                                <div class="flex items-center gap-3 p-4">

                                    <div
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#FFF1E8] text-[#E25F12]"
                                    >
                                        <i class="bi bi-patch-check text-sm"></i>
                                    </div>

                                    <div>

                                        <p class="text-[9px] font-bold text-[#593114]">
                                            Qualité garantie
                                        </p>

                                        <p
                                            class="mt-0.5 text-[8px] leading-4 text-[#9B8E85]"
                                        >
                                            Des plats préparés avec soin.
                                        </p>

                                    </div>

                                </div>


                                {{-- GARANTIE 2 --}}
                                <div class="flex items-center gap-3 p-4">

                                    <div
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#FFF1E8] text-[#E25F12]"
                                    >
                                        <i class="bi bi-truck text-sm"></i>
                                    </div>

                                    <div>

                                        <p class="text-[9px] font-bold text-[#593114]">
                                            Livraison rapide
                                        </p>

                                        <p
                                            class="mt-0.5 text-[8px] leading-4 text-[#9B8E85]"
                                        >
                                            Pensée pour votre quotidien.
                                        </p>

                                    </div>

                                </div>


                                {{-- GARANTIE 3 --}}
                                <div class="flex items-center gap-3 p-4">

                                    <div
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#FFF1E8] text-[#E25F12]"
                                    >
                                        <i class="bi bi-shield-check text-sm"></i>
                                    </div>

                                    <div>

                                        <p class="text-[9px] font-bold text-[#593114]">
                                            Paiement sécurisé
                                        </p>

                                        <p
                                            class="mt-0.5 text-[8px] leading-4 text-[#9B8E85]"
                                        >
                                            Une commande simple et sécurisée.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- =================================================
                             CONTINUER ACHATS
                        ================================================== --}}

                        <a
                            href="{{ route('plats.index') }}"
                            class="mt-6 inline-flex items-center gap-2 text-[9px] font-bold uppercase tracking-[0.12em] text-[#593114] transition hover:text-[#E25F12]"
                        >

                            <i class="bi bi-arrow-left"></i>

                            Continuer mes achats

                        </a>

                    </div>


                    {{-- =================================================
                         COLONNE DROITE — RÉSUMÉ
                    ================================================== --}}

                    <aside class="lg:sticky lg:top-6">

                        <div
                            class="overflow-hidden rounded-[1.7rem] border border-[#E7DCD4] bg-white shadow-[0_15px_50px_rgba(89,49,20,0.07)]"
                        >

                            {{-- HEADER SUMMARY --}}
                            <div
                                class="border-b border-[#EEE6DF] px-6 pb-5 pt-6"
                            >

                                <div class="flex items-center justify-between">

                                    <div>

                                        <p
                                            class="text-[8px] font-bold uppercase tracking-[0.2em] text-[#E25F12]"
                                        >
                                            Votre commande
                                        </p>

                                        <p
                                            class="mt-1 text-[28px] font-black tracking-[-0.02em] text-[#593114]"
                                        >
                                            Résumé
                                        </p>

                                    </div>

                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-[#F8EBD9] text-[#593114]"
                                    >
                                        <i class="bi bi-receipt text-sm"></i>
                                    </div>

                                </div>

                            </div>


                            {{-- DETAILS --}}
                            <div class="px-6 py-5">

                                {{-- SOUS-TOTAL --}}
                                <div class="flex items-center justify-between">

                                    <span class="text-[10px] text-[#82766E]">
                                        Sous-total
                                    </span>

                                    <span
                                        class="text-[11px] font-bold text-[#593114]"
                                    >
                                        {{ number_format($subtotal, 0, ',', ' ') }}
                                        FCFA
                                    </span>

                                </div>


                                {{-- LIVRAISON --}}
                                <div class="mt-4 flex items-center justify-between">

                                    <span
                                        class="flex items-center gap-2 text-[10px] text-[#82766E]"
                                    >
                                        Livraison

                                        <span
                                            class="flex h-4 w-4 items-center justify-center rounded-full bg-[#F5EEE8] text-[#A4968D]"
                                            title="Les frais seront calculés à l'étape suivante."
                                        >
                                            <i class="bi bi-info text-[7px]"></i>
                                        </span>

                                    </span>

                                    <span
                                        class="rounded-full bg-[#EAF7EF] px-2.5 py-1 text-[8px] font-bold text-[#388253]"
                                    >
                                        À confirmer
                                    </span>

                                </div>


                                {{-- TAXES --}}
                                <div class="mt-4 flex items-center justify-between">

                                    <span class="text-[10px] text-[#82766E]">
                                        Taxes estimées
                                    </span>

                                    <span
                                        class="text-[11px] font-bold text-[#593114]"
                                    >
                                        0 FCFA
                                    </span>

                                </div>


                                {{-- SÉPARATEUR --}}
                                <div
                                    class="my-5 border-t border-dashed border-[#DED4CC]"
                                ></div>


                                {{-- TOTAL --}}
                                <div
                                    class="flex items-end justify-between gap-3"
                                >

                                    <div>

                                        <p
                                            class="text-[9px] uppercase tracking-[0.14em] text-[#A09288]"
                                        >
                                            Total
                                        </p>

                                        <p
                                            class="mt-1 text-[8px] text-[#A09288]"
                                        >
                                            Hors frais de livraison
                                        </p>

                                    </div>

                                    <div class="text-right">

                                        <p
                                            class="text-2xl font-black tracking-[-0.035em] text-[#A84B0B]"
                                        >

                                            {{ number_format($subtotal, 0, ',', ' ') }}

                                            <span
                                                class="text-[9px] font-bold text-[#806F65]"
                                            >
                                                FCFA
                                            </span>

                                        </p>

                                    </div>

                                </div>


                                {{-- CTA --}}
                                <a
                                    href="{{ route('commande.index') }}"
                                    class="group mt-6 flex h-12 w-full items-center justify-center gap-3 rounded-xl bg-[#593114] px-5 text-[10px] font-bold uppercase tracking-[0.08em] text-white shadow-lg shadow-[#593114]/10 transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#E25F12] hover:shadow-xl hover:shadow-[#E25F12]/15"
                                >

                                    Passer à la commande

                                    <i
                                        class="bi bi-arrow-right text-[11px] transition-transform duration-300 group-hover:translate-x-1"
                                    ></i>

                                </a>


                                {{-- SECURITE --}}
                                <div
                                    class="mt-4 flex items-center justify-center gap-2"
                                >

                                    <i
                                        class="bi bi-shield-lock text-[10px] text-[#6B9B79]"
                                    ></i>

                                    <span class="text-[8px] text-[#94877F]">
                                        Commande sécurisée
                                    </span>

                                </div>

                            </div>


                            {{-- INFOS PAYMENT --}}
                            <div
                                class="border-t border-[#EEE6DF] bg-[#FCFAF7] px-6 py-5"
                            >

                                <div class="flex items-start gap-3">

                                    <div
                                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-[#593114] shadow-sm"
                                    >
                                        <i class="bi bi-credit-card text-xs"></i>
                                    </div>

                                    <div>

                                        <p class="text-[9px] font-bold text-[#593114]">
                                            Paiement
                                        </p>

                                        <p
                                            class="mt-1 text-[8px] leading-4 text-[#978A81]"
                                        >
                                            Les moyens de paiement disponibles
                                            seront présentés lors de la prochaine étape.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             TRUST CARD
                        ================================================== --}}

                        <div
                            class="mt-4 rounded-[1.5rem] border border-[#E9DED5] bg-[#F8EBD9] p-5"
                        >

                            <div class="flex items-start gap-3">

                                <div
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white text-[#E25F12] shadow-sm"
                                >
                                    <i class="bi bi-heart-fill text-[11px]"></i>
                                </div>

                                <div>

                                    <p class="text-[9px] font-bold text-[#593114]">
                                        Une cuisine qui nous ressemble.
                                    </p>

                                    <p
                                        class="mt-1 text-[8px] leading-4 text-[#806F65]"
                                    >
                                        Des saveurs ivoiriennes préparées avec
                                        passion, pour une expérience simple et authentique.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </aside>

                </div>


            @else

                {{-- =========================================================
                     PANIER VIDE
                ========================================================== --}}

                <section
                    class="mt-12 overflow-hidden rounded-[2rem] border border-[#E9DED5] bg-white shadow-[0_15px_50px_rgba(89,49,20,0.045)]"
                >

                    <div
                        class="relative flex min-h-[520px] flex-col items-center justify-center overflow-hidden px-6 py-16 text-center"
                    >

                        {{-- Décor --}}
                        <div
                            class="pointer-events-none absolute -left-20 top-0 h-64 w-64 rounded-full bg-[#F4C451]/10 blur-3xl"
                        ></div>

                        <div
                            class="pointer-events-none absolute -right-24 bottom-0 h-80 w-80 rounded-full bg-[#E25F12]/[0.06] blur-3xl"
                        ></div>


                        {{-- Icône --}}
                        <div
                            class="relative flex h-24 w-24 items-center justify-center rounded-full bg-[#F8EBD9]"
                        >

                            <div
                                class="flex h-16 w-16 items-center justify-center rounded-full bg-white text-[#E25F12] shadow-sm"
                            >
                                <i class="bi bi-bag text-2xl"></i>
                            </div>

                        </div>


                        <span
                            class="relative mt-7 text-[9px] font-bold uppercase tracking-[0.25em] text-[#E25F12]"
                        >
                            Votre sélection
                        </span>


                        <h2
                            class="relative mt-2 text-2xl font-black tracking-[-0.035em] text-[#3B200F] sm:text-3xl"
                        >
                            Votre panier est vide
                        </h2>


                        <p
                            class="relative mt-3 max-w-md text-xs leading-6 text-[#81756D] sm:text-sm"
                        >
                            Vous n'avez encore ajouté aucun plat.
                            Découvrez nos spécialités ivoiriennes et composez votre prochaine commande.
                        </p>


                        {{-- CTA --}}
                        <a
                            href="{{ route('plats.index') }}"
                            class="relative mt-7 inline-flex h-11 items-center gap-3 rounded-full bg-[#593114] px-6 text-[10px] font-bold uppercase tracking-[0.08em] text-white shadow-lg shadow-[#593114]/10 transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#E25F12]"
                        >

                            Découvrir nos plats

                            <i class="bi bi-arrow-up-right text-[10px]"></i>

                        </a>


                        {{-- Benefits --}}
                        <div
                            class="relative mt-10 flex flex-wrap items-center justify-center gap-5"
                        >

                            <div class="flex items-center gap-2">

                                <i
                                    class="bi bi-patch-check-fill text-[11px] text-[#E25F12]"
                                ></i>

                                <span
                                    class="text-[8px] font-semibold text-[#82766E]"
                                >
                                    Qualité garantie
                                </span>

                            </div>


                            <span
                                class="hidden h-3 w-px bg-[#DED4CC] sm:block"
                            ></span>


                            <div class="flex items-center gap-2">

                                <i
                                    class="bi bi-truck text-[11px] text-[#E25F12]"
                                ></i>

                                <span
                                    class="text-[8px] font-semibold text-[#82766E]"
                                >
                                    Livraison rapide
                                </span>

                            </div>


                            <span
                                class="hidden h-3 w-px bg-[#DED4CC] sm:block"
                            ></span>


                            <div class="flex items-center gap-2">

                                <i
                                    class="bi bi-shield-check text-[11px] text-[#E25F12]"
                                ></i>

                                <span
                                    class="text-[8px] font-semibold text-[#82766E]"
                                >
                                    Paiement sécurisé
                                </span>

                            </div>

                        </div>

                    </div>

                </section>

            @endif

        </main>

    </div>

</x-app-layout>