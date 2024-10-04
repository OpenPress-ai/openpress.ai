<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true', loading: false }"
      x-init="$watch('darkMode', val => {
          localStorage.setItem('darkMode', val)
          if (val) {
              document.documentElement.classList.add('dark')
          } else {
              document.documentElement.classList.remove('dark')
          }
      })"
      x-bind:class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-background text-foreground"
      x-data="{ 
        init() {
            this.handlePageTransition = (url) => {
                this.loading = true;
                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        document.body.innerHTML = doc.body.innerHTML;
                        history.pushState(null, '', url);
                        window.scrollTo(0, 0);
                        this.initializeScripts();
                    })
                    .catch(error => {
                        console.error('Error during page transition:', error);
                        window.location.href = url;
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            };

            this.initializeScripts = () => {
                // Re-initialize any necessary scripts here
                // For example, if you're using Alpine.js components:
                Alpine.initTree(document.body);
            };

            window.addEventListener('popstate', () => {
                this.handlePageTransition(window.location.href);
            });
        }
      }"
      x-on:click.capture="
        const target = $event.target.closest('a');
        if (target && target.href && target.href.startsWith(window.location.origin) && !target.hasAttribute('download')) {
            $event.preventDefault();
            handlePageTransition(target.href);
        }
      ">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-card shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <x-loading-overlay />

    <script>
        // Check initial dark mode on page load
        if (localStorage.getItem('darkMode') === 'true' || 
            (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
</body>
</html>