<?php


namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all existing users and tags
        $users = User::all();
        $tags = Tag::all();

        // Ensure we have users and tags to associate
        if ($users->isEmpty() || $tags->isEmpty()) {
            $this->command->warn('Please seed users and tags before seeding posts.');
            return;
        }

        // Create 50 posts
        Post::factory(50)->make()->each(function ($post) use ($users, $tags) {
            // Assign a random user as the author
            $post->user_id = $users->random()->id;
            $post->save(); // This line saves the post to the database

            // Attach a random number of tags (between 1 and 3)
            $tagsToAttach = $tags->random(rand(1, 3));
            $post->tags()->attach($tagsToAttach);
        }); // The ->create() method has been removed from here
    }
}
