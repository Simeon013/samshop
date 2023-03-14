<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
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
        Category::factory()
            ->has(Product::factory()->count(4))
            ->count(10)
            ->create();
        // \App\Models\User::factory(10)->create();
    }
}
