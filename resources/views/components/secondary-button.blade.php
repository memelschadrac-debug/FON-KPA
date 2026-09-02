<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2.5 bg-beige-surface border border-outline-variant/60 rounded-xl font-medium text-xs text-primary uppercase tracking-wider hover:bg-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/40 transition-colors shadow-sm disabled:opacity-50']) }}>
    {{ $slot }}
</button>
