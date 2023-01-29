<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('courses')->delete();
        
        \DB::table('courses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bachelor of Science in Information Technology',
                'acronym' => 'BSIT',
                'is_active' => 1,
                'college_id' => 1,
                'created_at' => '2023-01-26 15:24:06',
                'updated_at' => '2023-01-26 15:24:06',
            ),
        ));
        
        
    }
}