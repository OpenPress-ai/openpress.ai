<div class="grid grid-cols-{{ $block['attributes']['columns'] }} gap-{{ $block['attributes']['gap'] }}">
    @foreach($block['children'] as $child)
        @include('components.blocks.' . strtolower($child['type']), ['block' => $child])
    @endforeach
</div>