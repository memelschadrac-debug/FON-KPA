<x-admin-layout>
    {{-- =========================================================
        PAGE : MODIFICATION D'UN PLAT
    ========================================================== --}}
    <div class="mx-auto max-w-3xl">

        {{-- =====================================================
            RETOUR
        ====================================================== --}}
        <div class="mb-5">
            <a
                href="{{ route('admin.products.index') }}"
                class="inline-flex items-center gap-1.5 text-[12px] font-medium text-gray-500 transition hover:text-[#593114]"
            >
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                    class="h-3.5 w-3.5"
                >
                    <path
                        d="M19 12H5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="m11 18-6-6 6-6"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>

                Retour aux plats
            </a>
        </div>

        {{-- =====================================================
            EN-TÊTE
        ====================================================== --}}
        <div class="mb-6">
            <p class="mb-1 text-[11px] font-medium uppercase tracking-[0.08em] text-gray-400">
                Catalogue
            </p>

            <h2 class="text-[21px] font-semibold tracking-tight text-[#593114]">
                Modifier le plat
            </h2>

            <p class="mt-1 text-[13px] text-gray-500">
                Modifiez les informations du plat
                <span class="font-medium text-gray-700">
                    {{ $product->name }}
                </span>.
            </p>
        </div>

        {{-- =====================================================
            ERREURS DE VALIDATION
        ====================================================== --}}
        @if ($errors->any())
            <div class="mb-5 rounded-md border border-red-200 bg-red-50 px-4 py-3">
                <p class="mb-1 text-[12px] font-semibold text-red-700">
                    Vérifiez les informations saisies.
                </p>

                <ul class="space-y-1 text-[11px] text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- =====================================================
            FORMULAIRE
        ====================================================== --}}
        <form
            method="POST"
            action="{{ route('admin.products.update', $product) }}"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                {{-- =================================================
                    CONTENU
                ================================================== --}}
                <div class="p-6 sm:p-7">

                    <div class="space-y-5">

                        {{-- =================================================
                            NOM
                        ================================================== --}}
                        <div>
                            <label
                                for="name"
                                class="mb-1.5 block text-[12px] font-medium text-gray-700"
                            >
                                Nom du plat
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        class="h-4 w-4"
                                    >
                                        <path
                                            d="M4 6.5h16M4 12h16M4 17.5h16"
                                            stroke-linecap="round"
                                        />
                                    </svg>
                                </div>

                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{ old('name', $product->name) }}"
                                    required
                                    class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-3 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                >
                            </div>
                        </div>

                        {{-- =================================================
                            CATÉGORIE
                        ================================================== --}}
                        <div>
                            <label
                                for="category_id"
                                class="mb-1.5 block text-[12px] font-medium text-gray-700"
                            >
                                Catégorie
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 z-10 flex items-center pl-3 text-gray-400">
                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        class="h-4 w-4"
                                    >
                                        <path
                                            d="M4 6h16M4 12h16M4 18h16"
                                            stroke-linecap="round"
                                        />
                                    </svg>
                                </div>

                                <select
                                    id="category_id"
                                    name="category_id"
                                    required
                                    class="h-10 w-full appearance-none rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-9 text-[12px] text-gray-700 outline-none transition focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                >
                                    @foreach ($categories as $category)
                                        <option
                                            value="{{ $category->id }}"
                                            @selected(old('category_id', $product->category_id) == $category->id)
                                        >
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400">
                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        class="h-3.5 w-3.5"
                                    >
                                        <path
                                            d="m7 10 5 5 5-5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- =================================================
                            SLUG
                        ================================================== --}}
                        <div>
                            <label
                                for="slug"
                                class="mb-1.5 block text-[12px] font-medium text-gray-700"
                            >
                                Slug
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        class="h-4 w-4"
                                    >
                                        <path
                                            d="M10.5 13.5a4.5 4.5 0 0 0 6.36.14l2.28-2.28a4.5 4.5 0 0 0-6.36-6.36l-1.3 1.3"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M13.5 10.5a4.5 4.5 0 0 0-6.36-.14l-2.28 2.28a4.5 4.5 0 0 0 6.36 6.36l1.3-1.3"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </div>

                                <input
                                    id="slug"
                                    name="slug"
                                    type="text"
                                    value="{{ old('slug', $product->slug) }}"
                                    required
                                    class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-3 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                >
                            </div>

                            <p class="mt-1.5 text-[10px] text-gray-400">
                                Utilisé dans les URLs. Exemple : garba-royal
                            </p>
                        </div>

                        {{-- =================================================
                            DESCRIPTION
                        ================================================== --}}
                        <div>
                            <label
                                for="description"
                                class="mb-1.5 block text-[12px] font-medium text-gray-700"
                            >
                                Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="4"
                                placeholder="Décrivez brièvement ce plat..."
                                class="w-full resize-none rounded-md border border-gray-200 bg-[#f3f3f3] px-3 py-2.5 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                            >{{ old('description', $product->description) }}</textarea>
                        </div>

                        {{-- =================================================
                            PRIX
                        ================================================== --}}
                        <div>
                            <label
                                for="price"
                                class="mb-1.5 block text-[12px] font-medium text-gray-700"
                            >
                                Prix
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <span class="text-[11px] font-medium">
                                        FCFA
                                    </span>
                                </div>

                                <input
                                    id="price"
                                    name="price"
                                    type="number"
                                    min="0"
                                    step="1"
                                    value="{{ old('price', $product->price) }}"
                                    required
                                    class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-14 pr-3 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                >
                            </div>
                        </div>

                        {{-- =================================================
                            TEMPS DE PRÉPARATION
                        ================================================== --}}
                        <div>
                            <label
                                for="preparation_time"
                                class="mb-1.5 block text-[12px] font-medium text-gray-700"
                            >
                                Temps de préparation
                            </label>

                            <div class="relative">
                                <input
                                    id="preparation_time"
                                    name="preparation_time"
                                    type="number"
                                    min="0"
                                    value="{{ old('preparation_time', $product->preparation_time) }}"
                                    class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] px-3 pr-16 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                    placeholder="Exemple : 30"
                                >

                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-[10px] text-gray-400">
                                    minutes
                                </div>
                            </div>
                        </div>

                        {{-- =================================================
                            STATUT
                        ================================================== --}}
                        <div>
                            <label
                                for="status"
                                class="mb-1.5 block text-[12px] font-medium text-gray-700"
                            >
                                Statut
                            </label>

                            <div class="relative">
                                <select
                                    id="status"
                                    name="status"
                                    required
                                    class="h-10 w-full appearance-none rounded-md border border-gray-200 bg-[#f3f3f3] px-3 pr-9 text-[12px] text-gray-700 outline-none transition focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                >
                                    <option
                                        value="published"
                                        @selected(old('status', $product->status) === 'published')
                                    >
                                        Publié
                                    </option>

                                    <option
                                        value="draft"
                                        @selected(old('status', $product->status) === 'draft')
                                    >
                                        Brouillon
                                    </option>

                                    <option
                                        value="archived"
                                        @selected(old('status', $product->status) === 'archived')
                                    >
                                        Archivé
                                    </option>
                                </select>

                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400">
                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        class="h-3.5 w-3.5"
                                    >
                                        <path
                                            d="m7 10 5 5 5-5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- =================================================
                            OPTIONS DE VISIBILITÉ
                        ================================================== --}}
                        <div>
                            <p class="mb-2 text-[12px] font-medium text-gray-700">
                                Options du plat
                            </p>

                            <div class="space-y-2 rounded-md border border-gray-200 bg-[#f8f8f8] p-3">

                                {{-- DISPONIBILITÉ --}}
                                <label class="flex cursor-pointer items-center justify-between rounded-md bg-white px-3 py-2.5 transition hover:bg-gray-50">
                                    <div>
                                        <p class="text-[11px] font-medium text-gray-700">
                                            Plat disponible
                                        </p>

                                        <p class="mt-0.5 text-[10px] text-gray-400">
                                            Le plat peut être commandé par les clients.
                                        </p>
                                    </div>

                                    <input
                                        type="checkbox"
                                        name="is_available"
                                        value="1"
                                        class="h-4 w-4 rounded border-gray-300 text-[#593114] focus:ring-[#593114]"
                                        @checked(old('is_available', $product->is_available))
                                    >
                                </label>

                                {{-- VEDETTE --}}
                                <label class="flex cursor-pointer items-center justify-between rounded-md bg-white px-3 py-2.5 transition hover:bg-gray-50">
                                    <div>
                                        <p class="text-[11px] font-medium text-gray-700">
                                            Mettre en avant
                                        </p>

                                        <p class="mt-0.5 text-[10px] text-gray-400">
                                            Afficher ce plat comme plat recommandé.
                                        </p>
                                    </div>

                                    <input
                                        type="checkbox"
                                        name="is_featured"
                                        value="1"
                                        class="h-4 w-4 rounded border-gray-300 text-[#593114] focus:ring-[#593114]"
                                        @checked(old('is_featured', $product->is_featured))
                                    >
                                </label>

                            </div>
                        </div>

                        {{-- =================================================
                            IMAGE DU PLAT
                        ================================================== --}}
                        <div>
                            <label
                                for="image"
                                class="mb-1.5 block text-[12px] font-medium text-gray-700"
                            >
                                Image du plat
                            </label>

                            <p class="mb-3 text-[10px] text-gray-400">
                                Remplacez l'image actuelle si nécessaire.
                            </p>

                            @php
                                $currentImage = $product->productImages
                                    ->where('is_primary', true)
                                    ->sortBy('sort_order')
                                    ->first();

                                $currentMedia = $currentImage?->media;
                            @endphp

                            {{-- IMAGE ACTUELLE --}}
                            @if ($currentMedia)
                                <div
                                    id="current-product-image"
                                    class="mb-3 overflow-hidden rounded-md border border-gray-200 bg-white"
                                >
                                    <div class="relative">
                                        <img
                                            src="{{ asset($currentMedia->path) }}"
                                            alt="{{ $currentMedia->alt ?? $product->name }}"
                                            class="h-48 w-full object-cover"
                                        >

                                        <div class="absolute left-2 top-2 rounded-md bg-white/95 px-2 py-1 text-[9px] font-medium text-[#593114] shadow-sm">
                                            Image actuelle
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between px-3 py-2">
                                        <p class="truncate text-[10px] font-medium text-gray-600">
                                            {{ $currentMedia->filename }}
                                        </p>
                                    </div>
                                </div>
                            @endif

                            {{-- NOUVELLE IMAGE --}}
                            <label
                                for="image"
                                class="group relative flex cursor-pointer flex-col items-center justify-center rounded-md border border-dashed border-gray-300 bg-[#f8f8f8] px-4 py-8 transition hover:border-[#593114]/50 hover:bg-gray-50"
                            >
                                <input
                                    id="image"
                                    name="image"
                                    type="file"
                                    accept="image/jpeg,image/png,image/webp"
                                    class="hidden"
                                    onchange="previewProductImage(event)"
                                >

                                <div
                                    id="product-image-preview"
                                    class="mb-3 hidden w-full overflow-hidden rounded-md"
                                >
                                    <img
                                        id="product-preview"
                                        src=""
                                        alt="Aperçu"
                                        class="h-48 w-full object-cover"
                                    >
                                </div>

                                <div
                                    id="product-image-placeholder"
                                    class="flex flex-col items-center"
                                >
                                    <div class="mb-2 flex h-9 w-9 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm">
                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            class="h-5 w-5"
                                        >
                                            <path
                                                d="M4 5h16v14H4z"
                                                stroke-linejoin="round"
                                            />

                                            <circle
                                                cx="9"
                                                cy="10"
                                                r="1.5"
                                            />

                                            <path
                                                d="m4 17 4-4 3 3 2-2 7 5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </div>

                                    <p class="text-[11px] font-medium text-gray-600">
                                        Cliquez pour choisir une nouvelle image
                                    </p>

                                    <p class="mt-1 text-[10px] text-gray-400">
                                        JPG, PNG ou WEBP — 2 Mo maximum
                                    </p>
                                </div>

                                <button
                                    id="remove-product-image"
                                    type="button"
                                    onclick="removeProductImage(event)"
                                    class="mt-3 hidden rounded-md border border-gray-200 bg-white px-3 py-1.5 text-[10px] font-medium text-gray-600 transition hover:bg-gray-50"
                                >
                                    Supprimer la sélection
                                </button>
                            </label>
                        </div>

                    </div>
                </div>

                {{-- =================================================
                    ACTIONS
                ================================================== --}}
                <div class="flex items-center justify-end gap-2 border-t border-gray-100 bg-gray-50/70 px-6 py-4 sm:px-7">

                    <a
                        href="{{ route('admin.products.index') }}"
                        class="inline-flex h-9 items-center justify-center rounded-md border border-gray-200 bg-white px-4 text-[11px] font-medium text-gray-600 transition hover:bg-gray-50"
                    >
                        Annuler
                    </a>

                    <button
                        type="submit"
                        class="inline-flex h-9 items-center justify-center rounded-md bg-[#593114] px-4 text-[11px] font-medium text-white transition hover:bg-[#47270f]"
                    >
                        Enregistrer les modifications
                    </button>

                </div>
            </div>
        </form>
    </div>

    {{-- =========================================================
        APERÇU IMAGE
    ========================================================== --}}
    <script>
        function previewProductImage(event) {
            const input = event.target;
            const previewContainer = document.getElementById('product-image-preview');
            const preview = document.getElementById('product-preview');
            const placeholder = document.getElementById('product-image-placeholder');
            const removeButton = document.getElementById('remove-product-image');

            if (!input.files || !input.files[0]) {
                return;
            }

            const file = input.files[0];

            preview.src = URL.createObjectURL(file);

            previewContainer.classList.remove('hidden');
            placeholder.classList.add('hidden');
            removeButton.classList.remove('hidden');
        }

        function removeProductImage(event) {
            event.preventDefault();
            event.stopPropagation();

            const input = document.getElementById('image');
            const previewContainer = document.getElementById('product-image-preview');
            const preview = document.getElementById('product-preview');
            const placeholder = document.getElementById('product-image-placeholder');
            const removeButton = document.getElementById('remove-product-image');

            input.value = '';
            preview.src = '';

            previewContainer.classList.add('hidden');
            placeholder.classList.remove('hidden');
            removeButton.classList.add('hidden');
        }
    </script>
</x-admin-layout>