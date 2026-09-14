<div class="flex items-center gap-2 text-[12px] font-medium text-gray-400">

    <span>{{ $section ?? 'Catalogue' }}</span>

    <svg
        class="h-3.5 w-3.5"
        viewBox="0 0 20 20"
        fill="currentColor"
    >
        <path
            fill-rule="evenodd"
            d="M7.21 14.77a.75.75 0 01.02-1.06L10.94 10 7.23 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75 1.06 0 010 1.06l-4.24 4.24a.75 4.24 0 01-1.08 0z"
            clip-rule="evenodd"
        />
    </svg>

    <span>{{ $page ?? 'Page' }}</span>

    <svg
        class="h-3.5 w-3.5"
        viewBox="0 0 20 20"
        fill="currentColor"
    >
        <path
            fill-rule="evenodd"
            d="M7.21 14.77a.75.75 0 01.02-1.06L10.94 10 7.23 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75 1.06 0 010 1.06l-4.24 4.24a.75 4.24 0 01-1.08 0z"
            clip-rule="evenodd"
        />
    </svg>

    <span class="text-[#593114]">
        {{ $current ?? 'Ajouter' }}
    </span>

</div>
