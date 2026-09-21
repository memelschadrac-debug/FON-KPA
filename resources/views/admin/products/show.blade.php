<x-admin-layout>

    <div class="space-y-6">

        {{-- ========================================================= --}}
        {{-- EN-TÊTE DE LA PAGE                                       --}}
        {{-- ========================================================= --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-gray-400">
                    Catalogue
                </p>

                <h2 class="mt-1 text-2xl font-semibold tracking-tight text-[#593114]">
                    {{ $product->name }}
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Consultez les détails et gérez ce plat.
                </p>
            </div>


            {{-- Retour à la liste --}}
            <a
                href="{{ route('admin.products.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 transition hover:border-[#593114]/30 hover:bg-[#593114]/[0.03] hover:text-[#593114]"
            >

                <svg
                    class="h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M15 19l-7-7 7-7"
                    />
                </svg>

                Retour aux plats

            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- MESSAGE DE SUCCÈS                                       --}}
        {{-- ========================================================= --}}
        @if (session('success'))

            <div class="flex items-center gap-3 rounded-xl border border-green-100 bg-green-50 px-4 py-3 text-sm text-green-700">

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- INFORMATIONS PRINCIPALES DU PLAT                        --}}
        {{-- ========================================================= --}}
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">


            {{-- ===================================================== --}}
            {{-- IMAGE + INFORMATIONS DU PLAT                         --}}
            {{-- ===================================================== --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm xl:col-span-2">

                {{-- En-tête --}}
                <div class="flex flex-col gap-3 border-b border-gray-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <p class="text-[18px] font-semibold text-gray-800">
                            Informations du plat
                        </p>

                        <p class="mt-0.5 text-[12px] text-gray-400">
                            Détails et présentation du plat
                        </p>

                    </div>

                </div>


                {{-- Contenu --}}
                <div class="p-5">

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


                        {{-- ================================================= --}}
                        {{-- IMAGE                                             --}}
                        {{-- ================================================= --}}
                        <div>

                            <div class="overflow-hidden rounded-2xl border border-gray-100 bg-gray-50">

                                @php
                                    $primaryImage = $product->productImages
                                        ->where('is_primary', true)
                                        ->sortBy('sort_order')
                                        ->first();

                                    $media = $primaryImage?->media;

                                    $imageUrl = null;

                                    if ($media && $media->path) {
                                        $disk = $media->disk ?: 'public';

                                        if (\Illuminate\Support\Facades\Storage::disk($disk)->exists($media->path)) {
                                            $imageUrl = \Illuminate\Support\Facades\Storage::disk($disk)->url($media->path);
                                        }
                                    }
                                @endphp

                                @if ($imageUrl)

                                    <img
                                        src="{{ $imageUrl }}"
                                        alt="{{ $media->alt ?? $product->name }}"
                                        class="aspect-[4/3] h-full w-full object-cover"
                                        loading="lazy"
                                    >

                                @else

                                    <div class="flex aspect-[4/3] items-center justify-center bg-[#593114]/[0.04] text-[#593114]">

                                        <svg
                                            class="h-12 w-12"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M3 16l5-5 4 4 3-3 6 6M14.5 7.5h.01M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            />
                                        </svg>

                                    </div>

                                @endif

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- INFORMATIONS                                      --}}
                        {{-- ================================================= --}}
                        <div class="space-y-5">


                            {{-- Nom --}}
                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Nom du plat
                                </p>

                                <p class="mt-1 text-base font-semibold text-gray-800">
                                    {{ $product->name }}
                                </p>

                            </div>


                            {{-- Catégorie --}}
                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Catégorie
                                </p>

                                <p class="mt-1 text-sm font-semibold text-gray-800">
                                    {{ $product->category?->name ?? 'Aucune catégorie' }}
                                </p>

                            </div>


                            {{-- Prix --}}
                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Prix
                                </p>

                                <p class="mt-1 text-lg font-bold text-[#593114]">
                                    {{ number_format($product->price, 0, ',', ' ') }} FCFA
                                </p>

                            </div>


                            {{-- Temps de préparation --}}
                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Temps de préparation
                                </p>

                                <p class="mt-1 text-sm text-gray-700">
                                    @if ($product->preparation_time)
                                        {{ $product->preparation_time }} minutes
                                    @else
                                        Non renseigné
                                    @endif
                                </p>

                            </div>


                            {{-- Statut --}}
                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Statut
                                </p>

                                @php
                                    $statusClasses = match ($product->status) {
                                        'published' =>
                                            'bg-green-50 text-green-700 border-green-100',

                                        'draft' =>
                                            'bg-amber-50 text-amber-700 border-amber-100',

                                        'archived' =>
                                            'bg-gray-50 text-gray-600 border-gray-100',

                                        default =>
                                            'bg-gray-50 text-gray-600 border-gray-100',
                                    };

                                    $statusLabel = match ($product->status) {
                                        'published' => 'Publié',
                                        'draft' => 'Brouillon',
                                        'archived' => 'Archivé',
                                        default => ucfirst($product->status),
                                    };
                                @endphp

                                <span class="mt-2 inline-flex items-center rounded-full border px-2.5 py-1 text-[11px] font-semibold {{ $statusClasses }}">
                                    {{ $statusLabel }}
                                </span>

                            </div>


                            {{-- Disponibilité --}}
                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Disponibilité
                                </p>

                                @if ($product->is_available)

                                    <span class="mt-2 inline-flex items-center rounded-full border border-orange-100 bg-orange-50 px-2.5 py-1 text-[11px] font-semibold text-orange-700">
                                        Disponible
                                    </span>

                                @else

                                    <span class="mt-2 inline-flex items-center rounded-full border border-red-100 bg-red-50 px-2.5 py-1 text-[11px] font-semibold text-red-600">
                                        Indisponible
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- COLONNE DROITE                                       --}}
            {{-- ===================================================== --}}
            <div class="space-y-6">


                {{-- ================================================= --}}
                {{-- RÉSUMÉ                                             --}}
                {{-- ================================================= --}}
                <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                    <div class="border-b border-gray-100 px-5 py-4">

                        <p class="text-[18px] font-semibold text-gray-800">
                            Résumé
                        </p>

                        <p class="mt-0.5 text-[12px] text-gray-400">
                            Informations complémentaires
                        </p>

                    </div>


                    <div class="space-y-5 px-5 py-5">


                        {{-- Slug --}}
                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Slug
                            </p>

                            <p class="mt-1 break-all text-sm text-gray-700">
                                {{ $product->slug }}
                            </p>

                        </div>


                        {{-- Plat mis en avant --}}
                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Mise en avant
                            </p>

                            @if ($product->is_featured)

                                <span class="mt-2 inline-flex items-center rounded-full border border-[#593114]/10 bg-[#593114]/[0.06] px-2.5 py-1 text-[11px] font-semibold text-[#593114]">
                                    Plat mis en avant
                                </span>

                            @else

                                <span class="mt-2 inline-flex items-center rounded-full border border-gray-100 bg-gray-50 px-2.5 py-1 text-[11px] font-semibold text-gray-500">
                                    Standard
                                </span>

                            @endif

                        </div>


                        {{-- Date de création --}}
                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Créé le
                            </p>

                            <p class="mt-1 text-sm text-gray-700">
                                {{ $product->created_at->format('d/m/Y à H:i') }}
                            </p>

                        </div>


                        {{-- Dernière modification --}}
                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Dernière modification
                            </p>

                            <p class="mt-1 text-sm text-gray-700">
                                {{ $product->updated_at->format('d/m/Y à H:i') }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- ACTIONS                                            --}}
                {{-- ================================================= --}}
                <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                    <div class="border-b border-gray-100 px-5 py-4">

                        <p class="text-[18px] font-semibold text-gray-800">
                            Actions
                        </p>

                        <p class="mt-0.5 text-[12px] text-gray-400">
                            Gérez ce plat
                        </p>

                    </div>


                    <div class="space-y-3 px-5 py-5">

                        {{-- Modifier --}}
                        <a
                            href="{{ route('admin.products.edit', $product) }}"
                            class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-lg bg-[#593114] px-5 text-sm font-medium text-white transition hover:bg-[#47260F] focus:outline-none focus:ring-2 focus:ring-[#593114]/20"
                        >

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M16.862 3.487a2.1 2.1 0 013.01 2.93L8.5 17.79l-4 1 1-4 11.362-11.303z"
                                />
                            </svg>

                            Modifier

                        </a>


                        {{-- Supprimer --}}
                        <button
                            type="button"
                            onclick="document.getElementById('delete-product').showModal()"
                            class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-lg border border-red-200 bg-white px-5 text-sm font-medium text-red-600 transition hover:bg-red-50"
                        >

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0v12a1 1 0 01-1 1H8a1 1 0 01-1-1V7m3 4v6m4-6v6"
                                />
                            </svg>

                            Supprimer

                        </button>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- DESCRIPTION                                              --}}
        {{-- ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

            <div class="border-b border-gray-100 px-5 py-4">

                <p class="text-[18px] font-semibold text-gray-800">
                    Description
                </p>

                <p class="mt-0.5 text-[12px] text-gray-400">
                    Présentation du plat
                </p>

            </div>


            <div class="px-5 py-5">

                @if ($product->description)

                    <p class="text-sm leading-7 text-gray-600">
                        {{ $product->description }}
                    </p>

                @else

                    <p class="text-sm italic text-gray-400">
                        Aucune description n'a été renseignée pour ce plat.
                    </p>

                @endif

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- ZONE DE SUPPRESSION                                      --}}
        {{-- ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-red-100 bg-white shadow-sm">

            <div class="flex flex-col gap-4 px-5 py-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <p class="text-sm font-semibold text-gray-800">
                        Supprimer ce plat
                    </p>

                    <p class="mt-1 text-xs leading-5 text-gray-400">
                        Cette action est définitive et ne peut pas être annulée.
                    </p>

                </div>


                <button
                    type="button"
                    onclick="document.getElementById('delete-product').showModal()"
                    class="inline-flex h-9 items-center justify-center gap-2 rounded-lg border border-red-200 bg-white px-4 text-sm font-medium text-red-600 transition hover:bg-red-50"
                >

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0v12a1 1 0 01-1 1H8a1 1 0 01-1-1V7m3 4v6m4-6v6"
                        />
                    </svg>

                    Supprimer

                </button>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- MODAL DE SUPPRESSION                                     --}}
        {{-- ========================================================= --}}
        <dialog
            id="delete-product"
            class="modal"
        >

            <div class="modal-box max-w-md overflow-hidden rounded-2xl p-0">

                {{-- Header --}}
                <div class="px-6 py-6">

                    <div class="flex items-start gap-4">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-600">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0v12a1 1 0 01-1 1H8a1 1 0 01-1-1V7m3 4v6m4-6v6"
                                />
                            </svg>

                        </div>


                        <div>

                            <h3 class="text-base font-semibold text-gray-800">
                                Supprimer le plat ?
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-gray-500">
                                Vous êtes sur le point de supprimer
                                <span class="font-semibold text-gray-700">
                                    {{ $product->name }}
                                </span>.
                                Cette action est irréversible.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Footer --}}
                <div class="flex items-center justify-end gap-3 bg-gray-50 px-6 py-4">

                    <form method="dialog">

                        <button
                            type="submit"
                            class="rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50"
                        >
                            Annuler
                        </button>

                    </form>


                    <form
                        action="{{ route('admin.products.destroy', $product) }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700"
                        >
                            Supprimer
                        </button>

                    </form>

                </div>

            </div>


            {{-- Fermer en cliquant à l'extérieur --}}
            <form
                method="dialog"
                class="modal-backdrop"
            >
                <button>close</button>
            </form>

        </dialog>

    </div>

</x-admin-layout>