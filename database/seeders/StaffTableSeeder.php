<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('staff')->delete();
        
        \DB::table('staff')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 2,
                'college_id' => NULL,
                'user_id' => 2,
                'created_at' => '2023-01-30 14:14:28',
                'updated_at' => '2023-01-30 14:14:28',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 3,
                'college_id' => 1,
                'user_id' => 2,
                'created_at' => '2023-01-30 14:14:28',
                'updated_at' => '2023-01-30 14:14:28',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 3,
                'college_id' => 2,
                'user_id' => 3,
                'created_at' => '2023-01-30 14:15:48',
                'updated_at' => '2023-01-30 14:15:48',
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 3,
                'college_id' => 3,
                'user_id' => 4,
                'created_at' => '2023-01-30 14:15:48',
                'updated_at' => '2023-01-30 14:15:48',
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 3,
                'college_id' => 4,
                'user_id' => 5,
                'created_at' => '2023-01-30 14:17:00',
                'updated_at' => '2023-01-30 14:17:00',
            ),
            5 => 
            array (
                'id' => 6,
                'role_id' => 3,
                'college_id' => 5,
                'user_id' => 5,
                'created_at' => '2023-01-30 14:17:00',
                'updated_at' => '2023-01-30 14:17:00',
            ),
            6 => 
            array (
                'id' => 7,
                'role_id' => 4,
                'college_id' => NULL,
                'user_id' => 6,
                'created_at' => '2023-01-30 14:17:50',
                'updated_at' => '2023-01-30 14:17:50',
            ),
        ));
        
        
    }
}