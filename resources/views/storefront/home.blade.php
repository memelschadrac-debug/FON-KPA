@extends('layouts.storefront')

@section('title', 'FON-KPA — Accueil ')

@section('content')

    <section
    class="relative bg-[#FBF9F8] mx-auto max-w-7xl overflow-hidden px-4 py-12 sm:px-6 sm:py-16 lg:min-h-[600px] lg:px-8 lg:py-24"
>
    <!-- Image -->
    <div
        class="absolute inset-0 -z-0 bg-cover bg-center bg-no-repeat opacity-20 lg:inset-y-0 lg:right-0 lg:left-auto lg:w-1/2 lg:opacity-100"
        style="background-image: url('{{ asset('images/Hero1.png') }}'); background-size: 90%; background-repeat: no-repeat; background-position: right center;"
    ></div>
        
    <!-- Contenu -->
    <div class="relative z-10 flex min-h-[500px] items-center lg:min-h-[500px]">

        <div class="w-full max-w-xl lg:w-1/2">

            <!-- Petit texte -->
            <p class="mb-2 py-2 text-xs font-medium text-[#E25F12] sm:text-sm">
                LA CUISINE IVOIRIENNE AUTREMENT
            </p>

            <!-- Titre -->
            <h1
                class="max-w-xl text-3xl font-bold leading-[1.1] tracking-tight text-[#593114] sm:text-4xl md:text-5xl lg:text-6xl"
            >
                Les saveurs de la Côte d'Ivoire,
                directement dans votre assiette.
            </h1>

            <!-- Description -->
            <p
                class="mt-4 max-w-lg py-2 text-sm font-light leading-6 text-gray-500 sm:text-base"
            >
                Découvrez l'authenticité et la richesse de la gastronomie
                ivoirienne. Des plats préparés avec passion, livrés chauds
                chez vous.
            </p>

            <!-- Boutons -->
            <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:items-center">

                <!-- Bouton principal -->
                <a
                    href="{{ route('plats.index') }}"
                    role="button"
                    class="btn w-full rounded-md border-[#B84D00] bg-[#B84D00] px-5 py-2 font-medium text-white
                        shadow-md shadow-[#B84D00]/20
                        transition-all duration-300
                        hover:-translate-y-0.5
                        hover:border-[#A94400]
                        hover:bg-[#A94400]
                        hover:shadow-lg
                        sm:w-auto"
                >
                    Découvrir nos plats
                </a>

                <!-- Bouton secondaire -->
                <a
                    href="{{ route('categories.index') }}"
                    role="button"
                    class="btn w-full rounded-md border border-[#B84D00] bg-[#FBF9F8] px-5 py-2 font-medium text-[#B84D00]
                        transition-all duration-300
                        hover:-translate-y-0.5
                        hover:bg-[#FBF9F8]
                        hover:shadow-md
                        sm:w-auto"
                >
                    Voir les catégories
                </a>
                
            </div>

        </div>
    </div>
</section>

<section class="bg-[#FFFF] py-16 sm:py-20 lg:py-24">
    <div class="mx-auto w-full max-w-7xl px-6 sm:px-10 lg:px-16 xl:px-20">

        <!-- Titre -->
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-semibold tracking-tight text-[#593114] sm:text-4xl lg:text-5xl">
                Découvrez nos catégories
            </h2>

            <p class="mt-3 text-sm leading-6 text-[#6B625D] sm:text-base">
                Explorez notre menu varié pour tous les goûts.
            </p>
        </div>


        <!-- Cards -->
        <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

            <!-- Card 1 -->
            <div
                class="group relative overflow-hidden rounded-2xl
                    border border-[#EAD8C5] bg-white
                    px-5 py-4 text-center
                    shadow-sm
                    transition-all duration-300
                    hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                    <img
                        src="{{ asset('images/healthy-meal.gif') }}"
                        alt="Plats ivoiriens"
                        class="h-20 w-20 object-contain"
                    />
                </div>

                <h3 class="mt-5 text-lg font-semibold text-[#593114]">
                    Plats ivoiriens
                </h3>

                <p class="mx-auto mt-2 max-w-xs text-sm leading-6 text-[#6B625D]">
                    Découvrez nos plats traditionnels préparés avec des ingrédients frais.
                </p>

            </div>


            <!-- Card 2 -->
            <div
                class="group relative overflow-hidden rounded-2xl
                    border border-[#EAD8C5] bg-white
                    px-5 py-4 text-center
                    shadow-sm
                    transition-all duration-300
                    hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                    <img
                        src="{{ asset('images/roasted-turkey.gif') }}"
                        alt="Grillades"
                        class="h-20 w-20 object-contain"
                    />
                </div>

                <h3 class="mt-5 text-lg font-semibold text-[#593114]">
                    Grillades
                </h3>

                <p class="mx-auto mt-2 max-w-xs text-sm leading-6 text-[#6B625D]">
                    Retrouvez nos meilleures grillades préparées avec soin et passion.
                </p>

            </div>


            <!-- Card 3 -->
            <div
                class="group relative overflow-hidden rounded-2xl
                    border border-[#EAD8C5] bg-white
                    px-5 py-4 text-center
                    shadow-sm
                    transition-all duration-300
                    hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                    <img
                        src="{{ asset('images/cloche.gif') }}"
                        alt="Accompagnements"
                        class="h-20 w-20 object-contain"
                    />
                </div>

                <h3 class="mt-5 text-lg font-semibold text-[#593114]">
                    Accompagnements
                </h3>

                <p class="mx-auto mt-2 max-w-xs text-sm leading-6 text-[#6B625D]">
                    Complétez votre repas avec nos délicieux accompagnements ivoiriens.
                </p>

            </div>


            <!-- Card 4 -->
            <div
                class="group relative overflow-hidden rounded-2xl
                    border border-[#EAD8C5] bg-white
                    px-5 py-4 text-center
                    shadow-sm
                    transition-all duration-300
                    hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                    <img
                        src="{{ asset('images/juice-drink.gif') }}"
                        alt="Boissons"
                        class="h-20 w-20 object-contain"
                    />
                </div>

                <h3 class="mt-5 text-lg font-semibold text-[#593114]">
                    Boissons
                </h3>

                <p class="mx-auto mt-2 max-w-xs text-sm leading-6 text-[#6B625D]">
                    Rafraîchissez-vous avec notre sélection de boissons locales.
                </p>

            </div>

        </div>
        
    </div>
</section>

<!-- Plats populaires -->
<section class="bg-[#FFFF] py-12 sm:py-16 lg:py-24">
   <div class="mx-auto w-full max-w-7xl px-6 sm:px-10 lg:px-16 xl:px-20">

    {{-- En-tête --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

        <div class="max-w-xl">
            <h2 class="text-3xl font-semibold tracking-tight text-[#593114] sm:text-4xl">
                Plats Populaires
            </h2>

            <p class="mt-2 text-sm leading-6 text-[#6B625D] sm:text-base">
                Nos best-sellers plébiscités par nos clients.
            </p>
        </div>

        <a
            href="#"
            class="group inline-flex items-center gap-2
                text-sm font-semibold text-[#593114]
                transition-colors duration-200
                hover:text-[#E25F12]"
        >
            En savoir plus

            <span
                class="flex h-7 w-7 items-center justify-center
                    rounded-full bg-[#F4EAE1]
                    transition-transform duration-200
                    group-hover:translate-x-1"
            >
                <svg
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-4 w-4"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"
                    />
                </svg>
            </span>
        </a>

    </div>


    {{-- Grille des cartes --}}
    <div class="mt-8 grid grid-cols-1 gap-5 sm:mt-10 sm:grid-cols-2 lg:grid-cols-3">

        {{-- CARD 1 --}}
        <article
            class="group w-full overflow-hidden rounded-2xl
                   bg-white shadow-sm
                   transition-shadow duration-300
                   hover:shadow-lg"
        >

            {{-- Image --}}
            <figure class="relative h-52 overflow-hidden">

                <img
                    src="{{ asset('images/garba.jpg') }}"
                    alt="Garba Royal"
                    class="h-full w-full object-cover
                           transition-transform duration-500 ease-out
                           group-hover:scale-105"
                >

                {{-- Badge --}}
                <span
                    class="absolute left-3 top-3 rounded-full
                           bg-[#F5B82E] px-3 py-1
                           text-xs font-semibold text-[#593114]"
                >
                    Best Seller
                </span>

                {{-- Favoris --}}
                <button
                    type="button"
                    aria-label="Ajouter aux favoris"
                    class="absolute right-3 top-3 flex h-8 w-8
                           items-center justify-center rounded-full
                           bg-white/90 text-[#593114]
                           shadow-sm backdrop-blur
                           transition-transform duration-200
                           hover:scale-110"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-4.5 w-4.5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                               -1.935 0-3.597 1.126-4.312 2.733
                               C11.285 4.876 9.623 3.75 7.688 3.75
                               5.099 3.75 3 5.765 3 8.25
                               c0 7.22 9 12 9 12s9-4.78 9-12Z"
                        />
                    </svg>
                </button>

            </figure>


            {{-- Contenu --}}
            <div class="bg-[#F8EBD9] p-4 sm:p-5">

                <h3 class="text-lg font-semibold text-[#593114]">
                    Garba Royal
                </h3>

                <p class="mt-2 text-sm leading-5 text-[#6B625D]">
                    Attiéké vapeur, thon frit croustillant,
                    oignons, tomates fraîches et piment doux.
                </p>

                <div class="my-4 border-t border-[#E5D3BD]"></div>

                <div class="flex items-center justify-between gap-3">

                    <span class="text-base font-semibold text-[#A84B0B]">
                        3 500 FCFA
                    </span>

                    <button
                        type="button"
                        aria-label="Ajouter au panier"
                        class="flex h-10 w-10 items-center justify-center
                            rounded-lg bg-[#593114] text-white
                            transition-all duration-200
                            hover:bg-[#593114] hover:scale-105"
                    >
                        <i class="bi bi-basket2-fill"></i>
                    </button>

                </div>

            </div>
        </article>


        {{-- CARD 2 --}}
        <article
            class="group w-full overflow-hidden rounded-2xl
                   bg-white shadow-sm
                   transition-shadow duration-300
                   hover:shadow-lg"
        >

            <figure class="relative h-52 overflow-hidden">

                <img
                    src="{{ asset('images/aloco_poulet.jpg') }}"
                    alt="Poulet Braisé & Alloco"
                    class="h-full w-full object-cover
                           transition-transform duration-500 ease-out
                           group-hover:scale-105"
                >

                <span
                    class="absolute left-3 top-3 rounded-full
                           bg-[#E25F12] px-3 py-1
                           text-xs font-semibold text-white"
                >
                    Populaire
                </span>

                <button
                    type="button"
                    aria-label="Ajouter aux favoris"
                    class="absolute right-3 top-3 flex h-8 w-8
                           items-center justify-center rounded-full
                           bg-white/90 text-[#593114]
                           shadow-sm backdrop-blur
                           transition-transform duration-200
                           hover:scale-110"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-4.5 w-4.5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                               -1.935 0-3.597 1.126-4.312 2.733
                               C11.285 4.876 9.623 3.75 7.688 3.75
                               5.099 3.75 3 5.765 3 8.25
                               c0 7.22 9 12 9 12s9-4.78 9-12Z"
                        />
                    </svg>
                </button>

            </figure>

            <div class="bg-[#F8EBD9] p-4 sm:p-5">

                <h3 class="text-lg font-semibold text-[#593114]">
                    Poulet Braisé & Alloco
                </h3>

                <p class="mt-2 text-sm leading-5 text-[#6B625D]">
                    Poulet mariné aux épices locales,
                    braisé au charbon de bois et servi avec alloco doré.
                </p>

                <div class="my-4 border-t border-[#E5D3BD]"></div>

                <div class="flex items-center justify-between gap-3">

                    <span class="text-base font-semibold text-[#A84B0B]">
                        5 000 FCFA
                    </span>

                    <button
                        type="button"
                        aria-label="Ajouter au panier"
                        class="flex h-10 w-10 items-center justify-center
                            rounded-lg bg-[#593114] text-white
                            transition-all duration-200
                            hover:bg-[#593114] hover:scale-105"
                    >
                        <i class="bi bi-basket2-fill"></i>
                    </button>

                </div>

            </div>
        </article>


        {{-- CARD 3 --}}
        <article
            class="group w-full overflow-hidden rounded-2xl
                   bg-white shadow-sm
                   transition-shadow duration-300
                   hover:shadow-lg"
        >

            <figure class="relative h-52 overflow-hidden">

                <img
                    src="{{ asset('images/aloco-poulet.jpg') }}"
                    alt="Foutou Sauce Graine"
                    class="h-full w-full object-cover
                           transition-transform duration-500 ease-out
                           group-hover:scale-105"
                >

                <span
                    class="absolute left-3 top-3 rounded-full
                           bg-[#D9F3FA] px-3 py-1
                           text-xs font-semibold text-[#246174]"
                >
                    Nouveau
                </span>

                <button
                    type="button"
                    aria-label="Ajouter aux favoris"
                    class="absolute right-3 top-3 flex h-8 w-8
                           items-center justify-center rounded-full
                           bg-white/90 text-[#593114]
                           shadow-sm backdrop-blur
                           transition-transform duration-200
                           hover:scale-110"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-4.5 w-4.5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                               -1.935 0-3.597 1.126-4.312 2.733
                               C11.285 4.876 9.623 3.75 7.688 3.75
                               5.099 3.75 3 5.765 3 8.25
                               c0 7.22 9 12 9 12s9-4.78 9-12Z"
                        />
                    </svg>
                </button>

            </figure>

            <div class="bg-[#F8EBD9] p-4 sm:p-5">

                <h3 class="text-lg font-semibold text-[#593114]">
                    Foutou Sauce Graine
                </h3>

                <p class="mt-2 text-sm leading-5 text-[#6B625D]">
                    Foutou banane onctueux accompagné
                    de sa sauce graine riche à la viande de bœuf.
                </p>

                <div class="my-4 border-t border-[#E5D3BD]"></div>

                <div class="flex items-center justify-between gap-3">

                    <span class="text-base font-semibold text-[#A84B0B]">
                        4 500 FCFA
                    </span>

                    <button
                        type="button"
                        aria-label="Ajouter au panier"
                        class="flex h-10 w-10 items-center justify-center
                            rounded-lg bg-[#593114] text-white
                            transition-all duration-200
                            hover:bg-[#593114] hover:scale-105"
                    >
                        <i class="bi bi-basket2-fill"></i>
                    </button>

                </div>

            </div>
        </article>

    </div>
</div>
</section>

{{-- Section Notre histoire --}}
<section class="w-full bg-[#FBF9F8]">
    <div class="mx-auto w-full max-w-7xl px-6 py-20 sm:px-10 sm:py-24 lg:px-16 lg:py-28 xl:px-20">

        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-20 xl:gap-24">

            {{-- Texte --}}
            <div class="w-full max-w-xl">

                <h2 class="text-3xl font-bold leading-tight tracking-tight text-[#3D1F0D]">
                    L'histoire derrière
                    <br>
                    chaque plat
                </h2>

                <div class="mt-7 space-y-4 text-base font-normal leading-6 text-[#5F514B]">

                    <p>
                        Chez FON-KPA, nous croyons que la cuisine est le reflet de
                        l'âme d'un pays. Notre mission est de vous offrir une
                        expérience culinaire authentique, en sublimant les recettes
                        traditionnelles ivoiriennes avec une touche de modernité.
                    </p>

                    <p>
                        Nous sélectionnons rigoureusement nos ingrédients auprès de
                        producteurs locaux pour garantir fraîcheur et saveurs
                        incomparables. Chaque plat est préparé avec soin, selon les
                        méthodes héritées de nos grands-mères.
                    </p>

                </div>

                {{-- Lien --}}

                <a
                    href="#"
                    class="group inline-flex mt-7 items-center gap-2
                        text-sm font-semibold text-[#593114]
                        transition-colors duration-200
                        hover:text-[#E25F12]"
                >
                    En savoir plus

                    <span
                        class="flex h-7 w-7 items-center justify-center
                            rounded-full bg-[#F4EAE1]
                            transition-transform duration-200
                            group-hover:translate-x-1"
                    >
                        <svg
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-4 w-4"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"
                            />
                        </svg>
                    </span>
                </a>

            </div>


            {{-- Image --}}
            <div class="w-full">

                <div
                    class="mx-auto aspect-[4/3] w-full max-w-xl overflow-hidden
                           rounded-xl border border-[#E7D8D0]
                           bg-[#F8EEE9] shadow-sm"
                >

                    <img
                        src="{{ asset('images/garba.jpg') }}"
                        alt="Cuisine ivoirienne FON-KPA"
                        class="h-full w-full object-cover"
                    >

                </div>

            </div>

        </div>

    </div>
</section>

{{-- Call To Action --}}
<section class="w-full bg-[#FFFF]">
    <div class="mx-auto w-full max-w-7xl px-6 py-16 sm:px-8 sm:py-20 lg:px-12 lg:py-24">

        <div class="mx-auto flex max-w-3xl flex-col items-center text-center">

            {{-- Titre --}}
            <h2
                class="text-3xl font-bold leading-tight tracking-tight text-[#3D1F0D] sm:text-4xl"
            >
                Une envie de cuisine ivoirienne ?
            </h2>

            {{-- Description --}}
            <p
                class="mt-5 max-w-2xl text-sm font-normal leading-6 text-[#5F514B] sm:text-base"
            >
                Ne résistez plus. Commandez maintenant et laissez-nous vous faire
                voyager au cœur des saveurs de la Côte d'Ivoire.
            </p>

            {{-- Bouton --}}
            <a
                href="{{ route('plats.index') }}"
                class="btn btn-wide mt-7 inline-flex min-h-12 w-full items-center justify-center
                       rounded-lg bg-[#B84D00] px-8 py-3
                       text-base font-semibold text-white
                       shadow-md shadow-[#B84D00]/20
                       transition-all duration-300
                       hover:-translate-y-0.5
                       hover:bg-[#B84D00]
                       hover:shadow-lg
                       sm:w-auto sm:min-w-[300px]"
            >
                Commander maintenant
            </a>

        </div>

    </div>
</section>


@endsection