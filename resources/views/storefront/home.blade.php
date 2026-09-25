@extends('layouts.storefront')

@section('title', 'FON-KPA — La cuisine ivoirienne autrement')

@section('content')

<div
    x-data="fonkpaHome()"
    x-init="init()"
    class="min-h-screen overflow-hidden bg-[#FCFAF7] text-[#3D1F0D]"
>

    {{-- ========================================================= --}}
    {{-- HERO                                                       --}}
    {{-- ========================================================= --}}

    <section class="relative mt-10 overflow-hidden lg:mt-10">

        <div class="pointer-events-none absolute -left-32 top-20 h-72 w-72 rounded-full bg-[#F4C451]/10 blur-3xl"></div>

        <div class="pointer-events-none absolute right-[-120px] top-0 h-[450px] w-[450px] rounded-full bg-[#E25F12]/[0.05] blur-3xl"></div>


        <div class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]">

            <div class="grid min-h-[650px] grid-cols-1 items-center gap-10 py-12 lg:grid-cols-[0.9fr_1.1fr] lg:gap-4 lg:py-16">

                {{-- TEXTE --}}
                <div class="relative z-10 max-w-[580px]">

                    <div class="mb-6 flex items-center gap-3">

                        <span class="badge rounded-full border-[#E8D9CC] bg-white px-4 py-3 text-[9px] font-bold uppercase tracking-[0.2em] text-[#E25F12] shadow-sm">
                            Cuisine ivoirienne
                        </span>

                        <span class="hidden h-px w-10 bg-[#E5D7CC] sm:block"></span>

                        <span class="hidden text-[9px] font-medium uppercase tracking-wider text-[#9A887A] sm:block">
                            Fait avec passion
                        </span>

                    </div>


                    <h1 class="max-w-[620px] text-[3rem] font-black leading-[0.98] tracking-[-0.055em] text-[#3B200F] sm:text-[4.3rem] lg:text-[4.7rem] xl:text-[5.2rem]">

                        Le goût de

                        <span class="relative inline-block text-[#E25F12]">

                            chez nous.

                            <svg
                                class="absolute -bottom-3 left-0 h-3 w-full"
                                viewBox="0 0 300 12"
                                fill="none"
                                preserveAspectRatio="none"
                            >
                                <path
                                    d="M3 8C72 1 195 1 297 7"
                                    stroke="#F4C451"
                                    stroke-width="4"
                                    stroke-linecap="round"
                                />
                            </svg>

                        </span>

                    </h1>


                    <p class="mt-7 max-w-[500px] text-sm leading-7 text-[#756960] sm:text-[15px]">
                        Découvrez une cuisine ivoirienne généreuse,
                        authentique et moderne. Des recettes inspirées
                        de nos traditions, préparées avec des ingrédients
                        soigneusement sélectionnés.
                    </p>


                    {{-- CTA --}}
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">

                        <a
                            href="{{ route('plats.index') }}"
                            class="btn h-12 min-h-12 rounded-full border-0 bg-[#593114] px-7 text-[11px] font-bold text-white shadow-lg shadow-[#593114]/15 transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#E25F12]"
                        >
                            Découvrir le menu

                            <i class="bi bi-arrow-up-right ml-1"></i>
                        </a>

                        <a
                            href="{{ route('categories.index') }}"
                            class="btn h-12 min-h-12 rounded-full border border-[#E3D5C9] bg-white px-7 text-[11px] font-semibold text-[#593114] shadow-none hover:border-[#593114] hover:bg-white"
                        >
                            <i class="bi bi-grid mr-1"></i>
                            Explorer les catégories
                        </a>

                    </div>


                    {{-- INFOS --}}
                    <div class="mt-10 flex flex-wrap items-center gap-6">

                        <div class="flex items-center gap-2">

                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#F8EBD9] text-[#593114]">
                                <i class="bi bi-patch-check-fill text-sm"></i>
                            </div>

                            <div>
                                <p class="text-[9px] text-[#9B8B80]">
                                    Qualité
                                </p>

                                <p class="text-[10px] font-bold text-[#593114]">
                                    Produits frais
                                </p>
                            </div>

                        </div>


                        <div class="h-7 w-px bg-[#E5DAD1]"></div>


                        <div class="flex items-center gap-2">

                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#F8EBD9] text-[#593114]">
                                <i class="bi bi-truck text-sm"></i>
                            </div>

                            <div>
                                <p class="text-[9px] text-[#9B8B80]">
                                    Service
                                </p>

                                <p class="text-[10px] font-bold text-[#593114]">
                                    Livraison rapide
                                </p>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- VISUEL HERO --}}
                <div class="relative flex min-h-[520px] items-center justify-center lg:min-h-[590px]">

                    <div class="absolute h-[390px] w-[390px] rounded-full bg-[#F5E8D7] sm:h-[500px] sm:w-[500px] lg:h-[570px] lg:w-[570px]"></div>

                    <div class="absolute h-[320px] w-[320px] rounded-full border border-[#E8D9CA] sm:h-[420px] sm:w-[420px]"></div>


                    <div class="relative z-10 h-[430px] w-[430px] sm:h-[510px] sm:w-[510px] lg:h-[570px] lg:w-[570px]">

                        <img
                            src="{{ asset('images/garba.png') }}"
                            alt="Plat ivoirien FON-KPA"
                            class="h-full w-full object-contain drop-shadow-[0_30px_35px_rgba(89,49,20,0.16)]"
                        >

                    </div>


                    {{-- Floating card 1 --}}
                    <div class="absolute left-0 top-16 z-20 hidden rounded-2xl border border-[#EADFD5] bg-white/95 p-3 shadow-xl backdrop-blur-sm sm:block lg:left-2">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#593114] text-white">
                                <i class="bi bi-heart-fill text-sm"></i>
                            </div>

                            <div>
                                <p class="text-[9px] text-[#9A8B81]">
                                    Notre spécialité
                                </p>

                                <p class="mt-0.5 text-[10px] font-bold text-[#593114]">
                                    Saveurs authentiques
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Floating card 2 --}}
                    <div class="absolute bottom-12 right-0 z-20 rounded-2xl border border-[#EADFD5] bg-white/95 p-3 shadow-xl backdrop-blur-sm sm:right-4">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F4C451] text-[#593114]">
                                <i class="bi bi-star-fill text-sm"></i>
                            </div>

                            <div>
                                <p class="text-[9px] text-[#9A8B81]">
                                    Expérience
                                </p>

                                <p class="mt-0.5 text-[10px] font-bold text-[#593114]">
                                    100% ivoirienne
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Badge vertical --}}
                    <div class="absolute right-0 top-20 hidden flex-col gap-2 lg:flex">

                        <template
                            x-for="item in heroBadges"
                            :key="item.label"
                        >

                            <div class="flex items-center gap-2 rounded-full border border-[#E9DED5] bg-white/90 px-3 py-2 shadow-sm backdrop-blur-sm">

                                <span
                                    class="h-2 w-2 rounded-full"
                                    :class="item.color"
                                ></span>

                                <span
                                    class="text-[8px] font-semibold text-[#6D5F56]"
                                    x-text="item.label"
                                ></span>

                            </div>

                        </template>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
{{-- PLATS POPULAIRES                                          --}}
{{-- ========================================================= --}}

