<x-admin-layout>

    {{-- =========================================================
        PAGE : AJOUT D'UNE CATÉGORIE
    ========================================================== --}}

    <div class="mx-auto max-w-3xl">

        {{-- =====================================================
            RETOUR
        ====================================================== --}}
        <div class="mb-5">
            <a
                href="{{ route('admin.categories.index') }}"
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

                Retour aux catégories
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
                Nouvelle catégorie
            </h2>

            <p class="mt-1 text-[13px] text-gray-500">
                Créez une nouvelle catégorie pour organiser les plats disponibles sur FON-KPA.
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
            action="{{ route('admin.categories.store') }}"
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
                            NOM
                        ================================================== --}}
                        <div>
                            <label
                                for="name"
                                class="mb-1.5 block text-[12px] font-medium text-gray-700"
                            >
                                Nom de la catégorie
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
                                    placeholder="Ex. Grillades"
                                    class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-3 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                >
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
                                    required
                                    placeholder="Ex. grillades"
                                    class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] pl-9 pr-3 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                                >
                            </div>

                            <p class="mt-1.5 text-[10px] text-gray-400">
                                Utilisé dans les URLs. Exemple : grillades
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
                                placeholder="Décrivez brièvement cette catégorie..."
                                class="w-full resize-none rounded-md border border-gray-200 bg-[#f3f3f3] px-3 py-2.5 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                            >{{ old('description') }}</textarea>
                        </div>


                        {{-- =================================================
                            IMAGE DE LA CATÉGORIE
                        ================================================== --}}
                        <div>

                            <label
                                for="image"
                                class="mb-1.5 block text-[12px] font-medium text-gray-700"
                            >
                                Image de la catégorie
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
                                        Ajouter l'image de la catégorie
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
                                    onchange="previewCategoryImage(event)"
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
                                            onclick="removeCategoryImage()"
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
                                Cette image représentera la catégorie sur le catalogue FON-KPA.
                            </p>

                        </div>

                    </div>
                </div>


                {{-- =================================================
                    ACTIONS
                ================================================== --}}
                <div class="flex items-center justify-end gap-2 border-t border-gray-100 bg-gray-50/70 px-6 py-4 sm:px-7">

                    <a
                        href="{{ route('admin.categories.index') }}"
                        class="inline-flex h-9 items-center justify-center rounded-md border border-gray-200 bg-white px-4 text-[11px] font-medium text-gray-600 transition hover:bg-gray-50"
                    >
                        Annuler
                    </a>

                    <button
                        type="submit"
                        class="inline-flex h-9 items-center justify-center rounded-md bg-[#593114] px-4 text-[11px] font-medium text-white transition hover:bg-[#47270f]"
                    >
                        Créer la catégorie
                    </button>

                </div>

            </div>

        </form>

    </div>


    {{-- =========================================================
        APERÇU DE L'IMAGE AVANT ENVOI
    ========================================================== --}}
    <script>
        function previewCategoryImage(event) {

            const file = event.target.files[0];

            if (!file) {
                return;
            }

            const preview = document.getElementById('image-preview');
            const previewContainer = document.getElementById('image-preview-container');
            const uploadZone = document.getElementById('upload-zone');
            const imageName = document.getElementById('image-name');

            // Crée une URL temporaire pour afficher l'image sélectionnée.
            preview.src = URL.createObjectURL(file);

            // Affiche le nom du fichier.
            imageName.textContent = file.name;

            // Affiche l'aperçu et masque la zone d'upload.
            previewContainer.classList.remove('hidden');
            uploadZone.classList.add('hidden');
        }


        function removeCategoryImage() {

            const input = document.getElementById('image');
            const preview = document.getElementById('image-preview');
            const previewContainer = document.getElementById('image-preview-container');
            const uploadZone = document.getElementById('upload-zone');
            const imageName = document.getElementById('image-name');

            // Réinitialise le champ fichier.
            input.value = '';

            // Supprime l'aperçu.
            preview.src = '';

            // Réinitialise le nom du fichier.
            imageName.textContent = '';

            // Réaffiche la zone de sélection.
            previewContainer.classList.add('hidden');
            uploadZone.classList.remove('hidden');
        }
    </script>

</x-admin-layout>