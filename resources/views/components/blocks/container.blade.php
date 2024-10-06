@php
$style = '';
if (isset($block['attributes']['style'])) {
    foreach ($block['attributes']['style'] as $property => $value) {
        // Convert camelCase to kebab-case for CSS properties
        $cssProperty = preg_replace('/([a-z])([A-Z])/', '$1-$2', $property);
        $cssProperty = strtolower($cssProperty);

        $processedValue = preg_replace_callback('/\{\{theme\.(\w+)\}\}/', function($matches) use ($theme) {
            return $theme[$matches[1]] ?? '';
        }, $value);
        $style .= "{$cssProperty}:{$processedValue};";
    }
}
@endphp

<div class="{{ $block['attributes']['className'] ?? '' }}" style="{{ $style }}">
    @foreach($block['children'] as $child)
        @include('components.blocks.' . strtolower($child['type']), ['block' => $child, 'theme' => $theme])
    @endforeach
</div>