<section class="bg-white py-20 sm:py-24">

    <div class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]">

        {{-- ================================================= --}}
        {{-- HEADING                                           --}}
        {{-- ================================================= --}}

        <div class="flex items-end justify-between gap-5">

            <div>

                <span class="text-[9px] font-bold uppercase tracking-[0.25em] text-[#E25F12]">
                    Les incontournables
                </span>

                <h2 class="mt-2 text-3xl font-black tracking-[-0.04em] text-[#3B200F] sm:text-4xl">
                    Plats populaires
                </h2>

                <p class="mt-3 max-w-lg text-xs leading-6 text-[#887A70] sm:text-sm">
                    Découvrez une sélection de nos plats les plus appréciés.
                </p>

            </div>


            <a
                href="{{ route('plats.index') }}"
                class="btn btn-ghost hidden rounded-full text-[10px] font-bold text-[#593114] hover:bg-[#F8EEE5] sm:flex"
            >
                Voir tout
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>


        {{-- ================================================= --}}
        {{-- CHARGEMENT                                       --}}
        {{-- ================================================= --}}

        <template x-if="productsLoading">

            <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                <template x-for="i in 4" :key="i">

                    <div class="overflow-hidden rounded-[1.5rem] border border-[#EEE4DB] bg-[#FCFAF7]">

                        <div class="h-52 animate-pulse bg-[#F3EAE3]"></div>

                        <div class="space-y-3 p-4">

                            <div class="h-4 w-2/3 animate-pulse rounded bg-[#EDE3DB]"></div>

                            <div class="h-10 animate-pulse rounded bg-[#F1E9E3]"></div>

                            <div class="flex justify-between border-t border-[#EDE3DB] pt-3">

                                <div class="h-8 w-24 animate-pulse rounded bg-[#EDE3DB]"></div>

                                <div class="h-9 w-24 animate-pulse rounded-full bg-[#EDE3DB]"></div>

                            </div>

                        </div>

                    </div>

                </template>

            </div>

        </template>


        {{-- ================================================= --}}
        {{-- PRODUITS                                         --}}
        {{-- ================================================= --}}

        <template x-if="!productsLoading && featuredProducts.length > 0">

            <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                <template
                    x-for="product in featuredProducts"
                    :key="product.id"
                >

                    <article
                        class="card group overflow-hidden rounded-[1.5rem] border border-[#EEE4DB] bg-[#FCFAF7] shadow-none transition-all duration-300 hover:-translate-y-1 hover:border-[#E8D6C6] hover:shadow-xl"
                    >

                        {{-- IMAGE --}}
                        <figure class="relative h-52 overflow-hidden bg-[#F8EEE4]">

                            <img
                                :src="product.image || '{{ asset('images/default-product.jpg') }}'"
                                :alt="product.name || 'Plat FON-KPA'"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                loading="lazy"
                            >


                            {{-- BADGE --}}
                            <template x-if="product.badge">

                                <span
                                    class="absolute left-3 top-3 rounded-full border px-3 py-1.5 text-[8px] font-bold uppercase tracking-[0.08em] shadow-sm backdrop-blur-md"
                                    :class="badgeClass(product.badge)"
                                    x-text="product.badge"
                                ></span>

                            </template>


                            {{-- FAVORIS --}}
                            <button
                                type="button"
                                class="btn btn-circle btn-sm absolute right-3 top-3 border-0 bg-white/95 text-[#593114] shadow-sm hover:bg-[#593114] hover:text-white"
                                aria-label="Ajouter aux favoris"
                            >
                                <i class="bi bi-heart text-xs"></i>
                            </button>

                        </figure>


                        {{-- CONTENU --}}
                        <div class="card-body p-4">

                            <h3
                                class="truncate text-sm font-black text-[#593114]"
                                x-text="product.name"
                            ></h3>


                            <p
                                class="mt-1 min-h-[40px] text-[12px] leading-5 text-[#8A7B71]"
                                x-text="product.description || 'Une recette généreuse préparée avec soin.'"
                            ></p>


                            <div class="mt-3 flex items-center justify-between border-t border-[#EDE3DB] pt-3">

                                <div>

                                    <p class="text-[8px] uppercase tracking-[0.12em] text-[#A09288]">
                                        À partir de
                                    </p>

                                    <span
                                        class="text-sm font-black text-[#A84B0B]"
                                        x-text="formatPrice(product.price)"
                                    ></span>

                                    <span class="text-[9px] font-semibold text-[#8C8179]">
                                        FCFA
                                    </span>

                                </div>


                                {{-- PANIER --}}
                                <button
                                    type="button"
                                    @click="addToCart(product)"
                                    :disabled="!product.available || productsLoading"
                                    class="group/cart flex h-9 items-center gap-2 rounded-full bg-[#593114] px-3.5 text-[9px] font-bold text-white transition-all duration-200 hover:-translate-y-0.5 hover:bg-[#E25F12] hover:shadow-lg hover:shadow-[#E25F12]/15 active:translate-y-0 disabled:cursor-not-allowed disabled:opacity-35 disabled:hover:translate-y-0 disabled:hover:bg-[#593114] disabled:hover:shadow-none"
                                    aria-label="Ajouter au panier"
                                >

                                    <i class="bi bi-basket2 text-[11px] transition-transform duration-200 group-hover/cart:scale-110"></i>

                                    <span class="hidden sm:inline">
                                        Ajouter
                                    </span>

                                </button>

                            </div>

                        </div>

                    </article>

                </template>

            </div>

        </template>


        {{-- ================================================= --}}
        {{-- AUCUN PRODUIT                                    --}}
        {{-- ================================================= --}}

        <template x-if="!productsLoading && featuredProducts.length === 0">

            <div class="mt-10 rounded-[1.5rem] border border-[#EEE4DB] bg-[#FCFAF7] px-6 py-14 text-center">

                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-[#F8EBD9] text-[#593114]">

                    <i class="bi bi-egg-fried text-xl"></i>

                </div>

                <h3 class="mt-4 text-sm font-black text-[#593114]">
                    Aucun plat à afficher
                </h3>

                <p class="mt-2 text-[10px] leading-5 text-[#8C8179]">
                    Les plats mis en avant apparaîtront ici.
                </p>

            </div>

        </template>


        {{-- MOBILE --}}
        <a
            href="{{ route('plats.index') }}"
            class="btn mt-7 flex h-11 min-h-11 rounded-full border border-[#E5D6C8] bg-white text-[10px] font-bold text-[#593114] sm:hidden"
        >
            Voir tous les plats
            <i class="bi bi-arrow-right"></i>
        </a>

    </div>

</section>


    {{-- ========================================================= --}}
    {{-- STORY / MORE THAN FOOD                                    --}}
    {{-- ========================================================= --}}

    <section class="bg-[#FCFAF7] py-20 sm:py-24">

        <div class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]">

            <div class="grid grid-cols-1 items-center gap-14 lg:grid-cols-[0.9fr_1fr] lg:gap-24">


                {{-- VISUEL --}}
                <div class="relative mx-auto w-full max-w-[560px]">

                    <div class="absolute -left-8 top-10 h-32 w-32 rounded-full bg-[#F4C451]/20 blur-2xl"></div>

                    <div class="absolute -bottom-8 right-0 h-40 w-40 rounded-full bg-[#E25F12]/10 blur-2xl"></div>


                    <div class="relative  p-4">

                        <img
                            src="{{ asset('images/sous-hero3.png') }}"
                            alt="Cuisine FON-KPA"
                            class="aspect-square w-full rounded-[2rem] object-cover"
                        >

                    </div>


                    {{-- Floating stat --}}
                    <div class="absolute -bottom-7 left-5 rounded-2xl border border-[#E9DED5] bg-white px-5 py-4 shadow-xl">

                        <p class="text-[8px] uppercase tracking-[0.2em] text-[#9A8A7E]">
                            Notre promesse
                        </p>

                        <div class="mt-1 flex items-center gap-2">

                            <i class="bi bi-heart-fill text-[#E25F12]"></i>

                            <span class="text-xs font-black text-[#593114]">
                                Du goût. Du vrai.
                            </span>

                        </div>

                    </div>

                </div>


                {{-- TEXTE --}}
                <div class="max-w-xl">

                    <span class="text-[9px] font-bold uppercase tracking-[0.25em] text-[#E25F12]">
                        Plus qu'un repas
                    </span>

                    <h2 class="mt-3 text-3xl font-black leading-[1.05] tracking-[-0.045em] text-[#3B200F] sm:text-5xl">

                        Nous servons

                        <span class="text-[#E25F12]">
                            une expérience.
                        </span>

                    </h2>

                    <p class="mt-6 text-sm leading-7 text-[#756960]">
                        Chez FON-KPA, nous ne voulons pas seulement remplir
                        votre assiette. Nous voulons vous faire retrouver
                        les saveurs, les souvenirs et la chaleur de la cuisine
                        ivoirienne.
                    </p>


                    {{-- Features --}}
                    <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">

                        <div class="flex gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white text-[#593114] shadow-sm">
                                <i class="bi bi-bag-check"></i>
                            </div>

                            <div>
                                <p class="text-[10px] font-bold text-[#593114]">
                                    Commande simple
                                </p>

                                <p class="mt-1 text-[9px] leading-4 text-[#93847A]">
                                    Quelques clics suffisent.
                                </p>
                            </div>

                        </div>


                        <div class="flex gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white text-[#593114] shadow-sm">
                                <i class="bi bi-clock"></i>
                            </div>

                            <div>
                                <p class="text-[10px] font-bold text-[#593114]">
                                    Service rapide
                                </p>

                                <p class="mt-1 text-[9px] leading-4 text-[#93847A]">
                                    Pensé pour votre quotidien.
                                </p>
                            </div>

                        </div>


                        <div class="flex gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white text-[#593114] shadow-sm">
                                <i class="bi bi-stars"></i>
                            </div>

                            <div>
                                <p class="text-[10px] font-bold text-[#593114]">
                                    Cuisine authentique
                                </p>

                                <p class="mt-1 text-[9px] leading-4 text-[#93847A]">
                                    Des recettes qui ont une histoire.
                                </p>
                            </div>

                        </div>


                        <div class="flex gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white text-[#593114] shadow-sm">
                                <i class="bi bi-geo-alt"></i>
                            </div>

                            <div>
                                <p class="text-[10px] font-bold text-[#593114]">
                                    Pensé pour Abidjan
                                </p>

                                <p class="mt-1 text-[9px] leading-4 text-[#93847A]">
                                    Une expérience locale.
                                </p>
                            </div>

                        </div>

                    </div>


                    <a
                        href="{{ route('about') }}"
                        class="btn mt-8 h-11 min-h-11 rounded-full border-0 bg-[#593114] px-6 text-[10px] font-bold text-white hover:bg-[#E25F12]"
                    >
                        Notre histoire
                        <i class="bi bi-arrow-up-right"></i>
                    </a>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- MENU PACK                                                 --}}
    {{-- ========================================================= --}}

    <section class="bg-white py-20 sm:py-24">

        <div class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]">

            {{-- ================================================= --}}
            {{-- HEADING                                           --}}
            {{-- ================================================= --}}

            <div class="text-center">

                <span class="text-[9px] font-bold uppercase tracking-[0.25em] text-[#E25F12]">
                    Notre sélection
                </span>

                <h2 class="mt-2 text-3xl font-black tracking-[-0.04em] text-[#3B200F] sm:text-4xl">
                    Trouvez votre envie
                </h2>

                <p class="mx-auto mt-3 max-w-xl text-xs leading-6 text-[#887A70]">
                    Explorez notre menu et composez votre repas selon
                    votre humeur.
                </p>

            </div>


            {{-- ================================================= --}}
            {{-- TABS DYNAMIQUES                                   --}}
            {{-- ================================================= --}}

            <div
                x-show="menuTabs.length > 1"
                class="mt-8 flex flex-wrap justify-center gap-2"
            >

                <template
                    x-for="tab in menuTabs"
                    :key="tab"
                >

                    <button
                        type="button"
                        @click="activeMenu = tab"
                        class="btn h-9 min-h-9 rounded-full border px-4 text-[9px] font-semibold shadow-none transition"
                        :class="
                            activeMenu === tab
                                ? 'border-[#F4C451] bg-[#593114] text-white'
                                : 'border-[#E8DED5] bg-white text-[#786B61] hover:border-[#E25F12] hover:text-[#E25F12]'
                        "
                        x-text="tab"
                    ></button>

                </template>

            </div>


            {{-- ================================================= --}}
            {{-- PRODUITS                                         --}}
            {{-- ================================================= --}}

            <template x-if="!productsLoading">

                <div class="mt-10">

                    <template x-if="filteredMenuProducts.length > 0">

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                            <template
                                x-for="product in filteredMenuProducts"
                                :key="product.id"
                            >

                                <article
                                    class="card group overflow-hidden rounded-[1.5rem] border border-[#EEE4DB] bg-[#FCFAF7] shadow-none transition-all duration-300 hover:-translate-y-1 hover:border-[#E8D6C6] hover:shadow-xl"
                                >

                                    {{-- IMAGE --}}
                                    <figure class="relative h-48 overflow-hidden bg-[#F8EEE4]">

                                        <img
                                            :src="product.image || '{{ asset('images/default-product.jpg') }}'"
                                            :alt="product.name || 'Plat FON-KPA'"
                                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                            loading="lazy"
                                        >

                                    </figure>


                                    {{-- CONTENU --}}
                                    <div class="card-body p-4">

                                        <div class="flex items-center justify-between gap-2">

                                            <h3
                                                class="truncate text-sm font-black text-[#593114]"
                                                x-text="product.name"
                                            ></h3>

                                            <div class="flex shrink-0 gap-0.5 text-[#F4B72E]">

                                                <i class="bi bi-star-fill text-[7px]"></i>
                                                <i class="bi bi-star-fill text-[7px]"></i>
                                                <i class="bi bi-star-fill text-[7px]"></i>
                                                <i class="bi bi-star-fill text-[7px]"></i>
                                                <i class="bi bi-star-fill text-[7px]"></i>

                                            </div>

                                        </div>


                                        <p
                                            class="mt-1 min-h-[40px] text-[12px] leading-5 text-[#8A7B71]"
                                            x-text="product.description || 'Une recette généreuse préparée avec soin.'"
                                        ></p>


                                        <div class="mt-3 flex items-center justify-between border-t border-[#EDE3DB] pt-3">

                                            <div>

                                                <p class="text-[8px] uppercase tracking-[0.12em] text-[#A09288]">
                                                    À partir de
                                                </p>

                                                <span
                                                    class="text-sm font-black text-[#A84B0B]"
                                                    x-text="formatPrice(product.price)"
                                                ></span>

                                                <span class="text-[9px] font-semibold text-[#8C8179]">
                                                    FCFA
                                                </span>

                                            </div>


                                            <button
                                                type="button"
                                                @click="addToCart(product)"
                                                :disabled="!product.available || productsLoading"
                                                class="group/cart flex h-9 items-center gap-2 rounded-full bg-[#593114] px-3.5 text-[9px] font-bold text-white transition-all duration-200 hover:-translate-y-0.5 hover:bg-[#E25F12] hover:shadow-lg hover:shadow-[#E25F12]/15 active:translate-y-0 disabled:cursor-not-allowed disabled:opacity-35"
                                                aria-label="Ajouter au panier"
                                            >

                                                <i class="bi bi-basket2 text-[11px]"></i>

                                                <span class="hidden sm:inline">
                                                    Ajouter
                                                </span>

                                            </button>

                                        </div>

                                    </div>

                                </article>

                            </template>

                        </div>

                    </template>


                    {{-- Aucun résultat --}}
                    <template x-if="filteredMenuProducts.length === 0">

                        <div class="rounded-[1.5rem] border border-[#EEE4DB] bg-[#FCFAF7] px-6 py-14 text-center">

                            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-[#F8EBD9] text-[#593114]">

                                <i class="bi bi-search text-xl"></i>

                            </div>

                            <h3 class="mt-4 text-sm font-black text-[#593114]">
                                Aucun plat dans cette catégorie
                            </h3>

                            <p class="mt-2 text-[10px] text-[#8C8179]">
                                Essayez une autre catégorie.
                            </p>

                        </div>

                    </template>

                </div>

            </template>


            <div class="mt-8 text-center">

                <a
                    href="{{ route('plats.index') }}"
                    class="btn h-11 min-h-11 rounded-full border border-[#E4D7CC] bg-white px-7 text-[10px] font-bold text-[#593114] hover:border-[#E25F12] hover:bg-white hover:text-[#E25F12]"
                >
                    Explorer tout le menu
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- RESERVATION / CTA                                         --}}
    {{-- ========================================================= --}}

    <section class="bg-[#FCFAF7] py-16 sm:py-20">

        <div class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]">

            <div class="relative overflow-hidden rounded-[2.5rem] bg-[#F8EAD8]">

                <div class="absolute -left-24 -top-24 h-64 w-64 rounded-full bg-white/40 blur-2xl"></div>

                <div class="absolute -bottom-32 right-0 h-80 w-80 rounded-full bg-[#E25F12]/10 blur-3xl"></div>


                <div class="relative grid grid-cols-1 items-center lg:grid-cols-[1fr_0.8fr]">

                    {{-- Texte --}}
                    <div class="px-7 py-12 sm:px-10 sm:py-14 lg:px-14">

                        <span class="text-[9px] font-bold uppercase tracking-[0.25em] text-[#E25F12]">
                            Une envie particulière ?
                        </span>

                        <h2 class="mt-3 max-w-xl text-3xl font-black leading-[1.05] tracking-[-0.045em] text-[#3B200F] sm:text-4xl">

                            Votre prochaine

                            <span class="text-[#E25F12]">
                                belle assiette
                            </span>

                            commence ici.

                        </h2>

                        <p class="mt-5 max-w-lg text-xs leading-6 text-[#786A60] sm:text-sm">
                            Choisissez votre plat préféré, personnalisez-le
                            et laissez-nous nous occuper du reste.
                        </p>

                        <a
                            href="{{ route('plats.index') }}"
                            class="btn mt-7 h-11 min-h-11 rounded-full border-0 bg-[#593114] px-6 text-[10px] font-bold text-white shadow-lg shadow-[#593114]/10 hover:bg-[#E25F12]"
                        >
                            Commander maintenant
                            <i class="bi bi-arrow-up-right"></i>
                        </a>

                    </div>


                    {{-- Visuel --}}

                        <div
                            class="relative hidden h-full min-h-[280px] w-[360px] items-center justify-center pr-10 lg:flex"
                        >

                            <div
                                class="absolute h-60 w-60 rounded-full border border-white/80"
                            ></div>

                            <div
                                class="absolute h-48 w-48 rounded-full bg-[#E25F12]/10"
                            ></div>

                            <img
                                src="{{ asset('images/garba.png') }}"
                                alt="Cuisine ivoirienne FON-KPA"
                                class="relative z-10 h-64 w-64 object-contain drop-shadow-[0_25px_25px_rgba(89,49,20,0.18)]"
                            >

                        </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- TÉMOIGNAGES                                               --}}
    {{-- ========================================================= --}}

    <section class="bg-white py-20 sm:py-24">

        <div class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]">

            <div class="flex items-end justify-between">

                <div>

                    <span class="text-[9px] font-bold uppercase tracking-[0.25em] text-[#E25F12]">
                        Ils parlent de nous
                    </span>

                    <h2 class="mt-2 text-3xl font-black tracking-[-0.04em] text-[#3B200F] sm:text-4xl">
                        Ce que nos clients disent
                    </h2>

                </div>


                <div class="hidden gap-2 sm:flex">

                    <button
                        type="button"
                        @click="previousTestimonial()"
                        class="btn btn-circle btn-sm border border-[#E5DAD1] bg-white text-[#593114] shadow-none hover:bg-[#F8EEE5]"
                    >
                        <i class="bi bi-arrow-left"></i>
                    </button>

                    <button
                        type="button"
                        @click="nextTestimonial()"
                        class="btn btn-circle btn-sm border-0 bg-[#F4C451] text-[#593114] shadow-none hover:bg-[#E25F12] hover:text-white"
                    >
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </div>

            </div>


            <div class="mt-10 grid grid-cols-1 gap-5 md:grid-cols-3">

                <template
                    x-for="testimonial in visibleTestimonials"
                    :key="testimonial.name"
                >

                    <article
                        x-transition
                        class="rounded-[1.5rem] border border-[#EEE4DB] bg-[#FCFAF7] p-6"
                    >

                        <div class="flex gap-1 text-[#F4B72E]">

                            <template x-for="i in 5" :key="i">

                                <i class="bi bi-star-fill text-[8px]"></i>

                            </template>

                        </div>

                        <p
                            class="mt-5 text-xs leading-6 text-[#756960]"
                            x-text="'“' + testimonial.text + '”'"
                        ></p>


                        <div class="mt-6 flex items-center gap-3">

                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#593114] text-[10px] font-bold text-white">

                                <span x-text="testimonial.initial"></span>

                            </div>

                            <div>

                                <p
                                    class="text-[10px] font-bold text-[#593114]"
                                    x-text="testimonial.name"
                                ></p>

                                <p class="text-[8px] text-[#9A8A7E]">
                                    Client FON-KPA
                                </p>

                            </div>

                        </div>

                    </article>

                </template>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- FINAL CTA                                                 --}}
    {{-- ========================================================= --}}

    <section class="bg-[#FCFAF7] py-16 sm:py-20">

        <div class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]">

            <div class="relative isolate overflow-hidden rounded-[2.5rem] shadow-[0_24px_70px_rgba(89,49,20,0.14)]">

                <img
                    src="{{ asset('images/Hero2.jpg') }}"
                    alt="Cuisine ivoirienne FON-KPA"
                    class="absolute inset-0 h-full w-full object-cover"
                >


                <div class="absolute inset-0 bg-[#2B1609]/50"></div>

                <div class="absolute inset-0 bg-gradient-to-r from-[#2B1609]/75 via-[#2B1609]/35 to-transparent"></div>

                <div class="absolute inset-0 bg-gradient-to-t from-[#2B1609]/65 via-transparent to-transparent"></div>


                <div class="absolute -right-16 -top-16 h-40 w-40 rounded-full border border-white/10"></div>

                <div class="absolute -bottom-20 -left-10 h-44 w-44 rounded-full border border-[#F4C451]/10"></div>


                <div class="relative flex min-h-[390px] items-center justify-center px-7 py-14 text-center sm:min-h-[430px] sm:px-12 sm:py-16 lg:min-h-[450px]">

                    <div class="mx-auto flex max-w-3xl flex-col items-center">

                        <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2.5 text-[8px] font-bold uppercase tracking-[0.22em] text-[#F8DCC9] shadow-sm backdrop-blur-md sm:text-[9px]">

                            <span class="h-1.5 w-1.5 rounded-full bg-[#F4C451]"></span>

                            FON-KPA

                        </span>


                        <h2 class="mx-auto mt-6 max-w-2xl text-3xl font-black leading-[1.05] tracking-[-0.045em] text-[#FFFF] sm:text-5xl lg:text-[3.4rem]">

                            Le vrai goût de la

                            <span class="relative inline-block text-[#F4C451]">

                                Côte d'Ivoire.

                                <span class="absolute -bottom-1 left-1/2 h-[3px] w-10 -translate-x-1/2 rounded-full bg-[#F4C451]/70"></span>

                            </span>

                        </h2>


                        <p class="mx-auto mt-5 max-w-xl text-xs leading-6 text-white/80 sm:text-sm sm:leading-7">
                            Une cuisine généreuse, une expérience moderne
                            et des saveurs qui restent en mémoire.
                        </p>


                        <a
                            href="{{ route('plats.index') }}"
                            class="group mt-8 inline-flex h-12 min-h-12 items-center gap-3 rounded-full border border-[#F4C451]/20 bg-[#F4C451] px-7 text-[10px] font-black text-[#593114] shadow-[0_10px_30px_rgba(0,0,0,0.18)] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#E25F12] hover:text-white hover:shadow-[0_14px_35px_rgba(0,0,0,0.24)] active:translate-y-0 sm:px-8"
                        >

                            <span>
                                Découvrir nos plats
                            </span>

                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#593114]/10 transition-all duration-300 group-hover:bg-white/15">

                                <i class="bi bi-arrow-up-right text-[11px] transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5"></i>

                            </span>

                        </a>


                        <div class="mt-7 flex items-center gap-3 text-[9px] font-medium text-white/55">

                            <span class="h-px w-6 bg-white/20"></span>

                            <span>
                                Saveurs authentiques · Cuisine locale
                            </span>

                            <span class="h-px w-6 bg-white/20"></span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


{{-- ========================================================= --}}
{{-- MODAL PERSONNALISATION                                    --}}
{{-- ========================================================= --}}

<div
    x-show="customizationOpen"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-[9998] flex items-end justify-center bg-[#241108]/55 p-0 backdrop-blur-[6px] sm:items-center sm:p-5"
    @click.self="closeCustomization()"
>

    <div
        x-show="customizationOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-y-8 scale-[0.98] opacity-0"
        x-transition:enter-end="translate-y-0 scale-100 opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-y-0 scale-100 opacity-100"
        x-transition:leave-end="translate-y-5 scale-[0.98] opacity-0"
        class="relative flex max-h-[94vh] w-full max-w-[620px] flex-col overflow-hidden rounded-t-[2rem] bg-[#FCFAF7] shadow-[0_30px_100px_rgba(43,22,9,0.25)] sm:max-h-[90vh] sm:rounded-[2rem]"
        @click.stop
    >

        {{-- HEADER --}}
        <div class="relative shrink-0 border-b border-[#EDE1D7] bg-white">

            <div class="absolute left-1/2 top-0 h-1 w-14 -translate-x-1/2 rounded-b-full bg-[#E25F12]"></div>

            <div class="flex items-center justify-between gap-4 px-5 pb-4 pt-5 sm:px-7 sm:pb-5 sm:pt-6">

                <div class="flex min-w-0 items-center gap-3">

                    <div class="h-14 w-14 shrink-0 overflow-hidden rounded-2xl bg-[#F4E9DF] shadow-sm">

                        <img
                            x-show="selectedProduct?.image"
                            :src="selectedProduct?.image"
                            :alt="selectedProduct?.name || ''"
                            class="h-full w-full object-cover"
                        >

                        <div
                            x-show="!selectedProduct?.image"
                            class="flex h-full w-full items-center justify-center text-[#B9A79A]"
                        >
                            <i class="bi bi-image text-lg"></i>
                        </div>

                    </div>

                    <div class="min-w-0">

                        <p class="text-[8px] font-bold uppercase tracking-[0.18em] text-[#E25F12]">
                            Personnalisez votre plat
                        </p>

                        <h3
                            class="mt-1 truncate text-base font-black tracking-[-0.02em] text-[#593114] sm:text-lg"
                            x-text="selectedProduct?.name || ''"
                        ></h3>

                        <p class="mt-0.5 text-[9px] text-[#95877D]">
                            Choisissez vos options selon vos envies.
                        </p>

                    </div>

                </div>

                <button
                    type="button"
                    @click="closeCustomization()"
                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-[#E8DCD3] bg-[#FCFAF7] text-[#593114] transition-all hover:border-[#E25F12] hover:bg-[#E25F12] hover:text-white"
                    aria-label="Fermer"
                >
                    <i class="bi bi-x-lg text-[11px]"></i>
                </button>

            </div>


            {{-- PRIX --}}
            <div class="flex items-center justify-between border-t border-[#F1E8E1] bg-[#FFFCF9] px-5 py-3 sm:px-7">

                <div class="flex items-center gap-2">

                    <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-[#F8EBD9] text-[#593114]">
                        <i class="bi bi-receipt text-[10px]"></i>
                    </span>

                    <span class="text-[9px] font-medium text-[#8C8179]">
                        Total
                    </span>

                </div>

                <div class="flex items-baseline gap-1">

                    <span
                        class="text-lg font-black tracking-tight text-[#593114]"
                        x-text="formatPrice(customizationTotal())"
                    ></span>

                    <span class="text-[9px] font-bold text-[#8C8179]">
                        FCFA
                    </span>

                </div>

            </div>

        </div>


        {{-- OPTIONS --}}
        <div class="min-h-0 flex-1 overflow-y-auto overscroll-contain px-5 py-5 sm:px-7 sm:py-6">

            {{-- ERREURS --}}
            <div
                x-show="customizationErrors.length > 0"
                x-transition
                class="mb-5 overflow-hidden rounded-2xl border border-[#F0CFC3] bg-[#FFF7F4]"
            >

                <div class="flex gap-3 p-3.5">

                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-[#FBE3DA] text-[#B94B20]">
                        <i class="bi bi-exclamation-circle text-sm"></i>
                    </div>

                    <div class="pt-0.5">

                        <p class="text-[9px] font-black text-[#8F3D20]">
                            Vérifiez votre sélection
                        </p>

                        <ul class="mt-1 space-y-1">

                            <template
                                x-for="error in customizationErrors"
                                :key="error"
                            >

                                <li
                                    class="text-[8px] leading-4 text-[#A45B42]"
                                    x-text="error"
                                ></li>

                            </template>

                        </ul>

                    </div>

                </div>

            </div>


            {{-- Aucun groupe --}}
            <template x-if="selectedProduct && selectedProduct.option_groups && selectedProduct.option_groups.length === 0">

                <div class="flex min-h-[250px] items-center justify-center">

                    <div class="text-center">

                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-[#F8EBD9] text-[#593114]">
                            <i class="bi bi-check2-circle text-xl"></i>
                        </div>

                        <h4 class="mt-4 text-sm font-black text-[#593114]">
                            Votre plat est prêt
                        </h4>

                        <p class="mt-2 max-w-xs text-[9px] leading-5 text-[#8C8179]">
                            Aucune personnalisation supplémentaire n'est nécessaire.
                        </p>

                    </div>

                </div>

            </template>


            {{-- Groupes --}}
            <div class="space-y-7">

                <template
                    x-for="(group, groupIndex) in selectedProduct?.option_groups || []"
                    :key="group.id"
                >

                    <section>

                        <div class="mb-3 flex items-end justify-between gap-4">

                            <div>

                                <div class="flex items-center gap-2">

                                    <span
                                        class="flex h-6 w-6 items-center justify-center rounded-lg bg-[#593114] text-[8px] font-black text-white"
                                        x-text="String(groupIndex + 1).padStart(2, '0')"
                                    ></span>

                                    <h4
                                        class="text-[11px] font-black text-[#593114] sm:text-xs"
                                        x-text="group.name"
                                    ></h4>

                                </div>

                                <p
                                    x-show="group.is_required || Number(group.min_choices) > 0"
                                    class="mt-1 pl-8 text-[8px] text-[#95877D]"
                                >

                                    <template x-if="Number(group.max_choices) === 1">
                                        <span>
                                            Sélectionnez une option
                                        </span>
                                    </template>

                                    <template x-if="Number(group.max_choices) > 1 && Number(group.min_choices) > 0">
                                        <span>
                                            <span x-text="Number(group.min_choices)"></span>
                                            �
                                            <span x-text="Number(group.max_choices)"></span>
                                            choix
                                        </span>
                                    </template>

                                    <template x-if="Number(group.max_choices) === 0 && Number(group.min_choices) > 0">
                                        <span>
                                            Au moins
                                            <span x-text="Number(group.min_choices)"></span>
                                            choix
                                        </span>
                                    </template>

                                </p>

                            </div>


                            <span
                                class="shrink-0 rounded-full bg-[#F5ECE4] px-2.5 py-1 text-[8px] font-bold text-[#8C8179]"
                            >
                                <span x-text="groupSelectedCount(group)"></span>

                                <span
                                    x-show="Number(group.max_choices) > 0"
                                    x-text="' / ' + Number(group.max_choices)"
                                ></span>
                            </span>

                        </div>


                        <div
                            class="grid gap-2.5"
                            :class="Number(group.max_choices) === 1 ? 'grid-cols-1 sm:grid-cols-2' : 'grid-cols-1 sm:grid-cols-2'"
                        >

                            <template
                                x-for="choice in group.choices"
                                :key="choice.id"
                            >

                                <button
                                    type="button"
                                    @click="toggleChoice(group, choice.id)"
                                    :disabled="!choice.available"
                                    class="group/choice relative flex min-h-[62px] items-center justify-between gap-3 rounded-2xl border bg-white px-3.5 py-3 text-left transition-all duration-200"
                                    :class="[
                                        !choice.available
                                            ? 'cursor-not-allowed border-[#EDE6E1] bg-[#F7F4F1] opacity-55'
                                            : isChoiceSelected(group.id, choice.id)
                                                ? 'border-[#E25F12] bg-[#FFF8F2] shadow-[0_8px_25px_rgba(226,95,18,0.10)]'
                                                : 'border-[#E9DED5] hover:border-[#D8C2B2] hover:bg-[#FFFCF9]'
                                    ]"
                                >

                                    <div class="flex min-w-0 items-center gap-3">

                                        <span
                                            class="flex h-5 w-5 shrink-0 items-center justify-center border transition-all duration-200"
                                            :class="[
                                                Number(group.max_choices) === 1
                                                    ? 'rounded-full'
                                                    : 'rounded-md',

                                                isChoiceSelected(group.id, choice.id)
                                                    ? 'border-[#E25F12] bg-[#E25F12] text-white'
                                                    : 'border-[#D8C8B8] bg-white text-transparent'
                                            ]"
                                        >

                                            <i
                                                class="bi text-[9px]"
                                                :class="Number(group.max_choices) === 1 ? 'bi-circle-fill' : 'bi-check-lg'"
                                            ></i>

                                        </span>


                                        <span class="min-w-0">

                                            <span
                                                class="block truncate text-[10px] font-bold text-[#593114]"
                                                x-text="choice.name"
                                            ></span>

                                            <span
                                                x-show="!choice.available"
                                                class="mt-0.5 block text-[7px] font-semibold uppercase tracking-[0.08em] text-[#B17D67]"
                                            >
                                                Indisponible
                                            </span>

                                        </span>

                                    </div>


                                    <span
                                        class="shrink-0 text-[9px] font-black"
                                        :class="[
                                            !choice.available
                                                ? 'text-[#A99D93]'
                                                : Number(choice.price_modifier) > 0
                                                    ? 'text-[#E25F12]'
                                                    : 'text-[#6F7E73]'
                                        ]"
                                    >

                                        <template x-if="Number(choice.price_modifier) > 0">

                                            <span>
                                                +
                                                <span x-text="formatPrice(choice.price_modifier)"></span>
                                            </span>

                                        </template>

                                        <template x-if="Number(choice.price_modifier) === 0">

                                            <span>
                                                Inclus
                                            </span>

                                        </template>

                                    </span>

                                </button>

                            </template>

                        </div>

                    </section>

                </template>

            </div>

        </div>


        {{-- FOOTER --}}
        <div class="shrink-0 border-t border-[#E9DED5] bg-white px-5 py-4 sm:px-7 sm:py-5">

            <div class="flex items-center justify-between gap-4">

                <div class="hidden sm:block">

                    <p class="text-[8px] uppercase tracking-[0.14em] text-[#A09288]">
                        Votre sélection
                    </p>

                    <p class="mt-1 text-[9px] font-bold text-[#593114]">

                        <span x-text="selectedChoiceCount()"></span>

                        option(s)

                    </p>

                </div>


                <div class="flex w-full gap-2.5 sm:w-auto">

                    <button
                        type="button"
                        @click="closeCustomization()"
                        :disabled="submittingCustomization"
                        class="flex-1 rounded-full border border-[#E5D9D0] bg-white px-4 py-3 text-[9px] font-bold text-[#593114] transition hover:border-[#D5BBA9] hover:bg-[#FCFAF7] disabled:opacity-50 sm:flex-none sm:min-w-[120px]"
                    >
                        Annuler
                    </button>

                    <button
                        type="button"
                        @click="submitCustomization()"
                        :disabled="submittingCustomization"
                        class="flex flex-1 items-center justify-center gap-2 rounded-full bg-[#593114] px-5 py-3 text-[9px] font-bold text-white shadow-[0_8px_25px_rgba(89,49,20,0.18)] transition-all duration-200 hover:-translate-y-0.5 hover:bg-[#E25F12] hover:shadow-[0_12px_30px_rgba(226,95,18,0.20)] active:translate-y-0 disabled:cursor-not-allowed disabled:opacity-60 disabled:hover:translate-y-0 sm:flex-none sm:min-w-[190px]"
                    >

                        <template x-if="!submittingCustomization">

                            <span class="flex items-center gap-2">

                                <i class="bi bi-basket2 text-[11px]"></i>

                                Ajouter au panier

                            </span>

                        </template>

                        <template x-if="submittingCustomization">

                            <span class="flex items-center gap-2">

                                <span class="h-3.5 w-3.5 animate-spin rounded-full border-2 border-white/30 border-t-white"></span>

                                Ajout...

                            </span>

                        </template>

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- TOAST SUCCÈS                                               --}}
{{-- ========================================================= --}}

<div
    x-show="showCartToast"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-3"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-3"
    x-cloak
    class="toast toast-end toast-bottom z-[9999] mb-16"
>

    <div class="alert rounded-2xl border border-[#DDEBE0] bg-white px-4 py-3 text-[#593114] shadow-[0_15px_40px_rgba(89,49,20,0.12)]">

        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#EAF6ED] text-[#3B8D52]">
            <i class="bi bi-check-lg text-sm"></i>
        </div>

        <div>

            <p class="text-[10px] font-black">
                Produit ajouté
            </p>

            <p class="mt-0.5 text-[9px] text-[#8C8179]">
                Le plat a bien été ajouté à votre panier.
            </p>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- TOAST ERREUR                                               --}}
{{-- ========================================================= --}}

