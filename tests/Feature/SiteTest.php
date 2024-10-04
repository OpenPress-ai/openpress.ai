<?php

use App\Models\User;
use App\Models\Site;

test('user can see create site button on dashboard', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertOk();
    $response->assertSee('Create Site', false);
});

test('user can create a site', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/sites', [
        'name' => 'My Test Site',
        'root_domain' => 'mytestsite.com',
    ]);

    $response->assertRedirect(route('dashboard'));
    $this->assertDatabaseHas('sites', [
        'name' => 'My Test Site',
        'root_domain' => 'mytestsite.com',
        'user_id' => $user->id,
    ]);
});

test('user can see their sites on the dashboard', function () {
    $user = User::factory()->create();
    $sites = Site::factory()->count(3)->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertOk();
    foreach ($sites as $site) {
        $response->assertSee($site->name, false);
    }
});

test('user cannot create a site with invalid data', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/sites', [
        'name' => '', // Invalid: empty name
        'root_domain' => 'invalid domain', // Invalid: not a valid domain
    ]);

    $response->assertSessionHasErrors(['name', 'root_domain']);
});

test('user cannot see sites of other users', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $site = Site::factory()->create(['user_id' => $user2->id]);

    $response = $this->actingAs($user1)->get('/dashboard');

    $response->assertOk();
    $response->assertDontSee($site->name, false);
});