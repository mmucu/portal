<?php

use Illuminate\Database\Seeder;
use churchapp\Faculty;

class FacultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        print ('[+] runing');

        $handle = fopen('/faculties.txt','r');
        if($handle){
            while(($line = fgets($handle))!== false){
                Faculty::create([
                    'name' => $line,
                    'description' => $line
                ]);
                print ($line);
            }
        }

    }
}