<div
    x-show="showCartError"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-3"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-3"
    x-cloak
    class="toast toast-end toast-bottom z-[9999] mb-16"
>

    <div class="alert rounded-2xl border border-[#F0D5CB] bg-white px-4 py-3 text-[#593114] shadow-[0_15px_40px_rgba(89,49,20,0.12)]">

        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#FFF0EB] text-[#B94B20]">
            <i class="bi bi-exclamation-circle text-sm"></i>
        </div>

        <div>

            <p class="text-[10px] font-black">
                Impossible d'ajouter le plat
            </p>

            <p
                class="mt-0.5 max-w-[260px] text-[9px] leading-4 text-[#8C8179]"
                x-text="cartErrorMessage"
            ></p>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- ALPINE.JS                                                  --}}
{{-- ========================================================= --}}

<script>

    function fonkpaHome() {

        return {

            /* =====================================================
               DONNÉES HOME
            ===================================================== */

            mobileMenu: false,

            activeMenu: 'Tout',


            /* =====================================================
               BADGES HERO
            ===================================================== */

            heroBadges: [
                {
                    label: 'Frais',
                    color: 'bg-[#E25F12]'
                },
                {
                    label: 'Local',
                    color: 'bg-[#F4C451]'
                },
                {
                    label: 'Authentique',
                    color: 'bg-[#593114]'
                }
            ],


            /* =====================================================
               TÉMOIGNAGES
            ===================================================== */

            testimonials: [

                {
                    name: 'Savannah Nguyen',
                    initial: 'S',
                    text: 'Une très belle découverte. Les saveurs sont authentiques et la commande est vraiment simple.'
                },

                {
                    name: 'Esther Howard',
                    initial: 'E',
                    text: 'Le poulet braisé était excellent. On retrouve vraiment le goût de la cuisine ivoirienne.'
                },

                {
                    name: 'Marvin McKinney',
                    initial: 'M',
                    text: 'Une expérience moderne tout en gardant l’âme de notre cuisine. Je recommande FON-KPA.'
                },

                {
                    name: 'Albert Flores',
                    initial: 'A',
                    text: 'Service rapide, présentation soignée et surtout des plats très généreux.'
                }

            ],

            testimonialIndex: 0,


            /* =====================================================
               PRODUITS RÉELS
            ===================================================== */

            products: [],

            productsLoading: true,

            productsLoaded: false,


            /* =====================================================
               PANIER
            ===================================================== */

            cartCount: 0,

            showCartToast: false,

            showCartError: false,

            cartErrorMessage: '',


            /* =====================================================
               PERSONNALISATION
            ===================================================== */

            customizationOpen: false,

            selectedProduct: null,

            selectedOptions: {},

            customizationErrors: [],

            submittingCustomization: false,


            /* =====================================================
               CATÉGORIES DU MENU

               Elles sont automatiquement générées depuis
               les catégories réelles des produits.

               Exemple :

               Tout
               Grillade
               Accompagnement
               Boisson
               Sauce
            ===================================================== */

            get menuTabs() {

                if (!Array.isArray(this.products)) {
                    return ['Tout'];
                }


                const categories = this.products
                    .map(product =>
                        this.getProductCategory(product)
                    )
                    .filter(category =>
                        category !== null
                    )
                    .map(category =>
                        String(category).trim()
                    )
                    .filter(category =>
                        category.length > 0
                    );


                return [
                    'Tout',
                    ...new Set(categories)
                ];

            },


            /* =====================================================
               PRODUITS POPULAIRES

               IMPORTANT :
               La Home affiche MAXIMUM 4 produits.

               On utilise les produits marqués "featured".

               Si aucun produit n'est featured, on prend les
               produits disponibles comme solution de secours.
            ===================================================== */

            get featuredProducts() {

                if (!Array.isArray(this.products)) {
                    return [];
                }


                const featured =
                    this.products.filter(product => {

                        return (
                            product.featured === true ||
                            product.featured === 1 ||
                            product.is_featured === true ||
                            product.is_featured === 1
                        );

                    });


                /*
                 * Si des produits sont mis en avant,
                 * on en affiche maximum 4.
                 */

                if (featured.length > 0) {

                    return featured.slice(0, 4);

                }


                /*
                 * Aucun produit featured :
                 * on affiche les produits disponibles.
                 */

                return this.products
                    .filter(product =>
                        product.available !== false
                    )
                    .slice(0, 4);

            },


            /* =====================================================
               PRODUITS DU MENU

               La section "Notre menu" affiche également
               MAXIMUM 4 produits.

               Le filtre est basé sur la vraie catégorie
               du produit.
            ===================================================== */

            get filteredMenuProducts() {

                if (!Array.isArray(this.products)) {
                    return [];
                }


                let products =
                    this.products;


                /*
                 * "Tout" = tous les produits disponibles.
                 */

                if (
                    this.activeMenu !== 'Tout'
                ) {

                    products =
                        products.filter(product => {

                            const category =
                                this.getProductCategory(
                                    product
                                );


                            return (
                                String(category || '')
                                    .trim()
                                    .toLowerCase()
                                ===
                                String(this.activeMenu || '')
                                    .trim()
                                    .toLowerCase()
                            );

                        });

                }


                /*
                 * IMPORTANT :
                 * même s'il y a 20 produits dans une catégorie,
                 * la Home n'en affiche que 4.
                 */

                return products
                    .filter(product =>
                        product.available !== false
                    )
                    .slice(0, 4);

            },


            /* =====================================================
               TÉMOIGNAGES VISIBLES
            ===================================================== */

            get visibleTestimonials() {

                if (
                    !this.testimonials.length
                ) {

                    return [];

                }


                const result = [];


                for (
                    let i = 0;
                    i < 3;
                    i++
                ) {

                    const index =
                        (
                            this.testimonialIndex + i
                        )
                        % this.testimonials.length;


                    result.push(
                        this.testimonials[index]
                    );

                }


                return result;

            },


            /* =====================================================
               TÉMOIGNAGE PRÉCÉDENT
            ===================================================== */

            previousTestimonial() {

                this.testimonialIndex =
                    (
                        this.testimonialIndex
                        - 1
                        + this.testimonials.length
                    )
                    % this.testimonials.length;

            },


            /* =====================================================
               TÉMOIGNAGE SUIVANT
            ===================================================== */

            nextTestimonial() {

                this.testimonialIndex =
                    (
                        this.testimonialIndex
                        + 1
                    )
                    % this.testimonials.length;

            },


            /* =====================================================
               INITIALISATION
            ===================================================== */

            init() {

                window.addEventListener(
                    'resize',
                    () => {

                        if (
                            window.innerWidth >= 1024
                        ) {

                            this.mobileMenu = false;

                        }

                    }
                );


                this.loadProducts();

            },


            /* =====================================================
               CHARGEMENT DES PRODUITS

               On utilise le même endpoint que la page
               "Nos plats".

               Cela évite de dupliquer la logique Laravel.
            ===================================================== */

            async loadProducts() {

                this.productsLoading = true;


                try {

                    const response =
                        await fetch(
                            '{{ route('storefront.plats.data') }}',
                            {
                                method: 'GET',

                                headers: {
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                },

                                cache: 'no-store'
                            }
                        );


                    if (!response.ok) {

                        throw new Error(
                            `Erreur HTTP ${response.status}`
                        );

                    }


                    const data =
                        await response.json();


                    /*
                     * Laravel doit retourner :

                     * {
                     *     products: [...]
                     * }
                     */

                    if (
                        Array.isArray(
                            data.products
                        )
                    ) {

                        /*
                         * Normalisation des données.
                         *
                         * On s'assure notamment que :
                         *
                         * - id = nombre
                         * - price = nombre
                         * - available = booléen
                         * - featured = booléen
                         */

                        this.products =
                            data.products.map(
                                product => {

                                    return {

                                        ...product,

                                        id:
                                            Number(
                                                product.id
                                            ),

                                        price:
                                            Number(
                                                product.price
                                            ) || 0,

                                        available:
                                            product.available !== false &&
                                            product.available !== 0,

                                        featured:
                                            product.featured === true ||
                                            product.featured === 1 ||
                                            product.is_featured === true ||
                                            product.is_featured === 1

                                    };

                                }
                            );


                        this.productsLoaded =
                            true;

                    } else {

                        this.products =
                            [];

                        this.productsLoaded =
                            false;

                    }


                } catch (error) {

                    console.error(
                        'Impossible de charger les produits FON-KPA :',
                        error
                    );


                    this.products =
                        [];

                    this.productsLoaded =
                        false;

                } finally {

                    this.productsLoading =
                        false;

                }

            },


            /* =====================================================
               RÉCUPÉRER LA CATÉGORIE D'UN PRODUIT

               Le backend peut retourner :

               category.name

               OU

               category

               OU

               category_name
            ===================================================== */

            getProductCategory(product) {

                if (!product) {
                    return null;
                }


                /*
                 * Format :

                 * category: {
                 *     id: 1,
                 *     name: "Grillade"
                 * }
                 */

                if (
                    product.category &&
                    typeof product.category === 'object' &&
                    product.category.name
                ) {

                    return product.category.name;

                }


                /*
                 * Format :

                 * category: "Grillade"
                 */

                if (
                    typeof product.category === 'string'
                ) {

                    return product.category;

                }


                /*
                 * Format :

                 * category_name: "Grillade"
                 */

                if (
                    typeof product.category_name === 'string'
                ) {

                    return product.category_name;

                }


                return null;

            },


            /* =====================================================
               IMAGE DU PRODUIT

               IMPORTANT :

               On récupère UNIQUEMENT l'image associée
               au produit.

               Il n'y a plus aucune logique du type :

               produit 0 = image Garba
               produit 1 = image Poulet
               etc.
            ===================================================== */

            getProductImage(product) {

                if (!product) {
                    return null;
                }


                /*
                 * Format recommandé :

                 * image: "/images/products/garba.jpg"
                 */

                if (
                    typeof product.image === 'string' &&
                    product.image.trim() !== ''
                ) {

                    return product.image;

                }


                /*
                 * Compatibilité avec image_url.
                 */

                if (
                    typeof product.image_url === 'string' &&
                    product.image_url.trim() !== ''
                ) {

                    return product.image_url;

                }


                /*
                 * Compatibilité avec un tableau images.
                 */

                if (
                    Array.isArray(product.images) &&
                    product.images.length > 0
                ) {

                    /*
                     * On cherche d'abord l'image principale.
                     */

                    const primaryImage =
                        product.images.find(
                            image =>
                                image.is_primary === true ||
                                image.is_primary === 1
                        );


                    if (
                        primaryImage
                    ) {

                        if (
                            primaryImage.url
                        ) {

                            return primaryImage.url;

                        }


                        if (
                            primaryImage.path
                        ) {

                            return primaryImage.path;

                        }

                    }


                    /*
                     * Sinon on prend la première image
                     * appartenant réellement au produit.
                     */

                    const firstImage =
                        product.images[0];


                    if (
                        firstImage?.url
                    ) {

                        return firstImage.url;

                    }


                    if (
                        firstImage?.path
                    ) {

                        return firstImage.path;

                    }

                }


                /*
                 * Aucun fallback vers une image d'un autre produit.
                 *
                 * Cela est volontaire.
                 */

                return null;

            },


            /* =====================================================
               BADGE
            ===================================================== */

            badgeClass(badge) {

                const value =
                    String(
                        badge || ''
                    )
                        .toLowerCase()
                        .trim();


                if (
                    value === 'nouveau'
                ) {

                    return 'border-[#D8E8DC] bg-[#F0F8F2]/95 text-[#3B7650]';

                }


                if (
                    value === 'populaire'
                ) {

                    return 'border-[#F0DDB5] bg-[#FFF8E8]/95 text-[#A66A08]';

                }


                if (
                    value === 'best seller' ||
                    value === 'best-seller'
                ) {

                    return 'border-[#F1D1C3] bg-[#FFF1EC]/95 text-[#B94B20]';

                }


                if (
                    value === 'coup de cœur' ||
                    value === 'coup-de-coeur'
                ) {

                    return 'border-[#E8D8E2] bg-[#FAF1F7]/95 text-[#8C4D72]';

                }


                return 'border-[#E5DCD5] bg-white/95 text-[#715F52]';

            },


            /* =====================================================
               BADGE DYNAMIQUE DU PRODUIT
            ===================================================== */

            getProductBadge(product) {

                if (!product) {
                    return '';
                }


                /*
                 * Si le backend fournit déjà un badge,
                 * on l'utilise.
                 */

                if (
                    typeof product.badge === 'string' &&
                    product.badge.trim() !== ''
                ) {

                    return product.badge;

                }


                /*
                 * Sinon, un produit featured reçoit
                 * automatiquement "Populaire".
                 */

                if (
                    product.featured === true
                ) {

                    return 'Populaire';

                }


                return '';

            },


            /* =====================================================
               FORMAT PRIX
            ===================================================== */

            formatPrice(value) {

                const number =
                    Number(value) || 0;


                return new Intl.NumberFormat(
                    'fr-FR'
                ).format(
                    number
                );

            },


            /* =====================================================
               OPTIONS
            ===================================================== */

            hasOptions(product) {

                return (
                    Array.isArray(
                        product?.option_groups
                    ) &&
                    product.option_groups.some(
                        group =>
                            Array.isArray(
                                group.choices
                            ) &&
                            group.choices.length > 0
                    )
                );

            },


            /* =====================================================
               OUVERTURE DU MODAL
            ===================================================== */

            openCustomization(product) {

                if (!product) {
                    return;
                }


                this.selectedProduct =
                    product;


                this.selectedOptions =
                    {};


                this.customizationErrors =
                    [];


                this.submittingCustomization =
                    false;


                (
                    product.option_groups ||
                    []
                ).forEach(
                    group => {

                        this.selectedOptions[
                            Number(group.id)
                        ] = [];

                    }
                );


                this.customizationOpen =
                    true;


                document.body.classList.add(
                    'overflow-hidden'
                );

            },


            /* =====================================================
               FERMETURE DU MODAL
            ===================================================== */

            closeCustomization() {

                if (
                    this.submittingCustomization
                ) {

                    return;

                }


                this.customizationOpen =
                    false;


                this.customizationErrors =
                    [];


                this.selectedProduct =
                    null;


                this.selectedOptions =
                    {};


                document.body.classList.remove(
                    'overflow-hidden'
                );

            },


            /* =====================================================
               CARD HOME → PANIER

               IMPORTANT :

               On transmet directement le Product.

               Il n'y a plus :

               addHomeCardToCart(index)

               mais :

               addHomeCardToCart(product)
            ===================================================== */

            async addHomeCardToCart(product) {

                if (!product) {

                    this.cartErrorMessage =
                        'Le produit est momentanément indisponible.';


                    this.showCartError =
                        true;


                    setTimeout(
                        () => {

                            this.showCartError =
                                false;

                        },
                        3500
                    );


                    return;

                }


                await this.addToCart(
                    product
                );

            },


            /* =====================================================
               AJOUT AU PANIER
            ===================================================== */

            async addToCart(product) {

                if (
                    !product ||
                    !product.available
                ) {

                    return;

                }


                /*
                 * Si le produit possède des options,
                 * on ouvre d'abord le modal.
                 */

                if (
                    this.hasOptions(
                        product
                    )
                ) {

                    this.openCustomization(
                        product
                    );

                    return;

                }


                /*
                 * Produit sans option :
                 * ajout direct au panier.
                 */

                await this.sendToCart(
                    product,
                    []
                );

            },


            /* =====================================================
               CHOIX OPTION
            ===================================================== */

            toggleChoice(
                group,
                choiceId
            ) {

                const numericGroupId =
                    Number(
                        group.id
                    );


                const numericChoiceId =
                    Number(
                        choiceId
                    );


                const choice =
                    (
                        group.choices ||
                        []
                    ).find(
                        item =>
                            Number(item.id) ===
                            numericChoiceId
                    );


                if (
                    !choice ||
                    !choice.available
                ) {

                    return;

                }


                if (
                    !Array.isArray(
                        this.selectedOptions[
                            numericGroupId
                        ]
                    )
                ) {

                    this.selectedOptions[
                        numericGroupId
                    ] = [];

                }


                const current =
                    this.selectedOptions[
                        numericGroupId
                    ];


                /* =================================================
                   CHOIX UNIQUE
                ================================================= */

                if (
                    Number(
                        group.max_choices
                    ) === 1
                ) {

                    if (
                        current.includes(
                            numericChoiceId
                        )
                    ) {

                        this.selectedOptions[
                            numericGroupId
                        ] = [];

                    } else {

                        this.selectedOptions[
                            numericGroupId
                        ] = [
                            numericChoiceId
                        ];

                    }


                    this.customizationErrors =
                        [];


                    return;

                }


                /* =================================================
                   CHOIX MULTIPLES
                ================================================= */

                const index =
                    current.indexOf(
                        numericChoiceId
                    );


                if (
                    index !== -1
                ) {

                    current.splice(
                        index,
                        1
                    );


                    this.customizationErrors =
                        [];


                    return;

                }


                const maxChoices =
                    Number(
                        group.max_choices
                    );


                if (
                    maxChoices > 0 &&
                    current.length >= maxChoices
                ) {

                    this.customizationErrors = [
                        `Vous pouvez sélectionner au maximum ${maxChoices} option(s) dans « ${group.name} ».`
                    ];


                    return;

                }


                current.push(
                    numericChoiceId
                );


                this.customizationErrors =
                    [];

            },


            /* =====================================================
               OPTION SÉLECTIONNÉE
            ===================================================== */

            isChoiceSelected(
                groupId,
                choiceId
            ) {

                const selected =
                    this.selectedOptions[
                        Number(groupId)
                    ] || [];


                return selected.includes(
                    Number(choiceId)
                );

            },


            /* =====================================================
               COMPTEUR GROUPE
            ===================================================== */

            groupSelectedCount(group) {

                return (
                    this.selectedOptions[
                        Number(group.id)
                    ] || []
                ).length;

            },


            /* =====================================================
               COMPTEUR GLOBAL DES OPTIONS
            ===================================================== */

            selectedChoiceCount() {

                return Object.values(
                    this.selectedOptions
                ).reduce(
                    (
                        total,
                        choices
                    ) =>
                        total +
                        (
                            Array.isArray(
                                choices
                            )
                                ? choices.length
                                : 0
                        ),
                    0
                );

            },


            /* =====================================================
               TOTAL PERSONNALISÉ

               Attention :
               ce total est seulement visuel.

               Laravel reste responsable du calcul réel
               du prix lors de l'ajout au panier.
            ===================================================== */

            customizationTotal() {

                if (
                    !this.selectedProduct
                ) {

                    return 0;

                }


                let total =
                    Number(
                        this.selectedProduct.price
                    ) || 0;


                const groups =
                    this.selectedProduct
                        .option_groups || [];


                groups.forEach(
                    group => {

                        const selected =
                            this.selectedOptions[
                                Number(group.id)
                            ] || [];


                        selected.forEach(
                            choiceId => {

                                const choice =
                                    (
                                        group.choices ||
                                        []
                                    ).find(
                                        item =>
                                            Number(item.id) ===
                                            Number(choiceId)
                                    );


                                if (choice) {

                                    total +=
                                        Number(
                                            choice.price_modifier
                                        ) || 0;

                                }

                            }
                        );

                    }
                );


                return total;

            },


            /* =====================================================
               VALIDATION PERSONNALISATION
            ===================================================== */

            validateCustomization() {

                const errors =
                    [];


                const groups =
                    this.selectedProduct
                        ?.option_groups || [];


                groups.forEach(
                    group => {

                        const count =
                            this.groupSelectedCount(
                                group
                            );


                        const min =
                            Number(
                                group.min_choices
                            ) || 0;


                        const max =
                            Number(
                                group.max_choices
                            ) || 0;


                        if (
                            group.is_required &&
                            count === 0
                        ) {

                            errors.push(
                                `Veuillez sélectionner une option dans « ${group.name} ».`
                            );


                            return;

                        }


                        if (
                            count < min
                        ) {

                            errors.push(
                                `Veuillez sélectionner au moins ${min} option(s) dans « ${group.name} ».`
                            );

                        }


                        if (
                            max > 0 &&
                            count > max
                        ) {

                            errors.push(
                                `Vous pouvez sélectionner au maximum ${max} option(s) dans « ${group.name} ».`
                            );

                        }

                    }
                );


                this.customizationErrors =
                    errors;


                return (
                    errors.length === 0
                );

            },


            /* =====================================================
               IDS DES CHOIX
            ===================================================== */

            getSelectedChoiceIds() {

                return Object.values(
                    this.selectedOptions
                )
                    .flat()
                    .map(
                        id =>
                            Number(id)
                    )
                    .filter(
                        (
                            id,
                            index,
                            array
                        ) =>
                            array.indexOf(id) ===
                            index
                    );

            },


            /* =====================================================
               ENVOI AU PANIER
            ===================================================== */

            async sendToCart(
                product,
                optionIds = []
            ) {

                if (
                    !product?.id
                ) {

                    return false;

                }


                try {

                    const response =
                        await fetch(
                            `/panier/${product.id}`,
                            {
                                method: 'POST',

                                headers: {

                                    'X-CSRF-TOKEN':
                                        '{{ csrf_token() }}',

                                    'Accept':
                                        'application/json',

                                    'Content-Type':
                                        'application/json'

                                },

                                body: JSON.stringify({

                                    options:
                                        optionIds

                                })

                            }
                        );


                    if (
                        !response.ok
                    ) {

                        let message =
                            `Erreur HTTP ${response.status}`;


                        try {

                            const errorData =
                                await response.json();


                            if (
                                errorData.message
                            ) {

                                message =
                                    errorData.message;

                            }

                        } catch (error) {

                            console.error(
                                'Réponse serveur invalide :',
                                error
                            );

                        }


                        throw new Error(
                            message
                        );

                    }


                    const data =
                        await response.json();


                    if (
                        !data.success
                    ) {

                        throw new Error(
                            data.message ||
                            'Impossible d’ajouter le produit au panier.'
                        );

                    }


                    this.cartCount =
                        Number(
                            data.count || 0
                        );


                    window.dispatchEvent(
                        new CustomEvent(
                            'fonkpa-cart-updated',
                            {
                                detail: {

                                    count:
                                        this.cartCount

                                }
                            }
                        )
                    );


                    this.showCartToast =
                        true;


                    setTimeout(
                        () => {

                            this.showCartToast =
                                false;

                        },
                        2500
                    );


                    return true;


                } catch (error) {

                    console.error(
                        'Erreur lors de l’ajout au panier :',
                        error
                    );


                    this.cartErrorMessage =
                        error.message ||
                        'Une erreur est survenue.';


                    this.showCartError =
                        true;


                    setTimeout(
                        () => {

                            this.showCartError =
                                false;

                        },
                        3500
                    );


                    return false;

                }

            },


            /* =====================================================
               SOUMISSION PERSONNALISATION
            ===================================================== */

            async submitCustomization() {

                if (
                    !this.selectedProduct ||
                    this.submittingCustomization
                ) {

                    return;

                }


                if (
                    !this.validateCustomization()
                ) {

                    this.$nextTick(
                        () => {

                            const content =
                                document.querySelector(
                                    '[x-show="customizationOpen"] .overflow-y-auto'
                                );


                            if (
                                content
                            ) {

                                content.scrollTo({

                                    top: 0,

                                    behavior: 'smooth'

                                });

                            }

                        }
                    );


                    return;

                }


                this.submittingCustomization =
                    true;


                const product =
                    this.selectedProduct;


                const optionIds =
                    this.getSelectedChoiceIds();


                const success =
                    await this.sendToCart(
                        product,
                        optionIds
                    );


                this.submittingCustomization =
                    false;


                if (
                    success
                ) {

                    this.closeCustomization();

                }

            }

        };

    }

</script>

    {{-- Fin du scope Alpine de la Home --}}
</div>

@endsection
