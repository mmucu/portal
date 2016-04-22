<?php

use Illuminate\Database\Seeder;
use churchapp\YearOfStudy;

class YearOfStudyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $years = ['FIRST','SECOND','THIRD','FOURTH','FIFTH'];
        foreach($years as $year)
        {

            YearOfStudy::create([
                'year' => $year
            ]);

        }
    }
}
