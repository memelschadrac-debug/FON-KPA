@php
    use Illuminate\Support\Str;
@endphp

<x-admin-layout>

    {{-- ========================================================= --}}
    {{-- PAGE CATÉGORIES                                            --}}
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
                    Catégories
                </h2>

                <p class="mt-1 text-[12px] text-gray-400">
                    Gérez les catégories de plats disponibles sur FON-KPA.
                </p>
            </div>

            {{-- Bouton ajouter --}}
            <a
                href="{{ route('admin.categories.create') }}"
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

                Ajouter une catégorie
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

            {{-- En-tête de la card --}}
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
                        Liste des catégories
                    </h3>

                    <p class="mt-0.5 text-[12px] text-gray-400">
                        {{ $categories->count() }}
                        {{ $categories->count() > 1 ? 'catégories' : 'catégorie' }}
                    </p>
                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- TABLEAU                                                --}}
            {{-- ===================================================== --}}

            @if ($categories->count())

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[700px] text-left">

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
                                    Catégorie
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
                                    Slug
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
                                    Description
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

                            @foreach ($categories as $category)

                                <tr class="group transition hover:bg-[#593114]/[0.02]">

                                    {{-- Nom --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            {{-- Image de la catégorie --}}
                                            @if ($category->image)

                                                <img
                                                    src="{{ asset($category->image) }}"
                                                    alt="{{ $category->name }}"
                                                    class="h-10 w-10 rounded-md object-cover"
                                                >

                                            @else

                                                <div class="flex h-10 w-10 items-center justify-center rounded-md bg-[#593114]/[0.07] text-[#593114]">
                                                    {{-- Icône de secours --}}
                                                    <svg
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="1.6"
                                                        class="h-5 w-5"
                                                    >
                                                        <path d="M4 5.5A1.5 1.5 0 0 1 5.5 4h13A1.5 1.5 0 0 1 20 5.5v13a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 4 18.5v-13Z"/>
                                                        <path d="m7 16 3.5-3.5L13 15l2-2 2 3"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                        />
                                                    </svg>
                                                </div>

                                            @endif

                                            <div>
                                                <p class="text-[13px] font-semibold text-gray-800">
                                                    {{ $category->name }}
                                                </p>

                                                <p class="text-[10px] text-gray-400">
                                                    ID #{{ $category->id }}
                                                </p>
                                            </div>

                                        </div>

                                    </td>


                                    {{-- Slug --}}
                                    <td class="px-5 py-4">

                                        <span
                                            class="
                                                inline-flex
                                                rounded-lg
                                                bg-gray-50
                                                px-2.5
                                                py-1
                                                text-[11px]
                                                font-medium
                                                text-gray-500
                                            "
                                        >
                                            {{ $category->slug }}
                                        </span>

                                    </td>


                                    {{-- Description --}}
                                    <td class="max-w-sm px-5 py-4">

                                        <p class="truncate text-[12px] text-gray-500">
                                            {{ $category->description ?: 'Aucune description' }}
                                        </p>

                                    </td>


                                    {{-- Actions --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center justify-end gap-2">

                                            {{-- ================================================= --}}
                                            {{-- MODIFIER                                         --}}
                                            {{-- ================================================= --}}

                                            <a
                                                href="{{ route('admin.categories.edit', $category) }}"
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


                                            {{-- ================================================= --}}
                                            {{-- SUPPRIMER                                        --}}
                                            {{-- ================================================= --}}

                                            <button
                                                type="button"
                                                onclick="document.getElementById('delete_category_{{ $category->id }}').showModal()"
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


                                {{-- ========================================================= --}}
                                {{-- MODALE DAISYUI DE CONFIRMATION DE SUPPRESSION             --}}
                                {{-- ========================================================= --}}

                                <dialog
                                    id="delete_category_{{ $category->id }}"
                                    class="modal"
                                >

                                    <div class="modal-box max-w-md overflow-hidden rounded-2xl p-0">

                                        {{-- En-tête de la modale --}}
                                        <div class="border-b border-gray-100 px-6 py-5">

                                            <div class="flex items-center gap-3">

                                                {{-- Icône avertissement --}}
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


                                                {{-- Titre --}}
                                                <div>

                                                    <h3 class="text-base font-semibold text-gray-800">
                                                        Supprimer la catégorie ?
                                                    </h3>

                                                    <p class="mt-0.5 text-xs text-gray-400">
                                                        Cette action est irréversible.
                                                    </p>

                                                </div>

                                            </div>

                                        </div>


                                        {{-- Corps de la modale --}}
                                        <div class="px-6 py-5">

                                            <p class="text-sm leading-6 text-gray-600">

                                                Voulez-vous réellement supprimer la catégorie

                                                <span class="font-semibold text-[#593114]">
                                                    « {{ $category->name }} »
                                                </span>

                                                ?

                                            </p>

                                        </div>


                                        {{-- Pied de la modale --}}
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


                                            {{-- Confirmer suppression --}}
                                            <form
                                                method="POST"
                                                action="{{ route('admin.categories.destroy', $category) }}"
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


                                    {{-- Fermer en cliquant sur l'arrière-plan --}}
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
                {{-- AUCUNE CATÉGORIE                                   --}}
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
                            <path d="M4 5h16v14H4z"/>
                            <path d="M4 9h16"/>
                            <path d="M9 5v4"/>
                        </svg>
                    </div>

                    <h3 class="mt-4 text-base font-semibold text-gray-800">
                        Aucune catégorie
                    </h3>

                    <p class="mx-auto mt-1 max-w-sm text-sm text-gray-400">
                        Vous n'avez encore créé aucune catégorie.
                    </p>

                    <a
                        href="{{ route('admin.categories.create') }}"
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

                        Ajouter une catégorie
                    </a>

                </div>

            @endif

        </div>

    </div>

</x-admin-layout>