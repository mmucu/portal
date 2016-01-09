<?php

use Illuminate\Database\Seeder;
use churchapp\Article;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach(range(1,20) as $index)
        {
            Article::create([
                'title' => $faker->sentence(4),
                'body' => $faker->sentence(200),
                'created_by' => rand(1,5)
            ]);
        }
    }
}
