@props(['src' => null, 'alt' => '', 'fallback' => ''])

<span {{ $attributes->merge(['class' => 'relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full']) }}>
    @if ($src)
        <img src="{{ $src }}" alt="{{ $alt }}" class="aspect-square h-full w-full">
    @else
        <span class="flex h-full w-full items-center justify-center rounded-full bg-muted">
            {{ $fallback }}
        </span>
    @endif
</span>