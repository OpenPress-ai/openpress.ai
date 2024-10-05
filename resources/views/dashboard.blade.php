<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-foreground">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-background">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-card text-card-foreground overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-4">Your Sites</h3>
                    @if($sites->count() > 0)
                        <ul class="space-y-2">
                            @foreach($sites as $site)
                                <li>
                                    <a href="#" class="text-primary hover:underline">{{ $site->name }}</a>
                                    <span class="text-sm text-muted-foreground">({{ $site->root_domain }})</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted-foreground">You haven't created any sites yet.</p>
                    @endif
                    <div class="mt-6">
                        <x-shad.button tag="a" href="{{ route('sites.create') }}">
                            Create Site
                        </x-shad.button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>