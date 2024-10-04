<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <x-shad.card>
                        <x-shad.card-header>
                            <x-shad.card-title>
                                <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                                    {{ $post->title }}
                                </a>
                            </x-shad.card-title>
                        </x-shad.card-header>
                        <x-shad.card-content>
                            <p class="text-muted-foreground">{{ Str::limit($post->content, 100) }}</p>
                        </x-shad.card-content>
                        <x-shad.card-footer class="justify-end">
                            <x-shad.button tag="a" href="{{ route('posts.show', $post) }}" variant="outline" size="sm">
                                Read More
                            </x-shad.button>
                        </x-shad.card-footer>
                    </x-shad.card>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>