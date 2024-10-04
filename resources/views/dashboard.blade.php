<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-foreground leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-shad.card>
                <x-shad.card-header>
                    <x-shad.card-title>{{ __('Welcome') }}</x-shad.card-title>
                    <x-shad.card-description>{{ __("You're logged in!") }}</x-shad.card-description>
                </x-shad.card-header>
                <x-shad.card-content>
                    <p class="text-muted-foreground">
                        {{ __('This is your dashboard. You can customize this page to display important information or quick links.') }}
                    </p>
                </x-shad.card-content>
            </x-shad.card>
        </div>
    </div>
</x-app-layout>