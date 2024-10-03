<?php

use App\Models\User;
use App\Models\Post;

test('user can be an editor', function () {
    $user = User::factory()->create(['is_editor' => true]);
    
    expect($user->is_editor)->toBeTrue();
});

test('user can have many posts', function () {
    $user = User::factory()->create();
    $posts = Post::factory()->count(3)->create(['user_id' => $user->id]);
    
    expect($user->posts)->toHaveCount(3);
    expect($user->posts->first())->toBeInstanceOf(Post::class);
});