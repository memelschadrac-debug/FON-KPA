<x-admin-layout>

    <div class="space-y-6">

        {{-- ========================================================= --}}
        {{-- EN-TÊTE                                                   --}}
        {{-- ========================================================= --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

            <div class="min-w-0">

                <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-gray-400">
                    Administration · Messages
                </p>

                <h2 class="mt-1 truncate text-2xl font-semibold tracking-tight text-[#593114]">
                    Conversation avec {{ $message->name }}
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Consultez la demande et échangez directement avec votre client.
                </p>

            </div>


            {{-- Retour --}}
            <a
                href="{{ route('admin.messages.index') }}"
                class="inline-flex h-9 shrink-0 items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-4 text-[13px] font-medium text-gray-600 shadow-sm transition hover:border-[#593114]/20 hover:bg-[#593114]/[0.03] hover:text-[#593114]"
            >

                <svg
                    class="h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M15 19l-7-7 7-7"
                    />
                </svg>

                Tous les messages

            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- ALERTES                                                   --}}
        {{-- ========================================================= --}}
        @if (session('success'))

            <div class="flex items-center gap-3 rounded-xl border border-green-100 bg-green-50 px-4 py-3 text-sm text-green-700">

                <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-green-100">

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>

                </div>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        @if (session('error'))

            <div class="flex items-center gap-3 rounded-xl border border-red-100 bg-red-50 px-4 py-3 text-sm text-red-700">

                <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-red-100">

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>

                </div>

                <span>
                    {{ session('error') }}
                </span>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- CONTENU PRINCIPAL                                         --}}
        {{-- ========================================================= --}}
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-[minmax(0,1fr)_320px]">


            {{-- ===================================================== --}}
            {{-- CONVERSATION                                          --}}
            {{-- ===================================================== --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">


                {{-- ------------------------------------------------- --}}
                {{-- HEADER MESSAGE                                    --}}
                {{-- ------------------------------------------------- --}}
                <div class="border-b border-gray-100 px-5 py-5 sm:px-6">

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

                        <div class="min-w-0">

                            <div class="flex items-center gap-2">

                                <span class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Sujet
                                </span>

                                @php
                                    $statusClasses = match ($message->status) {
                                        'unread' =>
                                            'border-orange-100 bg-orange-50 text-orange-700',

                                        'read' =>
                                            'border-green-100 bg-green-50 text-green-700',

                                        'archived' =>
                                            'border-gray-100 bg-gray-50 text-gray-500',

                                        default =>
                                            'border-gray-100 bg-gray-50 text-gray-500',
                                    };

                                    $statusLabel = match ($message->status) {
                                        'unread' => 'Non lu',
                                        'read' => 'Lu',
                                        'archived' => 'Archivé',
                                        default => ucfirst($message->status),
                                    };
                                @endphp

                                <span class="inline-flex items-center rounded-full border px-2.5 py-1 text-[10px] font-semibold {{ $statusClasses }}">
                                    {{ $statusLabel }}
                                </span>

                            </div>

                            <h3 class="mt-2 text-lg font-semibold tracking-tight text-gray-800">
                                {{ $message->subject }}
                            </h3>

                        </div>


                        {{-- ID --}}
                        <span class="shrink-0 text-[11px] font-medium text-gray-400">
                            #{{ str_pad($message->id, 4, '0', STR_PAD_LEFT) }}
                        </span>

                    </div>

                </div>


                {{-- ------------------------------------------------- --}}
                {{-- EXPÉDITEUR                                        --}}
                {{-- ------------------------------------------------- --}}
                <div class="border-b border-gray-100 px-5 py-4 sm:px-6">

                    <div class="flex items-center gap-3">

                        {{-- Avatar --}}
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#593114]/[0.07] text-sm font-semibold text-[#593114]">
                            {{ strtoupper(substr($message->name, 0, 1)) }}
                        </div>


                        <div class="min-w-0 flex-1">

                            <div class="flex flex-wrap items-center gap-x-2 gap-y-1">

                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $message->name }}
                                </p>

                                <span class="text-gray-300">
                                    ·
                                </span>

                                <a
                                    href="mailto:{{ $message->email }}"
                                    class="truncate text-xs text-gray-500 transition hover:text-[#E25F12]"
                                >
                                    {{ $message->email }}
                                </a>

                            </div>

                            <p class="mt-0.5 text-[11px] text-gray-400">
                                Reçu le {{ $message->created_at->format('d/m/Y à H:i') }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ------------------------------------------------- --}}
                {{-- MESSAGE                                            --}}
                {{-- ------------------------------------------------- --}}
                <div class="px-5 py-7 sm:px-8 sm:py-8">

                    <div class="max-w-3xl">

                        <p class="whitespace-pre-line text-[14px] leading-8 text-gray-600">
                            {{ $message->message }}
                        </p>

                    </div>

                </div>


                {{-- ------------------------------------------------- --}}
                {{-- PIED DU MESSAGE                                   --}}
                {{-- ------------------------------------------------- --}}
                <div class="border-t border-gray-100 bg-gray-50/50 px-5 py-4 sm:px-6">

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <p class="text-[11px] font-medium text-gray-400">
                                Dernière activité
                            </p>

                            <p class="mt-0.5 text-xs text-gray-600">
                                {{ $message->updated_at->format('d/m/Y à H:i') }}
                            </p>

                        </div>


                        {{-- Répondre --}}
                        <a
                            href="#reply"
                            class="inline-flex h-9 items-center justify-center gap-2 rounded-lg bg-[#593114] px-4 text-xs font-semibold text-white transition hover:bg-[#47260F] focus:outline-none focus:ring-2 focus:ring-[#593114]/20"
                        >

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M3 10.5L12 4l9 6.5-9 6.5-9-6.5zm0 0V18l9 3 9-3v-7.5"
                                />
                            </svg>

                            Répondre au client

                        </a>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- SIDEBAR                                               --}}
            {{-- ===================================================== --}}
            <div class="space-y-6">


                {{-- ================================================= --}}
                {{-- CLIENT                                             --}}
                {{-- ================================================= --}}
                <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                    <div class="border-b border-gray-100 px-5 py-4">

                        <p class="text-[16px] font-semibold text-gray-800">
                            Client
                        </p>

                        <p class="mt-0.5 text-[11px] text-gray-400">
                            Informations de contact
                        </p>

                    </div>


                    <div class="space-y-5 px-5 py-5">


                        {{-- Identité --}}
                        <div class="flex items-center gap-3">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#593114]/[0.07] text-sm font-semibold text-[#593114]">
                                {{ strtoupper(substr($message->name, 0, 1)) }}
                            </div>

                            <div class="min-w-0">

                                <p class="truncate text-sm font-semibold text-gray-800">
                                    {{ $message->name }}
                                </p>

                                <p class="text-[11px] text-gray-400">
                                    Client FON-KPA
                                </p>

                            </div>

                        </div>


                        {{-- Email --}}
                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Adresse email
                            </p>

                            <a
                                href="mailto:{{ $message->email }}"
                                class="mt-1.5 block break-all text-[13px] font-medium text-gray-700 transition hover:text-[#E25F12]"
                            >
                                {{ $message->email }}
                            </a>

                        </div>


                        {{-- Téléphone --}}
                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Téléphone
                            </p>

                            @if ($message->phone)

                                <a
                                    href="tel:{{ $message->phone }}"
                                    class="mt-1.5 block text-[13px] font-medium text-gray-700 transition hover:text-[#E25F12]"
                                >
                                    {{ $message->phone }}
                                </a>

                            @else

                                <p class="mt-1.5 text-[13px] italic text-gray-400">
                                    Non renseigné
                                </p>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- ACTIONS                                            --}}
                {{-- ================================================= --}}
                <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                    <div class="border-b border-gray-100 px-5 py-4">

                        <p class="text-[16px] font-semibold text-gray-800">
                            Actions
                        </p>

                        <p class="mt-0.5 text-[11px] text-gray-400">
                            Gestion du message
                        </p>

                    </div>


                    <div class="space-y-2 px-5 py-5">


                        {{-- ================================================= --}}
                        {{-- RÉPONDRE                                       --}}
                        {{-- ================================================= --}}
                        <a
                            href="#reply"
                            class="group flex h-10 w-full items-center justify-between rounded-lg bg-[#593114] px-4 text-[12px] font-semibold text-white transition hover:bg-[#47260F]"
                        >

                            <span class="flex items-center gap-2">

                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M3 10.5L12 4l9 6.5-9 6.5-9-6.5zm0 0V18l9 3 9-3v-7.5"
                                    />
                                </svg>

                                Répondre au client

                            </span>

                            <svg
                                class="h-4 w-4 transition-transform group-hover:translate-x-0.5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>

                        </a>


                        {{-- ================================================= --}}
                        {{-- MARQUER COMME LU                                --}}
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
                                    class="flex h-10 w-full items-center gap-2 rounded-lg border border-gray-200 bg-white px-4 text-left text-[12px] font-medium text-gray-600 transition hover:border-green-200 hover:bg-green-50 hover:text-green-700"
                                >

                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M5 13l4 4L19 7"
                                        />
                                    </svg>

                                    Marquer comme lu

                                </button>

                            </form>

                        @else

                            <button
                                type="button"
                                disabled
                                class="flex h-10 w-full cursor-not-allowed items-center gap-2 rounded-lg border border-gray-100 bg-gray-50 px-4 text-left text-[12px] font-medium text-gray-300"
                            >

                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>

                                Message déjà lu

                            </button>

                        @endif


                        {{-- ================================================= --}}
                        {{-- ARCHIVER                                         --}}
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
                                    class="flex h-10 w-full items-center gap-2 rounded-lg border border-gray-200 bg-white px-4 text-left text-[12px] font-medium text-gray-600 transition hover:border-[#593114]/20 hover:bg-[#593114]/[0.03] hover:text-[#593114]"
                                >

                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M4 7h16M6 7l1 12h10l1-12M9 7V5h6v2"
                                        />
                                    </svg>

                                    Archiver le message

                                </button>

                            </form>

                        @else

                            <button
                                type="button"
                                disabled
                                class="flex h-10 w-full cursor-not-allowed items-center gap-2 rounded-lg border border-gray-100 bg-gray-50 px-4 text-left text-[12px] font-medium text-gray-300"
                            >

                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M4 7h16M6 7l1 12h10l1-12M9 7V5h6v2"
                                    />
                                </svg>

                                Message archivé

                            </button>

                        @endif


                        {{-- ================================================= --}}
                        {{-- SUPPRIMER                                        --}}
                        {{-- ================================================= --}}
                        <button
                            type="button"
                            onclick="document.getElementById('delete-message').showModal()"
                            class="flex h-10 w-full items-center gap-2 rounded-lg border border-red-100 bg-white px-4 text-left text-[12px] font-medium text-red-600 transition hover:bg-red-50"
                        >

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0v12a1 1 0 01-1 1H8a1 1 0 01-1-1V7m3 4v6m4-6v6"
                                />
                            </svg>

                            Supprimer

                        </button>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- MÉTADONNÉES                                       --}}
                {{-- ================================================= --}}
                <div class="rounded-2xl border border-gray-200/80 bg-white px-5 py-5 shadow-sm">

                    <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                        Informations
                    </p>

                    <div class="mt-4 space-y-3">

                        <div class="flex items-center justify-between gap-4">

                            <span class="text-xs text-gray-400">
                                Reçu
                            </span>

                            <span class="text-right text-xs font-medium text-gray-600">
                                {{ $message->created_at->format('d/m/Y H:i') }}
                            </span>

                        </div>

                        <div class="flex items-center justify-between gap-4">

                            <span class="text-xs text-gray-400">
                                Dernière modification
                            </span>

                            <span class="text-right text-xs font-medium text-gray-600">
                                {{ $message->updated_at->format('d/m/Y H:i') }}
                            </span>

                        </div>

                        <div class="flex items-center justify-between gap-4">

                            <span class="text-xs text-gray-400">
                                Identifiant
                            </span>

                            <span class="text-xs font-semibold text-[#593114]">
                                #{{ $message->id }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- RÉPONSE                                                   --}}
        {{-- ========================================================= --}}
        <div
            id="reply"
            class="scroll-mt-6 overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm"
        >

            {{-- ----------------------------------------------------- --}}
            {{-- HEADER                                                --}}
            {{-- ----------------------------------------------------- --}}
            <div class="border-b border-gray-100 px-5 py-5 sm:px-6">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#593114]/[0.07] text-[#593114]">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M3 10.5L12 4l9 6.5-9 6.5-9-6.5zm0 0V18l9 3 9-3v-7.5"
                            />
                        </svg>

                    </div>

                    <div>

                        <p class="text-[16px] font-semibold text-gray-800">
                            Répondre au client
                        </p>

                        <p class="mt-0.5 text-[11px] text-gray-400">
                            Envoyez une réponse directement depuis FON-KPA.
                        </p>

                    </div>

                </div>

            </div>


            {{-- ----------------------------------------------------- --}}
            {{-- FORMULAIRE                                            --}}
            {{-- ----------------------------------------------------- --}}
            <div class="px-5 py-6 sm:px-6">

                <form
                    method="POST"
                    action="{{ route('admin.messages.reply', $message) }}"
                    class="space-y-5"
                >

                    @csrf


                    {{-- ================================================= --}}
                    {{-- DESTINATAIRE                                      --}}
                    {{-- ================================================= --}}
                    <div>

                        <label
                            for="reply_email"
                            class="mb-2 block text-[11px] font-semibold uppercase tracking-[0.10em] text-gray-500"
                        >
                            À
                        </label>

                        <div class="relative">

                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">

                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M4 6h16v12H4zM4 7l8 6 8-6"
                                    />
                                </svg>

                            </div>

                            <input
                                id="reply_email"
                                type="email"
                                value="{{ $message->email }}"
                                readonly
                                class="h-10 w-full rounded-lg border border-gray-200 bg-gray-50 pl-10 pr-4 text-[13px] font-medium text-gray-600 outline-none"
                            >

                        </div>

                        <p class="mt-1.5 text-[11px] text-gray-400">
                            L'adresse du client est automatiquement utilisée comme destinataire.
                        </p>

                    </div>


                    {{-- ================================================= --}}
                    {{-- SUJET                                             --}}
                    {{-- ================================================= --}}
                    <div>

                        <label
                            for="reply_subject"
                            class="mb-2 block text-[11px] font-semibold uppercase tracking-[0.10em] text-gray-500"
                        >
                            Sujet
                        </label>

                        <div class="relative">

                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">

                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M4 6h16v12H4z"
                                    />
                                </svg>

                            </div>

                            <input
                                id="reply_subject"
                                name="subject"
                                type="text"
                                value="{{ old('subject', 'Re: ' . $message->subject) }}"
                                required
                                maxlength="150"
                                class="h-10 w-full rounded-lg border border-gray-200 bg-white pl-10 pr-4 text-[13px] text-gray-700 outline-none transition focus:border-[#593114] focus:ring-2 focus:ring-[#593114]/10"
                            >

                        </div>

                        @error('subject')

                            <p class="mt-1.5 text-xs text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ================================================= --}}
                    {{-- MESSAGE                                           --}}
                    {{-- ================================================= --}}
                    <div>

                        <label
                            for="reply_message"
                            class="mb-2 block text-[11px] font-semibold uppercase tracking-[0.10em] text-gray-500"
                        >
                            Message
                        </label>

                        <textarea
                            id="reply_message"
                            name="reply_message"
                            rows="7"
                            required
                            maxlength="5000"
                            placeholder="Écrivez votre réponse au client..."
                            class="w-full resize-y rounded-lg border border-gray-200 bg-white px-4 py-3 text-[13px] leading-6 text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-[#593114] focus:ring-2 focus:ring-[#593114]/10"
                        >{{ old('reply_message') }}</textarea>

                        @error('reply_message')

                            <p class="mt-1.5 text-xs text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ================================================= --}}
                    {{-- ACTIONS                                            --}}
                    {{-- ================================================= --}}
                    <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-5 sm:flex-row sm:items-center sm:justify-end">

                        {{-- Annuler --}}
                        <a
                            href="#"
                            class="inline-flex h-10 items-center justify-center rounded-lg border border-gray-200 bg-white px-5 text-[12px] font-semibold text-gray-600 transition hover:bg-gray-50"
                        >
                            Annuler
                        </a>


                        {{-- Envoyer --}}
                        <button
                            type="submit"
                            class="inline-flex h-10 items-center justify-center gap-2 rounded-lg bg-[#593114] px-5 text-[12px] font-semibold text-white transition hover:bg-[#47260F] focus:outline-none focus:ring-2 focus:ring-[#593114]/20"
                        >

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M22 2L11 13M22 2l-7 20-4-9-9-4z"
                                />
                            </svg>

                            Envoyer la réponse

                        </button>

                    </div>

                </form>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- MODAL SUPPRESSION                                        --}}
        {{-- ========================================================= --}}
        <dialog
            id="delete-message"
            class="modal"
        >

            <div class="modal-box max-w-md overflow-hidden rounded-2xl p-0">

                <div class="px-6 py-6">

                    <div class="flex items-start gap-4">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-600">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0v12a1 1 0 01-1 1H8a1 1 0 01-1-1V7m3 4v6m4-6v6"
                                />
                            </svg>

                        </div>


                        <div>

                            <h3 class="text-base font-semibold text-gray-800">
                                Supprimer le message ?
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-gray-500">

                                Vous êtes sur le point de supprimer le message de

                                <span class="font-semibold text-gray-700">
                                    {{ $message->name }}
                                </span>.

                                Cette action est irréversible.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="flex items-center justify-end gap-3 bg-gray-50 px-6 py-4">

                    <form method="dialog">

                        <button
                            type="submit"
                            class="rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50"
                        >
                            Annuler
                        </button>

                    </form>


                    <form
                        action="{{ route('admin.messages.destroy', $message) }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700"
                        >
                            Supprimer
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

    </div>

</x-admin-layout>