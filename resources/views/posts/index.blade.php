<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-3xl text-foreground">
                {{ __('Blog') }}
            </h1>
            <x-shad.button tag="a" href="{{ route('posts.create') }}">
                Create Post
            </x-shad.button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts as $post)
            <article class="mb-12 bg-card shadow-sm rounded-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-2">
                        <a href="{{ route('posts.show', $post) }}" class="text-foreground hover:text-primary transition duration-150 ease-in-out">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <div class="flex items-center text-sm text-muted-foreground mb-4">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <time datetime="{{ $post->created_at->toDateString() }}">
                            {{ $post->created_at->format('F j, Y') }}
                        </time>
                        <span class="mx-2">&bull;</span>
                        <span>{{ $post->user->name }}</span>
                    </div>
                    <p class="text-foreground mb-4">{{ Str::limit($post->content, 200) }}</p>
                    <div class="flex justify-between items-center">
                        <x-shad.button tag="a" href="{{ route('posts.show', $post) }}" variant="outline" size="sm">
                            Read More
                        </x-shad.button>
                        <div class="flex items-center text-sm text-muted-foreground">
                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                            <span>{{ $post->comments_count ?? 0 }} comments</span>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</x-app-layout>
