<div class="h-[{{ $block['attributes']['height'] }}px] w-[{{ $block['attributes']['width'] }}px] overflow-hidden">
    <img
        src="{{ $block['attributes']['src'] }}"
        alt="{{ $block['attributes']['alt'] }}"
        class="{{ $block['attributes']['className'] ?? '' }} w-full h-full rounded-lg object-cover"
        loading="lazy"
    >
</div>