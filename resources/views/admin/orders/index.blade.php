<x-admin-layout>

    <div class="space-y-6">

        {{-- ========================================================= --}}
        {{-- EN-TÊTE DE LA PAGE                                       --}}
        {{-- ========================================================= --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-gray-400">
                    Gestion commerciale
                </p>

                <h2 class="mt-1 text-2xl font-semibold tracking-tight text-[#593114]">
                    Commandes
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Consultez et gérez les commandes passées sur FON-KPA.
                </p>
            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- MESSAGE DE SUCCÈS                                       --}}
        {{-- ========================================================= --}}
        @if (session('success'))
            <div class="flex items-center gap-3 rounded-xl border border-green-100 bg-green-50 px-4 py-3 text-sm text-green-700">

                {{-- Icône --}}
                <svg
                    class="h-5 w-5 shrink-0"
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

                <span>
                    {{ session('success') }}
                </span>

            </div>
        @endif


        {{-- ========================================================= --}}
        {{-- CARTE PRINCIPALE                                        --}}
        {{-- ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

            {{-- ===================================================== --}}
            {{-- EN-TÊTE DE LA CARTE                                  --}}
            {{-- ===================================================== --}}
            <div class="flex flex-col gap-3 border-b border-gray-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <p class="text-[18px] font-semibold text-gray-800">
                        Liste des commandes
                    </p>

                    <p class="mt-0.5 text-[12px] text-gray-400">
                        {{ $orders->total() }}
                        {{ $orders->total() > 1 ? 'commandes' : 'commande' }}
                    </p>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- TABLEAU                                               --}}
            {{-- ===================================================== --}}
            <div class="overflow-x-auto">

                <table class="w-full min-w-[1050px] text-left">

                    {{-- ------------------------------------------------- --}}
                    {{-- EN-TÊTES DU TABLEAU                              --}}
                    {{-- ------------------------------------------------- --}}
                    <thead>

                        <tr class="border-b border-gray-100 bg-gray-50/70">

                            <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Commande
                            </th>

                            <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Client
                            </th>

                            <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Livraison
                            </th>

                            <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Total
                            </th>

                            <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Statut
                            </th>

                            <th class="px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Date
                            </th>

                            <th class="px-5 py-3 text-right text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    {{-- ------------------------------------------------- --}}
                    {{-- CORPS DU TABLEAU                                 --}}
                    {{-- ------------------------------------------------- --}}
                    <tbody class="divide-y divide-gray-100">

                        @forelse ($orders as $order)

                            <tr class="group transition hover:bg-[#593114]/[0.02]">

                                {{-- ===================================== --}}
                                {{-- COMMANDE                              --}}
                                {{-- ===================================== --}}
                                <td class="px-5 py-4">

                                    <div class="flex items-center gap-3">

                                        {{-- Icône --}}
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#593114]/[0.07] text-[#593114]">

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
                                                    d="M9 5h6m-8 3h10M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                                />
                                            </svg>

                                        </div>

                                        <div>

                                            <p class="text-sm font-semibold text-gray-800">
                                                #{{ $order->order_number }}
                                            </p>

                                            <p class="mt-0.5 text-xs text-gray-400">
                                                ID : {{ $order->id }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- ===================================== --}}
                                {{-- CLIENT                                --}}
                                {{-- ===================================== --}}
                                <td class="px-5 py-4">

                                    <div>

                                        <p class="text-sm font-medium text-gray-800">
                                            {{ $order->user?->name ?? 'Client supprimé' }}
                                        </p>

                                        @if ($order->user?->email)
                                            <p class="mt-0.5 text-xs text-gray-400">
                                                {{ $order->user->email }}
                                            </p>
                                        @endif

                                    </div>

                                </td>


                                {{-- ===================================== --}}
                                {{-- LIVRAISON                             --}}
                                {{-- ===================================== --}}
                                <td class="px-5 py-4">

                                    <div>

                                        <p class="text-sm font-medium text-gray-700">
                                            {{ $order->delivery_method }}
                                        </p>

                                        <p class="mt-0.5 text-xs text-gray-400">
                                            {{ $order->city }} — {{ $order->commune }}
                                        </p>

                                    </div>

                                </td>


                                {{-- ===================================== --}}
                                {{-- TOTAL                                 --}}
                                {{-- ===================================== --}}
                                <td class="px-5 py-4">

                                    <p class="text-sm font-semibold text-[#593114]">
                                        {{ number_format($order->total, 0, ',', ' ') }} FCFA
                                    </p>

                                </td>


                                {{-- ===================================== --}}
                                {{-- STATUT                                --}}
                                {{-- ===================================== --}}
                                <td class="px-5 py-4">

                                    @php
                                        $statusClasses = match ($order->status) {
                                            'pending' =>
                                                'bg-amber-50 text-amber-700 border-amber-100',

                                            'confirmed' =>
                                                'bg-blue-50 text-blue-700 border-blue-100',

                                            'preparing' =>
                                                'bg-orange-50 text-orange-700 border-orange-100',

                                            'shipped' =>
                                                'bg-purple-50 text-purple-700 border-purple-100',

                                            'delivered' =>
                                                'bg-green-50 text-green-700 border-green-100',

                                            'cancelled' =>
                                                'bg-red-50 text-red-700 border-red-100',

                                            default =>
                                                'bg-gray-50 text-gray-600 border-gray-100',
                                        };

                                        $statusLabel = match ($order->status) {
                                            'pending' => 'En attente',
                                            'confirmed' => 'Confirmée',
                                            'preparing' => 'En préparation',
                                            'shipped' => 'Expédiée',
                                            'delivered' => 'Livrée',
                                            'cancelled' => 'Annulée',
                                            default => ucfirst($order->status),
                                        };
                                    @endphp

                                    <span class="inline-flex items-center rounded-full border px-2.5 py-1 text-[11px] font-semibold {{ $statusClasses }}">
                                        {{ $statusLabel }}
                                    </span>

                                </td>


                                {{-- ===================================== --}}
                                {{-- DATE                                  --}}
                                {{-- ===================================== --}}
                                <td class="px-5 py-4">

                                    <p class="text-sm text-gray-700">
                                        {{ $order->created_at->format('d/m/Y') }}
                                    </p>

                                    <p class="mt-0.5 text-xs text-gray-400">
                                        {{ $order->created_at->format('H:i') }}
                                    </p>

                                </td>


                                {{-- ===================================== --}}
                                {{-- ACTIONS                               --}}
                                {{-- ===================================== --}}
                                <td class="px-5 py-4">

                                    <div class="flex justify-end gap-2">

                                        {{-- -------------------------------- --}}
                                        {{-- VOIR LA COMMANDE                --}}
                                        {{-- -------------------------------- --}}
                                        <a
                                            href="{{ route('admin.orders.show', $order) }}"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-500 transition hover:border-[#593114]/30 hover:bg-[#593114]/[0.05] hover:text-[#593114]"
                                            title="Voir la commande"
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
                                                    d="M2.25 12s3.75-6 9.75-6 9.75 6 9.75 6-3.75 6-9.75 6-9.75-6-9.75-6z"
                                                />

                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="2.5"
                                                    stroke-width="1.8"
                                                />
                                            </svg>

                                        </a>


                                        {{-- -------------------------------- --}}
                                        {{-- SUPPRIMER                       --}}
                                        {{-- -------------------------------- --}}
                                        <button
                                            type="button"
                                            onclick="document.getElementById('delete-order-{{ $order->id }}').showModal()"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-500 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600"
                                            title="Supprimer la commande"
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

                                        </button>

                                    </div>

                                </td>

                            </tr>


                            {{-- ================================================= --}}
                            {{-- MODAL DE SUPPRESSION                             --}}
                            {{-- ================================================= --}}
                            <dialog
                                id="delete-order-{{ $order->id }}"
                                class="modal"
                            >

                                <div class="modal-box max-w-md overflow-hidden rounded-2xl p-0">

                                    {{-- ----------------------------------------- --}}
                                    {{-- HEADER DU MODAL                          --}}
                                    {{-- ----------------------------------------- --}}
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
                                                    Supprimer la commande ?
                                                </h3>

                                                <p class="mt-1 text-sm leading-6 text-gray-500">
                                                    Vous êtes sur le point de supprimer la commande
                                                    <span class="font-semibold text-gray-700">
                                                        #{{ $order->order_number }}
                                                    </span>.
                                                    Cette action est irréversible.
                                                </p>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- ----------------------------------------- --}}
                                    {{-- FOOTER DU MODAL                          --}}
                                    {{-- ----------------------------------------- --}}
                                    <div class="flex items-center justify-end gap-3 bg-gray-50 px-6 py-4">

                                        {{-- Annuler --}}
                                        <form method="dialog">

                                            <button
                                                type="submit"
                                                class="rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50"
                                            >
                                                Annuler
                                            </button>

                                        </form>


                                        {{-- Confirmer --}}
                                        <form
                                            action="{{ route('admin.orders.destroy', $order) }}"
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


                                {{-- Fermer en cliquant à l'extérieur --}}
                                <form
                                    method="dialog"
                                    class="modal-backdrop"
                                >
                                    <button>close</button>
                                </form>

                            </dialog>

                        @empty

                            {{-- ================================================= --}}
                            {{-- ÉTAT VIDE                                        --}}
                            {{-- ================================================= --}}
                            <tr>

                                <td
                                    colspan="7"
                                    class="px-5 py-16"
                                >

                                    <div class="flex flex-col items-center justify-center text-center">

                                        {{-- Icône --}}
                                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#593114]/[0.07] text-[#593114]">

                                            <svg
                                                class="h-6 w-6"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.7"
                                                    d="M9 5h6m-8 3h10M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                                />
                                            </svg>

                                        </div>


                                        <h3 class="mt-4 text-base font-semibold text-gray-800">
                                            Aucune commande
                                        </h3>

                                        <p class="mt-1 text-sm text-gray-400">
                                            Les commandes passées par les clients apparaîtront ici.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- ========================================================= --}}
            {{-- PAGINATION                                               --}}
            {{-- ========================================================= --}}
            @if ($orders->hasPages())

                <div class="border-t border-gray-100 px-5 py-4">

                    {{ $orders->links() }}

                </div>

            @endif

        </div>

    </div>

</x-admin-layout>