<?php

use Illuminate\Database\Seeder;
use churchapp\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['prayer','faith','hope','repentance','giving','forgiveness','love'];
        foreach($categories as $name)
        {

            Category::create([
                'name' => $name
            ]);

        }
    }
}
