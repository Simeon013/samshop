<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
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

        // $categories = Category::factory(5)->create();

        // Product::factory(20)->create([
        //     'category_id' => Category::all()->id
        // ]);

        Category::factory()
            ->has(Product::factory()->count(4))
            ->count(5)
            ->create();


        // $category = Category::factory(5)->create();

        // Product::factory(rand(1 , 3))->create([
        //     'category_id' => ($category->random(1)->first())->id
        // ]);

        // $products = Product::factory()
        //     ->count(3)
        //     ->for($category)
        //     ->create();

        // $category = Category::factory()
        //     ->has(Product::factory()->count(20))
        //     ->create();

        User::factory(10)->create();
    }
}
