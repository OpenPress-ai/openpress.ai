<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $post->title }}
            </h2>
            <x-shad.button tag="a" href="{{ route('posts.index') }}" variant="outline">
                Back to Posts
            </x-shad.button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <x-shad.card>
                <x-shad.card-header>
                    <x-shad.card-title>{{ $post->title }}</x-shad.card-title>
                    <x-shad.card-description>
                        Posted by: {{ $post->user ? $post->user->name : 'Unknown' }}
                    </x-shad.card-description>
                </x-shad.card-header>
                <x-shad.card-content>
                    <div class="prose dark:prose-invert max-w-none">
                        {{ $post->content }}
                    </div>
                </x-shad.card-content>
                <x-shad.card-footer class="justify-between">
                    <span class="text-sm text-muted-foreground">
                        Posted on: {{ $post->created_at->format('F j, Y') }}
                    </span>
                    {{-- Commented out edit and delete buttons
                    @if($post->user && $post->user->id === auth()->id())
                        <div class="space-x-2">
                            <x-shad.button tag="a" href="{{ route('posts.edit', $post) }}" variant="outline" size="sm">
                                Edit
                            </x-shad.button>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <x-shad.button type="submit" variant="destructive" size="sm">
                                    Delete
                                </x-shad.button>
                            </form>
                        </div>
                    @endif
                    --}}
                </x-shad.card-footer>
            </x-shad.card>
        </div>
    </div>
</x-app-layout>