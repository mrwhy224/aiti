<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\RequestLog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RequestLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $posts = Post::all();
        $users = User::all();

        if ($posts->isEmpty()) {
            $this->command->warn('No posts found. Please seed posts before seeding request logs.');
            return;
        }

        foreach ($posts as $post) {
            // Create a random number of view logs for each post (e.g., 5 to 50)
            for ($i = 0; $i < rand(5, 50); $i++) {
                RequestLog::create([
                    // Assign a random user, or null for a guest user (20% chance of guest)
                    'user_id' => $users->isNotEmpty() && rand(1, 5) > 1 ? $users->random()->id : null,

                    // Associate the log with the current post
                    'requestable_id' => $post->id,
                    'requestable_type' => Post::class,


                    'ip_address' => $faker->ipv4,
                    'user_agent' => $faker->userAgent,
                    'url' => url('/posts/' . $post->slug),
                    'method' => 'GET',
                    'status_code' => 200,
                    'referrer' => $faker->optional(0.7)->url, // 70% chance of having a referrer

                    // Set a random creation date within the last year
                    'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                ]);
            }
        }
    }
}
