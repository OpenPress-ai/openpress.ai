<x-blocks-layout :theme="$page['theme']">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4">{{ $page['title'] }}</h1>
                @foreach($page['blocks'] as $block)
                    @include('components.blocks.' . strtolower($block['type']), ['block' => $block, 'theme' => $page['theme']])
                @endforeach
            </div>
        </div>
    </div>
</x-blocks-layout>