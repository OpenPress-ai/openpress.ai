<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($posts as $post)
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">
                                <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="text-gray-600">{{ Str::limit($post->content, 100) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>