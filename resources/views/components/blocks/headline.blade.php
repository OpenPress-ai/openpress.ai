<{{ $block['attributes']['level'] }} class="scroll-m-20 {{ $block['attributes']['className'] ?? '' }}
    @switch($block['attributes']['level'])
        @case('h1')
            text-4xl font-extrabold tracking-tight lg:text-5xl
            @break
        @case('h2')
            text-3xl font-semibold tracking-tight
            @break
        @case('h3')
            text-2xl font-semibold tracking-tight
            @break
        @default
            text-xl font-semibold tracking-tight
    @endswitch">
    {{ $block['attributes']['content'] }}
</{{ $block['attributes']['level'] }}>