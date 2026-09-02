@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full bg-cream-bg border border-outline-variant/60 focus:border-primary focus:ring-1 focus:ring-primary text-on-surface rounded-xl shadow-sm px-4 py-2.5 text-sm placeholder:text-on-surface-variant/40 transition-colors disabled:bg-surface-variant/40 disabled:cursor-not-allowed']) }}>
