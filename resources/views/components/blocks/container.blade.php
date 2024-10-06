<div class="{{ $block['attributes']['className'] ?? '' }}" style="{{ $block['attributes']['style'] ?? '' }}">
    @foreach($block['children'] as $child)
        @include('components.blocks.' . strtolower($child['type']), ['block' => $child])
    @endforeach
</div>