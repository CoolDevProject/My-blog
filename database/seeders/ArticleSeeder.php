<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //lance un seeder en console, le flag contient le nom du seeder à exécuter
        // php artisan db:seed --class=ArticleSeeder
        Category::get()->each(function ($category) {
            \App\Models\Article::factory(5)->create([
                'category_id' => $category->id
            ]);
        });
    }
}
