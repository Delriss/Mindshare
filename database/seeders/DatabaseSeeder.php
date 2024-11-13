<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BlogPost;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Default User
        User::factory()
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

        // Create 30 Blogs with 3 Tags
        BlogPost::factory()
            ->count(30)
            ->hasTags(3)
            ->hasUser()
            ->create();
    }
}
