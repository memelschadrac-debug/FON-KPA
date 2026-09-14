<x-admin-layout>

    {{-- =========================================================
        PAGE : AJOUT D'UN PLAT
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
                Nouveau plat
            </h2>

            <p class="mt-1 text-[13px] text-gray-500">
                Ajoutez un nouveau plat au catalogue FON-KPA.
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
            action="{{ route('admin.products.store') }}"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                {{-- =================================================
                    CONTENU DU FORMULAIRE
                ================================================== --}}
                <div class="p-6 sm:p-7">

                    <div class="space-y-5">

                        {{-- =================================================
                            NOM DU PLAT
                        ================================================== --}}
                        <div>
                            <label
                                for="name"
                                class="mb-1.5 block text-[12px] font-medium text-gray-700"
                            >
                                Nom du plat
                            </label>

                            <div class="relative">

                                {{-- Icône --}}
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
                                    value="{{ old('name') }}"
                                    required
                                    placeholder="Ex. Garba Royal"
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

                                {{-- Icône --}}
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        class="h-4 w-4"
                                    >
                                        <path
                                            d="M4 5h16v14H4z"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M8 9h8M8 13h5"
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
                                    <option value="">Sélectionnez une catégorie</option>

                                    @foreach ($categories as $category)
                                        <option
                                            value="{{ $category->id }}"
                                            @selected(old('category_id') == $category->id)
                                        >
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                {{-- Flèche --}}
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

                                {{-- Icône --}}
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
                                    value="{{ old('slug') }}"
                                    placeholder="Ex. garba-royal"
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
                            >{{ old('description') }}</textarea>
                        </div>


                        {{-- =================================================
                            PRIX + TEMPS DE PRÉPARATION
                        ================================================== --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            {{-- Prix --}}
                            <div>
                                <label
                                    for="price"
                                    class="mb-1.5 block text-[12px] font-medium text-gray-700"
                                >
                                    Prix
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
                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="8"
                                            />
                                            <path
                                                d="M12 8v8M9.5 10h4a2 2 0 1 1 0 4h-4"
                                                stroke-linecap="round"
                                            />
                                        </svg>
                                    </div>

                                    <input
                                        id="price"
                                        name="price"
                                        type="number"
                                        min="0"
                                        step="0.01"
                                        value="{{ old('price') }}"
                                        required
                                        placeholder="Ex. 3500"
                                        class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-14 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                    >

                                    <span class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-[10px] font-medium text-gray-400">
                                        FCFA
                                    </span>

                                </div>
                            </div>


                            {{-- Temps --}}
                            <div>
                                <label
                                    for="preparation_time"
                                    class="mb-1.5 block text-[12px] font-medium text-gray-700"
                                >
                                    Temps de préparation
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
                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="8"
                                            />
                                            <path
                                                d="M12 7v5l3 2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </div>

                                    <input
                                        id="preparation_time"
                                        name="preparation_time"
                                        type="number"
                                        min="0"
                                        value="{{ old('preparation_time') }}"
                                        placeholder="Ex. 20"
                                        class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-14 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                    >

                                    <span class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-[10px] font-medium text-gray-400">
                                        min
                                    </span>

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

                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        class="h-4 w-4"
                                    >
                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="8"
                                        />
                                        <path
                                            d="m9 12 2 2 4-4"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </div>

                                <select
                                    id="status"
                                    name="status"
                                    required
                                    class="h-10 w-full appearance-none rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-9 text-[12px] text-gray-700 outline-none transition focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                >
                                    <option
                                        value="published"
                                        @selected(old('status', 'published') === 'published')
                                    >
                                        Publié
                                    </option>

                                    <option
                                        value="draft"
                                        @selected(old('status') === 'draft')
                                    >
                                        Brouillon
                                    </option>

                                    <option
                                        value="archived"
                                        @selected(old('status') === 'archived')
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
                            OPTIONS DU PLAT
                        ================================================== --}}
                        <div class="space-y-3">

                            {{-- Disponibilité --}}
                            <label class="flex cursor-pointer items-center gap-3">

                                <input
                                    type="checkbox"
                                    name="is_available"
                                    value="1"
                                    @checked(old('is_available', true))
                                    class="h-4 w-4 rounded border-gray-300 text-[#593114] focus:ring-[#593114]"
                                >

                                <span>
                                    <span class="block text-[12px] font-medium text-gray-700">
                                        Plat disponible
                                    </span>

                                    <span class="block text-[10px] text-gray-400">
                                        Le plat peut être commandé par les clients.
                                    </span>
                                </span>

                            </label>


                            {{-- Mis en avant --}}
                            <label class="flex cursor-pointer items-center gap-3">

                                <input
                                    type="checkbox"
                                    name="is_featured"
                                    value="1"
                                    @checked(old('is_featured'))
                                    class="h-4 w-4 rounded border-gray-300 text-[#593114] focus:ring-[#593114]"
                                >

                                <span>
                                    <span class="block text-[12px] font-medium text-gray-700">
                                        Mettre en avant
                                    </span>

                                    <span class="block text-[10px] text-gray-400">
                                        Afficher ce plat comme une sélection mise en avant.
                                    </span>
                                </span>

                            </label>

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

                            <div
                                id="image-container"
                                class="rounded-md border border-dashed border-gray-300 bg-[#f8f8f8] p-4 transition hover:border-[#593114]/50"
                            >

                                {{-- Zone de sélection --}}
                                <label
                                    for="image"
                                    id="upload-zone"
                                    class="flex cursor-pointer flex-col items-center justify-center rounded-md px-4 py-7 text-center transition hover:bg-white"
                                >

                                    {{-- Icône upload --}}
                                    <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-full bg-[#593114]/[0.07] text-[#593114]">
                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.6"
                                            class="h-5 w-5"
                                        >
                                            <path
                                                d="M12 16V4"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="m7 9 5-5 5 5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M5 20h14"
                                                stroke-linecap="round"
                                            />
                                        </svg>
                                    </div>

                                    <p class="text-[12px] font-medium text-gray-600">
                                        Ajouter l'image du plat
                                    </p>

                                    <p class="mt-1 text-[10px] text-gray-400">
                                        JPG, JPEG, PNG ou WEBP — 2 Mo maximum
                                    </p>

                                    <span class="mt-3 inline-flex h-8 items-center rounded-md bg-[#593114] px-3 text-[11px] font-medium text-white transition hover:bg-[#47270f]">
                                        Choisir une image
                                    </span>

                                </label>


                                {{-- Champ fichier --}}
                                <input
                                    id="image"
                                    name="image"
                                    type="file"
                                    accept="image/jpeg,image/png,image/webp"
                                    class="hidden"
                                    onchange="previewProductImage(event)"
                                >


                                {{-- Aperçu --}}
                                <div
                                    id="image-preview-container"
                                    class="hidden"
                                >

                                    <div class="relative overflow-hidden rounded-md border border-gray-200 bg-white">

                                        <img
                                            id="image-preview"
                                            src=""
                                            alt="Aperçu de l'image"
                                            class="h-48 w-full object-cover"
                                        >

                                        <button
                                            type="button"
                                            onclick="removeProductImage()"
                                            class="absolute right-2 top-2 flex h-7 w-7 items-center justify-center rounded-md bg-white/95 text-gray-500 shadow-sm transition hover:bg-red-50 hover:text-red-600"
                                            aria-label="Supprimer l'image"
                                        >
                                            <svg
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1.6"
                                                class="h-4 w-4"
                                            >
                                                <path
                                                    d="M6 6l12 12M18 6 6 18"
                                                    stroke-linecap="round"
                                                />
                                            </svg>
                                        </button>

                                    </div>

                                    <p
                                        id="image-name"
                                        class="mt-2 truncate text-[10px] text-gray-400"
                                    ></p>

                                </div>

                            </div>

                            <p class="mt-1.5 text-[10px] text-gray-400">
                                Cette image sera utilisée pour représenter le plat sur le catalogue FON-KPA.
                            </p>

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
                        Créer le plat
                    </button>

                </div>

            </div>

        </form>

    </div>


    {{-- =========================================================
        APERÇU DE L'IMAGE AVANT ENVOI
    ========================================================== --}}
    <script>
        function previewProductImage(event) {

            const file = event.target.files[0];

            if (!file) {
                return;
            }

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            const maxSize = 2 * 1024 * 1024;

            if (!allowedTypes.includes(file.type)) {
                alert('Veuillez sélectionner une image JPG, JPEG, PNG ou WEBP.');
                event.target.value = '';
                return;
            }

            if (file.size > maxSize) {
                alert('L’image ne doit pas dépasser 2 Mo.');
                event.target.value = '';
                return;
            }

            const preview = document.getElementById('image-preview');
            const previewContainer = document.getElementById('image-preview-container');
            const uploadZone = document.getElementById('upload-zone');
            const imageName = document.getElementById('image-name');

            preview.src = URL.createObjectURL(file);

            imageName.textContent = file.name;

            previewContainer.classList.remove('hidden');
            uploadZone.classList.add('hidden');
        }


        function removeProductImage() {

            const input = document.getElementById('image');
            const preview = document.getElementById('image-preview');
            const previewContainer = document.getElementById('image-preview-container');
            const uploadZone = document.getElementById('upload-zone');
            const imageName = document.getElementById('image-name');

            input.value = '';

            preview.src = '';

            imageName.textContent = '';

            previewContainer.classList.add('hidden');
            uploadZone.classList.remove('hidden');
        }
    </script>

</x-admin-layout>