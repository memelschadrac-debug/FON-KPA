<x-admin-layout>

    <div class="mx-auto max-w-3xl">

        {{-- ========================================================= --}}
        {{-- HEADER                                                     --}}
        {{-- ========================================================= --}}

        <div class="mb-6">

            <a
                href="{{ route('admin.media.index') }}"
                class="mb-4 inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition hover:text-[#593114]"
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
                        d="M15 19l-7-7 7-7"
                    />
                </svg>

                Retour aux médias
            </a>

            <div>
                <p class="text-sm font-medium text-gray-500">
                    Catalogue
                </p>

                <h2 class="mt-1 text-2xl font-semibold tracking-tight text-gray-900">
                    Ajouter un média
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Ajoutez une image à la bibliothèque multimédia de FON-KPA.
                </p>
            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- ERREURS                                                    --}}
        {{-- ========================================================= --}}

        @if ($errors->any())

            <div class="mb-6 rounded-md border border-red-200 bg-red-50 p-4">

                <div class="flex gap-3">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="mt-0.5 h-5 w-5 shrink-0 text-red-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 9v4m0 4h.01M10.29 3.86l-7.82 13.5A2 2 0 004.2 20h15.6a2 2 0 001.73-2.64l-7.82-13.5a2 2 0 00-3.42 0z"
                        />
                    </svg>

                    <div>

                        <p class="text-sm font-semibold text-red-800">
                            Impossible d'ajouter le média.
                        </p>

                        <ul class="mt-1 list-disc pl-5 text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- FORMULAIRE                                                 --}}
        {{-- ========================================================= --}}

        <form
            action="{{ route('admin.media.store') }}"
            method="POST"
            enctype="multipart/form-data"
            x-data="mediaUpload()"
        >

            @csrf

            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                <div class="p-6 sm:p-7">

                    {{-- ================================================= --}}
                    {{-- IMAGE                                               --}}
                    {{-- ================================================= --}}

                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Image
                            <span class="text-red-500">*</span>
                        </label>

                        <p class="mt-1 text-xs text-gray-500">
                            JPG, JPEG, PNG ou WebP. Taille maximale : 5 Mo.
                        </p>


                        {{-- Upload --}}
                        <div
                            x-show="!preview"
                            class="mt-4"
                        >

                            <label
                                for="image"
                                class="group flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 px-6 py-12 text-center transition hover:border-[#593114] hover:bg-[#593114]/5"
                            >

                                <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#593114]/10 text-[#593114] transition group-hover:bg-[#593114] group-hover:text-white">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-7 w-7"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.7"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 001 1v14a1 1 0 001 1z"
                                        />
                                    </svg>

                                </div>

                                <span class="mt-4 text-sm font-semibold text-gray-700">
                                    Cliquez pour choisir une image
                                </span>

                                <span class="mt-1 text-xs text-gray-500">
                                    ou glissez-déposez votre fichier ici
                                </span>

                                <span class="mt-3 rounded-full bg-gray-100 px-3 py-1 text-[11px] font-medium text-gray-500">
                                    JPG · PNG · WEBP
                                </span>

                                <input
                                    id="image"
                                    name="image"
                                    type="file"
                                    accept="image/jpeg,image/png,image/webp"
                                    class="hidden"
                                    @change="previewImage($event)"
                                >

                            </label>

                        </div>


                        {{-- Preview --}}
                        <div
                            x-show="preview"
                            x-cloak
                            class="mt-4 overflow-hidden rounded-lg border border-gray-200 bg-gray-50"
                        >

                            <div class="relative">

                                <img
                                    :src="preview"
                                    alt="Aperçu du média"
                                    class="max-h-[420px] w-full object-contain bg-gray-100"
                                >

                                <button
                                    type="button"
                                    @click="removeImage()"
                                    class="absolute right-3 top-3 btn btn-sm border-0 bg-white text-gray-700 shadow-md hover:bg-red-50 hover:text-red-600"
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
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>

                                    Retirer
                                </button>

                            </div>


                            <div class="flex items-center justify-between gap-4 border-t border-gray-200 px-4 py-3">

                                <div class="min-w-0">

                                    <p
                                        class="truncate text-sm font-medium text-gray-800"
                                        x-text="fileName"
                                    ></p>

                                    <p
                                        class="mt-0.5 text-xs text-gray-500"
                                        x-text="fileSize"
                                    ></p>

                                </div>

                                <span class="shrink-0 rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700">
                                    Image sélectionnée
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- ALT                                                   --}}
                    {{-- ================================================= --}}

                    <div class="mt-7">

                        <label
                            for="alt"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Texte alternatif
                        </label>

                        <input
                            id="alt"
                            name="alt"
                            type="text"
                            value="{{ old('alt') }}"
                            placeholder="Ex. Poulet braisé accompagné d'attiéké"
                            class="input mt-2 h-10 w-full border-gray-200 bg-[#f3f3f3] text-sm focus:border-[#593114] focus:outline-none focus:ring-1 focus:ring-[#593114]"
                        >

                        <p class="mt-1.5 text-xs text-gray-500">
                            Décrivez brièvement l'image pour améliorer son accessibilité.
                        </p>

                    </div>


                    {{-- ================================================= --}}
                    {{-- LÉGENDE                                              --}}
                    {{-- ================================================= --}}

                    <div class="mt-6">

                        <label
                            for="caption"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Légende
                        </label>

                        <textarea
                            id="caption"
                            name="caption"
                            rows="4"
                            placeholder="Ajoutez une description ou une note concernant cette image..."
                            class="textarea mt-2 w-full resize-none border-gray-200 bg-[#f3f3f3] text-sm focus:border-[#593114] focus:outline-none focus:ring-1 focus:ring-[#593114]"
                        >{{ old('caption') }}</textarea>

                        <p class="mt-1.5 text-xs text-gray-500">
                            Facultatif. Cette information pourra être utilisée dans le contenu du site.
                        </p>

                    </div>


                    {{-- ================================================= --}}
                    {{-- INFORMATION                                         --}}
                    {{-- ================================================= --}}

                    <div class="mt-7 rounded-lg border border-[#593114]/10 bg-[#593114]/5 p-4">

                        <div class="flex gap-3">

                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#593114]/10 text-[#593114]">

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
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>

                            </div>

                            <div>

                                <p class="text-sm font-medium text-[#593114]">
                                    Bibliothèque FON-KPA
                                </p>

                                <p class="mt-1 text-xs leading-5 text-gray-600">
                                    L'image sera enregistrée localement dans la bibliothèque
                                    multimédia de votre application.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- ACTIONS                                                     --}}
                {{-- ========================================================= --}}

                <div class="flex flex-col-reverse gap-3 border-t border-gray-100 bg-gray-50/70 px-6 py-4 sm:flex-row sm:items-center sm:justify-end sm:px-7">

                    <a
                        href="{{ route('admin.media.index') }}"
                        class="btn border-gray-200 bg-white px-5 text-gray-700 hover:bg-gray-50"
                    >
                        Annuler
                    </a>

                    <button
                        type="submit"
                        class="btn border-0 bg-[#593114] px-5 text-white shadow-sm hover:bg-[#47260f]"
                        :disabled="uploading"
                    >

                        <span
                            x-show="!uploading"
                            class="flex items-center gap-2"
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
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-3 3m0 0l-3-3m3 3V4"
                                />
                            </svg>

                            Ajouter le média
                        </span>

                        <span
                            x-show="uploading"
                            x-cloak
                            class="flex items-center gap-2"
                        >
                            <span class="loading loading-spinner loading-xs"></span>
                            Téléversement...
                        </span>

                    </button>

                </div>

            </div>

        </form>

    </div>


    {{-- ============================================================= --}}
    {{-- ALPINE.JS                                                     --}}
    {{-- ============================================================= --}}

    <script>
        function mediaUpload() {
            return {
                preview: null,
                fileName: '',
                fileSize: '',
                uploading: false,

                previewImage(event) {

                    const file = event.target.files[0];

                    if (!file) {
                        return;
                    }

                    if (!file.type.startsWith('image/')) {
                        event.target.value = '';
                        return;
                    }

                    this.fileName = file.name;
                    this.fileSize = this.formatSize(file.size);

                    this.preview = URL.createObjectURL(file);
                },

                removeImage() {

                    const input = document.getElementById('image');

                    input.value = '';

                    if (this.preview) {
                        URL.revokeObjectURL(this.preview);
                    }

                    this.preview = null;
                    this.fileName = '';
                    this.fileSize = '';
                },

                formatSize(bytes) {

                    if (bytes === 0) {
                        return '0 B';
                    }

                    const units = ['B', 'KB', 'MB', 'GB'];

                    const i = Math.floor(
                        Math.log(bytes) / Math.log(1024)
                    );

                    return (
                        parseFloat(
                            (bytes / Math.pow(1024, i)).toFixed(1)
                        ) +
                        ' ' +
                        units[i]
                    );
                }
            }
        }
    </script>

</x-admin-layout>