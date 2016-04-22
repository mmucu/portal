<?php

use Illuminate\Database\Seeder;
use churchapp\Faculty;
use churchapp\Department;
use Illuminate\Support\Facades\Storage;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        print ('[+] running');

        print ('[*] looking for file');
        if(Storage::exists('courses.xml')){
            print ('[+] File found');
            $file = Storage::get('courses.xml');

            print ('[*] Reading from xml');
            libxml_use_internal_errors(true);
            $xml = simplexml_load_string($file);

            if($xml === false) {

                print ('[-] Error reading file');

                foreach(libxml_get_errors() as $error){
                    print ($error);
                }
            }

            foreach($xml->children() as $child){

                print "[*] Populating both department and faculty tables concurrently";
                print "[+] Faculty". $child->name;
                $fac = Faculty::create([
                    'name' => $child->name,
                    'description' => $child->name
                ]);
                foreach($child->li as $department){
                    print "    [*]".$department;
                    $dep = new Department([
                        'name' => $department,
                        'description' => $child->name." department of ".$department
                    ]);
                    $fac->departments()->save($dep);
                }

            }
        }
        else{
            print ('[-] Could not locate file');
        }


    }
}
