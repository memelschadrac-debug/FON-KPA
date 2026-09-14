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


</x-admin-layout>