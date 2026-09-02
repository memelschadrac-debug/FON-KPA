<x-admin-layout>

{{-- ============================= --}}
    {{-- LOADER PLEIN ÉCRAN --}}
    {{-- ============================= --}}

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


    {{-- ============================= --}}
    {{-- DASHBOARD --}}
    {{-- ============================= --}}

    <div id="dashboard-content">

        {{-- Tout ton contenu actuel du dashboard --}}
        
        ...

    </div>


    {{-- ============================= --}}
    {{-- SCRIPT LOADER --}}
    {{-- ============================= --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const loader = document.getElementById('page-loader');

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


    {{-- ============================= --}}
    {{-- CONTENU --}}
    {{-- ============================= --}}

    <div class="p-5 sm:p-8">

        {{-- Introduction --}}
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


        {{-- ============================= --}}
        {{-- STATISTIQUES --}}
        {{-- ============================= --}}

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">


            {{-- Commandes --}}
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

                    <span
                        class="
                            rounded-full
                            bg-green-50
                            px-2
                            py-1
                            text-[11px]
                            font-semibold
                            text-green-600
                        "
                    >
                        +12,5%
                    </span>

                </div>

                <p class="mt-5 text-[12px] font-medium text-gray-400">
                    Commandes
                </p>

                <p class="mt-1 text-[25px] font-semibold tracking-tight text-gray-900">
                    128
                </p>

                <p class="mt-1 text-[11px] text-gray-400">
                    par rapport au mois dernier
                </p>

            </div>


            {{-- Chiffre d'affaires --}}
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

                    <span
                        class="
                            rounded-full
                            bg-white/10
                            px-2
                            py-1
                            text-[11px]
                            font-semibold
                            text-white
                        "
                    >
                        +8,4%
                    </span>

                </div>

                <p class="mt-5 text-[12px] font-medium text-white/60">
                    Chiffre d'affaires
                </p>

                <p class="mt-1 text-[25px] font-semibold tracking-tight text-white">
                    2,84 M
                </p>

                <p class="mt-1 text-[11px] text-white/50">
                    FCFA ce mois-ci
                </p>

            </div>


            {{-- Clients --}}
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

                    <span
                        class="
                            rounded-full
                            bg-green-50
                            px-2
                            py-1
                            text-[11px]
                            font-semibold
                            text-green-600
                        "
                    >
                        +6,2%
                    </span>

                </div>

                <p class="mt-5 text-[12px] font-medium text-gray-400">
                    Clients
                </p>

                <p class="mt-1 text-[25px] font-semibold tracking-tight text-gray-900">
                    1 284
                </p>

                <p class="mt-1 text-[11px] text-gray-400">
                    clients enregistrés
                </p>

            </div>


            {{-- Plats --}}
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
                    48
                </p>

                <p class="mt-1 text-[11px] text-gray-400">
                    plats actuellement publiés
                </p>

            </div>

        </div>


        {{-- ============================= --}}
        {{-- ANALYTIQUE + COMMANDES --}}
        {{-- ============================= --}}

        <div class="mt-5 grid grid-cols-1 gap-5 xl:grid-cols-[1.5fr_1fr]">


            {{-- Activité --}}
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

                    <button
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
                    </button>

                </div>


                {{-- Graphique visuel --}}
                <div class="mt-7 flex h-[190px] items-end gap-3 sm:gap-5">

                    @foreach ([42, 64, 52, 82, 68, 96, 74] as $height)

                        <div class="flex flex-1 flex-col items-center gap-2">

                            <div
                                class="flex h-[155px] w-full items-end justify-center"
                            >

                                <div
                                    class="
                                        w-full
                                        max-w-[32px]
                                        rounded-t-lg
                                        bg-[#593114]/10
                                        transition
                                        hover:bg-[#593114]/20
                                    "
                                    style="height: {{ $height }}%;"
                                ></div>

                            </div>

                        </div>

                    @endforeach

                </div>

                <div class="mt-2 grid grid-cols-7 text-center text-[12px] text-gray-400">

                    <span>Lun</span>
                    <span>Mar</span>
                    <span>Mer</span>
                    <span>Jeu</span>
                    <span>Ven</span>
                    <span>Sam</span>
                    <span>Dim</span>

                </div>

            </div>


            {{-- Commandes récentes --}}
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
                        href="#"
                        class="text-[11px] font-semibold text-[#e25f12]"
                    >
                        Voir tout
                    </a>

                </div>


                <div class="mt-5 space-y-4">

                    @foreach ([
                        ['#FK-1048', 'Kouadio A.', '18 500 FCFA', 'En préparation'],
                        ['#FK-1047', 'Awa K.', '12 000 FCFA', 'Livrée'],
                        ['#FK-1046', 'Yao M.', '24 500 FCFA', 'En attente'],
                        ['#FK-1045', 'N’Guessan J.', '9 500 FCFA', 'Livrée'],
                    ] as $order)

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
                                    {{ strtoupper(substr($order[1], 0, 1)) }}
                                </div>

                                <div class="min-w-0">

                                    <p class="truncate text-[12px] font-semibold text-gray-700">
                                        {{ $order[1] }}
                                    </p>

                                    <p class="mt-0.5 text-[8px] text-gray-400">
                                        {{ $order[0] }}
                                    </p>

                                </div>

                            </div>

                            <div class="text-right">

                                <p class="text-[12px] font-semibold text-gray-800">
                                    {{ $order[2] }}
                                </p>

                                <p
                                    class="
                                        mt-0.5
                                        text-[9px]
                                        font-medium
                                        {{ $order[3] === 'Livrée'
                                            ? 'text-green-600'
                                            : ($order[3] === 'En préparation'
                                                ? 'text-[#e25f12]'
                                                : 'text-gray-400') }}
                                    "
                                >
                                    {{ $order[3] }}
                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>


        {{-- ============================= --}}
        {{-- BAS DU DASHBOARD --}}
        {{-- ============================= --}}

        <div class="mt-5 grid grid-cols-1 gap-5 lg:grid-cols-3">


            {{-- Plats populaires --}}
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
                            Performance de vos plats
                        </p>

                    </div>

                    <a
                        href="#"
                        class="text-[11px] font-semibold text-[#e25f12]"
                    >
                        Voir les plats
                    </a>

                </div>


                <div class="mt-5 space-y-4">

                    @foreach ([
                        ['Poulet braisé', '32 commandes', '84%'],
                        ['Attiéké poisson', '27 commandes', '71%'],
                        ['Garba', '24 commandes', '63%'],
                        ['Alloco', '19 commandes', '50%'],
                    ] as $dish)

                        <div>

                            <div class="mb-2 flex items-center justify-between">

                                <span class="text-[12px] font-medium text-gray-700">
                                    {{ $dish[0] }}
                                </span>

                                <span class="text-[10px] text-gray-400">
                                    {{ $dish[1] }}
                                </span>

                            </div>

                            <div class="h-1.5 overflow-hidden rounded-full bg-gray-100">

                                <div
                                    class="h-full rounded-full bg-[#e25f12]"
                                    style="width: {{ $dish[2] }};"
                                ></div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


            {{-- Résumé --}}
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

                <h3 class="mt-2 text-[15px] font-semibold">
                    Votre activité est en bonne progression.
                </h3>

                <p class="mt-2 text-[10px] leading-5 text-white/60">
                    Les commandes et le nombre de clients continuent
                    d'évoluer positivement ce mois-ci.
                </p>


                <div class="mt-7 border-t border-white/10 pt-4">

                    <div class="flex items-center justify-between">

                        <span class="text-[10px] text-white/50">
                            Progression mensuelle
                        </span>

                        <span class="text-[11px] font-semibold text-white">
                            78%
                        </span>

                    </div>

                    <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-white/10">

                        <div
                            class="h-full w-[78%] rounded-full bg-[#e25f12]"
                        ></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-admin-layout>