<x-admin-layout>
    {{-- ========================================================= --}}
    {{-- PAGE MESSAGES                                             --}}
    {{-- ========================================================= --}}

    <div
        class="space-y-6"
        x-data="messageSearch()"
    >

        {{-- ========================================================= --}}
        {{-- EN-TÊTE DE PAGE                                           --}}
        {{-- ========================================================= --}}

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>

                {{-- BREADCRUMB --}}
                @include('admin.partials.breadcrumb', [
                    'section' => 'Administration',
                    'page' => 'Messages',
                    'current' => 'Liste',
                ])

                <p class="mt-3 text-[11px] font-semibold uppercase tracking-[0.16em] text-gray-400">
                    Administration
                </p>

                <h2 class="mt-1 text-2xl font-semibold tracking-tight text-[#593114]">
                    Messages
                </h2>

                <p class="mt-1 text-[12px] text-gray-400">
                    Gérez les demandes et messages reçus des clients FON-KPA.
                </p>

            </div>
        </div>


        {{-- ========================================================= --}}
        {{-- STATISTIQUES                                              --}}
        {{-- ========================================================= --}}

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

            {{-- TOTAL --}}
            <div class="rounded-2xl border border-gray-200/80 bg-white px-5 py-4 shadow-sm">
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                            Total
                        </p>

                        <p
                            class="mt-1 text-2xl font-semibold tracking-tight text-[#593114]"
                            x-text="messages.length"
                        >
                            {{ $messages->count() }}
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#593114]/[0.07] text-[#593114]">
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-5 w-5"
                        >
                            <path
                                d="M4 5h16v11H8l-4 4V5Z"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M8 9h8M8 12h5"
                                stroke-linecap="round"
                            />
                        </svg>
                    </div>

                </div>
            </div>


            {{-- NON LUS --}}
            <div class="rounded-2xl border border-gray-200/80 bg-white px-5 py-4 shadow-sm">
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                            Non lus
                        </p>

                        <p class="mt-1 text-2xl font-semibold tracking-tight text-[#E25F12]">
                            {{ $messages->where('status', 'unread')->count() }}
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E25F12]/10 text-[#E25F12]">
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-5 w-5"
                        >
                            <path
                                d="M4 5h16v11H8l-4 4V5Z"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M8 9h8"
                                stroke-linecap="round"
                            />
                        </svg>
                    </div>

                </div>
            </div>


            {{-- LUS --}}
            <div class="rounded-2xl border border-gray-200/80 bg-white px-5 py-4 shadow-sm">
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                            Lus
                        </p>

                        <p class="mt-1 text-2xl font-semibold tracking-tight text-green-600">
                            {{ $messages->where('status', 'read')->count() }}
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-50 text-green-600">
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-5 w-5"
                        >
                            <path
                                d="M5 12l4 4L19 6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>

                </div>
            </div>


            {{-- ARCHIVES --}}
            <div class="rounded-2xl border border-gray-200/80 bg-white px-5 py-4 shadow-sm">
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                            Archivés
                        </p>

                        <p class="mt-1 text-2xl font-semibold tracking-tight text-gray-600">
                            {{ $messages->where('status', 'archived')->count() }}
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-50 text-gray-500">
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-5 w-5"
                        >
                            <path
                                d="M4 7h16v13H4z"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M3 4h18v3H3z"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M9 11h6"
                                stroke-linecap="round"
                            />
                        </svg>
                    </div>

                </div>
            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- MESSAGES DE SESSION                                       --}}
        {{-- ========================================================= --}}

        @if (session('success'))
            <div class="flex items-center gap-3 rounded-xl border border-green-100 bg-green-50 px-4 py-3 text-sm text-green-700">

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


        @if (session('error'))
            <div class="flex items-center gap-3 rounded-xl border border-red-100 bg-red-50 px-4 py-3 text-sm text-red-700">

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
                </svg>

                <span>
                    {{ session('error') }}
                </span>

            </div>
        @endif


        {{-- ========================================================= --}}
        {{-- CARD PRINCIPALE                                           --}}
        {{-- ========================================================= --}}

        <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

            {{-- EN-TÊTE --}}
            <div class="flex flex-col gap-3 border-b border-gray-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h3 class="text-sm font-semibold text-gray-900">
                        Boîte de réception
                    </h3>

                    <p class="mt-0.5 text-[12px] text-gray-400">
                        <span x-text="filteredMessages.length">
                            {{ $messages->count() }}
                        </span>
                        <span>
                            message(s)
                        </span>
                    </p>

                </div>


                {{-- RECHERCHE --}}
                <div class="relative w-full sm:w-72">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400"
                    >
                        <circle cx="11" cy="11" r="7"/>
                        <path
                            d="m20 20-4-4"
                            stroke-linecap="round"
                        />
                    </svg>

                    <input
                        type="text"
                        x-model="search"
                        autocomplete="off"
                        placeholder="Rechercher un message..."
                        class="h-9 w-full rounded-lg border border-gray-200 bg-gray-50 pl-9 pr-9 text-[12px] text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114]/30 focus:bg-white focus:ring-2 focus:ring-[#593114]/10"
                    >

                    <button
                        type="button"
                        x-show="search.length > 0"
                        x-cloak
                        @click="clearSearch()"
                        class="absolute right-2 top-1/2 flex h-6 w-6 -translate-y-1/2 items-center justify-center rounded-md text-gray-400 transition hover:bg-gray-200 hover:text-gray-600"
                        title="Effacer"
                    >
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            class="h-3.5 w-3.5"
                        >
                            <path
                                d="M6 6l12 12M18 6 6 18"
                                stroke-linecap="round"
                            />
                        </svg>
                    </button>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- TABLEAU                                                --}}
            {{-- ===================================================== --}}

            @if ($messages->count())

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[1100px] text-left">

                        <thead>
                            <tr class="border-b border-gray-100 bg-gray-50/70">

                                <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Expéditeur
                                </th>

                                <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Sujet
                                </th>

                                <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Message
                                </th>

                                <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Statut
                                </th>

                                <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Réception
                                </th>

                                <th class="px-5 py-3 text-right text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Actions
                                </th>

                            </tr>
                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            @foreach ($messages as $message)

                                <tr
                                    x-show="matchesMessage({
                                        id: @js($message->id),
                                        name: @js($message->name),
                                        email: @js($message->email),
                                        phone: @js($message->phone),
                                        subject: @js($message->subject),
                                        message: @js($message->message),
                                        status: @js($message->status),
                                    })"
                                    x-cloak
                                    class="group transition hover:bg-[#593114]/[0.02] {{ $message->status === 'unread' ? 'bg-[#593114]/[0.015]' : '' }}"
                                >

                                    {{-- EXPÉDITEUR --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#593114]/[0.07] text-sm font-bold uppercase text-[#593114]">
                                                {{ strtoupper(substr($message->name, 0, 1)) }}
                                            </div>

                                            <div class="min-w-0">

                                                <p class="truncate text-[13px] font-semibold text-gray-800">
                                                    {{ $message->name }}
                                                </p>

                                                <p class="truncate text-[11px] text-gray-400">
                                                    {{ $message->email }}
                                                </p>

                                                @if ($message->phone)
                                                    <p class="text-[10px] text-gray-400">
                                                        {{ $message->phone }}
                                                    </p>
                                                @endif

                                            </div>

                                        </div>

                                    </td>


                                    {{-- SUJET --}}
                                    <td class="px-5 py-4">

                                        <p
                                            class="max-w-[210px] truncate text-[13px] {{ $message->status === 'unread' ? 'font-semibold text-gray-800' : 'font-medium text-gray-600' }}"
                                        >
                                            {{ $message->subject }}
                                        </p>

                                    </td>


                                    {{-- MESSAGE --}}
                                    <td class="px-5 py-4">

                                        <p class="max-w-[300px] truncate text-[12px] text-gray-400">
                                            {{ $message->message }}
                                        </p>

                                    </td>


                                    {{-- STATUT --}}
                                    <td class="px-5 py-4">

                                        @if ($message->status === 'unread')

                                            <span class="inline-flex items-center gap-1.5 rounded-lg bg-[#E25F12]/10 px-2.5 py-1 text-[11px] font-semibold text-[#E25F12]">

                                                <span class="h-1.5 w-1.5 rounded-full bg-[#E25F12]"></span>

                                                Non lu

                                            </span>

                                        @elseif ($message->status === 'read')

                                            <span class="inline-flex items-center gap-1.5 rounded-lg bg-green-50 px-2.5 py-1 text-[11px] font-semibold text-green-600">

                                                <svg
                                                    class="h-3.5 w-3.5"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l3-3z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>

                                                Lu

                                            </span>

                                        @else

                                            <span class="inline-flex items-center gap-1.5 rounded-lg bg-gray-50 px-2.5 py-1 text-[11px] font-semibold text-gray-500">

                                                <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>

                                                Archivé

                                            </span>

                                        @endif

                                    </td>


                                    {{-- DATE --}}
                                    <td class="px-5 py-4">

                                        <span class="text-[12px] font-medium text-gray-600">
                                            {{ $message->created_at?->format('d/m/Y') }}
                                        </span>

                                        <p class="text-[10px] text-gray-400">
                                            {{ $message->created_at?->format('H:i') }}
                                        </p>

                                    </td>


                                    {{-- ================================================= --}}
                                    {{-- ACTIONS                                            --}}
                                    {{-- ================================================= --}}

                                    <td class="px-5 py-4">

                                        <div class="flex items-center justify-end gap-2">

                                            {{-- ================================================= --}}
                                            {{-- VOIR : TOUJOURS ACTIF                         --}}
                                            {{-- ================================================= --}}

                                            <a
                                                href="{{ route('admin.messages.show', $message) }}"
                                                class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-400 transition hover:border-[#593114]/20 hover:bg-[#593114]/[0.05] hover:text-[#593114]"
                                                title="Voir le message"
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


                                            {{-- ================================================= --}}
                                            {{-- MARQUER LU                                    --}}
                                            {{-- TOUJOURS VISIBLE                              --}}
                                            {{-- GRISÉ SI DÉJÀ LU OU ARCHIVÉ                   --}}
                                            {{-- ================================================= --}}

                                            @if ($message->status === 'unread')

                                                <form
                                                    method="POST"
                                                    action="{{ route('admin.messages.update', $message) }}"
                                                >
                                                    @csrf
                                                    @method('PATCH')

                                                    <input
                                                        type="hidden"
                                                        name="action"
                                                        value="read"
                                                    >

                                                    <button
                                                        type="submit"
                                                        class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-400 transition hover:border-green-200 hover:bg-green-50 hover:text-green-600"
                                                        title="Marquer comme lu"
                                                    >

                                                        <svg
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="1.7"
                                                            class="h-4 w-4"
                                                        >
                                                            <path
                                                                d="M4 6h16v12H4z"
                                                                stroke-linejoin="round"
                                                            />

                                                            <path
                                                                d="m5 7 7 6 7-6"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                            />
                                                        </svg>

                                                    </button>

                                                </form>

                                            @else

                                                <button
                                                    type="button"
                                                    disabled
                                                    aria-disabled="true"
                                                    class="inline-flex h-8 w-8 cursor-not-allowed items-center justify-center rounded-lg border border-gray-100 bg-gray-50 text-gray-200"
                                                    title="Déjà lu"
                                                >

                                                    <svg
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="1.7"
                                                        class="h-4 w-4"
                                                    >
                                                        <path
                                                            d="M4 6h16v12H4z"
                                                            stroke-linejoin="round"
                                                        />

                                                        <path
                                                            d="m5 7 7 6 7-6"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                        />
                                                    </svg>

                                                </button>

                                            @endif


                                            {{-- ================================================= --}}
                                            {{-- ARCHIVER                                       --}}
                                            {{-- TOUJOURS VISIBLE                              --}}
                                            {{-- GRISÉ SI DÉJÀ ARCHIVÉ                        --}}
                                            {{-- ================================================= --}}

                                            @if ($message->status !== 'archived')

                                                <form
                                                    method="POST"
                                                    action="{{ route('admin.messages.update', $message) }}"
                                                >
                                                    @csrf
                                                    @method('PATCH')

                                                    <input
                                                        type="hidden"
                                                        name="action"
                                                        value="archive"
                                                    >

                                                    <button
                                                        type="submit"
                                                        class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-400 transition hover:border-amber-200 hover:bg-amber-50 hover:text-amber-600"
                                                        title="Archiver"
                                                    >

                                                        <svg
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="1.7"
                                                            class="h-4 w-4"
                                                        >
                                                            <path
                                                                d="M4 7h16v13H4z"
                                                                stroke-linejoin="round"
                                                            />

                                                            <path
                                                                d="M3 4h18v3H3z"
                                                                stroke-linejoin="round"
                                                            />
                                                        </svg>

                                                    </button>

                                                </form>

                                            @else

                                                <button
                                                    type="button"
                                                    disabled
                                                    aria-disabled="true"
                                                    class="inline-flex h-8 w-8 cursor-not-allowed items-center justify-center rounded-lg border border-gray-100 bg-gray-50 text-gray-200"
                                                    title="Déjà archivé"
                                                >

                                                    <svg
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="1.7"
                                                        class="h-4 w-4"
                                                    >
                                                        <path
                                                            d="M4 7h16v13H4z"
                                                            stroke-linejoin="round"
                                                        />

                                                        <path
                                                            d="M3 4h18v3H3z"
                                                            stroke-linejoin="round"
                                                        />
                                                    </svg>

                                                </button>

                                            @endif


                                            {{-- ================================================= --}}
                                            {{-- SUPPRIMER : TOUJOURS ACTIF                   --}}
                                            {{-- ================================================= --}}

                                            <button
                                                type="button"
                                                onclick="document.getElementById('delete_message_{{ $message->id }}').showModal()"
                                                class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-400 transition hover:border-red-200 hover:bg-red-50 hover:text-red-500"
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
                                {{-- MODALE SUPPRESSION                                --}}
                                {{-- ================================================= --}}

                                <dialog
                                    id="delete_message_{{ $message->id }}"
                                    class="modal"
                                >

                                    <div class="modal-box max-w-md overflow-hidden rounded-2xl p-0">

                                        <div class="border-b border-gray-100 px-6 py-5">

                                            <div class="flex items-center gap-3">

                                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-500">

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
                                                        Supprimer le message ?
                                                    </h3>

                                                    <p class="mt-0.5 text-xs text-gray-400">
                                                        Cette action est irréversible.
                                                    </p>

                                                </div>

                                            </div>

                                        </div>


                                        <div class="px-6 py-5">

                                            <p class="text-sm leading-6 text-gray-600">

                                                Voulez-vous réellement supprimer le message envoyé par

                                                <span class="font-semibold text-[#593114]">
                                                    « {{ $message->name }} »
                                                </span>

                                                ?

                                                <br>

                                                <span class="text-xs text-gray-400">
                                                    Le message sera définitivement supprimé de FON-KPA.
                                                </span>

                                            </p>

                                        </div>


                                        <div class="flex justify-end gap-3 border-t border-gray-100 bg-gray-50/50 px-6 py-4">

                                            <form method="dialog">

                                                <button
                                                    class="rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-xs font-semibold text-gray-600 transition hover:bg-gray-50"
                                                >
                                                    Annuler
                                                </button>

                                            </form>


                                            <form
                                                method="POST"
                                                action="{{ route('admin.messages.destroy', $message) }}"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="rounded-xl bg-red-500 px-4 py-2.5 text-xs font-semibold text-white shadow-sm transition hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500/20"
                                                >
                                                    Oui, supprimer
                                                </button>

                                            </form>

                                        </div>

                                    </div>


                                    <form
                                        method="dialog"
                                        class="modal-backdrop"
                                    >
                                        <button>close</button>
                                    </form>

                                </dialog>

                            @endforeach


                            {{-- ================================================= --}}
                            {{-- AUCUN RÉSULTAT DE RECHERCHE                       --}}
                            {{-- ================================================= --}}

                            <tr
                                x-show="filteredMessages.length === 0"
                                x-cloak
                            >

                                <td
                                    colspan="6"
                                    class="px-6 py-16 text-center"
                                >

                                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-[#593114]/[0.07] text-[#593114]">

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.7"
                                            class="h-5 w-5"
                                        >
                                            <path
                                                d="M4 5h16v11H8l-4 4V5Z"
                                                stroke-linejoin="round"
                                            />
                                        </svg>

                                    </div>

                                    <h3 class="mt-4 text-base font-semibold text-gray-800">
                                        Aucun message trouvé
                                    </h3>

                                    <p class="mx-auto mt-1 max-w-sm text-sm text-gray-400">
                                        Aucun message ne correspond à votre recherche.
                                    </p>

                                    <button
                                        type="button"
                                        x-show="search.length > 0"
                                        x-cloak
                                        @click="clearSearch()"
                                        class="mt-5 inline-flex items-center gap-2 rounded-xl bg-[#593114] px-4 py-2.5 text-[12px] font-semibold text-white transition hover:bg-[#47270f]"
                                    >
                                        Effacer la recherche
                                    </button>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            @else

                {{-- ================================================= --}}
                {{-- AUCUN MESSAGE                                      --}}
                {{-- ================================================= --}}

                <div class="px-6 py-16 text-center">

                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-[#593114]/[0.07] text-[#593114]">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-5 w-5"
                        >
                            <path
                                d="M4 5h16v11H8l-4 4V5Z"
                                stroke-linejoin="round"
                            />

                            <path
                                d="M8 9h8"
                                stroke-linecap="round"
                            />
                        </svg>

                    </div>

                    <h3 class="mt-4 text-base font-semibold text-gray-800">
                        Aucun message
                    </h3>

                    <p class="mx-auto mt-1 max-w-sm text-sm text-gray-400">
                        Les messages envoyés depuis le formulaire de contact apparaîtront ici.
                    </p>

                </div>

            @endif

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- ALPINE.JS : RECHERCHE MESSAGES                            --}}
    {{-- ========================================================= --}}

    <script>

        function messageSearch() {

            return {

                search: '',

                messages: @js(
                    $messages->map(fn ($message) => [
                        'id' => $message->id,
                        'name' => $message->name,
                        'email' => $message->email,
                        'phone' => $message->phone,
                        'subject' => $message->subject,
                        'message' => $message->message,
                        'status' => $message->status,
                    ])->values()
                ),

                get filteredMessages() {

                    const query = this.search
                        .trim()
                        .toLowerCase();

                    if (!query) {
                        return this.messages;
                    }

                    return this.messages.filter(message => {

                        return (
                            String(message.id).includes(query) ||
                            (message.name ?? '').toLowerCase().includes(query) ||
                            (message.email ?? '').toLowerCase().includes(query) ||
                            (message.phone ?? '').toLowerCase().includes(query) ||
                            (message.subject ?? '').toLowerCase().includes(query) ||
                            (message.message ?? '').toLowerCase().includes(query) ||
                            (message.status ?? '').toLowerCase().includes(query)
                        );

                    });

                },


                matchesMessage(message) {

                    const query = this.search
                        .trim()
                        .toLowerCase();

                    if (!query) {
                        return true;
                    }

                    return (
                        String(message.id).includes(query) ||
                        (message.name ?? '').toLowerCase().includes(query) ||
                        (message.email ?? '').toLowerCase().includes(query) ||
                        (message.phone ?? '').toLowerCase().includes(query) ||
                        (message.subject ?? '').toLowerCase().includes(query) ||
                        (message.message ?? '').toLowerCase().includes(query) ||
                        (message.status ?? '').toLowerCase().includes(query)
                    );

                },


                clearSearch() {
                    this.search = '';
                }

            };

        }

    </script>

</x-admin-layout>