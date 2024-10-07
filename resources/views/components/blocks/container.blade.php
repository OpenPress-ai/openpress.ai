@php
    use App\Helpers\ThemeHelper;

    $style = ThemeHelper::processStyle($block['attributes']['style'] ?? [], $theme);
@endphp

<div class="{{ $block['attributes']['className'] ?? '' }}" style="{{ $style }}">
    @foreach($block['children'] as $child)
        @include('components.blocks.' . strtolower($child['type']), ['block' => $child, 'theme' => $theme, 'styles' => $styles])
    @endforeach
</div>