<?php

use Illuminate\Database\Seeder;
use churchapp\Post;
use Illuminate\Database\Eloquent\Model;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach(range(1,50) as $index)
        {
            Post::create([
                'title' => $faker->sentence(4),
                'body' => $faker->sentence(16),
                'postable_type' => 'churchapp\User',
                'postable_id' => rand(1,6)
            ]);
        }
    }
}
