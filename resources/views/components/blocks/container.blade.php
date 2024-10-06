@php
$style = '';
if (isset($block['attributes']['style'])) {
    foreach ($block['attributes']['style'] as $property => $value) {
        $processedValue = preg_replace_callback('/\{\{theme\.([a-z-]+)\}\}/', function($matches) use ($theme) {
            return $theme[$matches[1]] ?? '';
        }, $value);
        $style .= "{$property}:{$processedValue};";
    }
}
@endphp

<div class="{{ $block['attributes']['className'] ?? '' }}" style="{{ $style }}">
    @foreach($block['children'] as $child)
        @include('components.blocks.' . strtolower($child['type']), ['block' => $child, 'theme' => $theme])
    @endforeach
</div>