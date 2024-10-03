<?php

use App\Models\User;
use App\Models\Post;

test('editor can create a post', function () {
    $editor = User::factory()->create(['is_editor' => true]);
    
    $response = $this->actingAs($editor)->post('/posts', [
        'title' => 'Test Post',
        'content' => 'This is a test post content.',
    ]);
    
    $response->assertRedirect('/posts');
    $this->assertDatabaseHas('posts', [
        'title' => 'Test Post',
        'content' => 'This is a test post content.',
        'user_id' => $editor->id,
    ]);
});

test('non-editor cannot create a post', function () {
    $user = User::factory()->create(['is_editor' => false]);
    
    $response = $this->actingAs($user)->post('/posts', [
        'title' => 'Test Post',
        'content' => 'This is a test post content.',
    ]);
    
    $response->assertForbidden();
    $this->assertDatabaseMissing('posts', [
        'title' => 'Test Post',
        'content' => 'This is a test post content.',
    ]);
});

test('individual posts are visible publicly', function () {
    $post = Post::factory()->create();
    
    $response = $this->get("/posts/{$post->id}");
    
    $response->assertOk()
        ->assertSee($post->title)
        ->assertSee($post->content);
});

test('list of all posts is visible publicly on homepage', function () {
    $posts = Post::factory()->count(3)->create();
    
    $response = $this->get('/');
    
    $response->assertOk();
    foreach ($posts as $post) {
        $response->assertSee($post->title);
    }
});

test('editors can see the homepage', function () {
    $editor = User::factory()->create(['is_editor' => true]);
    
    $response = $this->actingAs($editor)->get('/');
    
    $response->assertOk()
        ->assertViewIs('home');
});