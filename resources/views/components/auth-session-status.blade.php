@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-xs text-success bg-success/10 border border-success/30 rounded-xl p-3 flex items-center gap-2']) }}>
        <span class="material-symbols-outlined text-sm">check_circle</span>
        <span>{{ $status }}</span>
    </div>
@endif
