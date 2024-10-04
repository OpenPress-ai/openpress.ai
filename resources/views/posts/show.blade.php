<x-app-layout>
    <article class="py-16 bg-background">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <header class="mb-10">
                <h1 class="text-4xl font-bold text-foreground mb-4">
                    {{ $post->title }}
                </h1>
                <div class="flex items-center text-sm text-muted-foreground">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>{{ $post->user ? $post->user->name : 'Unknown' }}</span>
                    <span class="mx-2">&bull;</span>
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <time datetime="{{ $post->created_at->toDateString() }}">
                        {{ $post->created_at->format('F j, Y') }}
                    </time>
                </div>
            </header>

            <div class="prose dark:prose-invert max-w-none mb-10">
                {!! nl2br(e($post->content)) !!}
            </div>

            <footer class="border-t border-border pt-6 mt-10">
                <div class="flex justify-between items-center">
                    <x-shad.button tag="a" href="{{ route('posts.index') }}" variant="outline">
                        &larr; Back to Posts
                    </x-shad.button>
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
                </div>
            </footer>
        </div>
    </article>
</x-app-layout>