<x-admin-layout>

    {{-- ========================================================= --}}
    {{-- PAGE DÉTAIL DU GROUPE                                     --}}
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
                    {{ $optionGroup->name }}
                </h2>

                <p class="mt-1 text-[12px] text-gray-400">
                    Détails du groupe et gestion de ses choix.
                </p>

            </div>


            {{-- ===================================================== --}}
            {{-- ACTIONS HEADER                                         --}}
            {{-- ===================================================== --}}

            <div class="flex flex-wrap items-center gap-2">

                {{-- Retour --}}
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

                    Retour

                </a>


                {{-- Modifier --}}
                <a
                    href="{{ route('admin.option-groups.edit', $optionGroup) }}"
                    class="
                        inline-flex
                        items-center
                        justify-center
                        gap-2
                        rounded-xl
                        bg-[#593114]
                        px-4
                        py-2.5
                        text-[13px]
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
                        stroke-width="1.7"
                        class="h-4 w-4"
                    >
                        <path
                            d="M12 20h9"
                            stroke-linecap="round"
                        />

                        <path
                            d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4Z"
                            stroke-linejoin="round"
                        />
                    </svg>

                    Modifier

                </a>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- INFORMATIONS PRINCIPALES                                 --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

            {{-- ===================================================== --}}
            {{-- GROUPE                                                 --}}
            {{-- ===================================================== --}}

            <div
                class="
                    overflow-hidden
                    rounded-2xl
                    border
                    border-gray-200/80
                    bg-white
                    shadow-sm
                    xl:col-span-2
                "
            >

                {{-- Header --}}
                <div class="border-b border-gray-100 px-6 py-5">

                    <div class="flex items-center gap-3">

                        <div
                            class="
                                flex
                                h-11
                                w-11
                                shrink-0
                                items-center
                                justify-center
                                rounded-xl
                                bg-[#593114]/[0.07]
                                text-[#593114]
                            "
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                class="h-5 w-5"
                            >

                                <path
                                    d="M5 5h14v14H5z"
                                    stroke-linejoin="round"
                                />

                                <path
                                    d="M8 9h8M8 12h8M8 15h5"
                                    stroke-linecap="round"
                                />

                            </svg>

                        </div>


                        <div class="min-w-0">

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Groupe d'options
                            </p>

                            <h3 class="mt-0.5 truncate text-base font-semibold text-gray-900">
                                {{ $optionGroup->name }}
                            </h3>

                        </div>

                    </div>

                </div>


                {{-- Informations --}}
                <div class="p-6">

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">


                        {{-- ================================================= --}}
                        {{-- PLAT                                               --}}
                        {{-- ================================================= --}}

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Plat associé
                            </p>

                            @if ($optionGroup->product)

                                <a
                                    href="{{ route('admin.products.show', $optionGroup->product) }}"
                                    class="mt-2 inline-flex items-center gap-2 text-[13px] font-semibold text-gray-700 transition hover:text-[#593114]"
                                >

                                    <span>
                                        {{ $optionGroup->product->name }}
                                    </span>

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.7"
                                        class="h-3.5 w-3.5"
                                    >
                                        <path
                                            d="M7 17 17 7"
                                            stroke-linecap="round"
                                        />

                                        <path
                                            d="M8 7h9v9"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>

                                </a>

                            @else

                                <p class="mt-2 text-[13px] text-gray-400">
                                    Plat supprimé
                                </p>

                            @endif

                        </div>


                        {{-- ================================================= --}}
                        {{-- ID                                                  --}}
                        {{-- ================================================= --}}

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Identifiant
                            </p>

                            <p class="mt-2 text-[13px] font-semibold text-gray-700">
                                #{{ $optionGroup->id }}
                            </p>

                        </div>


                        {{-- ================================================= --}}
                        {{-- OBLIGATOIRE                                         --}}
                        {{-- ================================================= --}}

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Type de sélection
                            </p>

                            <div class="mt-2">

                                @if ($optionGroup->is_required)

                                    <span
                                        class="
                                            inline-flex
                                            rounded-lg
                                            bg-[#593114]/10
                                            px-2.5
                                            py-1
                                            text-[11px]
                                            font-semibold
                                            text-[#593114]
                                        "
                                    >
                                        Obligatoire
                                    </span>

                                @else

                                    <span
                                        class="
                                            inline-flex
                                            rounded-lg
                                            bg-gray-50
                                            px-2.5
                                            py-1
                                            text-[11px]
                                            font-semibold
                                            text-gray-500
                                        "
                                    >
                                        Facultatif
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- RÈGLE                                               --}}
                        {{-- ================================================= --}}

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Nombre de choix
                            </p>

                            <p class="mt-2 text-[13px] font-semibold text-gray-700">

                                {{ $optionGroup->min_choices }}
                                à
                                {{ $optionGroup->max_choices }}

                                <span class="font-normal text-gray-400">
                                    choix
                                </span>

                            </p>

                        </div>


                        {{-- ================================================= --}}
                        {{-- ORDRE                                               --}}
                        {{-- ================================================= --}}

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Ordre d'affichage
                            </p>

                            <p class="mt-2 text-[13px] font-semibold text-gray-700">
                                {{ $optionGroup->sort_order }}
                            </p>

                        </div>


                        {{-- ================================================= --}}
                        {{-- NOMBRE DE CHOIX                                     --}}
                        {{-- ================================================= --}}

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Choix disponibles
                            </p>

                            <p class="mt-2 text-[13px] font-semibold text-gray-700">
                                {{ $optionGroup->optionChoices->count() }}
                                <span class="font-normal text-gray-400">
                                    choix
                                </span>
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- RÉSUMÉ                                                 --}}
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

                <div class="border-b border-gray-100 px-6 py-5">

                    <h3 class="text-sm font-semibold text-gray-900">
                        Résumé
                    </h3>

                    <p class="mt-0.5 text-[12px] text-gray-400">
                        Configuration du groupe.
                    </p>

                </div>


                <div class="space-y-4 p-6">


                    {{-- Statut --}}
                    <div
                        class="
                            flex
                            items-center
                            justify-between
                            rounded-xl
                            bg-gray-50
                            px-4
                            py-3
                        "
                    >

                        <span class="text-[12px] text-gray-500">
                            Sélection
                        </span>

                        <span class="text-[12px] font-semibold text-gray-800">
                            {{ $optionGroup->min_choices }}
                            à
                            {{ $optionGroup->max_choices }}
                        </span>

                    </div>


                    {{-- Obligatoire --}}
                    <div
                        class="
                            flex
                            items-center
                            justify-between
                            rounded-xl
                            bg-gray-50
                            px-4
                            py-3
                        "
                    >

                        <span class="text-[12px] text-gray-500">
                            Obligatoire
                        </span>

                        @if ($optionGroup->is_required)

                            <span class="text-[12px] font-semibold text-[#593114]">
                                Oui
                            </span>

                        @else

                            <span class="text-[12px] font-semibold text-gray-500">
                                Non
                            </span>

                        @endif

                    </div>


                    {{-- Choix --}}
                    <div
                        class="
                            flex
                            items-center
                            justify-between
                            rounded-xl
                            bg-gray-50
                            px-4
                            py-3
                        "
                    >

                        <span class="text-[12px] text-gray-500">
                            Nombre de choix
                        </span>

                        <span class="text-[12px] font-semibold text-[#E25F12]">
                            {{ $optionGroup->optionChoices->count() }}
                        </span>

                    </div>


                    {{-- Modifier --}}
                    <a
                        href="{{ route('admin.option-groups.edit', $optionGroup) }}"
                        class="
                            inline-flex
                            w-full
                            items-center
                            justify-center
                            gap-2
                            rounded-xl
                            bg-[#593114]
                            px-4
                            py-2.5
                            text-[12px]
                            font-semibold
                            text-white
                            transition
                            hover:bg-[#47270f]
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >
                            <path
                                d="M12 20h9"
                                stroke-linecap="round"
                            />

                            <path
                                d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4Z"
                                stroke-linejoin="round"
                            />
                        </svg>

                        Modifier le groupe

                    </a>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- LISTE DES CHOIX                                          --}}
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

            {{-- ===================================================== --}}
            {{-- EN-TÊTE                                               --}}
            {{-- ===================================================== --}}

            <div
                class="
                    flex
                    flex-col
                    gap-3
                    border-b
                    border-gray-100
                    px-5
                    py-4
                    sm:flex-row
                    sm:items-center
                    sm:justify-between
                "
            >

                <div>

                    <h3 class="text-sm font-semibold text-gray-900">
                        Liste des choix
                    </h3>

                    <p class="mt-0.5 text-[12px] text-gray-400">
                        {{ $optionGroup->optionChoices->count() }}
                        {{ $optionGroup->optionChoices->count() > 1 ? 'choix disponibles' : 'choix disponible' }}
                    </p>

                </div>


                {{-- Ajouter un choix --}}
                <a
                    href="{{ route('admin.option-choices.create', ['option_group_id' => $optionGroup->id]) }}"
                    class="
                        inline-flex
                        items-center
                        justify-center
                        gap-2
                        rounded-xl
                        bg-[#593114]
                        px-4
                        py-2
                        text-[12px]
                        font-semibold
                        text-white
                        transition
                        hover:bg-[#47270f]
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

                    Ajouter un choix

                </a>

            </div>


            {{-- ===================================================== --}}
            {{-- TABLEAU                                               --}}
            {{-- ===================================================== --}}

            @if ($optionGroup->optionChoices->count())

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[850px] text-left">

                        <thead>

                            <tr class="border-b border-gray-100 bg-gray-50/70">

                                <th
                                    class="
                                        px-5
                                        py-3
                                        text-[11px]
                                        font-semibold
                                        uppercase
                                        tracking-[0.12em]
                                        text-gray-400
                                    "
                                >
                                    Choix
                                </th>


                                <th
                                    class="
                                        px-5
                                        py-3
                                        text-[11px]
                                        font-semibold
                                        uppercase
                                        tracking-[0.12em]
                                        text-gray-400
                                    "
                                >
                                    Prix supplémentaire
                                </th>


                                <th
                                    class="
                                        px-5
                                        py-3
                                        text-[11px]
                                        font-semibold
                                        uppercase
                                        tracking-[0.12em]
                                        text-gray-400
                                    "
                                >
                                    Disponibilité
                                </th>


                                <th
                                    class="
                                        px-5
                                        py-3
                                        text-center
                                        text-[11px]
                                        font-semibold
                                        uppercase
                                        tracking-[0.12em]
                                        text-gray-400
                                    "
                                >
                                    Ordre
                                </th>


                                <th
                                    class="
                                        px-5
                                        py-3
                                        text-right
                                        text-[11px]
                                        font-semibold
                                        uppercase
                                        tracking-[0.12em]
                                        text-gray-400
                                    "
                                >
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            @foreach ($optionGroup->optionChoices->sortBy('sort_order') as $choice)

                                <tr class="group transition hover:bg-[#593114]/[0.02]">

                                    {{-- ================================================= --}}
                                    {{-- CHOIX                                             --}}
                                    {{-- ================================================= --}}

                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="
                                                    flex
                                                    h-9
                                                    w-9
                                                    shrink-0
                                                    items-center
                                                    justify-center
                                                    rounded-lg
                                                    bg-[#593114]/[0.07]
                                                    text-[#593114]
                                                "
                                            >

                                                <svg
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="1.7"
                                                    class="h-4 w-4"
                                                >
                                                    <path
                                                        d="m5 12 4 4L19 6"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>

                                            </div>


                                            <div class="min-w-0">

                                                <p class="truncate text-[13px] font-semibold text-gray-800">
                                                    {{ $choice->name }}
                                                </p>

                                                <p class="text-[10px] text-gray-400">
                                                    ID #{{ $choice->id }}
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- ================================================= --}}
                                    {{-- PRIX                                               --}}
                                    {{-- ================================================= --}}

                                    <td class="px-5 py-4">

                                        @if ((float) $choice->price_modifier > 0)

                                            <span class="text-[13px] font-semibold text-[#E25F12]">
                                                +{{ number_format((float) $choice->price_modifier, 0, ',', ' ') }}
                                                FCFA
                                            </span>

                                        @else

                                            <span class="text-[13px] font-medium text-gray-500">
                                                Gratuit
                                            </span>

                                        @endif

                                    </td>


                                    {{-- ================================================= --}}
                                    {{-- DISPONIBILITÉ                                     --}}
                                    {{-- ================================================= --}}

                                    <td class="px-5 py-4">

                                        @if ($choice->is_available)

                                            <span
                                                class="
                                                    inline-flex
                                                    rounded-lg
                                                    bg-green-50
                                                    px-2.5
                                                    py-1
                                                    text-[11px]
                                                    font-semibold
                                                    text-green-600
                                                "
                                            >
                                                Disponible
                                            </span>

                                        @else

                                            <span
                                                class="
                                                    inline-flex
                                                    rounded-lg
                                                    bg-gray-100
                                                    px-2.5
                                                    py-1
                                                    text-[11px]
                                                    font-semibold
                                                    text-gray-500
                                                "
                                            >
                                                Indisponible
                                            </span>

                                        @endif

                                    </td>


                                    {{-- ================================================= --}}
                                    {{-- ORDRE                                             --}}
                                    {{-- ================================================= --}}

                                    <td class="px-5 py-4 text-center">

                                        <span class="text-[13px] font-medium text-gray-600">
                                            {{ $choice->sort_order }}
                                        </span>

                                    </td>


                                    {{-- ================================================= --}}
                                    {{-- ACTIONS                                           --}}
                                    {{-- ================================================= --}}

                                    <td class="px-5 py-4">

                                        <div class="flex items-center justify-end gap-2">


                                            {{-- Voir --}}
                                            <a
                                                href="{{ route('admin.option-choices.show', $choice) }}"
                                                class="
                                                    inline-flex
                                                    h-8
                                                    w-8
                                                    items-center
                                                    justify-center
                                                    rounded-lg
                                                    border
                                                    border-gray-200
                                                    bg-white
                                                    text-gray-400
                                                    transition
                                                    hover:border-[#593114]/20
                                                    hover:bg-[#593114]/[0.05]
                                                    hover:text-[#593114]
                                                "
                                                title="Voir"
                                            >

                                                <svg
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="1.7"
                                                    class="h-4 w-4"
                                                >

                                                    <path
                                                        d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />

                                                    <circle
                                                        cx="12"
                                                        cy="12"
                                                        r="2.5"
                                                    />

                                                </svg>

                                            </a>


                                            {{-- Modifier --}}
                                            <a
                                                href="{{ route('admin.option-choices.edit', $choice) }}"
                                                class="
                                                    inline-flex
                                                    h-8
                                                    w-8
                                                    items-center
                                                    justify-center
                                                    rounded-lg
                                                    border
                                                    border-gray-200
                                                    bg-white
                                                    text-gray-400
                                                    transition
                                                    hover:border-[#593114]/20
                                                    hover:bg-[#593114]/[0.05]
                                                    hover:text-[#593114]
                                                "
                                                title="Modifier"
                                            >

                                                <svg
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="1.7"
                                                    class="h-4 w-4"
                                                >

                                                    <path
                                                        d="M12 20h9"
                                                        stroke-linecap="round"
                                                    />

                                                    <path
                                                        d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4Z"
                                                        stroke-linejoin="round"
                                                    />

                                                </svg>

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                {{-- ================================================= --}}
                {{-- AUCUN CHOIX                                       --}}
                {{-- ================================================= --}}

                <div class="px-6 py-16 text-center">

                    <div
                        class="
                            mx-auto
                            flex
                            h-12
                            w-12
                            items-center
                            justify-center
                            rounded-2xl
                            bg-[#593114]/[0.07]
                            text-[#593114]
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-5 w-5"
                        >

                            <path
                                d="m5 12 4 4L19 6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />

                        </svg>

                    </div>


                    <h3 class="mt-4 text-base font-semibold text-gray-800">
                        Aucun choix
                    </h3>


                    <p class="mx-auto mt-1 max-w-sm text-sm text-gray-400">
                        Aucun choix n'a encore été ajouté à ce groupe.
                    </p>


                    <a
                        href="{{ route('admin.option-choices.create', ['option_group_id' => $optionGroup->id]) }}"
                        class="
                            mt-5
                            inline-flex
                            items-center
                            gap-2
                            rounded-xl
                            bg-[#593114]
                            px-4
                            py-2.5
                            text-[12px]
                            font-semibold
                            text-white
                            transition
                            hover:bg-[#47270f]
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

                        Ajouter un choix

                    </a>

                </div>

            @endif

        </div>


        {{-- ========================================================= --}}
        {{-- ZONE DANGER                                               --}}
        {{-- ========================================================= --}}

        <div
            class="
                overflow-hidden
                rounded-2xl
                border
                border-red-100
                bg-white
                shadow-sm
            "
        >

            <div class="px-6 py-5">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <h3 class="text-sm font-semibold text-gray-900">
                            Supprimer ce groupe
                        </h3>

                        <p class="mt-1 max-w-xl text-[12px] leading-5 text-gray-400">
                            La suppression du groupe supprimera également ses choix associés.
                        </p>

                    </div>


                    <button
                        type="button"
                        onclick="delete_option_group.showModal()"
                        class="
                            inline-flex
                            items-center
                            justify-center
                            gap-2
                            rounded-xl
                            border
                            border-red-200
                            bg-white
                            px-4
                            py-2.5
                            text-[12px]
                            font-semibold
                            text-red-500
                            transition
                            hover:bg-red-50
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-4 w-4"
                        >

                            <path
                                d="M4 7h16"
                                stroke-linecap="round"
                            />

                            <path
                                d="M10 11v6M14 11v6"
                                stroke-linecap="round"
                            />

                            <path
                                d="M6 7l1 14h10l1-14"
                                stroke-linejoin="round"
                            />

                            <path
                                d="M9 7V4h6v3"
                                stroke-linejoin="round"
                            />

                        </svg>

                        Supprimer

                    </button>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MODALE DE SUPPRESSION                                     --}}
    {{-- ========================================================= --}}

    <dialog
        id="delete_option_group"
        class="modal"
    >

        <div class="modal-box max-w-md overflow-hidden rounded-2xl p-0">

            {{-- En-tête --}}
            <div class="border-b border-gray-100 px-6 py-5">

                <div class="flex items-center gap-3">

                    <div
                        class="
                            flex
                            h-11
                            w-11
                            shrink-0
                            items-center
                            justify-center
                            rounded-xl
                            bg-red-50
                            text-red-500
                        "
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            class="h-5 w-5"
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

                    </div>


                    <div>

                        <h3 class="text-base font-semibold text-gray-800">
                            Supprimer le groupe ?
                        </h3>

                        <p class="mt-0.5 text-xs text-gray-400">
                            Cette action est irréversible.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Corps --}}
            <div class="px-6 py-5">

                <p class="text-sm leading-6 text-gray-600">

                    Voulez-vous réellement supprimer le groupe

                    <span class="font-semibold text-[#593114]">
                        « {{ $optionGroup->name }} »
                    </span>

                    ainsi que tous ses choix ?

                </p>

            </div>


            {{-- Pied --}}
            <div
                class="
                    flex
                    justify-end
                    gap-3
                    border-t
                    border-gray-100
                    bg-gray-50/50
                    px-6
                    py-4
                "
            >

                <form method="dialog">

                    <button
                        class="
                            rounded-xl
                            border
                            border-gray-200
                            bg-white
                            px-4
                            py-2.5
                            text-xs
                            font-semibold
                            text-gray-600
                            transition
                            hover:bg-gray-50
                        "
                    >
                        Annuler
                    </button>

                </form>


                <form
                    method="POST"
                    action="{{ route('admin.option-groups.destroy', $optionGroup) }}"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="
                            rounded-xl
                            bg-red-500
                            px-4
                            py-2.5
                            text-xs
                            font-semibold
                            text-white
                            shadow-sm
                            transition
                            hover:bg-red-600
                            focus:outline-none
                            focus:ring-2
                            focus:ring-red-500/20
                        "
                    >
                        Oui, supprimer
                    </button>

                </form>

            </div>

        </div>


        {{-- Fermer --}}
        <form
            method="dialog"
            class="modal-backdrop"
        >
            <button>close</button>
        </form>

    </dialog>

</x-admin-layout>