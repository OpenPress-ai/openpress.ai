<?php

use App\Models\User;
use App\Models\Post;

test('individual posts are visible publicly', function () {
    $user = User::factory()->create(['is_editor' => true]);
    $post = Post::factory()->create(['user_id' => $user->id]);

    $response = $this->get("/posts/{$post->id}");

    $response->assertOk();
    
    // Dump the response content for debugging
    dump($response->getContent());

    // Use assertSeeInOrder instead of assertSee
    $response->assertSeeInOrder([
        $post->title,
        $post->content
    ], false);

    // If the above still fails, try adding a small delay
    // usleep(500000); // Uncomment this line to add a 0.5 second delay
    // $response->assertSeeInOrder([
    //     $post->title,
    //     $post->content
    // ], false);
});

// Keep the rest of the tests unchanged