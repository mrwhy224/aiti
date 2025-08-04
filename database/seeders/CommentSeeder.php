<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $posts = Post::all();
        $users = User::all();

        if ($posts->isEmpty() || $users->isEmpty()) {
            $this->command->warn('Please seed posts and users before seeding comments.');
            return;
        }

        foreach ($posts as $post) {
            // Create 5 to 15 top-level comments for each post
            for ($i = 0; $i < rand(5, 15); $i++) {
                $parentComment = Comment::create([
                    'post_id' => $post->id,
                    'user_id' => $users->random()->id,
                    'body' => $faker->paragraph,
                    'created_at' => $faker->dateTimeBetween($post->created_at, 'now'),
                ]);

                // Create 0 to 3 replies for some of the top-level comments
                if (rand(1, 3) === 1) {
                    for ($j = 0; $j < rand(1, 3); $j++) {
                        Comment::create([
                            'post_id' => $post->id,
                            'user_id' => $users->random()->id,
                            'parent_id' => $parentComment->id,
                            'body' => $faker->sentence,
                            'created_at' => $faker->dateTimeBetween($parentComment->created_at, 'now'),
                        ]);
                    }
                }
            }
        }
    }
}
