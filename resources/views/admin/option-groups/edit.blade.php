<x-admin-layout>

    <div class="space-y-6">

        {{-- ========================================================= --}}
        {{-- HEADER                                                     --}}
        {{-- ========================================================= --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <div class="flex items-center gap-2 text-[12px] font-medium text-gray-400">
                    <span>Catalogue</span>

                    <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            fill-rule="evenodd"
                            d="M7.21 14.77a.75.75 0 01.02-1.06L10.94 10 7.23 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.08 0z"
                            clip-rule="evenodd"
                        />
                    </svg>

                    <span>Groupes d'options</span>

                    <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            fill-rule="evenodd"
                            d="M7.21 14.77a.75.75 0 01.02-1.06L10.94 10 7.23 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.08 0z"
                            clip-rule="evenodd"
                        />
                    </svg>

                    <span class="text-[#593114]">Modifier</span>
                </div>

                <h2 class="mt-1 text-2xl font-semibold tracking-tight text-gray-900">
                    Modifier le groupe d'options
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Modifiez les informations et les règles de sélection du groupe.
                </p>
            </div>

            <a
                href="{{ route('admin.option-groups.show', $optionGroup) }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50"
            >
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        fill-rule="evenodd"
                        d="M17 10a.75.75 0 01-.75.75H5.56l3.22 3.22a.75.75 0 11-1.06 1.06l-4.5-4.5a.75.75 0 010-1.06l4.5-4.5a.75.75 0 111.06 1.06l-3.22 3.22h10.69A.75.75 0 0117 10z"
                        clip-rule="evenodd"
                    />
                </svg>

                Retour
            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- VALIDATION ERRORS                                           --}}
        {{-- ========================================================= --}}
        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3">
                <div class="flex items-start gap-3">

                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 011.06 0L10 7.94l.66-.72a.75.75 0 111.08 1.04L11.02 9l.72.78a.75.75 0 11-1.08 1.04L10 10.06l-.66.72a.75.75 0 11-1.08-1.04L8.98 9l-.7-.72a.75.75 0 010-1.06z"
                            clip-rule="evenodd"
                        />
                    </svg>

                    <div>
                        <p class="text-sm font-semibold text-red-700">
                            Impossible d'enregistrer les modifications.
                        </p>

                        <ul class="mt-1 list-disc pl-5 text-[12px] text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        @endif


        {{-- ========================================================= --}}
        {{-- FORM                                                        --}}
        {{-- ========================================================= --}}
        <form
            method="POST"
            action="{{ route('admin.option-groups.update', $optionGroup) }}"
            class="space-y-6"
        >
            @csrf
            @method('PUT')


            {{-- ===================================================== --}}
            {{-- INFORMATIONS DU GROUPE                                  --}}
            {{-- ===================================================== --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                <div class="border-b border-gray-100 px-6 py-5">
                    <h2 class="text-sm font-semibold text-gray-900">
                        Informations du groupe
                    </h2>

                    <p class="mt-1 text-[12px] text-gray-400">
                        Définissez le plat et le nom du groupe d'options.
                    </p>
                </div>

                <div class="space-y-5 px-6 py-6">

                    {{-- Plat --}}
                    <div>
                        <label
                            for="product_id"
                            class="mb-2 block text-[12px] font-medium text-gray-700"
                        >
                            Plat associé
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="product_id"
                            name="product_id"
                            required
                            class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] px-3 text-[12px] text-gray-700 outline-none transition focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                        >
                            <option value="">Sélectionner un plat</option>

                            @foreach ($products as $product)
                                <option
                                    value="{{ $product->id }}"
                                    @selected(old('product_id', $optionGroup->product_id) == $product->id)
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


                    {{-- Nom --}}
                    <div>
                        <label
                            for="name"
                            class="mb-2 block text-[12px] font-medium text-gray-700"
                        >
                            Nom du groupe
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', $optionGroup->name) }}"
                            placeholder="Ex. Accompagnement au choix"
                            required
                            class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] px-3 text-[12px] text-gray-700 placeholder:text-gray-400 outline-none transition focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                        >

                        @error('name')
                            <p class="mt-1 text-[11px] text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>
            </div>


            {{-- ===================================================== --}}
            {{-- REGLES DE SELECTION                                    --}}
            {{-- ===================================================== --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                <div class="border-b border-gray-100 px-6 py-5">
                    <h2 class="text-sm font-semibold text-gray-900">
                        Règles de sélection
                    </h2>

                    <p class="mt-1 text-[12px] text-gray-400">
                        Définissez comment le client pourra sélectionner les options.
                    </p>
                </div>

                <div class="space-y-5 px-6 py-6">

                    {{-- Obligatoire --}}
                    <div
                        x-data="{ required: {{ old('is_required', $optionGroup->is_required) ? 'true' : 'false' }} }"
                        class="flex items-center justify-between rounded-xl border border-gray-100 bg-gray-50/70 px-4 py-4"
                    >
                        <div class="pr-4">
                            <p class="text-sm font-medium text-gray-800">
                                Groupe obligatoire
                            </p>

                            <p class="mt-1 text-[11px] text-gray-400">
                                Le client devra effectuer une sélection dans ce groupe.
                            </p>
                        </div>
                    
                        <button
                            type="button"
                            @click="required = !required"
                            class="relative flex h-6 w-11 shrink-0 cursor-pointer items-center rounded-full p-1 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-[#593114]/20"
                            :class="required ? 'bg-[#593114]' : 'bg-gray-300'"
                            role="switch"
                            :aria-checked="required"
                        >
                            <span
                                class="block h-4 w-4 shrink-0 rounded-full bg-white shadow-sm transition-transform duration-200 ease-in-out"
                                :class="required ? 'translate-x-5' : 'translate-x-0'"
                            ></span>
                        </button>

                        <input
                            type="hidden"
                            name="is_required"
                            :value="required ? 1 : 0"
                        >
                    </div>


                    {{-- Min / Max --}}
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label
                                for="min_choices"
                                class="mb-2 block text-[12px] font-medium text-gray-700"
                            >
                                Nombre minimum de choix
                            </label>

                            <input
                                id="min_choices"
                                name="min_choices"
                                type="number"
                                min="0"
                                value="{{ old('min_choices', $optionGroup->min_choices) }}"
                                class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] px-3 text-[12px] text-gray-700 outline-none transition focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                            >

                            @error('min_choices')
                                <p class="mt-1 text-[11px] text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div>
                            <label
                                for="max_choices"
                                class="mb-2 block text-[12px] font-medium text-gray-700"
                            >
                                Nombre maximum de choix
                            </label>

                            <input
                                id="max_choices"
                                name="max_choices"
                                type="number"
                                min="0"
                                value="{{ old('max_choices', $optionGroup->max_choices) }}"
                                class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] px-3 text-[12px] text-gray-700 outline-none transition focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                            >

                            @error('max_choices')
                                <p class="mt-1 text-[11px] text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>


                    {{-- Ordre --}}
                    <div>
                        <label
                            for="sort_order"
                            class="mb-2 block text-[12px] font-medium text-gray-700"
                        >
                            Ordre d'affichage
                        </label>

                        <input
                            id="sort_order"
                            name="sort_order"
                            type="number"
                            min="0"
                            value="{{ old('sort_order', $optionGroup->sort_order) }}"
                            class="h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] px-3 text-[12px] text-gray-700 outline-none transition focus:border-[#593114] focus:ring-1 focus:ring-[#593114]"
                        >

                        <p class="mt-1.5 text-[11px] text-gray-400">
                            Plus la valeur est faible, plus le groupe apparaîtra en premier.
                        </p>

                        @error('sort_order')
                            <p class="mt-1 text-[11px] text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>
            </div>


            {{-- ===================================================== --}}
            {{-- ACTIONS                                                  --}}
            {{-- ===================================================== --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-end">

                <a
                    href="{{ route('admin.option-groups.show', $optionGroup) }}"
                    class="inline-flex h-10 items-center justify-center rounded-lg border border-gray-200 bg-white px-5 text-[12px] font-medium text-gray-600 transition hover:bg-gray-50"
                >
                    Annuler
                </a>

                <button
                    type="submit"
                    class="inline-flex h-10 items-center justify-center gap-2 rounded-lg bg-[#593114] px-5 text-[12px] font-medium text-white shadow-sm transition hover:bg-[#4a270f]"
                >
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M13.586 3.586a2 2 0 012.828 2.828l-8.5 8.5a2 2 0 01-.878.497l-3.11.777.777-3.11a2 2 0 01.497-.878l8.386-8.614z"
                        />
                        <path
                            d="M12.172 5l2.828 2.828"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                        />
                    </svg>

                    Enregistrer les modifications
                </button>

            </div>

        </form>

    </div>

</x-admin-layout>