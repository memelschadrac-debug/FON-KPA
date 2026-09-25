<x-admin-layout>

    {{-- ========================================================= --}}
    {{-- LOADER PLEIN ÉCRAN                                        --}}
    {{-- ========================================================= --}}

    <div
        id="page-loader"
        class="fixed inset-0 z-[99999] flex items-center justify-center bg-[#FFFF] transition-opacity duration-500"
    >
        <div class="flex flex-col items-center">

            {{-- Spinner --}}
            <div
                class="h-10 w-10 animate-spin rounded-full border-[3px] border-[#593114]/15 border-t-[#e25f12]"
            ></div>

            {{-- Texte --}}
            <p class="mt-5 text-sm font-medium text-[#593114]">
                Chargement...
            </p>

            <p class="mt-1 text-[11px] text-[#8C8179]">
                Bienvenue sur FON-KPA
            </p>

        </div>
    </div>


    {{-- ========================================================= --}}
    {{-- DASHBOARD                                                 --}}
    {{-- ========================================================= --}}

    <div id="dashboard-content">

        {{-- ===================================================== --}}
        {{-- CONTENU                                                --}}
        {{-- ===================================================== --}}

        <div class="p-5 sm:p-8">

            {{-- ================================================= --}}
            {{-- INTRODUCTION                                       --}}
            {{-- ================================================= --}}

            <div class="mb-7">

                <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">

                    <div>

                        <h2 class="text-[17px] font-semibold tracking-tight text-gray-900">
                            Bonjour, {{ auth()->user()->name ?? 'Administrateur' }} 👋
                        </h2>

                        <p class="mt-1 text-[12px] text-gray-500">
                            Voici un aperçu de l'activité de votre restaurant aujourd'hui.
                        </p>

                    </div>


                    <a
                        href="{{ route('home') }}"
                        target="_blank"
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
                            text-[10px]
                            font-semibold
                            text-gray-600
                            shadow-sm
                            transition
                            hover:border-[#593114]/20
                            hover:text-[#593114]
                        "
                    >
                        Voir le site

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-3.5 w-3.5"
                        >
                            <path d="M7 17 17 7"/>
                            <path d="M8 7h9v9"/>
                        </svg>

                    </a>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- STATISTIQUES                                       --}}
            {{-- ================================================= --}}

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">


                {{-- ================================================= --}}
                {{-- COMMANDES                                         --}}
                {{-- ================================================= --}}

                <div
                    class="
                        rounded-2xl
                        border
                        border-gray-200/80
                        bg-white
                        p-5
                        shadow-[0_4px_20px_rgba(0,0,0,0.025)]
                    "
                >

                    <div class="flex items-start justify-between">

                        <div
                            class="
                                flex
                                h-9
                                w-9
                                items-center
                                justify-center
                                rounded-xl
                                bg-[#593114]/10
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
                                <path d="M6 3h12v18H6z"/>
                                <path d="M9 7h6"/>
                                <path d="M9 11h6"/>
                            </svg>

                        </div>


                        {{-- Évolution réelle --}}
                        <span
                            class="
                                rounded-full
                                px-2
                                py-1
                                text-[11px]
                                font-semibold
                                {{ $ordersEvolution >= 0
                                    ? 'bg-green-50 text-green-600'
                                    : 'bg-red-50 text-red-600' }}
                            "
                        >
                            {{ $ordersEvolution >= 0 ? '+' : '' }}{{ number_format($ordersEvolution, 1, ',', ' ') }}%
                        </span>

                    </div>


                    <p class="mt-5 text-[12px] font-medium text-gray-400">
                        Commandes
                    </p>

                    <p class="mt-1 text-[25px] font-semibold tracking-tight text-gray-900">
                        {{ number_format($monthlyOrdersCount, 0, ',', ' ') }}
                    </p>

                    <p class="mt-1 text-[11px] text-gray-400">
                        ce mois-ci
                    </p>

                </div>


                {{-- ================================================= --}}
                {{-- CHIFFRE D'AFFAIRES                                --}}
                {{-- ================================================= --}}

                <div
                    class="
                        rounded-2xl
                        border
                        border-gray-200/80
                        bg-[#593114]
                        p-5
                        shadow-[0_8px_25px_rgba(89,49,20,0.15)]
                    "
                >

                    <div class="flex items-start justify-between">

                        <div
                            class="
                                flex
                                h-9
                                w-9
                                items-center
                                justify-center
                                rounded-xl
                                bg-white/10
                                text-white
                            "
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                class="h-4 w-4"
                            >
                                <path d="M12 3v18"/>
                                <path d="M17 7.5c0-1.7-2.2-3-5-3s-5 1.3-5 3 2.2 3 5 3 5 1.3 5 3-2.2 3-5 3-5-1.3-5-3"/>
                            </svg>

                        </div>


                        {{-- Évolution réelle --}}
                        <span
                            class="
                                rounded-full
                                px-2
                                py-1
                                text-[11px]
                                font-semibold
                                {{ $revenueEvolution >= 0
                                    ? 'bg-white/10 text-white'
                                    : 'bg-red-400/20 text-red-200' }}
                            "
                        >
                            {{ $revenueEvolution >= 0 ? '+' : '' }}{{ number_format($revenueEvolution, 1, ',', ' ') }}%
                        </span>

                    </div>


                    <p class="mt-5 text-[12px] font-medium text-white/60">
                        Chiffre d'affaires
                    </p>

                    <p class="mt-1 text-[25px] font-semibold tracking-tight text-white">
                        {{ number_format($monthlyRevenue, 0, ',', ' ') }}
                    </p>

                    <p class="mt-1 text-[11px] text-white/50">
                        FCFA ce mois-ci
                    </p>

                </div>


                {{-- ================================================= --}}
                {{-- CLIENTS                                           --}}
                {{-- ================================================= --}}

                <div
                    class="
                        rounded-2xl
                        border
                        border-gray-200/80
                        bg-white
                        p-5
                        shadow-[0_4px_20px_rgba(0,0,0,0.025)]
                    "
                >

                    <div class="flex items-start justify-between">

                        <div
                            class="
                                flex
                                h-9
                                w-9
                                items-center
                                justify-center
                                rounded-xl
                                bg-[#e25f12]/10
                                text-[#e25f12]
                            "
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                class="h-4 w-4"
                            >
                                <circle cx="9" cy="8" r="3"/>
                                <path d="M3.5 19a5.5 5.5 0 0 1 11 0"/>
                                <path d="M16 11a3 3 0 1 0 0-6"/>
                            </svg>

                        </div>

                    </div>


                    <p class="mt-5 text-[12px] font-medium text-gray-400">
                        Clients
                    </p>

                    <p class="mt-1 text-[25px] font-semibold tracking-tight text-gray-900">
                        {{ number_format($customersCount, 0, ',', ' ') }}
                    </p>

                    <p class="mt-1 text-[11px] text-gray-400">
                        clients ayant commandé
                    </p>

                </div>


                {{-- ================================================= --}}
                {{-- PLATS                                              --}}
                {{-- ================================================= --}}

                <div
                    class="
                        rounded-2xl
                        border
                        border-gray-200/80
                        bg-white
                        p-5
                        shadow-[0_4px_20px_rgba(0,0,0,0.025)]
                    "
                >

                    <div class="flex items-start justify-between">

                        <div
                            class="
                                flex
                                h-9
                                w-9
                                items-center
                                justify-center
                                rounded-xl
                                bg-orange-50
                                text-[#e25f12]
                            "
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                class="h-4 w-4"
                            >
                                <path d="M4 5h16v14H4z"/>
                                <path d="M4 9h16"/>
                            </svg>

                        </div>

                    </div>


                    <p class="mt-5 text-[12px] font-medium text-gray-400">
                        Plats disponibles
                    </p>

                    <p class="mt-1 text-[25px] font-semibold tracking-tight text-gray-900">
                        {{ number_format($availableProductsCount, 0, ',', ' ') }}
                    </p>

                    <p class="mt-1 text-[11px] text-gray-400">
                        plats actuellement publiés
                    </p>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- ANALYTIQUE + COMMANDES                             --}}
            {{-- ================================================= --}}

            <div class="mt-5 grid grid-cols-1 gap-5 xl:grid-cols-[1.5fr_1fr]">


                {{-- ================================================= --}}
                {{-- ACTIVITÉ                                           --}}
                {{-- ================================================= --}}

                <div
                    class="
                        rounded-2xl
                        border
                        border-gray-200/80
                        bg-white
                        p-5
                    "
                >

                    <div class="flex items-center justify-between">

                        <div>

                            <h3 class="text-[13px] font-semibold text-gray-900">
                                Activité des commandes
                            </h3>

                            <p class="mt-0.5 text-[12px] text-gray-400">
                                Évolution des commandes cette semaine
                            </p>

                        </div>


                        <span
                            class="
                                rounded-lg
                                border
                                border-gray-200
                                px-2.5
                                py-1.5
                                text-[10px]
                                font-medium
                                text-gray-500
                            "
                        >
                            Cette semaine
                        </span>

                    </div>


                    {{-- Graphique réel --}}
                    <div class="mt-7 flex h-[190px] items-end gap-3 sm:gap-5">

                        @foreach ($weeklyActivity as $day)

                            <div class="flex flex-1 flex-col items-center gap-2">

                                <div
                                    class="flex h-[155px] w-full items-end justify-center"
                                >

                                    <div
                                        class="
                                            relative
                                            flex
                                            w-full
                                            max-w-[32px]
                                            items-end
                                            justify-center
                                        "
                                        style="height: 100%;"
                                    >

                                        <div
                                            class="
                                                w-full
                                                rounded-t-lg
                                                bg-[#593114]/10
                                                transition
                                                hover:bg-[#593114]/20
                                            "
                                            style="height: {{ $day['height'] }}%;"
                                            title="{{ $day['count'] }} commande{{ $day['count'] > 1 ? 's' : '' }}"
                                        ></div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>


                    {{-- Jours --}}
                    <div class="mt-2 grid grid-cols-7 text-center text-[12px] text-gray-400">

                        @foreach ($weeklyActivity as $day)

                            <span>
                                {{ $day['label'] }}
                            </span>

                        @endforeach

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- COMMANDES RÉCENTES                                --}}
                {{-- ================================================= --}}

                <div
                    class="
                        rounded-2xl
                        border
                        border-gray-200/80
                        bg-white
                        p-5
                    "
                >

                    <div class="flex items-center justify-between">

                        <div>

                            <h3 class="text-[13px] font-semibold text-gray-900">
                                Commandes récentes
                            </h3>

                            <p class="mt-0.5 text-[12px] text-gray-400">
                                Les dernières commandes
                            </p>

                        </div>


                        <a
                            href="{{ route('admin.orders.index') }}"
                            class="text-[11px] font-semibold text-[#e25f12]"
                        >
                            Voir tout
                        </a>

                    </div>


                    <div class="mt-5 space-y-4">

                        @forelse ($recentOrders as $order)

                            @php
                                $customerName = $order->user?->name ?? 'Client';
                                $initial = mb_strtoupper(mb_substr($customerName, 0, 1));

                                $statusLabels = [
                                    'pending' => 'En attente',
                                    'confirmed' => 'Confirmée',
                                    'preparing' => 'En préparation',
                                    'shipped' => 'Expédiée',
                                    'delivered' => 'Livrée',
                                    'cancelled' => 'Annulée',
                                ];

                                $statusLabel = $statusLabels[$order->status] ?? ucfirst($order->status);

                                $statusClass = match ($order->status) {
                                    'delivered' => 'text-green-600',
                                    'confirmed',
                                    'preparing',
                                    'shipped' => 'text-[#e25f12]',
                                    'cancelled' => 'text-red-500',
                                    default => 'text-gray-400',
                                };
                            @endphp


                            <div class="flex items-center justify-between gap-3">

                                <div class="flex min-w-0 items-center gap-3">

                                    <div
                                        class="
                                            flex
                                            h-8
                                            w-8
                                            shrink-0
                                            items-center
                                            justify-center
                                            rounded-full
                                            bg-[#593114]/10
                                            text-[9px]
                                            font-bold
                                            text-[#593114]
                                        "
                                    >
                                        {{ $initial }}
                                    </div>


                                    <div class="min-w-0">

                                        <p class="truncate text-[12px] font-semibold text-gray-700">
                                            {{ $customerName }}
                                        </p>

                                        <p class="mt-0.5 text-[8px] text-gray-400">
                                            #{{ $order->order_number }}
                                        </p>

                                    </div>

                                </div>


                                <div class="text-right">

                                    <p class="text-[12px] font-semibold text-gray-800">
                                        {{ number_format($order->total, 0, ',', ' ') }} FCFA
                                    </p>

                                    <p class="mt-0.5 text-[9px] font-medium {{ $statusClass }}">
                                        {{ $statusLabel }}
                                    </p>

                                </div>

                            </div>

                        @empty

                            <div class="py-8 text-center">

                                <p class="text-[12px] font-medium text-gray-500">
                                    Aucune commande récente
                                </p>

                                <p class="mt-1 text-[10px] text-gray-400">
                                    Les nouvelles commandes apparaîtront ici.
                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- BAS DU DASHBOARD                                   --}}
            {{-- ================================================= --}}

            <div class="mt-5 grid grid-cols-1 gap-5 lg:grid-cols-3">


                {{-- ================================================= --}}
                {{-- PLATS POPULAIRES                                  --}}
                {{-- ================================================= --}}

                <div
                    class="
                        rounded-2xl
                        border
                        border-gray-200/80
                        bg-white
                        p-5
                        lg:col-span-2
                    "
                >

                    <div class="flex items-center justify-between">

                        <div>

                            <h3 class="text-[13px] font-semibold text-gray-900">
                                Plats les plus commandés
                            </h3>

                            <p class="mt-0.5 text-[12px] text-gray-400">
                                Performance de vos plats ce mois-ci
                            </p>

                        </div>


                        <a
                            href="{{ route('admin.products.index') }}"
                            class="text-[11px] font-semibold text-[#e25f12]"
                        >
                            Voir les plats
                        </a>

                    </div>


                    <div class="mt-5 space-y-4">

                        @forelse ($popularProducts as $item)

                            <div>

                                <div class="mb-2 flex items-center justify-between">

                                    <span class="text-[12px] font-medium text-gray-700">
                                        {{ $item->product?->name ?? 'Produit supprimé' }}
                                    </span>

                                    <span class="text-[10px] text-gray-400">
                                        {{ number_format($item->total_quantity, 0, ',', ' ') }}
                                        commande{{ $item->total_quantity > 1 ? 's' : '' }}
                                    </span>

                                </div>


                                <div class="h-1.5 overflow-hidden rounded-full bg-gray-100">

                                    <div
                                        class="h-full rounded-full bg-[#e25f12] transition-all"
                                        style="width: {{ $item->percentage }}%;"
                                    ></div>

                                </div>

                            </div>

                        @empty

                            <div class="py-8 text-center">

                                <p class="text-[12px] font-medium text-gray-500">
                                    Aucun plat commandé ce mois-ci
                                </p>

                                <p class="mt-1 text-[10px] text-gray-400">
                                    Les performances apparaîtront après les premières commandes.
                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- RÉSUMÉ                                             --}}
                {{-- ================================================= --}}

                <div
                    class="
                        rounded-2xl
                        bg-[#593114]
                        p-5
                        text-white
                    "
                >

                    <p class="text-[11px] font-medium uppercase tracking-[0.12em] text-white/50">
                        Résumé
                    </p>


                    @if ($revenueEvolution > 0)

                        <h3 class="mt-2 text-[15px] font-semibold">
                            Le chiffre d'affaires progresse ce mois-ci.
                        </h3>

                        <p class="mt-2 text-[10px] leading-5 text-white/60">
                            Le chiffre d'affaires est actuellement en hausse
                            de {{ number_format($revenueEvolution, 1, ',', ' ') }}%
                            par rapport au mois précédent.
                        </p>

                    @elseif ($revenueEvolution < 0)

                        <h3 class="mt-2 text-[15px] font-semibold">
                            Le chiffre d'affaires est en baisse ce mois-ci.
                        </h3>

                        <p class="mt-2 text-[10px] leading-5 text-white/60">
                            Le chiffre d'affaires est actuellement en baisse
                            de {{ number_format(abs($revenueEvolution), 1, ',', ' ') }}%
                            par rapport au mois précédent.
                        </p>

                    @else

                        <h3 class="mt-2 text-[15px] font-semibold">
                            L'activité est stable ce mois-ci.
                        </h3>

                        <p class="mt-2 text-[10px] leading-5 text-white/60">
                            Le chiffre d'affaires est actuellement au même niveau
                            que le mois précédent.
                        </p>

                    @endif


                    <div class="mt-7 border-t border-white/10 pt-4">

                        <div class="flex items-center justify-between">

                            <span class="text-[10px] text-white/50">
                                Évolution du chiffre d'affaires
                            </span>

                            <span class="text-[11px] font-semibold text-white">
                                {{ $revenueEvolution >= 0 ? '+' : '' }}{{ number_format($revenueEvolution, 1, ',', ' ') }}%
                            </span>

                        </div>


                        <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-white/10">

                            <div
                                class="
                                    h-full
                                    rounded-full
                                    bg-[#e25f12]
                                    transition-all
                                "
                                style="width: {{ min(100, max(0, $revenueEvolution)) }}%;"
                            ></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- SCRIPT LOADER                                             --}}
    {{-- ========================================================= --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const loader = document.getElementById('page-loader');

            if (!loader) {
                return;
            }

            // Temps d'affichage du loader
            setTimeout(function () {

                loader.classList.add('opacity-0');

                // Supprime complètement le loader après l'animation
                setTimeout(function () {
                    loader.remove();
                }, 500);

            }, 1200);

        });
    </script>

</x-admin-layout>
