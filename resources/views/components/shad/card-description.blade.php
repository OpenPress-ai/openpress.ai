@props(['class' => ''])

<p {{ $attributes->merge(['class' => 'text-sm text-muted-foreground ' . $class]) }}>
    {{ $slot }}
</p>