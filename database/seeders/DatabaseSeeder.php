<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Comment::truncate();
        User::truncate();
        Category::truncate();
        Post::truncate();

        $users = User::factory(4)->create();

        Post::factory(40)->state(new Sequence(
            fn (Sequence $sequence) => ['user_id' => $users->random()->id],
        ))->create();
    }
}
