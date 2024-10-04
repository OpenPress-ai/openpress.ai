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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Hero Card (Left Half) -->
                <div class="md:w-1/2">
                    <x-shad.card class="h-full">
                        <x-shad.card-header>
                            <x-shad.card-title>
                                <a href="{{ route('posts.show', $heroPost) }}" class="text-2xl font-bold hover:text-primary transition duration-150 ease-in-out">
                                    {{ $heroPost->title }}
                                </a>
                            </x-shad.card-title>
                            <x-shad.card-description>
                                <div class="flex items-center text-sm text-muted-foreground">
                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <time datetime="{{ $heroPost->created_at->toDateString() }}">
                                        {{ $heroPost->created_at->format('F j, Y') }}
                                    </time>
                                    <span class="mx-2">&bull;</span>
                                    <span>{{ $heroPost->user->name }}</span>
                                </div>
                            </x-shad.card-description>
                        </x-shad.card-header>
                        <x-shad.card-content>
                            <p class="text-foreground mb-4">{{ Str::limit($heroPost->content, 300) }}</p>
                        </x-shad.card-content>
                        <x-shad.card-footer class="flex justify-between items-center">
                            <x-shad.button tag="a" href="{{ route('posts.show', $heroPost) }}" variant="outline" size="sm">
                                Read More
                            </x-shad.button>
                            <div class="flex items-center text-sm text-muted-foreground">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                                <span>{{ $heroPost->comments_count ?? 0 }} comments</span>
                            </div>
                        </x-shad.card-footer>
                    </x-shad.card>
                </div>

                <!-- Post List (Right Half) -->
                <div class="md:w-1/2">
                    <div class="space-y-6">
                        @foreach ($posts->skip(1) as $post)
                            <x-shad.card>
                                <x-shad.card-header>
                                    <x-shad.card-title>
                                        <a href="{{ route('posts.show', $post) }}" class="text-xl font-semibold hover:text-primary transition duration-150 ease-in-out">
                                            {{ $post->title }}
                                        </a>
                                    </x-shad.card-title>
                                    <x-shad.card-description>
                                        <div class="flex items-center text-sm text-muted-foreground">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <time datetime="{{ $post->created_at->toDateString() }}">
                                                {{ $post->created_at->format('F j, Y') }}
                                            </time>
                                            <span class="mx-2">&bull;</span>
                                            <span>{{ $post->user->name }}</span>
                                        </div>
                                    </x-shad.card-description>
                                </x-shad.card-header>
                                <x-shad.card-content>
                                    <p class="text-foreground">{{ Str::limit($post->content, 150) }}</p>
                                </x-shad.card-content>
                                <x-shad.card-footer class="flex justify-between items-center">
                                    <x-shad.button tag="a" href="{{ route('posts.show', $post) }}" variant="outline" size="sm">
                                        Read More
                                    </x-shad.button>
                                    <div class="flex items-center text-sm text-muted-foreground">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                        </svg>
                                        <span>{{ $post->comments_count ?? 0 }} comments</span>
                                    </div>
                                </x-shad.card-footer>
                            </x-shad.card>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>