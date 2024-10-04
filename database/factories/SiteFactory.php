<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    protected $model = Site::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'root_domain' => $this->faker->domainName,
            'github_repo_url' => $this->faker->url,
            'is_managed_by_openpress' => $this->faker->boolean,
            'user_id' => User::factory(),
        ];
    }
}