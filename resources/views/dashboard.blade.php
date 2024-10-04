<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Your Sites</h3>
                    @if($sites->count() > 0)
                        <ul class="space-y-2">
                            @foreach($sites as $site)
                                <li>
                                    <a href="#" class="text-blue-500 hover:underline">{{ $site->name }}</a>
                                    <span class="text-sm text-gray-500">({{ $site->root_domain }})</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>You haven't created any sites yet.</p>
                    @endif
                    <div class="mt-6">
                        <a href="{{ route('sites.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Create Site
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>