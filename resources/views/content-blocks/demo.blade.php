<x-blocks-layout :theme="$page['theme']">
    <div class="{{ implode(' ', $page['containerClasses']) }}" style="background-color: {{ $page['theme']['background-color'] }}; color: {{ $page['theme']['color'] }};">
        @foreach($page['blocks'] as $block)
            @include('components.blocks.' . strtolower($block['type']), ['block' => $block, 'theme' => $page['theme']])
        @endforeach
    </div>
</x-blocks-layout>