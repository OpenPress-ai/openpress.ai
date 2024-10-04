@props(['class' => ''])

<div {{ $attributes->merge(['class' => 'rounded-xl border border-border bg-card text-card-foreground shadow ' . $class]) }}>
    {{ $slot }}
</div>
