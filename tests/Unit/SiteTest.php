<?php

use App\Models\Site;
use App\Models\User;

test('site has required attributes', function () {
    $site = Site::factory()->create([
        'name' => 'Test Site',
        'root_domain' => 'testsite.com',
        'github_repo_url' => 'https://github.com/user/repo',
        'is_managed_by_openpress' => true,
    ]);
    
    expect($site->name)->toBe('Test Site');
    expect($site->root_domain)->toBe('testsite.com');
    expect($site->github_repo_url)->toBe('https://github.com/user/repo');
    expect($site->is_managed_by_openpress)->toBeTrue();
});

test('site belongs to a user', function () {
    $user = User::factory()->create();
    $site = Site::factory()->create(['user_id' => $user->id]);
    
    expect($site->user)->toBeInstanceOf(User::class);
    expect($site->user->id)->toBe($user->id);
});

test('user can have many sites', function () {
    $user = User::factory()->create();
    $sites = Site::factory()->count(3)->create(['user_id' => $user->id]);
    
    expect($user->sites)->toHaveCount(3);
    expect($user->sites->first())->toBeInstanceOf(Site::class);
});