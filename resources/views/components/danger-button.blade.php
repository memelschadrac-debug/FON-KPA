<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2.5 bg-error text-white font-heading font-bold text-xs uppercase tracking-wider rounded-xl shadow-sm hover:bg-error/90 focus:outline-none focus:ring-2 focus:ring-error/50 transition-colors disabled:opacity-50']) }}>
    {{ $slot }}
</button>
