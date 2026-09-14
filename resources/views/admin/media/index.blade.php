<x-admin-layout>
    
    <div
        x-data="mediaLibrary()"
        class="space-y-6"
    >

        {{-- ========================================================= --}}
        {{-- HEADER                                                     --}}
        {{-- ========================================================= --}}

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <div class="mb-1 text-sm font-medium text-gray-500">
                    Catalogue
                </div>

                <h2 class="text-2xl font-semibold tracking-tight text-gray-900">
                    Médias
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Gérez les images utilisées sur votre boutique FON-KPA.
                </p>
            </div>

            <a
                href="{{ route('admin.media.create') }}"
                class="btn border-0 bg-[#593114] px-5 text-white shadow-sm hover:bg-[#47260f]"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 4v16m8-8H4"
                    />
                </svg>

                Ajouter un média
            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- ALERTES                                                     --}}
        {{-- ========================================================= --}}

        @if(session('success'))

            <div class="alert border border-green-200 bg-green-50 text-green-800 shadow-none">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

                <span>{{ session('success') }}</span>

            </div>

        @endif


        @if(session('error'))

            <div class="alert border border-red-200 bg-red-50 text-red-800 shadow-none">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>

                <span>{{ session('error') }}</span>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- STATISTIQUES                                                --}}
        {{-- ========================================================= --}}

        @php
            $totalMedia = $media->total();

            $totalSize = $media->sum('size');

            $formatSize = function ($bytes) {
                if (!$bytes) {
                    return '0 B';
                }

                $units = ['B', 'KB', 'MB', 'GB'];

                $i = 0;

                while ($bytes >= 1024 && $i < count($units) - 1) {
                    $bytes /= 1024;
                    $i++;
                }

                return round($bytes, 1) . ' ' . $units[$i];
            };
        @endphp


        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Total --}}
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            Total des médias
                        </p>

                        <p class="mt-2 text-2xl font-semibold text-gray-900">
                            {{ $totalMedia }}
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#593114]/10 text-[#593114]">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"
                            />
                        </svg>

                    </div>

                </div>

            </div>


            {{-- Images --}}
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            Images
                        </p>

                        <p class="mt-2 text-2xl font-semibold text-gray-900">
                            {{ $media->where('mime_type', 'like', 'image/%')->count() }}
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#E25F12]/10 text-[#E25F12]">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"
                            />
                        </svg>

                    </div>

                </div>

            </div>


            {{-- Produits --}}
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            Médias produits
                        </p>

                        <p class="mt-2 text-2xl font-semibold text-gray-900">
                            {{ $media->filter(fn ($item) => $item->productImages->isNotEmpty())->count() }}
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#593114]/10 text-[#593114]">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m-8-4l8 4m0 0v10"
                            />
                        </svg>

                    </div>

                </div>

            </div>


            {{-- Stockage --}}
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            Espace utilisé
                        </p>

                        <p class="mt-2 text-2xl font-semibold text-gray-900">
                            {{ $formatSize($totalSize) }}
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-orange-50 text-[#E25F12]">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M5 12h14M5 12a7 7 0 117-7m-7 7a7 7 0 007 7"
                            />
                        </svg>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- FILTRES                                                     --}}
        {{-- ========================================================= --}}

        <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">

            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                {{-- Recherche --}}
                <div class="relative w-full lg:max-w-md">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                        />
                    </svg>

                    <input
                        type="text"
                        x-model="search"
                        placeholder="Rechercher un média..."
                        class="input h-10 w-full border-gray-200 bg-[#f3f3f3] pl-10 text-sm focus:border-[#593114] focus:outline-none focus:ring-1 focus:ring-[#593114]"
                    >

                </div>


                {{-- Filtres --}}
                <div class="flex flex-wrap items-center gap-2">

                    <button
                        type="button"
                        @click="filter = 'all'"
                        :class="filter === 'all'
                            ? 'bg-[#593114] text-white'
                            : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                        class="btn btn-sm border-0 px-4"
                    >
                        Tous
                    </button>

                    <button
                        type="button"
                        @click="filter = 'products'"
                        :class="filter === 'products'
                            ? 'bg-[#593114] text-white'
                            : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                        class="btn btn-sm border-0 px-4"
                    >
                        Produits
                    </button>

                    <button
                        type="button"
                        @click="filter = 'unused'"
                        :class="filter === 'unused'
                            ? 'bg-[#593114] text-white'
                            : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                        class="btn btn-sm border-0 px-4"
                    >
                        Non utilisés
                    </button>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- BIBLIOTHÈQUE                                                --}}
        {{-- ========================================================= --}}

        <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

            {{-- En-tête --}}
            <div class="flex flex-col gap-2 border-b border-gray-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

                <div>
                    <h3 class="font-semibold text-gray-900">
                        Bibliothèque multimédia
                    </h2>

                    <p class="mt-0.5 text-xs text-gray-500">
                        {{ $media->total() }} média{{ $media->total() > 1 ? 's' : '' }}
                    </p>
                </div>

                <div class="text-xs text-gray-400">
                    Cliquez sur une image pour voir ses détails
                </div>

            </div>


            {{-- Grid --}}
            <div class="p-5">

                @if($media->count())

                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6">

                        @foreach($media as $item)

                            @php
                                $isUsed = $item->productImages->isNotEmpty();

                                $matchesSearch =
                                    str_contains(
                                        strtolower($item->filename),
                                        strtolower($search ?? '')
                                    );
                            @endphp

                            <div
                                x-show="matchesMedia(
                                    @js($item->filename),
                                    @js($isUsed)
                                )"
                                x-transition
                                class="group overflow-hidden rounded-xl border border-gray-200 bg-white transition duration-200 hover:-translate-y-0.5 hover:border-gray-300 hover:shadow-md"
                            >

                                {{-- Image --}}
                                <div class="relative aspect-square overflow-hidden bg-gray-100">

                                    <img
                                        src="{{ asset($item->path) }}"
                                        alt="{{ $item->alt ?? $item->filename }}"
                                        class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                                    >

                                    {{-- Overlay --}}
                                    <div class="absolute inset-0 flex items-end bg-gradient-to-t from-black/70 via-black/10 to-transparent opacity-0 transition duration-200 group-hover:opacity-100">

                                        <div class="flex w-full items-center justify-between p-3">

                                            <a
                                                href="{{ route('admin.media.show', $item) }}"
                                                class="btn btn-sm border-0 bg-white text-gray-800 shadow-sm hover:bg-gray-100"
                                            >
                                                Voir
                                            </a>

                                            @if(!$isUsed)

                                                <button
                                                    type="button"
                                                    @click="openDeleteModal(
                                                        '{{ $item->id }}',
                                                        @js($item->filename)
                                                    )"
                                                    class="btn btn-sm border-0 bg-red-600 text-white hover:bg-red-700"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="h-4 w-4"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-3a1 1 0 00-1 1v3M4 7h16"
                                                        />
                                                    </svg>
                                                </button>

                                            @endif

                                        </div>

                                    </div>

                                </div>


                                {{-- Informations --}}
                                <div class="p-3">

                                    <div class="flex items-start justify-between gap-2">

                                        <p
                                            class="truncate text-xs font-medium text-gray-800"
                                            title="{{ $item->filename }}"
                                        >
                                            {{ $item->filename }}
                                        </p>

                                        @if($isUsed)

                                            <span class="badge shrink-0 border-0 bg-[#593114]/10 text-[10px] text-[#593114]">
                                                Utilisé
                                            </span>

                                        @else

                                            <span class="badge shrink-0 border-0 bg-gray-100 text-[10px] text-gray-500">
                                                Libre
                                            </span>

                                        @endif

                                    </div>


                                    <div class="mt-2 flex items-center justify-between text-[11px] text-gray-400">

                                        <span>
                                            {{ strtoupper(pathinfo($item->filename, PATHINFO_EXTENSION)) }}
                                        </span>

                                        <span>
                                            {{ $formatSize($item->size) }}
                                        </span>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>


                    {{-- Aucun résultat Alpine --}}
                    <div
                        x-show="visibleCount === 0"
                        x-cloak
                        class="py-16 text-center"
                    >

                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-gray-100 text-gray-400">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                                />
                            </svg>

                        </div>

                        <h3 class="mt-4 font-medium text-gray-900">
                            Aucun média trouvé
                        </h3>

                        <p class="mt-1 text-sm text-gray-500">
                            Essayez une autre recherche ou un autre filtre.
                        </p>

                    </div>

                @else

                    {{-- Empty state --}}
                    <div class="py-20 text-center">

                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[#593114]/10 text-[#593114]">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-7 w-7"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"
                                />
                            </svg>

                        </div>

                        <h3 class="mt-5 text-base font-semibold text-gray-900">
                            Votre bibliothèque est vide
                        </h3>

                        <p class="mx-auto mt-1 max-w-sm text-sm text-gray-500">
                            Ajoutez votre première image pour commencer à construire votre bibliothèque média.
                        </p>

                        <a
                            href="{{ route('admin.media.create') }}"
                            class="btn mt-5 border-0 bg-[#593114] px-5 text-white hover:bg-[#47260f]"
                        >
                            Ajouter un média
                        </a>

                    </div>

                @endif

            </div>


            {{-- Pagination --}}
            @if($media->hasPages())

                <div class="border-t border-gray-100 px-5 py-4">
                    {{ $media->links() }}
                </div>

            @endif

        </div>


        {{-- ========================================================= --}}
        {{-- MODALE SUPPRESSION                                         --}}
        {{-- ========================================================= --}}

        <dialog
            x-ref="deleteModal"
            class="modal"
        >

            <div class="modal-box max-w-md rounded-2xl">

                <div class="flex items-start gap-4">

                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-red-50 text-red-600">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-3a1 1 0 00-1 1v3M4 7h16"
                            />
                        </svg>

                    </div>

                    <div>

                        <h3 class="text-lg font-semibold text-gray-900">
                            Supprimer ce média ?
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500">
                            Cette action supprimera définitivement le fichier :
                        </p>

                        <p
                            class="mt-2 break-all text-sm font-medium text-gray-900"
                            x-text="deleteFilename"
                        ></p>

                    </div>

                </div>


                <div class="modal-action">

                    <button
                        type="button"
                        @click="$refs.deleteModal.close()"
                        class="btn border-gray-200 bg-white text-gray-700 hover:bg-gray-50"
                    >
                        Annuler
                    </button>

                    <form
                        method="POST"
                        :action="deleteUrl"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn border-0 bg-red-600 text-white hover:bg-red-700"
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

    </div>


    {{-- ============================================================= --}}
    {{-- ALPINE.JS                                                     --}}
    {{-- ============================================================= --}}

    <script>
        function mediaLibrary() {
            return {
                search: '',
                filter: 'all',
                visibleCount: {{ $media->count() }},
                deleteUrl: '',
                deleteFilename: '',

                matchesMedia(filename, isUsed) {

                    const search = this.search.trim().toLowerCase();

                    const name = filename.toLowerCase();

                    const matchesSearch =
                        search === '' || name.includes(search);

                    let matchesFilter = true;

                    if (this.filter === 'products') {
                        matchesFilter = isUsed;
                    }

                    if (this.filter === 'unused') {
                        matchesFilter = !isUsed;
                    }

                    const result = matchesSearch && matchesFilter;

                    this.$nextTick(() => {
                        const cards = document.querySelectorAll(
                            '[x-show]'
                        );

                        let count = 0;

                        cards.forEach(card => {
                            if (
                                card.classList.contains('group') &&
                                card.style.display !== 'none'
                            ) {
                                count++;
                            }
                        });

                        this.visibleCount = count;
                    });

                    return result;
                },

                openDeleteModal(id, filename) {

                    this.deleteFilename = filename;

                    this.deleteUrl =
                        "{{ url('admin/media') }}/" + id;

                    this.$refs.deleteModal.showModal();
                }
            }
        }
    </script>

</x-admin-layout>