<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('profiles')->delete();
        
        \DB::table('profiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'firstname' => 'Ra-ouf',
                'lastname' => 'Jumli',
                'middlename' => 'Indanan',
                'suffix' => NULL,
                'gender' => 'Male',
                'mobile' => '09557650801',
                'user_id' => 1,
                'created_at' => '2023-01-27 19:26:22',
                'updated_at' => '2023-01-27 19:26:22',
            ),
            1 => 
            array (
                'id' => 2,
                'firstname' => 'Sheila',
                'lastname' => 'Tiong',
                'middlename' => 'A',
                'suffix' => NULL,
                'gender' => 'F',
                'mobile' => '09123456788',
                'user_id' => 2,
                'created_at' => '2023-01-27 19:29:17',
                'updated_at' => '2023-01-27 19:29:17',
            ),
            2 => 
            array (
                'id' => 3,
                'firstname' => 'Maria Angelee',
                'lastname' => 'Belciña',
                'middlename' => 'A',
                'suffix' => NULL,
                'gender' => 'F',
                'mobile' => '09123456777',
                'user_id' => 3,
                'created_at' => '2023-01-27 19:36:43',
                'updated_at' => '2023-01-27 19:36:43',
            ),
            3 => 
            array (
                'id' => 4,
                'firstname' => 'Adrienne Kyle',
                'lastname' => 'Faustino',
                'middlename' => 'A',
                'suffix' => NULL,
                'gender' => 'M',
                'mobile' => '09123456774',
                'user_id' => 4,
                'created_at' => '2023-01-27 19:37:35',
                'updated_at' => '2023-01-27 19:37:35',
            ),
            4 => 
            array (
                'id' => 5,
                'firstname' => 'Mary Audrey',
                'lastname' => 'Abella',
                'middlename' => 'A',
                'suffix' => NULL,
                'gender' => 'F',
                'mobile' => '09123456773',
                'user_id' => 5,
                'created_at' => '2023-01-27 19:38:13',
                'updated_at' => '2023-01-27 19:38:13',
            ),
            5 => 
            array (
                'id' => 6,
                'firstname' => 'Melanny',
                'lastname' => 'Narvasa',
                'middlename' => 'A',
                'suffix' => NULL,
                'gender' => 'F',
                'mobile' => '09123456771',
                'user_id' => 6,
                'created_at' => '2023-01-27 19:39:18',
                'updated_at' => '2023-01-27 19:39:18',
            ),
        ));
        
        
    }
}