{{-- resources/views/storefront/categories/index.blade.php --}}

<x-app-layout>

    @section('title', 'FON-KPA — Catégories')

    @php
        /*
        |--------------------------------------------------------------------------
        | CONFIGURATION VISUELLE DES CATÉGORIES
        |--------------------------------------------------------------------------
        |
        | Ces informations servent uniquement de complément visuel.
        |
        | L'image de la catégorie provient en priorité de :
        |
        | categories.image
        |
        | donc de l'image définie depuis l'administration.
        |
        | Les images ci-dessous servent uniquement de fallback lorsqu'une
        | catégorie ne possède aucune image en base.
        |
        */

        $categoryVisuals = [

            'plats-ivoiriens' => [
                'image' => 'garba.jpg',
                'description' => 'Les grands classiques de la cuisine ivoirienne, préparés avec authenticité.',
                'eyebrow' => 'L’essentiel',
                'tone' => 'orange',
            ],

            'grillades' => [
                'image' => 'aloco_poulet.jpg',
                'description' => 'Poulets, poissons et viandes braisés avec des saveurs généreuses.',
                'eyebrow' => 'Au feu de bois',
                'tone' => 'brown',
            ],

            'attieke' => [
                'image' => 'garba.jpg',
                'description' => 'L’incontournable accompagnement ivoirien sous toutes ses formes.',
                'eyebrow' => 'Tradition',
                'tone' => 'cream',
            ],

            'riz-sauces' => [
                'image' => 'riz_poulet.png',
                'description' => 'Des recettes généreuses accompagnées de sauces riches en saveurs.',
                'eyebrow' => 'Généreux',
                'tone' => 'cream',
            ],

            'accompagnements' => [
                'image' => 'aloco_poulet.jpg',
                'description' => 'Aloco, attiéké, igname et autres accompagnements pour compléter votre repas.',
                'eyebrow' => 'À côté',
                'tone' => 'gold',
            ],

            'boissons' => [
                'image' => 'Boissons.jpg',
                'description' => 'Des boissons fraîches et naturelles pour accompagner chaque moment.',
                'eyebrow' => 'Rafraîchissant',
                'tone' => 'green',
            ],

            'desserts' => [
                'image' => 'dessert.jpg',
                'description' => 'Une touche sucrée pour terminer votre repas sur une belle note.',
                'eyebrow' => 'Gourmand',
                'tone' => 'pink',
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | FALLBACK
        |--------------------------------------------------------------------------
        |
        | Utilisé uniquement si aucune catégorie provenant de la base
        | n'est disponible.
        |
        */

        $fallbackCategories = [
            [
                'slug' => 'plats-ivoiriens',
                'name' => 'Plats ivoiriens',
                'description' => 'Les grands classiques de la cuisine ivoirienne.',
                'products_count' => 24,
                'image' => 'garba.jpg',
                'eyebrow' => 'L’essentiel',
                'tone' => 'orange',
            ],

            [
                'slug' => 'grillades',
                'name' => 'Grillades',
                'description' => 'Viandes et poissons braisés avec passion.',
                'products_count' => 12,
                'image' => 'aloco_poulet.jpg',
                'eyebrow' => 'Au feu',
                'tone' => 'brown',
            ],

            [
                'slug' => 'attieke',
                'name' => 'Attiéké',
                'description' => 'L’incontournable accompagnement ivoirien.',
                'products_count' => 12,
                'image' => 'garba.jpg',
                'eyebrow' => 'Tradition',
                'tone' => 'cream',
            ],

            [
                'slug' => 'riz-sauces',
                'name' => 'Riz & sauces',
                'description' => 'Des recettes généreuses et savoureuses.',
                'products_count' => 8,
                'image' => 'riz_poulet.png',
                'eyebrow' => 'Généreux',
                'tone' => 'cream',
            ],

            [
                'slug' => 'accompagnements',
                'name' => 'Accompagnements',
                'description' => 'Aloco, attiéké, igname et plus encore.',
                'products_count' => 6,
                'image' => 'aloco_poulet.jpg',
                'eyebrow' => 'À côté',
                'tone' => 'gold',
            ],

            [
                'slug' => 'boissons',
                'name' => 'Boissons',
                'description' => 'Jus naturels, bissap et gingembre.',
                'products_count' => 10,
                'image' => 'bissap.jpg',
                'eyebrow' => 'Frais',
                'tone' => 'green',
            ],

            [
                'slug' => 'desserts',
                'name' => 'Desserts',
                'description' => 'De délicieuses douceurs pour terminer le repas.',
                'products_count' => 6,
                'image' => 'dessert.jpg',
                'eyebrow' => 'Gourmand',
                'tone' => 'pink',
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | NORMALISATION DES CATÉGORIES
        |--------------------------------------------------------------------------
        |
        | Les catégories provenant de la base sont transformées dans une
        | structure homogène utilisée par toute la vue.
        |
        | IMPORTANT :
        |
        | $category->storefront_image vient du CategoryController.
        |
        | Cette valeur correspond à :
        |
        | categories.image
        |
        | et non à l'image d'un produit.
        |
        */

        $hasDatabaseCategories = isset($categories) && $categories->isNotEmpty();

        if ($hasDatabaseCategories) {

            $categoryItems = collect($categories)
                ->map(function ($category) use ($categoryVisuals) {

                    $slug = $category->slug
                        ?? \Illuminate\Support\Str::slug($category->name);

                    $visual = $categoryVisuals[$slug] ?? [
                        'image' => 'garba.jpg',
                        'description' => 'Découvrez notre sélection de recettes préparées avec soin.',
                        'eyebrow' => 'Notre sélection',
                        'tone' => 'cream',
                    ];

                    /*
                    |--------------------------------------------------------------------------
                    | IMAGE DE LA CATÉGORIE
                    |--------------------------------------------------------------------------
                    |
                    | Priorité :
                    |
                    | 1. Image définie dans l'administration
                    | 2. Image visuelle de fallback
                    |
                    | Le CategoryController prépare déjà :
                    |
                    | $category->storefront_image
                    |
                    | sous forme d'une URL directement utilisable par le navigateur.
                    |
                    */

                    $image = $category->storefront_image
                        ?? (
                            !empty($visual['image'])
                                ? asset('images/' . $visual['image'])
                                : null
                        );

                    return [
                        'id' => $category->id ?? null,

                        'slug' => $slug,

                        'name' => $category->name,

                        'description' => $category->description
                            ?: $visual['description'],

                        'products_count' => $category->products_count ?? 0,

                        'image' => $image,

                        'eyebrow' => $visual['eyebrow'],

                        'tone' => $visual['tone'] ?? 'cream',
                    ];
                })
                ->values()
                ->all();

        } else {

            $categoryItems = $fallbackCategories;
        }

        /*
        |--------------------------------------------------------------------------
        | CATÉGORIE MISE EN AVANT
        |--------------------------------------------------------------------------
        */

        $featuredCategory = $categoryItems[0] ?? null;

        /*
        |--------------------------------------------------------------------------
        | CATÉGORIES SECONDAIRES
        |--------------------------------------------------------------------------
        */

        $secondaryCategories = collect($categoryItems)
            ->skip(1)
            ->values();

        /*
        |--------------------------------------------------------------------------
        | TOTAL DES PRODUITS
        |--------------------------------------------------------------------------
        */

        $totalProducts = collect($categoryItems)
            ->sum('products_count');
    @endphp


    <div
        x-data="categoryCatalog()"
        x-init="init()"
        class="min-h-screen overflow-hidden bg-[#FCFAF7] text-[#3D1F0D]"
    >

        {{-- ============================================================
             HERO
        ============================================================= --}}

        <section class="relative overflow-hidden lg:mt-10">

            {{-- Décors très subtils --}}

            <div
                class="pointer-events-none absolute -left-40 top-10 h-80 w-80 rounded-full bg-[#F4C451]/10 blur-3xl"
            ></div>

            <div
                class="pointer-events-none absolute -right-48 top-0 h-[500px] w-[500px] rounded-full bg-[#E25F12]/[0.045] blur-3xl"
            ></div>


            <div
                class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]"
            >

                <div
                    class="grid min-h-[500px] items-center gap-12 py-16 sm:py-20 lg:grid-cols-[1fr_0.85fr] lg:gap-16 lg:py-24"
                >

                    {{-- ==================================================
                         TEXTE HERO
                    =================================================== --}}

                    <div class="relative z-10 max-w-2xl">

                        <div class="flex items-center gap-3">

                            <span
                                class="inline-flex items-center gap-2 rounded-full border border-[#E9DED5] bg-white px-4 py-2 text-[9px] font-bold uppercase tracking-[0.2em] text-[#E25F12] shadow-sm"
                            >
                                <i class="bi bi-grid"></i>

                                Notre carte
                            </span>

                            <span class="hidden h-px w-10 bg-[#E3D6CC] sm:block"></span>

                            <span
                                class="hidden text-[9px] font-medium uppercase tracking-[0.18em] text-[#9A8B81] sm:block"
                            >
                                Cuisine ivoirienne
                            </span>

                        </div>


                        <h1
                            class="mt-7 max-w-[680px] text-[3rem] font-black leading-[0.96] tracking-[-0.06em] text-[#3B200F] sm:text-[4.5rem] lg:text-[5.2rem]"
                        >
                            Explorez

                            <span class="text-[#E25F12]">
                                nos saveurs.
                            </span>
                        </h1>


                        <p
                            class="mt-7 max-w-xl text-sm leading-7 text-[#756960] sm:text-[15px]"
                        >
                            Des recettes ivoiriennes généreuses, des grillades
                            savoureuses et des accompagnements qui racontent
                            notre cuisine.

                            <span class="font-semibold text-[#593114]">
                                Choisissez une catégorie et laissez-vous guider.
                            </span>
                        </p>


                        {{-- STATS --}}

                        <div
                            class="mt-9 flex flex-wrap items-center gap-x-7 gap-y-4"
                        >

                            <div>

                                <p
                                    class="text-xl font-black tracking-tight text-[#593114]"
                                >
                                    {{ $totalProducts }}
                                </p>

                                <p
                                    class="mt-0.5 text-[9px] uppercase tracking-[0.14em] text-[#9A8B81]"
                                >
                                    Plats disponibles
                                </p>

                            </div>


                            <div class="h-8 w-px bg-[#E5DAD1]"></div>


                            <div>

                                <p
                                    class="text-xl font-black tracking-tight text-[#593114]"
                                >
                                    {{ count($categoryItems) }}
                                </p>

                                <p
                                    class="mt-0.5 text-[9px] uppercase tracking-[0.14em] text-[#9A8B81]"
                                >
                                    Catégories
                                </p>

                            </div>


                            <div class="h-8 w-px bg-[#E5DAD1]"></div>


                            <div class="flex items-center gap-2">

                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-[#F8EBD9] text-[#593114]"
                                >
                                    <i class="bi bi-truck text-xs"></i>
                                </div>

                                <div>

                                    <p
                                        class="text-[10px] font-bold text-[#593114]"
                                    >
                                        Livraison rapide
                                    </p>

                                    <p
                                        class="text-[8px] text-[#9A8B81]"
                                    >
                                        Abidjan
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- CTA --}}

                        <div class="mt-9 flex flex-col gap-3 sm:flex-row">

                            <a
                                href="#categories"
                                class="btn h-12 min-h-12 rounded-full border-0 bg-[#593114] px-7 text-[10px] font-bold text-white shadow-lg shadow-[#593114]/10 transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#E25F12]"
                            >
                                Explorer les catégories

                                <i class="bi bi-arrow-down ml-1"></i>
                            </a>


                            <a
                                href="{{ route('plats.index') }}"
                                class="btn h-12 min-h-12 rounded-full border border-[#E4D8CF] bg-white px-7 text-[10px] font-semibold text-[#593114] shadow-none transition-all duration-300 hover:border-[#593114] hover:bg-white"
                            >
                                Voir tous les plats

                                <i class="bi bi-arrow-up-right ml-1"></i>
                            </a>

                        </div>

                    </div>


                    {{-- ==================================================
                         VISUEL HERO
                    =================================================== --}}

                    <div
                        class="relative flex min-h-[380px] items-center justify-center lg:min-h-[470px]"
                    >

                        {{-- Cercle arrière --}}

                        <div
                            class="absolute h-[300px] w-[300px] rounded-full bg-[#F4E6D4] sm:h-[400px] sm:w-[400px] lg:h-[470px] lg:w-[470px]"
                        ></div>


                        <div
                            class="absolute h-[250px] w-[250px] rounded-full border border-[#E4D3C4] sm:h-[330px] sm:w-[330px] lg:h-[390px] lg:w-[390px]"
                        ></div>


                        {{-- Image principale --}}

                        @if($featuredCategory)

                            <div
                                class="relative z-10 h-[290px] w-[290px] sm:h-[380px] sm:w-[380px] lg:h-[430px] lg:w-[430px]"
                            >

                                <img
                                    src="{{ asset('images/Hero5.png') }}"
                                    alt="Attiéké"
                                    class="h-full w-full object-cover"
                                >

                            </div>

                        @endif


                        {{-- Floating card --}}

                        <div
                            class="absolute bottom-2 left-0 z-20 rounded-2xl border border-[#E9DED5] bg-white/95 p-3 shadow-xl backdrop-blur-sm sm:bottom-8 sm:left-4"
                        >

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#593114] text-white"
                                >
                                    <i class="bi bi-stars text-sm"></i>
                                </div>

                                <div>

                                    <p
                                        class="text-[8px] uppercase tracking-[0.16em] text-[#9A8B81]"
                                    >
                                        Chez FON-KPA
                                    </p>

                                    <p
                                        class="mt-0.5 text-[10px] font-black text-[#593114]"
                                    >
                                        Le goût de chez nous.
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Floating badge --}}

                        <div
                            class="absolute right-0 top-8 z-20 hidden rounded-full border border-[#E9DED5] bg-white px-4 py-2.5 shadow-lg sm:block"
                        >

                            <div class="flex items-center gap-2">

                                <span
                                    class="h-2 w-2 rounded-full bg-[#E25F12]"
                                ></span>

                                <span
                                    class="text-[8px] font-bold uppercase tracking-[0.14em] text-[#6F625A]"
                                >
                                    100% ivoirien
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- ============================================================
             BARRE DE NAVIGATION RAPIDE
        ============================================================= --}}

        <section class="border-y border-[#EEE4DB] bg-white">

            <div
                class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]"
            >

                <div
                    class="flex gap-2 overflow-x-auto py-4 scrollbar-none"
                >

                    @foreach($categoryItems as $category)

                        <a
                            href="{{ route('plats.index', ['category' => $category['slug']]) }}"
                            class="group flex shrink-0 items-center gap-2 rounded-full border border-[#E9DED5] bg-[#FCFAF7] px-4 py-2.5 transition-all duration-200 hover:border-[#E25F12] hover:bg-white"
                        >

                            <span
                                class="flex h-6 w-6 items-center justify-center rounded-full bg-white text-[#593114] shadow-sm transition-colors group-hover:bg-[#593114] group-hover:text-white"
                            >
                                <i class="bi bi-grid-3x3-gap text-[9px]"></i>
                            </span>

                            <span
                                class="whitespace-nowrap text-[9px] font-bold text-[#695D55] group-hover:text-[#593114]"
                            >
                                {{ $category['name'] }}
                            </span>

                        </a>

                    @endforeach

                </div>

            </div>

        </section>


        {{-- ============================================================
             CATÉGORIES PRINCIPALES
        ============================================================= --}}

        <section
            id="categories"
            class="bg-white py-20 sm:py-24"
        >

            <div
                class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]"
            >

                {{-- HEADER SECTION --}}

                <div
                    class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end"
                >

                    <div class="max-w-2xl">

                        <span
                            class="text-[9px] font-bold uppercase tracking-[0.25em] text-[#E25F12]"
                        >
                            Explorez par envie
                        </span>

                        <h2
                            class="mt-2 text-3xl font-black tracking-[-0.045em] text-[#3B200F] sm:text-4xl"
                        >
                            Nos catégories
                        </h2>

                        <p
                            class="mt-3 max-w-xl text-xs leading-6 text-[#887A70] sm:text-sm"
                        >
                            Chaque catégorie rassemble une sélection pensée
                            pour vous permettre de trouver rapidement ce qui
                            vous fait envie.
                        </p>

                    </div>


                    <div
                        class="hidden items-center gap-2 text-[9px] font-semibold text-[#9A8B81] sm:flex"
                    >

                        <i class="bi bi-arrow-down-right text-[#E25F12]"></i>

                        Choisissez votre univers

                    </div>

                </div>


                {{-- =====================================================
                     FEATURED CATEGORY
                ====================================================== --}}

                @if($featuredCategory)

                    <div class="mt-10">

                        <a
                            href="{{ route('plats.index', ['category' => $featuredCategory['slug']]) }}"
                            class="group relative block min-h-[430px] overflow-hidden rounded-[2rem] bg-[#593114]"
                        >

                            {{-- IMAGE DE LA CATÉGORIE --}}

                            <img
                                src="{{ $featuredCategory['image'] }}"
                                alt="{{ $featuredCategory['name'] }}"
                                class="absolute inset-0 h-full w-full object-cover opacity-90 transition-transform duration-700 ease-out group-hover:scale-[1.035]"
                            >


                            {{-- Overlay --}}

                            <div
                                class="absolute inset-0 bg-gradient-to-r from-[#241106]/90 via-[#241106]/55 to-transparent"
                            ></div>

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#241106]/70 via-transparent to-transparent"
                            ></div>


                            {{-- Contenu --}}

                            <div
                                class="relative z-10 flex min-h-[430px] max-w-xl flex-col justify-end p-7 sm:p-10 lg:p-12"
                            >

                                <span
                                    class="w-fit rounded-full bg-[#E25F12] px-3 py-1.5 text-[8px] font-bold uppercase tracking-[0.15em] text-white"
                                >
                                    {{ $featuredCategory['eyebrow'] }}
                                </span>


                                <h3
                                    class="mt-4 text-3xl font-black tracking-[-0.04em] text-white sm:text-4xl"
                                >
                                    {{ $featuredCategory['name'] }}
                                </h3>


                                <p
                                    class="mt-3 max-w-md text-xs leading-6 text-white/75 sm:text-sm"
                                >
                                    {{ $featuredCategory['description'] }}
                                </p>


                                <div
                                    class="mt-6 flex flex-wrap items-center gap-4"
                                >

                                    <span
                                        class="text-[10px] font-medium text-white/65"
                                    >
                                        {{ $featuredCategory['products_count'] }}
                                        plats disponibles
                                    </span>


                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-white px-5 py-2.5 text-[9px] font-bold text-[#593114] transition-all duration-300 group-hover:bg-[#E25F12] group-hover:text-white"
                                    >
                                        Découvrir

                                        <i
                                            class="bi bi-arrow-up-right transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5"
                                        ></i>
                                    </span>

                                </div>

                            </div>


                            {{-- Index --}}

                            <span
                                class="absolute right-7 top-7 text-[10px] font-bold text-white/50 sm:right-10 sm:top-10"
                            >
                                01
                            </span>

                        </a>

                    </div>

                @endif


                {{-- =====================================================
                     GRILLE SECONDAIRE
                ====================================================== --}}

                @if($secondaryCategories->count())

                    <div
                        class="mt-5 grid gap-5 sm:grid-cols-2 lg:grid-cols-3"
                    >

                        @foreach($secondaryCategories as $index => $category)

                            <a
                                href="{{ route('plats.index', ['category' => $category['slug']]) }}"
                                class="group relative overflow-hidden rounded-[1.5rem] border border-[#EDE3DB] bg-[#FCFAF7] transition-all duration-300 hover:-translate-y-1 hover:border-[#E4D3C4] hover:shadow-[0_20px_50px_rgba(89,49,20,0.08)]"
                            >

                                {{-- Image --}}

                                <div
                                    class="relative h-[245px] overflow-hidden"
                                >

                                    {{-- IMAGE DE LA CATÉGORIE --}}

                                    <img
                                        src="{{ $category['image'] }}"
                                        alt="{{ $category['name'] }}"
                                        class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                                        loading="lazy"
                                    >


                                    {{-- Image overlay --}}

                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-[#2B1609]/45 via-transparent to-transparent"
                                    ></div>


                                    {{-- Numéro --}}

                                    <span
                                        class="absolute right-4 top-4 flex h-8 w-8 items-center justify-center rounded-full border border-white/30 bg-black/10 text-[8px] font-bold text-white backdrop-blur-md"
                                    >
                                        {{ str_pad($index + 2, 2, '0', STR_PAD_LEFT) }}
                                    </span>


                                    {{-- Nombre --}}

                                    <span
                                        class="absolute bottom-4 left-4 rounded-full bg-white/95 px-3 py-1.5 text-[8px] font-bold text-[#593114] shadow-sm backdrop-blur-sm"
                                    >
                                        {{ $category['products_count'] }}
                                        plats
                                    </span>

                                </div>


                                {{-- Content --}}

                                <div class="p-5">

                                    <div
                                        class="flex items-start justify-between gap-4"
                                    >

                                        <div>

                                            <span
                                                class="text-[8px] font-bold uppercase tracking-[0.18em] text-[#E25F12]"
                                            >
                                                {{ $category['eyebrow'] }}
                                            </span>

                                            <h3
                                                class="mt-1.5 text-lg font-black tracking-[-0.025em] text-[#593114]"
                                            >
                                                {{ $category['name'] }}
                                            </h3>

                                        </div>


                                        <span
                                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-[#E7DBD2] bg-white text-[#593114] transition-all duration-300 group-hover:border-[#593114] group-hover:bg-[#593114] group-hover:text-white"
                                        >

                                            <i
                                                class="bi bi-arrow-up-right text-xs"
                                            ></i>

                                        </span>

                                    </div>


                                    <p
                                        class="mt-2 max-w-sm text-[10px] leading-5 text-[#897B72]"
                                    >
                                        {{ $category['description'] }}
                                    </p>


                                    <div
                                        class="mt-5 flex items-center justify-between border-t border-[#EEE5DE] pt-4"
                                    >

                                        <span
                                            class="text-[9px] font-medium text-[#9A8B81]"
                                        >
                                            Découvrir la sélection
                                        </span>

                                        <i
                                            class="bi bi-arrow-right text-[10px] text-[#E25F12] transition-transform duration-300 group-hover:translate-x-1"
                                        ></i>

                                    </div>

                                </div>

                            </a>

                        @endforeach

                    </div>

                @endif

            </div>

        </section>


        {{-- ============================================================
             SECTION "CHOISISSEZ SELON VOTRE ENVIE"
        ============================================================= --}}

        <section
            class="bg-[#FCFAF7] py-20 sm:py-24"
        >

            <div
                class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]"
            >

                <div
                    class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:items-center lg:gap-20"
                >

                    {{-- TEXTE --}}

                    <div class="max-w-xl">

                        <span
                            class="text-[9px] font-bold uppercase tracking-[0.25em] text-[#E25F12]"
                        >
                            Besoin d'inspiration ?
                        </span>


                        <h2
                            class="mt-3 text-3xl font-black leading-[1.05] tracking-[-0.045em] text-[#3B200F] sm:text-4xl"
                        >
                            Choisissez selon

                            <span class="text-[#E25F12]">
                                votre envie.
                            </span>
                        </h2>


                        <p
                            class="mt-5 max-w-md text-xs leading-6 text-[#887A70] sm:text-sm"
                        >
                            Vous savez ce que vous voulez ?
                            Retrouvez rapidement les plats qui correspondent
                            à votre moment.
                        </p>


                        <a
                            href="{{ route('plats.index') }}"
                            class="btn mt-7 h-11 min-h-11 rounded-full border-0 bg-[#593114] px-6 text-[10px] font-bold text-white transition-all duration-300 hover:bg-[#E25F12]"
                        >
                            Voir le menu complet

                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>


                    {{-- OPTIONS --}}

                    <div
                        class="grid grid-cols-2 gap-3 sm:grid-cols-4"
                    >

                        {{-- Tradition --}}

                        <a
                            href="{{ route('plats.index') }}"
                            class="group flex min-h-[190px] flex-col justify-between rounded-[1.5rem] border border-[#E9DED5] bg-white p-5 transition-all duration-300 hover:-translate-y-1 hover:border-[#DCC8B8] hover:shadow-lg"
                        >

                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F8EBD9] text-[#593114]"
                            >
                                <i class="bi bi-heart text-sm"></i>
                            </div>


                            <div>

                                <h3
                                    class="text-sm font-black text-[#593114]"
                                >
                                    Tradition
                                </h3>

                                <p
                                    class="mt-1 text-[9px] leading-4 text-[#9A8B81]"
                                >
                                    Les saveurs de chez nous.
                                </p>

                            </div>

                        </a>


                        {{-- Grillade --}}

                        <a
                            href="{{ route('plats.index') }}"
                            class="group flex min-h-[190px] flex-col justify-between rounded-[1.5rem] border border-[#E9DED5] bg-white p-5 transition-all duration-300 hover:-translate-y-1 hover:border-[#DCC8B8] hover:shadow-lg"
                        >

                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#FDE9E0] text-[#D75B31]"
                            >
                                <i class="bi bi-fire text-sm"></i>
                            </div>


                            <div>

                                <h3
                                    class="text-sm font-black text-[#593114]"
                                >
                                    Grillades
                                </h3>

                                <p
                                    class="mt-1 text-[9px] leading-4 text-[#9A8B81]"
                                >
                                    Braisé, grillé, généreux.
                                </p>

                            </div>

                        </a>


                        {{-- Frais --}}

                        <a
                            href="{{ route('plats.index') }}"
                            class="group flex min-h-[190px] flex-col justify-between rounded-[1.5rem] border border-[#E9DED5] bg-white p-5 transition-all duration-300 hover:-translate-y-1 hover:border-[#DCC8B8] hover:shadow-lg"
                        >

                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E5F2E8] text-[#4A7956]"
                            >
                                <i class="bi bi-droplet text-sm"></i>
                            </div>


                            <div>

                                <h3
                                    class="text-sm font-black text-[#593114]"
                                >
                                    Fraîcheur
                                </h3>

                                <p
                                    class="mt-1 text-[9px] leading-4 text-[#9A8B81]"
                                >
                                    Boissons et accompagnements.
                                </p>

                            </div>

                        </a>


                        {{-- Gourmand --}}

                        <a
                            href="{{ route('plats.index') }}"
                            class="group flex min-h-[190px] flex-col justify-between rounded-[1.5rem] border border-[#E9DED5] bg-white p-5 transition-all duration-300 hover:-translate-y-1 hover:border-[#DCC8B8] hover:shadow-lg"
                        >

                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#FFF2D8] text-[#A56D12]"
                            >
                                <i class="bi bi-stars text-sm"></i>
                            </div>


                            <div>

                                <h3
                                    class="text-sm font-black text-[#593114]"
                                >
                                    Gourmand
                                </h3>

                                <p
                                    class="mt-1 text-[9px] leading-4 text-[#9A8B81]"
                                >
                                    Pour finir en douceur.
                                </p>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </section>


        {{-- ============================================================
             BLOC CONFIANCE
        ============================================================= --}}

        <section
            class="border-y border-[#EEE4DB] bg-white"
        >

            <div
                class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]"
            >

                <div
                    class="grid divide-y divide-[#EEE4DB] sm:grid-cols-3 sm:divide-x sm:divide-y-0"
                >

                    {{-- Qualité --}}

                    <div class="flex items-center gap-4 py-7 sm:px-8 lg:px-10">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#F8EBD9] text-[#593114]"
                        >
                            <i class="bi bi-patch-check-fill text-sm"></i>
                        </div>

                        <div>

                            <p
                                class="text-[10px] font-black text-[#593114]"
                            >
                                Des produits sélectionnés
                            </p>

                            <p
                                class="mt-1 text-[8px] leading-4 text-[#9A8B81]"
                            >
                                Une attention portée à la qualité.
                            </p>

                        </div>

                    </div>


                    {{-- Livraison --}}

                    <div class="flex items-center gap-4 py-7 sm:px-8 lg:px-10">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#F8EBD9] text-[#593114]"
                        >
                            <i class="bi bi-truck text-sm"></i>
                        </div>

                        <div>

                            <p
                                class="text-[10px] font-black text-[#593114]"
                            >
                                Livraison à Abidjan
                            </p>

                            <p
                                class="mt-1 text-[8px] leading-4 text-[#9A8B81]"
                            >
                                Commandez simplement depuis chez vous.
                            </p>

                        </div>

                    </div>


                    {{-- Cuisine --}}

                    <div class="flex items-center gap-4 py-7 sm:px-8 lg:px-10">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#F8EBD9] text-[#593114]"
                        >
                            <i class="bi bi-stars text-sm"></i>
                        </div>

                        <div>

                            <p
                                class="text-[10px] font-black text-[#593114]"
                            >
                                Saveurs authentiques
                            </p>

                            <p
                                class="mt-1 text-[8px] leading-4 text-[#9A8B81]"
                            >
                                Une cuisine inspirée de nos traditions.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- ============================================================
             CTA FINAL
        ============================================================= --}}

        <section class="bg-[#FCFAF7] py-16 sm:py-20">

            <div
                class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)]"
            >

                <div
                    class="relative overflow-hidden rounded-[2.25rem] bg-[#F6E6D2]"
                >

                    {{-- Décors --}}

                    <div
                        class="pointer-events-none absolute -left-24 -top-24 h-64 w-64 rounded-full bg-white/50 blur-3xl"
                    ></div>

                    <div
                        class="pointer-events-none absolute -bottom-32 -right-10 h-80 w-80 rounded-full bg-[#E25F12]/10 blur-3xl"
                    ></div>


                    <div
                        class="relative grid items-center gap-8 lg:grid-cols-[1fr_auto]"
                    >

                        {{-- Texte --}}

                        <div class="px-7 py-12 sm:px-10 sm:py-14 lg:px-14">

                            <span
                                class="text-[9px] font-bold uppercase tracking-[0.25em] text-[#E25F12]"
                            >
                                Une envie précise ?
                            </span>


                            <h2
                                class="mt-3 max-w-xl text-3xl font-black leading-[1.05] tracking-[-0.045em] text-[#3B200F] sm:text-4xl"
                            >
                                Retrouvez votre plat préféré

                                <span class="text-[#E25F12]">
                                    en quelques clics.
                                </span>
                            </h2>


                            <p
                                class="mt-4 max-w-lg text-xs leading-6 text-[#786A60] sm:text-sm"
                            >
                                Parcourez notre menu, choisissez votre plat
                                et commandez directement depuis FON-KPA.
                            </p>


                            <a
                                href="{{ route('plats.index') }}"
                                class="btn mt-7 h-11 min-h-11 rounded-full border-0 bg-[#593114] px-6 text-[10px] font-bold text-white shadow-lg shadow-[#593114]/10 transition-all duration-300 hover:bg-[#E25F12]"
                            >
                                Explorer le menu

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

    </div>

</x-app-layout>