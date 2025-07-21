<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678'
        ]);

        Category::create([
            'title' => 'travel',
            'slug'=>'travel',
            'image' => asset('frontend/assets/img/post/travel.jpeg')
        ]);

         Category::create([
            'title' => 'sports',
            'slug'=>'sports',
            'image' => asset('frontend/assets/img/post/sports.jpeg')
        ]);

         Category::create([
            'title' => 'agriculture',
            'slug'=>'agriculture',
            'image' => asset('frontend/assets/img/post/agriculture.jpeg')
        ]);

         Category::create([
            'title' => 'waterfall',
            'slug'=>'waterfall',
            'image' => asset('frontend/assets/img/post/waterfall.jpeg')
        ]);

         Category::create([
            'title' => 'wildlife',
            'slug'=>'wildlife',
            'image' => asset('frontend/assets/img/post/wildlife.jpeg')
        ]);

         Category::create([
            'title' => 'village life',
            'slug'=>'village-life',
            'image' => asset('frontend/assets/img/post/village.jpeg')
        ]);
    }
}
