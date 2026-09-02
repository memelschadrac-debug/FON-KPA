<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-secondary hover:bg-secondary-dark text-white font-heading font-bold text-sm tracking-wide rounded-xl shadow-sm hover:shadow active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-secondary/50 transition-all duration-200 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed']) }}>
    {{ $slot }}
</button>
