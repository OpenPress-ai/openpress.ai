<x-blocks-layout :theme="$page['theme']">
    @foreach($page['blocks'] as $block)
        @include('components.blocks.' . strtolower($block['type']), ['block' => $block, 'theme' => $page['theme']])
    @endforeach
</x-blocks-layout>