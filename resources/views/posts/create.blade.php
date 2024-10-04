<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-shad.card>
                <x-shad.card-header>
                    <x-shad.card-title>Create a New Post</x-shad.card-title>
                    <x-shad.card-description>Fill in the details to create a new blog post.</x-shad.card-description>
                </x-shad.card-header>
                <x-shad.card-content>
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="mb-4">
                            <x-shad.label for="title">Title</x-shad.label>
                            <x-shad.input id="title" name="title" type="text" required />
                        </div>
                        <div class="mb-4">
                            <x-shad.label for="content">Content</x-shad.label>
                            <x-shad.textarea id="content" name="content" rows="5" required></x-shad.textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-shad.button type="submit">
                                Create Post
                            </x-shad.button>
                        </div>
                    </form>
                </x-shad.card-content>
            </x-shad.card>
        </div>
    </div>
</x-app-layout>