{{-- ========================================================= --}}
{{-- FON-KPA — PAGE LOADER                                     --}}
{{-- ========================================================= --}}
{{--                                                         --}}
{{-- Loader réutilisable pour les transitions de navigation. --}}
{{-- Il est invisible par défaut et peut être affiché avec : --}}
{{--                                                        --}}
{{-- document.getElementById('page-loader').classList.remove('hidden'); --}}
{{--                                                         --}}
{{-- ========================================================= --}}

<div
    id="page-loader"
    class="
        fixed
        inset-0
        z-[9999]
        hidden
        items-center
        justify-center
        bg-white
    "
    role="status"
    aria-live="polite"
    aria-label="Chargement en cours"
>
    <div class="flex flex-col items-center">

        {{-- Spinner --}}
        <svg
            class="h-8 w-8 animate-spin text-[#593114]"
            viewBox="0 0 24 24"
            fill="none"
            aria-hidden="true"
        >
            <circle
                cx="12"
                cy="12"
                r="9"
                class="opacity-20"
                stroke="currentColor"
                stroke-width="2.5"
            />

            <path
                d="M21 12a9 9 0 0 0-9-9"
                class="opacity-90"
                stroke="currentColor"
                stroke-width="2.5"
                stroke-linecap="round"
            />
        </svg>

        {{-- Texte --}}
        <p
            class="
                mt-3
                text-[11px]
                font-medium
                tracking-wide
                text-gray-500
            "
        >
            Chargement...
        </p>

    </div>
</div>
