<?php

use App\Models\User;
use App\Models\Post;

test('individual posts are visible publicly', function () {
    $user = User::factory()->create(['is_editor' => true]);
    $post = Post::factory()->create(['user_id' => $user->id]);

    $response = $this->get("/posts/{$post->id}");

    $response->assertOk();
    
    // Assert that the title is present
    $response->assertSee($post->title, false);

    // Get the first sentence of the content
    $firstSentence = Str::before($post->content, '.') . '.';

    // Assert that the first sentence of the content is present
    $response->assertSee($firstSentence, false);
});

// Keep the rest of the tests unchanged