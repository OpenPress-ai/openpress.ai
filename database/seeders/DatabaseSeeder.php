<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $posts = [
            [
                'title' => 'Breakthrough in Oceanic Energy Generation',
                'content' => "We're excited to announce a major breakthrough in our OTEC (Ocean Thermal Energy Conversion) technology. Our latest prototype has achieved a 30% increase in energy efficiency, bringing us one step closer to sustainable and scalable oceanic energy production. This development could revolutionize how we power our offshore facilities and contribute to global clean energy initiatives.",
            ],
            [
                'title' => 'Automated Port Systems: A New Era of Maritime Logistics',
                'content' => "Our team has successfully implemented the first fully automated port system at our test facility. This cutting-edge system utilizes AI and robotics to manage cargo handling, significantly reducing turnaround times and human error. Early results show a 40% increase in efficiency and a 25% reduction in operational costs. We're now preparing to scale this technology for larger port operations.",
            ],
            [
                'title' => 'Sustainable Aquaculture: Feeding the Future',
                'content' => "The Atlantis Port Company is venturing into sustainable aquaculture with our new deep-sea farming initiative. By utilizing the nutrient-rich waters of the open ocean, we're developing methods to cultivate high-quality, sustainable seafood without the environmental drawbacks of traditional fish farming. This project not only aims to address global food security but also demonstrates the diverse potential of our oceanic infrastructure.",
            ],
        ];

        foreach ($posts as $postData) {
            Post::create([
                'user_id' => $user->id,
                'title' => $postData['title'],
                'content' => $postData['content'],
            ]);
        }
    }
}