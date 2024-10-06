<div class="{{ $block['attributes']['className'] ?? '' }}" style="@foreach($block['attributes']['style'] ?? [] as $property => $value){{ $property }}:{{ $value }};@endforeach">
    @foreach($block['children'] as $child)
        @include('components.blocks.' . strtolower($child['type']), ['block' => $child])
    @endforeach
</div>