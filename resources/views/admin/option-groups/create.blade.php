<x-admin-layout>

    {{-- ========================================================= --}}
    {{-- PAGE CRÉATION GROUPE D'OPTIONS                            --}}
    {{-- ========================================================= --}}

    <div class="space-y-6">

        {{-- ========================================================= --}}
        {{-- EN-TÊTE DE PAGE                                           --}}
        {{-- ========================================================= --}}

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-gray-400">
                    Catalogue
                </p>

                <h2 class="mt-1 text-2xl font-semibold tracking-tight text-[#593114]">
                    Ajouter un groupe d'options
                </h2>

                <p class="mt-1 text-[12px] text-gray-400">
                    Créez un groupe d'options associé à un plat.
                </p>

            </div>


            {{-- ===================================================== --}}
            {{-- RETOUR                                                 --}}
            {{-- ===================================================== --}}

            <a
                href="{{ route('admin.option-groups.index') }}"
                class="
                    inline-flex
                    items-center
                    justify-center
                    gap-2
                    rounded-xl
                    border
                    border-gray-200
                    bg-white
                    px-4
                    py-2.5
                    text-[13px]
                    font-semibold
                    text-gray-600
                    shadow-sm
                    transition
                    hover:border-[#593114]/20
                    hover:bg-[#593114]/[0.03]
                    hover:text-[#593114]
                "
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    class="h-4 w-4"
                >
                    <path
                        d="M19 12H5"
                        stroke-linecap="round"
                    />

                    <path
                        d="m12 19-7-7 7-7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>

                Retour aux groupes

            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- MESSAGE D'ERREUR                                          --}}
        {{-- ========================================================= --}}

        @if ($errors->any())

            <div
                class="
                    rounded-xl
                    border
                    border-red-100
                    bg-red-50
                    px-4
                    py-3
                    text-sm
                    text-red-700
                "
            >

                <div class="flex items-start gap-3">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        class="mt-0.5 h-5 w-5 shrink-0"
                    >
                        <path
                            d="M12 9v4"
                            stroke-linecap="round"
                        />

                        <path
                            d="M12 17h.01"
                            stroke-linecap="round"
                        />

                        <path
                            d="M10.3 4.6 2.8 17a2 2 0 0 0 1.7 3h15a2 2 0 0 0 1.7-3L13.7 4.6a2 2 0 0 0-3.4 0Z"
                            stroke-linejoin="round"
                        />
                    </svg>


                    <div>

                        <p class="font-semibold">
                            Vérifiez les informations saisies.
                        </p>

                        <ul class="mt-1 list-disc pl-4 text-[12px]">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- FORMULAIRE PRINCIPAL                                      --}}
        {{-- ========================================================= --}}

        <form
            method="POST"
            action="{{ route('admin.option-groups.store') }}"
            class="space-y-6"
        >

            @csrf


            {{-- ===================================================== --}}
            {{-- INFORMATIONS DU GROUPE                                --}}
            {{-- ===================================================== --}}

            <div
                class="
                    overflow-hidden
                    rounded-2xl
                    border
                    border-gray-200/80
                    bg-white
                    shadow-sm
                "
            >

                {{-- ================================================= --}}
                {{-- EN-TÊTE                                            --}}
                {{-- ================================================= --}}

                <div class="border-b border-gray-100 px-5 py-4">

                    <h3 class="text-sm font-semibold text-gray-900">
                        Informations du groupe
                    </h3>

                    <p class="mt-0.5 text-[12px] text-gray-400">
                        Définissez le plat et le nom du groupe d'options.
                    </p>

                </div>


                {{-- ================================================= --}}
                {{-- CONTENU                                            --}}
                {{-- ================================================= --}}

                <div class="space-y-5 p-5">


                    {{-- ================================================= --}}
                    {{-- PLAT                                              --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="product_id"
                            class="mb-2 block text-[12px] font-semibold text-gray-700"
                        >
                            Plat
                        </label>

                        <select
                            id="product_id"
                            name="product_id"
                            required
                            class="
                                h-10
                                w-full
                                rounded-md
                                border
                                border-gray-200
                                bg-[#f3f3f3]
                                px-3
                                text-[12px]
                                text-gray-700
                                outline-none
                                transition
                                focus:border-[#593114]
                                focus:ring-1
                                focus:ring-[#593114]
                            "
                        >

                            <option value="">
                                Sélectionnez un plat
                            </option>

                            @foreach ($products as $product)

                                <option
                                    value="{{ $product->id }}"
                                    {{ old('product_id') == $product->id ? 'selected' : '' }}
                                >
                                    {{ $product->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('product_id')

                            <p class="mt-1 text-[11px] text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ================================================= --}}
                    {{-- NOM DU GROUPE                                     --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="name"
                            class="mb-2 block text-[12px] font-semibold text-gray-700"
                        >
                            Nom du groupe
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            placeholder="Ex. Accompagnement au choix"
                            required
                            class="
                                h-10
                                w-full
                                rounded-md
                                border
                                border-gray-200
                                bg-[#f3f3f3]
                                px-3
                                text-[12px]
                                text-gray-700
                                placeholder:text-gray-400
                                outline-none
                                transition
                                focus:border-[#593114]
                                focus:ring-1
                                focus:ring-[#593114]
                            "
                        >

                        @error('name')

                            <p class="mt-1 text-[11px] text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- RÈGLES DE SÉLECTION                                      --}}
            {{-- ========================================================= --}}

            <div
                class="
                    overflow-hidden
                    rounded-2xl
                    border
                    border-gray-200/80
                    bg-white
                    shadow-sm
                "
            >

                {{-- ================================================= --}}
                {{-- EN-TÊTE                                            --}}
                {{-- ================================================= --}}

                <div class="border-b border-gray-100 px-5 py-4">

                    <h3 class="text-sm font-semibold text-gray-900">
                        Règles de sélection
                    </h3>

                    <p class="mt-0.5 text-[12px] text-gray-400">
                        Définissez les règles de sélection applicables au groupe.
                    </p>

                </div>


                {{-- ================================================= --}}
                {{-- CONTENU                                            --}}
                {{-- ================================================= --}}

                <div class="space-y-5 p-5">


                    {{-- ================================================= --}}
                    {{-- GROUPE OBLIGATOIRE                               --}}
                    {{-- ================================================= --}}

                    <div
                        class="
                            flex
                            items-center
                            justify-between
                            rounded-xl
                            border
                            border-gray-100
                            bg-gray-50/70
                            px-4
                            py-4
                        "
                    >

                        <div class="pr-4">

                            <p class="text-[13px] font-semibold text-gray-800">
                                Groupe obligatoire
                            </p>

                            <p class="mt-1 text-[11px] leading-5 text-gray-400">
                                Le client devra sélectionner au moins une option.
                            </p>

                        </div>


                        <label class="relative inline-flex cursor-pointer items-center">

                            <input
                                type="checkbox"
                                name="is_required"
                                value="1"
                                class="peer sr-only"
                                {{ old('is_required') ? 'checked' : '' }}
                            >

                            <div
                                class="
                                    h-6
                                    w-11
                                    rounded-full
                                    bg-gray-300
                                    transition
                                    peer-checked:bg-[#593114]
                                    peer-focus:ring-2
                                    peer-focus:ring-[#593114]/20
                                "
                            ></div>

                            <div
                                class="
                                    absolute
                                    left-0.5
                                    top-0.5
                                    h-5
                                    w-5
                                    rounded-full
                                    bg-white
                                    shadow-sm
                                    transition
                                    peer-checked:translate-x-5
                                "
                            ></div>

                        </label>

                    </div>


                    {{-- ================================================= --}}
                    {{-- MINIMUM / MAXIMUM                                --}}
                    {{-- ================================================= --}}

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">


                        {{-- ================================================= --}}
                        {{-- MINIMUM                                           --}}
                        {{-- ================================================= --}}

                        <div>

                            <label
                                for="min_choices"
                                class="mb-2 block text-[12px] font-semibold text-gray-700"
                            >
                                Nombre minimum de choix
                            </label>

                            <input
                                id="min_choices"
                                name="min_choices"
                                type="number"
                                min="0"
                                value="{{ old('min_choices', 0) }}"
                                required
                                class="
                                    h-10
                                    w-full
                                    rounded-md
                                    border
                                    border-gray-200
                                    bg-[#f3f3f3]
                                    px-3
                                    text-[12px]
                                    text-gray-700
                                    outline-none
                                    transition
                                    focus:border-[#593114]
                                    focus:ring-1
                                    focus:ring-[#593114]
                                "
                            >

                            <p class="mt-1 text-[10px] text-gray-400">
                                Exemple : 1 pour imposer un choix.
                            </p>

                            @error('min_choices')

                                <p class="mt-1 text-[11px] text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- ================================================= --}}
                        {{-- MAXIMUM                                           --}}
                        {{-- ================================================= --}}

                        <div>

                            <label
                                for="max_choices"
                                class="mb-2 block text-[12px] font-semibold text-gray-700"
                            >
                                Nombre maximum de choix
                            </label>

                            <input
                                id="max_choices"
                                name="max_choices"
                                type="number"
                                min="0"
                                value="{{ old('max_choices', 1) }}"
                                required
                                class="
                                    h-10
                                    w-full
                                    rounded-md
                                    border
                                    border-gray-200
                                    bg-[#f3f3f3]
                                    px-3
                                    text-[12px]
                                    text-gray-700
                                    outline-none
                                    transition
                                    focus:border-[#593114]
                                    focus:ring-1
                                    focus:ring-[#593114]
                                "
                            >

                            <p class="mt-1 text-[10px] text-gray-400">
                                Exemple : 4 pour autoriser jusqu'à 4 choix.
                            </p>

                            @error('max_choices')

                                <p class="mt-1 text-[11px] text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- ORDRE D'AFFICHAGE                                --}}
                    {{-- ================================================= --}}

                    <div class="sm:w-1/2">

                        <label
                            for="sort_order"
                            class="mb-2 block text-[12px] font-semibold text-gray-700"
                        >
                            Ordre d'affichage
                        </label>

                        <input
                            id="sort_order"
                            name="sort_order"
                            type="number"
                            min="0"
                            value="{{ old('sort_order', 0) }}"
                            class="
                                h-10
                                w-full
                                rounded-md
                                border
                                border-gray-200
                                bg-[#f3f3f3]
                                px-3
                                text-[12px]
                                text-gray-700
                                outline-none
                                transition
                                focus:border-[#593114]
                                focus:ring-1
                                focus:ring-[#593114]
                            "
                        >

                        <p class="mt-1 text-[10px] text-gray-400">
                            Plus le nombre est petit, plus le groupe apparaît tôt.
                        </p>

                        @error('sort_order')

                            <p class="mt-1 text-[11px] text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- ACTIONS                                                    --}}
            {{-- ========================================================= --}}

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                {{-- ===================================================== --}}
                {{-- ANNULER                                                --}}
                {{-- ===================================================== --}}

                <a
                    href="{{ route('admin.option-groups.index') }}"
                    class="
                        inline-flex
                        items-center
                        justify-center
                        rounded-xl
                        border
                        border-gray-200
                        bg-white
                        px-5
                        py-2.5
                        text-[12px]
                        font-semibold
                        text-gray-600
                        transition
                        hover:bg-gray-50
                        hover:text-gray-800
                    "
                >
                    Annuler
                </a>


                {{-- ===================================================== --}}
                {{-- CRÉER                                                   --}}
                {{-- ===================================================== --}}

                <button
                    type="submit"
                    class="
                        inline-flex
                        items-center
                        justify-center
                        gap-2
                        rounded-xl
                        bg-[#593114]
                        px-5
                        py-2.5
                        text-[12px]
                        font-semibold
                        text-white
                        shadow-sm
                        transition
                        hover:bg-[#47270f]
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#593114]/20
                    "
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        class="h-4 w-4"
                    >
                        <path
                            d="M12 5v14"
                            stroke-linecap="round"
                        />

                        <path
                            d="M5 12h14"
                            stroke-linecap="round"
                        />
                    </svg>

                    Créer le groupe

                </button>

            </div>

        </form>

    </div>

</x-admin-layout>