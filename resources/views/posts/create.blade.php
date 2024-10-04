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
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title:</label>
                            <input type="text" name="title" id="title" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Content:</label>
                            <textarea name="content" id="content" rows="5" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required></textarea>
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