<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Category::truncate();



        \App\Models\Category::factory(10)->create();

        \App\Models\Author::factory(25)->create();

        \App\Models\Post::factory(50)->create();

        \App\Models\User::factory(25)->create();

        \App\Models\Role::factory(10)->create();

        \App\Models\Comment::factory(5000)->create();

    }
}
