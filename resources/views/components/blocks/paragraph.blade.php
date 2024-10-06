<p class="{{ $block['attributes']['className'] ?? '' }}" style="{{ isset($block['attributes']['style']) ? implode('; ', array_map(function($key, $value) { return $key . ': ' . $value; }, array_keys($block['attributes']['style']), $block['attributes']['style'])) : '' }}">
    {{ $block['attributes']['content'] }}
</p>