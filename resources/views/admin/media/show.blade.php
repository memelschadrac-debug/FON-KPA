<x-admin-layout>

    <div class="space-y-6">

        {{-- ========================================================= --}}
        {{-- EN-TÊTE                                                    --}}
        {{-- ========================================================= --}}

        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

            <div>
                <p class="text-sm font-medium text-[#E25F12]">
                    Bibliothèque média
                </p>

                <h2 class="mt-1 text-2xl font-semibold tracking-tight text-gray-900">
                    {{ $media->filename }}
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Détails et utilisation de ce média.
                </p>
            </div>

            <a
                href="{{ route('admin.media.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-md border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition hover:border-[#593114]/30 hover:bg-gray-50 hover:text-[#593114]"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"
                    />
                </svg>

                Retour aux médias
            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- MESSAGE DE SUCCÈS                                         --}}
        {{-- ========================================================= --}}

        @if(session('success'))

            <div class="rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- MESSAGE D'ERREUR                                          --}}
        {{-- ========================================================= --}}

        @if(session('error'))

            <div class="rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                {{ session('error') }}
            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- CONTENU PRINCIPAL                                         --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">


            {{-- ===================================================== --}}
            {{-- APERÇU                                                 --}}
            {{-- ===================================================== --}}

            <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm xl:col-span-2">

                <div class="border-b border-gray-100 px-6 py-5 sm:px-7">

                    <div class="flex items-center justify-between gap-4">

                        <div>
                            <h2 class="text-base font-semibold text-gray-900">
                                Aperçu
                            </h2>

                            <p class="mt-1 text-sm text-gray-500">
                                Aperçu du fichier média.
                            </p>
                        </div>

                        @php
                            $isUsed = $media->productImages->isNotEmpty();
                        @endphp

                        @if($isUsed)

                            <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                Utilisé
                            </span>

                        @else

                            <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                                <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                                Non utilisé
                            </span>

                        @endif

                    </div>

                </div>


                <div class="p-6 sm:p-7">

                    <div class="flex min-h-[420px] items-center justify-center overflow-hidden rounded-xl border border-gray-200 bg-gray-50">

                        <img
                            src="{{ asset($media->path) }}"
                            alt="{{ $media->alt ?? $media->filename }}"
                            class="max-h-[600px] w-auto max-w-full object-contain"
                        >

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- INFORMATIONS                                           --}}
            {{-- ===================================================== --}}

            <div class="space-y-6">


                {{-- ================================================= --}}
                {{-- INFORMATIONS DU FICHIER                            --}}
                {{-- ================================================= --}}

                <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                    <div class="border-b border-gray-100 px-6 py-5">

                        <h2 class="text-base font-semibold text-gray-900">
                            Informations
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            Informations techniques du fichier.
                        </p>

                    </div>


                    <div class="divide-y divide-gray-100">

                        {{-- Nom --}}
                        <div class="px-6 py-4">

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Nom du fichier
                            </p>

                            <p class="mt-1 break-all text-sm font-medium text-gray-900">
                                {{ $media->filename }}
                            </p>

                        </div>


                        {{-- Type --}}
                        <div class="px-6 py-4">

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Type
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-900">
                                {{ $media->mime_type }}
                            </p>

                        </div>


                        {{-- Taille --}}
                        <div class="px-6 py-4">

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Taille
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-900">
                                {{ number_format($media->size / 1024, 1, ',', ' ') }} Ko
                            </p>

                        </div>


                        {{-- Dimensions --}}
                        <div class="px-6 py-4">

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Dimensions
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-900">

                                @if($media->width && $media->height)

                                    {{ $media->width }} × {{ $media->height }} px

                                @else

                                    Non disponibles

                                @endif

                            </p>

                        </div>


                        {{-- Chemin --}}
                        <div class="px-6 py-4">

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Chemin
                            </p>

                            <p class="mt-1 break-all text-xs font-medium text-gray-600">
                                {{ $media->path }}
                            </p>

                        </div>


                        {{-- Date --}}
                        <div class="px-6 py-4">

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Ajouté le
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-900">
                                {{ $media->created_at?->format('d/m/Y à H:i') }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- MÉTADONNÉES                                         --}}
                {{-- ================================================= --}}

                <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                    <div class="border-b border-gray-100 px-6 py-5">

                        <h2 class="text-base font-semibold text-gray-900">
                            Métadonnées
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            Informations utilisées pour le référencement de l'image.
                        </p>

                    </div>


                    <div class="space-y-5 p-6">

                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Texte alternatif
                            </p>

                            <p class="mt-1 text-sm text-gray-700">

                                @if($media->alt)

                                    {{ $media->alt }}

                                @else

                                    <span class="italic text-gray-400">
                                        Aucun texte alternatif
                                    </span>

                                @endif

                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Légende
                            </p>

                            <p class="mt-1 text-sm text-gray-700">

                                @if($media->caption)

                                    {{ $media->caption }}

                                @else

                                    <span class="italic text-gray-400">
                                        Aucune légende
                                    </span>

                                @endif

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- UTILISATION                                               --}}
        {{-- ========================================================= --}}

        <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

            <div class="border-b border-gray-100 px-6 py-5 sm:px-7">

                <h2 class="text-base font-semibold text-gray-900">
                    Utilisation du média
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Produits utilisant actuellement cette image.
                </p>

            </div>


            @if($media->productImages->isNotEmpty())

                <div class="divide-y divide-gray-100">

                    @foreach($media->productImages as $productImage)

                        @if($productImage->product)

                            <div class="flex items-center justify-between gap-4 px-6 py-4 sm:px-7">

                                <div class="flex min-w-0 items-center gap-4">

                                    <div class="h-12 w-12 shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-50">

                                        <img
                                            src="{{ asset($media->path) }}"
                                            alt="{{ $media->alt ?? $media->filename }}"
                                            class="h-full w-full object-cover"
                                        >

                                    </div>


                                    <div class="min-w-0">

                                        <p class="truncate text-sm font-semibold text-gray-900">
                                            {{ $productImage->product->name }}
                                        </p>

                                        <p class="mt-0.5 text-xs text-gray-500">
                                            {{ $productImage->is_primary ? 'Image principale' : 'Image secondaire' }}
                                        </p>

                                    </div>

                                </div>


                                <a
                                    href="{{ route('admin.products.show', $productImage->product) }}"
                                    class="inline-flex shrink-0 items-center gap-1.5 rounded-md border border-gray-200 bg-white px-3 py-2 text-xs font-medium text-gray-700 transition hover:border-[#593114]/30 hover:bg-[#593114]/5 hover:text-[#593114]"
                                >

                                    Voir le plat

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-3.5 w-3.5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"
                                        />
                                    </svg>

                                </a>

                            </div>

                        @endif

                    @endforeach

                </div>

            @else

                <div class="px-6 py-10 text-center sm:px-7">

                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gray-100">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-gray-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.7"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 16.5 7.5 12l4 4 3-3 6.5 6.5M3 19.5h18M6.75 8.25h.008v.008H6.75V8.25Zm0 0A1.5 1.5 0 1 0 6.75 11.25 1.5 1.5 0 0 0 6.75 8.25Z"
                            />
                        </svg>

                    </div>

                    <h3 class="mt-4 text-sm font-semibold text-gray-900">
                        Média non utilisé
                    </h3>

                    <p class="mx-auto mt-1 max-w-md text-sm text-gray-500">
                        Cette image n'est actuellement associée à aucun produit.
                    </p>

                </div>

            @endif

        </div>


        {{-- ========================================================= --}}
        {{-- ACTIONS                                                    --}}
        {{-- ========================================================= --}}

        <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

            <div class="flex flex-col gap-3 p-6 sm:flex-row sm:items-center sm:justify-between sm:p-7">

                <div>

                    <h2 class="text-sm font-semibold text-gray-900">
                        Actions
                    </h2>

                    <p class="mt-1 text-xs text-gray-500">
                        Gérez ce fichier média.
                    </p>

                </div>


                <div class="flex flex-col gap-2 sm:flex-row">

                    <a
                        href="{{ route('admin.media.index') }}"
                        class="inline-flex items-center justify-center rounded-md border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50"
                    >
                        Retour
                    </a>


                    @if(!$isUsed)

                        <button
                            type="button"
                            onclick="delete_media_modal.showModal()"
                            class="inline-flex items-center justify-center gap-2 rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 7.5h12M9.75 7.5V5.25h4.5V7.5m-6.75 0 .75 12h7.5l.75-12M10.5 10.5v5.25m3-5.25v5.25"
                                />
                            </svg>

                            Supprimer

                        </button>

                    @else

                        <span class="inline-flex items-center justify-center rounded-md bg-gray-100 px-4 py-2 text-sm font-medium text-gray-400">
                            Suppression indisponible
                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- ============================================================= --}}
    {{-- MODALE DE SUPPRESSION                                        --}}
    {{-- ============================================================= --}}

    @if(!$isUsed)

        <dialog id="delete_media_modal" class="modal">

            <div class="modal-box max-w-md rounded-2xl">

                <div class="flex items-start gap-4">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-red-100">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-red-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linecap="round"
                                d="M12 9v3.75m0 3h.008v.008H12v-.008ZM10.29 3.86 1.82 18a2 2 0 0 0 1.72 3h16.92a2 2 0 0 0 1.72-3L13.71 3.86a2 2 0 0 0-3.42 0Z"
                            />
                        </svg>

                    </div>


                    <div>

                        <h3 class="text-lg font-semibold text-gray-900">
                            Supprimer ce média ?
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Cette action supprimera définitivement le fichier
                            <span class="font-medium text-gray-700">
                                {{ $media->filename }}
                            </span>
                            ainsi que son enregistrement dans la bibliothèque média.
                        </p>

                    </div>

                </div>


                <div class="modal-action">

                    <form method="dialog">

                        <button
                            class="rounded-md border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50"
                        >
                            Annuler
                        </button>

                    </form>


                    <form
                        method="POST"
                        action="{{ route('admin.media.destroy', $media) }}"
                    >

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700"
                        >
                            Supprimer définitivement
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

    @endif

</x-admin-layout>