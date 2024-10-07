<x-blocks-layout :theme="$page['theme']" :styles="$page['styles']">
    <div class="{{ $page['containerClasses'] }}" style="background-color: {{ $page['theme']['colors']['background'] }}; color: {{ $page['theme']['colors']['text'] }};">
        @foreach($page['blocks'] as $block)
            @include('components.blocks.' . strtolower($block['type']), ['block' => $block, 'theme' => $page['theme'], 'styles' => $page['styles']])
        @endforeach
    </div>
</x-blocks-layout>