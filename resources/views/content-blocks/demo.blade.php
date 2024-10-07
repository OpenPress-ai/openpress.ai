<x-blocks-layout :theme="$page['theme']" :styles="$page['styles']">
    <div class="min-h-screen overflow-y-auto py-8 px-4" style="background-color: {{ $page['theme']['colors']['background'] }}; color: {{ $page['theme']['colors']['text'] }};">
        <div class="max-w-4xl mx-auto">
            @foreach($page['blocks'] as $block)
                @include('components.blocks.' . strtolower($block['type']), ['block' => $block, 'theme' => $page['theme'], 'styles' => $page['styles']])
            @endforeach
        </div>
    </div>
</x-blocks-layout>