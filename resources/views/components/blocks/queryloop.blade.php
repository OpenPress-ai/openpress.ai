@php
$posts = \App\Models\Post::query()
    ->when($block['attributes']['postType'], function ($query, $postType) {
        return $query->where('type', $postType);
    })
    ->limit($block['attributes']['limit'])
    ->orderBy($block['attributes']['orderBy'], $block['attributes']['order'])
    ->get();
@endphp

@foreach($posts as $post)
    <div class="mb-4">
        @foreach($block['children'] as $child)
            @include('components.blocks.' . strtolower($child['type']), [
                'block' => $child,
                'post' => $post
            ])
        @endforeach
    </div>
@endforeach