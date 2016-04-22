<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         //$this->call(PostTableSeeder::class);
        //DB::table('faculties')->delete();
        //DB::table('departments')->delete();
        //DB::table('years')->delete();
        //DB::table('categories')->delete();
        DB::table('updates')->delete();
        //$this->call(DepartmentTableSeeder::class);
        //$this->call(YearOfStudyTableSeeder::class);
        //$this->call(CategoryTableSeeder::class);
        $this->call(UpdatesTableSeeder::class);


        Model::reguard();
    }
}
