@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-4">{{ $page['title'] }}</h1>
        @foreach($page['blocks'] as $block)
            @include('components.blocks.' . strtolower($block['type']), ['block' => $block])
        @endforeach
    </div>
@endsection