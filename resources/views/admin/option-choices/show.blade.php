<x-admin-layout>

    {{-- ========================================================= --}}
    {{-- PAGE DÉTAIL DU CHOIX                                      --}}
    {{-- ========================================================= --}}

    <div class="space-y-6">

        {{-- ========================================================= --}}
        {{-- EN-TÊTE DE PAGE                                           --}}
        {{-- ========================================================= --}}

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>

                {{-- BREADCRUMB --}}
                @include('admin.partials.breadcrumb', [
                    'section' => 'Catalogue',
                    'page' => "Choix d'options",
                    'current' => $optionChoice->name,
                ])

                <h2 class="mt-2 text-2xl font-semibold tracking-tight text-[#593114]">
                    {{ $optionChoice->name }}
                </h2>

                <p class="mt-1 text-[12px] text-gray-400">
                    Détails du choix et configuration de son utilisation.
                </p>

            </div>


            {{-- ===================================================== --}}
            {{-- ACTIONS HEADER                                         --}}
            {{-- ===================================================== --}}

            <div class="flex flex-wrap items-center gap-2">

                {{-- Retour --}}
                <a
                    href="{{ route('admin.option-choices.index') }}"
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
                    href="{{ route('admin.option-choices.edit', $optionChoice) }}"
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
            {{-- CHOIX                                                 --}}
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
                                    d="m5 12 4 4L19 6"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />

                            </svg>

                        </div>


                        <div class="min-w-0">

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Choix d'option
                            </p>

                            <h3 class="mt-0.5 truncate text-base font-semibold text-gray-900">
                                {{ $optionChoice->name }}
                            </h3>

                        </div>

                    </div>

                </div>


                {{-- Informations --}}
                <div class="p-6">

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

                        {{-- ================================================= --}}
                        {{-- GROUPE                                               --}}
                        {{-- ================================================= --}}

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Groupe associé
                            </p>

                            @if ($optionChoice->optionGroup)

                                <a
                                    href="{{ route('admin.option-groups.show', $optionChoice->optionGroup) }}"
                                    class="mt-2 inline-flex items-center gap-2 text-[13px] font-semibold text-gray-700 transition hover:text-[#593114]"
                                >

                                    <span>
                                        {{ $optionChoice->optionGroup->name }}
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
                                    Groupe supprimé
                                </p>

                            @endif

                        </div>


                        {{-- ================================================= --}}
                        {{-- PLAT                                               --}}
                        {{-- ================================================= --}}

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Plat associé
                            </p>

                            @if ($optionChoice->optionGroup?->product)

                                <a
                                    href="{{ route('admin.products.show', $optionChoice->optionGroup->product) }}"
                                    class="mt-2 inline-flex items-center gap-2 text-[13px] font-semibold text-gray-700 transition hover:text-[#593114]"
                                >

                                    <span>
                                        {{ $optionChoice->optionGroup->product->name }}
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
                                #{{ $optionChoice->id }}
                            </p>

                        </div>


                        {{-- ================================================= --}}
                        {{-- PRIX                                                --}}
                        {{-- ================================================= --}}

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Prix supplémentaire
                            </p>

                            <div class="mt-2">

                                @if ((float) $optionChoice->price_modifier > 0)

                                    <span
                                        class="
                                            inline-flex
                                            rounded-lg
                                            bg-[#E25F12]/10
                                            px-2.5
                                            py-1
                                            text-[11px]
                                            font-semibold
                                            text-[#E25F12]
                                        "
                                    >
                                        +{{ number_format((float) $optionChoice->price_modifier, 0, ',', ' ') }}
                                        FCFA
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
                                        Gratuit
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- DISPONIBILITÉ                                     --}}
                        {{-- ================================================= --}}

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Disponibilité
                            </p>

                            <div class="mt-2">

                                @if ($optionChoice->is_available)

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

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- ORDRE                                               --}}
                        {{-- ================================================= --}}

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Ordre d'affichage
                            </p>

                            <p class="mt-2 text-[13px] font-semibold text-gray-700">
                                {{ $optionChoice->sort_order }}
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
                        Configuration du choix.
                    </p>

                </div>


                <div class="space-y-4 p-6">

                    {{-- Groupe --}}
                    <div
                        class="
                            flex
                            items-center
                            justify-between
                            gap-4
                            rounded-xl
                            bg-gray-50
                            px-4
                            py-3
                        "
                    >

                        <span class="text-[12px] text-gray-500">
                            Groupe
                        </span>

                        <span class="max-w-[150px] truncate text-right text-[12px] font-semibold text-gray-800">
                            {{ $optionChoice->optionGroup?->name ?? '—' }}
                        </span>

                    </div>


                    {{-- Prix --}}
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
                            Prix
                        </span>

                        @if ((float) $optionChoice->price_modifier > 0)

                            <span class="text-[12px] font-semibold text-[#E25F12]">
                                +{{ number_format((float) $optionChoice->price_modifier, 0, ',', ' ') }}
                                FCFA
                            </span>

                        @else

                            <span class="text-[12px] font-semibold text-gray-500">
                                Gratuit
                            </span>

                        @endif

                    </div>


                    {{-- Disponibilité --}}
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
                            Disponible
                        </span>

                        @if ($optionChoice->is_available)

                            <span class="text-[12px] font-semibold text-green-600">
                                Oui
                            </span>

                        @else

                            <span class="text-[12px] font-semibold text-gray-500">
                                Non
                            </span>

                        @endif

                    </div>


                    {{-- Ordre --}}
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
                            Ordre
                        </span>

                        <span class="text-[12px] font-semibold text-gray-800">
                            {{ $optionChoice->sort_order }}
                        </span>

                    </div>


                    {{-- Modifier --}}
                    <a
                        href="{{ route('admin.option-choices.edit', $optionChoice) }}"
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

                        Modifier le choix

                    </a>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- INFORMATIONS DU GROUPE                                   --}}
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

            <div class="border-b border-gray-100 px-6 py-5">

                <div class="flex items-center gap-3">

                    <div
                        class="
                            flex
                            h-10
                            w-10
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

                    <div>

                        <h3 class="text-sm font-semibold text-gray-900">
                            Groupe d'options
                        </h3>

                        <p class="mt-0.5 text-[12px] text-gray-400">
                            Groupe auquel ce choix appartient.
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6">

                @if ($optionChoice->optionGroup)

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Groupe
                            </p>

                            <p class="mt-1 text-[14px] font-semibold text-gray-800">
                                {{ $optionChoice->optionGroup->name }}
                            </p>

                        </div>


                        <a
                            href="{{ route('admin.option-groups.show', $optionChoice->optionGroup) }}"
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
                                text-[12px]
                                font-semibold
                                text-gray-600
                                transition
                                hover:border-[#593114]/20
                                hover:bg-[#593114]/[0.03]
                                hover:text-[#593114]
                            "
                        >

                            Voir le groupe

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                class="h-4 w-4"
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

                    </div>

                @else

                    <p class="text-[13px] text-gray-400">
                        Le groupe associé à ce choix n'existe plus.
                    </p>

                @endif

            </div>

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
                            Supprimer ce choix
                        </h3>

                        <p class="mt-1 max-w-xl text-[12px] leading-5 text-gray-400">
                            La suppression de ce choix est définitive et ne pourra pas être annulée.
                        </p>

                    </div>


                    <button
                        type="button"
                        onclick="delete_option_choice.showModal()"
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
        id="delete_option_choice"
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
                            Supprimer le choix ?
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

                    Voulez-vous réellement supprimer le choix

                    <span class="font-semibold text-[#593114]">
                        « {{ $optionChoice->name }} »
                    </span>

                    ?

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
                    action="{{ route('admin.option-choices.destroy', $optionChoice) }}"
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