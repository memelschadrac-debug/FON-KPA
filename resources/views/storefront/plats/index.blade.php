{{-- resources/views/storefront/plats/index.blade.php --}}

<x-app-layout>

    @section('title', 'FON-KPA — Nos plats')

    <div
        x-data="dishCatalog()"
        x-init="init()"
        @keydown.escape.window="customizationOpen && closeCustomization()"
        class="min-h-screen overflow-hidden bg-[#FCFAF7] text-[#3D1F0D]"
    >

        {{-- ========================================================= --}}
        {{-- HEADER + RECHERCHE / TRI                                  --}}
        {{-- ========================================================= --}}

        <section class="relative mt-10 overflow-hidden bg-[#FCFAF7] lg:mt-10">

            {{-- Décors --}}
            <div class="pointer-events-none absolute -left-40 top-10 h-80 w-80 rounded-full bg-[#F4C451]/10 blur-3xl"></div>

            <div class="pointer-events-none absolute -right-40 top-0 h-[500px] w-[500px] rounded-full bg-[#E25F12]/[0.035] blur-3xl"></div>

            <div class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]">

                <div class="relative py-14 sm:py-16 lg:py-20">

                    {{-- ================================================= --}}
                    {{-- TITRE + RECHERCHE + TRI                         --}}
                    {{-- ================================================= --}}

                    <div class="flex flex-col gap-7 lg:flex-row lg:items-end lg:justify-between lg:gap-10">

                        {{-- TITRE --}}
                        <div class="max-w-2xl">

                            <span class="text-[9px] font-bold uppercase tracking-[0.25em] text-[#E25F12]">
                                Les incontournables
                            </span>

                            <h2 class="mt-2 text-3xl font-black tracking-[-0.04em] text-[#3B200F] sm:text-4xl">
                                Plats populaires
                            </h2>

                            <p class="mt-3 max-w-lg text-xs leading-6 text-[#887A70] sm:text-sm">
                                Les recettes qui font revenir nos clients,
                                encore et encore.
                            </p>

                        </div>

                        {{-- RECHERCHE + TRI --}}
                        <div class="flex w-full flex-col gap-3 sm:flex-row lg:w-auto lg:shrink-0">

                            {{-- Recherche --}}
                            <div class="relative w-full sm:w-[280px]">

                                <i
                                    class="bi bi-search pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#9B8D82]"
                                ></i>

                                <input
                                    type="search"
                                    x-model="search"
                                    placeholder="Rechercher un plat..."
                                    class="h-11 w-full rounded-full border border-[#E7DCD3] bg-[#FCFAF7] pl-11 pr-10 text-xs font-medium text-[#593114] outline-none transition-all duration-200 placeholder:text-[#A99D93] focus:border-[#E25F12] focus:bg-white focus:ring-4 focus:ring-[#E25F12]/10"
                                >

                                <button
                                    type="button"
                                    x-show="search !== ''"
                                    x-cloak
                                    @click="search = ''"
                                    class="absolute right-3 top-1/2 flex h-6 w-6 -translate-y-1/2 items-center justify-center rounded-full bg-[#F1E5DB] text-[#593114] transition hover:bg-[#E25F12] hover:text-white"
                                    aria-label="Effacer la recherche"
                                >
                                    <i class="bi bi-x text-xs"></i>
                                </button>

                            </div>

                            {{-- Tri --}}
                            <div class="relative w-full sm:w-[190px]">

                                <i
                                    class="bi bi-sliders pointer-events-none absolute left-4 top-1/2 z-10 -translate-y-1/2 text-sm text-[#8C8179]"
                                ></i>

                                <select
                                    x-model="sort"
                                    aria-label="Trier les plats"
                                    class="h-11 w-full appearance-none rounded-full border border-[#E7DCD3] bg-[#FCFAF7] pl-11 pr-10 text-xs font-semibold text-[#593114] outline-none transition-all duration-200 hover:border-[#D8C6B5] focus:border-[#E25F12] focus:bg-white focus:ring-4 focus:ring-[#E25F12]/10"
                                >

                                    <option value="popular">
                                        Plus populaires
                                    </option>

                                    <option value="price-low">
                                        Prix croissant
                                    </option>

                                    <option value="price-high">
                                        Prix décroissant
                                    </option>

                                    <option value="name">
                                        Nom A-Z
                                    </option>

                                </select>

                                <i
                                    class="bi bi-chevron-down pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-[10px] text-[#8C8179]"
                                ></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- CONTENU PRINCIPAL                                         --}}
        {{-- ========================================================= --}}

        <main class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)] pb-20 pt-5 lg:pb-28">

            <div class="grid gap-8 lg:grid-cols-[250px_minmax(0,1fr)]">

                {{-- ================================================= --}}
                {{-- SIDEBAR FILTRES                                    --}}
                {{-- ================================================= --}}

                <aside class="hidden lg:block">

                    <div class="sticky top-6 rounded-[1.5rem] border border-[#E9DED5] bg-white p-5 shadow-[0_12px_40px_rgba(89,49,20,0.05)]">

                        {{-- Header --}}
                        <div class="flex items-start justify-between">

                            <div>

                                <div class="flex items-center gap-2">

                                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#F8EBD9] text-[#593114]">
                                        <i class="bi bi-sliders2 text-xs"></i>
                                    </div>

                                    <h3 class="text-sm font-black text-[#593114]">
                                        Filtres
                                    </h3>

                                </div>

                                <p class="mt-2 pl-10 text-[9px] leading-4 text-[#A09288]">
                                    Affinez votre sélection
                                </p>

                            </div>

                            <button
                                type="button"
                                @click="resetFilters()"
                                class="text-[9px] font-bold text-[#E25F12] transition hover:opacity-60"
                            >
                                Réinitialiser
                            </button>

                        </div>

                        <div class="my-6 border-t border-[#F0E7DE]"></div>

                        {{-- CATÉGORIES --}}
                        <div>

                            <div class="mb-4 flex items-center justify-between">

                                <h4 class="text-[10px] font-black uppercase tracking-[0.15em] text-[#593114]">
                                    Catégories
                                </h4>

                                <i class="bi bi-grid text-[10px] text-[#C2B3A8]"></i>

                            </div>

                            <div class="space-y-1">

                                {{-- Tous --}}
                                <label
                                    class="flex cursor-pointer items-center justify-between rounded-xl px-3 py-2.5 text-[10px] transition hover:bg-[#FCF8F3]"
                                    :class="category === 'all' ? 'bg-[#F8EBD9] text-[#593114]' : 'text-[#746A63]'"
                                >

                                    <span class="flex items-center gap-2.5">

                                        <input
                                            type="radio"
                                            value="all"
                                            x-model="category"
                                            class="radio radio-xs border-[#D8C8B8] checked:border-[#E25F12] checked:bg-[#E25F12]"
                                        >

                                        Tous les plats

                                    </span>

                                    <span
                                        class="text-[9px]"
                                        :class="category === 'all' ? 'font-bold text-[#E25F12]' : 'text-[#A99D93]'"
                                        x-text="products.length"
                                    ></span>

                                </label>

                                {{-- Laravel categories --}}
                                <template
                                    x-for="item in categories"
                                    :key="item.id"
                                >

                                    <label
                                        class="flex cursor-pointer items-center justify-between rounded-xl px-3 py-2.5 text-[10px] transition hover:bg-[#FCF8F3]"
                                        :class="category === item.slug ? 'bg-[#F8EBD9] text-[#593114]' : 'text-[#746A63]'"
                                    >

                                        <span class="flex items-center gap-2.5">

                                            <input
                                                type="radio"
                                                :value="item.slug"
                                                x-model="category"
                                                class="radio radio-xs border-[#D8C8B8] checked:border-[#E25F12] checked:bg-[#E25F12]"
                                            >

                                            <span x-text="item.name"></span>

                                        </span>

                                        <span
                                            class="text-[9px]"
                                            :class="category === item.slug ? 'font-bold text-[#E25F12]' : 'text-[#A99D93]'"
                                            x-text="item.products_count"
                                        ></span>

                                    </label>

                                </template>

                            </div>

                        </div>

                        <div class="my-6 border-t border-[#F0E7DE]"></div>

                        {{-- PRIX --}}
                        <div>

                            <div class="mb-4 flex items-center justify-between">

                                <h4 class="text-[10px] font-black uppercase tracking-[0.15em] text-[#593114]">
                                    Prix
                                </h4>

                                <i class="bi bi-cash-stack text-[10px] text-[#C2B3A8]"></i>

                            </div>

                            <div class="grid grid-cols-2 gap-2.5">

                                <div>

                                    <label class="mb-1.5 block text-[9px] text-[#A09288]">
                                        Minimum
                                    </label>

                                    <input
                                        type="number"
                                        x-model.number="minPrice"
                                        placeholder="0"
                                        min="0"
                                        class="h-9 w-full rounded-lg border border-[#E8DCCE] bg-[#FCFAF7] px-2.5 text-[10px] text-[#593114] outline-none transition focus:border-[#E25F12] focus:bg-white focus:ring-2 focus:ring-[#E25F12]/10"
                                    >

                                </div>

                                <div>

                                    <label class="mb-1.5 block text-[9px] text-[#A09288]">
                                        Maximum
                                    </label>

                                    <input
                                        type="number"
                                        x-model.number="maxPrice"
                                        placeholder="10000"
                                        min="0"
                                        class="h-9 w-full rounded-lg border border-[#E8DCCE] bg-[#FCFAF7] px-2.5 text-[10px] text-[#593114] outline-none transition focus:border-[#E25F12] focus:bg-white focus:ring-2 focus:ring-[#E25F12]/10"
                                    >

                                </div>

                            </div>

                        </div>

                        <div class="my-6 border-t border-[#F0E7DE]"></div>

                        {{-- DISPONIBILITÉ --}}
                        <label class="flex cursor-pointer items-start gap-3 rounded-xl bg-[#FCFAF7] p-3">

                            <input
                                type="checkbox"
                                x-model="availableOnly"
                                class="checkbox checkbox-xs mt-0.5 rounded border-[#D8C8B8] checked:border-[#E25F12] checked:bg-[#E25F12]"
                            >

                            <span>

                                <span class="block text-[10px] font-semibold text-[#593114]">
                                    Disponibles uniquement
                                </span>

                                <span class="mt-1 block text-[8px] leading-4 text-[#9B8D82]">
                                    Masquer les plats indisponibles
                                </span>

                            </span>

                        </label>

                    </div>

                </aside>


                {{-- ================================================= --}}
                {{-- PRODUITS                                          --}}
                {{-- ================================================= --}}

                <section
                    id="products"
                    class="min-w-0"
                >

                    {{-- En-tête produits --}}
                    <div class="mb-6 flex items-center justify-between gap-4">

                        {{-- Mobile filtres --}}
                        <button
                            type="button"
                            onclick="filters_modal.showModal()"
                            class="flex h-10 items-center gap-2 rounded-full border border-[#E5D9D0] bg-white px-4 text-[9px] font-bold text-[#593114] shadow-sm transition hover:border-[#E25F12] hover:text-[#E25F12] lg:hidden"
                        >
                            <i class="bi bi-sliders2 text-xs"></i>
                            Filtres
                        </button>

                    </div>


                    {{-- ================================================= --}}
                    {{-- GRILLE PRODUITS                                  --}}
                    {{-- ================================================= --}}

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">

                        <template
                            x-for="product in paginatedProducts"
                            :key="product.id"
                        >

                            <article
                                class="group overflow-hidden rounded-[1.4rem] border border-[#EDE3DB] bg-white shadow-[0_6px_25px_rgba(89,49,20,0.035)] transition-all duration-300 hover:-translate-y-1 hover:border-[#E5D4C5] hover:shadow-[0_18px_45px_rgba(89,49,20,0.09)]"
                            >

                                {{-- IMAGE --}}
                                <figure class="relative aspect-[1.18/1] overflow-hidden bg-[#F5ECE4]">

                                    <img
                                        :src="product.image || '{{ asset('images/garba.jpg') }}'"
                                        :alt="product.name"
                                        class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.04]"
                                        loading="lazy"
                                    >

                                    {{-- Overlay léger --}}
                                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-[#2B1609]/10 via-transparent to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>

                                    {{-- Badge --}}
                                    <span
                                        class="absolute left-3 top-3 rounded-full border px-3 py-1.5 text-[8px] font-bold uppercase tracking-[0.08em] shadow-sm backdrop-blur-md"
                                        :class="{
                                            'border-[#D8E8DC] bg-[#F0F8F2]/95 text-[#3B7650]':
                                                product.badge?.toLowerCase() === 'nouveau',

                                            'border-[#F0DDB5] bg-[#FFF8E8]/95 text-[#A66A08]':
                                                product.badge?.toLowerCase() === 'populaire',

                                            'border-[#F1D1C3] bg-[#FFF1EC]/95 text-[#B94B20]':
                                                product.badge?.toLowerCase() === 'best-seller',

                                            'border-[#E5DCD5] bg-white/95 text-[#715F52]':
                                                !['nouveau', 'populaire', 'best-seller'].includes(
                                                    product.badge?.toLowerCase()
                                                )
                                        }"
                                        x-text="product.badge"
                                        x-show="product.badge"
                                    ></span>

                                    {{-- Favoris --}}
                                    <button
                                        type="button"
                                        @click="toggleFavorite(product.id)"
                                        class="btn btn-circle absolute right-3 top-3 h-9 min-h-9 w-9 border border-white/80 bg-white/95 text-[#593114] shadow-sm backdrop-blur transition-all duration-200 hover:scale-105 hover:bg-[#593114] hover:text-white"
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

                                    {{-- Indisponible --}}
                                    <template x-if="!product.available">

                                        <div class="absolute inset-0 flex items-center justify-center bg-[#2B1609]/35 backdrop-blur-[1px]">

                                            <span class="rounded-full bg-white px-4 py-2 text-[9px] font-bold text-[#593114] shadow-lg">
                                                Indisponible
                                            </span>

                                        </div>

                                    </template>

                                </figure>


                                {{-- INFORMATIONS --}}
                                <div class="p-4 sm:p-5">

                                    {{-- Nom --}}
                                    <div class="min-h-[68px]">

                                        <div class="flex items-start justify-between gap-3">

                                            <h3
                                                class="line-clamp-2 text-sm font-black leading-5 text-[#593114] sm:text-[15px]"
                                                x-text="product.name"
                                            ></h3>

                                            <span class="mt-1 flex shrink-0 gap-0.5 text-[#F4B72E]">

                                                <i class="bi bi-star-fill text-[7px]"></i>
                                                <i class="bi bi-star-fill text-[7px]"></i>
                                                <i class="bi bi-star-fill text-[7px]"></i>
                                                <i class="bi bi-star-fill text-[7px]"></i>
                                                <i class="bi bi-star-fill text-[7px]"></i>

                                            </span>

                                        </div>

                                        <p
                                            class="mt-2 line-clamp-2 text-[9px] leading-4 text-[#8A7B71] sm:text-[12px]"
                                            x-text="product.description"
                                        ></p>

                                    </div>

                                    {{-- Bottom --}}
                                    <div class="mt-3 flex items-center justify-between border-t border-[#EDE3DB] pt-3">

                                        <div>

                                            <p class="text-[8px] uppercase tracking-[0.12em] text-[#A09288]">
                                                À partir de
                                            </p>

                                            <div class="mt-0.5 flex items-baseline gap-1">

                                                <span
                                                    class="text-base font-black tracking-tight text-[#A84B0B]"
                                                    x-text="formatPrice(product.price)"
                                                ></span>

                                                <span class="text-[8px] font-semibold text-[#8C8179]">
                                                    FCFA
                                                </span>

                                            </div>

                                        </div>

                                        {{-- Panier --}}
                                        <button
                                            type="button"
                                            @click="addToCart(product)"
                                            :disabled="!product.available"
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


                    {{-- ================================================= --}}
                    {{-- AUCUN RÉSULTAT                                  --}}
                    {{-- ================================================= --}}

                    <div
                        x-show="filteredProducts.length === 0"
                        x-cloak
                        class="rounded-[1.5rem] border border-dashed border-[#DCCDBE] bg-white px-6 py-20 text-center"
                    >

                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#F8EBD9] text-[#593114]">
                            <i class="bi bi-search text-lg"></i>
                        </div>

                        <h3 class="mt-5 text-base font-black text-[#593114]">
                            Aucun plat trouvé
                        </h3>

                        <p class="mx-auto mt-2 max-w-sm text-[10px] leading-5 text-[#8C8179]">
                            Aucun résultat ne correspond à vos critères.
                            Essayez une autre recherche ou réinitialisez les filtres.
                        </p>

                        <button
                            type="button"
                            @click="resetFilters()"
                            class="mt-6 rounded-full bg-[#593114] px-5 py-2.5 text-[9px] font-bold text-white transition hover:bg-[#E25F12]"
                        >
                            Réinitialiser les filtres
                        </button>

                    </div>


                    {{-- ================================================= --}}
                    {{-- PAGINATION                                      --}}
                    {{-- ================================================= --}}

                    <div
                        x-show="totalPages > 1"
                        x-cloak
                        class="mt-12 border-t border-[#EDE3DB] pt-7"
                    >

                        <div class="flex flex-col items-center justify-between gap-5 sm:flex-row">

                            <p class="text-[9px] text-[#8C8179]">

                                Page

                                <span
                                    x-text="page"
                                    class="font-bold text-[#593114]"
                                ></span>

                                sur

                                <span
                                    x-text="totalPages"
                                    class="font-bold text-[#593114]"
                                ></span>

                            </p>

                            <nav
                                class="flex items-center gap-1.5"
                                aria-label="Pagination"
                            >

                                {{-- Précédent --}}
                                <button
                                    type="button"
                                    @click="previousPage()"
                                    :disabled="page === 1"
                                    class="flex h-9 items-center gap-1.5 rounded-full border border-[#E5DAD1] bg-white px-3 text-[9px] font-bold text-[#593114] transition hover:border-[#E25F12] hover:text-[#E25F12] disabled:cursor-not-allowed disabled:opacity-30"
                                >

                                    <i class="bi bi-arrow-left text-[10px]"></i>

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
                                        class="flex h-9 min-w-9 items-center justify-center rounded-full px-2 text-[10px] font-bold transition"
                                        :class="
                                            page === number
                                                ? 'bg-[#593114] text-white shadow-md shadow-[#593114]/10'
                                                : 'border border-[#E5DAD1] bg-white text-[#593114] hover:border-[#E25F12] hover:text-[#E25F12]'
                                        "
                                        x-text="number"
                                    ></button>

                                </template>

                                {{-- Suivant --}}
                                <button
                                    type="button"
                                    @click="nextPage()"
                                    :disabled="page === totalPages"
                                    class="flex h-9 items-center gap-1.5 rounded-full border border-[#E5DAD1] bg-white px-3 text-[9px] font-bold text-[#593114] transition hover:border-[#E25F12] hover:text-[#E25F12] disabled:cursor-not-allowed disabled:opacity-30"
                                >

                                    <span class="hidden sm:inline">
                                        Suivant
                                    </span>

                                    <i class="bi bi-arrow-right text-[10px]"></i>

                                </button>

                            </nav>

                        </div>

                    </div>

                </section>

            </div>

        </main>


        {{-- ========================================================= --}}
        {{-- MODAL FILTRES MOBILE                                     --}}
        {{-- ========================================================= --}}

        <dialog
            id="filters_modal"
            class="modal"
        >

            <div class="modal-box w-[calc(100%-1.5rem)] max-w-md rounded-[1.5rem] bg-[#FCF8F3] p-0">

                <div class="border-b border-[#E9DED1] bg-white px-5 py-4">

                    <div class="flex items-start justify-between gap-4">

                        <div>

                            <div class="flex items-center gap-2">

                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#F8EBD9] text-[#593114]">
                                    <i class="bi bi-sliders2 text-xs"></i>
                                </div>

                                <h3 class="text-sm font-black text-[#593114]">
                                    Filtres
                                </h3>

                            </div>

                            <p class="mt-2 text-[9px] text-[#8C8179]">
                                Affinez votre sélection
                            </p>

                        </div>

                        <form method="dialog">

                            <button
                                type="submit"
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-[#F8EBD9] text-[#593114] transition hover:bg-[#EAD8C5]"
                            >
                                <i class="bi bi-x text-sm"></i>
                            </button>

                        </form>

                    </div>

                </div>

                <div class="max-h-[65vh] overflow-y-auto px-5 py-6">

                    <div>

                        <h4 class="mb-4 text-[10px] font-black uppercase tracking-[0.15em] text-[#593114]">
                            Catégorie
                        </h4>

                        <div class="space-y-1">

                            <label
                                class="flex cursor-pointer items-center justify-between rounded-xl px-3 py-3 text-[10px]"
                                :class="category === 'all' ? 'bg-[#F8EBD9]' : ''"
                            >

                                <span class="flex items-center gap-2.5">

                                    <input
                                        type="radio"
                                        value="all"
                                        x-model="category"
                                        class="radio radio-xs border-[#D8C8B8] checked:border-[#E25F12] checked:bg-[#E25F12]"
                                    >

                                    Tous les plats

                                </span>

                                <span
                                    class="text-[9px] text-[#A99D93]"
                                    x-text="products.length"
                                ></span>

                            </label>

                            <template
                                x-for="item in categories"
                                :key="'mobile-' + item.id"
                            >

                                <label
                                    class="flex cursor-pointer items-center justify-between rounded-xl px-3 py-3 text-[10px]"
                                    :class="category === item.slug ? 'bg-[#F8EBD9]' : ''"
                                >

                                    <span class="flex items-center gap-2.5">

                                        <input
                                            type="radio"
                                            :value="item.slug"
                                            x-model="category"
                                            class="radio radio-xs border-[#D8C8B8] checked:border-[#E25F12] checked:bg-[#E25F12]"
                                        >

                                        <span x-text="item.name"></span>

                                    </span>

                                    <span
                                        class="text-[9px] text-[#A99D93]"
                                        x-text="item.products_count"
                                    ></span>

                                </label>

                            </template>

                        </div>

                    </div>

                    <div class="my-6 border-t border-[#E9DED1]"></div>

                    <div>

                        <h4 class="mb-4 text-[10px] font-black uppercase tracking-[0.15em] text-[#593114]">
                            Fourchette de prix
                        </h4>

                        <div class="grid grid-cols-2 gap-3">

                            <input
                                type="number"
                                x-model.number="minPrice"
                                placeholder="Minimum"
                                min="0"
                                class="h-10 w-full rounded-xl border border-[#E8DCCE] bg-white px-3 text-[10px] text-[#593114] outline-none focus:border-[#E25F12] focus:ring-2 focus:ring-[#E25F12]/10"
                            >

                            <input
                                type="number"
                                x-model.number="maxPrice"
                                placeholder="Maximum"
                                min="0"
                                class="h-10 w-full rounded-xl border border-[#E8DCCE] bg-white px-3 text-[10px] text-[#593114] outline-none focus:border-[#E25F12] focus:ring-2 focus:ring-[#E25F12]/10"
                            >

                        </div>

                    </div>

                    <div class="my-6 border-t border-[#E9DED1]"></div>

                    <label class="flex cursor-pointer items-start gap-3 rounded-xl bg-white p-3">

                        <input
                            type="checkbox"
                            x-model="availableOnly"
                            class="checkbox checkbox-xs mt-0.5 rounded border-[#D8C8B8] checked:border-[#E25F12] checked:bg-[#E25F12]"
                        >

                        <span>

                            <span class="block text-[10px] font-semibold text-[#593114]">
                                Plats disponibles uniquement
                            </span>

                            <span class="mt-1 block text-[8px] leading-4 text-[#9B8D82]">
                                Masquer les plats indisponibles
                            </span>

                        </span>

                    </label>

                </div>

                <div class="border-t border-[#E9DED1] bg-white px-5 py-4">

                    <div class="flex gap-3">

                        <button
                            type="button"
                            @click="resetFilters()"
                            class="flex-1 rounded-full border border-[#E8DCCE] bg-white py-3 text-[9px] font-bold text-[#593114] transition hover:border-[#E25F12]"
                        >
                            Réinitialiser
                        </button>

                        <form
                            method="dialog"
                            class="flex-1"
                        >

                            <button
                                type="submit"
                                class="w-full rounded-full bg-[#593114] py-3 text-[9px] font-bold text-white transition hover:bg-[#E25F12]"
                            >
                                Afficher les plats
                            </button>

                        </form>

                    </div>

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

                {{-- ================================================= --}}
                {{-- MODAL HEADER                                      --}}
                {{-- ================================================= --}}

                <div class="relative shrink-0 border-b border-[#EDE1D7] bg-white">

                    {{-- Petite ligne décorative --}}
                    <div class="absolute left-1/2 top-0 h-1 w-14 -translate-x-1/2 rounded-b-full bg-[#E25F12]"></div>

                    <div class="flex items-center justify-between gap-4 px-5 pb-4 pt-5 sm:px-7 sm:pb-5 sm:pt-6">

                        <div class="flex min-w-0 items-center gap-3">

                            {{-- Image produit --}}
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

                    {{-- Prix --}}
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


                {{-- ================================================= --}}
                {{-- CONTENU OPTIONS                                   --}}
                {{-- ================================================= --}}

                <div class="min-h-0 flex-1 overflow-y-auto overscroll-contain px-5 py-5 sm:px-7 sm:py-6">

                    {{-- Erreurs --}}
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

                                    <template x-for="error in customizationErrors" :key="error">

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


                    {{-- Groupes dynamiques --}}
                    <div class="space-y-7">

                        <template
                            x-for="(group, groupIndex) in selectedProduct?.option_groups || []"
                            :key="group.id"
                        >

                            <section>

                                {{-- Header groupe --}}
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
                                                    à
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

                                    {{-- Compteur --}}
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


                                {{-- Choix --}}
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

                                                {{-- Indicateur radio / checkbox --}}
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


                                            {{-- Prix option --}}
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
                                                        + <span x-text="formatPrice(choice.price_modifier)"></span>
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


                {{-- ================================================= --}}
                {{-- FOOTER MODAL                                      --}}
                {{-- ================================================= --}}

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
        {{-- TOAST                                                     --}}
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
            class="toast toast-end toast-bottom z-[9999]"
        >

            <div class="alert rounded-2xl border border-[#E9DED5] bg-white px-4 py-3 text-[#593114] shadow-[0_15px_40px_rgba(89,49,20,0.12)]">

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
        {{-- TOAST ERREUR                                              --}}
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
        {{-- ALPINE.JS                                                 --}}
        {{-- ========================================================= --}}

        <script>

    function dishCatalog() {

        return {

            /*
            |--------------------------------------------------------------------------
            | DONNÉES
            |--------------------------------------------------------------------------
            */

            products: @json($productsData),

            categories: @json($categoriesData),


            /*
            |--------------------------------------------------------------------------
            | FILTRES
            |--------------------------------------------------------------------------
            */

            search: '',

            category: 'all',

            minPrice: null,

            maxPrice: null,

            availableOnly: false,

            sort: 'popular',


            /*
            |--------------------------------------------------------------------------
            | PAGINATION
            |--------------------------------------------------------------------------
            */

            page: 1,

            perPage: 8,


            /*
            |--------------------------------------------------------------------------
            | FAVORIS
            |--------------------------------------------------------------------------
            */

            favorites: [],


            /*
            |--------------------------------------------------------------------------
            | PANIER
            |--------------------------------------------------------------------------
            */

            cartCount: 0,

            showCartToast: false,

            showCartError: false,

            cartErrorMessage: '',


            /*
            |--------------------------------------------------------------------------
            | PERSONNALISATION
            |--------------------------------------------------------------------------
            */

            customizationOpen: false,

            selectedProduct: null,

            selectedOptions: {},

            customizationErrors: [],

            submittingCustomization: false,


            /*
            |--------------------------------------------------------------------------
            | ACTUALISATION AUTOMATIQUE
            |--------------------------------------------------------------------------
            */

            refreshInterval: null,

            refreshingProducts: false,


            /*
            |--------------------------------------------------------------------------
            | INITIALISATION
            |--------------------------------------------------------------------------
            */

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


                /*
                |--------------------------------------------------------------------------
                | COMPTEUR DU PANIER
                |--------------------------------------------------------------------------
                */

                window.addEventListener(
                    'fonkpa-cart-updated',
                    (event) => {

                        if (
                            event.detail &&
                            typeof event.detail.count !== 'undefined'
                        ) {

                            this.cartCount =
                                Number(event.detail.count);

                        }

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | PREMIÈRE SYNCHRONISATION
                |--------------------------------------------------------------------------
                */

                this.refreshProducts();


                /*
                |--------------------------------------------------------------------------
                | ACTUALISATION AUTOMATIQUE
                |--------------------------------------------------------------------------
                |
                | Toutes les 15 secondes.
                |
                | Cela permet de détecter :
                | - nouveau produit
                | - modification du produit
                | - nouvelle image
                | - suppression
                | - disponibilité
                | - prix
                | - options
                |
                |--------------------------------------------------------------------------
                */

                this.refreshInterval = setInterval(() => {

                    this.refreshProducts();

                }, 15000);


                /*
                |--------------------------------------------------------------------------
                | ACTUALISATION QUAND L'UTILISATEUR REVIENT SUR LA PAGE
                |--------------------------------------------------------------------------
                */

                window.addEventListener(
                    'focus',
                    () => {

                        this.refreshProducts();

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | ACTUALISATION QUAND L'ONGLET REDEVient VISIBLE
                |--------------------------------------------------------------------------
                */

                document.addEventListener(
                    'visibilitychange',
                    () => {

                        if (
                            document.visibilityState === 'visible'
                        ) {

                            this.refreshProducts();

                        }

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | NETTOYAGE
                |--------------------------------------------------------------------------
                */

                window.addEventListener(
                    'beforeunload',
                    () => {

                        if (this.refreshInterval) {

                            clearInterval(
                                this.refreshInterval
                            );

                        }

                    }
                );

            },


            /*
            |--------------------------------------------------------------------------
            | SYNCHRONISATION DES PRODUITS
            |--------------------------------------------------------------------------
            */

            async refreshProducts() {

                /*
                |--------------------------------------------------------------------------
                | Évite plusieurs requêtes simultanées
                |--------------------------------------------------------------------------
                */

                if (this.refreshingProducts) {
                    return false;
                }

                this.refreshingProducts = true;


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
                    |--------------------------------------------------------------------------
                    | PRODUITS
                    |--------------------------------------------------------------------------
                    */

                    if (
                        Array.isArray(data.products)
                    ) {

                        /*
                        |--------------------------------------------------------------------------
                        | On conserve le produit actuellement ouvert
                        | dans la modal si nécessaire.
                        |--------------------------------------------------------------------------
                        */

                        const selectedProductId =
                            this.selectedProduct?.id || null;


                        this.products =
                            data.products;


                        /*
                        |--------------------------------------------------------------------------
                        | Si une modal est ouverte, on actualise
                        | également son produit.
                        |--------------------------------------------------------------------------
                        */

                        if (selectedProductId) {

                            const updatedProduct =
                                this.products.find(
                                    (product) =>
                                        Number(product.id) ===
                                        Number(selectedProductId)
                                );


                            if (updatedProduct) {

                                this.selectedProduct =
                                    updatedProduct;

                            }

                        }

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | CATÉGORIES
                    |--------------------------------------------------------------------------
                    */

                    if (
                        Array.isArray(data.categories)
                    ) {

                        this.categories =
                            data.categories;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | SÉCURITÉ PAGINATION
                    |--------------------------------------------------------------------------
                    */

                    if (
                        this.page >
                        this.totalPages
                    ) {

                        this.page =
                            this.totalPages;

                    }


                    return true;


                } catch (error) {

                    console.error(
                        'Impossible d’actualiser les produits FON-KPA :',
                        error
                    );


                    return false;


                } finally {

                    this.refreshingProducts =
                        false;

                }

            },


            /*
            |--------------------------------------------------------------------------
            | PRODUITS FILTRÉS
            |--------------------------------------------------------------------------
            */

            get filteredProducts() {

                let result = [
                    ...this.products
                ];


                if (
                    this.search.trim() !== ''
                ) {

                    const search =
                        this.search
                            .toLowerCase()
                            .trim();


                    result =
                        result.filter(
                            (product) => {

                                const name =
                                    product.name
                                        ? product.name.toLowerCase()
                                        : '';


                                const description =
                                    product.description
                                        ? product.description.toLowerCase()
                                        : '';


                                return (
                                    name.includes(search) ||
                                    description.includes(search)
                                );

                            }
                        );

                }


                if (
                    this.category &&
                    this.category !== 'all'
                ) {

                    result =
                        result.filter(
                            (product) =>
                                product.category ===
                                this.category
                        );

                }


                if (
                    this.minPrice !== null &&
                    this.minPrice !== ''
                ) {

                    result =
                        result.filter(
                            (product) =>
                                Number(product.price) >=
                                Number(this.minPrice)
                        );

                }


                if (
                    this.maxPrice !== null &&
                    this.maxPrice !== ''
                ) {

                    result =
                        result.filter(
                            (product) =>
                                Number(product.price) <=
                                Number(this.maxPrice)
                        );

                }


                if (this.availableOnly) {

                    result =
                        result.filter(
                            (product) =>
                                product.available === true
                        );

                }


                switch (this.sort) {

                    case 'price-low':

                        result.sort(
                            (a, b) =>
                                Number(a.price) -
                                Number(b.price)
                        );

                        break;


                    case 'price-high':

                        result.sort(
                            (a, b) =>
                                Number(b.price) -
                                Number(a.price)
                        );

                        break;


                    case 'name':

                        result.sort(
                            (a, b) =>
                                a.name.localeCompare(
                                    b.name,
                                    'fr'
                                )
                        );

                        break;


                    case 'popular':

                    default:

                        break;

                }


                return result;

            },


            /*
            |--------------------------------------------------------------------------
            | PAGINATION
            |--------------------------------------------------------------------------
            */

            get totalPages() {

                return Math.max(
                    1,
                    Math.ceil(
                        this.filteredProducts.length /
                        this.perPage
                    )
                );

            },


            get paginatedProducts() {

                if (
                    this.page >
                    this.totalPages
                ) {

                    this.page =
                        this.totalPages;

                }


                const start =
                    (this.page - 1) *
                    this.perPage;


                return this.filteredProducts.slice(
                    start,
                    start + this.perPage
                );

            },


            get visiblePages() {

                const pages = [];


                const start =
                    Math.max(
                        1,
                        this.page - 2
                    );


                const end =
                    Math.min(
                        this.totalPages,
                        this.page + 2
                    );


                for (
                    let i = start;
                    i <= end;
                    i++
                ) {

                    pages.push(i);

                }


                return pages;

            },


            /*
            |--------------------------------------------------------------------------
            | PAGINATION ACTIONS
            |--------------------------------------------------------------------------
            */

            goToPage(page) {

                if (
                    page >= 1 &&
                    page <= this.totalPages
                ) {

                    this.page =
                        page;

                    this.scrollToProducts();

                }

            },


            previousPage() {

                if (
                    this.page > 1
                ) {

                    this.page--;

                    this.scrollToProducts();

                }

            },


            nextPage() {

                if (
                    this.page <
                    this.totalPages
                ) {

                    this.page++;

                    this.scrollToProducts();

                }

            },


            scrollToProducts() {

                this.$nextTick(() => {

                    const element =
                        document.getElementById(
                            'products'
                        );


                    if (element) {

                        element.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                    }

                });

            },


            /*
            |--------------------------------------------------------------------------
            | FORMATAGE PRIX
            |--------------------------------------------------------------------------
            */

            formatPrice(price) {

                return new Intl.NumberFormat(
                    'fr-FR'
                ).format(
                    Number(price) || 0
                );

            },


            /*
            |--------------------------------------------------------------------------
            | FAVORIS
            |--------------------------------------------------------------------------
            */

            toggleFavorite(productId) {

                if (
                    this.favorites.includes(
                        productId
                    )
                ) {

                    this.favorites =
                        this.favorites.filter(
                            (id) =>
                                id !== productId
                        );

                } else {

                    this.favorites.push(
                        productId
                    );

                }

            },


            isFavorite(productId) {

                return this.favorites.includes(
                    productId
                );

            },


            /*
            |--------------------------------------------------------------------------
            | PERSONNALISATION
            |--------------------------------------------------------------------------
            */

            hasOptions(product) {

                return (
                    Array.isArray(
                        product.option_groups
                    ) &&
                    product.option_groups.some(
                        (group) =>
                            Array.isArray(
                                group.choices
                            ) &&
                            group.choices.length > 0
                    )
                );

            },


            openCustomization(product) {

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
                    (group) => {

                        this.selectedOptions[
                            group.id
                        ] = [];

                    }
                );


                this.customizationOpen =
                    true;


                document.body.classList.add(
                    'overflow-hidden'
                );

            },


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


            /*
            |--------------------------------------------------------------------------
            | CHOIX OPTION
            |--------------------------------------------------------------------------
            */

            toggleChoice(
                group,
                choiceId
            ) {

                const numericGroupId =
                    Number(group.id);


                const numericChoiceId =
                    Number(choiceId);


                const choice =
                    (
                        group.choices ||
                        []
                    ).find(
                        (item) =>
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


                /*
                |--------------------------------------------------------------------------
                | CHOIX UNIQUE
                |--------------------------------------------------------------------------
                */

                if (
                    Number(group.max_choices) === 1
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


                /*
                |--------------------------------------------------------------------------
                | CHOIX MULTIPLES
                |--------------------------------------------------------------------------
                */

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


            /*
            |--------------------------------------------------------------------------
            | OPTION SÉLECTIONNÉE ?
            |--------------------------------------------------------------------------
            */

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


            /*
            |--------------------------------------------------------------------------
            | COMPTEUR GROUPE
            |--------------------------------------------------------------------------
            */

            groupSelectedCount(group) {

                return (
                    this.selectedOptions[
                        Number(group.id)
                    ] || []
                ).length;

            },


            /*
            |--------------------------------------------------------------------------
            | COMPTEUR OPTIONS
            |--------------------------------------------------------------------------
            */

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


            /*
            |--------------------------------------------------------------------------
            | TOTAL PERSONNALISATION
            |--------------------------------------------------------------------------
            */

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
                    (group) => {

                        const selected =
                            this.selectedOptions[
                                Number(group.id)
                            ] || [];


                        selected.forEach(
                            (choiceId) => {

                                const choice =
                                    (
                                        group.choices ||
                                        []
                                    ).find(
                                        (item) =>
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


            /*
            |--------------------------------------------------------------------------
            | VALIDATION
            |--------------------------------------------------------------------------
            */

            validateCustomization() {

                const errors = [];


                const groups =
                    this.selectedProduct
                        ?.option_groups || [];


                groups.forEach(
                    (group) => {

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


                return errors.length === 0;

            },


            /*
            |--------------------------------------------------------------------------
            | IDS OPTIONS
            |--------------------------------------------------------------------------
            */

            getSelectedChoiceIds() {

                return Object.values(
                    this.selectedOptions
                )
                    .flat()
                    .map(
                        (id) =>
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


            /*
            |--------------------------------------------------------------------------
            | AJOUT PANIER
            |--------------------------------------------------------------------------
            */

            async addToCart(product) {

                if (
                    !product.available
                ) {

                    return;

                }


                if (
                    this.hasOptions(product)
                ) {

                    this.openCustomization(
                        product
                    );


                    return;

                }


                await this.sendToCart(
                    product,
                    []
                );

            },


            /*
            |--------------------------------------------------------------------------
            | ENVOI PANIER
            |--------------------------------------------------------------------------
            */

            async sendToCart(
                product,
                optionIds = []
            ) {

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


                    setTimeout(() => {

                        this.showCartToast =
                            false;

                    }, 2500);


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


                    setTimeout(() => {

                        this.showCartError =
                            false;

                    }, 3500);


                    return false;

                }

            },


            /*
            |--------------------------------------------------------------------------
            | SOUMISSION PERSONNALISATION
            |--------------------------------------------------------------------------
            */

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

                    this.$nextTick(() => {

                        const content =
                            document.querySelector(
                                '[x-show="customizationOpen"] .overflow-y-auto'
                            );


                        if (content) {

                            content.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });

                        }

                    });


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


                if (success) {

                    this.closeCustomization();

                }

            },


            /*
            |--------------------------------------------------------------------------
            | RESET
            |--------------------------------------------------------------------------
            */

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

    </div>

</x-app-layout>