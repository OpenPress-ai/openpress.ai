@php
$posts = \App\Models\Post::latest()->limit(3)->get();
@endphp

@foreach($posts as $post)
    <div class="mb-6 p-4 border border-white rounded">
        <h3 class="text-xl font-bold mb-2">{{ $post->title }}</h3>
        <p class="mb-2">{{ Str::limit($post->content, 150) }}</p>
        <p class="text-sm italic mb-2">{{ $post->created_at->format('F j, Y') }}</p>
        <a href="#" class="px-4 py-2 bg-white text-blue-900 rounded hover:bg-blue-100 inline-block">Read More</a>
    </div>
@endforeach