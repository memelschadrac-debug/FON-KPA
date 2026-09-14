<x-admin-layout>

    <div class="space-y-6">

        {{-- ========================================================= --}}
        {{-- HEADER / BREADCRUMB                                       --}}
        {{-- ========================================================= --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>

                {{-- BREADCRUMB --}}
                @include('admin.partials.breadcrumb', [
                    'section' => 'Catalogue',
                    'page' => "Choix d'options",
                    'current' => 'Ajouter',
                ])

            </div>

            {{-- RETOUR --}}
            <a
                href="{{ route('admin.option-choices.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 shadow-sm transition hover:border-gray-300 hover:bg-gray-50"
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

                Retour aux choix

            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- ERREURS DE VALIDATION                                     --}}
        {{-- ========================================================= --}}
        @if ($errors->any())

            <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3">

                <div class="flex gap-3">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="mt-0.5 h-5 w-5 shrink-0 text-red-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v3.75m0 3.75h.007M10.29 3.86 2.82 17.25A1.5 1.5 0 0 0 4.13 19.5h15.74a1.5 1.5 0 0 0 1.31-2.25L13.71 3.86a2 2 0 0 0-3.42 0Z"
                        />
                    </svg>

                    <div>

                        <p class="text-sm font-semibold text-red-700">
                            Vérifiez les informations saisies.
                        </p>

                        <ul class="mt-1 list-disc pl-4 text-xs text-red-600">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- FORMULAIRE                                                --}}
        {{-- ========================================================= --}}
        <form
            method="POST"
            action="{{ route('admin.option-choices.store') }}"
            x-data="{
                available: {{ old('is_available', true) ? 'true' : 'false' }}
            }"
        >

            @csrf


            {{-- ===================================================== --}}
            {{-- INFORMATIONS DU CHOIX                                  --}}
            {{-- ===================================================== --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                <div class="border-b border-gray-100 px-6 py-5">

                    <h3 class="text-sm font-semibold text-gray-900">
                        Informations du choix
                    </h3>

                    <p class="mt-1 text-[12px] text-gray-400">
                        Définissez le choix proposé au client.
                    </p>

                </div>


                <div class="space-y-5 px-6 py-6">

                    {{-- GROUPE --}}
                    <div>

                        <label
                            for="option_group_id"
                            class="mb-2 block text-[12px] font-semibold text-gray-700"
                        >
                            Groupe d'options
                            <span class="text-[#E25F12]">*</span>
                        </label>

                        <select
                            id="option_group_id"
                            name="option_group_id"
                            required
                            class="block h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] px-3 text-[12px] text-gray-700 outline-none transition focus:border-[#593114] focus:bg-white focus:ring-1 focus:ring-[#593114]"
                        >

                            <option value="">
                                Sélectionnez un groupe
                            </option>

                            @foreach ($optionGroups as $optionGroup)

                                <option
                                    value="{{ $optionGroup->id }}"
                                    @selected(
                                        old(
                                            'option_group_id',
                                            $selectedOptionGroupId ?? null
                                        ) == $optionGroup->id
                                    )
                                >
                                    {{ $optionGroup->name }}

                                    @if ($optionGroup->product)
                                        — {{ $optionGroup->product->name }}
                                    @endif

                                </option>

                            @endforeach

                        </select>

                        @error('option_group_id')

                            <p class="mt-1.5 text-[11px] text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- NOM --}}
                    <div>

                        <label
                            for="name"
                            class="mb-2 block text-[12px] font-semibold text-gray-700"
                        >
                            Nom du choix
                            <span class="text-[#E25F12]">*</span>
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            required
                            maxlength="255"
                            placeholder="Ex. Attiéké"
                            class="block h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] px-3 text-[12px] text-gray-700 placeholder:text-gray-400 outline-none transition focus:border-[#593114] focus:bg-white focus:ring-1 focus:ring-[#593114]"
                        >

                        @error('name')

                            <p class="mt-1.5 text-[11px] text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- PRIX + ORDRE --}}
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        {{-- PRIX --}}
                        <div>

                            <label
                                for="price_modifier"
                                class="mb-2 block text-[12px] font-semibold text-gray-700"
                            >
                                Prix supplémentaire
                            </label>

                            <div class="relative">

                                <input
                                    id="price_modifier"
                                    name="price_modifier"
                                    type="number"
                                    value="{{ old('price_modifier', 0) }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="0"
                                    class="block h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] px-3 pr-16 text-[12px] text-gray-700 placeholder:text-gray-400 outline-none transition focus:border-[#593114] focus:bg-white focus:ring-1 focus:ring-[#593114]"
                                >

                                <span
                                    class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-[11px] font-semibold text-gray-400"
                                >
                                    FCFA
                                </span>

                            </div>

                            <p class="mt-1.5 text-[11px] text-gray-400">
                                Laissez 0 si le choix est gratuit.
                            </p>

                            @error('price_modifier')

                                <p class="mt-1.5 text-[11px] text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- ORDRE --}}
                        <div>

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
                                value="{{ old('sort_order', 0) }}"
                                min="0"
                                placeholder="0"
                                class="block h-10 w-full rounded-md border border-gray-200 bg-[#f3f3f3] px-3 text-[12px] text-gray-700 placeholder:text-gray-400 outline-none transition focus:border-[#593114] focus:bg-white focus:ring-1 focus:ring-[#593114]"
                            >

                            <p class="mt-1.5 text-[11px] text-gray-400">
                                Plus le nombre est petit, plus le choix apparaît en premier.
                            </p>

                            @error('sort_order')

                                <p class="mt-1.5 text-[11px] text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- DISPONIBILITÉ                                          --}}
            {{-- ===================================================== --}}
            <div class="mt-6 overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                <div class="border-b border-gray-100 px-6 py-5">

                    <h3 class="text-sm font-semibold text-gray-900">
                        Disponibilité
                    </h3>

                    <p class="mt-1 text-[12px] text-gray-400">
                        Contrôlez si ce choix peut actuellement être sélectionné par les clients.
                    </p>

                </div>


                <div class="px-6 py-5">

                    <div class="flex items-center justify-between gap-6">

                        <div>

                            <p class="text-[13px] font-medium text-gray-800">
                                Choix disponible
                            </p>

                            <p class="mt-1 text-[11px] text-gray-400">
                                Un choix indisponible ne sera pas proposé au client.
                            </p>

                        </div>


                        {{-- TOGGLE --}}
                        <button
                            type="button"
                            @click="available = !available"
                            class="relative flex h-6 w-11 shrink-0 cursor-pointer items-center rounded-full p-1 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-[#593114]/20"
                            :class="available ? 'bg-[#593114]' : 'bg-gray-300'"
                            role="switch"
                            :aria-checked="available"
                        >

                            <span
                                class="block h-4 w-4 shrink-0 rounded-full bg-white shadow-sm transition-transform duration-200 ease-in-out"
                                :class="available ? 'translate-x-5' : 'translate-x-0'"
                            ></span>

                        </button>

                    </div>


                    <input
                        type="hidden"
                        name="is_available"
                        :value="available ? 1 : 0"
                    >

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- ACTIONS                                                 --}}
            {{-- ===================================================== --}}
            <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-end">

                <a
                    href="{{ route('admin.option-choices.index') }}"
                    class="inline-flex h-10 items-center justify-center rounded-lg border border-gray-200 bg-white px-5 text-[12px] font-semibold text-gray-600 transition hover:bg-gray-50"
                >
                    Annuler
                </a>

                <button
                    type="submit"
                    class="inline-flex h-10 items-center justify-center gap-2 rounded-lg bg-[#593114] px-5 text-[12px] font-semibold text-white shadow-sm transition hover:bg-[#4b2810] focus:outline-none focus:ring-2 focus:ring-[#593114]/20"
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
                            d="M12 5v14m-7-7h14"
                        />
                    </svg>

                    Créer le choix

                </button>

            </div>

        </form>

    </div>

</x-admin-layout>
