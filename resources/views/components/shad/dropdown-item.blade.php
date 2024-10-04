@props(['disabled' => false])

<a {{ $disabled ? 'aria-disabled="true"' : '' }} {{ $attributes->merge([
    'class' => 'relative flex cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50' . ($disabled ? ' opacity-50 cursor-not-allowed' : '')
]) }}>
    {{ $slot }}
</a>