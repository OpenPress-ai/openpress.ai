<div class="{{ $block['attributes']['className'] ?? '' }}" style="{{ isset($block['attributes']['style']) ? implode('; ', array_map(function($key, $value) { return $key . ': ' . $value; }, array_keys($block['attributes']['style']), $block['attributes']['style'])) : '' }}">
    @foreach(explode("\n", $block['attributes']['content']) as $paragraph)
        <p class="mb-4">{{ $paragraph }}</p>
    @endforeach
</div>