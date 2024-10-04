@props(['class' => ''])

<h3 {{ $attributes->merge(['class' => 'font-semibold leading-none tracking-tight ' . $class]) }}>
    {{ $slot }}
</h3>