@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-heading font-semibold text-xs uppercase tracking-wider text-primary mb-1.5']) }}>
    {{ $value ?? $slot }}
</label>
