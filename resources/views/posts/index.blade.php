<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Welcome Card (Left Half) -->
                <div class="md:w-1/3">
                    <x-shad.card class="h-full">
                        <x-shad.card-header>
                            <x-shad.card-title class="text-2xl font-bold">
                                Welcome to OpenPress
                            </x-shad.card-title>
                        </x-shad.card-header>
                        <x-shad.card-content>
                            <p class="text-foreground mb-4">
                                We're building a new content management system that is:
                            </p>
                            <ul class="list-disc pl-5 mb-4 text-foreground">
                                <li>Lightweight</li>
                                <li>Built on Laravel</li>
                                <li>Open source under CC-0</li>
                                <li>Optimized for AI</li>
                            </ul>
                        </x-shad.card-content>
                        <x-shad.card-footer>
                            <div class="flex flex-col space-y-2">
                                <x-shad.button tag="a" href="https://github.com/openagentsinc/openpress" target="_blank" rel="noopener noreferrer" variant="outline" size="sm" class="w-full">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                    </svg>
                                    OpenPress GitHub
                                </x-shad.button>
                                <x-shad.button tag="a" href="https://x.com/OpenAgentsInc" target="_blank" rel="noopener noreferrer" variant="outline" size="sm" class="w-full">
                                    <x-icon-x class="w-3 h-3 mr-2" />
                                    Follow us on X
                                </x-shad.button>
                                <x-shad.button tag="a" href="https://laravel.com/docs" target="_blank" rel="noopener noreferrer" variant="outline" size="sm" class="w-full">
                                    Laravel Documentation
                                </x-shad.button>
                            </div>
                        </x-shad.card-footer>
                    </x-shad.card>
                </div>

                <!-- Post List (Right Half) -->
                <div class="md:w-2/3">
                    <div class="space-y-6">
                        @foreach ($posts as $post)
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