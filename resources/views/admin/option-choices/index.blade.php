<x-admin-layout>

    {{-- ========================================================= --}}
    {{-- PAGE CHOIX D'OPTIONS                                      --}}
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
                    'current' => 'Liste',
                ])

                <p class="mt-3 text-[11px] font-semibold uppercase tracking-[0.16em] text-gray-400">
                    Catalogue
                </p>

                <h2 class="mt-1 text-2xl font-semibold tracking-tight text-[#593114]">
                    Choix d'options
                </h2>

                <p class="mt-1 text-[12px] text-gray-400">
                    Gérez les choix proposés aux clients pour vos plats.
                </p>

            </div>


            {{-- ===================================================== --}}
            {{-- BOUTON AJOUTER                                        --}}
            {{-- ===================================================== --}}

            <a
                href="{{ route('admin.option-choices.create') }}"
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


        {{-- ========================================================= --}}
        {{-- MESSAGE DE SUCCÈS                                         --}}
        {{-- ========================================================= --}}

        @if (session('success'))

            <div
                class="
                    flex
                    items-center
                    gap-3
                    rounded-xl
                    border
                    border-green-100
                    bg-green-50
                    px-4
                    py-3
                    text-sm
                    text-green-700
                "
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    class="h-5 w-5 shrink-0"
                >

                    <path
                        d="M5 12l4 4L19 6"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />

                </svg>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- MESSAGE D'ERREUR                                          --}}
        {{-- ========================================================= --}}

        @if (session('error'))

            <div
                class="
                    flex
                    items-center
                    gap-3
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

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    class="h-5 w-5 shrink-0"
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

                <span>
                    {{ session('error') }}
                </span>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- CARD PRINCIPALE                                           --}}
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
            {{-- EN-TÊTE DE LA CARD                                    --}}
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
                        {{ $optionChoices->total() }}
                        {{ $optionChoices->total() > 1 ? 'choix' : 'choix' }}
                    </p>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- TABLEAU                                                --}}
            {{-- ===================================================== --}}

            @if ($optionChoices->count())

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[1050px] text-left">

                        {{-- ================================================= --}}
                        {{-- EN-TÊTES                                           --}}
                        {{-- ================================================= --}}

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
                                    Groupe
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
                                    Plat
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
                                    Prix
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


                        {{-- ================================================= --}}
                        {{-- CORPS                                               --}}
                        {{-- ================================================= --}}

                        <tbody class="divide-y divide-gray-100">

                            @foreach ($optionChoices as $optionChoice)

                                <tr class="group transition hover:bg-[#593114]/[0.02]">

                                    {{-- ===================================== --}}
                                    {{-- CHOIX                                   --}}
                                    {{-- ===================================== --}}

                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="
                                                    flex
                                                    h-10
                                                    w-10
                                                    shrink-0
                                                    items-center
                                                    justify-center
                                                    rounded-md
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

                                                    <circle
                                                        cx="12"
                                                        cy="12"
                                                        r="8"
                                                    />

                                                    <path
                                                        d="M9 12l2 2 4-4"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />

                                                </svg>

                                            </div>


                                            <div class="min-w-0">

                                                <p class="truncate text-[13px] font-semibold text-gray-800">
                                                    {{ $optionChoice->name }}
                                                </p>

                                                <p class="text-[10px] text-gray-400">
                                                    ID #{{ $optionChoice->id }}
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- ===================================== --}}
                                    {{-- GROUPE                                  --}}
                                    {{-- ===================================== --}}

                                    <td class="px-5 py-4">

                                        @if ($optionChoice->optionGroup)

                                            <a
                                                href="{{ route('admin.option-groups.show', $optionChoice->optionGroup) }}"
                                                class="
                                                    text-[13px]
                                                    font-medium
                                                    text-gray-700
                                                    transition
                                                    hover:text-[#593114]
                                                "
                                            >
                                                {{ $optionChoice->optionGroup->name }}
                                            </a>

                                        @else

                                            <span class="text-[13px] text-gray-400">
                                                Groupe supprimé
                                            </span>

                                        @endif

                                    </td>


                                    {{-- ===================================== --}}
                                    {{-- PLAT                                    --}}
                                    {{-- ===================================== --}}

                                    <td class="px-5 py-4">

                                        @if ($optionChoice->optionGroup?->product)

                                            <a
                                                href="{{ route('admin.products.show', $optionChoice->optionGroup->product) }}"
                                                class="
                                                    text-[13px]
                                                    font-medium
                                                    text-gray-700
                                                    transition
                                                    hover:text-[#593114]
                                                "
                                            >
                                                {{ $optionChoice->optionGroup->product->name }}
                                            </a>

                                        @else

                                            <span class="text-[13px] text-gray-400">
                                                Plat supprimé
                                            </span>

                                        @endif

                                    </td>


                                    {{-- ===================================== --}}
                                    {{-- PRIX                                    --}}
                                    {{-- ===================================== --}}

                                    <td class="px-5 py-4">

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
                                                +{{ number_format($optionChoice->price_modifier, 0, ',', ' ') }}
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

                                    </td>


                                    {{-- ===================================== --}}
                                    {{-- DISPONIBILITÉ                          --}}
                                    {{-- ===================================== --}}

                                    <td class="px-5 py-4">

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
                                                    bg-gray-50
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


                                    {{-- ===================================== --}}
                                    {{-- ORDRE                                  --}}
                                    {{-- ===================================== --}}

                                    <td class="px-5 py-4">

                                        <span class="text-[13px] font-medium text-gray-600">
                                            {{ $optionChoice->sort_order }}
                                        </span>

                                    </td>


                                    {{-- ===================================== --}}
                                    {{-- ACTIONS                                --}}
                                    {{-- ===================================== --}}

                                    <td class="px-5 py-4">

                                        <div class="flex items-center justify-end gap-2">

                                            {{-- ============================= --}}
                                            {{-- VOIR                          --}}
                                            {{-- ============================= --}}

                                            <a
                                                href="{{ route('admin.option-choices.show', $optionChoice) }}"
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


                                            {{-- ============================= --}}
                                            {{-- MODIFIER                     --}}
                                            {{-- ============================= --}}

                                            <a
                                                href="{{ route('admin.option-choices.edit', $optionChoice) }}"
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


                                            {{-- ============================= --}}
                                            {{-- SUPPRIMER                    --}}
                                            {{-- ============================= --}}

                                            <button
                                                type="button"
                                                onclick="document.getElementById('delete_option_choice_{{ $optionChoice->id }}').showModal()"
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
                                                    hover:border-red-200
                                                    hover:bg-red-50
                                                    hover:text-red-500
                                                "
                                                title="Supprimer"
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

                                            </button>

                                        </div>

                                    </td>

                                </tr>


                                {{-- ================================================= --}}
                                {{-- MODALE DE SUPPRESSION                             --}}
                                {{-- ================================================= --}}

                                <dialog
                                    id="delete_option_choice_{{ $optionChoice->id }}"
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

                                            {{-- Annuler --}}
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


                                            {{-- Confirmer --}}
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

                            <circle
                                cx="12"
                                cy="12"
                                r="8"
                            />

                            <path
                                d="M9 12l2 2 4-4"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />

                        </svg>

                    </div>


                    <h3 class="mt-4 text-base font-semibold text-gray-800">
                        Aucun choix d'option
                    </h3>


                    <p class="mx-auto mt-1 max-w-sm text-sm text-gray-400">
                        Vous n'avez encore créé aucun choix d'option.
                    </p>


                    <a
                        href="{{ route('admin.option-choices.create') }}"
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


            {{-- ===================================================== --}}
            {{-- PAGINATION                                            --}}
            {{-- ===================================================== --}}

            @if ($optionChoices->hasPages())

                <div class="border-t border-gray-100 px-5 py-4">
                    {{ $optionChoices->links() }}
                </div>

            @endif

        </div>

    </div>

</x-admin-layout>