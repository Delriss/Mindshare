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
        // User::factory(10)->create();

        User::factory()
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

        BlogPost::factory()
            ->count(30)
            ->has(Tag::factory()->count(3))
            ->hasUser()
            ->create();
    }
}
