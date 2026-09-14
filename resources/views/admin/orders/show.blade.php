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
                    Commande #{{ $order->order_number }}
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Consultez les détails et gérez cette commande.
                </p>
            </div>


            {{-- Retour à la liste --}}
            <a
                href="{{ route('admin.orders.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 transition hover:border-[#593114]/30 hover:bg-[#593114]/[0.03] hover:text-[#593114]"
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

                Retour aux commandes

            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- MESSAGE DE SUCCÈS                                       --}}
        {{-- ========================================================= --}}
        @if (session('success'))

            <div class="flex items-center gap-3 rounded-xl border border-green-100 bg-green-50 px-4 py-3 text-sm text-green-700">

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
        {{-- INFORMATIONS PRINCIPALES DE LA COMMANDE                  --}}
        {{-- ========================================================= --}}
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

            {{-- ===================================================== --}}
            {{-- PRODUITS COMMANDÉS                                    --}}
            {{-- ===================================================== --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm xl:col-span-2">

                {{-- En-tête --}}
                <div class="flex flex-col gap-3 border-b border-gray-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <p class="text-[18px] font-semibold text-gray-800">
                            Produits commandés
                        </p>

                        <p class="mt-0.5 text-[12px] text-gray-400">
                            {{ $order->items->count() }}
                            {{ $order->items->count() > 1 ? 'produits' : 'produit' }}
                        </p>

                    </div>

                </div>


                {{-- Liste des produits --}}
                <div class="divide-y divide-gray-100">

                    @forelse ($order->items as $item)

                        <div class="flex flex-col gap-4 px-5 py-5 sm:flex-row sm:items-center sm:justify-between">

                            {{-- Produit --}}
                            <div class="flex min-w-0 items-center gap-4">

                                {{-- Image / icône --}}
                                <div class="flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-[#593114]/[0.07] text-[#593114]">

                                    @if ($item->product?->image)

                                        <img
                                            src="{{ $item->product->image }}"
                                            alt="{{ $item->product->name }}"
                                            class="h-full w-full object-cover"
                                        >

                                    @else

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
                                                d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7m8 4v10"
                                            />
                                        </svg>

                                    @endif

                                </div>


                                {{-- Informations produit --}}
                                <div class="min-w-0">

                                    <p class="truncate text-sm font-semibold text-gray-800">
                                        {{ $item->product?->name ?? 'Produit supprimé' }}
                                    </p>

                                    @if ($item->product?->category)
                                        <p class="mt-0.5 text-xs text-gray-400">
                                            {{ $item->product->category->name }}
                                        </p>
                                    @endif

                                    <p class="mt-1 text-xs text-gray-400">
                                        Prix unitaire :
                                        <span class="font-medium text-gray-600">
                                            {{ number_format($item->unit_price, 0, ',', ' ') }} FCFA
                                        </span>
                                    </p>

                                </div>

                            </div>


                            {{-- Quantité + sous-total --}}
                            <div class="flex items-center justify-between gap-8 sm:justify-end">

                                <div class="text-center">

                                    <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                        Quantité
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-gray-700">
                                        × {{ $item->quantity }}
                                    </p>

                                </div>


                                <div class="min-w-[120px] text-right">

                                    <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                        Sous-total
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-[#593114]">
                                        {{ number_format($item->subtotal, 0, ',', ' ') }} FCFA
                                    </p>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="px-5 py-16">

                            <div class="flex flex-col items-center justify-center text-center">

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
                                            d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7m8 4v10"
                                        />
                                    </svg>

                                </div>

                                <h3 class="mt-4 text-base font-semibold text-gray-800">
                                    Aucun produit
                                </h3>

                                <p class="mt-1 text-sm text-gray-400">
                                    Aucun produit n'est associé à cette commande.
                                </p>

                            </div>

                        </div>

                    @endforelse

                </div>


                {{-- Total --}}
                <div class="border-t border-gray-100 bg-gray-50/50 px-5 py-5">

                    <div class="flex items-center justify-between">

                        <span class="text-sm font-medium text-gray-500">
                            Total de la commande
                        </span>

                        <span class="text-lg font-bold text-[#593114]">
                            {{ number_format($order->total, 0, ',', ' ') }} FCFA
                        </span>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- COLONNE DROITE                                       --}}
            {{-- ===================================================== --}}
            <div class="space-y-6">

                {{-- ================================================= --}}
                {{-- INFORMATIONS COMMANDE                             --}}
                {{-- ================================================= --}}
                <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                    <div class="border-b border-gray-100 px-5 py-4">

                        <p class="text-[18px] font-semibold text-gray-800">
                            Informations
                        </p>

                        <p class="mt-0.5 text-[12px] text-gray-400">
                            Détails de la commande
                        </p>

                    </div>


                    <div class="space-y-5 px-5 py-5">

                        {{-- Numéro --}}
                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Numéro
                            </p>

                            <p class="mt-1 text-sm font-semibold text-gray-800">
                                #{{ $order->order_number }}
                            </p>

                        </div>


                        {{-- Date --}}
                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Date de commande
                            </p>

                            <p class="mt-1 text-sm text-gray-700">
                                {{ $order->created_at->format('d/m/Y à H:i') }}
                            </p>

                        </div>


                        {{-- Statut actuel --}}
                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Statut actuel
                            </p>

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

                            <span class="mt-2 inline-flex items-center rounded-full border px-2.5 py-1 text-[11px] font-semibold {{ $statusClasses }}">
                                {{ $statusLabel }}
                            </span>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- CLIENT                                           --}}
                {{-- ================================================= --}}
                <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

                    <div class="border-b border-gray-100 px-5 py-4">

                        <p class="text-[18px] font-semibold text-gray-800">
                            Client
                        </p>

                        <p class="mt-0.5 text-[12px] text-gray-400">
                            Informations du client
                        </p>

                    </div>


                    <div class="space-y-5 px-5 py-5">

                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Nom
                            </p>

                            <p class="mt-1 text-sm font-semibold text-gray-800">
                                {{ $order->user?->name ?? 'Client supprimé' }}
                            </p>

                        </div>


                        @if ($order->user?->email)

                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                    Email
                                </p>

                                <p class="mt-1 break-all text-sm text-gray-700">
                                    {{ $order->user->email }}
                                </p>

                            </div>

                        @endif


                        <div>

                            <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                                Téléphone
                            </p>

                            <p class="mt-1 text-sm text-gray-700">
                                {{ $order->phone }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- INFORMATIONS DE LIVRAISON                                --}}
        {{-- ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

            <div class="border-b border-gray-100 px-5 py-4">

                <p class="text-[18px] font-semibold text-gray-800">
                    Informations de livraison
                </p>

                <p class="mt-0.5 text-[12px] text-gray-400">
                    Adresse et mode de livraison
                </p>

            </div>


            <div class="grid grid-cols-1 gap-6 px-5 py-5 md:grid-cols-3">

                {{-- Mode --}}
                <div>

                    <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                        Mode de livraison
                    </p>

                    <p class="mt-1 text-sm font-semibold text-gray-800">
                        {{ $order->delivery_method }}
                    </p>

                </div>


                {{-- Localisation --}}
                <div>

                    <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                        Localisation
                    </p>

                    <p class="mt-1 text-sm font-semibold text-gray-800">
                        {{ $order->city }}
                    </p>

                    <p class="mt-0.5 text-xs text-gray-400">
                        {{ $order->commune }}
                    </p>

                </div>


                {{-- Adresse --}}
                <div>

                    <p class="text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400">
                        Adresse
                    </p>

                    <p class="mt-1 text-sm leading-6 text-gray-700">
                        {{ $order->delivery_address }}
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- GESTION DU STATUT                                       --}}
        {{-- ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200/80 bg-white shadow-sm">

            <div class="border-b border-gray-100 px-5 py-4">

                <p class="text-[18px] font-semibold text-gray-800">
                    Gestion de la commande
                </p>

                <p class="mt-0.5 text-[12px] text-gray-400">
                    Modifiez le statut de cette commande.
                </p>

            </div>


            <form
                action="{{ route('admin.orders.update-status', $order) }}"
                method="POST"
                class="px-5 py-5"
            >

                @csrf
                @method('PATCH')

                <div class="flex flex-col gap-4 sm:flex-row sm:items-end">

                    <div class="w-full sm:max-w-sm">

                        <label
                            for="status"
                            class="mb-2 block text-[11px] font-semibold uppercase tracking-[0.12em] text-gray-400"
                        >
                            Nouveau statut
                        </label>

                        <select
                            id="status"
                            name="status"
                            class="h-10 w-full rounded-lg border border-gray-200 bg-white px-3 text-sm text-gray-700 outline-none transition focus:border-[#593114]/40 focus:ring-2 focus:ring-[#593114]/10"
                        >

                            <option
                                value="pending"
                                @selected($order->status === 'pending')
                            >
                                En attente
                            </option>

                            <option
                                value="confirmed"
                                @selected($order->status === 'confirmed')
                            >
                                Confirmée
                            </option>

                            <option
                                value="preparing"
                                @selected($order->status === 'preparing')
                            >
                                En préparation
                            </option>

                            <option
                                value="shipped"
                                @selected($order->status === 'shipped')
                            >
                                Expédiée
                            </option>

                            <option
                                value="delivered"
                                @selected($order->status === 'delivered')
                            >
                                Livrée
                            </option>

                            <option
                                value="cancelled"
                                @selected($order->status === 'cancelled')
                            >
                                Annulée
                            </option>

                        </select>

                        @error('status')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    <button
                        type="submit"
                        class="inline-flex h-10 items-center justify-center gap-2 rounded-lg bg-[#593114] px-5 text-sm font-medium text-white transition hover:bg-[#47260F] focus:outline-none focus:ring-2 focus:ring-[#593114]/20"
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
                                d="M5 12h14M13 6l6 6-6 6"
                            />
                        </svg>

                        Mettre à jour

                    </button>

                </div>

            </form>

        </div>


        {{-- ========================================================= --}}
        {{-- ZONE DE SUPPRESSION                                      --}}
        {{-- ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-red-100 bg-white shadow-sm">

            <div class="flex flex-col gap-4 px-5 py-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <p class="text-sm font-semibold text-gray-800">
                        Supprimer cette commande
                    </p>

                    <p class="mt-1 text-xs leading-5 text-gray-400">
                        Cette action est définitive et ne peut pas être annulée.
                    </p>

                </div>


                <button
                    type="button"
                    onclick="document.getElementById('delete-order').showModal()"
                    class="inline-flex h-9 items-center justify-center gap-2 rounded-lg border border-red-200 bg-white px-4 text-sm font-medium text-red-600 transition hover:bg-red-50"
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


        {{-- ========================================================= --}}
        {{-- MODAL DE SUPPRESSION                                     --}}
        {{-- ========================================================= --}}
        <dialog
            id="delete-order"
            class="modal"
        >

            <div class="modal-box max-w-md overflow-hidden rounded-2xl p-0">

                {{-- Header --}}
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


                {{-- Footer --}}
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

    </div>

</x-admin-layout>