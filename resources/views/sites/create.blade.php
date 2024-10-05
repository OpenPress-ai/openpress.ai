<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-foreground">
            {{ __('Create Site') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-background">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-card text-card-foreground overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('sites.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <x-shad.label for="name">Site Name</x-shad.label>
                                <x-shad.input type="text" name="name" id="name" required />
                            </div>
                            <div>
                                <x-shad.label for="root_domain">Root Domain</x-shad.label>
                                <x-shad.input type="text" name="root_domain" id="root_domain" required />
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <x-shad.button type="submit">
                                Create Site
                            </x-shad.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>