{{-- resources/views/storefront/dishes/index.blade.php --}}

<x-app-layout>
    @section('title', 'FON-KPA — Nos plats')

    <div
        x-data="dishCatalog()"
        x-init="init()"
        class="min-h-screen bg-[#FBF9F8]"
    >

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <section class="border-b border-[#E9DED1] bg-[#FCF8F3]">

            <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

                <div class="flex flex-col gap-7 lg:flex-row lg:items-end lg:justify-between">

                    {{-- Titre --}}
                    <div class="max-w-xl">

                        <div class="mb-3 flex items-center gap-2">

                            <span class="h-1.5 w-1.5 rounded-full bg-[#e25f12]"></span>

                            <span class="text-[11px] font-semibold uppercase tracking-[0.18em] text-[#e25f12]">
                                Notre cuisine
                            </span>

                        </div>

                        <h2 class="text-3xl font-bold tracking-tight text-[#593114] sm:text-4xl">
                            Nos plats
                        </h2>

                        <p class="mt-3 text-sm leading-6 text-[#766C64]">
                            Découvrez les saveurs authentiques de la cuisine ivoirienne,
                            préparées avec passion et servies avec générosité.
                        </p>

                    </div>

                    {{-- Recherche / Tri --}}
                    <div class="flex w-full flex-col gap-3 sm:flex-row lg:w-auto">

                        {{-- Recherche --}}
                        <div class="relative">

                            <svg
                                class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-[#9B8D82]"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z"
                                />
                            </svg>

                            <input
                                type="search"
                                x-model="search"
                                placeholder="Rechercher un plat"
                                class="h-11 w-full rounded-xl border border-[#E8DCCE] bg-white pl-10 pr-4 text-xs text-[#593114] outline-none transition placeholder:text-[#A99D93] focus:border-[#e25f12] focus:ring-2 focus:ring-[#e25f12]/10 sm:w-64"
                            >

                        </div>

                        {{-- Tri --}}
                        <div class="relative w-full sm:w-[190px]">

                            <svg
                                class="pointer-events-none absolute left-3.5 top-1/2 z-10 h-4 w-4 -translate-y-1/2 text-[#8C8179]"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 6h18M6 12h12m-9 6h6"
                                />
                            </svg>

                            <select
                                x-model="sort"
                                aria-label="Trier les plats"
                                class="h-11 w-full appearance-none rounded-xl border border-[#E8DCCE] bg-white pl-10 pr-10 text-xs font-medium text-[#593114] shadow-sm outline-none transition-all duration-200 hover:border-[#D8C6B5] hover:shadow-md focus:border-[#e25f12] focus:ring-4 focus:ring-[#e25f12]/10"
                            >
                                <option value="popular">Plus populaires</option>
                                <option value="price-low">Prix croissant</option>
                                <option value="price-high">Prix décroissant</option>
                                <option value="name">Nom A-Z</option>
                            </select>

                            <svg
                                class="pointer-events-none absolute right-3.5 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-[#8C8179]"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m6 9 6 6 6-6"
                                />
                            </svg>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- CONTENU --}}
        {{-- ========================================================= --}}

        <main class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

            <div class="grid gap-8 lg:grid-cols-[260px_minmax(0,1fr)]">

                {{-- ================================================= --}}
                {{-- FILTRES DESKTOP --}}
                {{-- ================================================= --}}

                <aside class="hidden lg:block">

                    <div
                        class="sticky top-6 rounded-2xl border border-[#E9DED1] bg-white p-6 shadow-[0_4px_20px_rgba(89,49,20,0.04)]"
                    >

                        {{-- En-tête --}}
                        <div class="mb-7 flex items-start justify-between gap-4">

                            <div>

                                <h3 class="text-sm font-bold text-[#593114]">
                                    Filtres
                                </h3>

                                <p class="mt-1 text-[11px] text-[#9B8D82]">
                                    Affinez votre sélection
                                </p>

                            </div>

                            <button
                                type="button"
                                @click="resetFilters()"
                                class="shrink-0 text-[11px] font-semibold text-[#e25f12] transition hover:opacity-70"
                            >
                                Réinitialiser
                            </button>

                        </div>


                        {{-- ================================================= --}}
                        {{-- CATÉGORIES --}}
                        {{-- ================================================= --}}

                        <div>

                            <h3 class="mb-4 text-xs font-semibold text-[#593114]">
                                Catégories
                            </h3>

                            <div class="space-y-3">

                                {{-- Tous --}}
                                <label class="flex cursor-pointer items-center justify-between text-xs text-[#6F655E]">

                                    <span class="flex items-center gap-2.5">

                                        <input
                                            type="radio"
                                            value="all"
                                            x-model="category"
                                            class="radio radio-xs border-[#D8C8B8] checked:bg-[#e25f12]"
                                        >

                                        Tous les plats

                                    </span>

                                    <span class="text-[10px] text-[#A99D93]">
                                        24
                                    </span>

                                </label>


                                {{-- Garba --}}
                                <label class="flex cursor-pointer items-center justify-between text-xs text-[#6F655E]">

                                    <span class="flex items-center gap-2.5">

                                        <input
                                            type="radio"
                                            value="garba"
                                            x-model="category"
                                            class="radio radio-xs border-[#D8C8B8] checked:bg-[#e25f12]"
                                        >

                                        Garba

                                    </span>

                                    <span class="text-[10px] text-[#A99D93]">
                                        8
                                    </span>

                                </label>


                                {{-- Grillades --}}
                                <label class="flex cursor-pointer items-center justify-between text-xs text-[#6F655E]">

                                    <span class="flex items-center gap-2.5">

                                        <input
                                            type="radio"
                                            value="braise"
                                            x-model="category"
                                            class="radio radio-xs border-[#D8C8B8] checked:bg-[#e25f12]"
                                        >

                                        Grillades

                                    </span>

                                    <span class="text-[10px] text-[#A99D93]">
                                        6
                                    </span>

                                </label>


                                {{-- Accompagnements --}}
                                <label class="flex cursor-pointer items-center justify-between text-xs text-[#6F655E]">

                                    <span class="flex items-center gap-2.5">

                                        <input
                                            type="radio"
                                            value="accompagnement"
                                            x-model="category"
                                            class="radio radio-xs border-[#D8C8B8] checked:bg-[#e25f12]"
                                        >

                                        Accompagnements

                                    </span>

                                    <span class="text-[10px] text-[#A99D93]">
                                        5
                                    </span>

                                </label>


                                {{-- Sauce --}}
                                <label class="flex cursor-pointer items-center justify-between text-xs text-[#6F655E]">

                                    <span class="flex items-center gap-2.5">

                                        <input
                                            type="radio"
                                            value="sauce"
                                            x-model="category"
                                            class="radio radio-xs border-[#D8C8B8] checked:bg-[#e25f12]"
                                        >

                                        Plats en sauce

                                    </span>

                                    <span class="text-[10px] text-[#A99D93]">
                                        5
                                    </span>

                                </label>

                            </div>

                        </div>


                        {{-- Séparateur --}}
                        <div class="my-7 border-t border-[#F0E7DE]"></div>


                        {{-- ================================================= --}}
                        {{-- PRIX --}}
                        {{-- ================================================= --}}

                        <div>

                            <h3 class="mb-4 text-xs font-semibold text-[#593114]">
                                Fourchette de prix
                            </h3>

                            <div class="grid grid-cols-2 gap-3">

                                <div>

                                    <label class="mb-1.5 block text-[11px] text-[#A99D93]">
                                        Minimum
                                    </label>

                                    <input
                                        type="number"
                                        x-model.number="minPrice"
                                        placeholder="0"
                                        class="h-9 w-full rounded-lg border border-[#E8DCCE] bg-white px-3 text-[11px] text-[#593114] outline-none transition focus:border-[#e25f12] focus:ring-2 focus:ring-[#e25f12]/10"
                                    >

                                </div>


                                <div>

                                    <label class="mb-1.5 block text-[11px] text-[#A99D93]">
                                        Maximum
                                    </label>

                                    <input
                                        type="number"
                                        x-model.number="maxPrice"
                                        placeholder="10000"
                                        class="h-9 w-full rounded-lg border border-[#E8DCCE] bg-white px-3 text-[11px] text-[#593114] outline-none transition focus:border-[#e25f12] focus:ring-2 focus:ring-[#e25f12]/10"
                                    >

                                </div>

                            </div>

                        </div>


                        {{-- Séparateur --}}
                        <div class="my-7 border-t border-[#F0E7DE]"></div>


                        {{-- ================================================= --}}
                        {{-- DISPONIBILITÉ --}}
                        {{-- ================================================= --}}

                        <label class="flex cursor-pointer items-center gap-2.5 text-xs text-[#6F655E]">

                            <input
                                type="checkbox"
                                x-model="availableOnly"
                                class="checkbox checkbox-xs rounded border-[#D8C8B8] checked:border-[#e25f12] checked:bg-[#e25f12]"
                            >

                            Plats disponibles uniquement

                        </label>

                    </div>

                </aside>


                {{-- ================================================= --}}
                {{-- PRODUITS --}}
                {{-- ================================================= --}}

                <section class="min-w-0">

                    {{-- ================================================= --}}
                    {{-- BARRE D'INFORMATION --}}
                    {{-- ================================================= --}}

                    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <p class="text-xs text-[#8C8179]">

                                <span
                                    x-text="filteredProducts.length"
                                    class="font-semibold text-[#593114]"
                                ></span>

                                plats disponibles

                            </p>

                        </div>


                        {{-- Filtre mobile --}}
                        <button
                            type="button"
                            onclick="filters_modal.showModal()"
                            class="flex w-fit items-center gap-2 rounded-xl border border-[#E8DCCE] bg-white px-3.5 py-2.5 text-xs font-semibold text-[#593114] transition hover:border-[#e25f12] lg:hidden"
                        >

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 5h18M6 12h12m-8 7h4"
                                />
                            </svg>

                            Filtres

                        </button>

                    </div>


                    {{-- ================================================= --}}
                    {{-- GRILLE DES PLATS --}}
                    {{-- ================================================= --}}

                    <div class="grid grid-cols-2 gap-x-4 gap-y-6 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">

                        <template
                            x-for="product in paginatedProducts"
                            :key="product.id"
                        >

                            <article class="group overflow-hidden rounded-2xl border border-[#EDE2D8] bg-white shadow-[0_3px_15px_rgba(89,49,20,0.04)]">

                                {{-- ================================================= --}}
                                {{-- IMAGE --}}
                                {{-- ================================================= --}}

                                <figure class="relative aspect-[1.12/1] overflow-hidden bg-[#F3E8DC]">

                                    <img
                                        :src="product.image"
                                        :alt="product.name"
                                        class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                                    >


                                    {{-- Badge --}}
                                    <template x-if="product.badge">

                                        <span
                                            class="absolute left-2.5 top-2.5 rounded-full bg-[#F5B82E] px-2 py-1 text-[8px] font-bold uppercase tracking-wide text-[#593114]"
                                            x-text="product.badge"
                                        ></span>

                                    </template>


                                    {{-- Favoris --}}
                                    <button
                                        type="button"
                                        @click="toggleFavorite(product.id)"
                                        class="absolute right-2.5 top-2.5 flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-[#593114] shadow-sm backdrop-blur transition-transform duration-200 hover:scale-105"
                                        aria-label="Ajouter aux favoris"
                                    >

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.7"
                                            class="h-4 w-4"
                                            :class="isFavorite(product.id) ? 'fill-[#e25f12] text-[#e25f12]' : ''"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733C11.285 4.876 9.623 3.75 7.688 3.75 5.099 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                                            />

                                        </svg>

                                    </button>

                                </figure>


                                {{-- ================================================= --}}
                                {{-- INFORMATIONS --}}
                                {{-- ================================================= --}}

                                <div class="bg-[#F8EBD9] p-3.5 sm:p-4">

                                    <div class="min-h-[100px]">

                                        <h3
                                            class="line-clamp-2 text-sm font-bold leading-5 text-[#593114]"
                                            x-text="product.name"
                                        ></h3>


                                        <p
                                            class="mt-2 line-clamp-2 text-[10px] leading-4 text-[#746A63] sm:text-[11px]"
                                            x-text="product.description"
                                        ></p>

                                    </div>


                                    {{-- Séparateur --}}
                                    <div class="my-3.5 border-t border-[#E5D3BD]"></div>


                                    {{-- Prix / panier --}}
                                    <div class="flex items-center justify-between gap-3">

                                        <div>

                                            <span
                                                class="text-sm font-bold text-[#A84B0B] sm:text-[15px]"
                                                x-text="formatPrice(product.price)"
                                            ></span>

                                            <span class="ml-0.5 text-[8px] text-[#8C8179]">
                                                FCFA
                                            </span>

                                        </div>


                                        {{-- Panier --}}
                                        <button
                                            type="button"
                                            @click="addToCart(product)"
                                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#593114] text-white transition-all duration-200 hover:scale-105 active:scale-95"
                                            aria-label="Ajouter au panier"
                                        >

                                            <svg
                                                class="h-4 w-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.7"
                                            >

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25h9.75l3-9H5.106M7.5 14.25 5.106 5.272M7.5 14.25l-1.5 2.25h11.25M9 19.5a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm9 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
                                                />

                                            </svg>

                                        </button>

                                    </div>

                                </div>

                            </article>

                        </template>

                    </div>


                    {{-- ================================================= --}}
                    {{-- AUCUN RÉSULTAT --}}
                    {{-- ================================================= --}}

                    <div
                        x-show="filteredProducts.length === 0"
                        x-cloak
                        class="rounded-2xl border border-dashed border-[#DCCDBE] bg-white px-6 py-16 text-center"
                    >

                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#F8EBD9] text-[#593114]">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.6"
                                    d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z"
                                />
                            </svg>

                        </div>

                        <h3 class="mt-4 text-sm font-bold text-[#593114]">
                            Aucun plat trouvé
                        </h3>

                        <p class="mt-1 text-xs text-[#8C8179]">
                            Essayez de modifier vos critères de recherche.
                        </p>

                        <button
                            type="button"
                            @click="resetFilters()"
                            class="mt-5 rounded-lg bg-[#593114] px-4 py-2 text-[11px] font-semibold text-white transition hover:bg-[#e25f12]"
                        >
                            Réinitialiser les filtres
                        </button>

                    </div>


                    {{-- ================================================= --}}
                    {{-- PAGINATION --}}
                    {{-- ================================================= --}}

                    <div
                        x-show="totalPages > 1"
                        x-cloak
                        class="mt-10"
                    >

                        <div class="flex flex-col items-center gap-4 sm:flex-row sm:justify-between">

                            {{-- Information --}}
                            <p class="text-[11px] text-[#8C8179]">

                                Page

                                <span
                                    x-text="page"
                                    class="font-semibold text-[#593114]"
                                ></span>

                                sur

                                <span
                                    x-text="totalPages"
                                    class="font-semibold text-[#593114]"
                                ></span>

                            </p>


                            {{-- Pagination --}}
                            <nav
                                class="flex items-center gap-1.5"
                                aria-label="Pagination"
                            >

                                {{-- Précédent --}}
                                <button
                                    type="button"
                                    @click="previousPage()"
                                    :disabled="page === 1"
                                    class="flex h-9 items-center gap-1.5 rounded-lg border border-[#E8DCCE] bg-white px-3 text-[10px] font-semibold text-[#593114] transition hover:border-[#e25f12] hover:text-[#e25f12] disabled:cursor-not-allowed disabled:opacity-35"
                                >

                                    <svg
                                        class="h-3.5 w-3.5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15 19l-7-7 7-7"
                                        />
                                    </svg>

                                    <span class="hidden sm:inline">
                                        Précédent
                                    </span>

                                </button>


                                {{-- Numéros --}}
                                <template
                                    x-for="number in visiblePages"
                                    :key="number"
                                >

                                    <button
                                        type="button"
                                        @click="goToPage(number)"
                                        class="flex h-9 min-w-9 items-center justify-center rounded-lg px-2 text-[11px] font-semibold transition"
                                        :class="
                                            page === number
                                                ? 'bg-[#593114] text-white'
                                                : 'border border-[#E8DCCE] bg-white text-[#593114] hover:border-[#e25f12] hover:text-[#e25f12]'
                                        "
                                        x-text="number"
                                    ></button>

                                </template>


                                {{-- Suivant --}}
                                <button
                                    type="button"
                                    @click="nextPage()"
                                    :disabled="page === totalPages"
                                    class="flex h-9 items-center gap-1.5 rounded-lg border border-[#E8DCCE] bg-white px-3 text-[10px] font-semibold text-[#593114] transition hover:border-[#e25f12] hover:text-[#e25f12] disabled:cursor-not-allowed disabled:opacity-35"
                                >

                                    <span class="hidden sm:inline">
                                        Suivant
                                    </span>

                                    <svg
                                        class="h-3.5 w-3.5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 5l7 7-7 7"
                                        />
                                    </svg>

                                </button>

                            </nav>

                        </div>

                    </div>

                </section>

            </div>

        </main>


        {{-- ========================================================= --}}
        {{-- FILTRES MOBILE --}}
        {{-- ========================================================= --}}

        <dialog id="filters_modal" class="modal">

            <div class="modal-box max-w-sm bg-[#FCF8F3]">

                <div class="flex items-start justify-between">

                    <div>

                        <h3 class="font-bold text-[#593114]">
                            Filtres
                        </h3>

                        <p class="mt-1 text-[11px] text-[#8C8179]">
                            Affinez votre sélection
                        </p>

                    </div>

                    <form method="dialog">

                        <button
                            class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-[#593114]"
                        >
                            ✕
                        </button>

                    </form>

                </div>


                <div class="mt-7 space-y-7">

                    {{-- Catégories --}}
                    <div>

                        <h4 class="mb-4 text-xs font-bold text-[#593114]">
                            Catégorie
                        </h4>

                        <div class="space-y-3">

                            <label class="flex items-center gap-2.5 text-xs text-[#6F655E]">
                                <input
                                    type="radio"
                                    value="all"
                                    x-model="category"
                                    class="radio radio-xs checked:bg-[#e25f12]"
                                >
                                Tous les plats
                            </label>

                            <label class="flex items-center gap-2.5 text-xs text-[#6F655E]">
                                <input
                                    type="radio"
                                    value="garba"
                                    x-model="category"
                                    class="radio radio-xs checked:bg-[#e25f12]"
                                >
                                Garba
                            </label>

                            <label class="flex items-center gap-2.5 text-xs text-[#6F655E]">
                                <input
                                    type="radio"
                                    value="braise"
                                    x-model="category"
                                    class="radio radio-xs checked:bg-[#e25f12]"
                                >
                                Grillades
                            </label>

                            <label class="flex items-center gap-2.5 text-xs text-[#6F655E]">
                                <input
                                    type="radio"
                                    value="accompagnement"
                                    x-model="category"
                                    class="radio radio-xs checked:bg-[#e25f12]"
                                >
                                Accompagnements
                            </label>

                            <label class="flex items-center gap-2.5 text-xs text-[#6F655E]">
                                <input
                                    type="radio"
                                    value="sauce"
                                    x-model="category"
                                    class="radio radio-xs checked:bg-[#e25f12]"
                                >
                                Plats en sauce
                            </label>

                        </div>

                    </div>


                    {{-- Prix --}}
                    <div>

                        <h4 class="mb-4 text-xs font-bold text-[#593114]">
                            Fourchette de prix
                        </h4>

                        <div class="grid grid-cols-2 gap-3">

                            <input
                                type="number"
                                x-model.number="minPrice"
                                placeholder="Minimum"
                                class="h-10 w-full rounded-lg border border-[#E8DCCE] bg-white px-3 text-xs outline-none focus:border-[#e25f12]"
                            >

                            <input
                                type="number"
                                x-model.number="maxPrice"
                                placeholder="Maximum"
                                class="h-10 w-full rounded-lg border border-[#E8DCCE] bg-white px-3 text-xs outline-none focus:border-[#e25f12]"
                            >

                        </div>

                    </div>


                    {{-- Disponibilité --}}
                    <label class="flex items-center gap-2.5 text-xs text-[#6F655E]">

                        <input
                            type="checkbox"
                            x-model="availableOnly"
                            class="checkbox checkbox-xs checked:bg-[#e25f12]"
                        >

                        Plats disponibles uniquement

                    </label>

                </div>


                <div class="mt-8 flex gap-3">

                    <button
                        type="button"
                        @click="resetFilters()"
                        class="flex-1 rounded-xl border border-[#E8DCCE] bg-white py-3 text-xs font-semibold text-[#593114]"
                    >
                        Réinitialiser
                    </button>

                    <form
                        method="dialog"
                        class="flex-1"
                    >

                        <button
                            class="w-full rounded-xl bg-[#593114] py-3 text-xs font-semibold text-white transition hover:bg-[#e25f12]"
                        >
                            Afficher les plats
                        </button>

                    </form>

                </div>

            </div>

            <form
                method="dialog"
                class="modal-backdrop"
            >
                <button>close</button>
            </form>

        </dialog>


        {{-- ========================================================= --}}
        {{-- NOTIFICATION PANIER --}}
        {{-- ========================================================= --}}

        <div
            x-show="notification"
            x-transition
            x-cloak
            class="alert alert-success fixed bottom-5 right-5 z-50 flex items-center gap-3 rounded-xl px-4 py-3 text-white shadow-xl"
        >

            <div class="flex h-7 w-7 items-center justify-center rounded-full bg-white/10 text-xs">
                ✓
            </div>

            <div>

                <p class="text-xs font-semibold">
                    Plat ajouté au panier
                </p>

                <p class="mt-0.5 text-[10px] text-white/60">
                    Votre sélection a été mise à jour.
                </p>

            </div>

        </div>

    </div>


    {{-- ============================================================= --}}
    {{-- ALPINE.JS --}}
    {{-- ============================================================= --}}

    <script>
        function dishCatalog() {

            return {

                /* ===================================================== */
                /* ÉTAT */
                /* ===================================================== */

                search: '',

                category: 'all',

                minPrice: null,

                maxPrice: null,

                availableOnly: false,

                sort: 'popular',

                page: 1,

                perPage: 8,

                favorites: [],

                cart: [],

                notification: false,


                /* ===================================================== */
                /* PRODUITS */
                /* ===================================================== */

                products: [

                    {
                        id: 1,
                        name: 'Garba Royal',
                        category: 'garba',
                        price: 3500,
                        available: true,
                        badge: 'Best Seller',
                        image: "{{ asset('images/garba.jpg') }}",
                        description:
                            'Attiéké vapeur, thon frit croustillant, oignons, tomates fraîches et piment doux.'
                    },

                    {
                        id: 2,
                        name: 'Poulet Braisé Entier',
                        category: 'braise',
                        price: 5000,
                        available: true,
                        badge: 'Populaire',
                        image: "{{ asset('images/garba.jpg') }}",
                        description:
                            'Poulet fermier mariné aux épices locales, braisé à la perfection.'
                    },

                    {
                        id: 3,
                        name: 'Poisson Braisé',
                        category: 'braise',
                        price: 6000,
                        available: true,
                        badge: 'Nouveau',
                        image: "{{ asset('images/garba.jpg') }}",
                        description:
                            'Poisson frais mariné et braisé, accompagné de nos sauces maison.'
                    },

                    {
                        id: 4,
                        name: "Portion d'Aloco",
                        category: 'accompagnement',
                        price: 1000,
                        available: true,
                        badge: null,
                        image: "{{ asset('images/garba.jpg') }}",
                        description:
                            'Bananes plantains douces, frites à la perfection.'
                    },

                    {
                        id: 5,
                        name: 'Attiéké Poisson',
                        category: 'garba',
                        price: 3000,
                        available: true,
                        badge: null,
                        image: "{{ asset('images/garba.jpg') }}",
                        description:
                            'Attiéké traditionnel accompagné de poisson frais et légumes.'
                    },

                    {
                        id: 6,
                        name: 'Poulet Kedjenou',
                        category: 'braise',
                        price: 5500,
                        available: true,
                        badge: 'Tradition',
                        image: "{{ asset('images/garba.jpg') }}",
                        description:
                            'Poulet mijoté avec tomates, oignons et épices ivoiriennes.'
                    },

                    {
                        id: 7,
                        name: 'Foutou Sauce Graine',
                        category: 'sauce',
                        price: 4000,
                        available: true,
                        badge: null,
                        image: "{{ asset('images/garba.jpg') }}",
                        description:
                            'Foutou banane accompagné de notre sauce graine traditionnelle.'
                    },

                    {
                        id: 8,
                        name: 'Igname Frit',
                        category: 'accompagnement',
                        price: 1500,
                        available: false,
                        badge: null,
                        image: "{{ asset('images/garba.jpg') }}",
                        description:
                            'Bâtonnets d’igname croustillants servis avec une sauce maison.'
                    },

                    {
                        id: 9,
                        name: 'Placali Sauce Gombo',
                        category: 'sauce',
                        price: 4000,
                        available: true,
                        badge: null,
                        image: "{{ asset('images/garba.jpg') }}",
                        description:
                            'Placali traditionnel accompagné d’une délicieuse sauce gombo.'
                    },

                    {
                        id: 10,
                        name: 'Brochettes de Poulet',
                        category: 'braise',
                        price: 2500,
                        available: true,
                        badge: 'Populaire',
                        image: "{{ asset('images/garba.jpg') }}",
                        description:
                            'Tendres morceaux de poulet grillés aux épices et légèrement fumés.'
                    },

                    {
                        id: 11,
                        name: 'Alloco Garni',
                        category: 'accompagnement',
                        price: 2000,
                        available: true,
                        badge: null,
                        image: "{{ asset('images/garba.jpg') }}",
                        description:
                            'Alloco doré accompagné d’oignons, tomates et sauce maison.'
                    },

                    {
                        id: 12,
                        name: 'Garba Tradition',
                        category: 'garba',
                        price: 2500,
                        available: true,
                        badge: null,
                        image: "{{ asset('images/garba.jpg') }}",
                        description:
                            'Le classique ivoirien avec attiéké, thon frit et condiments frais.'
                    }

                ],


                /* ===================================================== */
                /* INITIALISATION */
                /* ===================================================== */

                init() {

                    this.$watch('search', () => {
                        this.page = 1;
                    });

                    this.$watch('category', () => {
                        this.page = 1;
                    });

                    this.$watch('minPrice', () => {
                        this.page = 1;
                    });

                    this.$watch('maxPrice', () => {
                        this.page = 1;
                    });

                    this.$watch('availableOnly', () => {
                        this.page = 1;
                    });

                    this.$watch('sort', () => {
                        this.page = 1;
                    });

                },


                /* ===================================================== */
                /* FILTRES */
                /* ===================================================== */

                get filteredProducts() {

                    let result = this.products.filter(product => {

                        const searchTerm =
                            this.search.trim().toLowerCase();

                        const matchesSearch =
                            product.name
                                .toLowerCase()
                                .includes(searchTerm);

                        const matchesCategory =
                            this.category === 'all' ||
                            product.category === this.category;

                        const matchesMin =
                            !this.minPrice ||
                            product.price >= Number(this.minPrice);

                        const matchesMax =
                            !this.maxPrice ||
                            product.price <= Number(this.maxPrice);

                        const matchesAvailability =
                            !this.availableOnly ||
                            product.available;

                        return (
                            matchesSearch &&
                            matchesCategory &&
                            matchesMin &&
                            matchesMax &&
                            matchesAvailability
                        );

                    });


                    /* Tri par prix */
                    if (this.sort === 'price-low') {

                        result.sort(
                            (a, b) => a.price - b.price
                        );

                    }


                    /* Tri par prix décroissant */
                    if (this.sort === 'price-high') {

                        result.sort(
                            (a, b) => b.price - a.price
                        );

                    }


                    /* Tri alphabétique */
                    if (this.sort === 'name') {

                        result.sort(
                            (a, b) =>
                                a.name.localeCompare(
                                    b.name,
                                    'fr'
                                )
                        );

                    }


                    return result;

                },


                /* ===================================================== */
                /* PAGINATION */
                /* ===================================================== */

                get totalPages() {

                    return Math.ceil(
                        this.filteredProducts.length /
                        this.perPage
                    );

                },


                get paginatedProducts() {

                    const start =
                        (this.page - 1) *
                        this.perPage;

                    return this.filteredProducts.slice(
                        start,
                        start + this.perPage
                    );

                },


                get visiblePages() {

                    const total = this.totalPages;

                    if (total <= 5) {

                        return Array.from(
                            { length: total },
                            (_, index) => index + 1
                        );

                    }


                    if (this.page <= 3) {

                        return [1, 2, 3, 4, 5];

                    }


                    if (this.page >= total - 2) {

                        return [
                            total - 4,
                            total - 3,
                            total - 2,
                            total - 1,
                            total
                        ];

                    }


                    return [
                        this.page - 2,
                        this.page - 1,
                        this.page,
                        this.page + 1,
                        this.page + 2
                    ];

                },


                goToPage(number) {

                    if (
                        number >= 1 &&
                        number <= this.totalPages
                    ) {

                        this.page = number;

                        this.scrollToProducts();

                    }

                },


                previousPage() {

                    if (this.page > 1) {

                        this.page--;

                        this.scrollToProducts();

                    }

                },


                nextPage() {

                    if (this.page < this.totalPages) {

                        this.page++;

                        this.scrollToProducts();

                    }

                },


                scrollToProducts() {

                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });

                },


                /* ===================================================== */
                /* PRIX */
                /* ===================================================== */

                formatPrice(price) {

                    return new Intl.NumberFormat('fr-FR')
                        .format(price);

                },


                /* ===================================================== */
                /* FAVORIS */
                /* ===================================================== */

                toggleFavorite(id) {

                    if (this.favorites.includes(id)) {

                        this.favorites =
                            this.favorites.filter(
                                item => item !== id
                            );

                    } else {

                        this.favorites.push(id);

                    }

                },


                isFavorite(id) {

                    return this.favorites.includes(id);

                },


                /* ===================================================== */
                /* PANIER */
                /* ===================================================== */

                addToCart(product) {

                    this.cart.push(product);

                    this.notification = true;

                    setTimeout(() => {

                        this.notification = false;

                    }, 2500);

                },


                /* ===================================================== */
                /* RESET */
                /* ===================================================== */

                resetFilters() {

                    this.search = '';

                    this.category = 'all';

                    this.minPrice = null;

                    this.maxPrice = null;

                    this.availableOnly = false;

                    this.sort = 'popular';

                    this.page = 1;

                }

            };

        }
    </script>

</x-app-layout>