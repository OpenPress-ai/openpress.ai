@props(['class' => ''])

<div {{ $attributes->merge(['class' => 'p-6 pt-0 ' . $class]) }}>
    {{ $slot }}
</div>