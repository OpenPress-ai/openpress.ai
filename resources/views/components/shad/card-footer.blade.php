@props(['class' => ''])

<div {{ $attributes->merge(['class' => 'flex items-center p-6 pt-0 ' . $class]) }}>
    {{ $slot }}
</div>